<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\App_Btn;
use App\Banner;
use App\Overview;
use App\FAQ;
use App\Treatment_Option;
use App\Testimonials;
use App\Causes_symptoms;
use App\Medfin_Advantages;
use Illuminate\Support\Str;
use DB;

class ContentController extends Controller
{
   
    public function create_banner(Request $req)
    {
         if($req->id == null)
         {
            $validator = Validator::make($req->all(), [
                'service_id'  => 'required|unique:banner',
                'banner_tittle' => 'required|min:6',
                'banner_description' => 'required|min:9',
                // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
        
            // if($validator->fails()) {
            //     return Redirect::back()->withErrors($validator);
            // }
            if($validator->fails()){
                return redirect()->back()->with(['error'=> $validator->errors()]);
            }

            if($req->hasFile('image')){
                $file = $req->file('image');
                $name =$file->getClientOriginalName();
                $file_path = ('Banner-').$name;
                Storage::disk('s3')->put($file_path,file_get_contents($file));

                $brand_name = new Banner();
                $brand_name->service_id=$req->service_id;
                $brand_name->tittle=$req->banner_tittle;
                $brand_name->description=$req->banner_description;
                $brand_name->image=$file_path;
                $brand_name->Deactivate= '0';
                $brand_name->save();
            return redirect()->back()->with('message',' Banner has been created successfully!');
            }      
        }
        else{
            // dd($req);
            $validator = Validator::make($req->all(), [
                'banner_tittle' => 'required|min:6',
                'banner_description' => 'required|min:9'
            ]);
        
            if($validator->fails()){
                return redirect()->back()->with(['error'=> $validator->errors()]);
            }

            $file = $req->file('image');
                $name =$file->getClientOriginalName();
                $file_path = ('Banner-').$name;
                Storage::disk('s3')->put($file_path,file_get_contents($file));

            $update= Banner::whereNull('deleted_at')->where('Banner_ID', $req->id)->update([

                'service_id'=> $req->service_id,
              'tittle'=>$req->banner_tittle,
               'description'=>$req->banner_description,
               'image'=>$file_path
             ]);
               return redirect()->back()->with('message',' Banner has been Updated successfully!');
            }
            return redirect()->back()->with('messagered','Something went Wrong please Try Again !');
    }
    
    public function create_advantages(Request $req)
    {
                if($req->id == null)
                {
                    $validator = Validator::make($req->all(), [
                        'service_id'  => 'required|unique:mst_advantages',
                        'heading' => 'required|min:6',
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                    ]);
    
                    // if($validator->fails()) {
                    //     return Redirect::back()->withErrors($validator);
                    // }
                    if($validator->fails()){
                        return redirect()->back()->with(['error'=> $validator->errors()]);
                    }
                 
                    if($req->hasFile('image')){
                        $file = $req->file('image');
                        $name =$file->getClientOriginalName();
                        $file_path = ('Advantage-').$name;
                        Storage::disk('s3')->put($file_path,file_get_contents($file));
        
                    $content = Medfin_Advantages::create([ 
                    'service_id'=>$req->service_id,
                    'heading'=>$req->heading,
                    'image'=> $file_path,
                    'Deactivate'=>'0'
                    ]);
                   return redirect()->back()->with('message',' Advantages Section has been created successfully!');
                    }
               
               }
               else{
                //    dd($req);
                $validator = Validator::make($req->all(), [
                    'heading' => 'required|min:10',
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ]);

                // if($validator->fails()) {
                //     return Redirect::back()->withErrors($validator);
                // }
                if($validator->fails()){
                    return redirect()->back()->with(['error'=> $validator->errors()]);
                }
                $file = $req->file('image');
                $name =$file->getClientOriginalName();
                $file_path = ('Advantage-').$name;
                Storage::disk('s3')->put($file_path,file_get_contents($file));

                $update= Medfin_Advantages::whereNull('deleted_at')->where('Advantage_ID', $req->id)->update([
                       'heading'=>$req->heading,
                        'image'=> $file_path
                 ]);
                      return redirect()->back()->with('message',' Advantages Section has been Updated successfully!');
               }
    }
    public function create_overview(Request $req)
    {
                if($req->id == null)
                {
                    $validator = Validator::make($req->all(), [
                        'service_id'  => 'required|unique:mst_overview',
                        'overview_tittle' => 'required|min:6',
                        'overview_description' => 'required|min:9',
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                    ]);
    
                    // if($validator->fails()) {
                    //     return Redirect::back()->withErrors($validator);
                    // }
                    if($validator->fails()){
                        return redirect()->back()->with(['error'=> $validator->errors()]);
                    }
                    
                    if($req->hasFile('image')){
                        $file = $req->file('image');
                        $name = time().$file->getClientOriginalExtension();
                        $file_path = $name;
                        Storage::disk('s3')->put($file_path,file_get_contents($file));
                     
                        $content = Overview::create([ 
                            'service_id'=>$req->service_id,
                            'tittle'=>$req->overview_tittle,
                            'description'=>$req->overview_description,
                            'image'=> $file_path,
                            'Deactivate'=>'0'
                            ]);
                           return redirect()->back()->with('message',' Overview has been created successfully!');
                    }   
               }
               else{
                //    dd($req);
                $validator = Validator::make($req->all(), [
                    'overview_tittle' => 'required|min:10',
                    'overview_description' => 'required|min:20',
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ]);

                // if($validator->fails()) {
                //     return Redirect::back()->withErrors($validator);
                // }
                if($validator->fails()){
                    return redirect()->back()->with(['error'=> $validator->errors()]);
                }
                  
                $file = $req->file('image');
                $name =$file->getClientOriginalName();
                $file_path = ('Overview-').$name;
                Storage::disk('s3')->put($file_path,file_get_contents($file));

                   $update= Overview::whereNull('deleted_at')->where('Overview_ID', $req->id)->update([
                       'tittle'=>$req->overview_tittle,
                      'description'=>$req->overview_description,
                      'image'=> $file_path
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
                        'service_id'  => 'required|unique:mst_faqs',
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
                    'service_id'=>$req->service_id,
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
                    'service_id' => 'required',
                    'que1' => 'required|min:1',
                    'ans1' => 'required|min:2',
                    'que2' => 'nullable|min:1',
                    'ans2' => 'nullable|min:2'
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
            
    public function create_treatment(Request $req)
    {
    //    dd($req);
        if($req->id == null)
                {
                    $validator = Validator::make($req->all(), [
                        'service_id'  => 'required|unique:mst_treatment_option',
                        'treatment_heading' => 'required|min:6',
                        'treatment_description' => 'required|min:9',
                        'subheading'  => 'required|min:9'
                    ]);
    
                    // if($validator->fails()) {
                    //     return Redirect::back()->withErrors($validator);
                    // }
                    if($validator->fails()){
                        return redirect()->back()->with(['error'=> $validator->errors()]);
                    }
       
                   $content = Treatment_Option::create([ 
                    'service_id'=>$req->service_id,
                    'heading'=>$req->treatment_heading,
                    'description'=>$req->treatment_description,
                    'subheading'=>$req->subheading,
                    'acc_head_1'=> $req->acc_head_1,
                    'paragraph1'=> $req->paragraph1,
                    'bullet1' => $req->bullet1,
                    'content1'=> $req->content1,
                    'bullet2' => $req->bullet2,
                    'content2' => $req->content2,
                    'bullet3'  => $req->bullet3,
                    'content3' => $req->content3,
                    'bullet4' => $req->bullet4,
                    'content4' => $req->content4,
                    'bullet5' => $req->bullet5,
                    'content5' => $req->content5,
                    'acc_head_2' => $req->acc_head_2,
                    'paragraph2' => $req->paragraph2,
                    'bullet11' => $req->bullet11,
                    'content11' => $req->content11,
                    'bullet22' => $req->bullet22,
                    'content22' => $req->content22,
                    'bullet33' => $req->bullet33,
                    'content33' => $req->content33,
                    'bullet44' => $req->bullet44,
                    'content44' => $req->content44,
                    'bullet55' => $req->bullet55,
                    'content55' => $req->content55,
                    'acc_head_3' => $req->acc_head_3,
                    'paragraph3' => $req->paragraph3,
                    'bullet111' => $req->bullet111,
                    'content111' => $req->content111,
                    'bullet222' => $req->bullet222,
                    'content222' => $req->content222,
                    'bullet333' => $req->bullet333,
                    'content333' => $req->content333,
                    'bullet444' => $req->bullet444,
                    'content444' => $req->content444,
                    'bullet555' => $req->bullet555,
                    'content555' => $req->content555,
                    'acc_head_4' => $req->acc_head_4,
                    'paragraph4' => $req->paragraph4,
                    'bullet1111' => $req->bullet1111,
                    'content1111' => $req->content1111,
                    'bullet2222' => $req->bullet2222,
                    'content2222' => $req->content2222,
                    'bullet3333' => $req->bullet3333,
                    'content3333' => $req->content3333,
                    'bullet4444' => $req->bullet4444,
                    'content4444' => $req->content4444,
                    'bullet5555' => $req->bullet5555,
                    'content5555' => $req->content5555,
                    'acc_head_5' => $req->acc_head_5,
                    'paragraph5' => $req->paragraph5,
                    'bullet11111' => $req->bullet11111,
                    'content11111' => $req->content11111,
                    'bullet22222' => $req->bullet22222,
                    'content22222' => $req->content22222,
                    'bullet33333' => $req->bullet33333,
                    'content33333' => $req->content33333,
                    'bullet44444' => $req->bullet44444,
                    'content44444' => $req->content44444,
                    'bullet55555' => $req->bullet55555,
                    'content55555' => $req->content55555,
                    'acc_head_6' => $req->acc_head_6,
                    'paragraph6' => $req->paragraph6,
                    'bullet111111' => $req->bullet111111,
                    'content111111' => $req->content111111,
                    'bullet222222' => $req->bullet222222,
                    'content222222' => $req->content222222,
                    'bullet333333' => $req->bullet333333,
                    'content333333' => $req->content333333,
                    'bullet444444' => $req->bullet444444,
                    'content444444'=> $req->content444444,
                    'bullet555555'  => $req->bullet555555,
                    'content555555' => $req->content555555,
                    'Deactivate'=>'0'
                    ]);
                   return redirect()->back()->with('message',' Treatment Section has been created successfully!');
               }
               else{
                //    dd($req);
                $validator = Validator::make($req->all(), [
                    'treatment_heading' => 'required|min:10',
                    'treatment_description' => 'required|min:10'
                ]);

                // if($validator->fails()) {
                //     return Redirect::back()->withErrors($validator);
                // }
                if($validator->fails()){
                    return redirect()->back()->with(['error'=> $validator->errors()]);
                }
       
                   $update= Treatment_Option::whereNull('deleted_at')->where('Treatment_ID', $req->id)->update([
                    'service_id'=>$req->service_id,
                    'heading'=>$req->treatment_heading,
                    'description'=>$req->treatment_description,
                    'subheading'=>$req->subheading,
                    'acc_head_1'=> $req->acc_head_1,
                    'paragraph1'=> $req->paragraph1,
                    'bullet1' => $req->bullet1,
                    'content1'=> $req->content1,
                    'bullet2' => $req->bullet2,
                    'content2' => $req->content2,
                    'bullet3'  => $req->bullet3,
                    'content3' => $req->content3,
                    'bullet4' => $req->bullet4,
                    'content4' => $req->content4,
                    'bullet5' => $req->bullet5,
                    'content5' => $req->content5,
                    'acc_head_2' => $req->acc_head_2,
                    'paragraph2' => $req->paragraph2,
                    'bullet11' => $req->bullet11,
                    'content11' => $req->content11,
                    'bullet22' => $req->bullet22,
                    'content22' => $req->content22,
                    'bullet33' => $req->bullet33,
                    'content33' => $req->content33,
                    'bullet44' => $req->bullet44,
                    'content44' => $req->content44,
                    'bullet55' => $req->bullet55,
                    'content55' => $req->content55,
                    'acc_head_3' => $req->acc_head_3,
                    'paragraph3' => $req->paragraph3,
                    'bullet111' => $req->bullet111,
                    'content111' => $req->content111,
                    'bullet222' => $req->bullet222,
                    'content222' => $req->content222,
                    'bullet333' => $req->bullet333,
                    'content333' => $req->content333,
                    'bullet444' => $req->bullet444,
                    'content444' => $req->content444,
                    'bullet555' => $req->bullet555,
                    'content555' => $req->content555,
                    'acc_head_4' => $req->acc_head_4,
                    'paragraph4' => $req->paragraph4,
                    'bullet1111' => $req->bullet1111,
                    'content1111' => $req->content1111,
                    'bullet2222' => $req->bullet2222,
                    'content2222' => $req->content2222,
                    'bullet3333' => $req->bullet3333,
                    'content3333' => $req->content3333,
                    'bullet4444' => $req->bullet4444,
                    'content4444' => $req->content4444,
                    'bullet5555' => $req->bullet5555,
                    'content5555' => $req->content5555,
                    'acc_head_5' => $req->acc_head_5,
                    'paragraph5' => $req->paragraph5,
                    'bullet11111' => $req->bullet11111,
                    'content11111' => $req->content11111,
                    'bullet22222' => $req->bullet22222,
                    'content22222' => $req->content22222,
                    'bullet33333' => $req->bullet33333,
                    'content33333' => $req->content33333,
                    'bullet44444' => $req->bullet44444,
                    'content44444' => $req->content44444,
                    'bullet55555' => $req->bullet55555,
                    'content55555' => $req->content55555,
                    'acc_head_6' => $req->acc_head_6,
                    'paragraph6' => $req->paragraph6,
                    'bullet111111' => $req->bullet111111,
                    'content111111' => $req->content111111,
                    'bullet222222' => $req->bullet222222,
                    'content222222' => $req->content222222,
                    'bullet333333' => $req->bullet333333,
                    'content333333' => $req->content333333,
                    'bullet444444' => $req->bullet444444,
                    'content444444'=> $req->content444444,
                    'bullet555555'  => $req->bullet555555,
                    'content555555' => $req->content555555
                    ]);
                   
                      return redirect()->back()->with('message',' Treatment Option has been Updated successfully!');
               }
         
    }

    public function create_symptoms(Request $req)
    {
        // dd($req);
        if($req->id == null)
                {
                    $validator = Validator::make($req->all(), [
                        'service_id'  => 'required|unique:mst_causes_symptoms',
                        'symptoms_heading' => 'required|min:6',
                        'symptoms_description' => 'required|min:9',
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                    ]);
    
                    // if($validator->fails()) {
                    //     return Redirect::back()->withErrors($validator);
                    // }
                    if($validator->fails()){
                        return redirect()->back()->with(['error'=> $validator->errors()]);
                    }

                    if($req->hasFile('image')){
                        $file = $req->file('image');
                        $name =$file->getClientOriginalName();
                        $file_path = ('Symptoms-').$name;
                        Storage::disk('s3')->put($file_path,file_get_contents($file));
        
                          $content = Causes_symptoms::create([ 
                    'service_id'=>$req->service_id,
                    'heading'=>$req->symptoms_heading,
                    'description'=>$req->symptoms_description,
                    'image'=> $file_path,
                    'acc_head_1'=> $req->acc_head_1,
                    'paragraph1'=> $req->paragraph1,
                    'bullet1' => $req->bullet1,
                    'content1'=> $req->content1,
                    'bullet2' => $req->bullet2,
                    'content2' => $req->content2,
                    'bullet3'  => $req->bullet3,
                    'content3' => $req->content3,
                    'bullet4' => $req->bullet4,
                    'content4' => $req->content4,
                    'bullet5' => $req->bullet5,
                    'content5' => $req->content5,
                    'acc_head_2' => $req->acc_head_2,
                    'paragraph2' => $req->paragraph2,
                    'bullet11' => $req->bullet11,
                    'content11' => $req->content11,
                    'bullet22' => $req->bullet22,
                    'content22' => $req->content22,
                    'bullet33' => $req->bullet33,
                    'content33' => $req->content33,
                    'bullet44' => $req->bullet44,
                    'content44' => $req->content44,
                    'bullet55' => $req->bullet55,
                    'content55' => $req->content55,
                    'acc_head_3' => $req->acc_head_3,
                    'paragraph3' => $req->paragraph3,
                    'bullet111' => $req->bullet111,
                    'content111' => $req->content111,
                    'bullet222' => $req->bullet222,
                    'content222' => $req->content222,
                    'bullet333' => $req->bullet333,
                    'content333' => $req->content333,
                    'bullet444' => $req->bullet444,
                    'content444' => $req->content444,
                    'bullet555' => $req->bullet555,
                    'content555' => $req->content555,
                    'acc_head_4' => $req->acc_head_4,
                    'paragraph4' => $req->paragraph4,
                    'bullet1111' => $req->bullet1111,
                    'content1111' => $req->content1111,
                    'bullet2222' => $req->bullet2222,
                    'content2222' => $req->content2222,
                    'bullet3333' => $req->bullet3333,
                    'content3333' => $req->content3333,
                    'bullet4444' => $req->bullet4444,
                    'content4444' => $req->content4444,
                    'bullet5555' => $req->bullet5555,
                    'content5555' => $req->content5555,
                    'acc_head_5' => $req->acc_head_5,
                    'paragraph5' => $req->paragraph5,
                    'bullet11111' => $req->bullet11111,
                    'content11111' => $req->content11111,
                    'bullet22222' => $req->bullet22222,
                    'content22222' => $req->content22222,
                    'bullet33333' => $req->bullet33333,
                    'content33333' => $req->content33333,
                    'bullet44444' => $req->bullet44444,
                    'content44444' => $req->content44444,
                    'bullet55555' => $req->bullet55555,
                    'content55555' => $req->content55555,
                    'acc_head_6' => $req->acc_head_6,
                    'paragraph6' => $req->paragraph6,
                    'bullet111111' => $req->bullet111111,
                    'content111111' => $req->content111111,
                    'bullet222222' => $req->bullet222222,
                    'content222222' => $req->content222222,
                    'bullet333333' => $req->bullet333333,
                    'content333333' => $req->content333333,
                    'bullet444444' => $req->bullet444444,
                    'content444444'=> $req->content444444,
                    'bullet555555'  => $req->bullet555555,
                    'content555555' => $req->content555555,
                    'Deactivate'=>'0'
                    ]);
                   return redirect()->back()->with('message',' Causes & symptoms Section has been created successfully!');
                    }
       
               
               }
               else{
                //    dd($req);
                $validator = Validator::make($req->all(), [
                    'symptoms_heading' => 'required|min:10',
                    'symptoms_description' => 'required|min:10',
                    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ]);

                // if($validator->fails()) {
                //     return Redirect::back()->withErrors($validator);
                // }
                if($validator->fails()){
                    return redirect()->back()->with(['error'=> $validator->errors()]);
                }
                $file = $req->file('image');
                $name =$file->getClientOriginalName();
                $file_path = ('Symptoms-').$name;
                Storage::disk('s3')->put($file_path,file_get_contents($file));
       
                   $update= Causes_symptoms::whereNull('deleted_at')->where('Symptoms_ID', $req->id)->update([
                    'service_id'=>$req->service_id,
                    'heading'=>$req->symptoms_heading,
                    'description'=>$req->symptoms_description,
                    'image'=> $file_path,
                    'acc_head_1'=> $req->acc_head_1,
                    'paragraph1'=> $req->paragraph1,
                    'bullet1' => $req->bullet1,
                    'content1'=> $req->content1,
                    'bullet2' => $req->bullet2,
                    'content2' => $req->content2,
                    'bullet3'  => $req->bullet3,
                    'content3' => $req->content3,
                    'bullet4' => $req->bullet4,
                    'content4' => $req->content4,
                    'bullet5' => $req->bullet5,
                    'content5' => $req->content5,
                    'acc_head_2' => $req->acc_head_2,
                    'paragraph2' => $req->paragraph2,
                    'bullet11' => $req->bullet11,
                    'content11' => $req->content11,
                    'bullet22' => $req->bullet22,
                    'content22' => $req->content22,
                    'bullet33' => $req->bullet33,
                    'content33' => $req->content33,
                    'bullet44' => $req->bullet44,
                    'content44' => $req->content44,
                    'bullet55' => $req->bullet55,
                    'content55' => $req->content55,
                    'acc_head_3' => $req->acc_head_3,
                    'paragraph3' => $req->paragraph3,
                    'bullet111' => $req->bullet111,
                    'content111' => $req->content111,
                    'bullet222' => $req->bullet222,
                    'content222' => $req->content222,
                    'bullet333' => $req->bullet333,
                    'content333' => $req->content333,
                    'bullet444' => $req->bullet444,
                    'content444' => $req->content444,
                    'bullet555' => $req->bullet555,
                    'content555' => $req->content555,
                    'acc_head_4' => $req->acc_head_4,
                    'paragraph4' => $req->paragraph4,
                    'bullet1111' => $req->bullet1111,
                    'content1111' => $req->content1111,
                    'bullet2222' => $req->bullet2222,
                    'content2222' => $req->content2222,
                    'bullet3333' => $req->bullet3333,
                    'content3333' => $req->content3333,
                    'bullet4444' => $req->bullet4444,
                    'content4444' => $req->content4444,
                    'bullet5555' => $req->bullet5555,
                    'content5555' => $req->content5555,
                    'acc_head_5' => $req->acc_head_5,
                    'paragraph5' => $req->paragraph5,
                    'bullet11111' => $req->bullet11111,
                    'content11111' => $req->content11111,
                    'bullet22222' => $req->bullet22222,
                    'content22222' => $req->content22222,
                    'bullet33333' => $req->bullet33333,
                    'content33333' => $req->content33333,
                    'bullet44444' => $req->bullet44444,
                    'content44444' => $req->content44444,
                    'bullet55555' => $req->bullet55555,
                    'content55555' => $req->content55555,
                    'acc_head_6' => $req->acc_head_6,
                    'paragraph6' => $req->paragraph6,
                    'bullet111111' => $req->bullet111111,
                    'content111111' => $req->content111111,
                    'bullet222222' => $req->bullet222222,
                    'content222222' => $req->content222222,
                    'bullet333333' => $req->bullet333333,
                    'content333333' => $req->content333333,
                    'bullet444444' => $req->bullet444444,
                    'content444444'=> $req->content444444,
                    'bullet555555'  => $req->bullet555555,
                    'content555555' => $req->content555555
                    ]);
                   
                      return redirect()->back()->with('message',' Causes & symptoms has been Updated successfully!');
               }
         
    }

    public function create_app_btn(Request $req)
    {
         if($req->id == null)
         {
            $validator = Validator::make($req->all(), [
                'service_id'  => 'required|unique:app_btn',
                'btn_name' => 'required|min:3'
            ]);
            if($validator->fails()){
                return redirect()->back()->with(['error'=> $validator->errors()]);
            }

                $brand_name = new App_Btn();
                $brand_name->service_id=$req->service_id;
                $brand_name->btn_name=$req->btn_name;
                $brand_name->status= '0';
                $brand_name->save();
            return redirect()->back()->with('message','Appointment Button has been updated successfully!');
        }
        else{
            $validator = Validator::make($req->all(), [
                'btn_name' => 'required|min:3'
            ]);
        
            if($validator->fails()){
                return redirect()->back()->with(['error'=> $validator->errors()]);
            }

            $update= App_Btn::whereNull('deleted_at')->where('App_Btn_ID', $req->id)->update([

                'service_id'=> $req->service_id,
              'btn_name'=>$req->btn_name
             ]);
               return redirect()->back()->with('message',' Appointment Button has been Updated successfully!');
            }
    }

}

            
