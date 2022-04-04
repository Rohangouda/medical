<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Banner;
use App\Overview;
use App\FAQ;
use App\Testimonials;
use Illuminate\Support\Str;
use DB;

class ContentController extends Controller
{

    public function create_banner(Request $req)
    {
    
         if($req->id == null)
         {
            $validator = Validator::make($req->all(), [
                'service_name'  => 'required|unique:banner',
                'banner_tittle' => 'required|min:6',
                'banner_description' => 'required|min:9'
            ]);
        
            // if($validator->fails()) {
            //     return Redirect::back()->withErrors($validator);
            // }
            if($validator->fails()){
                return redirect()->back()->with(['error'=> $validator->errors()]);
            }

                $brand_name = new Banner();
                $brand_name->service_name=$req->service_name;
                $brand_name->tittle=$req->banner_tittle;
                $brand_name->description=$req->banner_description;
                $brand_name->Deactivate= '0';
                $brand_name->save();
            return redirect()->back()->with('message',' Banner has been created successfully!');
        }
        else{
            $validator = Validator::make($req->all(), [
                'banner_tittle' => 'required|min:6',
                'banner_description' => 'required|min:9'
            ]);
        
            if($validator->fails()){
                return redirect()->back()->with(['error'=> $validator->errors()]);
            }

            $update= Banner::whereNull('deleted_at')->where('Banner_ID', $req->id)->update([

                'service_name'=> $req->service_name,
              'tittle'=>$req->banner_tittle,
               'description'=>$req->banner_description
             ]);
               return redirect()->back()->with('message',' Banner has been Updated successfully!');
            }
    }

    public function create_overview(Request $req)
    {
    
                if($req->id == null)
                {
                    $validator = Validator::make($req->all(), [
                        'service_name'  => 'required|unique:mst_overview',
                        'overview_tittle' => 'required|min:6',
                        'overview_description' => 'required|min:9'
                    ]);
    
                    // if($validator->fails()) {
                    //     return Redirect::back()->withErrors($validator);
                    // }
                    if($validator->fails()){
                        return redirect()->back()->with(['error'=> $validator->errors()]);
                    }
       
                   $content = Overview::create([ 
                    'service_name'=>$req->service_name,
                    'tittle'=>$req->overview_tittle,
                    'description'=>$req->overview_description,
                    'Deactivate'=>'0'
                    ]);
                   return redirect()->back()->with('message',' Overview has been created successfully!');
               }
               else{
                //    dd($req);
                $validator = Validator::make($req->all(), [
                    'overview_tittle' => 'required|min:10',
                    'overview_description' => 'required|min:20'
                ]);

                // if($validator->fails()) {
                //     return Redirect::back()->withErrors($validator);
                // }
                if($validator->fails()){
                    return redirect()->back()->with(['error'=> $validator->errors()]);
                }
       
                   $update= Overview::whereNull('deleted_at')->where('Overview_ID', $req->id)->update([
                       'tittle'=>$req->overview_tittle,
                      'description'=>$req->overview_description
                    ]);
                      return redirect()->back()->with('message',' Overview has been Updated successfully!');
               }
    }


    public function create_testimonials(Request $req)
    {
          $validator = Validator::make($req->all(), [
             'name'=>'required|min:3', 
             'message'=>'required|min:15',
             'city'=>'required|min:3'
             ]);
            if ($validator->fails()) {
             return redirect()->back()->with([ 'error' => ($validator->messages())]);
            }
        $customers = new Testimonials();
        $customers->name=$req->name;
        $customers->message=$req->message;
        $customers->city=$req->city;
        $customers->Deactivate="0";
        $customers->save();

        return redirect()->back()->with('message','customer Details has been created successfully!');

    }
    
    public function delete_testimonials(Request $request)
    {
        $id=$request->input('id');
        $applicant =  Testimonials::where('id',$id)->delete();
        return redirect()->back()->with('messagered','customer details has been deleted successfully!');
    }

    public function update_testimonials(Request $request)
    { 
        $update = Testimonials::whereNull('deleted_at')->where('id', $request->id)->update([
            'name' => $request->name,
            'message' => $request->message,
            'city' => $request->city
            ]);

        return redirect()->back()->with('message', 'customer Details Updated Successfully!');
    }

    
    public function create_faqs(Request $req)
    {
    
                if($req->id == null)
                {
                    $validator = Validator::make($req->all(), [
                        'service_name'  => 'required|unique:mst_faqs',
                        'que1' => 'required|min:10',
                        'ans1' => 'required|min:30',
                        'que2' => 'nullable|min:10',
                        'ans2' => 'nullable|min:30'
                    ]);
                    // if($validator->fails()) {
                    //     return Redirect::back()->withErrors($validator);
                    // }
                    if($validator->fails()){
                        return redirect()->back()->with(['error'=> $validator->errors()]);
                    }
       
                   $content = FAQ::create([ 
                    'service_name'=>$req->service_name,
                    'que1'=>$req->que1,
                    'ans1'=>$req->ans1,
                    'que2'=>$req->que2,
                    'ans2'=>$req->ans2,
                    'que3'=>$req->que3,
                    'ans3'=>$req->ans3,
                    'que4'=>$req->que4,
                    'ans4'=>$req->ans4,
                    'que5'=>$req->que5,
                    'ans5'=>$req->ans5,
                    'Deactivate'=>'0'
                    ]);
                   return redirect()->back()->with('message',' FAQ has been created successfully!');
               }
               else{
                //    dd($req);
                $validator = Validator::make($req->all(), [
                    'service_name' => 'required',
                    'que1' => 'required|min:10',
                    'ans1' => 'required|min:30',
                    'que2' => 'nullable|min:10',
                    'ans2' => 'nullable|min:30'
                ]);

                // if($validator->fails()) {
                //     return Redirect::back()->withErrors($validator);
                // }
                if($validator->fails()){
                    return redirect()->back()->with(['error'=> $validator->errors()]);
                }
       
                   $update= FAQ::whereNull('deleted_at')->where('Faq_ID', $req->id)->update([
                    'que1'=>$req->que1,
                    'ans1'=>$req->ans1,
                    'que2'=>$req->que2,
                    'ans2'=>$req->ans2,
                    'que3'=>$req->que3,
                    'ans3'=>$req->ans3,
                    'que4'=>$req->que4,
                    'ans4'=>$req->ans4,
                    'que5'=>$req->que5,
                    'ans5'=>$req->ans5,
                    ]);
                      return redirect()->back()->with('message',' FAQ has been Updated successfully!');
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

            
