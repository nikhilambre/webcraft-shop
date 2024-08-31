@extends('layouts.blog')

@section('title')
@foreach ($seo as $s)
{{ $s->title }}
@endforeach
@if ($seo->isEmpty()) {{ $postTitle }} | Webcraft Shop Blog Post @endif
@endsection


@section('description')
@foreach ($seo as $s)
{{ $s->description }}
@endforeach
@if ($seo->isEmpty())Website description @endif
@endsection


@section('keywords')
@foreach ($seo as $s)
{{ $s->keyword }}
@endforeach
@if ($seo->isEmpty())website keywords @endif
@endsection


@section('page-image')
@foreach ($seo as $s)
{{ asset('public/images/'.$s->ogImgName) }}
@endforeach
@if ($seo->isEmpty()){{ asset('public/images/logo.jpg') }} @endif
@endsection


@section('og-facebook')
@foreach ($seo as $s)
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $s->title }}" />
<meta property="og:description" content="{{ $s->description }}" />
<meta property="og:image" content="{{ asset('public/images/'.$s->ogImgName) }}">
@endforeach
@endsection


@section('og-twitter')
@foreach ($seo as $s)
@if ($s->twitterCardType == 'summary_large_image')
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="{{ $s->twitterSite }}">
<meta name="twitter:creator" content="{{ $s->twitterCreator }}">
<meta name="twitter:title" content="{{ $s->title }}">
<meta name="twitter:description" content="{{ $s->description }}">
<meta name="twitter:image" content="{{ asset('public/images/'.$s->ogImgName) }}">

@elseif ($s->twitterCardType == 'summary')
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="{{ $s->twitterSite }}">
<meta name="twitter:title" content="{{ $s->title }}">
<meta name="twitter:description" content="{{ $s->description }}">
<meta name="twitter:image" content="{{ asset('public/images/'.$s->ogImgName) }}">

@elseif ($s->twitterCardType == 'app')
<meta name="twitter:card" content="app">
<meta name="twitter:site" content="{{ $s->twitterSite }}">
<meta name="twitter:description" content="{{ $s->description }}">
<meta name="twitter:app:country" content="{{ $s->twitterAppCountry }}">
<meta name="twitter:app:name:iphone" content="{{ $s->twitterAppNameIphone }}">
<meta name="twitter:app:id:iphone" content="{{ $s->twitterAppIdIphone }}">
<meta name="twitter:app:url:iphone" content="{{ $s->twitterAppUrlIphone }}">
<meta name="twitter:app:name:ipad" content="{{ $s->twitterAppNameIpad }}">
<meta name="twitter:app:id:ipad" content="{{ $s->twitterAppIdIpad }}">
<meta name="twitter:app:url:ipad" content="{{ $s->twitterAppUrlIpad }}">
<meta name="twitter:app:name:googleplay" content="{{ $s->twitterAppNameGoogleplay }}">
<meta name="twitter:app:id:googleplay" content="{{ $s->twitterAppIdGoogleplay }}">
<meta name="twitter:app:url:googleplay" content="{{ $s->twitterAppUrlGoogleplay }}">
@endif
@endforeach
@endsection


@section('html-content')
@include('blog.header-home')

<div class="he-22-mid hidden">
    <div class="container">
        <div class="he-22-head text-center">
            <h1><small>It's My Blog</small><br>Jasmine Gjelaj</h1>
        </div>
    </div>
</div>

@foreach ($blogpost as $post)
<div class="phe-s11" style="background-image: url('../public/storage/blog/{{ $post->postImgName}}')"><div class="s11-cover">
    <div class="container"><div class="row">
        <div class="s11-b1 text-center">
            <h2 class="b1-h2 head-text"><small>{{ $post->categoryName }}</small><br><a href="{{ url('/post/'.$post->id.'/'.$post->postTitle) }}">{{ $post->postTitle }}</a></h2>
            <p class="b1-p"><strong>Posted On:</strong> {{ date('d-M', strtotime($post->created_at)) }}</P>
            <ul class="b1-ul list-inline list-unstyled">
                <li class="b1-li"><a href="{{ $share['facebook'] }}" class="b2-a"><i class="fa fa-facebook"></i></a></li>
                <li class="b1-li"><a href="{{ $share['twitter'] }}" class="b2-a"><i class="fa fa-twitter"></i></a></li>
                <li class="b1-li"><a href="{{ $share['gplus'] }}" class="b2-a"><i class="fa fa-google-plus"></i></a></li>
                <li class="b1-li"><a href="{{ $share['linkedin'] }}" class="b2-a"><i class="fa fa-linkedin"></i></a></li>
                <li class="b1-li"><a href="{{ $share['pinterest'] }}" class="b2-a"><i class="fa fa-pinterest"></i></a></li>
            </ul>
        </div>
    </div></div>
</div></div><!-- Page Header 11 ends Here -->

<div class="container">

    <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12 blog-main">
        
        <div class="post-22">
            <div class="post-author">
                <strong>Posted By:</strong> <a href="{{ url('/author/'.$post->authorId.'/'.$post->authorName) }}">{{ $post->authorName }}</a>
                <p class="p-text"><strong>Image Credits:</strong>{{ $post->postImgCredits }}</p>
            </div>
            <hr>
            <div class="post-subtitle">
                <h4>{{ $post->postSubTitle }}</h4>
            </div>
            <div class="post-content">
                {!! $post->postContent !!}
            </div>
        </div>

        <div class="sec-s25"><div class=""><!-- Tags of Post Section -->
            <!-- <div class="s25-b1">
                <h3 class="head-text">Tags</h3>
            </div> -->
            <div class="s25-b2">
                <ul class="b2-ul list-inline list-unstyled">
                @foreach ($blogtag as $tag)
                    <li class="b2-li"><a href="{{ url('/tag/'.$tag->tagNameSlug) }}" class="b2-a">{{ $tag->tagName }}</a></li>
                @endforeach
                </ul>
            </div>
        </div></div><!-- S25 Ends Here --> 

        <div class="sec-s26"><div class=""><!-- Share this post Social link Section -->
            <div class="s26-b1">
                <h3 class="head-text">Share Now</h3>
            </div>
            <div class="s26-b2">
                <ul class="b2-ul list-inline list-unstyled">
                    <li class="b2-li"><a href="{{ $share['facebook'] }}" class="b2-a"><i class="fa fa-facebook"></i></a></li>
                    <li class="b2-li"><a href="{{ $share['twitter'] }}" class="b2-a"><i class="fa fa-twitter"></i></a></li>
                    <li class="b2-li"><a href="{{ $share['gplus'] }}" class="b2-a"><i class="fa fa-google-plus"></i></a></li>
                    <li class="b2-li"><a href="{{ $share['linkedin'] }}" class="b2-a"><i class="fa fa-linkedin"></i></a></li>
                    <li class="b2-li"><a href="{{ $share['pinterest'] }}" class="b2-a"><i class="fa fa-pinterest"></i></a></li>
                </ul>
            </div>
        </div></div><!-- S26 Ends Here --> 

        <div class="sec-s28"><div class="row"><!-- Next-Previous Posts Links -->
            <div class="s28-b1 col-xs-5 col-sm-5 col-md-5 col-lg-5 pull-left">
                @foreach ($previous as $p)
                <a href="{{ url('/post/'.$p->postTitleSlug) }}" class="b1-link">
                    <div class="b1-dir"><i class="fa fa-long-arrow-alt-left"></i> Previous Post</div>
                    <div class="b1-post">{{ str_limit($p->postTitle, $limit = 70, $end = '...') }}</div>
                </a>
                @endforeach
            </div>
            <div class="s28-b1 col-xs-5 col-sm-5 col-md-5 col-lg-5 pull-right">
                @foreach ($next as $n)
                <a href="{{ url('/post/'.$n->postTitleSlug) }}" class="b1-link text-right">
                    <div class="b1-dir">Next Posts <i class="fa fa-long-arrow-alt-right"></i></div>
                    <div class="b1-post">{{ str_limit($n->postTitle, $limit = 70, $end = '...') }}</div>
                </a>
                @endforeach
            </div>
        </div></div><!-- S28 Ends Here -->

        <div class="sec-s35 row"><!-- 3 Blocks with image for blog -->
            <h2 class="section-head row">Related Posts</h2><br>
            @if ($blogtag->isEmpty())
                No Related suggestions for this post.
            @endif
            @foreach ($relatedpost as $related)
            <div class="s35-bs col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center" style="padding-left: 0;">
                <div class="bs-img">
                    <img class="img" src="{{ url('public/storage/blog/'.$related->postImgName) }}" alt="blog image">
                </div>
                <h3 class="bs-h3">
                    <a href="{{ url('/post/'.$related->postTitleSlug) }}">{{ $related->postTitle }}</a>
                </h3>
                <span class="bs-date">{{ date('d-M', strtotime($related->created_at)) }}</span>
            </div>
            @endforeach
        </div><!-- End of s35 here -->

        <!-- <div id="disqus_thread"></div>

        <div class="disqus-comments">
            <script>

            /**
            *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
            *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

            var disqus_config = function () {
            this.page.url = '{{ Request::url() }}';  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = {{ $post->id }}; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };
            
            (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://storedblog.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
            })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

        </div> -->

        <div class="site-comment">

            <div class="comment-list sec-s55">
                <div class="s55-head">
                    <h3 class="head-text">Comments</h3>
                </div>
                @if ($blogcomment->isEmpty())
                    <p class="">No Comments added.</p>
                @endif
                @foreach ($blogcomment as $comment)
                <div class="row">
                    <div class="comment-img col-sm-1 col-md-2 col-lg-2 col-xs-2">
                        <img class="img-circle" src="../public/storage/blog/{{ $comment->customerImgName}}">
                    </div>

                    <div class="comment-content col-sm-11 col-md-10 col-lg-10 col-xs-10">
                        <div class="comment-name row">
                            <p class="name pull-left">{{ $comment->name }} {{ $comment->lastname }}</p>
                            <p class="date pull-right">{{ date('d-M', strtotime($comment->created_at)) }}</p>
                        </div>
                        <div class="comment-text row">
                            <p class="text">{{ $comment->commentContent }}</p>
                        </div>
                        <div class="comment-link row">
                            @if ($replycount[$comment->id])
                            <a href="javascript:void(0)" id="show-reply{{ $comment->id }}" data-comid="{{ $comment->id }}">({{ $replycount[$comment->id] }}) Replies</a>
                            @endif
                            <a href="javascript:void(0)" class="show-add-reply{{ $comment->id }}" id="show-add-reply{{ $comment->id }}">Reply</a>

                            <div class="replies" id="replies{{ $comment->id }}"></div><!-- Container to show replies list -->
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    $(document).ready(function() {

                        $("#show-add-reply{{ $comment->id }}").on('click', function() {
                            var overlay = $('#add-reply');

                            if(overlay.length < 1) {
                                $(this).append(`
                                    <div class="add-reply" id="add-reply">
                                        <div class="sec-s53">
                                            <div class="comment-box">
                                                <textarea type="textarea" rows="2" 
                                                    class="form-control input-lg" 
                                                    id="replyContent" 
                                                    data-commentid{{ $comment->id }}="{{ $comment->id }}"
                                                    maxlength="2000" placeholder="Reply"></textarea>
                                            </div>

                                            <div class="comment-btn">
                                                <input type="button" id="save-reply" class="save-comm btn btn-sm" value="Send Reply" />
                                            </div>
                                            <div class="comment-btn">
                                                <input type="button" id="remove-save-reply" class="save-comm btn btn-sm" value="Cancel" />
                                            </div>
                                        </div>
                                    </div>`);
                            }
                        });

                        $(document).on("click", "#remove-save-reply" , function() {
                            $("#add-reply").remove();
                        });
                    
                        $(document).on("click", "#save-reply", function() {
                            
                            var token = $('meta[name="csrf-token"]').attr('content');
                            var reply = $('textarea#replyContent').val();
                            var postId = "{{ $post->id }}";
                            var commentParentId = $('textarea#replyContent').attr("data-commentid{{ $comment->id }}");

                            if (reply && postId && commentParentId) {
                                $.ajax({
                                    type : "POST",
                                    url : "{{ url('/ajax/postreply') }}",
                                    data : { "_token" : token, "commentContent" : reply, "commentParentId" : commentParentId, "postId" : postId },
                                    success : function(d) {

                                        $('#notify-box').animate("fast").animate({ opacity : "show" }, "slow");
                                        $('#notify').text('Reply Sent to Admin for Approval.');
                                        setTimeout(function(){
                                            $('#notify-box').animate("fast").animate({ opacity : "hide" }, "slow");
                                        }, 6000);
                                    },
                                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                                        $('#notify-box').animate("fast").animate({ opacity : "show" }, "slow");
                                        $('#notify').text(errorThrown);
                                        setTimeout(function(){
                                            $('#notify-box').animate("fast").animate({ opacity : "hide" }, "slow");
                                        }, 6000);
                                    }
                                });
                            } else{
                                $("#notify-box").animate({ opacity: 1 }, 2000);
                                $("#notify").text('Add a Reply to save.');

                                setTimeout(function(){
                                    $('#notify-box').animate({ opacity : 0 }, 200);
                                }, 6000);
                            }


                        });                    
                    });
                </script>

                <script type="text/javascript">
                    $(document).ready(function() {

                        $("#show-reply{{ $comment->id }}").click(function() {
                            
                            var token = $('meta[name="csrf-token"]').attr('content');
                            var commentId = $(this).attr("data-comid");

                            $.ajax({
                                type: "POST",
                                url: "{{ url('/ajax/getreply') }}",
                                data: { "_token" : token, "commentParentId" : commentId },
                                success: function(d) {
                                    var response = d.blogcomment;

                                    $.each(response, function (index, value) {
                                        var d = new Date(value.created_at);
                                        locale = "en-us";
                                        month = d.toLocaleString(locale, { month: "short" });
                                        date = d.getDate();

                                        var everyReply = '<div class="comment-list sec-s55">\
                                            <div class="row">\
                                                <div class="comment-img col-sm-1 col-md-2 col-lg-2 col-xs-2">\
                                                    <img class="img-circle" src="../public/storage/blog/'+value.customerImgName+'">\
                                                </div>\
                                                <div class="reply-content col-sm-11 col-md-10 col-lg-10 col-xs-10">\
                                                    <div class="comment-name row">\
                                                        <p class="name pull-left">'+value.name +' '+ value.lastname+'</p>\
                                                        <p class="date pull-right">'+date+'-'+month+'</p>\
                                                    </div>\
                                                    <div class="comment-text row">\
                                                        <p class="text">'+value.commentContent+'</p>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                        </div>';
                                        $("#replies{{ $comment->id }}").append(everyReply);
                                    });
                                },
                                error: function(XMLHttpRequest, textStatus, errorThrown) {
                                    $('#notify-box').animate("fast").animate({ opacity : "show" }, "slow");
                                    $('#notify').text(errorThrown);
                                    setTimeout(function(){
                                        $('#notify-box').animate("fast").animate({ opacity : "hide" }, "slow");
                                    }, 6000);
                                }
                            });
                            $('#show-reply{{ $comment->id }}').off();
                        });

                    });
                </script>
                @endforeach

            </div>

            <div class="comment-add">

                <div class="sec-s53">
                    <div class="s53-head">
                        <h3 class="head-text">Leave a reply</h3>
                    </div>
                    <div class="comment-box">
                        <textarea type="textarea" rows="5" 
                            class="form-control input-lg" 
                            id="commentContent" 
                            maxlength="2000" placeholder="Add Comment"></textarea>
                    </div>

                    <div class="comment-btn">
                        <input type="button" id="save-comment" class="save-comm btn btn-lg" value="Add Comment" />
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12 blog-side">
        @include('blog.blog-sidebar-post')
    </div>

</div>


@php
    $postId = $post->id;
@endphp

@endforeach

<script type="text/javascript">
    $(function() {

        $('.post-content p:empty').remove();

        //  Remove Attributes
        $('.post-content img').removeAttr('width');
        $('.post-content img').removeAttr('height');

        //  Add Classes
        $('.post-content img').addClass('img-thumbnail');
        $('.post-content table').addClass('table table-hover');
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
    
        $("#save-comment").click(function() {
            
            var token = $('meta[name="csrf-token"]').attr('content');
            var comment = $('textarea#commentContent').val();
            var postId = "<?php echo $postId; ?>";

            if (comment) {
                $.ajax({
                    type: "POST",
                    url: "{{ url('/ajax/postcomment') }}",
                    data: { "_token" : token, "commentContent" : comment, "postId" : postId },
                    success: function(d) {

                        $('#notify-box').animate("fast").animate({ opacity : "show" }, "slow");
                        $('#notify').text('Comment Sent to Admin for Approval.');
                        setTimeout(function(){
                            $('#notify-box').animate("fast").animate({ opacity : "hide" }, "slow");
                        }, 6000);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        $('#notify-box').animate("fast").animate({ opacity : "show" }, "slow");
                        $('#notify').text(errorThrown);
                        setTimeout(function(){
                            $('#notify-box').animate("fast").animate({ opacity : "hide" }, "slow");
                        }, 6000);
                    }
                });
            } else{
                $("#notify-box").animate({ opacity: 1 }, 2000);

                $('#notify').text('Add a Reply to save.');

                setTimeout(function(){
                    $('#notify-box').animate({ opacity : 0 }, 200);
                }, 6000);
            }

        });
    
    });
</script>
@endsection