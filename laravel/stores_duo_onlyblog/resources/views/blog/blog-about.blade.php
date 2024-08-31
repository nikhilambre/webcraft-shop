@extends('layouts.blog')

@section('title')
@foreach ($seo as $s)
{{ $s->title }}
@endforeach
@if ($seo->isEmpty())About Me | WebCraft Shop @endif
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


@if(Auth::guard('pageupdator')->check())

@section('html-content')
@include('blog.header-home')
<div class="ds-edit">
<div class="phe-s11"  contenteditable="true" data-section="1010" style="background-image: url('public/storage/page/{{ $sc['1010'] }}')"><div class="s11-cover">
    <div class="container"><div class="row">
        <div class="s11-b1 text-center">
            <h2 class="b1-h2 head-text">About Me</h2>
        </div>
    </div></div>
</div></div><!-- Page Header 11 ends Here -->
<span class='art-img-btn btn btn-default' id='1010' title="Update This Image"><i class='fa fa-chevron-circle-right'></i></span>
</div>

<div class="container">
    <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12 blog-main">
        <div class="ds-edit">
            <h2 class="" contenteditable="true" data-section="1000">{!! $sc['1000'] !!}</h2><span class='art-btn btn btn-default' id='1000' title="Update This Section"><i class='fa fa-chevron-circle-right'></i></span></div>
        <div class="ds-edit">
            <p class="" contenteditable="true" data-section="1001">{!! $sc['1001'] !!}</p><span class='art-btn btn btn-default' id='1001' title="Update This Section"><i class='fa fa-chevron-circle-right'></i></span></div>
        <div class="ds-edit">
            <p class="" contenteditable="true" data-section="1002">{!! $sc['1002'] !!}</p><span class='art-btn btn btn-default' id='1002' title="Update This Section"><i class='fa fa-chevron-circle-right'></i></span></div>
        <div class="ds-edit">
            <p class="" contenteditable="true" data-section="1003">{!! $sc['1003'] !!}</p><span class='art-btn btn btn-default' id='1003' title="Update This Section"><i class='fa fa-chevron-circle-right'></i></span></div>
        <div class="ds-edit">
            <p class="" contenteditable="true" data-section="1004">{!! $sc['1004'] !!}</p><span class='art-btn btn btn-default' id='1004' title="Update This Section"><i class='fa fa-chevron-circle-right'></i></span></div>
        <div class="ds-edit">
            <h2 class="" contenteditable="true" data-section="1005">{!! $sc['1005'] !!}</h2><span class='art-btn btn btn-default' id='1005' title="Update This Section"><i class='fa fa-chevron-circle-right'></i></span></div>
        <div class="ds-edit">
            <ul class="" contenteditable="true" data-section="1006">{!! $sc['1006'] !!}</ul><span class='art-btn btn btn-default' id='1006' title="Update This Section"><i class='fa fa-chevron-circle-right'></i></span></div>
            
        <div class="ds-edit">
            <h2 class="" contenteditable="true" data-section="1007">How Things are going</h2><span class='art-btn btn btn-default' id='1007' title="Update This Section"><i class='fa fa-chevron-circle-right'></i></span></div>

        <div class="ds-edit">
            <div class="img-wrap">
                <img src="{{ url('public/storage/page/').'/'.$sc['1008'] }}" class="img-thumbnail" alt="Page image">
            </div>
            <span class='art-img-btn btn btn-default' id='1008' title="Update This Image"><i class='fa fa-chevron-circle-right'></i></span>
        </div>

        <div class="ds-edit">
            <div class="img-wrap">
                <img src="{{ url('public/storage/page/').'/'.$sc['1009'] }}" class="img-thumbnail" alt="Page image">
            </div>
            <span class='art-img-btn btn btn-default' id='1009' title="Update This Image"><i class='fa fa-chevron-circle-right'></i></span>
        </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12 blog-side">
        @include('blog.blog-sidebar-home')
    </div>

</div>


<!-- Sections for Page Updator Part -->
<nav class="navbar navbar-default navbar-fixed-bottom navbar-pg">
  <div class="container">
    <div class="navbar-left">
        <h3 class="text-center">Page Editor Enabled</h3>
    </div>       

    <div class="navbar-right">
        <a href="{{ route('pageupdator.logout') }}" class="btn btn-warning"
            onclick="event.preventDefault();
                        document.getElementById('pg-logout-form').submit();">
            Logout of Page Editor
        </a>

        <form id="pg-logout-form" action="{{ route('pageupdator.logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div> 
  </div>
</nav><!-- Page Editor Section Footer -->

<!-- Image upload modal -->
<div class="updator-modal modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content row">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="gridSystemModalLabel">Update Image</h4>
        </div>
        <div class="modal-body">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active p40 row" id="image">
                    <div class="col-md-10 col-md-offset-1">
                        <form class="" action="{{ url('sectionimage') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <label for="sectionImage" class="hidden-xs col-md-3">Upload Image: </label>
                                <div class="col-xs-12 col-md-9">
                                    <input type="file" class="form-control" name="sectionImage" id="sectionImage" accept="image/*">
                                </div>
                                <p class="pull-right">Image Size Must be less than 600KB</p>
                            </div>
                            <div class="form-group hidden">
                                <div class="col-xs-12 col-md-9">
                                    <input type="hidden" class="form-control" name="pageName" id="pageName" value="{{ $pageName }}">
                                </div>
                            </div>
                            <div class="form-group hidden">
                                <div class="col-xs-12 col-md-9">
                                    <input type="hidden" class="form-control" name="sectionId" id="sectionId">
                                </div>
                            </div>
                            <hr>
                            <a href="#list" class="btn btn-default pull-right" aria-controls="list" role="tab" data-toggle="tab">Show All Images</a>
                            <input type="submit" name="submit" class="btn btn-default pull-right" id="order-active" value="Upload Image">
                        </form>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade p40 row" id="list">
                    <div class="row">
                        <a href="#image" class="btn btn-default pull-right" aria-controls="image" role="tab" data-toggle="tab">Back to Image Upload</a>
                    </div><hr>
                    <div class="row">
                        @foreach($sectionImages as $img)
                        <div class="col-md-6">
                            <div class="img-box">
                                <img class="img-thumbnail" src="public/storage/page/{{ $img->sectionContent}}" alt="page images">
                            </div>
                            <div class="img-select">
                                <a href="javascript:void(0)" data-imgselect="{{ $img->sectionId}}" data-imgcontent="{{ $img->sectionContent}}" class="btn-imgselect btn btn-default pull-right">Select</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    $(document).ready(function(){

        $(".ds-edit").addClass("article");

        $(".art-btn").click(function(){
            var token = $('meta[name="csrf-token"]').attr('content');
            var section_id = $(this).attr("id");
            var content = $("*[data-section='"+ section_id +"']").html();
            var dbContent = $.trim(content);
            var pageName = "{{ $pageName }}";

            if (confirm("Sure you want to Edit this Content? \n")) {
                $.ajax({
                    type : "POST",
                    url : "{{ url('/ajax/updatesection') }}",
                    dataType: 'json',
                    data : { "_token" : token, "sectionId" : section_id, "sectionContent" : dbContent, "pageName" : pageName },
                    success : function() {
                        $('#notify-box').animate("fast").animate({ opacity : "show" }, "slow");
                        $('#notify').text('Page Content Updated successfully.');
                        setTimeout(function(){
                            $('#notify-box').animate("fast").animate({ opacity : "hide" }, "slow");
                        }, 6000);
                    }
                });
            }
            return false;
        });

        $(document).on("click", ".art-img-btn", function (){
            var imgId = $(this).attr('id');
            $('#imageModal').modal('toggle');
            $(".modal-body #sectionId").val(imgId);
            $(".modal-body .btn-imgselect").attr('data-sectionval', imgId)
        });

        $(".btn-imgselect").click(function (){
            var token = $('meta[name="csrf-token"]').attr('content');
            var section_id = $(this).attr("data-sectionval");
            var content = $(this).attr("data-imgcontent");
            var pageName = "{{ $pageName }}";

            $.ajax({
                type : "POST",
                url : "{{ url('/ajax/updateimage') }}",
                dataType: 'json',
                data : { "_token" : token, "sectionId" : section_id, "sectionContent" : content, "pageName" : pageName },
                success : function() {
                    $('#notify-box').animate("fast").animate({ opacity : "show" }, "slow");
                    $('#notify').text('Page Content Updated successfully.');
                    $('#imageModal').modal('toggle');
                    setTimeout(function(){
                        $('#notify-box').animate("fast").animate({ opacity : "hide" }, "slow");
                    }, 6000);
                }
            });
        });
    });
</script>
@endsection

@else

@section('html-content')
@include('blog.header-home')
<div class="container">

    <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12 blog-main">
        <h2 class="">About Me</h2>
        <p class="">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sagittis nisl vel quam elementum molestie. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut turpis eu arcu egestas tincidunt. Morbi in dui risus. Mauris vestibulum justo elit, ut vulputate nisi varius nec. Ut tincidunt vitae arcu ut interdum. Etiam odio enim, tempor quis cursus ac, ultrices sed tortor. Vivamus venenatis scelerisque turpis a dictum. Integer vel consectetur urna. Fusce lectus lorem, congue in posuere vitae, tempus vitae ipsum. Maecenas maximus congue diam, vitae consectetur tellus ornare id. Cras nec lacus sed tortor accumsan tempor ut quis erat.</p>
        <p class="">Mauris pellentesque quis sem interdum maximus. Etiam in accumsan ligula. Nullam mollis laoreet vulputate. Vivamus posuere ullamcorper purus, et efficitur turpis aliquam vitae. Nulla ac congue justo. Quisque posuere nibh felis. Nulla laoreet condimentum eros eget cursus. Vestibulum interdum mattis lobortis. Donec quam nibh, convallis ornare justo sed, molestie pretium est.</p>
        <p class="">Donec leo lectus, dignissim congue imperdiet quis, rhoncus eget sem. Ut volutpat luctus leo id accumsan. Suspendisse egestas porta massa, ut pellentesque nisi interdum id. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In est lorem, mattis vitae nulla vestibulum, dictum commodo erat. Nunc lacinia ex felis, eget faucibus ipsum dapibus vehicula. Donec sed consequat velit.</p>
        <p class="">Sed vehicula dui quis pulvinar tincidunt. Curabitur rutrum augue enim, ut volutpat neque hendrerit venenatis. Sed ut pharetra nulla. Mauris vitae purus non lorem tristique aliquam. Nulla tincidunt lacus nulla, id aliquet justo rhoncus non. Maecenas facilisis, nulla sed scelerisque egestas, elit nulla congue quam, porta malesuada velit lorem ac elit. Sed sagittis erat lorem, ac venenatis tellus tempor eu. Aenean pharetra euismod magna non elementum. Sed varius risus in tincidunt fringilla. Duis pulvinar lacus augue. Mauris pretium tellus vitae nibh eleifend efficitur.</p>

        <h2 class="">Who are my motivations</h2>
        <ul class="">
            <li class="">Something that is one</li>
            <li class="">Something that is two</li>
            <li class="">Something that is three</li>
            <li class="">Something that is four</li>
            <li class="">Something that is five</li>
        </ul>

        <h2 class="">How Things are going</h2>
        <div class="img-wrap">
            <img src="public/storage/page/s1.jpg" class="img-thumbnail" alt="Page image">
        </div>
    </div>

    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12 blog-side">
        @include('blog.blog-sidebar-home')
    </div>

</div>
@endsection

@endif