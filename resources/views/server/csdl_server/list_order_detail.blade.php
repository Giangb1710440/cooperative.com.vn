@extends('server_view.master_admin')
@section('title','Chi tiết đơn hàng')
@section('content')


    <script>
        var msg = '{{Session::get('success_delete_unit')}}';
        var exist = '{{Session::has('success_delete_unit')}}';
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
                icon: 'error',
                title: 'Đã xóa'
            })
        }
    </script>
@endsection
