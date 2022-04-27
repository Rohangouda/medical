<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Banner;
use App\Overview;
use App\FAQ;
use App\Doctor;
use App\Mst_Category;

class StatusController extends Controller
{
    public function banner_status(Request $request)
    {
    $validator = Validator::make($request->all(), [
        'Banner_ID' => 'required',
        'deactivate' => 'required'
    ]);

    if ($validator->fails()) {
        return $this->error_status($request)->withInput($request->input())
    ->withErrors($validator);
    }
    
    $id = $request->Banner_ID;
    $status = $request->deactivate;        
    if($status == "Activate"){
        $status = 0;
    }
    else{
        $status = 1;
    }
    // dd($status);
    $update_status = Banner::where('Banner_ID', $id)->update(['Deactivate' => $status]);
    return redirect()->back()->with('status', 'Status Updated Successfully');
     }

     public function overview_status(Request $request)
     {
     $validator = Validator::make($request->all(), [
         'Overview_ID' => 'required',
         'deactivate' => 'required'
     ]);
 
     if ($validator->fails()) {
         return $this->error_status($request)->withInput($request->input())
     ->withErrors($validator);
     }
     
     $id = $request->Overview_ID;
     $status = $request->deactivate;        
     if($status == "Activate"){
         $status = 0;
     }
     else{
         $status = 1;
     }
     // dd($status);
     $update_status = Overview::where('Overview_ID', $id)->update(['Deactivate' => $status]);
     return redirect()->back()->with('status', 'Status Updated Successfully');
      }

      public function faq_status(Request $request)
     {
     $validator = Validator::make($request->all(), [
         'Faq_ID' => 'required',
         'deactivate' => 'required'
     ]);
 
     if ($validator->fails()) {
         return $this->error_status($request)->withInput($request->input())
     ->withErrors($validator);
     }
     
     $id = $request->Faq_ID;
     $status = $request->deactivate;        
     if($status == "Activate"){
         $status = 0;
     }
     else{
         $status = 1;
     }
     // dd($status);
     $update_status = FAQ::where('Faq_ID', $id)->update(['Deactivate' => $status]);
     return redirect()->back()->with('status', 'Status Updated Successfully');
      } 

      public function doctor_status(Request $req)
      {
        //   dd($req);
    //   $validator = Validator::make($request->all(), [
    //     'service_id'  => 'required|unique:mst_doctor',
    //       'deactivate' => 'required'
    //   ]);
    //   if ($validator->fails()) {
    //       return $this->error_status($request)->withInput($request->input())
    //   ->withErrors($validator);
    //   }
      
    //   $service_id = $request->service_id;
    //   $status = $request->deactivate;        
    //   if($status == "Activate"){
    //       $status = 0;
    //   }
    //   else{
    //       $status = 1;
    //   }
      // dd($status);
    //   $update_status = FAQ::where('Faq_ID', $id)->update(['Deactivate' => $status]);
    //   return redirect()->back()->with('status', 'Status Updated Successfully');
      
    if($req->id == null)
                {
                    $validator = Validator::make($req->all(), [
                        'service_id'  => 'required|unique:mst_doctor',
                        'deactivate' => 'required'
                    ]);
    
                    // if($validator->fails()) {
                    //     return Redirect::back()->withErrors($validator);
                    // }
                    if($validator->fails()){
                        return redirect()->back()->with(['error'=> $validator->errors()]);
                    }
                    $service_id = $req->service_id;
                    $status = $req->deactivate;        
                    if($status == "Activate"){
                        $status = 0;
                    }
                    else{
                        $status = 1;
                    }

                    $content = Doctor::create([ 
                    'service_id'=>$req->service_id,
                    'Deactivate' => $status
                    ]);
                       return redirect()->back()->with('status', 'Status Updated Successfully');
               
               }
               else{
                //    dd($req);
                $validator = Validator::make($req->all(), [
                    'service_id'  => 'required',
                    'deactivate' => 'required'
                ]);

                if($validator->fails()){
                    return redirect()->back()->with(['error'=> $validator->errors()]);
                }
                
                $service_id = $req->service_id;
                $status = $req->deactivate;        
                if($status == "Activate"){
                    $status = 0;
                }
                else{
                    $status = 1;
                }

                $update= Doctor::whereNull('deleted_at')->where('Doctor_ID', $req->id)->update([
                    'Deactivate' => $status
                 ]);
                 return redirect()->back()->with('status', 'Status Updated Successfully');
               }
    }

    //page publish
    public function page_publish(Request $request)
    {
        // dd($request);
    $validator = Validator::make($request->all(), [
        'service_id' => 'required',
        'deactivate' => 'required'
    ]);

    if ($validator->fails()) {
        return $this->error_status($request)->withInput($request->input())
    ->withErrors($validator);
    }
    
    $id = $request->service_id;
    $status = $request->deactivate;        
    if($status == "Activate"){
        $status = 1;
    }
    else{
        $status = 0;
    }
    // dd($status);
    $update_status = Mst_Category::where('id', $id)->update(['page_status' => $status]);
    return redirect()->back()->with('status', 'Page Status Updated Successfully');
     }

    //page archive
    public function page_archive(Request $request)
    {
    $validator = Validator::make($request->all(), [
        'service_id' => 'required',
        'deactivate' => 'required'
    ]);

    if ($validator->fails()) {
        return $this->error_status($request)->withInput($request->input())
    ->withErrors($validator);
    }
    
    $id = $request->service_id;
    $status = $request->deactivate;        
    if($status == "Activate"){
        $status = 1;
    }
    else{
        $status = 0;
    }
    // dd($status);
    $update_status = Mst_Category::where('id', $id)->update(['deactivate' => $status]);
    return redirect('admin/dashboard')->with('archive', 'Page Status Updated Successfully');
     } 
}
