<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Seo;

class BlogController extends Controller
{
    public function getHomePage()
    {
        $pageName = 'home';
        $seo = Seo::GetForPagename($pageName)->get();

        return view('blog.blog-home')->with([
            'seo' => $seo,
        ]);
    }

    public function getPostPage($postId, $postTitle = null)
    {
        $pageName = 'post';
        $seo = Seo::GetForPagename($pageName)->get();

        return view('blog.blog-single')->with([
            'seo' => $seo,
        ]);
    }

    public function getCategoryPage()
    {

    }

    public function getTagPage()
    {

    }

    public function getSinglePage()
    {

    }
}
