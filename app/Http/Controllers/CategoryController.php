<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mst_Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Session;
use Validator;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function get_category(Request $req)
    {
        $data = $req->all();
        $mst_query = Mst_Category::query();
        $mst_query = where('deactivate', 4)->where('deactivate',5);
        if(!empty($data['search_text'])){
            $mst_query->where('ser_name','LIKE','%'.$data['search_text'].'%');
        }
        $mst_query->orderBy('id','DESC'); 
        $get_records = $mst_query->paginate($data['perPage']);
        if($get_records != null){
            $pagination = $get_records->links()->render();
            return response()->json(['status' => 200, 'category_list' => $get_records, 'pagination' => $pagination]);
        }else {
            return response()->json(['status' => 500, 'msg' => 'Record not found']);
        }
    }

    public function create_category(Request $req)
    {
      
        // dd(session::get('user_id'));
        // $name = strtolower($req->ser_name);
        // $req->ser_name = ucfirst($name);
        // $req->validate([
        //     'ser_name'=>'required|unique:mst_services'
        // ]);
        $validator = Validator::make($req->all(), [
            'ser_name'=>'required|unique:mst_services'
        ]);
          if($validator->fails()) {
                    // return Redirect::back()->withErrors($validator);
                    return Redirect::back()->with('messagered', $validator->errors());
        }
        $name = strtolower($req->ser_name);
        $ser_name = Str::slug($name, '-');
                $brand_name = new Mst_Category();
                $brand_name->ser_name=$ser_name;
                $brand_name->service_id=$req->service_id;
                $brand_name->tags=$req->tag;
                $brand_name->save();
        
        return redirect()->back()->with('message','Service has been created successfully!');

    }

    public function editCategory(Request $req){
        $id = $req->id;
        $res_json = Mst_Category::where('id',$id)->first();
        if($res_json != null){
            return response()->json(['status' => 200, 'data' => $res_json]);
        }else {
            return response()->json(['status' => 500, 'msg' => 'Record not found']);
        }
    }
    
    public function update(Request $req)
    {
        $id = $req->id;
        $name = strtolower($req->ser_name);
        $ser_name = Str::slug($name, '-');
        if (Mst_Category::find($id)->update([
          'ser_name'=>$ser_name
        ]))
        {
            return redirect()->back()->with('message', 'Service Name updated successfully!');
        }   
        return Redirect::back()->with('messagered', 'Service Name updation Failed!');
    }

    public function delete_record(Request $request)
    {
        if(Mst_Category::where('id', $request->id)->delete()){
            return response()->json(['status' => 200, 'msg' => 'Service deleted successfully!']);
        }else {     
            return response()->json(['status' => 500, 'messagered' => 'Something went wrong, try again after some time']);
        }
    }

}
