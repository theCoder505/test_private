<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Fontfaces CSS-->
    <link href="{{ asset('admin/assets/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/assets/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet"
        media="all">
    <link href="{{ asset('admin/assets/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet"
        media="all">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Vendor CSS-->
    <link href="{{ asset('admin/assets/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}"
        rel="stylesheet" media="all">
    <link href="{{ asset('admin/assets/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/assets/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/assets/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/assets/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin/assets/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet"
        media="all">

    <link rel="shortcut icon" href="{{ $siteicon }}" type="image/x-icon">
    <!-- DATA TABLES css-->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <!-- Main CSS-->
    <link href="{{ asset('admin/assets/css/theme.css') }}" rel="stylesheet" media="all">

    <link href="{{ asset('admin/assets/css/custom.css') }}" rel="stylesheet" media="all">


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script src="https://cdn.tiny.cloud/1/86huv8mqdk27xmp7aa620j1jos97ufurmoenj35tsqgo3wcy/tinymce/5/tinymce.min.js">
    </script>
    <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <!-- Title Page-->
    <title>@yield('title')</title>

</head>


<body class="animsition">

    <div class="page-wrapper">

        @include('question_controllers.layouts.header')

        @include('question_controllers.layouts.sidemenu')


        <div class="page-container">
            @include('question_controllers.layouts.headerdesktop')
            @yield('content')
        </div>


    </div>


    <!-- Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>

    <!-- Vendor JS       -->
    <script src="{{ asset('admin/assets/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/select2/select2.min.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom.js') }}"></script>

</body>

</html>
