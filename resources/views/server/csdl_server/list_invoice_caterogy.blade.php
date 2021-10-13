@extends('server_view.master_admin')
@section('title','Danh sách đơn loại hóa đơn')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">
                        <!-- Small table -->
                        <div class="col-md-5 my-4">
                            <h2 class="h4 mb-1">Thêm mới loại hóa đơn</h2>
                            <p class="mb-3">Chức năng được tích hợp ngay tại trang quản lí loại hóa đơn, thuận tiện cho người dùng thao tác</p>
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">Loại hóa đơn</strong>
                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" action="{{route('post_add_caterogy_order')}}" method="post">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Tên đơn loại hóa đơn</label>
                                            <input type="text" class="form-control" id="" name="name_caterogy_invoice"  required>
                                        </div>
                                        <br>
                                        <div class="form-group mb-3">
                                            <label for="validationTextarea">Mô tả</label>
                                            <textarea class="form-control" id="validationTextarea" name="description_caterogy_invoice" required></textarea>
                                            <div class="invalid-feedback"> Hãy nhập vào mô tả. </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit"><i class="far fa-plus-square"></i> Thêm mới</button>

                                        <a style="margin-left: 10px" class="btn btn-primary" href="{{route('admin_home')}}"><i class="far fa-times-circle"></i> Thoát </a>
                                    </form>
                                </div> <!-- /.card-body -->
                            </div> <!-- /.card -->
                        </div> <!-- customized table -->
                        <div class="col-md-7 my-4">
                            <h2 class="h4 mb-1">Danh sách loại hóa đơn</h2>
                            <p class="mb-3">Danh sách chỉ hiển thị với người dùng có quyền Admin</p>
                            <br>
                            <div class="card shadow">
                                <div class="card-body">
                                    <!-- table -->
                                    <table class="table datatables" id="dataTable-1">
                                        <thead>
                                        <tr>
                                            <td></td>
                                            <th><strong>ID</strong></th>
                                            <th><strong>TÊN LOẠI HÓA ĐƠN</strong></th>
                                            <th class="w-25"><strong>MÔ TẢ</strong></th>
                                            <th><strong>NGÀY THÊM</strong></th>
                                            <th><strong>Tùy chọn</strong></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($list_order_cate as $list_order_cates)
                                            <tr>
                                                <td>
                                                    <i class="far fa-sticky-note"></i>
                                                </td>
                                                <td>
                                                    <div class="avatar avatar-md">
                                                        IDO{{$list_order_cates->id}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="mb-0 text-muted"><strong>{{ucwords($list_order_cates->name_cate_order)}}</strong></p>

                                                </td>
                                                <td class="w-25"><small class="text-muted">{{trans($list_order_cates->description_cate_order)}} .</small></td>
                                                <td class="text-muted">{{date('d-m-Y', strtotime($list_order_cates->created_at))}}</td>
                                                <td>
                                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button type="button" class="dropdown-item btn mb-2 btn-outline-secondary" data-toggle="modal"  data-target="#edit_unit{{$list_order_cates->id}}" data-whatever="@mdo"><i class="fas fa-edit"></i> Chỉnh sửa</button>
                                                        <button type="button" class="dropdown-item btn mb-2 btn-outline-secondary" data-toggle="modal"  data-target="#delete_unit{{$list_order_cates->id}}" data-whatever="@mdo"><i class="fas fa-trash-alt"></i> Xóa</button>
                                                    </div>
                                                    {{--                                                    xoa du lieu unit--}}
                                                    <div class="modal fade" id="delete_unit{{$list_order_cates->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="varyModalLabel">Thông báo</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <label for="recipient-name" class="col-form-label">Nếu bạn ấn xóa, tất cả dữ liệu liên quan sẽ bị xóa sạch và không thể phục hồi</label>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Đóng</button>
                                                                    <a href="{{route('post_delete_caterogy_order',$list_order_cates->id)}}" style="background-color: red" type="button" class="btn mb-2 btn-primary">Xác nhận xóa</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{--                                                        Edit du lieu unit--}}
                                                    <div class="modal fade" id="edit_unit{{$list_order_cates->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="varyModalLabel">Cập nhật dữ liệu</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('post_edit_invoice_cate',$list_order_cates->id)}}" method="post">
                                                                        @csrf
                                                                        <div class="form-group mb-3">
                                                                            <label for="exampleInputEmail1">Tên Loaị hóa đơn</label>
                                                                            <input type="text" class="form-control" id="" name="name_cate_invoice" value="{{$list_order_cates->name_cate_order}}"  required>
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label for="exampleInputEmail1">Mô tả</label>
                                                                            <textarea class="form-control" id="validationTextarea" name="description_invoice" required>{{$list_order_cates->description_cate_order}}</textarea>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn mb-2 btn-info">Cập nhật</button>
                                                                            <button type="button" class="btn mb-2 btn-primary" data-dismiss="modal">Đóng</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div> <!-- customized table -->
                    </div> <!-- end section -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        @include('server_view.paner')
    </main> <!-- main -->

    <script>
        var msg = '{{Session::get('success_delete_order_cate')}}';
        var exist = '{{Session::has('success_delete_order_cate')}}';
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
    <script>
        var msg = '{{Session::get('success_edit_order_cate')}}';
        var exist = '{{Session::has('success_edit_order_cate')}}';
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
                title: 'Đã thay đổi'
            })
        }
    </script>

    <script>
        var msg = '{{Session::get('add_cate_order_success')}}';
        var exist = '{{Session::has('add_cate_order_success')}}';
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
