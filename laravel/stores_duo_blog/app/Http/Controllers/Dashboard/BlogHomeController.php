<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use DateTime;
use App\RecentUpdate;

class BlogHomeController extends Controller
{
    public function getSinglePost($id)
    {
        $singleblogcomment = DB::select(DB::raw(
                            "SELECT COUNT(blogcomments.id) as postcom, 
                            DATE_FORMAT(blogcomments.created_at, '%d-%b') as commentdates,
                            DATE_FORMAT(blogcomments.created_at, '%d') as cdate
                            FROM blogposts, blogcomments 
                            WHERE blogposts.id = $id
                            AND blogposts.id = blogcomments.postId
                            AND blogcomments.created_at > DATE_SUB(NOW(), INTERVAL 11 DAY)
                            GROUP BY blogcomments.created_at"));

        $t = 0;
        foreach ($singleblogcomment as $temp) {
            $dateNum[$t] = $temp->cdate;
            $commentDate[$t] = $temp->commentdates;
            $commentVal[$t] = $temp->postcom;
            $t++;
        }

        if ($singleblogcomment == null) {
            $dateNum = [];
            $commentDate = [];
            $commentVal = [];
        }

        $sinCommentValues = $this->linearDates($dateNum, $commentDate, $commentVal);

        $singlebloglike = DB::select(DB::raw(
                            "SELECT COUNT(blogpostlikes.id) as postlik, 
                            DATE_FORMAT(blogpostlikes.created_at, '%d-%b') as likedates,
                            DATE_FORMAT(blogpostlikes.created_at, '%d') as ldate
                            FROM blogposts, blogpostlikes 
                            WHERE blogposts.id = $id
                            AND blogposts.id = blogpostlikes.postId
                            AND blogpostlikes.created_at > DATE_SUB(NOW(), INTERVAL 11 DAY)
                            GROUP BY blogpostlikes.created_at"));       
                            
        $t = 0;
        foreach ($singlebloglike as $temp) {
            $dateNum[$t] = $temp->ldate;
            $likeDate[$t] = $temp->likedates;
            $likeVal[$t] = $temp->postlik;
            $t++;
        }

        if ($singlebloglike == null) {
            $dateNum = [];
            $likeDate = [];
            $likeVal = [];
        }

        $sinLikeValues = $this->linearDates($dateNum, $likeDate, $likeVal);

        $response = [
            'singleblogcomment' => $sinCommentValues[1],
            'singlebloglike' => $sinLikeValues[1],
            'singlepostdate' => $sinCommentValues[0],
        ];
        return response()->json($response, 200);
    }

    public function getSinglePostId()
    {
        $singleblogcomment = DB::select(DB::raw(
                            "SELECT COUNT(blogcomments.id) as postcom,
                            DATE_FORMAT(blogcomments.created_at, '%d-%b') as commentdates,
                            DATE_FORMAT(blogcomments.created_at, '%d') as cdate
                            FROM blogposts, blogcomments 
                            WHERE blogposts.id = (SELECT MIN(id) FROM blogposts)
                            AND blogposts.id = blogcomments.postId
                            AND blogcomments.created_at > DATE_SUB(NOW(), INTERVAL 11 DAY)
                            GROUP BY blogcomments.created_at"));

        $t = 0;
        foreach ($singleblogcomment as $temp) {
            $dateNum[$t] = $temp->cdate;
            $commentDate[$t] = $temp->commentdates;
            $commentVal[$t] = $temp->postcom;
            $t++;
        }

        if ($singleblogcomment == null) {
            $dateNum = [];
            $commentDate = [];
            $commentVal = [];
        }

        $sinCommentValues = $this->linearDates($dateNum, $commentDate, $commentVal);

        $singlebloglike = DB::select(DB::raw(
                            "SELECT COUNT(blogpostlikes.id) as postlik, 
                            DATE_FORMAT(blogpostlikes.created_at, '%d-%b') as likedates,
                            DATE_FORMAT(blogpostlikes.created_at, '%d') as ldate
                            FROM blogposts, blogpostlikes 
                            WHERE blogposts.id = (SELECT MAX(id) FROM blogposts)
                            AND blogposts.id = blogpostlikes.postId
                            AND blogpostlikes.created_at > DATE_SUB(NOW(), INTERVAL 11 DAY)
                            GROUP BY blogpostlikes.created_at"));               
                            
        $t = 0;
        foreach ($singlebloglike as $temp) {
            $dateNum[$t] = $temp->ldate;
            $likeDate[$t] = $temp->likedates;
            $likeVal[$t] = $temp->postlik;
            $t++;
        }

        if ($singlebloglike == null) {
            $dateNum = [];
            $likeDate = [];
            $likeVal = [];
        }

        $sinLikeValues = $this->linearDates($dateNum, $likeDate, $likeVal);

        $response = [
            'singleblogcomment' => $sinCommentValues[1],
            'singlebloglike' => $sinLikeValues[1],
            'singlepostdate' => $sinCommentValues[0],
        ];
        return response()->json($response, 200);
    }

    public function getPost()
    {
        $blogcomment = DB::select(DB::raw(
                        "SELECT COUNT(blogcomments.id) as postcom, 
                        DATE_FORMAT(blogcomments.created_at, '%d-%b') as commentdates,
                        DATE_FORMAT(blogcomments.created_at, '%d') as cdate
                        FROM blogposts, blogcomments 
                        WHERE blogposts.id = blogcomments.postId
                        AND blogcomments.created_at > DATE_SUB(NOW(), INTERVAL 11 DAY)
                        GROUP BY commentdates, cdate"));

        $t = 0;
        foreach ($blogcomment as $temp) {
            $dateNum[$t] = $temp->cdate;
            $commentDate[$t] = $temp->commentdates;
            $commentVal[$t] = $temp->postcom;
            $commentMapping[$temp->cdate] = $temp->postcom;
            $t++;
        }

        if ($blogcomment == null) {
            $dateNum = [];
            $commentDate = [];
            $commentVal = [];
            $commentMapping = [];
        }

        $commentValues = $this->linearDates($dateNum, $commentDate, $commentVal, $commentMapping);
        
        $bloglike = DB::select(DB::raw(
                        "SELECT COUNT(blogpostlikes.id) as postlik, 
                        DATE_FORMAT(blogpostlikes.created_at, '%d-%b') as likedates,
                        DATE_FORMAT(blogpostlikes.created_at, '%d') as ldate
                        FROM blogposts, blogpostlikes 
                        WHERE blogposts.id = blogpostlikes.postId
                        AND blogpostlikes.created_at > DATE_SUB(NOW(), INTERVAL 11 DAY)
                        GROUP BY likedates, ldate"));

        $t = 0;
        foreach ($bloglike as $temp) {
            $dateNum[$t] = $temp->ldate;
            $likeDate[$t] = $temp->likedates;
            $likeVal[$t] = $temp->postlik;
            $likeMapping[$temp->ldate] = $temp->postlik;
            $t++;
        }

        if ($bloglike == null) {
            $dateNum = [];
            $likeDate = [];
            $likeVal = [];
            $likeMapping = [];
        }

        $likeValues = $this->linearDates($dateNum, $likeDate, $likeVal, $likeMapping);

        $response = [
            'postdate' => $commentValues[0],
            'commentVal' => $commentValues[1],
            'likeVal' => $likeValues[1],
        ];
        return response()->json($response, 200);
    }

    public function recentUpdate()
    {
        $recentUpdate = DB::table('recentupdates')->orderBy('created_at', 'desc')->limit(10)->get();

        foreach ($recentUpdate as $temp) {

            if($temp->type == 'post'){
                $postType = RecentUpdate::select("authorName")
                                ->leftJoin('blogauthors', 'blogauthors.id', '=', $temp->text13)->first();

                $text.$temp->id[0] = $postType->authorName;
                $text.$temp->id[2] = $temp->text13;
                $text.$temp->id[3] = $temp->text21;
                $text.$temp->id[4] = $temp->text22;
                $text.$temp->id[5] = $temp->text23;
            }

            if($temp->type == 'author'){
                $text.$temp->id[0] = $temp->text11;
                $text.$temp->id[2] = $temp->text13;
            }

            if($temp->type == 'like'){
                $postType = RecentUpdate::select("postTitle, name")
                                ->leftJoin('customers', 'customers.id', '=', $temp->text33)
                                ->leftJoin('blogposts', 'blogposts.id', '=', $temp->text23)->first();

                $text.$temp->id[6] = $postType->name;
                $text.$temp->id[8] = $temp->text33;
                $text.$temp->id[3] = $temp->text21;
                $text.$temp->id[4] = $postType->postTitle;
                $text.$temp->id[5] = $temp->text23;
            }

            if($temp->type == 'subs'){
                $postType = RecentUpdate::select("name")
                                ->leftJoin('customers', 'customers.id', '=', $temp->text33)->first();

                $text.$temp->id[6] = $postType->name;
                $text.$temp->id[8] = $temp->text33;
            }

            if($temp->type == 'comment'){
                $postType = RecentUpdate::select("postTitle, name")
                                ->leftJoin('customers', 'customers.id', '=', $temp->text33)
                                ->leftJoin('blogposts', 'blogposts.id', '=', $temp->text23)->first();

                $text.$temp->id[6] = $postType->name;
                $text.$temp->id[8] = $temp->text33;
                $text.$temp->id[3] = $temp->text21;
                $text.$temp->id[4] = $postType->postTitle;
                $text.$temp->id[5] = $temp->text23;
            }

            if($temp->type == 'message'){
                $text.$temp->id[0] = $temp->text11;
                $text.$temp->id[2] = $temp->text13;
            }
        }

        return $text1;

        $response = [
            'recentUpdate' => $recentUpdate,
            'text1' => $text1,
            'text2' => $text2,
            'text3' => $text3,
            'text4' => $text4,
            'text5' => $text5,
            'text6' => $text6,
            'text7' => $text7,
            'text8' => $text8,
            'text9' => $text9,
        ];
        return response()->json($response, 200);
    }

    public function getWeekSubs()
    {
        $weeksubs = DB::select(DB::raw("SELECT COUNT(id) as weeksubs FROM blogsubscriptions 
                                WHERE created_at > DATE_SUB(NOW(), INTERVAL 1 WEEK)"));

        $lastweeksubs = DB::select(DB::raw("SELECT COUNT(id) as lastweeksubs
                                FROM blogsubscriptions 
                                WHERE created_at > DATE_SUB(NOW(), INTERVAL 2 WEEK)
                                AND created_at < DATE_SUB(NOW(), INTERVAL 1 WEEK)"));

        $totalsubs = DB::select(DB::raw("SELECT COUNT(id) as totalsubs FROM blogsubscriptions"));

        $weeksignups = DB::select(DB::raw("SELECT COUNT(id) as weeksignups FROM customers 
                                WHERE created_at > DATE_SUB(NOW(), INTERVAL 1 WEEK)"));

        $lastweeksignups = DB::select(DB::raw("SELECT COUNT(id) as lastweeksignups
                                FROM customers 
                                WHERE created_at > DATE_SUB(NOW(), INTERVAL 2 WEEK)
                                AND created_at < DATE_SUB(NOW(), INTERVAL 1 WEEK)"));

        $totalsignups = DB::select(DB::raw("SELECT COUNT(id) as totalsignups FROM customers"));
                              
        $response = [
            'weeksubs' => $weeksubs,
            'lastweeksubs' => $lastweeksubs,
            'totalsubs' => $totalsubs,
            'weeksignups' => $weeksignups,
            'lastweeksignups' => $lastweeksignups,
            'totalsignups' => $totalsignups
        ];
        return response()->json($response, 200);
    }

    public function weekstat()
    {
        $weekcomment = DB::select(DB::raw("SELECT COUNT(id) as weekcomment
                        FROM blogcomments 
                        WHERE created_at > DATE_SUB(NOW(), INTERVAL 1 WEEK)"));

        $lastweekcomment = DB::select(DB::raw("SELECT COUNT(id) as lastweekcomment
                        FROM blogcomments 
                        WHERE created_at > DATE_SUB(NOW(), INTERVAL 2 WEEK)
                        AND created_at < DATE_SUB(NOW(), INTERVAL 1 WEEK)"));

        $weeklike = DB::select(DB::raw("SELECT COUNT(id) as weeklike
                        FROM blogpostlikes 
                        WHERE created_at > DATE_SUB(NOW(), INTERVAL 1 WEEK)"));

        $lastweeklike = DB::select(DB::raw("SELECT COUNT(id) as lastweeklike
                        FROM blogpostlikes 
                        WHERE created_at > DATE_SUB(NOW(), INTERVAL 2 WEEK)
                        AND created_at < DATE_SUB(NOW(), INTERVAL 1 WEEK)"));

        $totallike = DB::select(DB::raw("SELECT COUNT(id) as totallike FROM blogpostlikes"));
		$totalcomment = DB::select(DB::raw("SELECT COUNT(id) as totalcomment FROM blogcomments"));
        $totalview = DB::select(DB::raw("SELECT SUM(view) as totalview FROM blogposts"));

        $response = [
            'weekcomment' => $weekcomment,
            'lastweekcomment' => $lastweekcomment,
            'totalcomment' => $totalcomment,
            'weeklike' => $weeklike,
            'totallike' => $totallike,
            'lastweeklike' => $lastweeklike,
            'totalview' => $totalview
        ];
        return response()->json($response, 200);
    }

    public function getCatStats()
    {
        $catview = DB::select(DB::raw("SELECT SUM(blogposts.view) as categoryview, categoryName
                                FROM blogposts
                                LEFT JOIN blogcategors ON blogposts.categoryId = blogcategors.id 
                                GROUP BY categoryId"));

        $t = 0;
        foreach ($catview as $temp) {
            $catViewName[$t] = $temp->categoryName;
            $catViewVal[$t] = $temp->categoryview;
            $t++;
        }

        if ($catview == null) {
            $catViewName = [];
            $catViewVal = [];
        }

        $catcomment = DB::select(DB::raw("SELECT COUNT(blogcomments.id) as categorycomment, categoryName
                                FROM blogcategors, blogcomments, blogposts
                                WHERE blogposts.categoryId = blogcategors.id
                                GROUP BY categoryId"));

        $t = 0;
        foreach ($catcomment as $temp) {
            $catCommentName[$t] = $temp->categoryName;
            $catCommentVal[$t] = $temp->categorycomment;
            $t++;
        }

        if ($catcomment == null) {
            $catCommentName = [];
            $catCommentVal = [];
        }

        $response = [
            'catCommentName' => $catCommentName,
            'catViewName' => $catViewName,
            'catCommentVal' => $catCommentVal,
            'catViewVal' => $catViewVal,
        ];
        return response()->json($response, 200);
    }

    protected function linearDates($dateNum, $dates , $val, $mapped)
    {
        $insertedVal = array('0');

        for ($i=0; $i<11; $i++) {

            $changeDay = 10 - $i;

            $dateBeforxDays = date("d", strtotime('-'.$changeDay.'days'));
            $monthBeforxDays = date("M", strtotime('-'.$changeDay.'days'));

            $linearDate = $dateBeforxDays.'-'.$monthBeforxDays;

            if ($mapped == null) {
                $returnDates[$i] = $linearDate;
                $returnVal[$i] = 0;
            } else {
                foreach ($dateNum as $temp) {
                    if ($dateBeforxDays == $temp) {
                        $returnDates[$i] = $linearDate;
                        $returnVal[$i] = $mapped[$temp];
                        break;
                    } else {
                        $returnDates[$i] = $linearDate;
                        $returnVal[$i] = 0;
                    }
                }
            }
        }
        return ([$returnDates, $returnVal]);
    }
}
