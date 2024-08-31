<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//  Default Pages
Route::get('/', 'Product\ProductController@getHomePage')->name('product.index');
Route::get('/about-us', 'Product\ProductController@getAboutPage')->name('product.about');
Route::get('/contact-us', 'Product\ProductController@getContactPage')->name('product.contact');
Route::post('/contact', 'Product\ProductController@postContactPage')->name('post.contact');
Route::get('/terms', 'Product\ProductController@getTermsPage')->name('product.terms');
Route::get('/privacy', 'Product\ProductController@getPrivacyPage')->name('product.privacy');

//  Pages related to product and categories
Route::get('/category/{categoryNameSlug}', 'Product\ProductListController@getCatwiseListPage')->name('product.category');
Route::get('/product', 'Product\ProductListController@getProductListPage')->name('product.product-list');
Route::get('/product/{productNameSlug}', 'Product\ProductManageController@getProductPage')->name('product.product');

Route::post('/enquiry', 'Product\ProductManageController@postEnquiry')->name('post.enquiry');
Route::get('/notfound', 'ErrorController@index')->name('errors.404');

Route::prefix('pageupdator')->group(function(){

    //  Register Routes
    //Route::get('/register', 'Auth\CustomerRegisterController@showRegistrationForm')->name('customer.register');
    //Route::post('/register', 'Auth\CustomerRegisterController@register')->name('customer.register.submit');
    //Route::get('/register/verify/{token}', 'Auth\CustomerRegisterController@verify')->name('customer.email.verify'); 

    //  Login routes
    Route::get('/login', 'Auth\PageupdatorLoginController@showLoginform')->name('pageupdator.login');
    Route::post('/login', 'Auth\PageupdatorLoginController@login')->name('pageupdator.login.submit');
    //Route::get('/', 'PageupdatorController@index')->name('pageupdator.dashboard');
    Route::post('/logout', 'Auth\PageupdatorLoginController@logout')->name('pageupdator.logout');

    //  Password reset routes
    //Route::post('/password/email', 'Auth\PageupdatorForgotPasswordController@sendResetLinkEmail')->name('pageupdator.password.email');
    //Route::get('/password/reset', 'Auth\PageupdatorForgotPasswordController@showLinkRequestForm')->name('pageupdator.password.request');
    //Route::post('/password/reset', 'Auth\PageupdatorResetPasswordController@reset');
    //Route::get('/password/reset/{token}', 'Auth\PageupdatorResetPasswordController@showResetForm')->name('pageupdator.password.reset');

});

Route::group(['prefix' => 'ajax'], function () {

    if(Request::ajax()){

        //  Shop Page 
        Route::post('/getenquiry', 'Product\ProductManageController@ajaxGetEnquiryModal');

        Route::post('/productlist', 'Product\ProductListController@ajaxCatwiseProducts');
        Route::post('/productall', 'Product\ProductListController@ajaxProductList');
    }
    
});

Route::group(['middleware' => ['auth:pageupdator']], function () {
    Route::group(['prefix' => 'ajax'], function () {
        if(Request::ajax()){
            Route::post('/updatesection', 'sectionEditController@ajaxPostSection');
            Route::post('/updateimage', 'sectionEditController@ajaxUpdateImage');
        }
    });

    Route::post('/sectionimage', 'sectionEditController@postSectionImage');
});