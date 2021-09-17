{{--dang nhap thanh cong--}}

<script>
    var msg = '{{Session::get('login_success')}}';
    var exist = '{{Session::has('login_success')}}';
    if (exist) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 1400,
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
