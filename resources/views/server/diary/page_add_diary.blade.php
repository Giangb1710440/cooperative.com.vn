@extends('server_view.master_admin')
@section('title','Thêm nhật ký trồng cây')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="page-title">Thêm mới nhật ký trồng cây</h2>
                    <p class="text-muted">Nhật ký trồng cây ăn trái khi được khởi tạo sẽ cung cấp đầy đủ thông
                        tin về quá trình sinh trường phát triển của cây, dễ dàng cho việc quản lý</p>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">Thêm mới</strong>
                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" enctype="multipart/form-data" action="{{route('post_add_diary')}}" method="post">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-8 mb-3">
                                                <label for="exampleInputEmail1">Tên Nhật ký nông hộ</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="name_diary" aria-describedby="emailHelp" required>
                                                <div class="invalid-feedback"> Please use a valid email </div>
                                                <small id="emailHelp" class="form-text text-muted">Nên đặt tên có dấu cho tên nhật ký.</small>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustomUsername">Loại cây trồng</label>
                                                <div class="input-group">
                                                    <select name="cate_diary" class="form-control" id="">
                                                        @foreach($product as $products)
                                                            <option value="{{$products->id}}">{{$products->name_product}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback"> Please choose a username. </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustomUsername">Diện tích trồng(M<sup>2</sup>)</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="exampleInputEmail1" name="area_diary" aria-describedby="emailHelp" required>
                                                    <div class="invalid-feedback"> Please use a valid email </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Số lượng</label>
                                                <input type="text" class="form-control" id="validationCustom02" name="qty_diary" required>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustomUsername">Kỹ thuật canh tác</label>
                                                <div class="input-group">
                                                    <select name="technique_diary" class="form-control" id="">
                                                        @foreach($technique as $techniques)
                                                            <option value="{{$techniques->id}}">{{$techniques->name_technique}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback"> Please choose a username. </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 mb-3">
                                                <label for="validationCustom02">Địa chỉ nơi canh tác</label>
                                                <div class="input-group">
                                                    <textarea class="form-control" name="address_diary" id="validationTextarea" placeholder="Nên ghi địa chỉ kèm theo số nhà" required></textarea>
                                                    <div class="invalid-feedback"> Please enter a message in the textarea. </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">SĐT chủ hộ canh tác</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="exampleInputEmail1" name="sdt_diary" aria-describedby="emailHelp" required>
                                                    <div class="invalid-feedback"> Please use a valid email </div>
                                                </div>
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
        var msg = '{{Session::get('success_add_diary')}}';
        var exist = '{{Session::has('success_add_diary')}}';
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
        var msg = '{{Session::get('no_add_diary')}}';
        var exist = '{{Session::has('no_add_diary')}}';
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
                title: 'Đã tồn tại nhật ký'
            })
        }
    </script>
@endsection
