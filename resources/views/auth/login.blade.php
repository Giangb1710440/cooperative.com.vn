<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('public/client/login/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href="{{asset('public/client/login/css/owl.carousel.min.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('public/client/login/css/bootstrap.min.css')}}">

    <!-- Style -->
    <link rel="stylesheet" href="{{asset('public/client/login/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/fontawesome.css')}}" type="text/css">
    <script src="{{asset('public/fontawesome_pro.js')}}"></script>
    <script src="{{asset('public/sweetalert.js')}}"></script>
    <title>Đăng nhập</title>
</head>
<body>



<div class="content" style="padding: 7rem 0">
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-md-2">
                <img src="{{asset('public/client/login/images/undraw_file_sync_ot38.svg')}}" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6 contents">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="mb-4">
                            <h3>ĐĂNG NHẬP <strong>GOSCOOPERATIVE</strong></h3>
                            <p class="mb-4"><a style="color: coral" href="{{route('home')}}"><i class="fas fa-home"></i> Quay lại trang chủ</a></p>
                        </div>
                        <form action="{{route('post_login')}}" method="post">
                            @csrf
                            <div class="form-group first">
                                <label for="username">Email</label>
                                <input type="text" class="form-control" id="username" name="email">
                            </div>
                            <div class="form-group last mb-4">
                                <label for="password">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="d-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-0"><span class="caption">Ghi nhớ mật khẩu</span>
                                    <input type="checkbox" checked="checked"/>
                                    <div class="control__indicator"></div>
                                </label>
                                <span class="ml-auto"><a href="{{route('page_sign_up')}}" class="forgot-pass">Bạn chưa có tài khoản ? </a></span>
                            </div>

                            <input type="submit" value="Đăng nhập" class="btn text-white btn-block btn-primary">
{{--                            <input type="submit" value="Trang chủ" onclick="history.back()" class="btn text-white btn-block btn-primary">--}}
{{--                            <a href="{{route('home')}}" type="button"  class="btn text-white btn-block btn-primary">Trang chủ</a>--}}
                            <span class="d-block text-left my-4 text-muted"> Đăng nhập với </span>

                            <div class="social-login">
                                <a href="#" class="facebook">
                                    <span class="icon-facebook mr-3"></span>
                                </a>
                                <a href="#" class="twitter">
                                    <span class="icon-twitter mr-3"></span>
                                </a>
                                <a href="#" class="google">
                                    <span class="icon-google mr-3"></span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>


<script src="{{asset('public/client/login/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('public/client/login/js/popper.min.js')}}"></script>
<script src="{{asset('public/client/login/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/client/login/js/main.js')}}"></script>
<script>
    var msg = '{{Session::get('signup_success')}}';
    var exist = '{{Session::has('signup_success')}}';
    if (exist) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'success',
            title: 'Đăng ký thành công'
        })
    }
</script>
<script>
    var msg = '{{Session::get('no_login_success')}}';
    var exist = '{{Session::has('no_login_success')}}';
    if (exist) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1200,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'warning',
            title: 'Sai Email hoặc mật khẩu'
        })
    }
</script>

</body>
</html>
