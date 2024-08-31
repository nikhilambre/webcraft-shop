
<div class="sid-s11"><div class="s11-cover">
    <div class="s11-b1 text-center">
        <h3 class="b1-h3">Recent Posts</h3>
    </div>
    <div class="s11-b2">
        <ul class="b2-ul list-unstyled">
            @foreach($recentBlog as $recent)
            <li class="b2-li">
                <div class="b2-img">
                    <img class="img img-thumbnail" src="{{ url('public/storage/blog/'.$recent->postImgName) }}" alt="blog image">
                </div>
                <div class="b2-text text-center">
                    <p class="b2-p">{{ $recent->categoryName }}</p>
                    <a href="{{ url('/post/'.$recent->postTitleSlug) }}" class="b2-a">{{ $recent->postTitle }}</a>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div></div><!-- Sidebar 11 Ends here -->


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