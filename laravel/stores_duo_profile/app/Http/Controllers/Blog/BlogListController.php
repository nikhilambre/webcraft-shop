<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Blogcategor;
use App\Blogpost;
use App\Blogtagmap;
use App\Blogtag;
use App\Seo;
use App\Product;
use App\Productimage;
use DB;
use TomLingham\Searchy\Facades\Searchy;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

class BlogListController extends Controller
{
    public function getCatwiseListPage($categoryNameSlug)
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
                            ->paginate(2);

        foreach ($postList as $temp) {

            $tags[$temp->id] = Blogtagmap::select('tagName','tagId','tagNameSlug')
                                ->leftJoin('blogtags', 'blogtagmaps.tagId', 'blogtags.id')
                                ->where('postId', $temp->id)
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

        return view('blog.blog-category')->with([
            'seo' => $seo,
            'category' => $category,
            'categoryName' => $categoryName,
            'postList' => $postList,
            'tags' => $tags,
            'recentBlog' => $recentBlog,
        ]);
    }

    public function getTagwiseListPage($tagNameSlug)
    {
        $pageName = 'postlist';
        $seo = Seo::GetForPagename($pageName)->get();

        $category = Blogcategor::select('id','categoryName','categoryNameSlug','created_at')
                            ->where('categoryStatus', 'ACTIVE')
                            ->orderBy('categoryRank')
                            ->get();

        $id = Blogtag::select('id')->where('tagNameSlug', $tagNameSlug)->get();

        foreach ($id as $temp) {
            $id = $temp->id;
        }        

        $postList = Blogpost::select('blogposts.id','authorId','authorName','categoryId','postTitle','postTitleSlug','postImgName','postImgCredits','readMinutes','postSubTitle','blogposts.created_at')
                            ->leftJoin('blogauthors', 'Blogposts.authorId', '=', 'blogauthors.id')
                            ->join('blogtagmaps', 'blogtagmaps.postId', '=', 'Blogposts.id')
                            ->where('postStatus', 'PUBLISH')
                            ->where('blogtagmaps.tagId', $id)
                            ->latest()
                            ->paginate(10);

        foreach ($postList as $temp) {

            $tags[$temp->id] = Blogtagmap::select('tagName','tagId','tagNameSlug')
                            ->leftJoin('blogtags', 'blogtagmaps.tagId', 'blogtags.id')
                            ->where('postId', $temp->id)
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

        return view('blog.blog-tag')->with([
            'seo' => $seo,
            'category' => $category,
            'tagNameSlug' => $tagNameSlug,
            'postList' => $postList,
            'tags' => $tags,
            'recentBlog' => $recentBlog,
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
    
    public function getArchiveMonthList()
    {
        $pageName = 'archive';
        $seo = Seo::GetForPagename($pageName)->get();

        $category = Blogcategor::select('id','categoryName','categoryNameSlug','created_at')
                            ->where('categoryStatus', 'ACTIVE')
                            ->orderBy('categoryRank')
                            ->get();

        $month =  Input::get('month');
        $year =  Input::get('year');

        $postlist = DB::selectRaw("SELECT 'blogposts.id','authorId','authorName','categoryId','postTitle','postImgName','postImgCredits','readMinutes','postSubTitle','blogposts.created_at'
                            FROM blogposts WHERE MONTH(created_at) = $month
                            AND YEAR(created_at) = $year")->get();

        foreach ($postList as $temp) {

            $tags[$temp->id] = Blogtagmap::select('tagName','tagId','tagNameSlug')
                                        ->leftJoin('blogtags', 'blogtagmaps.tagId', 'blogtags.id')
                                        ->where('postId', $temp->id)
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

        return view('blog.blog-tag')->with([
            'seo' => $seo,
            'category' => $category,
            'postList' => $postList,
            'tags' => $tags,
            'recentBlog' => $recentBlog,
        ]);   
    }

    public function getPopulerList()
    {
        $pageName = 'pupoler';
        $seo = Seo::GetForPagename($pageName)->get();

        $category = Blogcategor::select('id','categoryName','categoryNameSlug','created_at')
                            ->where('categoryStatus', 'ACTIVE')
                            ->orderBy('categoryRank')
                            ->get();

        $postList = Blogpost::select('Blogposts.id','authorId','authorName','categoryId','categoryName','postTitle','postTitleSlug','postImgName','postImgCredits','readMinutes','postSubTitle','blogposts.created_at')
                            ->leftJoin('blogauthors', 'Blogposts.authorId', '=', 'blogauthors.id')
                            ->leftJoin('blogcategors', 'blogposts.categoryId', '=', 'blogcategors.id')
                            ->where('postStatus', 'PUBLISH')
                            ->orderBy('view', 'desc')
                            ->paginate(7);

        foreach ($postList as $temp) {
            $tags[$temp->id] = Blogtagmap::select('tagName','tagId','tagNameSlug')
                                        ->leftJoin('blogtags', 'blogtagmaps.tagId', 'blogtags.id')
                                        ->where('postId', $temp->id)
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

        return view('blog.blog-populer')->with([
            'seo' => $seo,
            'category' => $category,
            'postList' => $postList,
            'tags' => $tags,
            'recentBlog' => $recentBlog,
        ]);
    }
}
