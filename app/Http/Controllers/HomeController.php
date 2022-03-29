<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mst_Category;
use App\Product;
use App\Rln_Product_Category;
use Illuminate\Support\Facades\DB;
use Session;
use App\ProductVisitUsers;
use App\ContactUsModel;
use App\UsersCart;
use App\MasterOrder;
use App\Mst_Brand;
use App\ProductHistory;
use Carbon\Carbon;
use DateTime;
use App\ThemeSlider;
use App\ProductSliders;

class HomeController extends Controller
{
    public function __construct(){}

    public function getAllCategory(Request $req){
        $data = $req->all();
        $mst_query = Mst_Category::query();
        $mst_query = Mst_Category::whereNull('deleted_at');
        if(!empty($data['search_text'])){
            $mst_query->where('cat_name','LIKE','%'.$data['search_text'].'%');
        }
        $mst_query->orderBy('id','DESC'); 
        $get_records = $mst_query->get();
        if($get_records != null){
            return response()->json(['status' => 200, 'category_list' => $get_records]);
        }else {
            return response()->json(['status' => 500, 'msg' => 'Record not found']);
        }
    }

    public function themeCategories(Request $req){
        $data = $req->all();
        $res = Mst_Category::orderBy('cat_name','ASC')->paginate($data['perPage']);
        if($res != null){
            return response()->json(['status' => 200, 'category_list' => $res]);
        }else {
            return response()->json(['status' => 500, 'msg' => 'Record not found']);
        }
    }

    public function shopByCategory(Request $req){
        $data = $req->id;
        $breakStr = explode("=",$data);
        if(!empty($breakStr[1])){
            
        }
        if(!empty($breakStr[0])){
            print_r($breakStr[0]);die;
        }
    }

    public function getProductByCategory(Request $req) {
        $data = $req->all();
        // print_r($data);die;
        $breakStr = explode("=",$data['uri_category']);
        if(!empty($breakStr[1])){
            $res = Rln_Product_Category::query();
            $res = Rln_Product_Category::with(['getProduct','getProduct.productExtraProp', 'getProduct.productImagesByMaster'])->where(['rln_category' => $breakStr[1]]);
            $res->orderBy('id','DESC');
            $list = $res->paginate(10);

            //----- sort option -----
            if(!empty($data['sort_type'])){
                $rln_data = Rln_Product_Category::where(['rln_category' => $breakStr[1]])->get();
                $rln_product_ids = [];
                $rln_product_price = [];
                $final_product_arr = [];
                if(count($rln_data) > 0){
                    foreach($rln_data->toArray() as $key => $rln_data_items){
                        $rln_product_ids[] = $rln_data_items['product_id'];
                    }
                    if(count($rln_product_ids) > 0){
                        $get_history_data = ProductHistory::select('product_id as id','product_id')->whereIn('product_id',$rln_product_ids)->orderBy('price','DESC')->with(['getProduct','getProduct.productExtraProp', 'getProduct.productImagesByMaster'])->paginate(10);
                        if(count($get_history_data) > 0){
                            foreach($get_history_data->toArray()['data'] as $pKey => $product_items){
                                $rln_product_price[] = $product_items['get_product']['product_extra_prop']['price'];
                                // print_r('price : '.$product_items['get_product']['product_extra_prop']['price']);
                            }
                        }
                        if(count($rln_product_price) > 0){
                            if($data['sort_type'] == 'low_to_high'){
                                sort($rln_product_price);
                            }else if($data['sort_type'] == 'high_to_low'){
                                rsort($rln_product_price);
                            }
                            
                            $arrlength = count($rln_product_price);
                            for($x = 0; $x < $arrlength; $x++) {
                                $final_product_arr[] = $rln_product_price[$x];
                            }
                        }
                        $getSortedData = [];
                        if(count($final_product_arr) > 0){
                            $pagination = $get_history_data->links()->render();
                            foreach($final_product_arr as $search_items){
                                $getSortedData['data'][] = $this->returnSortItems($rln_product_ids, $search_items);
                            }
                            if(count($getSortedData) > 0){
                                $pagination = $get_history_data->links()->render();
                                return response()->json(['status' => 200, 'product_list' => $getSortedData, 'pagination' => $pagination]);
                            }
                        }
                        
                    }
                }
            }
            
            if(count($list) > 0){
                $pagination = $list->links()->render();
                return response()->json(['status' => 200, 'product_list' => $list, 'pagination' => $pagination]);
            }else {
                return response()->json(['status' => 500, 'msg' => 'Record not found']);
            }
        }
        if(!empty($breakStr[0])){
            print_r($breakStr[0]);die;
        }
    }

    function returnSortItems($rln_product_ids, $data){
        $sortByQuery = ProductHistory::select('product_id as id','product_id')->whereIn('product_id',$rln_product_ids)->orderBy('price','DESC')->with(['getProduct','getProduct.productExtraProp', 'getProduct.productImagesByMaster']);

        // print_r($data);
        $search_query = $sortByQuery->newQuery();
        $searchText = $data;
        $search_query = $search_query->get()->map(function($item) use($searchText) {
            if (strpos(strtolower($item->getProduct->productExtraProp->price), $searchText) !== false) {
                return $item;
            }
            
        })->filter(function ($value) {
            return !is_null($value);
        })->values();
        
        if(count($search_query) > 0){
            foreach($search_query->toArray() as $search_items){
                return $search_items;
            }
        }else{
            return null;
        }
    }

    public function getProductDetailsById(Request $req){
        if($req->session()->has('user_id')){
            $checkUser = ProductVisitUsers::where(['user_id' => $req->session()->get('user_id'), 'product_id' => $req->id])->first();
            if($checkUser == null){
                $getPrevCount = Product::find($req->id)->select('view_count')->first();
                // print_r('$getPrevCount : '.$getPrevCount);die;
                $updateViewCount = Product::where('id',$req->id)->update([
                    'view_count' => (int)$getPrevCount->view_count += 1
                ]);
                $productViewLog = ProductVisitUsers::create([
                    'user_id' => $req->session()->get('user_id'),
                    'product_id' => $req->id
                ]);
            }
        }
        $res_json = json_decode(json_encode(Product::where('id',$req->id)->with(['productExtraProp', 'productImagesByMaster'])->first()),true);
        if($res_json != null){
            return response()->json(['status' => 200, 'data' => $res_json]);
        }else {
            return response()->json(['status' => 500, 'msg' => 'Record not found']);
        }
    }

    public function globalSearchByUsers(Request $req) {
        // print_r($req->all());die;
        if(session()->has('user_id') && session()->get('user_role') == 'user'){
            //-----Search log-----
            if(!empty($req->search_text)){
                $search_log = \DB::table('search_history_log')->insert([
                    'user_id' => session()->get('user_id'),
                    'search_keyword' => trim($req->search_text),
                    'search_date' => date('Y-m-d'),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            }
            
        }
        $perPage = 2 * ($req->perPage);
        // print_r('per page : '.$perPage);die;
        if(!empty($req->search_text)){
            $result=[];
            $mst_category = Mst_Category::where('cat_name','LIKE','%'.trim($req->search_text).'%')->get();
            // print_r($mst_category->toArray());die;
            if(count($mst_category) > 0){
                $result['category_wise_product'] = [];
                foreach($mst_category->toArray() as $key => $category){
                    $product_category = Rln_Product_Category::where('rln_category',$category['id'])->with(['getProduct','getProduct.productExtraProp','getProduct.productFirstImg'])->paginate($perPage);
                    // print_r($product_category->toArray());
                    if(count($product_category) > 0){
                        $result['category_wise_product'] = $product_category;
                    }
                }
                if(count($result['category_wise_product']) > 0){
                    $result['filter_status']= 'category';
                    $result['total_items'] = count($result['category_wise_product']);
                    return response()->json(['status'=>200, 'data'=>$result]);
                }
                
            }else{
                $mst_brand = Mst_Brand::where('brand_name','LIKE','%'.trim($req->search_text).'%')->get();
                // print_r($mst_brand->toArray());die;
                if(count($mst_brand) > 0){
                    $result['brand_wise_product'] = [];
                    foreach($mst_brand->toArray() as $key => $brand){
                        $product_category = Rln_Product_Category::where('brand_id',$brand['id'])->get();
                        if(count($product_category) > 0){
                            foreach($product_category->toArray() as $key => $items){
                                // print_r($items);
                                $get_product_by_brand = Product::where('id',$items['product_id'])->with(['productExtraProp','productFirstImg'])->paginate($perPage);
                                // print_r($get_product_by_brand->toArray());
                                if(count($get_product_by_brand) > 0){
                                    $result['brand_wise_product'] = $get_product_by_brand;
                                }
                                
                            }
                            
                        }
                       
                    }
                    if(count($result['brand_wise_product']) > 0){
                        $result['filter_status']= 'brand';
                        $result['total_items'] = count($result['brand_wise_product']);
                        return response()->json(['status'=>200, 'data'=>$result]);
                    }
                }else{
                    $product = Product::where('product_name','LIKE','%'.trim($req->search_text).'%')->with(['productExtraProp', 'productFirstImg'])->paginate($perPage);
                    if(count($product)>0){
                        $filter_status = 'product';
                        $result['product_records']= $product;
                        $result['filter_status']= $filter_status;
                        $result['total_items'] = count($product);
                        return response()->json(['status'=>200, 'data'=>$result]);
                    }
                    else{
                        return response()->json(['status' => 500, 'msg' => 'Record not found']); 
                    }
                }
            }
            return response()->json(['status' => 500, 'msg' => 'Match not found']); 
            // print_r($result->toArray());die;
        }
        
    }

    public function add_to_cart_before_login(Request $req){
        $data = $req->all();
        $product_id = $data['product_id'];
        $getProductDetails = Product::where('id',$product_id)->with(['productExtraProp','productImages'])->first();
        //    print_r($getProductDetails);die;
        
        if($getProductDetails != null){
            $p_quantity = (int)$data['product_quantity'];
            $cartArray = array(
                'id' => $data['product_id'],
                'name' => $getProductDetails->product_name,
                'img' => $getProductDetails['productImages'][0]->image,
                'price' => $getProductDetails['productExtraProp']->price * $p_quantity,
                'mrp_price' => $getProductDetails['productExtraProp']->mrp_price,
                'discount' => $getProductDetails['productExtraProp']->mrp_price - $getProductDetails['productExtraProp']->price,
                'quantity' => $p_quantity,
                'unit' => $getProductDetails->product_unit,
                'weight' => $getProductDetails->weight,
                'initial_price' => $getProductDetails['productExtraProp']->price,
                'original_quantity' => $getProductDetails['productExtraProp']->quantity
            );
            
            if(session()->has('user_id')){
                if(!empty($data['cart_flag']) && $data['cart_flag'] == 'Add_btn_event'){
                    $checkPrevQuantity = UsersCart::select('quantity')->where(['user_id' => session()->get('user_id'), 'product_id' => $product_id])->first();
                            
                    $updateCartProduct = UsersCart::where(['user_id' => session()->get('user_id'), 'product_id' => $product_id])->update(['quantity' => $checkPrevQuantity->quantity + 1]);

                }else if(!empty($data['cart_flag']) && $data['cart_flag'] == 'remove_btn_event'){
                    if($data['product_quantity'] == 1){
                        $removeItemFromCart = UsersCart::where(['user_id' => session()->get('user_id'), 'product_id' => $product_id])->delete();
                    }else{
                        $checkPrevQuantity = UsersCart::select('quantity')->where(['user_id' => session()->get('user_id'), 'product_id' => $product_id])->first();
                    
                        $updateCartProduct = UsersCart::where(['user_id' => session()->get('user_id'), 'product_id' => $product_id])->update(['quantity' => $checkPrevQuantity->quantity - 1]);
                    }
                }else{
                    $checkPrevEntry = UsersCart::where(['user_id' => session()->get('user_id'), 'product_id' => $product_id])->first();
                    if($checkPrevEntry != null){
                        $checkPrevQuantity_event = UsersCart::select('quantity')->where(['user_id' => session()->get('user_id'), 'product_id' => $product_id])->first();
                        $newUpdatedQuantity = $checkPrevQuantity_event->quantity + (int)$data['product_quantity'];
                        // $updateCartProduct_event = UsersCart::where(['user_id' => session()->get('user_id'), 'product_id' => $product_id])->update(['quantity' => $checkPrevQuantity_event->quantity + 1]);

                        $updateCartProduct_event = UsersCart::where(['user_id' => session()->get('user_id'), 'product_id' => $product_id])->update(['quantity' => (int)$newUpdatedQuantity]);
                    }else{
                        if($data['product_quantity'] > 0){
                            $add_product_in_cart = UsersCart::create([
                                'user_id' => session()->get('user_id'),
                                'product_id' => $product_id,
                                'quantity' => $data['product_quantity'],
                                'updated_by' => session()->get('user_id')
                            ]);
                            session()->push('items_in_cart.product', $cartArray); 
    
                            return response()->json(['status' => 200, 'msg' => 'Product added to your cart']);
                        }
                        
                    }
                }
                
            }else{

                if ($req->session()->exists('items_in_cart')) {
                    if(!empty($data['cart_flag']) && $data['cart_flag'] == 'Add_btn_event'){
                        $products = session()->pull('items_in_cart.product', []);
                            // print_r(count($products));die;
                        $Add_btn_event_arr = [];
                        foreach($products as $key => $items){
                            if($items['id'] == $product_id){
                                $updatedQuantity = $items['quantity'] + 1;
                                $Add_btn_event_arr[$key] = $items;
                                $Add_btn_event_arr[$key]['quantity'] = $updatedQuantity;
                                $Add_btn_event_arr[$key]['price'] = $items['initial_price'] * $updatedQuantity;
                                unset($products[$key]);

                                session()->push('items_in_cart.product', $Add_btn_event_arr[$key]);
                            }else{
                                session()->push('items_in_cart.product', $products[$key]);
                            }
                        }
                        
                    }else if(!empty($data['cart_flag']) && $data['cart_flag'] == 'remove_btn_event'){
                        $all_products = session()->pull('items_in_cart.product', []);
                        $remove_btn_event_arr = [];
                        foreach($all_products as $key => $removeItems){
                            if($removeItems['id'] == $product_id){
                                if($removeItems['quantity'] - 1 == 0){
                                    unset($all_products[$key]);
                                }else{
                                    $updatedQuantity = $removeItems['quantity'] - 1;
                                    $remove_btn_event_arr[$key] = $removeItems;
                                    $remove_btn_event_arr[$key]['quantity'] = $updatedQuantity;
                                    $remove_btn_event_arr[$key]['price'] = $removeItems['initial_price'] * $updatedQuantity;
                                    unset($all_products[$key]);

                                    session()->push('items_in_cart.product', $remove_btn_event_arr[$key]);
                                }
                            }else{
                                session()->push('items_in_cart.product', $all_products[$key]);
                            }
                        }
                        
                    }else{
                        
                        $products = session()->pull('items_in_cart.product', []);
                        // print_r(count($products));die;
                        if(count($products) > 0){
                            $check_existing = [];
                            $recent_prod_id = '';
                            foreach($products as $key => $items){
                                if($items['id'] == $product_id){
                                    $recent_prod_id = $items['id'];
                                    $updatedQuantity = $items['quantity'] + (int)$data['product_quantity'];
                                    $check_existing[$key] = $items;
                                    $check_existing[$key]['quantity'] = $updatedQuantity;
                                    $check_existing[$key]['price'] = $items['initial_price'] * $updatedQuantity;
                                    unset($products[$key]);
    
                                    session()->push('items_in_cart.product', $check_existing[$key]);
                                }else {
                                    // session()->push('items_in_cart.product', $cartArray);
                                    session()->push('items_in_cart.product', $products[$key]);
                                }
                            }
                            if($recent_prod_id == $product_id){}else{
                                session()->push('items_in_cart.product', $cartArray);
                            }
                            
                        }else{
                            session()->push('items_in_cart.product', $cartArray);
                        }
                        
                    }
                }else {
                    
                    session()->put('items_in_cart.product',[]);
                    session()->push('items_in_cart.product', $cartArray);
                }
                $get_cart_items = Session('items_in_cart');
                if ($get_cart_items != null) {
                    return response()->json(['status' => 200, 'data' => $get_cart_items]);
                } else {
                    return response()->json(['status' => 500, 'msg' => 'Record not found']);
                }
            }
            
        }
        
    } 
    
    public function get_cart_items_before_login(Request $req){
        if(session()->has('user_id')){
            $get_products = UsersCart::where('user_id',session()->get('user_id'))->get();
            if(count($get_products) > 0){
                session()->put('items_in_cart.product',[]);
                
                $final_arr = [];
                foreach($get_products->toArray() as $key => $cart_items){
                    $getDbData = Product::where('id',$cart_items['product_id'])->with(['productExtraProp','productImages'])->first();
                    // print_r($getDbData->toArray());die;
                    $product_on_cart_db = [];
                    if($getDbData != null){
                        $product_on_cart_db['id'] = $cart_items['product_id'];
                        $product_on_cart_db['name'] = $getDbData->product_name;
                        $product_on_cart_db['img'] = $getDbData['productImages'][0]->image;
                        $product_on_cart_db['price'] = $getDbData['productExtraProp']->price * $cart_items['quantity'];
                        $product_on_cart_db['mrp_price'] = $getDbData['productExtraProp']->mrp_price;
                        $product_on_cart_db['discount'] = $getDbData['productExtraProp']->mrp_price - $getDbData['productExtraProp']->price;
                        $product_on_cart_db['quantity'] = $cart_items['quantity'];
                        $product_on_cart_db['unit'] = $getDbData->product_unit;
                        $product_on_cart_db['weight'] = $getDbData->weight;
                        $product_on_cart_db['initial_price'] = $getDbData['productExtraProp']->price;
                        $product_on_cart_db['original_quantity'] = $getDbData['productExtraProp']->quantity;

                        $final_arr[] = $product_on_cart_db;
                    }
                }
                
                if(count($final_arr) > 0){
                    session()->push('items_in_cart.product',$final_arr);

                    return response()->json(['status' => 200, 'data' => $final_arr]);
                }else{
                    return response()->json(['status' => 500, 'msg' => 'Record not found']);
                }
                
            }else{
                return response()->json(['status' => 500, 'msg' => 'Record not found']);
            }
            // print_r($get_products->toArray());die;
        }else{
            if ($req->session()->exists('items_in_cart')) {
                // session()->flush();
                // $get_cart_items = $req->session()->get('items_in_cart');
                $get_cart_items = session()->pull('items_in_cart.product', []);
                $final_array = [];
                if(count($get_cart_items) > 0){
                    foreach($get_cart_items as $key => $cart_items){
                        // print_r($cart_items);die;
                        $final_array[$key] = $cart_items;
                        $getDbData = Product::where('id',$cart_items['id'])->with(['productExtraProp','productImages'])->first();
                        if($getDbData != null){
                            $final_array[$key]['original_quantity'] = $getDbData['productExtraProp']->quantity;
                            $final_array[$key]['initial_price'] = $getDbData['productExtraProp']->price;
                            $final_array[$key]['mrp_price'] = $getDbData['productExtraProp']->mrp_price;
                            $final_array[$key]['price'] = $getDbData['productExtraProp']->price * (int)$cart_items['quantity'];
                            $final_array[$key]['discount'] = $getDbData['productExtraProp']->mrp_price - $getDbData['productExtraProp']->price;
    
                            session()->push('items_in_cart.product', $final_array[$key]);
                        }
                        // print_r(json_decode(json_encode($getDbData),true));
                    }
                }
                if ($final_array != null) {
                    // print_r($get_cart_items);die;
                    return response()->json(['status' => 200, 'data' => $final_array]);
                } else {
                    return response()->json(['status' => 500, 'msg' => 'Record not found']);
                }
            }
        }
        
    }

    public function getContactDetail(Request $req){
        $contact = ContactUsModel::where('id',$req->id)->first();
        if (!empty($contact)) {
                return response()->json(['status' => 200, 'data' => $contact]);
        } else {
            return response()->json(['status' => 500, 'msg' => 'Data not found']);
        }
        
    }

    public function checkOrdersForSelfDelete(Request $req){
        try{
            DB::beginTransaction();
            $get_all_orders = MasterOrder::selectRaw('*, TIMESTAMPDIFF(HOUR, created_at, NOW()) as difference')->get();
            if(count($get_all_orders) > 0){
                foreach($get_all_orders->toArray() as $order_items){
                    if($order_items['difference'] > 24){
                        // print_r($order_items);
                        $get_product_by_orderId = ProductHistory::where('order_id',$order_items['id'])->first();
                        if($get_product_by_orderId != null){
                            // print_r($get_product_by_orderId->toArray());
                            $get_base_product_detail = Product::where('id', $get_product_by_orderId->product_id)->with(['productExtraProp','productImages'])->first();
                            if($get_base_product_detail != null){
                                $remove_prev_log = ProductHistory::where('product_id',$get_product_by_orderId->product_id)->delete();

                                $update_product_log = ProductHistory::create([
                                    'product_id' => $get_product_by_orderId->product_id,
                                    'order_status' => 1,
                                    'price' => $get_base_product_detail['productExtraProp']->price,
                                    'mrp_price' => $get_base_product_detail['productExtraProp']->mrp_price,
                                    'quantity' => 0,
                                    'updated_by' => session()->get('user_id')
                                ]);
                            }
                        }
                        
                        
                        $delete_Prev_product_log = ProductHistory::where('order_id',$order_items['id'])->delete();

                        $order_items_update_log = MasterOrder::where('id',$order_items['id'])->update(['order_flag' => 'Self_delete', 'comments' => 'Self delete']);
                        $order_self_delete = MasterOrder::where('id',$order_items['id'])->delete();

                    }
                }

                DB::commit();
                return response()->json(['status' => 200, 'msg' => 'Order self-deleted successfully.']);
            }
        }catch (\Exception $e){
            DB::rollback();
            return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time.']);
        }
        
        
        
    }

    function getThemeSliders(Request $req){
        $sliders = ThemeSlider::orderBy('order_id','ASC')->get();
        if(count($sliders) > 0){
            return response()->json(['status' => 200, 'data' => $sliders]);
        }else{
            return response()->json(['status' => 500, 'msg' => 'No sliders found']);
        }
    }

    function getProductSliders(Request $req){
        $sliders = ProductSliders::orderBy('order_id','ASC')->get();
        if(count($sliders) > 0){
            return response()->json(['status' => 200, 'data' => $sliders]);
        }else{
            return response()->json(['status' => 500, 'msg' => 'No sliders found']);
        }
    }


    
}
