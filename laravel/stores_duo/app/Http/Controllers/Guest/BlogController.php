<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Seo;
use App\Blogcategor;
use App\Blogpost;
use App\Blogcomment;
use TomLingham\Searchy\Facades\Searchy;
use Illuminate\Support\Facades\Input;

class BlogController extends Controller
{
    public function index()
    {

        return view('guest.coming-soon');

        $pageName = 'BLOG';
        $seo = Seo::GetForPagename($pageName)->get();

        $category = Blogcategor::select('id','categoryName','categoryNameSlug','created_at')
                            ->where('categoryStatus', 'ACTIVE')
                            ->orderBy('categoryRank')
                            ->get();

        //  fetch 4 populer Blogs of all time
        $populerBlog = Blogpost::select('blogposts.id','authorId','authorName','categoryId','categoryName','postTitle','postTitleSlug','postImgName','readMinutes','postSubTitle','blogposts.created_at')
                            ->leftJoin('blogauthors', 'blogposts.authorId', '=', 'blogauthors.id')
                            ->leftJoin('blogcategors', 'blogposts.categoryId', '=', 'blogcategors.id')
                            ->where('postStatus', 'PUBLISH')
                            ->orderBy('view', 'DESC')
                            ->limit(4)
                            ->get();


        foreach ($category as $temp) {
            $categoryBlog[$temp->id] = Blogpost::select('blogposts.id','authorId','authorName','categoryId','categoryName','postTitle','postTitleSlug','postImgName','readMinutes','postSubTitle','blogposts.created_at')
                                    ->leftJoin('blogauthors', 'blogposts.authorId', '=', 'blogauthors.id')
                                    ->leftJoin('blogcategors', 'blogposts.categoryId', '=', 'blogcategors.id')
                                    ->where('postStatus', 'PUBLISH')
                                    ->where('categoryId', $temp->id)
                                    ->limit(3)
                                    ->get();
        }

        $recentBlog = Blogpost::select('blogposts.id','authorId','authorName','categoryId','categoryName','postTitle','postTitleSlug','postImgName','readMinutes','postSubTitle','blogposts.created_at')
                            ->leftJoin('blogauthors', 'blogposts.authorId', '=', 'blogauthors.id')
                            ->leftJoin('blogcategors', 'blogposts.categoryId', '=', 'blogcategors.id')
                            ->where('postStatus', 'PUBLISH')
                            ->limit(8)
                            ->latest()
                            ->get();

        return view('guest.blog')->with([
            'seo' => $seo,
            'category' => $category,
            'populerBlog' => $populerBlog,
            'categoryBlog' => $categoryBlog,
            'recentBlog' => $recentBlog,
        ]);
    }

    public function blogForCategory($categoryNameSlug)
    {

        $pageName = 'postlist';
        $seo = Seo::GetForPagename($pageName)->get();

        $category = Blogcategor::select('id','categoryName','categoryNameSlug','created_at')
                            ->where('categoryStatus', 'ACTIVE')
                            ->orderBy('categoryRank')
                            ->get();

        foreach ($category as $temp) {
            if($temp->categoryNameSlug == $categoryNameSlug){
                $id = $temp->id;
                $categoryName = $temp->categoryName;
            }
        }

        $postList = Blogpost::select('Blogposts.id','authorId','authorName','categoryId','postTitle','postTitleSlug','postImgName','postImgCredits','readMinutes','postSubTitle','blogposts.created_at')
                            ->leftJoin('blogauthors', 'Blogposts.authorId', '=', 'blogauthors.id')
                            ->where('postStatus', 'PUBLISH')
                            ->where('categoryId', $id)
                            ->latest()
                            ->paginate(10);

        $recentBlog = Blogpost::select('blogposts.id','authorId','authorName','categoryId','categoryName','postTitle','postTitleSlug','postImgName','readMinutes','postSubTitle','blogposts.created_at')
                                ->leftJoin('blogauthors', 'blogposts.authorId', '=', 'blogauthors.id')
                                ->leftJoin('blogcategors', 'blogposts.categoryId', '=', 'blogcategors.id')
                                ->where('postStatus', 'PUBLISH')
                                ->limit(8)
                                ->latest()
                                ->get();

        return view('guest.blog-category')->with([
            'seo' => $seo,
            'category' => $category,
            'categoryName' => $categoryName,
            'postList' => $postList,
            'recentBlog' => $recentBlog,
        ]);
    }

    public function getPostPage($postTitleSlug)
    {
        $pageName = 'POST';
        $seo = Seo::GetForPagename($pageName)->get();

        $category = Blogcategor::select('id','categoryName','categoryNameSlug','created_at')
                                ->where('categoryStatus', 'ACTIVE')
                                ->orderBy('categoryRank')
                                ->get();

        $blogpost = Blogpost::select('blogposts.id','categoryId','categoryName','authorId','authorName','postTitle','postTitleSlug','postSubTitle','postContent','postImgName','postImgCredits','readMinutes','postStatus','postRank','commentStatus','commentCount','likeCount','view','blogposts.created_at')
                                ->leftJoin('blogauthors', 'blogposts.authorId', '=', 'blogauthors.id')
                                ->leftJoin('blogcategors', 'blogposts.categoryId', '=', 'blogcategors.id')
                                ->where('blogposts.postTitleSlug', $postTitleSlug)
                                ->get();

        foreach ($blogpost as $temp) {
            $id = $temp->id;
            $postTitle = $temp->postTitle;
            $postImgName = $temp->postImgName;
            $authorId = $temp->authorId;
            $views = $temp->view;
        }

        //  Update view count by 1
        $blogpostupdate = Blogpost::find($id);
        $blogpostupdate->view = $views + 1;
        $blogpostupdate->update();

        //  For previouse and Next Post Links
        $previousId = Blogpost::where('id', '<', $id)->max('id');
        $nextId = Blogpost::where('id', '>', $id)->min('id');

        $previous = Blogpost::select('postTitle','postTitleSlug')->where('id', $previousId)->get();
        $next = Blogpost::select('postTitle','postTitleSlug')->where('id', $nextId)->get();

        //  Share links for Post
        $url = \Request::url();
        $root = \Request::root();
        $share = \Share::load($url, $postTitle, $root.'/public/storage/blog/'.$postImgName)->services('facebook','gplus','twitter','linkedin','pinterest');

        $i = 0;
        foreach ($blogtag as $temp) {
            $i++;
            $tagid[$i] = $temp->tagId;
        }

        if ($blogtag->isEmpty()) {
            $tagid = [];
        }

        $blogcomment = Blogcomment::select('blogcomments.id','postId','customerId','name','lastname','customerImgName','commentContent','commentStatus','commentType','commentFlag','commentParentId','like','dislike','blogcomments.created_at')
                                ->join('customers', 'customers.id', 'blogcomments.customerId')
                                ->where('postId', $id)
                                ->where('commentStatus', 'APPROVED')
                                ->where('commentType', 'Comment')
                                ->get();

        $replycount = [];
        foreach ($blogcomment as $temp) {
            $replycount[$temp->id] = Blogcomment::where('commentParentId', $temp->id)->where('commentStatus', 'APPROVED')->count();
        }

        $relatedpost = Blogpost::select('blogposts.id','postTitle','postTitleSlug','postImgName','postStatus','blogposts.created_at')
                                ->join('blogtagmaps', 'blogtagmaps.postId', '=', 'Blogposts.id')
                                ->whereIn('blogtagmaps.tagId', $tagid)
                                ->where('postStatus', 'PUBLISH')
                                ->limit(3)
                                ->distinct()
                                ->get();

        $recentpost = Blogpost::select('blogposts.id','postTitle','postTitleSlug','postImgName','postStatus','blogposts.created_at')
                                ->where('postStatus', 'PUBLISH')
                                ->limit(8)
                                ->latest()
                                ->get();

        return view('guest.blog-single')->with([
            'seo' => $seo,
            'blogpost' => $blogpost,
            'postTitle' => $postTitle,
            'category' => $category,
            'previous' => $previous,
            'next' => $next,
            'share' => $share,
            'blogcomment' => $blogcomment,
            'replycount' => $replycount,
            'relatedpost' => $relatedpost,
            'recentpost' => $recentpost,
        ]);
    }

    public function getSearchResult()
    {
        $pageName = 'search';
        $seo = Seo::GetForPagename($pageName)->get();

        $category = Blogcategor::select('id','categoryName','categoryNameSlug','created_at')
                            ->where('categoryStatus', 'ACTIVE')
                            ->orderBy('categoryRank')
                            ->get();

        $recentBlog = Blogpost::select('blogposts.id','authorId','authorName','categoryId','categoryName','postTitle','postTitleSlug','postImgName','readMinutes','postSubTitle','blogposts.created_at')
                            ->leftJoin('blogauthors', 'blogposts.authorId', '=', 'blogauthors.id')
                            ->leftJoin('blogcategors', 'blogposts.categoryId', '=', 'blogcategors.id')
                            ->where('postStatus', 'PUBLISH')
                            ->limit(8)
                            ->latest()
                            ->get();

        $keyword =  Input::get('keyword');
        $type =  Input::get('type');

        if ($type == 'product') {
            $productIdList = Searchy::products('productName', 'description', 'shortDescription')->query($keyword)
                            ->select('id')->get();

            $idList = [];
            $i = 0;
            foreach ($productIdList as $temp) {
                $idList[$i] = $temp->id;
                $i++;
            }

            //  Location wise currency data and match with our options 
            $currentIp = geoip()->getLocation()->toArray();

            $pageCurrency = Str::lower($currentIp['currency']);
            if($pageCurrency != 'usd' && $pageCurrency != 'inr' && $pageCurrency != 'gbp' && $pageCurrency != 'eur'){
                $pageCurrency == 'usd';
            }

            $productList = Product::select('products.id','productDisplayId','productName','productNameSlug','shortDescription','mark','view','productStock','price','currency','discount','finalPrice','products.created_at')
                                ->join('productprices', 'productprices.productId','products.id')
                                ->where('products.status', 'ACTIVE')
                                ->where('currency', $pageCurrency)
                                ->whereIn('products.id', $idList)
                                ->paginate(15);

            $productImage = [];
            foreach ($productList as $temp) {
                $productImage[$temp->id] = Productimage::select('imageName')
                                        ->where('productId', $temp->id)
                                        ->limit(1)
                                        ->get();
            }

            return view('blog.blog-search-list-product')->with([
                'seo' => $seo,
                'category' => $category,
                'productList' => $productList,
                'productImage' => $productImage,
                'recentBlog' => $recentBlog,
            ]);
        }

        if ($type == 'blog') {
            $postList = Searchy::blogposts('postTitle', 'postSubTitle', 'postContent')->query($keyword)
                            ->getQuery()->having('postStatus', '=', 'PUBLISH')->get();

            $tags = [];
            foreach ($postList as $temp) {
                $tags[$temp->id] = Blogtagmap::select('tagName','tagId','tagNameSlug')
                                            ->leftJoin('blogtags', 'blogtagmaps.tagId', 'blogtags.id')
                                            ->where('postId', $temp->id)
                                            ->limit(3)
                                            ->get();
            }

            return view('blog.blog-search-list')->with([
                'seo' => $seo,
                'category' => $category,
                'postList' => $postList,
                'tags' => $tags,
                'recentBlog' => $recentBlog,
            ]);
        }
    }
}
