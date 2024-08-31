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



