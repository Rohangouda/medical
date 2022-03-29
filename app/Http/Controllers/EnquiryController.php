<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enquiry;
use Illuminate\Support\Facades\DB;
use Session;


class EnquiryController extends Controller
{
    public function Enquiry(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'message'=>'required'
        ]);
        //Insert into Database
        $enquiry = new Enquiry;
        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->phone = $request->phone;
        $enquiry->message = $request->message;
        $save = $enquiry->save();

        if($save){
            // return back()->with('success','Message Sent');
            Session::flash('message', 'Message Has Been Sent Successfully!');
            return back();
        }
        else
        {
            return back()->with('fail','something went wrong,try again later');
        }
    }

    public function allEnquiriesList(Request $req){
        $data = $req->all();
        $enquiry_query = Enquiry::query();
        $enquiry_query = Enquiry::whereNull('deleted_at');
        if(!empty($data['search_text'])){

        }
        $enquiry_query->orderBy('id','DESC');
        $res = $enquiry_query->paginate($data['perPage']);
        if(count($res) > 0){
            $pagination = $res->links()->render();
            return response()->json(['status' => 200, 'enquiry_list' => $res, 'pagination' => $pagination]);
        }else {
            return response()->json(['status' => 500, 'msg' => 'No data found']);
        }
    }

    public function viewEnquiry(Request $req){
        $res = Enquiry::where('id',$req->id)->first();
        if($res != null){
            return response()->json(['status' => 200, 'data' => $res]);
        }else {
            return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time']);
        }
    }

    public function deleteEnquiry(Request $req){
        if(Enquiry::where('id',$req->id)->delete()){
            return response()->json(['status' => 200, 'msg' => 'Enquiry deleted successfully.']);
        }else {
            return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time']);
        }
    }
}
