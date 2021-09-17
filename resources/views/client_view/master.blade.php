<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('public/client/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/client/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/client/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/client/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/client/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/client/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/client/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/client/css/style.css')}}" type="text/css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://kit.fontawesome.com/12bbc8e57f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.all.min.js"></script>

</head>

<body>


<!-- Header Section Begin -->
@include('client_view.header')

<!-- Header Section End -->
@yield('content')
<!-- Footer Section Begin -->
@include('client_view.footer')
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="{{asset('public/client/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('public/client/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/client/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('public/client/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('public/client/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('public/client/js/mixitup.min.js')}}"></script>
<script src="{{asset('public/client/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('public/client/js/main.js')}}"></script>

@include('client_view.sweetalers')

</body>

</html>
