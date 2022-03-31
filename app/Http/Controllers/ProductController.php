<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Mst_Category;
use App\Mst_Brand;
use App\Rln_Product_Category;
use App\Product_Image;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\ProductHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function get_product()
    {
    	$cat = Mst_Category::get();
    	$b_data = Mst_Brand::get();
        $data=Product::orderBy('id','DESC')->with('rln_pro_cat','rln_pro_cat.category','rln_pro_cat.brand')->get();
        return view('admin.management.product_list', compact('data','cat','b_data'));
    }

    public function create_product(Request $req)
    {
        // dd($req);
        $req->validate([
            'category'=>'required',
            'mrp_price'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'brand_name'=>'required',
            'filename'=>'required',
            'product_state' =>'required',
            'product_unit'=>'required'
        ],
        [
            'brand_name.required'=> 'Product Name Required*',
            'category'=>'Cartegory Name Required*',
            'mrp_price'=>'MRP Price Required*',
            'price'=>'Peepal Store Price Required*',
            'quantity'=>'Product Quantity Required*',
            'product_state' =>'Product State Required*',
            'product_unit' =>'Product Unit Required*'
         ]);
        DB::transaction(function () use ($req) {
            $brand_name = new Product();
            $brand_name->product_name = $req->brand_name;
            $brand_name->detail = $req->detail;
            $brand_name->updated_by = session::get('user_id');
            $brand_name->product_state =(int)$req->product_state;
            $brand_name->product_unit = $req->product_unit;
            if($req->weight){
                $brand_name->weight = $req->weight;
            }
            $brand_name->save();
            // dd($brand_name);

            $pro_cat = new Rln_Product_Category([
                'product_id' => $brand_name->id,
                'rln_category' => $req->category,
                'brand_id' => $req->brand,
            ]);
            $pro_cat->save();

            //-----add log-----
            $pHistory = ProductHistory::create([
                'product_id' => $brand_name->id,
                'price' =>  $req->price,
                'mrp_price' => $req->mrp_price,
                'quantity' => $req->quantity,
                'order_status' => 1,
                'updated_by' => Session::get('user_id')
            ]);

            if($req->hasFile('filename'))
            {
                $last = Product::orderBy('id','DESC')->first();
                $files = $req->file('filename');
                foreach ($files as $key => $file) 
                {
                    $fileName = $file->getClientOriginalExtension();
                    // upload image in storage folder
                    $file_path = "storage/product/";
                    $fileName = 'product_'.time().'_'.rand(100,999)."." . $fileName;
                    $file->move($file_path, $fileName);
                    //store image
                    $image = Product_Image::create([
                        'product_id' => $last->id,
                        'image' => $fileName,
                        'updated_by' => Session::get('user_id')
                    ]);
                }
            }
        });
        
        return redirect()->back()->with('message','Product has been created successfully');

    }

    // public function getRecordById($id)
    // {
    //     $record = Mst_Brand::where('id',$id)->first();

    //     return view('pages.management.Mst_Brand',compact('record'));

    // }
    
    public function update(Request $request,$id)
    {
        $request->validate([  
        'ser_name'=>'required',  
          
         ],
         [
            'ser_name.required'=> 'Category Name Required*'
         ]);
              
        if (Mst_Category::find($id)->update($request->all()))
        {
            // Session::flash('message', 'Category Name updated');
            redirect()->route('get_category')->with('message', 'Category Name Updated Successfully!');
        }
        // Session::flash('messagered', 'Failed To Update Product Details!');
        return Redirect::back()->with('messagered', 'Failed To Update Product Details!');
    }

    public function delete_record(Request $request)
    {
        $json = array();
        $id = $request['id'];
        if (!empty($id)) {
            $result = Product::find($id);
            $result->delete();
            // Speciality::destroy($id);
            $json['type'] = 'success';
            $json['message'] = 'Product deleted successfully';
            return $json;
        }

        $ids = $request['ids'];
        if (!empty($ids)) {
            $result = Product::find($ids);
            $result->delete();
            // Symptom::destroy($ids);
            $json['type'] = 'success';
            $json['message'] = 'Selected Product name deleted successfully';
            return $json;
        }

        $json['type'] = 'error';
        return $json;
    }

    public function product_list_search(Request $request)
    {
        // return $request;
        $json = array();
        $data = $request['search'];
        if(!empty($data))
        {
             $result = Product::whereExists(function ($query) use ($data) {
                           $query->where('product_name','like','%'.$data.'%');
                       })->orderBy('id','DESC')->with('rln_pro_cat','rln_pro_cat.category','rln_pro_cat.brand')->get();
             return $result;
        }
        else
        {
            $result = Product::orderBy('id','DESC')->with('rln_pro_cat','rln_pro_cat.category','rln_pro_cat.brand')->get();
             return $result;
        }
    }

    public function getProductList(Request $req) {
        $data = $req->all();
        $product_query = Product::query();
        $product_query = Product::whereNull('deleted_at')->with(['rln_pro_cat','rln_pro_cat.category','rln_pro_cat.brand','rln_pro_cat.productImages']);
        if(!empty($data['search_text'])){
            $product_query->where('product_name','LIKE','%'.$data['search_text'].'%');
        }
        $get_records = $product_query->orderBy('id','DESC')->paginate($data['perPage']);
        $res_json = json_decode(json_encode($get_records),true);
        // print_r($res_json);die;
        if(count($get_records) > 0){
            $final_data = [];
            foreach($get_records as $key => $history){
                $final_data['data'][] = json_decode(json_encode($history),true);
                $get_history = ProductHistory::where(['product_id' => $history->id, 'order_status' => 1])->withTrashed()->orderBy('id','DESC')->get();
                // print_r($get_history->toArray());die;
                $total_quantity = 0;
                $quantity_arr = [];
                foreach($get_history as $items){
                    $quantity_arr[] = $items->quantity;
                }
                $final_data['data'][$key]['product_details']['price'] = $get_history[0]->price;
                $final_data['data'][$key]['product_details']['mrp_price'] = $get_history[0]->mrp_price;
                $final_data['data'][$key]['product_details']['quantity'] = array_sum($quantity_arr);
            }
            $pagination = $get_records->links()->render();
            // dd($get_records->links());
            // print_r($get_records->links()->render());
            return response()->json(['status' => 200, 'product_records' => $final_data, 'pagination' => $pagination]);
        }else {
            return response()->json(['status' => 500, 'msg' => 'Record not found']);
        }
    }

    public function editProductRecord(Request $req){
        $id = $req->id;
        $res_json = json_decode(json_encode(Product::whereNull('deleted_at')->with(['rln_pro_cat','rln_pro_cat.category','rln_pro_cat.brand','productImages'])->where('id',$id)->first()),true);
        if($res_json != null){
            $get_history = ProductHistory::where('product_id',$res_json['id'])->withTrashed()->orderBy('id','DESC')->get();
            $res_json['product_details']['price'] = $get_history[0]->price;
            $res_json['product_details']['mrp_price'] = $get_history[0]->mrp_price;
            $quantity_arr = [];
            foreach($get_history as $item){
                $quantity_arr[] = $item->quantity;
            }

            $res_json['product_details']['quantity'] = array_sum($quantity_arr);
            return response()->json(['status' => 200, 'data' => $res_json]);
        }else {
            return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time']);
        }
    }

    public function updateProductRecords(Request $req){
        $data = $req->all();
        // print_r($data);die;
        try{
            DB::beginTransaction();
            
            $update_mst_product = Product::where('id',$data['edit_id'])->update([
                'product_name' => $data['product_name'], 
                'detail' => $data['details'],
                'product_state' => (int)$data['product_state'],
                'product_unit' => $data['product_unit'],
                'weight' => $data['weight'] ?? '',
                'updated_by' => $req->session()->get('user_id')
            ]);

            $brand_id = null;
            if(!empty($data['brand'])){
                $brand_id = $data['brand'];
            }
            $productRlnData = array(
                'product_id' => $data['edit_id'],
                'rln_category' => $data['category_id'],
                'brand_id' => $brand_id,
            );

            $get_rln_data = Rln_Product_Category::whereNull('deleted_at')->where('product_id', $data['edit_id'])->first();
            if(!empty($get_rln_data)){
                $get_rln_data->rln_category = $data['category_id'];
                $get_rln_data->brand_id = $data['brand'];

                if($get_rln_data->isDirty()){
                    $get_rln_data->delete();
                    $newEnrty = Rln_Product_Category::create($productRlnData);
                }

            }
           
            // //-----add log-----
            // $productHostoryData = [
            //     'product_id' => $data['edit_id'],
            //     'price' =>  $data['price'],
            //     'mrp_price' => $data['mrp_price'],
            //     'quantity' => 0,
            // ];

            // $getProductHostory = ProductHistory::whereNull('deleted_at')->where('product_id',$data['edit_id'])->first();
            // if(!empty($getProductHostory)){
            //     $getProductHostory->price = $data['price'];
            //     $getProductHostory->mrp_price = $data['mrp_price'];
            //     if($getProductHostory->isDirty()){
            //         $getProductHostory->delete();
            //         $updateLog = ProductHistory::create($productHostoryData);
            //     }
            // }
            // if(!empty($data['quantity'])){
            //     $get_history = ProductHistory::where('product_id',$data['edit_id'])->withTrashed()->get();
            //     if(count($get_history) > 0){
            //         $quantity_arr = [];
            //         foreach($get_history as $item){
            //             $quantity_arr[] = $item->quantity;
            //         }
            //         $previousQuantity = array_sum($quantity_arr);
            //         if($previousQuantity != $data['quantity']){
            //             $newQuantity = '';
            //             if($previousQuantity < $data['quantity']){
            //                 $newQuantity = $data['quantity'] - $previousQuantity;
            //             }else if($previousQuantity > $data['quantity']){
            //                 $newQuantity = $previousQuantity - $data['quantity'];
            //             }
            //             print_r('newQuantity : '.$newQuantity);
            //             print_r('previousQuantity : '.$previousQuantity);
            //             print_r('new quantity : '.$data['quantity']);die;
            //         }
                    
            //     }
            // }
            
            DB::commit();
            return response()->json(['status' => 200, 'msg' => 'Record updated successfully.']);
        }catch (\Exception $e){
            DB::rollback();
            return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time.']);
        }
        
        
    }

    public function updateProductDetailsByCol(Request $req){
        $data = $req->all();
        // print_r($data);die;
        $getProductHostory = ProductHistory::whereNull('deleted_at')->where('product_id',$data['edit_id'])->first();
        // print_r(json_decode(json_encode($getProductHostory),true));die;
        if($getProductHostory != null){
            if(!empty($data['clicked_col'])){
                if($data['clicked_col'] == 'price'){
                    if(!empty($getProductHostory)){
                        $getProductHostory->price = $data['price'];
                        if($getProductHostory->isDirty()){
                            $status_flag = 1;
                            $getProductHostory->delete();
                            $updateLog = ProductHistory::create([
                                'product_id' => $data['edit_id'],
                                'price' => $data['price'],
                                'mrp_price' => $getProductHostory->mrp_price,
                                'order_status' => 1,
                                'quantity' => 0,
                                'updated_by' => $req->session()->get('user_id')
                            ]);
                        }
                    }
                }else if($data['clicked_col'] == 'mrp_price'){
                    if(!empty($getProductHostory)){
                        $getProductHostory->mrp_price = $data['mrp_price'];
                        if($getProductHostory->isDirty()){
                            $status_flag = 2;
                            $getProductHostory->delete();
                            $updateLog = ProductHistory::create([
                                'product_id' => $data['edit_id'],
                                'price' => $getProductHostory->price,
                                'mrp_price' => $data['mrp_price'],
                                'order_status' => 1,
                                'quantity' => 0,
                                'updated_by' => $req->session()->get('user_id')
                            ]);
                        }
                    }
                }else {
                    if(!empty($data['quantity'])){;
                        // print_r(json_decode(json_encode($getProductHostory),true));die;
                        $deletePrev = ProductHistory::where('id',$getProductHostory->id)->delete();
                        $updateLog = ProductHistory::create([
                            'product_id' => $data['edit_id'],
                            'price' => $getProductHostory->price,
                            'mrp_price' => $getProductHostory->mrp_price,
                            'order_status' => 1,
                            'quantity' => $data['quantity'],
                            'updated_by' => $req->session()->get('user_id')
                        ]);
                        $status_flag = 3;
                    }
                }

                if($status_flag == 1){
                    return response()->json(['status' => 200, 'msg' => 'Price updated successfully.']);
                }else if($status_flag == 2){
                    return response()->json(['status' => 200, 'msg' => ' MRP price updated successfully.']);
                }else if($status_flag == 3){
                    return response()->json(['status' => 200, 'msg' => ' Quantity updated successfully.']);
                }
                
            }else {
                return response()->json(['status' => 500, 'msg' => ' Something went wrong, try again after some time']);
            }
        }else{

        }
    }

    public function deleteProductByRow(Request $req) {
        $id = $req->id;
        try{
            DB::beginTransaction();
            $delete_mst_record = Product::find($id)->delete();
            $delete_rln_record = Rln_Product_Category::where('product_id',$id)->delete();
            $delete_log = ProductHistory::where('product_id',$id)->delete();
            $delete_images = Product_Image::where('product_id',$id)->delete();

            DB::commit();
            return response()->json(['status' => 200,'msg' => 'Product deleted successfully']);
        }catch (\Exception $e){
            DB::rollback();
            return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time.']);
        }
        
    }

    public function exportAsExcel(Request $req) {
        $data = $req->all();
        $product_query = Product::query();
        $product_query = Product::whereNull('deleted_at')->with(['rln_pro_cat','rln_pro_cat.category','rln_pro_cat.brand']);
        $get_records = $product_query->orderBy('id','DESC')->get();
        $res_json = json_decode(json_encode($get_records),true);
        // print_r($res_json);die;
        if(count($get_records) > 0){
            $final_data = [];
            foreach($get_records as $key => $history){
                $final_data['data'][] = json_decode(json_encode($history),true);
                $get_history = ProductHistory::where('product_id',$history->id)->withTrashed()->orderBy('id','DESC')->get();
                $total_quantity = 0;
                $quantity_arr = [];
                foreach($get_history as $items){
                    $quantity_arr[] = $items->quantity;
                }
                $final_data['data'][$key]['product_details']['price'] = $get_history[0]->price;
                $final_data['data'][$key]['product_details']['mrp_price'] = $get_history[0]->mrp_price;
                $final_data['data'][$key]['product_details']['quantity'] = array_sum($quantity_arr);
            }
            return response()->json(['status' => 200, 'product_records' => $final_data]);
        }else {
            return response()->json(['status' => 500, 'msg' => 'Record not found']);
        }
    }

    public function productSellDetails(Request $req)
    {
        $id = $req->id;
        $res_json = json_decode(json_encode(Product::whereNull('deleted_at')->with(['productOrderDetails','productOrderDetails.getUser'])->where('id',$id)->first()),true);
        if($res_json != null){
            return response()->json(['status' => 200, 'data' => $res_json]);
        }else {
            return response()->json(['status' => 500, 'msg' => 'Order Details Not Found!']);
        }
    }

    function cloneeProductRecords(Request $req){
        // print_r($req->all());die;
    }

}
