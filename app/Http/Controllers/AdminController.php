<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\MasterOrder;
use App\ProductHistory;
use App\ContactUsModel;
use Hash;
use App\Product;
use App\SearchLogHistory;
use App\ThemeSlider;
use App\ProductSliders;

class AdminController extends Controller
{
    public function getStaffUsersRecords(Request $req){
        $data = $req->all();
        if(session()->get('user_role') == 'Admin'){
            $user_list = User::whereNull('deleted_at')
                            ->orderBy('id','DESC')
                            ->where('role', '!=', 'Admin');
            if(!empty($data['user_type'])){
                $user_list->where('role',trim($data['user_type']));
            }
            if(!empty($data['search_text'])){
                $search_query = $user_list->newQuery();
                $searchText = strtolower(trim($data['search_text']));
                $search_query = $search_query->get()->map(function($item) use($searchText) {
                    if (strpos(strtolower($item->first_name." ".$item->last_name), $searchText) !== false || strpos(strtolower($item->mobile), $searchText) !== false) {
                        return $item;
                    }
                })->filter(function ($value) {
                    return !is_null($value);
                })->values();

                $total = $search_query->count();
                $pageSize = $data['perPage'];
                
                if($total > 0){
                    $pagination = "";
                    $search_res['data'] = $search_query;
                    return response()->json(['status' => 200, 'user_list' => $search_res, 'pagination' => $pagination]);
                }else {
                    return response()->json(['status' => 500, 'msg' => 'Record not found']);
                }
                

            }
            $res = $user_list->paginate($data['perPage']);
            if(count($res) > 0){
                $pagination = $res->links()->render();
                return response()->json(['status' => 200, 'user_list' => $res, 'pagination' => $pagination]);
            }else {
                return response()->json(['status' => 500, 'msg' => 'Record not found']);
            }
        }else{
            $db_query = User::whereNull('deleted_at')
                        ->orderBy('id','DESC')
                        ->where('role','=','user');
            if(!empty($data['search_text'])){
                $search_query = $db_query->newQuery();
                $searchText = strtolower(trim($data['search_text']));
                $search_query = $search_query->get()->map(function($item) use($searchText) {
                    if (strpos(strtolower($item->first_name." ".$item->last_name), $searchText) !== false || strpos(strtolower($item->mobile), $searchText) !== false) {
                        return $item;
                    }
                })->filter(function ($value) {
                    return !is_null($value);
                })->values();

                $total = $search_query->count();
                $pageSize = $data['perPage'];
                
                if($total > 0){
                    $pagination = "";
                    $search_res['data'] = $search_query;
                    return response()->json(['status' => 200, 'user_list' => $search_res, 'pagination' => $pagination]);
                }else {
                    return response()->json(['status' => 500, 'msg' => 'Record not found']);
                }
            }
            
            $res = $db_query->paginate($data['perPage']);
            if(count($res) > 0){
                $pagination = $res->links()->render();
                return response()->json(['status' => 200, 'user_list' => $res, 'pagination' => $pagination]);
            }else {
                return response()->json(['status' => 500, 'msg' => 'Record not found']);
            }
        }
    }

    public function resetPasswordByAdmin(Request $req){
        $id = $req->id;
        $hash_new_pass = \Hash::make('welcome@Peepal');
        if(User::where('id',$id)->update(['password' => $hash_new_pass])){
            return response()->json(['status' => 200, 'msg' => 'Password reset successfully']);
        }else {
            return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time']);
        }
    }

    public function addStaff(Request $req){
        $data = $req->all();
        unset($data['_token']);
        $registerStaff = User::create([
            'role' => 'Staff',
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'password' => bcrypt('welcome@Peepal'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        if($registerStaff){
            return response()->json(['stautus' => 200, 'msg' => 'Staff added successfully.']);
        }else {
            return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time']);
        }
    }

    public function getAllOrders(Request $req){
        $data = $req->all();
        $get_orders = MasterOrder::query();
        $get_orders = MasterOrder::where('order_flag','=','Ordered');
        if(!empty($data['search_input'])){
            $get_orders->where('order_id','LIKE','%'.trim($data['search_input']).'%');
        }
        $get_orders->orderBy('id','DESC')->select('order_id','user_id', DB::raw('count(*) as total'));
        $get_orders->groupBy('order_id','user_id')->with(['productDetails','getUser']);
        $res = $get_orders->paginate($data['perPage']);
        
        if(count($res) > 0){
            $pagination = $res->links()->render();
            return response()->json(['status' => 200, 'order_list' => $res, 'pagination' => $pagination]);
        }else {
            return response()->json(['status' => 500, 'msg' => 'Record not found']);
        }
    }

    public function viewOrderByStaff(Request $req){
        $order_query = MasterOrder::where('order_id',$req->id)
                        ->with(['productDetails','getUser','productDetails.productFirstImg','productDetails.productExtraProp'])
                        ->where('order_flag','=','Ordered')->get();
        // dd($order_query);
        $res_json = json_decode(json_encode($order_query),true);
        if($res_json != null){
            return response()->json(['status' => 200, 'data' => $res_json]);
        }else{
            return response()->json(['status' => 500, 'msg' => 'Record not found']);
        }
    }

    public function deleteOrderByStaff(Request $req){
        $data = $req->all();
        try{
            DB::beginTransaction();

            $get_mst_orders = MasterOrder::where('order_id',$data['id'])->get();
            if(count($get_mst_orders) > 0){
                // print_r($get_mst_orders->toArray());
                foreach($get_mst_orders->toArray() as $order_items){

                    $updateComment = MasterOrder::where('id',$order_items['id'])->update(['comments' => $data['delete_comments'], 'order_flag' => 'Cancel']);

                    $deleteOrder = MasterOrder::where('id',$order_items['id'])->delete();

                    $deleteHistory = ProductHistory::where('order_id', $order_items['id'])->delete();
                }
            }
            
            DB::commit();
            return response()->json(['status' => 200, 'msg' => 'Order deleted successfully.']);
        }catch (\Exception $e){
            DB::rollback();
            return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time.']);
        }

    }

    public function contact_us_update(Request $req)
    {
        if(empty(ContactUsModel::first()))
        {
           $data = ContactUsModel::create([
            'mobile' => $req->mobile,
            'whatsapp_mobile' => $req->whatsapp_mobile,
            'email' => $req->email,
            'address' => $req->address ?? ''
           ]);
           return redirect()->back()->with('message', 'Contact-us Details Saved successfully!');
        }
        else
        {
            $data = ContactUsModel::first()->update([
            'mobile' => $req->mobile,
            'whatsapp_mobile' => $req->whatsapp_mobile,
            'email' => $req->email,
            'address' => $req->address ?? ''
           ]);
           return redirect()->back()->with('message', 'Contact-us Details Updated successfully!');
        }
    }

     public function getAllOrdersReport(Request $req)
     { 
        $data = $req->all();
        // return $data;
        $get_orders = MasterOrder::query();
        $get_orders = MasterOrder::where('order_flag','=','Delivered');
        if(!empty($data['start']))
        {
            foreach($get_orders as $g_order){
                $created_date = strtotime($g_order->created_at);
                $get_orders->whereBetween($created_date,[$data['start'],$data['end']]);
            }
        }
        // retrun $get_orders;
        if(!empty($data['payment_mode'])) {
            $get_orders->where('order_mode',trim($data['payment_mode']));
        }
        if(!empty($data['search_input'])){
            $get_orders->where('order_id','LIKE','%'.trim($data['search_input']).'%');
        }
        $get_orders->orderBy('id','DESC')->select('order_id','order_mode','user_id', DB::raw('count(*) as total'));
        $get_orders->groupBy('order_id','user_id','order_mode')->with(['productDetails','getUser']);
        $res = $get_orders->paginate($data['perPage']);
        // return $res;
        
        if(count($res) > 0){
            $pagination = $res->links()->render();
            return response()->json(['status' => 200, 'order_list' => $res, 'pagination' => $pagination]);
        }else {
            return response()->json(['status' => 500, 'msg' => 'Record not found']);
        }
    }

    public function viewOrderDetail(Request $req){
        $order_query = MasterOrder::where('order_id',$req->id)
                        ->with(['productDetails','getUser','productDetails.productFirstImg','productDetails.productExtraProp'])->withTrashed()->get();
        $res_json = json_decode(json_encode($order_query),true);
        if($res_json != null){
            return response()->json(['status' => 200, 'data' => $res_json]);
        }else{
            return response()->json(['status' => 500, 'msg' => 'Record not found']);
        }
    }

    public function orderDeleveredByStaff(Request $req){
        $data = $req->all();
        try{
            DB::beginTransaction();

            $get_mst_orders = MasterOrder::where('order_id',$data['id'])->get();
            if(count($get_mst_orders) > 0){
                // print_r($get_mst_orders->toArray());
                foreach($get_mst_orders->toArray() as $order_items){
                    $get_product_by_orderId = ProductHistory::where('order_id',$order_items['id'])->first();
                    // print_r($order_items);
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
                    $updateComment = MasterOrder::where('id',$order_items['id'])->update(['comments' => 'delivered by -'.session()->get('user_id'), 'order_flag' => 'Delivered', 'order_mode' => $data['payment_mode']]);

                }
            }
            
            DB::commit();
            return response()->json(['status' => 200, 'msg' => 'Order delivered successfully.']);
        }catch (\Exception $e){
            DB::rollback();
            return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time.']);
        }
    }

    public function searchLogReports(Request $req){
        $data = $req->all();
        $search_list = SearchLogHistory::select(DB::raw('user_id, count(*) as total'))->with(['get_user'])->groupBy('user_id')->paginate($data['perPage']);
        
        if(!empty($data['search_text'])){
            $search_query = SearchLogHistory::select(DB::raw('user_id, count(*) as total'))->with(['get_user'])->groupBy('user_id');
            $searchText = strtolower(trim($data['search_text']));
            $search_query = $search_query->get()->map(function($item) use($searchText) {
                // print_r($item->toArray());die;
                if (strpos(strtolower($item->get_user->first_name." ".$item->get_user->last_name), $searchText) !== false) {
                    return $item;
                }
            })->filter(function ($value) {
                return !is_null($value);
            })->values();

            $total = $search_query->count();
            $pageSize = $data['perPage'];
            
            if($total > 0){
                $pagination = "";
                $search_res['data'] = $search_query;
                return response()->json(['status' => 200, 'search_list' => $search_res, 'pagination' => $pagination]);
            }else {
                return response()->json(['status' => 500, 'msg' => 'Record not found']);
            }
        }
        if(count($search_list) > 0){
            $pagination = $search_list->links()->render();
            return response()->json(['status' => 200, 'search_list' => $search_list, 'pagination' => $pagination]);
        }else{
            return response()->json(['status' => 500, 'msg' => 'Record not found']);
        }
    }

    public function detalSearchReportByUser(Request $req){
        $search_list = SearchLogHistory::select(DB::raw('search_date, count(*) as total'))->where('user_id',$req->user_id)->groupBy(['search_date'])->get();
        if(count($search_list) > 0){
            // print_r($search_list->toArray());die;
            $final_arr = [];
            foreach($search_list->toArray() as $key => $items){
                $res = SearchLogHistory::select(DB::raw('search_keyword, count(*) as total'))->where('search_date',$items['search_date'])->where('user_id',$req->user_id)->groupBy('search_keyword')->get();
                if(count($res) > 0){
                    $final_arr[$key][] = $res->toArray();
                    // $final_arr[$key]['search_keyword'] = $res->search_keyword;
                    $final_arr[$key]['search_date'] = $items['search_date'];
                }
                // print_r($res->toArray());
            }
            if(count($final_arr) > 0){
                return response()->json(['status' => 200, 'data' => $final_arr]);
            }
            
        }else{
            return response()->json(['status' => 500, 'msg' => 'Spmething went wrong, try again after some time']);
        }
    }

    //-----Theme slider-----
    public function addThemeSlider(Request $req)
    {
        $data = $req->all();
        $gethomedata = ThemeSlider::select('order_id')->get();
        if (count($gethomedata) <= 9){
            if (count($gethomedata) > 0) {
                $result = ThemeSlider::select('order_id')->where('order_id', $data['order'])->get();
                if (!empty($data['order'])) {
                    if (count($result) > 0) {
                        return response()->json(['status' => 500, 'msg' => 'Please Select Different Order Id!']);
                    } else {
                        $file = $req->file('image');
                        $fileName = $file->getClientOriginalExtension();
                        // upload
                        $file_path = "storage/theme_images/";
                        $random = rand(100, 999);
                        $fileName = 'theme_' . time() . "." . $fileName;
                        $file->move($file_path, $fileName);
                        $filesEntry = new ThemeSlider();
                        $filesEntry->image_name = $fileName;
                        $filesEntry->order_id = $data['order'];
                        $filesEntry->updated_by = session()->get('user_id');
                        if ($filesEntry->save()) {
                            return response()->json(['status' => 200, 'msg' => 'Home Slider Added Successfully!']);
                        } else {
                            return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time.']);
                        }
                    }
                } else {
                    $gethomedata = ThemeSlider::select('order_id')->get();
                    $newOrder = ThemeSlider::select('order_id')->max('order_id');
//                print_r($newOrder);
                    $file = $req->file('image');
                    $fileName = $file->getClientOriginalExtension();
                    // upload
                    $file_path = "storage/theme_images/";
                    $random = rand(100, 999);
                    $fileName = 'theme_' . time() . "." . $fileName;
                    $file->move($file_path, $fileName);
                    $filesEntry = new ThemeSlider();
                    $filesEntry->image_name = $fileName;
                    $filesEntry->order_id = (int)$newOrder + 1;
                    $filesEntry->updated_by = session()->get('user_id');
                    if ($filesEntry->save()) {
                        return response()->json(['status' => 200, 'msg' => 'Home Slider Added Successfully!']);
                    } else {
                        return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time.']);
                    }
                }

            } else {
                if (!empty($data['order'])) {
                    $file = $req->file('image');
                    $fileName = $file->getClientOriginalExtension();
                    // upload
                    $file_path = "storage/theme_images/";
                    $random = rand(100, 999);
                    $fileName = 'theme_' . time() . "." . $fileName;
                    $file->move($file_path, $fileName);
                    $filesEntry = new ThemeSlider();
                    $filesEntry->image_name = $fileName;
                    $filesEntry->order_id = $data['order'];
                    $filesEntry->updated_by = session()->get('user_id');
                    if ($filesEntry->save()) {
                        return response()->json(['status' => 200, 'msg' => 'Home Slider Added Successfully!']);
                    } else {
                        return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time.']);
                    }
                } else {
                    $gethomedata = ThemeSlider::select('order_id')->get();
                    $file = $req->file('image');
                    $fileName = $file->getClientOriginalExtension();
                    // upload
                    $file_path = "storage/theme_images/";
                    $random = rand(100, 999);
                    $fileName = 'theme_' . time() . "." . $fileName;
                    $file->move($file_path, $fileName);
                    $filesEntry = new ThemeSlider();
                    $filesEntry->image_name = $fileName;
                    $filesEntry->order_id = 1;
                    $filesEntry->updated_by = session()->get('user_id');
                    if ($filesEntry->save()) {
                        return response()->json(['status' => 200, 'msg' => 'Home Slider Added Successfully!']);
                    } else {
                        return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time.']);
                    }
                }
            }
        } else{
            return response()->json(['status' => 500, 'msg' => 'Request Declined! , Maximum order limit is 10.']);
        }
    }

    function getThemeSlider(Request $req){
        $res = ThemeSlider::orderBy('id','DESC')->get();
        if(count($res) > 0){
            return response()->json(['status' => 200, 'data' => $res]);
        }else{
            return response()->json(['status' => 500, 'msg' => 'No record found']);
        }
    }

    public function editThemeSliderDetail(Request $req){
        $res_json = ThemeSlider::where('id',$req->action_id)->first();
        return response()->json(['status' => 200, 'data' => $res_json]);
    }

    function updateTheme(Request $req){
        $data = $req->all();
        // print_r($data);die;
        $file = $req->file('image_name');
        if($file != ''){
            if(!empty($data['order_id'])){
                $res_json = json_decode(json_encode(ThemeSlider::where('id','!=',$req->update_id)->get()),true);
                if(count($res_json) > 0){
                    foreach($res_json as $key => $items){
                        if($items['order_id'] == $data['order_id']){
                            return response()->json(['status' => 500, 'msg' => 'Please change image order number']);
                        }else{
                            $delete_old_one = ThemeSlider::where('id',$req->update_id)->delete();

                            $fileName = $file->getClientOriginalExtension();
                            // upload image 
                            $file_path = "storage/theme_images/";
                            $random = rand(100, 999);
                            $fileName = 'theme_' . time() . "." . $fileName;
                            $file->move($file_path, $fileName);

                            $filesEntry = new ThemeSlider();
                            $filesEntry->image_name = $fileName;
                            $filesEntry->order_id = $data['order_id'];
                            $filesEntry->updated_by = session()->get('user_id');
                            if ($filesEntry->save()) {
                                return response()->json(['status' => 200, 'msg' => 'Home slider updated Successfully!']);
                            } else {
                                return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time.']);
                            }
                        }
                    }
                }
                
            }
        }else{  //not have image
            $res_json = json_decode(json_encode(ThemeSlider::where('id','!=',$req->update_id)->get()),true);
            if(count($res_json) > 0){
                foreach($res_json as $key => $items){
                    if($items['order_id'] == $data['order_id']){
                        return response()->json(['status' => 500, 'msg' => 'Please change image order number']);
                    }else{
                        $update_order_id = ThemeSlider::where('id', $req->update_id)->update(['order_id' => $data['order_id']]);
                        if($update_order_id){
                            return response()->json(['status' => 200, 'msg' => 'Home slider updated Successfully!']);
                        }else{
                            return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time.']);
                        }
                    }
                }
            }

            // return response()->json(['status' => 200, 'msg' => 'Home theme updated successfully.']);
        }
    }
    
    public function deleteThemeSlider(Request $req){
        if(ThemeSlider::where('id',$req->id)->delete()){
            return response()->json(['status' => 200, 'msg' => 'Home Slider deleted successfully.']);
        }else {
            return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time']);
        }
    }

    //-----Product sliders------

    function getProductSlider(Request $req){
        $res = ProductSliders::orderBy('id','DESC')->get();
        if(count($res) > 0){
            return response()->json(['status' => 200, 'data' => $res]);
        }else{
            return response()->json(['status' => 500, 'msg' => 'No record found']);
        }
    }

    function addProductSlider(Request $req){
        $data = $req->all();
        $gethomedata = ProductSliders::select('order_id')->get();
        if (count($gethomedata) <= 9){
            if (count($gethomedata) > 0) {
                $result = ProductSliders::select('order_id')->where('order_id', $data['order'])->get();
                if (!empty($data['order'])) {
                    if (count($result) > 0) {
                        return response()->json(['status' => 500, 'msg' => 'Please Select Different Order Id!']);
                    } else {
                        $file = $req->file('image');
                        $fileName = $file->getClientOriginalExtension();
                        // upload
                        $file_path = "storage/product_themes/";
                        $random = rand(100, 999);
                        $fileName = 'theme_' . time() . "." . $fileName;
                        $file->move($file_path, $fileName);
                        $filesEntry = new ProductSliders();
                        $filesEntry->image_name = $fileName;
                        $filesEntry->order_id = $data['order'];
                        $filesEntry->updated_by = session()->get('user_id');
                        if ($filesEntry->save()) {
                            return response()->json(['status' => 200, 'msg' => 'Product Slider Added Successfully!']);
                        } else {
                            return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time.']);
                        }
                    }
                } else {
                    $gethomedata = ProductSliders::select('order_id')->get();
                    $newOrder = ProductSliders::select('order_id')->max('order_id');
//                print_r($newOrder);
                    $file = $req->file('image');
                    $fileName = $file->getClientOriginalExtension();
                    // upload
                    $file_path = "storage/product_themes/";
                    $random = rand(100, 999);
                    $fileName = 'theme_' . time() . "." . $fileName;
                    $file->move($file_path, $fileName);
                    $filesEntry = new ProductSliders();
                    $filesEntry->image_name = $fileName;
                    $filesEntry->order_id = (int)$newOrder + 1;
                    $filesEntry->updated_by = session()->get('user_id');
                    if ($filesEntry->save()) {
                        return response()->json(['status' => 200, 'msg' => 'Product Slider Added Successfully!']);
                    } else {
                        return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time.']);
                    }
                }

            } else {
                if (!empty($data['order'])) {
                    $file = $req->file('image');
                    $fileName = $file->getClientOriginalExtension();
                    // upload
                    $file_path = "storage/product_themes/";
                    $random = rand(100, 999);
                    $fileName = 'theme_' . time() . "." . $fileName;
                    $file->move($file_path, $fileName);
                    $filesEntry = new ProductSliders();
                    $filesEntry->image_name = $fileName;
                    $filesEntry->order_id = $data['order'];
                    $filesEntry->updated_by = session()->get('user_id');
                    if ($filesEntry->save()) {
                        return response()->json(['status' => 200, 'msg' => 'Product Slider Added Successfully!']);
                    } else {
                        return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time.']);
                    }
                } else {
                    $gethomedata = ProductSliders::select('order_id')->get();
                    $file = $req->file('image');
                    $fileName = $file->getClientOriginalExtension();
                    // upload
                    $file_path = "storage/product_themes/";
                    $random = rand(100, 999);
                    $fileName = 'theme_' . time() . "." . $fileName;
                    $file->move($file_path, $fileName);
                    $filesEntry = new ProductSliders();
                    $filesEntry->image_name = $fileName;
                    $filesEntry->order_id = 1;
                    $filesEntry->updated_by = session()->get('user_id');
                    if ($filesEntry->save()) {
                        return response()->json(['status' => 200, 'msg' => 'Product Slider Added Successfully!']);
                    } else {
                        return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time.']);
                    }
                }
            }
        } else{
            return response()->json(['status' => 500, 'msg' => 'Request Declined! , Maximum order limit is 10.']);
        }
    }

    function editProductSliderDetail(Request $req){
        $res_json = ProductSliders::where('id',$req->action_id)->first();
        return response()->json(['status' => 200, 'data' => $res_json]);
    }

    function deleteProductSlider(Request $req){
        if(ProductSliders::where('id',$req->id)->delete()){
            return response()->json(['status' => 200, 'msg' => 'Product Slider deleted successfully.']);
        }else {
            return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time']);
        }
    }

    function updateProductSliders(Request $req){
        $data = $req->all();
        // print_r($data);die;
        $file = $req->file('image_name');
        if($file != ''){
            if(!empty($data['order_id'])){
                $res_json = json_decode(json_encode(ProductSliders::where('id','!=',$req->update_id)->get()),true);
                if(count($res_json) > 0){
                    foreach($res_json as $key => $items){
                        if($items['order_id'] == $data['order_id']){
                            return response()->json(['status' => 500, 'msg' => 'Please change image order number']);
                        }else{
                            $delete_old_one = ProductSliders::where('id',$req->update_id)->delete();

                            $fileName = $file->getClientOriginalExtension();
                            // upload image 
                            $file_path = "storage/theme_images/";
                            $random = rand(100, 999);
                            $fileName = 'theme_' . time() . "." . $fileName;
                            $file->move($file_path, $fileName);

                            $filesEntry = new ProductSliders();
                            $filesEntry->image_name = $fileName;
                            $filesEntry->order_id = $data['order_id'];
                            $filesEntry->updated_by = session()->get('user_id');
                            if ($filesEntry->save()) {
                                return response()->json(['status' => 200, 'msg' => 'product slider updated Successfully!']);
                            } else {
                                return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time.']);
                            }
                        }
                    }
                }
                
            }
        }else{  //not have image
            $res_json = json_decode(json_encode(ProductSliders::where('id','!=',$req->update_id)->get()),true);
            if(count($res_json) > 0){
                foreach($res_json as $key => $items){
                    if($items['order_id'] == $data['order_id']){
                        return response()->json(['status' => 500, 'msg' => 'Please change image order number']);
                    }else{
                        $update_order_id = ProductSliders::where('id', $req->update_id)->update(['order_id' => $data['order_id']]);
                        if($update_order_id){
                            return response()->json(['status' => 200, 'msg' => 'product slider updated Successfully!']);
                        }else{
                            return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time.']);
                        }
                    }
                }
            }

        }
    }

}
