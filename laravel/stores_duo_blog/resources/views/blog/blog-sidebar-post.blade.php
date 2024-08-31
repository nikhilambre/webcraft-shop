

<div class="sid-s19"><div class="s19-cover">
    <div class="s19-b1 text-center">
        <h3 class="b1-h3">About Author</h3>
    </div>
    <div class="s19-body">
        @foreach($blogauthor as $author)
        <div class="s19-img-box text-center">
            <img class="s19-img" src="../public/images/teammemb1.jpg" alt="category most viewed">
        </div>
        <div class="s19-text text-center">
            <h3 class="lead-text b2-h3">{{ $author->authorName }} <br><small>({{ $author->authorProfession }})</small></h3>
            <p class="p-text b2-p">{{ $author->authorDetails }}</p>
            <ul class="b2-ul list-inline list-unstyled">
                @foreach($authorsocial as $link)
                <li class="b2-li"><a href="{{ $link->socialLink }}" class="b2-soc" rel="social link"><i class="fa fa-{{ $link->socialName }}"></i></a></li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>
</div></div><!-- Sidebar 19 Ends here -->


<div class="sid-s17"><div class="s17-cover">
    <div class="s17-b1 text-center">
        <h3 class="b1-h3">Recent Posts</h3>
    </div>
    <div class="s17-b2">
        <ul class="b2-ul list-unstyled">
            @foreach($recentpost as $recent)
            <li class="b2-li row">
                <div class="b2-text">
                    <p class="b2-p">{{ date('d-M', strtotime($recent->created_at)) }}</p>
                    <a href="{{ url('/post/'.$recent->postTitleSlug) }}" class="b2-a">{{ $recent->postTitle }}</a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div></div><!-- Sidebar 17 Ends here -->


<div class="sid-s16"><div class="s16-cover">
    <div class="s16-b1 text-center">
        <h3 class="b1-h3">Archives</h3>
    </div>
    <div class="s16-b2">
        <ul class="b2-ul list-unstyled">
            <li class="b2-li"><a href="#">MAY 2016</a></li>
            <li class="b2-li"><a href="#">APRIL 2016</a></li>
            <li class="b2-li"><a href="#">MARCH 2016</a></li>
        </ul>
    </div>
</div></div><!-- Sidebar 16 Ends here -->