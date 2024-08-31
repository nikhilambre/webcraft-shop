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


//  Blog specific routes

Route::get('/', 'Blog\BlogController@getHomePage')->name('blog.index');
Route::get('/about', 'Blog\BlogController@getAboutPage')->name('blog.about');
Route::get('/contact', 'Blog\BlogController@getContactPage')->name('blog.contact');
Route::post('/contact', 'Blog\BlogController@postContactPage')->name('blog.contact.post');
Route::get('/inspiration', 'Blog\BlogController@getInspirationPage')->name('blog.inspiration');
Route::get('/search', 'Blog\BlogListController@getSearchResult')->name('blog.searchResult');
Route::get('/populer', 'Blog\BlogListController@getPopulerList')->name('blog.populer');

Route::get('/post/{postTitleSlug}', 'Blog\BlogController@getPostPage')->name('blog.post');
Route::get('/author/{authorNameSlug}', 'Blog\BlogController@getAuthorPage')->name('blog.author');
Route::get('/category/{categoryNameSlug}', 'Blog\BlogListController@getCatwiseListPage')->name('blog.category');
Route::get('/tag/{tagNameSlug}', 'Blog\BlogListController@getTagwiseListPage')->name('blog.tag');

Route::get('/login/facebook', 'Auth\SocialiteLoginController@redirectToProviderFacebook');
Route::get('/login/facebook/callback', 'Auth\SocialiteLoginController@handleProviderCallbackFacebook');
Route::get('/login/twitter', 'Auth\SocialiteLoginController@redirectToProviderTwitter');
Route::get('/login/twitter/callback', 'Auth\SocialiteLoginController@handleProviderCallbackTwitter');
Route::get('/login/google', 'Auth\SocialiteLoginController@redirectToProviderGoogle');
Route::get('/login/google/callback', 'Auth\SocialiteLoginController@handleProviderCallbackGoogle');

Route::get('/notfound', 'ErrorController@index')->name('errors.404');

Route::group(['middleware' => ['auth:customer']], function () {
    Route::get('/profile', 'Blog\BlogManageController@getProfilePage')->name('blog.profile');
    Route::get('/profile-edit', 'Blog\BlogManageController@getProfileEditPage')->name('blog.profile.edit');
    Route::post('/profile', 'Blog\BlogManageController@postProfilePage')->name('blog.post.profile');
});

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


Route::group(['prefix' => 'ajax'], function () {

    if(Request::ajax()){
        
        //  Shop Page 
        Route::post('/postfilterarray', 'Blog\BlogShopController@ajaxFilterWiseProduct');
        Route::post('/getreply', 'Blog\BlogAjaxController@ajaxGetPostReply');
        Route::post('/getreviewreply', 'Blog\BlogShopController@ajaxGetReviewReply');
    }
    
});

Route::group(['middleware' => ['auth:customer']], function () {
    Route::group(['prefix' => 'ajax'], function () {

        if(Request::ajax()){

            //  Single post page for comments
            Route::post('/postreply', 'Blog\BlogAjaxController@ajaxPostReply');
            Route::post('/postcomment', 'Blog\BlogAjaxController@ajaxPostComment');

            //  Shop Page 
            Route::post('/postcart', 'Blog\BlogShopController@ajaxProductToCart');
            Route::post('/cartremove', 'Blog\BlogCartController@ajaxRemoveFromCart');
            Route::post('/addwishlist', 'Blog\BlogCartController@ajaxAddToWishlist');
            Route::post('/removewishlist', 'Blog\BlogCartController@ajaxRemoveFromWishlist');
            Route::post('/cartquantity', 'Blog\BlogCartController@ajaxCartQuantity');
            Route::post('/addcoupon', 'Blog\BlogCartController@ajaxSaveCouponCode');
            Route::post('/postreview', 'Blog\BlogShopController@ajaxPostReview');
        }
    });
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