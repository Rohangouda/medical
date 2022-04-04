<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Banner;
use App\Overview;
use App\FAQ;

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
}
