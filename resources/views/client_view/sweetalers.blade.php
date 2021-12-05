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

<script>
    var msg = '{{Session::get('non_qty')}}';
    var exist = '{{Session::has('non_qty')}}';
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
            icon: 'info',
            title: 'Số lượng không cho phép'
        })
    }
</script>

<script>
    var msg = '{{Session::get('error_login')}}';
    var exist = '{{Session::has('error_login')}}';
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
            icon: 'info',
            title: 'Hãy đăng nhập'
        })
    }
</script>
<script>
    var msg = '{{Session::get('add_cart_success')}}';
    var exist = '{{Session::has('add_cart_success')}}';
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
            title: 'Đã thêm vào giỏ hàng'
        })
    }
</script>
<script>
    var msg = '{{Session::get('no_old_passwd')}}';
    var exist = '{{Session::has('no_old_passwd')}}';
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
            icon: 'info',
            title: 'Bạn chưa nhập mật khẩu củ'
        })
    }
</script>
<script>
    var msg = '{{Session::get('no_confirm_pass')}}';
    var exist = '{{Session::has('no_confirm_pass')}}';
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
            icon: 'info',
            title: 'Xác nhận mật khẩu sai'
        })
    }
</script>
<script>
    var msg = '{{Session::get('no_confirm_old')}}';
    var exist = '{{Session::has('no_confirm_old')}}';
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
            icon: 'info',
            title: 'Bạn đã nhập không đúng mật khẩu củ'
        })
    }
</script>
<script>
    var msg = '{{Session::get('no_old_passwd')}}';
    var exist = '{{Session::has('no_old_passwd')}}';
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
            icon: 'info',
            title: 'Bạn chưa nhập mật khẩu củ'
        })
    }
</script>
<script>
    var msg = '{{Session::get('update_profile_success')}}';
    var exist = '{{Session::has('update_profile_success')}}';
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
            icon: 'success',
            title: 'Đã cập nhật'
        })
    }
</script>
<script>
    var msg = '{{Session::get('success_delete_order')}}';
    var exist = '{{Session::has('success_delete_order')}}';
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
            icon: 'success',
            title: 'Đã hủy đơn'
        })
    }
</script>
<script>
    var msg = '{{Session::get('no_passwd')}}';
    var exist = '{{Session::has('no_passwd')}}';
    if (exist) {
        const Toast = Swal.mi({
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
            icon: 'success',
            title: 'Đã cập nhật'
        })
    }
</script>
<script>
    var msg = '{{Session::get('order_Nsuccess')}}';
    var exist = '{{Session::has('order_Nsuccess')}}';
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
            icon: 'info',
            title: 'Giỏ hàng rỗng'
        })
    }
</script>
<script>
    var msg = '{{Session::get('order_success')}}';
    var exist = '{{Session::has('order_success')}}';
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
            icon: 'success',
            title: 'Đặt hàng thành công'
        })
    }
</script>

<script>
    var msg = '{{Session::get('delete_cart')}}';
    var exist = '{{Session::has('delete_cart')}}';
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
            icon: 'error',
            title: 'Đã xóa sản phẩm khỏi giỏ hàng'
        })
    }
    function xacnhanxoa(msg){
        if(window.confirm(msg)){
            return true;
        }
        return false;
    }
</script>

<script>
    var msg = '{{Session::get('errors')}}';
    var exist = '{{Session::has('errors')}}';
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
            title: 'Có lỗi trong quá trình thanh toán'
        })
    }
</script>
<script>
    var msg = '{{Session::get('errors_vnpay_checkout')}}';
    var exist = '{{Session::has('errors_vnpay_checkout')}}';
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
            icon: 'errors_vnpay_checkout',
            title: 'Có lỗi trong quá trình thanh toán'
        })
    }
</script>


<script>
    var msg = '{{Session::get('update_cart_success')}}';
    var exist = '{{Session::has('update_cart_success')}}';
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
            title: 'Đã cập nhật giỏ hàng'
        })
    }
</script>
<script>
    var msg = '{{Session::get('no_update_cart_success')}}';
    var exist = '{{Session::has('no_update_cart_success')}}';
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
            icon: 'info',
            title: 'Số lượng không hợp lệ'
        })
    }
</script>
