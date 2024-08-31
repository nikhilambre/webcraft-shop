

$(window).load(function() { // makes sure the whole site is loaded
    $('#status').fadeOut(); // will first fade out
    $('#preloader').delay(350).fadeOut('slow');
    $('body').delay(350).css({'overflow':'visible'});
});
            
