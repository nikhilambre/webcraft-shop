<script type="text/javascript">

    // $(window).load(function() { // makes sure the whole site is loaded
    //     $('#status').fadeOut(); // will first fade out
    //     $('#preloader').delay(350).fadeOut('slow');
    //     $('body').delay(350).css({'overflow':'visible'});
    // });

    $(document).ready(function() {

        $('.carousel').carousel({
            interval: 4000
        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
    
    // Fixed Header //  header-1/////////////////////////////////////
    if (jQuery(window).scrollTop() > 100) {
        jQuery('.c3-header').addClass('header-white');
    }
    jQuery(window).scroll(function() {
        if (jQuery(window).scrollTop() > 100) {
        jQuery('.c3-header').addClass('header-white');
        } else {
        jQuery('.c3-header').removeClass('header-white');
        }
    });     // Fixed Header //  Header-1 Ends here///////////////////

});
</script>

{{-- <script type="text/javascript">
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
</script> --}}