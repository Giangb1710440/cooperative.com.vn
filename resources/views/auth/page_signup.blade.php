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




    <title>Đăng ký</title>
</head>
<body>


<div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('{{asset('public/client/login/images/8-1.gif')}}');"></div>
    <div class="contents order-2 order-md-1">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7">
                    <h3 style="text-align: center">Đăng ký thành viên <strong></strong></h3>
                    <p class="mb-4">Hãy sử dụng tài khoản sau khi đăng ký để đăng nhập.</p>
                    <form action="{{route('post_sign_up')}}" method="post">
                        @csrf
                        <div class="form-group first">
                            <label for="username">Họ và tên</label>
                            <input type="text" class="form-control"  name="name">
                        </div>
                        <div class="form-group first">
                            <label for="">Email</label>
                            <input type="email" class="form-control" placeholder="Nguyen@gmail.com" name="email">
                        </div>
                        <div class="form-group last mb-3">
                            <label for="">Mật khẩu</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <div class="form-group last mb-3">
                            <label for="">Xác nhận mật khẩu</label>
                            <input type="password" class="form-control" placeholder="Password" name="confirm">
                        </div>
                        <div class="form-group last mb-3">
                            <label for="">Địa chỉ</label>
                            <input type="text" class="form-control" placeholder="Bao gồm số nhà"  name="address">
                        </div>
                        <div class="form-group last mb-3">
                            <label for="">Số điện thoại</label>
                            <input type="text" class="form-control" placeholder="09xxxxxxx"  name="phone">
                        </div>
                        <div class="form-group last mb-3">
                            <label for="">Giới tính</label><br>
                            <input type="radio" class=""  value="Nam" name="sex">Nam
                            <input style="margin-left: 20px" type="radio" class=""  value="Nữ" name="sex"> Nữ
                            <input style="margin-left: 20px" type="radio" class=""  value="Khác" name="sex"> Khác
                        </div>

                        <div class="form-group last mb-3">
                            <label for="">Ngày sinh</label>
                            <input type="date" class="form-control" placeholder="xx/xx/xxxx"  name="birthday">
                        </div>
                        <div class="form-group last mb-3">
                            <label for="">Hình ảnh</label>
                            <input type="file" class="form-control" name="image" placeholder="images">
                        </div>
                        <div class="d-flex mb-5 align-items-center">
                            <span class="ml-auto"><a href="{{route('home')}}" class="forgot-pass"><i class="fa fa-home"></i> Trang chủ</a></span>
                        </div>
                        <input type="submit" value="Đăng ký" class="btn btn-block btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('public/client/login/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('public/client/login/js/popper.min.js')}}"></script>
<script src="{{asset('public/client/login/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/client/login/js/main.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
</body>
</html>
