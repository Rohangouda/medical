<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/optimize', function () {
    Artisan::call('optimize:clear');
    return redirect('/');
});

Route::get('/', 'PageController@index')->name('home');
Route::post('/theme-categories', 'HomeController@themeCategories');
Route::get('/shop-by-category/{id}', 'PageController@shopByCategory');
Route::post('/get-product-by-category', 'HomeController@getProductByCategory');
Route::get('/search-in-peepal-store/{search_text}', 'PageController@shopByCategory');
Route::Post('/get-record-by-gsearch', 'HomeController@globalSearchByUsers');
Route::post('/get-product-details-by-event', 'HomeController@getProductDetailsById');
Route::post('/get-contact-details', 'HomeController@getContactDetail');
// my order section
Route::get('/my-order', 'PageController@myOrder');
Route::get('/order-mail', 'PageController@orderMail');


Route::post('/user-self-registration', 'AuthController@userSelfRegistration');
Route::post('/verifyLoginCredential','AuthController@login');
Route::get('/logout', 'AuthController@logout');

Route::get('/clear-cache', function () {
	Artisan::call('config:clear');
	Artisan::call('route:clear');
	Artisan::call('view:clear');
	Artisan::call('config:cache');
	Artisan::call('view:cache');
	print_r('Please refresh the browser');
});

Route::post('/get-theme-sliders', 'HomeController@getThemeSliders');
Route::post('/get-product-sliders', 'HomeController@getProductSliders');

Route::group(['middleware'=>['LoginCheck']],function(){
    //-----OnlyAdminAccessibleRoute-----

    Route::group(['middleware' => ['OnlyAdminAccessibleRoute']], function() {
        Route::get('/admin/dashboard', 'PageController@adminDashboard');
        //-----enquiries-----
        Route::get('/admin/all-enquiries', 'PageController@enquiriesList');
        Route::post('/admin/enquiry/all-enquiries-list', 'EnquiryController@allEnquiriesList');
        Route::post('/admin/enquiry/view-enquiry', 'EnquiryController@viewEnquiry');
        Route::post('/admin/enquiry/delete-enquiry', 'EnquiryController@deleteEnquiry');

        //-----Reset password-----
        Route::post('/admin/master-opration/reset-password', 'AdminController@resetPasswordByAdmin');
        //-----Staff registration-----
        Route::post('/admin/master-opration/add-staff', 'AdminController@addStaff');
        //-----Page Management-----
        Route::get('/admin/contact-us-management','PageController@contact_us_management');
        Route::post('/admin/contact-us/update','AdminController@contact_us_update');
        // -----Theme slider -------
        Route::get('/admin/theme-slider','PageController@themeSlider');
        Route::post('/admin/theme-slider/add-theme-image','AdminController@addThemeSlider');
        Route::post('/admin/theme-slider/delete-slider', 'AdminController@deleteThemeSlider');
        Route::get('/admin/theme-slider/edit-slider-detail', 'AdminController@editThemeSliderDetail');
        route::post('/admin/theme-slider/update','admincontroller@updatetheme')->name('update.slider');
//        Route::put('/admin/theme-slider/update','admincontroller@updatetheme')->name('update.slider');

        //-----Invoice-----
        Route::get('/admin/invoice/print-invoice/{id1}', 'PageController@printInvoice');

        //-----Reports-----
        Route::post('/admin/reports/search-report', 'AdminController@searchLogReports');
        Route::get('/admin/report/search-log-report/{user_id}', 'PageController@searchLogReport');
        Route::post('/admin/reports/detail-search-report-by-user', 'AdminController@detalSearchReportByUser');

        // -----Theme slider -------
        Route::get('/admin/sliders/home-slider', 'PageController@homeSlider');
        Route::post('/admin/theme-slider/get-theme-records', 'AdminController@getThemeSlider');
        Route::post('/admin/theme-slider/add-theme-image','AdminController@addThemeSlider');
        Route::post('/admin/theme-slider/delete-slider', 'AdminController@deleteThemeSlider');
        Route::post('/admin/theme-slider/edit-slider-detail', 'AdminController@editThemeSliderDetail');
        Route::post('/admin/theme-slider/update','AdminController@updateTheme')->name('update.slider');

        // -----Product slider -------
        Route::get('/admin/sliders/product-slider', 'PageController@productSlider');
        Route::post('/admin/product-slider/get-product-records', 'AdminController@getProductSlider');
        Route::post('/admin/product-slider/add-product-image','AdminController@addProductSlider');
        Route::post('/admin/product-slider/delete-slider', 'AdminController@deleteProductSlider');
        Route::post('/admin/product-slider/edit-slider-detail', 'AdminController@editProductSliderDetail');
        Route::post('/admin/product-slider/update','AdminController@updateProductSliders');

    });

    //-----OnlyStaffAccessibleRoute-----
    Route::group(['middleware' => ['OnlyStaffAccessibleRoute']], function() {
        Route::get('/staff/dashbaord', 'PageController@StaffDashboard');

        //-----Invoice-----
        Route::get('/staff/invoice/print-invoice/{id1}', 'PageController@printInvoice');
    });


    //-----AdminAndStaffAccessibleRoute-----
    Route::group(['middleware' => ['AdminAndStaffAccessibleRoute']], function() {
        //-----Master Category-----
        Route::get('/admin/master-record/category-list','PageController@masterCategory');
        Route::post('/admin/master-record/get-all-category', 'CategoryController@get_category');
        Route::post('/admin/master-record/register/category','CategoryController@create_category')->name('master.category');
        Route::post('/admin/master-record/edit-category','CategoryController@editCategory');
        Route::post('/admin/master-record/update-category/{id}','CategoryController@update')->name('update.category');
        Route::post('/admin/master-record/delete-category','CategoryController@delete_record');

        //----- Master Brand-----
        Route::get('/admin/master-record/brand_list','PageController@masterBrand');
        Route::post('/admin/master-record/get-all-brands-record', 'BrandController@getAllBrandsRecord');
        Route::post('/admin/master-record/register/brand','BrandController@create_brand')->name('master.brand');
        Route::post('/admin/master-record/edit-brand-detail', 'BrandController@editBrandDetail');
        Route::post('/admin/master-record/brand_delete_modal','BrandController@delete_record')->name('brand_delete');
        Route::post('/admin/master-record/update/{id}','BrandController@update')->name('update.brand');

        //----- Product-----
        Route::get('/admin/product_list','ProductController@get_product')->name('get_product');
        Route::post('/register/product','ProductController@create_product')->name('master.product');
        Route::post('/admin/get-product-list','ProductController@getProductList');
        Route::post('/admin/edit-product-record','ProductController@editProductRecord');
        Route::post('/admin/update-product-record','ProductController@updateProductRecords');
        Route::post('/admin/product/update-product-by-col','ProductController@updateProductDetailsByCol');
        Route::post('/admin/product/delete-product-by-row','ProductController@deleteProductByRow');
        Route::post('/admin/product/download-excel','ProductController@exportAsExcel');
        Route::post('/admin/product/download-pdf','ProductController@exportAsExcel');
        Route::post('/admin/product/download-csv','ProductController@exportAsExcel');

        //Clone product
        Route::post('/admin/clone-product-record','ProductController@cloneeProductRecords');

        // reset password
        Route::get('/admin/profile','PageController@profile');
        Route::post('/admin/get-profile', 'AuthController@getProfileData');
        Route::post('/admin/update-profile', 'AuthController@updateProfileRecord');
        Route::post('/admin/update-password', 'AuthController@change_profile_password');


        //----- Staff users-----
        Route::get('/admin/staff-users-list', 'PageController@staffUsersList');
        Route::post('/admin/staff-user-records', 'AdminController@getStaffUsersRecords');



        //---- Order Management
        Route::get('/admin/order-list','PageController@orderList');
        Route::post('/admin/order-management/get-all-orders', 'AdminController@getAllOrders');
        Route::post('/admin/order-management/delete-orders', 'AdminController@deleteOrderByStaff');
        Route::post('/admin/order-management/view-orders', 'AdminController@viewOrderByStaff');
        Route::post('/admin/order-management/delevered', 'AdminController@orderDeleveredByStaff');

        //---- Report Generation-----
        // order report
        Route::get('/admin/report/order-report','PageController@orderReport');
        Route::post('/admin/report/get-all-orders-report', 'AdminController@getAllOrdersReport');
        Route::post('/admin/report/view-orders-detail', 'AdminController@viewOrderDetail');
        // product report
        Route::get('/admin/report/product-report','PageController@productReport');
        Route::post('/admin/product-sell-details','ProductController@productSellDetails');
        // search report
        Route::get('/admin/report/search-report','PageController@searchReport');

        //-----Theme content-------
        Route::post('/admin/theme-slider/get-theme-records', 'AdminController@getThemeData');
    });

    //-----Onlyenduser access this route-----
    Route::group(['middleware' => ['OnlyUsersAccessibleRoute']], function() {
        Route::get('/profile','PageController@profile');
        Route::post('/get-profile', 'AuthController@getProfileData');
        Route::post('/update-profile', 'AuthController@updateProfileRecord');
        Route::post('/update-password', 'AuthController@change_profile_password');
        Route::post('/buy-individual-products', 'UserController@userBuyProduct');

        // my-order section
        Route::post('/user/my-orders', 'UserController@getMyOrders');
        Route::post('/user/view-order', 'UserController@viewOrder');
        Route::get('/user/invoice/print-invoice/{id1}', 'PageController@printInvoice');

        //------------cart-----------------
        Route::post('/proceed-cart-product', 'UserController@userBuyProduct_cart');

        //-----Product reorder-----
        Route::post('/user/check-product-for-reorder', 'UserController@checkProductForReorder');
    });

});

Route::post('/addtocart-before-login', 'HomeController@add_to_cart_before_login');
Route::post('/get-cart-item-before-login', 'HomeController@get_cart_items_before_login');
Route::post('/addtocart-blogin-increment', 'HomeController@add_to_cart_before_login');
Route::post('/addtocart-blogin-decrement', 'HomeController@add_to_cart_before_login');

//-------------------**********************--------------------
Route::post('/check_orders_for_self_delete', 'HomeController@checkOrdersForSelfDelete');

        Route::get('/about_us', 'PageController@about_us')->name('about_us');
        Route::get('/contact', 'PageController@contact')->name('contact');
        Route::get('/grocery', 'PageController@grocery')->name('grocery');

        Route::get('/admin_panel', 'PageController@admin_panel')->name('admin_panel');

        //-----user end-----
        Route::get('/all_list', 'PageController@all_list')->name('product');
        Route::post('/product/get-all-category', 'HomeController@getAllCategory');

        //product
        
        Route::get('/product_list','ProductController@get_product')->name('get_product');
        Route::post('/product_delete_modal','ProductController@delete_record')->name('product_delete');
        Route::post('/update-product/{id}','ProductController@update')->name('update.product');



//Enquiry
    Route::post('/enquiry','EnquiryController@Enquiry')->name('contact.message');

        //User_Staff
        Route::post('/staff','StaffController@User_Staff')->name('staff');
        // Route::get('/delete-staff/{id}','StaffController@deleteStaff');
        // Route::get('/staff','StaffController@getStaff');

        //search routes
        Route::get('/product_list_search','ProductController@product_list_search')->name('product_list_search');

        Route::get('/home', 'HomeController@index')->name('home');
