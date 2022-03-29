<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\UsersCart;
use Validator;
use URL;
use Hash;

class AuthController extends Controller 
{
    public function __construct()
    {
       // $this->middleware('guest')->except('logout');
    }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
        if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password'], 'deleted_at' => null)))
        {
            $user_phone = is_numeric($request->input('username'));
            $userdata = '';
            if($user_phone) {
                $userdata = DB::table('users')->where('mobile',$request->input('username'))->first();
            }else {
                $userdata = DB::table('users')->where('email',$request->input('username'))->first();
            }
            if($userdata != null) {
                // print_r($userdata);
                if(!empty($input['login_uri'])){
                    $userdata->login_uri = $input['login_uri'];
                }
                
                $this->setSessionData($request, $userdata);
                return response()->json(['status' => 200, 'data' => $userdata]);
            }
        }else{
            return response()->json(['status' => 500, 'msg' => 'Username or password does not match.']);
        }

    
    }

    public function userSelfRegistration(Request $req){
        $data = $req->all();
        $checkUniqueUser = User::where('mobile',$data['mobile'])->first();
        if($checkUniqueUser != null){
            return response()->json(['status' => 500, 'msg' => 'This Mobile number is already register with us.']);
        }else{
            try{
                DB::beginTransaction();
    
                $registerUser = new User();
                $registerUser->role = 'user';
                $registerUser->first_name = $data['first_name'];
                $registerUser->last_name = $data['last_name'];
                $registerUser->email = $data['email'];
                $registerUser->mobile = $data['mobile'];
                $registerUser->gender = $data['gender'];
                $registerUser->address = $data['address'];
                $registerUser->password = bcrypt($data['password']);
                $registerUser->created_at = date('Y-m-d H:i:s');
                $registerUser->updated_at = date('Y-m-d H:i:s');
                $registerUser->save();
    
                //----- operating cart items-----
                $cartProducts = session()->pull('items_in_cart.product', []);
                if(count($cartProducts) > 0){
                    foreach($cartProducts as $key => $products){
                        if($products['original_quantity'] == 0){}else{
                            $add_product_in_cart = UsersCart::create([
                                'user_id' => $registerUser->id,
                                'product_id' => $products['id'],
                                'quantity' => $products['quantity'],
                                'updated_by' => $registerUser->id
                            ]);
                        }
                    }
                }
    
                DB::commit();
                return response()->json(['status' => 200, 'msg' => 'Your account has been created successfully.']);
            }catch (\Exception $e){
                DB::rollback();
                return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time.']);
            }
        }
        
    }

    public function getProfileData(Request $req){
        $res_json = json_decode(json_encode(User::where('id', session()->get('user_id'))->first()),true);
        if($res_json != null){
            return response()->json(['status' => 200, 'data' => $res_json]);
        }else {
            return response()->json(['status' => 500, 'msg' => 'Record not found']);
        }
    }

    public function updateProfileRecord(Request $req){
        $data = $req->all();
        unset($data['_token']);
        $checkPrevRecord = User::where('mobile', $data['mobile'])->where('id','!=',session()->get('user_id'))->first();
        if($checkPrevRecord != null){
            return response()->json(['status' => 500, 'msg' => 'Contact number is allready register with us, please enter different one.']);
        }else {
            if(User::where('id',session()->get('user_id'))->update($data)){
                session()->forget('first_name');
                session()->forget('last_name');
                session()->put('first_name',$data['first_name']);
                session()->put('last_name',$data['last_name']);
                return response()->json(['status' => 200, 'msg' => 'Profile updated successfully']);
            }else {
                return response()->json(['status' => 500, 'msg' => 'Something went wrong, try again after some time']);
            }
        }
    }

    function change_profile_password(Request $req) {
        $data = $req->all();
        $validator = Validator::make($data, [
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required'
        ]);
        if($validator->fails()) {
            return response()->json($validator->errors(), 401);
        }else {
            $user_id = $req->session()->get('user_id');
            $user = DB::table('users')-> where('id', $user_id)->get();
            if(count($user) > 0){
                if(Hash::check($req->input('old_password'), $user[0]->password)){
                    $new_password = $req->input('new_password');
                    $confirm_password = $req->input('confirm_password');
                    if($new_password == $confirm_password){
                        $hash_new_pass = \Hash::make($new_password);
                        $updatePassword = DB::table('users')
                                        ->where('id',$user_id)
                                        ->update(['password' => $hash_new_pass]);
                        if($updatePassword){
                            return response()->json(['status' => 200, 'msg' => 'Password Update Successfully.']);
                        }else{
                            return response()->json(['status' => 500, 'msg' => 'Something went wrong. Please try again.']);
                        }
                    }else{
                        return response()->json(['status' => 500, 'msg' => 'Your Confirm password does not match']);
                    }
                }else{
                    return response()->json(['status' => 500, 'msg' => 'Your Current password does not match']);
               }
            }
        }
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json($this->guard()->user());
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();
        session()->flush();
        return redirect('/');
        // return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }

    private function setSessionData($request, $data) {
        $userdata = json_decode(json_encode($data, true));
        $request->session()->put('user_id', $userdata->id);
        $request->session()->put('user_role', $userdata->role);
        $request->session()->put('first_name', $userdata->first_name);
        $request->session()->put('last_name', $userdata->last_name);
        $request->session()->put('contact_no', $userdata->mobile);

        //----- operating cart items-----
        if($userdata->role == 'user'){
            $cartProducts = session()->pull('items_in_cart.product', []);
            if(count($cartProducts) > 0){
                foreach($cartProducts as $key => $cartItems){
                    $checkPrevQuantity = UsersCart::where(['user_id' => $userdata->id, 'product_id' => $cartItems['id']])->first();
                    if($checkPrevQuantity != null){
                        $updateCartProduct = UsersCart::where(['user_id' => $userdata->id, 'product_id' => $cartItems['id']])->update(['quantity' => $checkPrevQuantity->quantity + 1]);
                    }else{
                        if($cartItems['original_quantity'] == 0){}else{
                            $add_product_in_cart = UsersCart::create([
                                'user_id' => $userdata->id,
                                'product_id' => $cartItems['id'],
                                'quantity' => $cartItems['quantity'],
                                'updated_by' => $userdata->id
                            ]);
                        }
                    }
                }
            
            }
        }
        
    }
}
