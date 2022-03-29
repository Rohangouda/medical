<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User_Staff;
use Illuminate\Support\Facades\DB;
use Session;


class StaffController extends Controller
{
    public function User_Staff(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'gender'=>'required',
            'password'=>'required',
            'address'=>'required'
        ]);
        //Insert into Database
        $staff = new User_Staff;
        $staff->first_name = $request->first_name;
        $staff->last_name = $request->last_name;
        $staff->email = $request->email;
        $staff->phone = $request->phone;
        $staff->gender = $request->gender;
        $staff->password = $request->password;
        $staff->address = $request->address;
        $save = $staff->save();

        // if($save){
        //     // return back()->with('success','Message Sent');
        //     Session::flash('message', 'Message Has Been Sent Successfully!');
        //     return back();
        // }
        // else
        // {
        //     return back()->with('fail','something went wrong,try again later');
        // }
    }
    public function getStaff()
    {
        $user_staff = User_Staff::orderBy('id','DESC')->get();
        return view('admin.management.user-staff',compact('user_staff'));
    }
    public function deleteStaff($id)
    {
        User_Staff::where('id',$id)->delete();
        return back()->with('Message_deleted','Message has been deleted successfully!');
    }
}
