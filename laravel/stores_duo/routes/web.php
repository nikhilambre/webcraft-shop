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


Auth::routes();

Route::get('/', 'Guest\IndexController@index')->name('guest.index');
Route::get('/feature', 'Guest\FeatureController@index')->name('guest.feature');
Route::get('/feature-detail', 'Guest\FeatureController@details')->name('guest.featuredetail');
Route::get('/feature-cms', 'Guest\FeatureController@cmsDetails')->name('guest.cmsdetail');
Route::get('/contact', 'Guest\ContactController@index')->name('guest.contact');
Route::post('/contact', 'Guest\ContactController@postContactPage')->name('post.contact');
Route::get('/template', 'Templates\TemplateController@index')->name('guest.template');
Route::get('/ourwork', 'Guest\OurworkController@index')->name('guest.ourwork');     //  Coming soon
Route::get('/our-services', 'Guest\OurworkController@getServices')->name('guest.services'); //  Comimng soon
Route::get('/how-we-do-it', 'Guest\OurworkController@getHowDoIt')->name('guest.services'); //  Comimng soon
Route::get('/pricing', 'Guest\PricingController@index')->name('guest.pricing');
Route::get('/pricing-detail', 'Guest\PricingController@details')->name('guest.pricingdetail');
Route::get('/order/custom', 'Guest\PricingController@getCustomOrder')->name('guest.custome-order');
Route::get('/dashboard', 'Guest\GuestController@dashboard')->name('guest.dashboard');
Route::get('/dashboard-detail', 'Guest\GuestController@dashboardDetails')->name('guest.dashboarddetail');
Route::get('/coming-soon', 'Guest\OurworkController@getComingSoon')->name('guest.comingsoon');
Route::get('/404', 'Guest\ErrorController@index')->name('guest.404');


Route::prefix('blog')->group(function(){
    Route::get('/', 'Guest\BlogController@index')->name('blog.list');
    Route::get('/{categoryNameSlug}', 'Guest\BlogController@blogForCategory')->name('blog.category');
    Route::get('/post/{postTitleSlug}', 'Guest\BlogController@getPostPage')->name('blog.post');
});

Route::prefix('product')->group(function(){
    Route::get('/', 'Guest\ProductController@index')->name('guest.product');
    Route::get('/blog-website', 'Guest\ProductController@productBlog')->name('guest.product-blog');
    Route::get('/ecommerce-website', 'Guest\ProductController@productEcommerce')->name('guest.product-ecommerce');
    Route::get('/profile-website', 'Guest\ProductController@productProfile')->name('guest.product-profile');
    Route::get('/static-website', 'Guest\ProductController@productStatic')->name('guest.product-static');
    Route::get('/product-website', 'Guest\ProductController@productProduct')->name('guest.product-product');
});

//  Shows list of components with image and Name formate [eg. Page Header Designs List]
Route::group(['prefix' => 'template-list'], function () {
    Route::get('/component-list', 'Templates\TemplateController@getComponentType')->name('guest.component-type');
    Route::get('/component-list/{subType}', 'Templates\TemplateController@getComponentList')->name('guest.component-list');

    Route::get('/{type}', 'Templates\TemplateController@lists')->name('guest.lists');
});

//  Display all list starting from id 1 of type specified without any specific typeId [Not in use] - layout-list-view.blade
Route::group(['prefix' => 'listing'], function () {
    Route::get('/{view}/{type}/{subType?}', 'Templates\TemplateListingController@index');
    Route::get('/iframe/{view}/{type}/{subType?}', 'Templates\TemplateListingController@getIframeData');
});

//  Displays all subTypes of specific typeId [used to load headers with its subtypes in NEXT] -- origionaly
//  NOW modified check with <= and we are getting all further options to view in NEXT button - layout-singlelist-view.blade
Route::group(['prefix' => 'single-list'], function () {
    Route::get('/{view}/{type}/{typeId}/{subType?}', 'Templates\TemplateListingController@lists');
    Route::get('/iframe/{view}/{type}/{typeId}/{subType?}', 'Templates\TemplateListingController@getListIframeData');
});

//  Displays individual item and we need to specify all three parameters 
//  listing is not in use but we use while development - layout-view.blade
Route::group(['prefix' => 'template'], function () {
    Route::get('/{view}/{type}/{typeId}/{subType}', 'Templates\TemplateListingController@getTemplatePage');
    Route::get('/{view}/theme/{type}/{name}/{page}', 'Templates\ThemeController@index');
    Route::get('/iframe/{view}/{type}/{typeId}/{subType}', 'Templates\TemplateListingController@getIframeData');
});

Route::get('/login/facebook', 'Auth\SocialiteLoginController@redirectToProviderFacebook');
Route::get('/login/facebook/callback', 'Auth\SocialiteLoginController@handleProviderCallbackFacebook');
Route::get('/login/twitter', 'Auth\SocialiteLoginController@redirectToProviderTwitter');
Route::get('/login/twitter/callback', 'Auth\SocialiteLoginController@handleProviderCallbackTwitter');
Route::get('/login/google', 'Auth\SocialiteLoginController@redirectToProviderGoogle');
Route::get('/login/google/callback', 'Auth\SocialiteLoginController@handleProviderCallbackGoogle');

Route::get('/about', function () {
    return view('guest.about');
})->name('guest.about');

Route::get('/cancel-order', function () {
    return view('guest.cancel');
});

Route::get('/terms', function () {
    return view('guest.terms');
});

Route::get('/refund', function () {
    return view('guest.refund');
});

Route::get('/privacy', function () {
    return view('guest.privacy');
});

Route::get('/orderflow', function () {
    return view('guest.order-process');
});

Route::prefix('support')->group(function(){

    Route::get('/orderflow', function () {
        return view('guest.order-process');
    });

});

// Route::get('/home', 'HomeController@index');
// Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('customer')->group(function(){

    //  Register Routes
    //Route::get('/register', 'Auth\CustomerRegisterController@showRegistrationForm')->name('customer.register');
    Route::post('/register', 'Auth\CustomerRegisterController@register')->name('customer.register.submit');
    Route::get('/register/verify/{token}', 'Auth\CustomerRegisterController@verify')->name('customer.email.verify'); 

    //  Login routes
    //Route::get('/login', 'Auth\CustomerLoginController@showLoginform')->name('customer.login');
    Route::post('/login', 'Auth\CustomerLoginController@login')->name('customer.login.submit');
    //Route::get('/', 'CustomerController@index')->name('customer.dashboard');
    Route::post('/logout', 'Auth\CustomerLoginController@logout')->name('customer.logout');

    //  Password reset routes
    Route::post('/password/email', 'Auth\CustomerForgotPasswordController@sendResetLinkEmail')->name('customer.password.email');
    //Route::get('/password/reset', 'Auth\CustomerForgotPasswordController@showLinkRequestForm')->name('customer.password.request');
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


Route::group(['prefix' => 'order', 'middleware' => ['auth:customer']], function () {

    Route::get('/create/{setCurrency?}', 'User\OrderController@index')->name('get.order-create');
    Route::post('/create', 'User\OrderController@saveOrder')->name('post.order-create');
    Route::get('/saved/{orderCode}', 'User\OrderController@saveDone')->name('get.order-saved');

    Route::get('/list', 'User\OrderManageController@listOrder')->name('order-list');
    Route::get('/favorite', 'User\OrderManageController@getOrderFavorite')->name('order-favorite');
    Route::get('/update/ordercode', 'User\OrderManageController@getOrderUpdateCustom')->name('get.order-update-custom');
    Route::get('/update/{orderId}/{setCurrency?}', 'User\OrderManageController@getOrderUpdatePage')->name('get.order-update');
    Route::post('/update', 'User\OrderManageController@updateOrder')->name('post.order-update');
    Route::get('/status/{orderId}', 'User\OrderManageController@orderStatus')->name('get.order-status');
    //Route::get('/requirements/{orderId}/{orderCode}', 'User\OrderManageController@orderData')->name('get.order-data');

    Route::get('/confirm', 'User\OrderAfterPaymentController@orderConfirm')->name('get.order-confirm');
    Route::get('/failed', 'User\OrderAfterPaymentController@orderFailed')->name('get.order-failed');

    Route::get('/delete/{orderId}', 'User\OrderActionController@getDeleteOrder')->name('get.order-delete');
    Route::get('/cancel/{orderId}', 'User\OrderActionController@getCancelOrder')->name('get.order-cancel');
    Route::get('/cancelled/{orderId}/{orderCode}', 'User\OrderActionController@cancelledOrder')->name('get.order-cancelled');
    Route::get('/download/{fileName}', 'User\OrderActionController@fileDownload')->name('get.file-download');

    //  User Related Data Pages
    Route::get('/user', 'User\UserProfileController@getProfile')->name('get.user-profile');
    Route::get('/user/components', 'User\UserProfileController@getProfileComponents')->name('get.user-components');
    Route::post('/address/create', 'User\UserProfileController@postAddress')->name('post.user-addr-create');
    Route::get('/address/create', 'User\UserProfileController@getAddress')->name('get.user-addr-create');
    Route::post('/address/edit/{Id}', 'User\UserProfileController@postAddressEdit')->name('post.user-addr-edit');
    Route::get('/address/edit', 'User\UserProfileController@getAddressEdit')->name('get.user-addr-edit');
    Route::get('/address/delete/{Id}', 'User\UserProfileController@addressDelete')->name('get.user-addr-delete');

    Route::get('/payment/{id}', 'User\PaymentController@index')->name('get.payment');
    Route::post('/payment/ccav', 'User\PaymentController@orderRequest')->name('post.ccav');
    Route::post('/payment/stripe', 'User\PaymentController@stripeRequest')->name('post.stripe');
});


Route::group(['prefix' => 'ajax', 'middleware' => ['auth:customer']], function () {

    if(Request::ajax()){

        //  Own site requests
        Route::post('/savefavorite', 'Templates\TemplateController@ajaxSaveFavorite');
        Route::post('/removefavorite', 'Templates\TemplateController@ajaxDeleteFavorite');
        Route::post('/savecomment/{orderId}', 'User\OrderManageController@ajaxComments');
        Route::post('/cancelorder/{orderId}', 'User\OrderActionController@ajaxCancelOrder');
        Route::post('/call/{orderId}', 'User\OrderActionController@ajaxCallOrder');
        Route::post('/orderdelete/{orderId}', 'User\OrderActionController@ajaxDeleteOrder');
    }
    
});
