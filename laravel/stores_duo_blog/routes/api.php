<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//  Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) { ... });  for multiple parameters

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth:api']], function() {

    //  Common to all routes----------------------------------------------------------------------
    //  Routes for User/Admin actions
    Route::post('/user', 'UserController@postUser')->name('user.post');
    Route::get('/users', 'UserController@getUsers')->name('user.getAll');
    Route::get('/user/{id}', 'UserController@getUser')->name('user.get');
    Route::post('/user/{id}', 'UserController@putUser')->name('user.put');
    Route::delete('/user/{id}', 'UserController@deleteUser')->name('user.delete');
    Route::get('/user/forUser/{id}', 'UserController@getForUser')->name('user.forUser');
    Route::get('/user/forId/{id}', 'UserController@getForUser')->name('user.forId');
    Route::put('/user/change/{id}', 'UserController@changePassword')->name('user.password');

    //  Routes for Address actions
    Route::post('/address', 'Dashboard\AddressController@postAddr')->name('address.post');
    Route::get('/addresss', 'Dashboard\AddressController@getAddrs')->name('address.getAll');
    Route::get('/address/{id}', 'Dashboard\AddressController@getAddr')->name('address.get');
    Route::post('/address/{id}', 'Dashboard\AddressController@putAddr')->name('address.put');
    Route::delete('/address/{id}', 'Dashboard\AddressController@deleteAddr')->name('address.delete');

    //  Routes for iFrame actions
    Route::post('/iframe', 'Dashboard\IframeController@postIframe')->name('iframe.post');
    Route::get('/iframes', 'Dashboard\IframeController@getIframes')->name('iframe.getAll');
    Route::get('/iframe/{id}', 'Dashboard\IframeController@getIframe')->name('iframe.get');
    Route::post('/iframe/{id}', 'Dashboard\IframeController@putIframe')->name('iframe.put');
    Route::delete('/iframe/{id}', 'Dashboard\IframeController@deleteIframe')->name('iframe.delete');

    //  Routes for Social Link actions
    Route::post('/social', 'Dashboard\SocialController@postSocial')->name('social.post');
    Route::get('/socials', 'Dashboard\SocialController@getSocials')->name('social.getAll');
    Route::get('/social/{id}', 'Dashboard\SocialController@getSocial')->name('social.get');
    Route::post('/social/{id}', 'Dashboard\SocialController@putSocial')->name('social.put');
    Route::delete('/social/{id}', 'Dashboard\SocialController@deleteSocial')->name('social.delete');

    //  Routes for message Link actions
    //Route::post('/message', 'Dashboard\MessageController@postMessage')->name('message.post');
    Route::get('/messages', 'Dashboard\MessageController@getMessages')->name('message.getAll');
    Route::get('/message/{id}', 'Dashboard\MessageController@getMessage')->name('message.get');
    //Route::post('/message/{id}', 'Dashboard\MessageController@putMessage')->name('message.put');
    Route::delete('/message/{id}', 'Dashboard\MessageController@deleteMessage')->name('message.delete');

    //  Routes for SEO actions
    Route::post('/seo', 'Dashboard\SeoController@postSeo')->name('seo.post');
    Route::get('/seos', 'Dashboard\SeoController@getSeos')->name('seo.getAll');
    Route::get('/seo/{id}', 'Dashboard\SeoController@getSeo')->name('seo.get');
    Route::post('/seo/{id}', 'Dashboard\SeoController@putSeo')->name('seo.put');
    Route::delete('/seo/{id}', 'Dashboard\SeoController@deleteSeo')->name('seo.delete');

    //  Routes for Visitors 
    //Route::post('/visitor', 'Dashboard\SeoController@postSeo')->name('visitor.post');
    Route::get('/visitors', 'Dashboard\VisitorController@getVisitors')->name('visitor.getAll');
    Route::get('/visitor/{id}', 'Dashboard\VisitorController@getVisitor')->name('visitor.get');
    //Route::post('/visitor/{id}', 'Dashboard\SeoController@putSeo')->name('visitor.put');
    //Route::delete('/visitor/{id}', 'Dashboard\SeoController@deleteSeo')->name('visitor.delete');


    //  Routes for Page Updator----------------------------------------------------------------------
    //
    Route::post('/pageupdator', 'Dashboard\PageupdatorController@postPageupdator')->name('Pageupdator.post');
    Route::get('/pageupdators', 'Dashboard\PageupdatorController@getPageupdators')->name('Pageupdator.getAll');
    Route::get('/pageupdator/{id}', 'Dashboard\PageupdatorController@getPageupdator')->name('Pageupdator.get');
    Route::post('/pageupdator/{id}', 'Dashboard\PageupdatorController@putPageupdator')->name('Pageupdator.put');
    Route::delete('/pageupdator/{id}', 'Dashboard\PageupdatorController@deletePageupdator')->name('Pageupdator.delete');
    
    Route::get('/pageupdator/forId/{id}', 'Dashboard\PageupdatorController@getForUser')->name('Pageupdator.forId');
    Route::put('/pageupdator/change/{id}', 'Dashboard\PageupdatorController@changePassword')->name('Pageupdator.password');




    // Routes for product and eCommerce----------------------------------------------------------------
    //  Routes for filter actions
    Route::post('/filter', 'Dashboard\FilterController@postFilter')->name('filter.post');
    Route::get('/filters', 'Dashboard\FilterController@getFilters')->name('filter.getAll');
    Route::get('/filter/{id}', 'Dashboard\FilterController@getFilter')->name('filter.get');
    Route::post('/filter/{id}', 'Dashboard\FilterController@putFilter')->name('filter.put');
    Route::delete('/filter/{id}', 'Dashboard\FilterController@deleteFilter')->name('filter.delete');

    //  Routes for Category actions
    Route::post('/category', 'Dashboard\CategoryController@postCategory')->name('category.post');
    Route::get('/categorys', 'Dashboard\CategoryController@getCategorys')->name('category.getAll');
    Route::get('/category/{id}', 'Dashboard\CategoryController@getCategory')->name('category.get');
    Route::post('/category/{id}', 'Dashboard\CategoryController@putCategory')->name('category.put');
    Route::delete('/category/{id}', 'Dashboard\CategoryController@deleteCategory')->name('category.delete');
    Route::get('/categoryforfilter/{id}', 'Dashboard\CategoryController@getForFilter')->name('category.filter.get');

    //  Routes for enquiry Link actions
    //Route::post('/enquiry', 'Dashboard\EnquiryController@postEnquiry')->name('enquiry.post');
    Route::get('/enquirys', 'Dashboard\EnquiryController@getEnquirys')->name('enquiry.getAll');
    Route::get('/enquiry/{id}', 'Dashboard\EnquiryController@getEnquiry')->name('enquiry.get');
    //Route::post('/enquiry/{id}', 'Dashboard\EnquiryController@putEnquiry')->name('enquiry.put');
    Route::delete('/enquiry/{id}', 'Dashboard\EnquiryController@deleteEnquiry')->name('enquiry.delete');

    //  Routes for Order
    Route::get('/orders', 'Dashboard\OrderController@getOrders')->name('order.getAll');
    Route::get('/order/{id}', 'Dashboard\OrderController@getOrder')->name('order.get');
    Route::post('/order/{id}', 'Dashboard\OrderController@putOrder')->name('order.put');

    Route::get('/orderaddress/{id}', 'Dashboard\OrderAddressController@getOrderAddress')->name('orderaddress.get');
    
    

    //  WebCraft Order Specific routes
    Route::get('/ordercall/{id}', 'Dashboard\OrderCallController@getOrderCall')->name('ordercall.get');
    Route::post('/ordercall/{id}', 'Dashboard\OrderCallController@putOrderCall')->name('ordercall.put');

    Route::get('/orderdata/{id}', 'Dashboard\OrderChoiceController@getOrderChoice')->name('orderchoice.get');

    Route::get('/ordercomment/{id}', 'Dashboard\OrderCommentController@getOrderComment')->name('ordercomment.get');
    Route::post('/ordercomment', 'Dashboard\OrderCommentController@postOrderComment')->name('ordercomment.post');


    //  Routes for Cart
    Route::get('/carts', 'Dashboard\OrdercartController@getOrdercarts')->name('cart.getAll');
    Route::get('/cart/{id}', 'Dashboard\OrdercartController@getOrdercart')->name('cart.get');
    Route::post('/cart/{id}', 'Dashboard\OrdercartController@putOrdercart')->name('cart.put');
    Route::get('/cart/forId/{id}', 'Dashboard\OrdercartController@getForId')->name('cart.forId');

    //  Routes for Coupons
    Route::post('/coupon', 'Dashboard\CouponController@postCoupon')->name('Coupon.post');
    Route::get('/coupons', 'Dashboard\CouponController@getCoupons')->name('Coupon.getAll');
    Route::get('/coupon/{id}', 'Dashboard\CouponController@getCoupon')->name('Coupon.get');
    Route::post('/coupon/{id}', 'Dashboard\CouponController@putCoupon')->name('Coupon.put');
    Route::delete('/coupon/{id}', 'Dashboard\CouponController@deleteCoupon')->name('Coupon.delete');

    //  Product Reviews
    Route::post('/review', 'Dashboard\ProductReviewController@postProductreview')->name('review.post');
    Route::get('/reviews', 'Dashboard\ProductReviewController@getProductreviews')->name('review.getAll');
    Route::get('/review/{id}', 'Dashboard\ProductReviewController@getProductreview')->name('review.get');
    //Route::post('/review/{id}', 'Dashboard\ProductReviewController@putProductreview')->name('review.put');
    //Route::delete('/review/{id}', 'Dashboard\ProductReviewController@deleteBlogReview')->name('review.delete');


    Route::group(['prefix' => 'product'], function() {

        Route::delete('/image/{id}', 'Dashboard\ProductController@deleteImage')->name('image.delete');

        //  Routes for Product Prices in different currency
        Route::post('/price', 'Dashboard\ProductPriceController@postPrice')->name('price.post');
        Route::get('/prices', 'Dashboard\ProductPriceController@getPrices')->name('price.getAll');
        Route::get('/price/{id}', 'Dashboard\ProductPriceController@getPrice')->name('price.get');
        Route::post('/price/{id}', 'Dashboard\ProductPriceController@putPrice')->name('price.put');
        Route::delete('/price/{id}', 'Dashboard\ProductPriceController@deletePrice')->name('price.delete');
        
        Route::get('/price/forId/{id}', 'Dashboard\ProductPriceController@getForId')->name('price.forId');

        //  Routes for Product Tax
        Route::post('/tax', 'Dashboard\ProductTaxController@postProducttax')->name('tax.post');
        Route::get('/taxs', 'Dashboard\ProductTaxController@getProducttaxs')->name('tax.getAll');
        Route::get('/tax/{id}', 'Dashboard\ProductTaxController@getProducttax')->name('tax.get');
        Route::post('/tax/{id}', 'Dashboard\ProductTaxController@putProducttax')->name('tax.put');
        Route::delete('/tax/{id}', 'Dashboard\ProductTaxController@deleteProducttax')->name('tax.delete');

        //  Routes for Product Tags
        Route::post('/tag', 'Dashboard\ProductTagController@postTag')->name('tag.post');
        Route::get('/tags', 'Dashboard\ProductTagController@getTags')->name('tag.getAll');
        Route::get('/tag/{id}', 'Dashboard\ProductTagController@getTag')->name('tag.get');
        Route::post('/tag/{id}', 'Dashboard\ProductTagController@putTag')->name('tag.put');
        Route::delete('/tag/{id}', 'Dashboard\ProductTagController@deleteTag')->name('tag.delete');

        //  Routes for Product Tags Mapping
        Route::post('/tagmap', 'Dashboard\ProductTagMapController@postTagMap')->name('tagmap.post');
        Route::get('/tagmaps', 'Dashboard\ProductTagMapController@getTagMaps')->name('tagmap.getAll');
        Route::get('/tagmap/{id}', 'Dashboard\ProductTagMapController@getTagMap')->name('tagmap.get');
        Route::post('/tagmap/{id}', 'Dashboard\ProductTagMapController@putTagMap')->name('tagmap.put');
        Route::delete('/tagmap/{id}', 'Dashboard\ProductTagMapController@deleteTagMap')->name('tagmap.delete');

        Route::get('/tagmap/forId/{id}', 'Dashboard\ProductTagMapController@getForId')->name('tagmap.forId');

        //  Routes for Product Options
        Route::post('/option', 'Dashboard\ProductOptionController@postOption')->name('option.post');
        Route::get('/options', 'Dashboard\ProductOptionController@getOptions')->name('option.getAll');
        Route::get('/option/{id}', 'Dashboard\ProductOptionController@getOption')->name('option.get');
        Route::post('/option/{id}', 'Dashboard\ProductOptionController@putOption')->name('option.put');
        Route::delete('/option/{id}', 'Dashboard\ProductOptionController@deleteOption')->name('option.delete');

        //  Routes for Product Options Types
        Route::post('/optiontype', 'Dashboard\ProductOptionTypeController@postOptionType')->name('optiontype.post');
        Route::get('/optiontypes', 'Dashboard\ProductOptionTypeController@getOptionTypes')->name('optiontype.getAll');
        Route::get('/optiontype/{id}', 'Dashboard\ProductOptionTypeController@getOptionType')->name('optiontype.get');
        Route::post('/optiontype/{id}', 'Dashboard\ProductOptionTypeController@putOptionType')->name('optiontype.put');
        Route::delete('/optiontype/{id}', 'Dashboard\ProductOptionTypeController@deleteOptionType')->name('optiontype.delete');

        Route::get('/optiontype/forId/{id}', 'Dashboard\ProductOptionTypeController@getForId')->name('optiontype.forId');

        //  Routes for Product Options Types mapping
        Route::post('/optiontypemap', 'Dashboard\ProductOptionTypeMapController@postOptionTypeMap')->name('optiontypemap.post');
        Route::get('/optiontypemaps', 'Dashboard\ProductOptionTypeMapController@getOptionTypeMaps')->name('optiontypemap.getAll');
        Route::get('/optiontypemap/{id}', 'Dashboard\ProductOptionTypeMapController@getOptionTypeMap')->name('optiontypemap.get');
        Route::post('/optiontypemap/{id}', 'Dashboard\ProductOptionTypeMapController@putOptionTypeMap')->name('optiontypemap.put');
        Route::delete('/optiontypemap/{id}', 'Dashboard\ProductOptionTypeMapController@deleteOptionTypeMap')->name('optiontypemap.delete');

        Route::get('/optiontypemap/forId/{id}', 'Dashboard\ProductOptionTypeMapController@getForId')->name('optiontypemap.forId');
    });

    //  Routes for Product actions and includes product + Product category + product Images
    Route::post('/product', 'Dashboard\ProductController@postProduct')->name('product.post');
    Route::get('/products', 'Dashboard\ProductController@getProducts')->name('product.getAll');
    Route::get('/product/{id}', 'Dashboard\ProductController@getProduct')->name('product.get');
    Route::post('/product/{id}', 'Dashboard\ProductController@putProduct')->name('product.put');
    Route::delete('/product/{id}', 'Dashboard\ProductController@deleteProduct')->name('product.delete');

    Route::get('/product/forId/{id}', 'Dashboard\ProductController@getForId')->name('product.forId');


    //  Routes for Stores Buzz Dashboard--------------------------------------------------------------------
    //  Routes for Templates
    Route::post('/template', 'Dashboard\TemplateController@postTemplate')->name('template.post');
    Route::get('/templates', 'Dashboard\TemplateController@getTemplates')->name('template.getAll');
    Route::get('/template/{id}', 'Dashboard\TemplateController@getTemplate')->name('template.get');
    Route::post('/template/{id}', 'Dashboard\TemplateController@putTemplate')->name('template.put');
    Route::delete('/template/{id}', 'Dashboard\TemplateController@deleteTemplate')->name('template.delete');


    //  BLog Routes-----------------------------------------------------------------------------
    //--------------------------------------------------------------------------------------------

    //  Blog Home dashboard
    Route::get('/home/singlepost/{id}', 'Dashboard\BlogHomeController@getSinglePost')->name('home.getSinglePost');
    Route::get('/home/singlepostid', 'Dashboard\BlogHomeController@getSinglePostId')->name('home.getSinglePostId');
    Route::get('/home/post', 'Dashboard\BlogHomeController@getPost')->name('home.getPost');
    Route::get('/home/weekstat', 'Dashboard\BlogHomeController@weekstat')->name('home.weekstat');
    Route::get('/home/weeksubs', 'Dashboard\BlogHomeController@getWeekSubs')->name('home.getWeekSubs');
    Route::get('/home/catstats', 'Dashboard\BlogHomeController@getCatStats')->name('home.getCatStats');
    Route::get('/home/update', 'Dashboard\BlogHomeController@recentUpdate')->name('home.recentUpdate');

    //  Blog Posts
    Route::post('/blogpost', 'Dashboard\BlogPostController@postBlogPost')->name('blogpost.post');
    Route::get('/blogposts', 'Dashboard\BlogPostController@getBlogPosts')->name('blogpost.getAll');
    Route::get('/blogpost/{id}', 'Dashboard\BlogPostController@getBlogPost')->name('blogpost.get');
    Route::post('/blogpost/{id}', 'Dashboard\BlogPostController@putBlogPost')->name('blogpost.put');
    Route::delete('/blogpost/{id}', 'Dashboard\BlogPostController@deleteBlogPost')->name('blogpost.delete');

    //  Blog Tags
    Route::post('/blogtag', 'Dashboard\BlogTagController@postBlogTag')->name('blogtag.post');
    Route::get('/blogtags', 'Dashboard\BlogTagController@getBlogTags')->name('blogtag.getAll');
    Route::get('/blogtag/{id}', 'Dashboard\BlogTagController@getBlogTag')->name('blogtag.get');
    Route::post('/blogtag/{id}', 'Dashboard\BlogTagController@putBlogTag')->name('blogtag.put');
    Route::delete('/blogtag/{id}', 'Dashboard\BlogTagController@deleteBlogTag')->name('blogtag.delete');

    //  Blog Tagmaps
    // Route::post('/blogtagmap', 'Dashboard\BlogTagMapController@postBlogTagmap')->name('blogtagmap.post');
    Route::get('/blogtagmaps', 'Dashboard\BlogTagMapController@getBlogTagmaps')->name('blogtagmap.getAll');
    // Route::get('/blogtagmap/{id}', 'Dashboard\BlogTagMapController@getBlogTagmap')->name('blogtagmap.get');
    Route::post('/blogtagmap/{id}', 'Dashboard\BlogTagMapController@putBlogTagmap')->name('blogtagmap.put');
    // Route::delete('/blogtagmap/{id}', 'Dashboard\BlogTagMapController@deleteBlogTagmap')->name('blogtagmap.delete');

    Route::get('/blogtagmap/forId/{id}', 'Dashboard\BlogTagMapController@getForId')->name('blogtagmap.forId');

    //  Blog Authors
    Route::post('/blogauthor', 'Dashboard\BlogAuthorController@postBlogAuthor')->name('blogauthor.post');
    Route::get('/blogauthors', 'Dashboard\BlogAuthorController@getBlogAuthors')->name('blogauthor.getAll');
    Route::get('/blogauthor/{id}', 'Dashboard\BlogAuthorController@getBlogAuthor')->name('blogauthor.get');
    Route::post('/blogauthor/{id}', 'Dashboard\BlogAuthorController@putBlogAuthor')->name('blogauthor.put');
    Route::delete('/blogauthor/{id}', 'Dashboard\BlogAuthorController@deleteBlogAuthor')->name('blogauthor.delete');

    //  Blog Categories
    Route::post('/blogcategory', 'Dashboard\BlogCategoryController@postBlogCategory')->name('blogcategory.post');
    Route::get('/blogcategorys', 'Dashboard\BlogCategoryController@getBlogCategorys')->name('blogcategory.getAll');
    Route::get('/blogcategory/{id}', 'Dashboard\BlogCategoryController@getBlogCategory')->name('blogcategory.get');
    Route::post('/blogcategory/{id}', 'Dashboard\BlogCategoryController@putBlogCategory')->name('blogcategory.put');
    Route::delete('/blogcategory/{id}', 'Dashboard\BlogCategoryController@deleteBlogCategory')->name('blogcategory.delete');

    //  Blog Parent Category
    Route::post('/blogparentcat', 'Dashboard\BlogParentcatController@postBlogParentcat')->name('blogparentcat.post');
    Route::get('/blogparentcats', 'Dashboard\BlogParentcatController@getBlogParentcats')->name('blogparentcat.getAll');
    Route::get('/blogparentcat/{id}', 'Dashboard\BlogParentcatController@getBlogParentcat')->name('blogparentcat.get');
    Route::post('/blogparentcat/{id}', 'Dashboard\BlogParentcatController@putBlogParentcat')->name('blogparentcat.put');
    Route::delete('/blogparentcat/{id}', 'Dashboard\BlogParentcatController@deleteBlogParentcat')->name('blogparentcat.delete');

    //  Blog Comments
    Route::post('/blogcomment', 'Dashboard\BlogCommentController@postBlogComment')->name('blogcomment.post');
    Route::get('/blogcomments', 'Dashboard\BlogCommentController@getBlogComments')->name('blogcomment.getAll');
    Route::get('/blogcomment/{id}', 'Dashboard\BlogCommentController@getBlogComment')->name('blogcomment.get');
    Route::post('/blogcomment/{id}', 'Dashboard\BlogCommentController@putBlogComment')->name('blogcomment.put');
    Route::delete('/blogcomment/{id}', 'Dashboard\BlogCommentController@deleteBlogComment')->name('blogcomment.delete');

    Route::get('/blogcomment/forId/{id}', 'Dashboard\BlogCommentController@getForId')->name('blogcomment.forId');

    //  Blog Subscription
    Route::post('/blogsubscription', 'Dashboard\BlogSubscriptionController@postBlogsubscription')->name('blogsubscription.post');
    Route::get('/blogsubscriptions', 'Dashboard\BlogSubscriptionController@getBlogsubscriptions')->name('blogsubscription.getAll');
    Route::get('/blogsubscription/{id}', 'Dashboard\BlogSubscriptionController@getBlogsubscription')->name('blogsubscription.get');
    Route::post('/blogsubscription/{id}', 'Dashboard\BlogSubscriptionController@putBlogsubscription')->name('blogsubscription.put');
    Route::delete('/blogsubscription/{id}', 'Dashboard\BlogSubscriptionController@deleteBlogsubscription')->name('blogsubscription.delete');

    //  Blog Post Like 
    Route::post('/blogpostlike', 'Dashboard\BlogPostLikeController@postBlogPostLike')->name('blogpostlike.post');
    Route::get('/blogpostlikes', 'Dashboard\BlogPostLikeController@getBlogPostLikes')->name('blogpostlike.getAll');
    Route::get('/blogpostlike/{id}', 'Dashboard\BlogPostLikeController@getBlogPostLike')->name('blogpostlike.get');
    Route::post('/blogpostlike/{id}', 'Dashboard\BlogPostLikeController@putBlogPostLike')->name('blogpostlike.put');
    Route::delete('/blogpostlike/{id}', 'Dashboard\BlogPostLikeController@deleteBlogPostLike')->name('blogpostlike.delete');

    //  Blog Post Media
    Route::post('/blogmedia', 'Dashboard\BlogMediaController@postBlogMedia')->name('blogmedia.post');
    Route::get('/blogmedias', 'Dashboard\BlogMediaController@getBlogMedias')->name('blogmedia.getAll');
    Route::get('/blogmedia/{id}', 'Dashboard\BlogMediaController@getBlogMedia')->name('blogmedia.get');
    Route::delete('/blogmedia/{id}', 'Dashboard\BlogMediaController@deleteBlogMedia')->name('blogmedia.delete');

});