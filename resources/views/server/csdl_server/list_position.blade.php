@extends('server_view.master_admin')
@section('title','Quản lý chức vụ')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">
                        <!-- Small table -->
                        <div class="col-md-5 my-4">
                            <h2 class="h4 mb-1 text-center">THÊM MỚI CHỨC VỤ</h2>
                            <p class="mb-3 text-center">Chức năng được tích hợp ngay tại trang quản lí quyền, thuận tiện cho người dùng thao tác</p>
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">Chức vụ</strong>
                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" action="{{route('post_add_position')}}" method="post">
                                        @csrf
                                        <div class="form-group mb-3">
                                            <label for="exampleInputEmail1">Tên chức vụ</label>
                                            <input type="text" class="form-control" id="" name="name_position"  required>

                                        </div>
                                        <br>
                                        <div class="form-group mb-3">
                                            <label for="validationTextarea">Mô tả</label>
                                            <textarea class="form-control" id="validationTextarea" name="description_position" required></textarea>
                                            <div class="invalid-feedback"> Hãy nhập vào mô tả. </div>
                                        </div>

                                        <button class="btn btn-primary" type="submit"><i class="far fa-plus-square"></i> Thêm mới</button>

                                        <a style="margin-left: 10px" class="btn btn-primary" href="{{route('admin_home')}}"><i class="far fa-times-circle"></i> Thoát </a>
                                    </form>
                                </div> <!-- /.card-body -->
                            </div> <!-- /.card -->
                        </div> <!-- customized table -->
                        <div class="col-md-7 my-4">
                            <h2 class="h4 mb-1 text-center">DANH SÁCH CHỨC VỤ NGƯỜI DÙNG</h2>
                            <p class="mb-3 text-center">Danh sách chỉ hiển thị với người dùng có quyền Admin</p>
                            <br>
                            <div class="card shadow">
                                <div class="card-body">
                                    <!-- table -->
                                    <table class="table datatables" id="dataTable-1">
                                        <thead>
                                        <tr>
                                            <td></td>
                                            <th><strong>ID-POSITION</strong></th>
                                            <th><strong>TÊN NGƯỜI DÙNG</strong></th>
                                            <th class="w-25"><strong>TÊN CHỨC VỤ</strong></th>
                                            <th><strong>NGÀY THÊM</strong></th>
                                            <th><strong>Tùy chọn</strong></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($user as $users)
                                            @if($users->role_id == 1)
                                                @continue
                                            @else
                                                <tr>
                                                    <td>
                                                        <i class="far fa-sticky-note"></i>
                                                    </td>
                                                    <td>
                                                        <div class="avatar avatar-md">
                                                            IDU{{$users->id}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0 text-muted"><strong>{{ucwords($users->name_user)}}</strong></p>
                                                    </td>

                                                    @foreach($position as $positions)
                                                        @if($positions->id == $users->id_position )
                                                            <td class="w-25"><small class="text-muted">{{trans($positions->name_position)}} .</small></td>
                                                        @endif
                                                    @endforeach
                                                    <td class="text-muted">{{date('d-m-Y', strtotime($users->created_at))}}</td>
                                                    <td>
                                                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <button type="button" class="dropdown-item btn mb-2 btn-outline-secondary" data-toggle="modal"  data-target="#edit_unit{{$users->id}}" data-whatever="@mdo"><i class="fas fa-edit"></i> Chỉnh sửa</button>
                                                            {{--                                                        <button type="button" class="dropdown-item btn mb-2 btn-outline-secondary" data-toggle="modal"  data-target="#delete_unit{{$list_role_accesss->id}}" data-whatever="@mdo"><i class="fas fa-trash-alt"></i> Xóa</button>--}}
                                                        </div>

                                                        <div class="modal fade" id="edit_unit{{$users->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="varyModalLabel">Cập nhật dữ liệu</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="{{route('post_edit_position',$users->id)}}" method="post">
                                                                            @csrf
                                                                            <div class="form-group mb-3">
                                                                                <label for="exampleInputEmail1">Tên Người dùng</label>
                                                                                <input type="text" class="form-control" id="" name="name_user" value="{{$users->name_user}}"  required disabled>
                                                                            </div>
                                                                            <div class="form-group mb-3">
                                                                                <label for="exampleInputEmail1">Mô tả</label>
                                                                                {{--                                                                            <textarea class="form-control" id="validationTextarea" name="description_invoice" required>{{$list_role_accesss->role_description}}</textarea>--}}
                                                                                <select class="form-control" name="position_user" id="">
                                                                                    @foreach($position as $positions)
                                                                                        @if($positions -> id == $users->id_position )
                                                                                            <option class="form-control" value="{{$positions->id}}">{{$positions->name_position}}</option>
                                                                                            @break
                                                                                        @endif
                                                                                    @endforeach
                                                                                    @foreach($position as $positions)
                                                                                        @if($positions -> id == $users->id_position )
                                                                                            @continue
                                                                                        @else
                                                                                            <option class="form-control" value="{{$positions->id}}">{{$positions->name_position}}</option>
                                                                                        @endif
                                                                                    @endforeach
                                                                                    <option value=""></option>
                                                                                </select>
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
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <nav aria-label="Table Paging" class="mb-0 text-muted">
                                        <ul class="pagination justify-content-center mb-0">
                                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                        </ul>
                                    </nav>
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
        var msg = '{{Session::get('edit_position_success')}}';
        var exist = '{{Session::has('edit_position_success')}}';
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
        var msg = '{{Session::get('add_role_access_success')}}';
        var exist = '{{Session::has('add_role_access_success')}}';
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
