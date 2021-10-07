@extends('server_view.master_admin')
@section('title','Thêm sản phẩm')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="page-title">Thêm mới sản phẩm</h2>
                    <p class="text-muted">Các sản phẩm được thêm vào dự trên các thuộc tính mà nhà cung cấp sản phẩm cấp cho</p>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">Thêm mới</strong>
                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" enctype="multipart/form-data" action="{{route('post_add_product')}}" method="post">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-8 mb-3">
                                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="name_product" aria-describedby="emailHelp" required>
                                                <div class="invalid-feedback"> Please use a valid email </div>
                                                <small id="emailHelp" class="form-text text-muted">Nên đặt tên có dấu cho sản phẩm.</small>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustomUsername">Loại sản phẩm</label>
                                                <div class="input-group">
                                                    <select name="cate_product" class="form-control" id="">
                                                        @foreach($cate_product as $cate_products)
                                                            <option value="{{$cate_products->id}}">{{$cate_products->name_cate_product}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback"> Please choose a username. </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">Giá vốn</label>
                                                <input type="text" class="form-control" id="validationCustom01" name="cost_price" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Giá bán ra</label>
                                                <input type="text" class="form-control" id="validationCustom02" name="sale_price" required>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="validationCustom02">Khuyến mãi</label>
                                                <input type="text" class="form-control" id="validationCustom02" name="khuyenmai" placeholder="%" required>
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <label for="validationCustom02">Đơn vị</label>
                                                <select class="form-control" name="unit_product" id="">
                                                    @foreach($unit as $units)
                                                        <option value="{{$units->id}}">{{$units->name_unit}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="validationTextarea">Mô tả</label>
                                            <textarea class="form-control" name="description_product" id="validationTextarea" placeholder="Bạn cần thêm một số thông tin của sản phẩm tại đây" required></textarea>
                                            <div class="invalid-feedback"> Please enter a message in the textarea. </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="validationCustom03">Trạng thái</label>
                                                <input type="text" class="form-control" name="status_product" id="validationCustom03" required>
                                                <div class="invalid-feedback"> Please provide a valid city. </div>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="validationCustom05">Hình ảnh</label>
                                                <input required type="file" class="form-control" id="validatedCustomFile" name="image[]" placeholder="images" multiple>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Thêm mới</button>
                                        <button class="btn btn-primary" type="submit">Thoát</button>
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
    </main> <!-- main -->
    <script>
        var msg = '{{Session::get('add_product')}}';
        var exist = '{{Session::has('add_product')}}';
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
    <script>
        var msg = '{{Session::get('no_add_product')}}';
        var exist = '{{Session::has('no_add_product')}}';
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
                icon: 'error',
                title: 'Sản phẩm bạn thêm đã tồn tại'
            })
        }
    </script>
@endsection
