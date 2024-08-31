<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Seo;
use App\Social;
use App\Blogpost;
use App\Blogcategor;
use App\Blogauthor;
use App\Share;
use App\Blogtagmap;
use App\Blogcomment;
use App\Message;
use DB;
use App\Editsection;

class BlogController extends Controller
{
    public function getHomePage()
    {
        $pageName = 'HOME';
        $seo = Seo::GetForPagename($pageName)->get();

        $category = Blogcategor::select('id','categoryName','categoryNameSlug','created_at')
                            ->where('categoryStatus', 'ACTIVE')
                            ->orderBy('categoryRank')
                            ->get();

        $author = Blogauthor::select('id','authorName','authorDetails','created_at')
                            ->limit(1)
                            ->get();

        //  fetch 4 populer Blogs of all time
        $populerBlog = Blogpost::select('blogposts.id','authorId','authorName','categoryId','categoryName','postTitle','postTitleSlug','postImgName','readMinutes','postSubTitle','blogposts.created_at')
                            ->leftJoin('blogauthors', 'blogposts.authorId', '=', 'blogauthors.id')
                            ->leftJoin('blogcategors', 'blogposts.categoryId', '=', 'blogcategors.id')
                            ->where('postStatus', 'PUBLISH')
                            ->orderBy('view', 'DESC')
                            ->limit(4)
                            ->get();

        $categoryBlog = [];
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


        return view('blog.blog-home')->with([
            'seo' => $seo,
            'category' => $category,
            'author' => $author,
            'populerBlog' => $populerBlog,
            'categoryBlog' => $categoryBlog,
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

        //  Author details of post
        $blogauthor = Blogauthor::select('id','authorName','authorNameSlug','authorDetails','authorProfession','authorEducation','authorImgName','created_at')
                                ->where('id', $authorId)
                                ->get();

        $authorsocial = Social::select('id','socialName','socialLink')
                                ->where('pageAuthor', $authorId)
                                ->get();

        //  Share links for Post
        $url = \Request::url();
        $root = \Request::root();
        $share = \Share::load($url, $postTitle, $root.'/public/storage/blog/'.$postImgName)->services('facebook','gplus','twitter','linkedin','pinterest');

        //  Tags List for Post
        $blogtag = Blogtagmap::select('tagName','tagId','tagNameSlug')
                                ->leftJoin('blogtags', 'blogtags.id', 'blogtagmaps.tagId')
                                ->where('blogtagmaps.postId', $id)
                                ->get();

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

        return view('blog.blog-single')->with([
            'seo' => $seo,
            'blogpost' => $blogpost,
            'category' => $category,
            'previous' => $previous,
            'next' => $next,
            'share' => $share,
            'blogauthor' => $blogauthor,
            'authorsocial' => $authorsocial,
            'blogtag' => $blogtag,
            'blogcomment' => $blogcomment,
            'replycount' => $replycount,
            'relatedpost' => $relatedpost,
            'recentpost' => $recentpost,
        ]);
    }

    public function getAuthorPage($authorNameSlug)
    {
        $pageName = 'AUTHOR';
        $seo = Seo::GetForPagename($pageName)->get();

        $category = Blogcategor::select('id','categoryName','categoryNameSlug','created_at')
                            ->where('categoryStatus', 'ACTIVE')
                            ->orderBy('categoryRank')
                            ->get();

        $blogauthor = Blogauthor::select('id','authorName','authorNameSlug','authorDetails','authorProfession','authorEducation','authorImgName','created_at')
                            ->where('authorNameSlug', $authorNameSlug)
                            ->get();

        foreach ($blogauthor as $temp) {
            $id = $temp->id;
        }

        $authorsocial = Social::select('id','socialName','socialLink')
                            ->where('pageAuthor', $id)
                            ->get();                            

        return view('blog.blog-author')->with([
            'seo' => $seo,
            'category' => $category,
            'blogauthor' => $blogauthor,
            'authorsocial' => $authorsocial,
        ]);
    }

    public function getAboutPage()
    {
        $pageName = 'ABOUT';
        $seo = Seo::GetForPagename($pageName)->get();

        $sectionContent = Editsection::GetSectionContent($pageName)->get();
        $sectionImages = Editsection::GetSectionImages($pageName)->get();

        $sectionContentArr = [];
        foreach($sectionContent as $temp) {
            $sectionContentArr[$temp->sectionId] = $temp->sectionContent;
        }

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

        return view('blog.blog-about')->with([
            'pageName' => $pageName,
            'seo' => $seo,
            'category' => $category,
            'recentBlog' => $recentBlog,
            'sc' => $sectionContentArr,
            'sectionImages' => $sectionImages,
        ]);
    }

    public function getInspirationPage()
    {
        $pageName = 'INSPIRATION';
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

        return view('blog.blog-inspiration')->with([
            'seo' => $seo,
            'category' => $category,
            'recentBlog' => $recentBlog,
        ]);
    }

    public function getContactPage()
    {
        $pageName = 'CONTACT';
        $seo = Seo::GetForPagename($pageName)->get();

        $category = Blogcategor::select('id','categoryName','categoryNameSlug','created_at')
                                ->where('categoryStatus', 'ACTIVE')
                                ->orderBy('categoryRank')
                                ->get();

        return view('blog.blog-contact')->with([
            'seo' => $seo,
            'category' => $category,
        ]);
    }

    public function postContactPage(Request $request)
    {
        $this->validate($request, [
            'g-recaptcha-response' => 'required|captcha',
            'messageName' => 'required',
            'messageEmail' => 'required',
            'messageContact' => 'required',
            'messageText' => 'required',
        ]);

        $captcha = $request->input('g-recaptcha-response');
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $privatekey = '';

        if ($captcha) {
            $response = file_get_contents("$url?secret=$privatekey&response=$captcha");
            $result = json_decode($response);

            if (isset($result->success) AND $result->success==true) {
                $message = new Message();

                $message->messageName = $request->input('messageName');
                $message->messageEmail = $request->input('messageEmail');
                $message->messageContact = $request->input('messageContact');
                $message->messageFlag = 'Unread';
                $message->messageText = $request->input('messageText');
        
                $message->save();
                return response()->json(['message' => 'Message Saved Successfully.'], 201);

            } else {
                return $result->error_code;
            }
        } else {
            return redirect('/');
        }

    }
}
