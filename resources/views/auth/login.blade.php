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
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
{{--    --}}
    <title>Đăng nhập</title>
</head>
<body>


<div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('{{asset('public/client/login/images/8-1.gif')}}');"></div>
    <div class="contents order-2 order-md-1">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7">
                    <h3>Đăng nhập <strong></strong></h3>
                    <p class="mb-4">Sau khi dăng nhập, bạn sẽ được hệ thống cung cấp các chức năng dựa trên quyền àm user của bạn được đăng ký.</p>
                    <form action="{{route('post_login')}}" method="post">
                        @csrf
                        <div class="form-group first">
                            <label for="username">Email</label>
                            <input type="text" class="form-control" placeholder="your-email@gmail.com" id="username" name="email">
                        </div>
                        <div class="form-group last mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" placeholder="Your Password" id="password" name="password">
                        </div>

                        <div class="d-flex mb-5 align-items-center">
                            <label class="control control--checkbox mb-0"><span class="caption">Ghi nhớ mật khẩu</span>
                                <input type="checkbox" checked="checked"/>
                                <div class="control__indicator"></div>
                            </label>
                            <span class="ml-auto"><a href="#" class="forgot-pass">Đổi mật khẩu</a></span>
                        </div>

                        <input type="submit" value="Đăng nhập" class="btn btn-block btn-primary">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.all.min.js"></script>
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
            title: 'Sai email hoặc mật khẩu'
        })
    }

</script>
</body>
</html>
