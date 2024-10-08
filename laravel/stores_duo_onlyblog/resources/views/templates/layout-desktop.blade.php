<!DOCTYPE html>

<html lang="en">
<head>
@include('templates.head')

@yield('customStyle')
@yield('vendoreStyle')
@yield('fonts')
</head>

@foreach ($template as $t)

@php
    $typeName = $t->typeName;
    $typeDescription = $t->typeDescription;
@endphp

<body class="">
    <div id="preloader">
        <div id="status"></div>
    </div>

    <nav class="navbar-navb navbar navbar-default navbar-fixed-bottom"><div class="container-fluid">

        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <span class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="mobile-nav">Pages</span>
            </span>
            <div class="open-side">
                <a href="javascript:void(0)" id="trigger" class="open-bars"><i class="fa fa-bars"></i></a>
            </div>
            <h3 class="navbar-brand"><a href="javascript:void(0)" data-toggle="modal" data-target="#description-modal">{{ $typeName }}</a></h3>
        </div><!--

        --><div class="navb-devices">
            <a href="/template/desktop/{{ $type }}/{{ $typeId }}/{{ $subType }}" class="navb-icon text-center" title="Show in Desktop View"><i class="fa fa-desktop"></i></a><!--
            --><a href="/template/mobile/{{ $type }}/{{ $typeId }}/{{ $subType }}" class="navb-icon text-center" title="Show in Mobile View"><i class="fa fa-mobile"></i></a><!--
            --><a href="/template/tablet/{{ $type }}/{{ $typeId }}/{{ $subType }}" class="navb-icon text-center" title="Show in Tablet View"><i class="fa fa-tablet"></i></a>
        </div><!--

        --><div class="navb-adder text-center">
            @if (Auth::guard('customer')->check())

                @foreach((array)$selections as $s)
                    @if($s->type == $t->type && $s->typeId == $t->typeId && $s->subType == $t->subType)
                        @php
                        $selected = 'selected';
                        break;
                        @endphp
                    @else
                        $selected = '';
                    @endif
                @endforeach

                @if($selected == 'selected')
                    <a href="javascript:void(0)" class="add-element add-selected">Selected</a>
                @else
                    <a href="javascript:void(0)" class="add-element" id="add-element">Add To Favorites</a>
                @endif
                @php
                    $customerId = Auth::guard('customer')->id();
                @endphp
            @else
                <a href="javascript:void(0)" class="add-element" data-toggle="modal" data-target="#signup-modal">Add To Favorites</a>
                @php
                    $customerId = 0;
                @endphp
            @endif
        </div><!--

        --><div class="navb-pages hidden">
            <ul class="list-unstyled">
                <li class=""><a href="">Landing Page</a></li>
                <li class=""><a href="">Depends</a></li>
                <li class=""><a href="">Depends</a></li>
            </ul>
        </div><!--

        --><div class="navb-selected text-center">
            @if (Auth::guard('customer')->check())
                <a href="javascript:void(0)" id="show-component" class="selected-text">{{ $addedFavorite }} Components Selected &nbsp;&nbsp;<i class="fa fa-caret-up"></i></a>
            @else
                <a href="javascript:void(0)" class="selected-text" data-toggle="modal" data-target="#signup-modal">Login to Select</a>
            @endif
        <div>

        @if (Auth::guard('customer')->check())
            @include('templates.select')
        @endif
        
    </div></nav>


    <div class="mp-pusher" id="mp-pusher">

        @include('templates.navbar')
        <div class="scroller"><div class="scroller-inner">

        <div class="notify-box" id="notify-box">
            <div class="notify-icon"><i class="fa fa-info-circle" aria-hidden="true"></i></div>
            <div class="notify-msg">
                <h4 class="">Message.!</h4>
                <p id="notify">something special done</p>
            </div>
        </div>

        @yield('htmlContent')

        <div style="margin-top: 600px;"></div>

        <!--    Variable area Ends here   -->
        @include('templates.footer')
        

        </div></div>
    </div>
    @endforeach

    @include('templates.foot')
    @include('shared.login-modal')
    @include('shared.description-modal')

    <!-- plugin's java Script 
    +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    @yield('vendorScripts')

    <script type="text/javascript">

        $(window).load(function() { // makes sure the whole site is loaded
            $('#status').fadeOut(); // will first fade out
            $('#preloader').delay(350).fadeOut('slow');
            $('body').delay(350).css({'overflow':'visible'});
        });

        new mlPushMenu( document.getElementById('mp-menu'), document.getElementById('trigger') );

        //  ajax save on click
        $(document).ready(function() {

            $('#show-component').click(function(){
                $('.select').toggleClass("show-box animated fadeIn");
            });

            
            $('#add-element').on('click', function () {

                var token = $('meta[name="csrf-token"]').attr('content');
                var Id = <?php echo $customerId; ?>;
                var Type = '{{ $type }}';
                var TypeId = {{ $typeId }};
                var SubType = {{ $subType }};
                var TypeName = '{{ $t->typeName }}';
                
                $.ajax({
                    type: "POST",
                    url: "{{ url('/ajax/savefavorite') }}",
                    data: { "_token": token, "customerId": Id, "type": Type, "typeId": TypeId, "subType": SubType, "typeName": TypeName },
                    success: function(msg) {
                        $('#notify-box').animate("fast").animate({
                            opacity : "show"
                        }, "slow");

                        $("#notify").text(msg);

                        setTimeout(function(){
                            $('#notify-box').animate("fast").animate({
                                opacity : "hide"
                            }, "slow");
                        }, 6000);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        $('#notify-box').animate("fast").animate({
                            opacity : "show"
                        }, "slow");

                        $("#notify").text(errorThrown);

                        setTimeout(function(){
                            $('#notify-box').animate("fast").animate({
                                opacity : "hide"
                            }, "slow");
                        }, 6000);
                    }
                });

            });
        });
    </script>

    @yield('scripts')

    </body>
</html>