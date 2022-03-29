<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mst_Category;
use App\User;
use App\Product;
use App\ProductHistory;
use App\ContactUsModel;
use App\MasterOrder;
use Illuminate\Support\Facades\Redirect;
use Mockery\Undefined;
use Session;
use App\ThemeSlider;

class PageController extends Controller
{
    public function index()
    {
        $result['page_title'] = 'Medfin';
        return view('pages.landing.index',$result);
    }

    public function about_us()
    {
        $result['page_title'] = 'Medfin || About-Us';
        return view('pages.landing.about_us',$result);
    }

    public function contact()
    {
        $result['page_title'] = 'Medfin || Contact-Us';
        return view('pages.landing.contact',$result);
    }

    public function all_list()
    {
        $result['page_title'] = 'Medfin || Service-list';
        return view('pages.landing.all_list', $result);
    }
    
    public function shopByCategory()
    {
        $result['page_title'] = 'Medfin || Service-list';
        return view('pages.landing.all_list', $result);
    }

    public function admin_panel()
    {
        // $result['page_title'] = 'Admin || Dashboard';
        return view('admin.dashboard');
    }

    public function adminDashboard() {
        $result['sold'] = 0;
        $result['total_sold_count'] = 0;
        $result['total_sold_amount'] = 0;
        $result['stock'] = 0;
        $result['total_stock_count'] = 0;
        $result['total_stock_amount'] = 0;
        $result['hold'] = 0;
        $result['total_hold_count'] = 0;
        $result['total_hold_amount'] = 0;

        // sold
        $result['sold'] = Product::with('productSold')->get();
        // dd($result['sold']);
        foreach($result['sold'] as $key => $value)
        {
            foreach ($value->productSold as $k => $val) {
                $result['total_sold_count'] += $val->quantity;
                $result['total_sold_amount'] += $val->price; 
            }
        }
        // hold
        $result['hold'] = DB::table('products')->join('product_history','product_history.product_id','products.id')->whereNull('products.deleted_at')->whereNull('product_history.deleted_at')
            ->where('product_history.order_status',2)
            ->select('product_history.quantity','product_history.price')->get();
        foreach($result['hold'] as $key2 => $value2)
        {
            $result['total_hold_count'] += $value2->quantity;
            $result['total_hold_amount'] += $value2->price;
        } 
        // stock
        $result['stock'] = DB::table('products')->join('product_history','product_history.product_id','products.id')->whereNull('products.deleted_at')->whereNull('product_history.deleted_at')
            ->where('product_history.order_status',1)
            ->select('product_history.quantity','product_history.price')->get();
        foreach($result['stock'] as $key1 => $value1)
        {
            $result['total_stock_count'] += $value1->quantity;
            $result['total_stock_amount'] += $value1->price*$value1->quantity;
        }
        
        $result['product'] = Product::whereNull('deleted_at')->latest()->limit(5)->with('productExtraProp','productImagesByMaster')->get();
        $result['user_count'] = User::where('role','user')->count();
        $result['user'] = User::where('role','user')->latest()->limit(10)->get();
        $result['staff_count'] = User::where('role','Staff')->count();
        $result['page_title'] = 'Admin || Dashboard';
        return view('admin/dashboard',$result);
    }

    public function StaffDashboard(){
        $result['product_count'] = ProductHistory::get();
        $result['total_sold_count'] = 0;
        $result['total_sold_amount'] = 0;
        $result['total_stock_count'] = 0;
        $result['total_stock_amount'] = 0;
        $result['total_hold_count'] = 0;
        $result['total_hold_amount'] = 0;
        foreach ($result['product_count']->where('order_status',1) as $key => $value) {
           $result['total_stock_count'] += $value->quantity;
           $result['total_stock_amount'] += $value->quantity*$value->price;
        }
        foreach ($result['product_count']->where('order_status',2) as $key => $value) {
           $result['total_hold_count'] += $value->quantity;
           $result['total_hold_amount'] += $value->quantity*$value->price;
        }
        foreach ($result['product_count']->where('order_status',3) as $key => $value) {
           $result['total_sold_count'] += $value->quantity;
           $result['total_sold_amount'] += $value->quantity*$value->price;
        }
        $result['product'] = Product::whereNull('deleted_at')->latest()->limit(5)->with('productExtraProp','productImagesByMaster')->get();
        $result['user_count'] = User::where('role','user')->count();
        $result['user'] = User::where('role','user')->latest()->limit(10)->get();
        $result['staff_count'] = User::where('role','Staff')->count();
        $result['page_title'] = 'Staff || Dashboard';
        return view('admin/dashboard',$result);
    }

    public function masterCategory() {
        $result['page_title'] = 'Category-list';
        return view('admin/management/category_list',$result);
    }

    public function masterBrand() {
        // $result['data']=Mst_Brand::orderBy('id','DESC')->get();
        $result['page_title'] = 'Brand-list';
        return view('admin/management/brand_list',$result);
    }

    public function enquiriesList() {
        $result['page_title'] = 'Enquiries-list';
        return view('admin/management/enquiry',$result);
    }

    public function profile() {
        if(Session::get('user_role') == "Admin" || Session::get('user_role') == "Staff"){
           $result['page_title'] = 'Peepal-store || Profile';
           $result['layout'] = 'login_layout';
           return view('admin/management/reset_password',$result);
        }
        else{
            $result['page_title'] = 'Peepal-store || Profile';
            $result['layout'] = 'home_layout';
            return view('admin/management/reset_password',$result);
        }

    }

    public function staffUsersList(){
        $result['page_title'] = 'Admin || Staff-users-list';
        return view('admin/management/user_staff',$result);
    }

    public function orderList()
    {
        $result['page_title'] = 'Admin || Order-list';
        return view('admin/order_list',$result);
    }

    public function orderReport()
    {
        $result['page_title'] = 'Admin || Order-report';
        return view('admin/report/order_report',$result);
    }

    public function contact_us_management()
    {
        $result['data'] = ContactUsModel::first();
        $result['page_title'] = 'Admin || Contact-us-management';
        return view('admin/page_management/contact_us_management',$result);
    }

    public function myOrder()
    {
        $result['order'] = ContactUsModel::first();
        $result['page_title'] = 'User || My-order';
        return view('user/my_order',$result);
    }

    public function printInvoice(){
        $result['page_title'] = 'print-invoice';
        $result['get_store_address'] = \DB::table('xit_contact_us')->select('*')->first();
        $order_id = request()->segment(4);
        // print_r($order_id);die;
        $get_mst_orders = MasterOrder::where('order_id',$order_id)->with(['getUser','productDetails','productDetails.productExtraProp'])->withTrashed()->get();
        // print_r($get_mst_orders->toArray());die;
        if(count($get_mst_orders) > 0){
            // $result['final_data'] = [];
            foreach($get_mst_orders->toArray() as $key => $order_items){
                $result['final_data'][$key] = $order_items;
            }
            if(count($get_mst_orders) > 0){
                // print_r($result);die;
                return view('invoice/modified_invoice', $result);
            }
        }else{
            return "Incorrect order id";
        }
        //return view('/invoice/invoice', $result);
    }

    public function productReport()
    {
        $result['page_title'] = 'Admin || Product-report';
        return view('admin/report/product_report',$result);
    }

    public function searchReport()
    {
        $result['page_title'] = 'Admin || Search-report';
        return view('admin/report/search_report',$result);
    }

    public function searchLogReport(){
        $result['page_title'] = 'Admin || Search-log-report';

        $user_id = request()->user_id;
        $id = explode('-',$user_id);
        if(array_key_exists(1,$id)){
            $result['get_user'] = \DB::table('users')->select(DB::raw('GROUP_CONCAT(first_name," ", last_name) as user_name'))->where('id',$id[1])->groupBy(['first_name', 'last_name'])->first();
            return view('admin/report/search_log_report',$result);
        }else{
            return Redirect('/admin/report/search-report')->with('messagered', 'Something went wrong, please refresh your bowser.');
        }
        
    }
    public function orderMail(){
        $result['page_title'] = 'Admin || order-mail';
        return view('emails/order_notification_mail',$result);
    }

    //-----slider section-----
    public function homeSlider(){
        $result['page_title'] = 'Admin || Home-slider';
        return view('admin/sliders/home_slider',$result);
    }
    public function productSlider(){
        $result['page_title'] = 'Admin || Product-slider';
        return view('admin/sliders/product_slider',$result);
    }

    
}
