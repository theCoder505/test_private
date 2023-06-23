<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    
    {{-- data table  --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/assets/css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('vendor/assets/icon/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/assets/icon/icofont/css/icofont.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/assets/css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/assets/css/custom.css') }}">

    <link rel="icon" href="{{ asset('website/webicon.png') }}" type="image/x-icon">

    <title> @yield('title') </title>
</head>

<body>




    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">

                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>







    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            @include('menufacturers.layouts.header')
            @include('menufacturers.layouts.sidebar')




            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    @yield('content')
                </div>
            </div>



        </div>
    </div>










    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('vendor/assets/js/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/assets/js/popper.js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/assets/js/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ asset('vendor/assets/js/jquery-slimscroll/jquery.slimscroll.js') }}">
    </script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('vendor/assets/js/modernizr/modernizr.js') }}"></script>
    <!-- am chart -->
    <script src="{{ asset('vendor/assets/pages/widget/amchart/amcharts.min.js') }}"></script>
    <script src="{{ asset('vendor/assets/pages/widget/amchart/serial.min.js') }}"></script>
    <!-- Todo js -->
    <script type="text/javascript " src="{{ asset('vendor/assets/pages/todo/todo.js ') }}"></script>
    <!-- Custom js -->
    <script type="text/javascript" src="{{ asset('vendor/assets/pages/dashboard/custom-dashboard.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/assets/js/script.js') }}"></script>
    <script type="text/javascript " src="{{ asset('vendor/assets/js/SmoothScroll.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/demo-12.js') }}"></script>
    <script src="{{ asset('vendor/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        var $window = $(window);
        var nav = $('.fixed-button');
        $window.scroll(function() {
            if ($window.scrollTop() >= 200) {
                nav.addClass('active');
            } else {
                nav.removeClass('active');
            }
        });
    </script>

    <script type="text/javascript" src="{{ asset('vendor/assets/js/custom.js') }}"></script>

    @yield('scripts')
</body>

</html>
