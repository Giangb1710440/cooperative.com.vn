<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Thêm mới thành viên</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{asset('public/server/css/simplebar.css')}}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('public/server/css/feather.css')}}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{asset('public/server/css/daterangepicker.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('public/server/css/app-light.css')}}" id="lightTheme">
    <link rel="stylesheet" href="{{asset('public/server/css/app-dark.css')}}" id="darkTheme" disabled>
</head>
<body class="dark ">
<div class="wrapper vh-100">
    <div class="row align-items-center h-100">
        <form class="col-lg-6 col-md-8 col-10 mx-auto">
            <div class="mx-auto text-center my-4">
                <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">

                    <img style="position: relative;z-index: 100;height: 100%;width: 100%" src="{{asset('public/server/assets/avatars/GosCooperative.png')}}" alt="">
                </a>
                <h2 class="my-3">Đăng Ký</h2>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="firstname">Firstname</label>
                    <input type="text" id="firstname" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="lastname">Lastname</label>
                    <input type="text" id="lastname" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4">
            </div>

            <hr class="my-4">
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputPassword5">New Password</label>
                        <input type="password" class="form-control" id="inputPassword5">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword6">Confirm Password</label>
                        <input type="password" class="form-control" id="inputPassword6">
                    </div>
                </div>
                <div class="col-md-6">
                    <p class="mb-2">Password requirements</p>
                    <p class="small text-muted mb-2"> To create a new password, you have to meet all of the following requirements: </p>
                    <ul class="small text-muted pl-4 mb-0">
                        <li> Minimum 8 character </li>
                        <li>At least one special character</li>
                        <li>At least one number</li>
                        <li>Can’t be the same as a previous password </li>
                    </ul>
                </div>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
            <p class="mt-5 mb-3 text-muted text-center">© 2020</p>
        </form>
    </div>
</div>
<script src="{{asset('public/server/js/jquery.min.js')}}"></script>
<script src="{{asset('public/server/js/popper.min.js')}}"></script>
<script src="{{asset('public/server/js/moment.min.js')}}"></script>
<script src="{{asset('public/server/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/server/js/simplebar.min.js')}}"></script>
<script src='{{asset('public/server/js/daterangepicker.js')}}'></script>
<script src='{{asset('public/server/js/jquery.stickOnScroll.js')}}'></script>
<script src="{{asset('public/server/js/tinycolor-min.js')}}"></script>
<script src="{{asset('public/server/js/config.js')}}"></script>
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
</body>
</html>
