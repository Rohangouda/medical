<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

//    public function __construct()
//    {
//        $this->middleware('guest:admin')->except('logout');
//    }

    public function index()
    {
        return view('backend.admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'mobile' => 'required|string',
            'password' => 'required|string',
        ]);

        $admin = Admin::where('email', $request->mobile)->orWhere('mobile', $request->mobile)->first();
        if (is_null($admin)) {
            return back()->withInput($request->only('mobile', 'remember'))->withErrors(['mobile' => 'Sorry you are not registered with us.']);
        }

        if (Hash::check($request->password, $admin->password))
        {

            if (Auth::guard('admin')->attempt(['email' => $admin->email, 'password' => $request->password]))
            {
                return redirect()->route('admin.dashboard');
            }
        }

        return back()->withInput($request->only('mobile', 'remember'))->withErrors(['mobile' => 'These credentials do not match our records.']);
    }

    public function logout()
    {

        if(Auth::guard('admin')->check())
        {
            Auth::guard('admin')->logout();
            return redirect()->back();
        }

    }
}
