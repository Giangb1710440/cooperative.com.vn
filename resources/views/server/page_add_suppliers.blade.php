@extends('server_view.master_admin')
@section('title','Thêm nhà cung cấp sản phẩm')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="page-title">Thêm mới nhà cung cấp</h2>
                    <p class="text-muted">Nhà cung cấp là nơi cung cấp nguyên liệu, vật liệu và các sản phẩm dùng cho việc mua bán, chế biến sản phẩm.</p>
                    <div class="row">
                        <div class="col-md-1"></div>

                        <div class="col-md-10">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">Nhà cung cấp</strong>
                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" action="{{route('post_add_suppliers')}}" method="post">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Tên nhà cung cấp</label>
                                            <input type="text" class="form-control" id="" name="name_supplier"  required>

                                        </div>
                                        <br>
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Số điện thoại nhà cung cấp</label>
                                            <input type="text" class="form-control" id="" name="phone_supplier"  required>

                                        </div>
                                        <br>
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Email nhà cung cấp</label>
                                            <input type="email" class="form-control" id="" name="email_supplier"  required>

                                        </div>
                                        <br>
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Địa chỉ nhà cung cấp</label>
                                            <input type="text" class="form-control" id="" name="address_supplier"  required>
                                        </div>
                                        <br>

                                        <button class="btn btn-primary" type="submit"><i class="far fa-plus-square"></i> Thêm mới</button>

                                        <a style="margin-left: 10px" class="btn btn-primary" href="{{route('admin_home')}}"><i class="far fa-times-circle"></i> Thoát </a>
                                    </form>
                                </div> <!-- /.card-body -->
                            </div> <!-- /.card -->
                        </div> <!-- /.col -->

                        <div class="col-md-1"></div>
                    </div> <!-- end section -->
                </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        @include('server_view.paner')
    </main>
    <script>
        var msg = '{{Session::get('add_supplier_success')}}';
        var exist = '{{Session::has('add_supplier_success')}}';
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
                icon: 'success',
                title: 'Đã thêm'
            })
        }
    </script>
@endsection
