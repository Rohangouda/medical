<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mst_Category;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function get_category(Request $req)
    {
        $data = $req->all();
        $mst_query = Mst_Category::query();
        $mst_query = Mst_Category::whereNull('deleted_at');
        if(!empty($data['search_text'])){
            $mst_query->where('cat_name','LIKE','%'.$data['search_text'].'%');
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
        // dd($req);
        // dd(session::get('user_id'));
        $name = strtolower($req->cat_name);
        $req->cat_name = ucfirst($name);
        $req->validate([
            'cat_name'=>'required|unique:mst_categories'
        ]);
        $brand_name = new Mst_Category();
                $brand_name->cat_name=$req->cat_name;
                $brand_name->level=1;
                $brand_name->updated_by=session::get('user_id');
                $brand_name->save();
            print_r($brand_name);
        // DB::transaction(function () use ($req) {
        //     if($req->hasFile('image'))
        //     {
        //         $file = $req->file('image');
        //         $fileName = $file->getClientOriginalExtension();
        //         // upload
        //         $file_path = "storage/category/";
        //         $random = rand(1, 100);
        //         $fileName = $req->cat_name . "." . $fileName;
        //         $file->move($file_path, $fileName);

        //         $brand_name = new Mst_Category();
        //         $brand_name->cat_name=$req->cat_name;
        //         $brand_name->image=$fileName;
        //         $brand_name->level=1;
        //         $brand_name->updated_by=session::get('user_id');
        //         $brand_name->save();
        //     }
        // });
        
        return redirect()->back()->with('message','Category has been created successfully!');

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
    
    public function update(Request $request,$id)
    {
        $request->validate([  
        'cat_name'=>'required|unique:mst_categories',  
          
         ],
         [
            'cat_name.required'=> 'Category Name Required*'
         ]);
              
        if (Mst_Category::find($id)->update($request->all()))
        {
            return redirect()->back()->with('message', 'Category Name updated successfully!');
        }   
        return Redirect::back()->with('messagered', 'Category Name updation Failed!');
    }

    public function delete_record(Request $request)
    {
        if(Mst_Category::where('id', $request->id)->delete()){
            return response()->json(['status' => 200, 'msg' => 'Category deleted successfully!']);
        }else {     
            return response()->json(['status' => 500, 'messagered' => 'Something went wrong, try again after some time']);
        }
    }

}
