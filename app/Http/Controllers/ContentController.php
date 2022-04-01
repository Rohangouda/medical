<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Banner;
use App\Overview;
use DB;

class ContentController extends Controller
{

    public function create_banner(Request $req)
    {
    //  dd($req);
        // $validated = $req->validate([
        //         'service_name'  => 'required|unique:banner',
        //     ]);
    
            // $query = $this->validate($req, [
            //     'service_id'  => 'required|unique:mst_overview'
            // ]);
        
            // if ($query->fails())
            // {
            //     return redirect('/admin/content')
            //         ->withErrors($query)
            //         ->withInput();
            
    //       DB::transaction(function () use ($req) { 

    //         $var = Overview::create([ 
    //             'service_name'=>$req->service_name,
    //             'tittle'=>$req->banner_tittle,
    //             'description'=>$req->overview_description,
    //             'created_at' => date('Y-m-d H:i:s'),
    //             'updated_at' => date('Y-m-d H:i:s'),
    //             'Deactivate'=>'0'
    //             ]);
    //             $var->save();

    //             $var1 = Banner::create([ 
    //             'service_name'=>$req->service_name,
    //             'tittle'=>$req->overview_tittle,
    //             'description'=>$req->banner_description,
    //             'created_at' => date('Y-m-d H:i:s'),
    //             'updated_at' => date('Y-m-d H:i:s'),
    //             'Deactivate'=>'0'
    //             ]);
    //             $var1->save();
    // });
        $brand_name = new Banner();
        $brand_name->service_name=$req->service_name;
        $brand_name->tittle=$req->banner_tittle;
        $brand_name->description=$req->banner_description;
        $brand_name->Deactivate= '0';
        $brand_name->save();

   
    if($brand_name){
          return redirect()->back()->with('message',' Content has been created successfully!');
    }else {     
        return redirect()->back()->with('messagered',' Something went wrong, try again');
    }
    }

    public function create_overview(Request $req)
    {
    //  dd($req);
 
                $content = Overview::create([ 
                'service_name'=>$req->service_name,
                'tittle'=>$req->overview_tittle,
                'description'=>$req->overview_description,
                'Deactivate'=>'0'
                ]);

    if($content){
          return redirect()->back()->with('message',' Overview Content has been created successfully!');
    }else {     
        return redirect()->back()->with('messagered',' Something went wrong, try again');
    }
    }
}

    // $content = Overview::create([
    //     'service_id'=>$req->service_id,
    //     'tittle'=>$req->overview_tittle,
    //     'description'=>$req->overview_description,
    //     'created_at' => date('Y-m-d H:i:s'),
    //     'updated_at' => date('Y-m-d H:i:s'),
    //     'Deactivate'=>'0'
    // ]);

         // }


            
