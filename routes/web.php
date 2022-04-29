<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StatusController;
use Illuminate\Support\Facades\Route;

Route::get('/optimize', function () {
    Artisan::call('optimize:clear');
    return redirect('/');
});


Route::get('/', 'PageController@index')->name('home');
Route::post('/theme-categories', 'HomeController@themeCategories');
Route::get('/{serviceName}', 'PageController@medfinpage');
// Route::post('/get-product-by-category', 'HomeController@getProductByCategory');
Route::get('/search-in-medfin/{search_text}', 'PageController@medfinpage');
// Route::Post('/get-record-by-gsearch', 'HomeController@globalSearchByUsers');
// Route::post('/get-product-details-by-event', 'HomeController@getProductDetailsById');
Route::post('/get-contact-details', 'HomeController@getContactDetail');
// my order section
Route::get('/my-order', 'PageController@myOrder');
Route::get('/order-mail', 'PageController@orderMail');


Route::post('/user-self-registration', 'AuthController@userSelfRegistration');
Route::post('/verifyLoginCredential','AuthController@login');


Route::get('/clear-cache', function () {
	Artisan::call('config:clear');
	Artisan::call('route:clear');
	Artisan::call('view:clear');
	Artisan::call('config:cache');
	Artisan::call('view:cache');
	print_r('Please refresh the browser');
});


Route::group(['middleware'=>['LoginCheck']],function(){
    //-----OnlyAdminAccessibleRoute-----
    // Route::get('/logout', function(){
    //     print_r("hi");die;
    // })->name('admin_logout');

    Route::get('/admin/logout','AuthController@logout');

    Route::group(['middleware' => ['OnlyAdminAccessibleRoute']], function() {
        Route::get('/admin/dashboard', 'PageController@adminDashboard');
        //-----enquiries-----
        Route::get('/admin/all-enquiries', 'PageController@enquiriesList');
        Route::post('/admin/enquiry/all-enquiries-list', 'EnquiryController@allEnquiriesList');
        Route::post('/admin/enquiry/view-enquiry', 'EnquiryController@viewEnquiry');
        Route::post('/admin/enquiry/delete-enquiry', 'EnquiryController@deleteEnquiry');

        //-----Reset password-----
        Route::post('/admin/master-opration/reset-password', 'AdminController@resetPasswordByAdmin');

         //-----AdminAndStaffAccessibleRoute-----
        Route::group(['middleware' => ['AdminAndStaffAccessibleRoute']], function() {
        //-----Master Category-----
        Route::get('/admin/master-record/category-list','PageController@masterCategory');
        Route::post('/admin/master-record/get-all-category', 'CategoryController@get_category');
        Route::post('/admin/master-record/register/category','CategoryController@create_category')->name('master.category');
        Route::post('/admin/master-record/edit-category','CategoryController@editCategory');
        Route::post('/admin/master-record/update-category/{id}','CategoryController@update')->name('update.category');
        Route::post('/admin/master-record/delete-category','CategoryController@delete_record');


        // reset password
        Route::get('/admin/profile','PageController@profile');
        Route::post('/admin/get-profile', 'AuthController@getProfileData');
        Route::post('/admin/update-profile', 'AuthController@updateProfileRecord');
        Route::post('/admin/update-password', 'AuthController@change_profile_password');


    //----- Status-----
        Route::post('/banner_status', 'StatusController@banner_status')->name('/banner_status');
        Route::post('/overview_status', 'StatusController@overview_status')->name('/overview_status');
        Route::post('/faq_status', 'StatusController@faq_status')->name('/faq_status');
        Route::post('/doctor_status', 'StatusController@doctor_status')->name('/doctor_status');
        //page publish
        Route::post('/page_publish', 'StatusController@page_publish')->name('/page_publish');
        //page Archive
        Route::post('/page_archive', 'StatusController@page_archive')->name('/page_archive');
        

      //list_pages
      Route::get('/admin/all-banner', 'PageController@bannerList');  
        

        
            //content
            Route::get('/admin/content','PageController@content');
            Route::post('/register/content','ContentController@create_banner')->name('master.banner');
            // Route::post('/update/content','ContentController@update_content')->name('update.content');
            // Route::post('/delete/content','ContentController@delete_content')->name('delete.content');
            Route::post('/register/content/overview','ContentController@create_overview')->name('master.overview');

            //FAQs
            Route::post('/register/content/faqs','ContentController@create_faqs')->name('master.faq');
            //treatment
            Route::post('/register/content/treatment','ContentController@create_treatment')->name('master.treatment'); 
            //cause & symptoms
            Route::post('/register/content/cause-and-symptoms','ContentController@create_symptoms')->name('master.symptoms');
            //advantages
            Route::post('/register/content/advantages','ContentController@create_advantages')->name('master.advantages'); 
            //Appointment-Button
            Route::post('/register/content/app-btn','ContentController@create_app_btn')->name('master.btn');
            
            //testimonials
            Route::get('/admin/testimonials','PageController@testimonials');
            Route::post('/register/testimonials','ContentController@create_testimonials')->name('master.testimonials');
            Route::post('/update/testimonials','ContentController@update_testimonials')->name('update.testimonials');
            Route::post('/delete/testimonials','ContentController@delete_testimonials')->name('delete.testimonials');
    });

});



//-------------------**********************--------------------
Route::post('/check_orders_for_self_delete', 'HomeController@checkOrdersForSelfDelete');

        Route::get('/about_us', 'PageController@about_us')->name('about_us');
        Route::get('/contact', 'PageController@contact')->name('contact');
        Route::get('/grocery', 'PageController@grocery')->name('grocery');


//Enquiry
    Route::post('/enquiry','EnquiryController@Enquiry')->name('contact.message');

        //User_Staff
        Route::post('/staff','StaffController@User_Staff')->name('staff');
        //search routes
        Route::get('/product_list_search','ProductController@product_list_search')->name('product_list_search');
        Route::get('/home', 'HomeController@index')->name('home');
});