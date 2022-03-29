<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mst_Brand;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
class BrandController extends Controller
{
    
    
    // public function get_brand()
    // {
    //   $data=Mst_Brand::orderBy('id','DESC')->get();
    //   dd($data);
    //     return view('admin.management.brand_list', compact('data'));  
    // }

    public function create_brand(Request $req)
    {
        $name = trim(strtolower($req->brand_name));
        $req->brand_name = ucfirst($name);
        $req->validate([  
            'brand_name'=>'required|unique:mst_brands'  
        ]);  
        $brand_name = new Mst_Brand();
        $brand_name->brand_name=$req->brand_name;
        $brand_name->updated_by = Session::get('user_id');
        $brand_name->save();
        return redirect()->back()->with('message','Brand has been created successfully');
       
      
    } 
    
    public function update(Request $request,$id)
    {
         $request->validate([  
        'brand_name'=>'required|unique:mst_brands',  
          
         ],
         [
            'brand_name.required'=> 'Brand Name Required*'
         ]);
              
        if (Mst_Brand::find($id)->update($request->all()))
        {
            return redirect('/admin/master-record/brand_list')->with('message', 'Brand Name updated successfully!');
        }
        else{
        return Redirect::back()->with('messagered', 'Failed to update Brand Name!'); 
        }
    }

    public function delete_record(Request $request)
    { 
        if(Mst_Brand::where('id',$request->action_id)->delete()){
            return response()->json(['status' => 200, 'msg' => 'Brand deleted successfully.']);
        }else {
            return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time']);
        }
    }

    public function getAllBrandsRecord(Request $req){
        $data = $req->all();
        $brand_query = Mst_Brand::query();
        $brand_query = Mst_Brand::whereNull('deleted_at');
        if(!empty($data['search_text'])){
            $brand_query->where('brand_name','LIKE','%'.$data['search_text'].'%');
        }
        $brand_query->orderBy('id','DESC'); 
        $get_records = $brand_query->paginate($data['perPage']);
        if($get_records != null){
            $pagination = $get_records->links()->render();
            return response()->json(['status' => 200, 'brand_list' => $get_records, 'pagination' => $pagination]);
        }else {
            return response()->json(['status' => 500, 'msg' => 'Record not found']);
        }
    }

    public function editBrandDetail(Request $req){
        $res_json = Mst_Brand::where('id',$req->action_id)->first();
        return response()->json(['status' => 200, 'data' => $res_json]);
    }

}
