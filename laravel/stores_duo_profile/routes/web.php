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

// Route::get('/', function () {
//     return view('guest.home');
// });

// Auth::routes();


//  Profile specific routes

//  Default Pages
Route::get('/', 'Profile\ProfileController@getHomePage')->name('profile.index');
Route::get('/about', 'Profile\ProfileController@getAboutPage')->name('profile.about');
Route::get('/contact', 'Profile\ProfileController@getContactPage')->name('profile.contact');
Route::post('/contact', 'Profile\ProfileController@postContactPage')->name('profile.contact.post');
Route::get('/terms', 'Profile\ProfileController@getTermsPage')->name('profile.terms');
Route::get('/privacy', 'Profile\ProfileController@getPrivacyPage')->name('profile.privacy');

//  Variable Pages [update url part with clients requirments but keep rest same as 1,2,3..]
Route::get('/email-marketing', 'Profile\ProfileVariableController@getOnePage')->name('profile.One');
Route::get('/offline-seo', 'Profile\ProfileVariableController@getTwoPage')->name('profile.Two');
Route::get('/lead-generation', 'Profile\ProfileVariableController@getThreePage')->name('profile.Three');
Route::get('/social-media-marketing', 'Profile\ProfileVariableController@getFourPage')->name('profile.Four');
Route::get('/search-engine-optimization', 'Profile\ProfileVariableController@getFivePage')->name('profile.Five');


Route::get('/login/facebook', 'Auth\SocialiteLoginController@redirectToProviderFacebook');
Route::get('/login/facebook/callback', 'Auth\SocialiteLoginController@handleProviderCallbackFacebook');
Route::get('/login/twitter', 'Auth\SocialiteLoginController@redirectToProviderTwitter');
Route::get('/login/twitter/callback', 'Auth\SocialiteLoginController@handleProviderCallbackTwitter');
Route::get('/login/google', 'Auth\SocialiteLoginController@redirectToProviderGoogle');
Route::get('/login/google/callback', 'Auth\SocialiteLoginController@handleProviderCallbackGoogle');

Route::get('/notfound', 'ErrorController@index')->name('errors.404');

Route::prefix('customer')->group(function(){

    //  Register Routes
    Route::get('/register', 'Auth\CustomerRegisterController@showRegistrationForm')->name('customer.register');
    Route::post('/register', 'Auth\CustomerRegisterController@register')->name('customer.register.submit');
    Route::get('/register/verify/{token}', 'Auth\CustomerRegisterController@verify')->name('customer.email.verify'); 

    //  Login routes
    Route::get('/login', 'Auth\CustomerLoginController@showLoginform')->name('customer.login');
    Route::post('/login', 'Auth\CustomerLoginController@login')->name('customer.login.submit');
    //Route::get('/', 'CustomerController@index')->name('customer.dashboard');
    Route::post('/logout', 'Auth\CustomerLoginController@logout')->name('customer.logout');

    //  Password reset routes
    Route::post('/password/email', 'Auth\CustomerForgotPasswordController@sendResetLinkEmail')->name('customer.password.email');
    Route::get('/password/reset', 'Auth\CustomerForgotPasswordController@showLinkRequestForm')->name('customer.password.request');
    Route::post('/password/reset', 'Auth\CustomerResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\CustomerResetPasswordController@showResetForm')->name('customer.password.reset');
});


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


Route::group(['middleware' => ['auth:pageupdator']], function () {
    Route::group(['prefix' => 'ajax'], function () {
        if(Request::ajax()){
            Route::post('/updatesection', 'sectionEditController@ajaxPostSection');
            Route::post('/updateimage', 'sectionEditController@ajaxUpdateImage');
        }
    });

    Route::post('/sectionimage', 'sectionEditController@postSectionImage');
});