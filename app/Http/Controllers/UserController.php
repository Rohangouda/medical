<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MasterOrder;
use App\Product;
use App\ProductHistory;
use Illuminate\Support\Facades\DB;
use App\UsersCart;
use Session;
use App\User;
use App\Mail\OrderNotificationMail;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function userBuyProduct(Request $req){
        $data = $req->all();
        $current_date = date('ymd-His');
        $rendom_value = rand(100,999);

        try{
            DB::beginTransaction();
            // $checkPrevOrderId = MasterOrder::select('order_id')->orderBy('id', 'DESC')->limit(1)->first();
            $generated_order_id = $rendom_value.'-'.$current_date;
            
            $recieveOrder = new MasterOrder();
            $recieveOrder->user_id = session()->get('user_id');
            $recieveOrder->order_id = $generated_order_id;
            $recieveOrder->product_id = $data['product_id'];
            $recieveOrder->order_mode  = "Offline";
            $recieveOrder->order_quantity = $data['quantity'];
            $recieveOrder->order_price = $data['order_price'];
            $recieveOrder->order_mrp = $data['order_mrp'];
            $recieveOrder->order_discount = $data['total_save'];
            $recieveOrder->order_flag = 'Ordered';
            $recieveOrder->created_by = session()->get('user_id');
            $recieveOrder->created_date = date('Y-m-d');
            $recieveOrder->save();

            $updateLog = new ProductHistory();
            $updateLog->product_id = $data['product_id'];
            $updateLog->order_id = $recieveOrder->id;
            $updateLog->order_status = 2;
            $updateLog->price = $data['order_price'];
            $updateLog->mrp_price = $data['order_mrp'];
            $updateLog->quantity =  $data['quantity'];
            $updateLog->updated_by = session()->get('user_id');
            $updateLog->save();

            DB::commit();
            // order mail
            $getProductDetails = Product::where('id',$data['product_id'])->with(['productExtraProp','productImages'])->get();
            $getProductDetails[0]->quantity = $data['quantity'];
            $getProductDetails[0]->order_id = $generated_order_id;
            $getProductDetails[0]->user_name = $req->session()->get('first_name').' '.$req->session()->get('last_name');
            // print_r($getProductDetails->toArray());die;
            Mail::to('kbcprakash1997@gmail.com')->queue(new OrderNotificationMail($getProductDetails->toArray()));

            return response()->json(['status' => 200, 'msg' => 'Your order is successfully placed, please visit our store.']);
        }catch (\Exception $e){
            DB::rollback();
            return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time.']);
        }
        
    }

    public function userBuyProduct_cart(Request $req){
        $current_date = date('ymd-His');
        $rendom_value = rand(100,999);
        $user_id = session()->get('user_id');
        $get_cart_items = UsersCart::where('user_id',$user_id)->get();
        try{
            DB::beginTransaction();
            if(count($get_cart_items) > 0){
                $mail_data = [];
                foreach($get_cart_items->toArray() as $key => $cart_items){
                    $getProductDetails = Product::where('id',$cart_items['product_id'])->with(['productExtraProp','productImages'])->first();
                    if($getProductDetails != null){
                        $mail_data[] =  $getProductDetails->toArray();
                        $mail_data[$key]['quantity'] = $cart_items['quantity'];
                        if($getProductDetails['productExtraProp']->quantity > 0){
                            // print_r($cart_items);
                            $generated_order_id = $rendom_value.'-'.$current_date;

                            $recieveOrder = new MasterOrder();
                            $recieveOrder->user_id = session()->get('user_id');
                            $recieveOrder->order_id = $generated_order_id;
                            $recieveOrder->product_id = $cart_items['product_id'];
                            $recieveOrder->order_mode  = "Offline";
                            $recieveOrder->order_quantity = $cart_items['quantity'];
                            $recieveOrder->order_price = $getProductDetails['productExtraProp']->price * $cart_items['quantity'];
                            $recieveOrder->order_mrp = $getProductDetails['productExtraProp']->mrp_price;
                            $recieveOrder->order_discount = $getProductDetails['productExtraProp']->mrp_price - $getProductDetails['productExtraProp']->price;
                            $recieveOrder->order_flag = 'Ordered';
                            $recieveOrder->created_by = session()->get('user_id');
                            $recieveOrder->created_date = date('Y-m-d');
                            $recieveOrder->save();

                            $updateLog = new ProductHistory();
                            $updateLog->product_id = $cart_items['product_id'];
                            $updateLog->order_id = $recieveOrder->id;
                            $updateLog->order_status = 2;
                            $updateLog->price = $getProductDetails['productExtraProp']->price * $cart_items['quantity'];
                            $updateLog->mrp_price = $getProductDetails['productExtraProp']->mrp_price;
                            $updateLog->quantity =  $cart_items['quantity'];
                            $updateLog->updated_by = session()->get('user_id');
                            $updateLog->save();

                        }
                    }

                    $updateCartLog = UsersCart::where('user_id',session()->get('user_id'))->where('product_id',$cart_items['product_id'])->delete();
                    
                }
                
                DB::commit();
                // print_r($mail_data);die;
                $mail_data[0]['order_id'] = $generated_order_id;
                $mail_data[0]['user_name'] = $req->session()->get('first_name').' '.$req->session()->get('last_name');
                // order mail
                Mail::to('kbcprakash1997@gmail.com')->queue(new OrderNotificationMail($mail_data));
                return response()->json(['status' => 200, 'msg' => 'Your order is successfully placed, please visit our store.']);

            }
        }catch (\Exception $e){
            DB::rollback();
            return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time.']);
        }

    }

    public function getMyOrders(Request $req){
        $data = $req->all();
        $get_orders = MasterOrder::query();
        $get_orders = MasterOrder::where('user_id',Session::get('user_id'))->withTrashed();
        if(!empty($data['search_input'])){
            $get_orders->where('order_id','LIKE','%'.trim($data['search_input']).'%');
        }
        $get_orders->orderBy('id','DESC')->select('order_id','order_flag','user_id', DB::raw('count(*) as total'));
        $get_orders->groupBy('order_id','user_id','order_flag')->with(['productDetails','getUser']);
        $res = $get_orders->paginate($data['perPage']);
        
        if(count($res) > 0){
            $pagination = $res->links()->render();
            return response()->json(['status' => 200, 'order_list' => $res, 'pagination' => $pagination]);
        }else {
            return response()->json(['status' => 500, 'msg' => 'Record not found']);
        }
    }

    public function viewOrder(Request $req){
        $order_query = MasterOrder::where('order_id',$req->id)
                        ->with(['productDetails','getUser','productDetails.productFirstImg','productDetails.productExtraProp'])->withTrashed()->get();
        // dd($order_query);
        $res_json = json_decode(json_encode($order_query),true);
        if($res_json != null){
            return response()->json(['status' => 200, 'data' => $res_json]);
        }else{
            return response()->json(['status' => 500, 'msg' => 'Record not found']);
        }
    }

    function checkProductForReorder(Request $req){
        $product_id = $req->product_id;
        $checkProductAvailable = json_decode(json_encode(ProductHistory::where('product_id',$product_id)->first()),true);
        if($checkProductAvailable != null){
            if($checkProductAvailable['quantity'] > 0){
                return response()->json(['status' => 200, 'msg' => 'proceed to cart option']);
            }else{
                return response()->json(['status' => 500, 'msg' => 'Out of stock']);
            }
        }
    }

}
