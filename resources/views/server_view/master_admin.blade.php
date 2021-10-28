<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="icons8-slack-64.png" style="color: yellow">
    <title>@yield('title')</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{asset('public/server/css/simplebar.css')}}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('public/server/css/feather.css')}}">
    <link rel="stylesheet" href="{{asset('public/server/css/select2.css')}}">
    <link rel="stylesheet" href="{{asset('public/server/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('public/server/css/uppy.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/server/css/jquery.steps.css')}}">
    <link rel="stylesheet" href="{{asset('public/server/css/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{asset('public/server/css/quill.snow.css')}}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{asset('public/server/css/daterangepicker.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('public/server/css/app-light.css')}}" id="lightTheme" disabled>
    <link rel="stylesheet" href="{{asset('public/server/css/app-dark.css')}}" id="darkTheme">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://kit.fontawesome.com/12bbc8e57f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.all.min.js"></script>
</head>
<body class="vertical  dark  ">
<div class="wrapper">
    @include('server_view.header_admin')

    @include('server_view.taskbar_admin')
     @yield('content')
</div> <!-- .wrapper -->
<script src="{{asset('public/server/js/jquery.min.js')}}"></script>
<script src="{{asset('public/server/js/popper.min.js')}}"></script>
<script src="{{asset('public/server/js/moment.min.js')}}"></script>
<script src="{{asset('public/server/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/server/js/simplebar.min.js')}}"></script>
<script src='{{asset('public/server/js/daterangepicker.js')}}'></script>
<script src='{{asset('public/server/js/jquery.stickOnScroll.js')}}'></script>
<script src="{{asset('public/server/js/tinycolor-min.js')}}"></script>
<script src="{{asset('public/server/js/config.js')}}"></script>
<script src="{{asset('public/server/js/d3.min.js')}}"></script>
<script src="{{asset('public/server/js/topojson.min.js')}}"></script>
<script src="{{asset('public/server/js/datamaps.all.min.js')}}"></script>
<script src="{{asset('public/server/js/datamaps-zoomto.js')}}"></script>
<script src="{{asset('public/server/js/datamaps.custom.js')}}"></script>
<script src="{{asset('public/server/js/Chart.min.js')}}"></script>

<script>
    /* defind global options */
    Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
    Chart.defaults.global.defaultFontColor = colors.mutedColor;
</script>
<script src="{{asset('public/server/js/gauge.min.js')}}"></script>
<script src="{{asset('public/server/js/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('public/server/js/apexcharts.min.js')}}"></script>
<script src="{{asset('public/server/js/apexcharts.custom.js')}}"></script>
<script src='{{asset('public/server/js/jquery.mask.min.js')}}'></script>
<script src='{{asset('public/server/js/select2.min.js')}}'></script>
<script src='{{asset('public/server/js/jquery.steps.min.js')}}'></script>
<script src='{{asset('public/server/js/jquery.validate.min.js')}}'></script>
<script src='{{asset('public/server/js/jquery.timepicker.js')}}'></script>
<script src='{{asset('public/server/js/dropzone.min.js')}}'></script>
<script src='{{asset('public/server/js/uppy.min.js')}}'></script>
<script src='{{asset('public/server/js/quill.min.js')}}'></script>


@include('server_view.scr_server')

<script src="{{asset('public/server/js/apps.js')}}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag()
    {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
</script>
</body>
</html>
