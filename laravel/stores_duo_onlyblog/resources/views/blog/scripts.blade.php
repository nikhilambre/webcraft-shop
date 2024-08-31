<script type="text/javascript">

    $(document).ready(function() {

        $('.carousel').carousel({
            interval: 2000
        });

        $('#show-search').click(function(){
            $('#he-22-search').addClass('he-22-search-show');
        });

        $('#search-close').click(function(){
            $('#he-22-search').removeClass('he-22-search-show');
        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var $myCarousel = $('#carousel-example-generic');

        // Initialize carousel
        $myCarousel.carousel();
        
        function doAnimations(elems) {
        var animEndEv = 'webkitAnimationEnd animationend';

            elems.each(function () {
                var $this = $(this),
                $animationType = $this.data('animation');

                // Add animate.css classes to
                // the elements to be animated
                // Remove animate.css classes
                // once the animation event has ended
                $this.addClass($animationType).one(animEndEv, function () {
                $this.removeClass($animationType);
                });
            });
        }

        // Select the elements to be animated
        // in the first slide on page load
        var $firstAnimatingElems = $myCarousel.find('.carousel-item:first')
        .find('[data-animation ^= "animated"]');

        // Apply the animation using the doAnimations()function
        doAnimations($firstAnimatingElems);

        // Attach the doAnimations() function to the
        // carousel's slide.bs.carousel event
        $myCarousel.on('slide.bs.carousel', function (e) {
            // Select the elements to be animated inside the active slide
            var $animatingElems = $(e.relatedTarget)
            .find("[data-animation ^= 'animated']");
            doAnimations($animatingElems);
        });

    });
</script>

<!-- <script type="text/javascript">
    $('ul.pagination').hide();
    $(function() {
        $('.infinite-scroll').jscroll({
            autoTrigger: true,
            loadingHtml: '<img class="center-block" src="/images/loading.gif" alt="Loading..." />',
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.infinite-scroll',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
</script> -->



