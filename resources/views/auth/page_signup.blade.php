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
    <title>Đăng ký</title>
</head>
<body>



<div class="content">
    <div class="container" >
        <div class="row">
            <div class="col-md-6 order-md-2">
                <img style="height: 500px" src="{{asset('public/client/login/images/undraw_file_sync_ot38.svg')}}" alt="Image" class="img-fluid">
                <div class="row">
                    <div class="col-md-6"><p class="md-3"><a style="color: coral" href="{{route('home')}}"><i class="fas fa-home"></i> Quay lại trang chủ</a></p></div>
                    <div class="col-md-6"><p class="md-3"><a style="color: #2bbb8b" href="{{route('login')}}"><i class="fas fa-user-check"></i> Bạn đã có tài khoản ?</a></p></div>
                </div>

            </div>
            <div class="col-md-6 contents">
                <div class="row justify-content-center">
                    <div class="col-md-8" >
                        <div class="mb-4">
                            <h3>ĐĂNG KÝ <strong>THÀNH VIÊN</strong></h3>
                        </div>
                        <form action="{{route('post_sign_up')}}" method="post">
                            @csrf
                            <div class="form-group first">
                                <label for="username">Họ và tên</label>
                                <input type="text" class="form-control"  name="name">
                            </div>
                            <div class="form-group first">
                                <label for="">Email</label>
                                <input type="email" class="form-control"  name="email">
                            </div>
                            <div class="form-group last mb-3">
                                <label for="">Mật khẩu</label>
                                <input type="password" class="form-control"  name="password">
                            </div>
                            <div class="form-group last mb-3">
                                <label for="">Xác nhận mật khẩu</label>
                                <input type="password" class="form-control"  name="confirm">
                            </div>
                            <div class="form-group last mb-3">
                                <label for="">Địa chỉ</label>
                                <input type="text" class="form-control"   name="address">
                            </div>
                            <div class="form-group last mb-3">
                                <label for="">Số điện thoại</label>
                                <input type="text" class="form-control"  name="phone">
                            </div>
                            <div class="form-group last mb-3">
                                <span  for="">Giới tính: &nbsp;</span>
                                <input type="radio" class=""  value="Nam" name="sex">Nam
                                <input style="margin-left: 20px" type="radio" class=""  value="Nữ" name="sex"> Nữ
                                <input style="margin-left: 20px" type="radio" class=""  value="Khác" name="sex"> Khác
                            </div>
                            <div class="form-group last mb-3">

                                <span  for="">Ngày sinh</span>
                                <input type="date" class="form-control"   name="birthday">
                            </div>
                            <div class="form-group last mb-3">
                                <span    for="">Hình ảnh</span>

                                <input type="file" class="form-control" name="image" >
                            </div>

                            <input type="submit" value="Đăng ký" class="btn text-white btn-block btn-primary">
                            {{--                            <input type="submit" value="Trang chủ" onclick="history.back()" class="btn text-white btn-block btn-primary">--}}
                            {{--                            <a href="{{route('home')}}" type="button"  class="btn text-white btn-block btn-primary">Trang chủ</a>--}}
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
    var msg = '{{Session::get('noconfirm')}}';
    var exist = '{{Session::has('noconfirm')}}';
    if (exist) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'error',
            title: 'Xác nhận mật khẩu sai'
        })
    }
</script>
<script>
    var msg = '{{Session::get('noconfirm')}}';
    var exist = '{{Session::has('noconfirm')}}';
    if (exist) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })
        Toast.fire({
            icon: 'error',
            title: 'Xác nhận mật khẩu sai'
        })
    }
</script>
<script>
    var msg = '{{Session::get('error_email')}}';
    var exist = '{{Session::has('error_email')}}';
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
            title: 'Email đã được sử dụng'
        })
    }
</script>

</body>
</html>
