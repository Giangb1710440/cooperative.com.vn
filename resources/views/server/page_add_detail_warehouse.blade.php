@extends('server_view.master_admin')
@section('title','Khỏi tạo kho hàng')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">

                    <div class="row">
                        <div class="col-md-5">
                            <h2 class="page-title">Khởi tạo kho hàng</h2>
                            <p class="text-muted">Kho hàng sau khi được khỏi tạo có thể cung cấp các chức năng quản lý kho hàng cho người quản trị</p>
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <strong class="card-title">Thêm mới</strong>
                                </div>
                                <div class="card-body">
                                    <form class="needs-validation" enctype="multipart/form-data" action="{{route('post_detail_warehouse')}}" method="post">
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-8 mb-3">
                                                <label for="exampleInputEmail1">Sản phẩm</label>
                                                <div class="input-group">
                                                    <select name="id_product" class="form-control"  id="idp"
                                                            onchange="update_pwarehouse(this.value + ',' + this.value)">
                                                        @if(Session::has('id_product_warehouse'))
                                                            <option value="{{Session::get('id_product_warehouse')->id}}">{{Session::get('id_product_warehouse')->name_product}}</option>
                                                            @foreach($product as $products)
                                                                @if(Session::get('id_product_warehouse')->id == $products->id)
                                                                    @continue
                                                                @else
                                                                    <option value="{{$products->id}}">{{$products->name_product}}</option>
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <option value="0">Chọn . . . </option>
                                                            @foreach($product as $products)
                                                                <option value="{{$products->id}}">{{$products->name_product}}</option>
                                                            @endforeach
                                                        @endif

                                                    </select>
                                                    <div class="invalid-feedback"> Please choose a username. </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustomUsername">Mã kho</label>
                                                <div class="input-group">
                                                    <select name="warehouse_product" class="form-control" id="id_warehouse">
                                                        @foreach($warehouse as $warehouses)
                                                            <option value="{{$warehouses->id}}" >WAREHOUSE-{{$warehouses->id}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback"> Please choose a username. </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">Số lượng khởi tạo</label>
                                                <input type="text" class="form-control" id="qty_khoi_tao" name="qty_khoi_tao"
                                                       onchange="update_qty_waerhouse(this.value + ',' + this.value)" required>
                                            </div>
                                            @if(Session::has('id_product_warehouse'))
                                                @foreach($unit as $units)
                                                    @if(Session::get('id_product_warehouse')->id_unit == $units->id)
                                                        <div class="col-md-1 mb-3">
                                                            <label for="validationCustom01">Đơn Vị</label>
                                                            <input type="text" class="form-control" id="unit_product" name="unit_product" value="{{$units->name_unit}}" required disabled>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Số lượng xuất kho</label>
                                                <input type="text" class="form-control" id="qty_xuat_kho" name="qty_xuat_kho" value="0" required disabled>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Số lượng nhập kho</label>
                                                <input type="text" class="form-control" id="qty_nhap_kho" name="qty_nhap_kho" value="0" required disabled>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">Số lượng tồn</label>
                                                <input type="text" class="form-control" id="qty_ton_kho" name="qty_ton_kho" required>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit"><i class="far fa-plus-square"></i> Thêm mới</button>

                                        <a style="margin-left: 10px" class="btn btn-primary" href="{{route('admin_home')}}"><i class="far fa-times-circle"></i> Thoát </a>
                                    </form>
                                </div> <!-- /.card-body -->
                            </div> <!-- /.card -->
                        </div> <!-- /.col -->
                        <div class="col-md-7 my-4">
                            <h2 class="h4 mb-1">Danh sách kho hàng</h2>
                            <p class="mb-3">Danh sách chỉ hiển thị với người dùng có quyền Admin</p>
                            <br>
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="toolbar">
                                        <form class="form">
                                            <div class="form-row">
                                                <div class="form-group col-auto mr-auto">
                                                    <label class="my-1 mr-2 sr-only" for="inlineFormCustomSelectPref1">Show</label>
                                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelectPref1">
                                                        <option value="">...</option>
                                                        <option value="1" selected>12</option>
                                                        <option value="2">32</option>
                                                        <option value="3">64</option>
                                                        <option value="3">128</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-auto">
                                                    <label for="search" class="sr-only">Search</label>
                                                    <input type="text" class="form-control" id="search1" value="" placeholder="Search">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- table -->
                                    <table class="table table-borderless table-hover">
                                        <thead>
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox">
                                                    <i class="fas fa-directions custom-control-label"></i>
                                                </div>
                                            </td>
                                            <th><strong>ID</strong></th>
                                            <th><strong>ĐỊA CHỈ</strong></th>
                                            <th class="w-25"><strong>MÔ TẢ</strong></th>
                                            <th><strong>NGÀY THÊM</strong></th>
                                            <th><strong>TÙY CHỌN</strong></th>
                                        </tr>
                                        </thead>
                                        <tbody>
{{--                                        @foreach($warehouses as $warehousess)--}}
{{--                                            <tr>--}}
{{--                                                <td>--}}
{{--                                                    <div class="custom-control custom-checkbox">--}}
{{--                                                        <input type="checkbox" class="custom-control-input" id="2474">--}}
{{--                                                        <label class="custom-control-label" for="2474"></label>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    IDS0{{$warehousess->id}}--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <p class="mb-0 text-muted"><a href="#" class="text-muted">{{$warehousess->address_warehouse}}</a></p>--}}
{{--                                                </td>--}}
{{--                                                <td class="w-25"><small class="text-muted"> {{trans($warehousess->description_warehouse)}}</small></td>--}}
{{--                                                <td class="text-muted"> {{date('d-m-Y', strtotime($warehousess->created_at))}}</td>--}}
{{--                                                <td>--}}
{{--                                                    <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                                    </button>--}}
{{--                                                    <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                                        <button type="button" class="dropdown-item btn mb-2 btn-outline-secondary" data-toggle="modal"  data-target="#edit_unit{{$warehousess->id}}" data-whatever="@mdo"><i class="fas fa-edit"></i> Chỉnh sửa</button>--}}
{{--                                                        <button type="button" class="dropdown-item btn mb-2 btn-outline-secondary" data-toggle="modal"  data-target="#delete_unit{{$warehousess->id}}" data-whatever="@mdo"><i class="fas fa-trash-alt"></i> Xóa</button>--}}
{{--                                                    </div>--}}
{{--                                                    --}}{{--                                                    xoa du lieu kho hang--}}
{{--                                                    <div class="modal fade" id="delete_unit{{$warehousess->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">--}}
{{--                                                        <div class="modal-dialog" role="document">--}}
{{--                                                            <div class="modal-content">--}}
{{--                                                                <div class="modal-header">--}}
{{--                                                                    <h5 class="modal-title" id="varyModalLabel">Thông báo</h5>--}}
{{--                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                                        <span aria-hidden="true">&times;</span>--}}
{{--                                                                    </button>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="modal-body">--}}
{{--                                                                    <form>--}}
{{--                                                                        <div class="form-group">--}}
{{--                                                                            <label for="recipient-name" class="col-form-label">Nếu bạn ấn xóa, tất cả dữ liệu liên quan sẽ bị xóa sạch và không thể phục hồi</label>--}}
{{--                                                                        </div>--}}
{{--                                                                    </form>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="modal-footer">--}}
{{--                                                                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Đóng</button>--}}
{{--                                                                    <a href="{{route('post_delete_warehouse',$warehousess->id)}}" style="background-color: red" type="button" class="btn mb-2 btn-primary">Xác nhận xóa</a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    --}}{{--                                                        Edit du lieu kho hang--}}
{{--                                                    <div class="modal fade" id="edit_unit{{$warehousess->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">--}}
{{--                                                        <div class="modal-dialog" role="document">--}}
{{--                                                            <div class="modal-content">--}}
{{--                                                                <div class="modal-header">--}}
{{--                                                                    <h5 class="modal-title" id="varyModalLabel">Cập nhật dữ liệu</h5>--}}
{{--                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                                        <span aria-hidden="true">&times;</span>--}}
{{--                                                                    </button>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="modal-body">--}}
{{--                                                                    <form action="" method="post">--}}
{{--                                                                        @csrf--}}
{{--                                                                        <div class="form-group mb-3">--}}
{{--                                                                            <label for="exampleInputEmail1">Tên kho</label>--}}
{{--                                                                            <input disabled type="text" class="form-control" id="" name="time_bonphan" value="{{$warehousess->id}}"  required>--}}
{{--                                                                        </div>--}}
{{--                                                                        <div class="form-group mb-3">--}}
{{--                                                                            <label for="exampleInputEmail1">Địa chỉ kho hàng</label>--}}
{{--                                                                            <input type="text" class="form-control" id="" name="time_bonphan" value="{{$warehousess->address_warehouse}}"  required>--}}
{{--                                                                        </div>--}}
{{--                                                                        <div class="form-group mb-3">--}}
{{--                                                                            <label for="exampleInputEmail1">Mô tả</label>--}}
{{--                                                                            <textarea class="form-control" id="validationTextarea" name="description_unit" required>{{$warehousess->description_warehouse}}</textarea>--}}
{{--                                                                        </div>--}}
{{--                                                                        <div class="modal-footer">--}}
{{--                                                                            <button type="submit" class="btn mb-2 btn-info">Cập nhật</button>--}}
{{--                                                                            <button type="button" class="btn mb-2 btn-primary" data-dismiss="modal">Đóng</button>--}}
{{--                                                                        </div>--}}
{{--                                                                    </form>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                        @endforeach--}}
                                        </tbody>
                                    </table>
                                    <nav aria-label="Table Paging" class="mb-0 text-muted">
                                        <ul class="pagination justify-content-center mb-0">
                                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                            <li class="page-item" active><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end section -->
                </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->

        @include('server_view.paner')
    </main> <!-- main -->
    <script>
        var msg = '{{Session::get('success_add_detail_warehouse')}}';
        var exist = '{{Session::has('success_add_detail_warehouse')}}';
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
        var msg = '{{Session::get('no_add_detail_warehouse')}}';
        var exist = '{{Session::has('no_add_detail_warehouse')}}';
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
                title: 'Đã tồn tại sản phẩm trong kho'
            })
        }
    </script>

    <script>
        function update_qty_waerhouse(e) {
            var ele = e.split(",");
            var ktra = document.getElementById('qty_khoi_tao').value;

            if(ktra >= 0 && ktra < 10000){
                document.getElementById('qty_ton_kho').value = ktra;
            }else{
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
                    title: 'Số lượng không hợp lệ'
                })
                document.getElementById('qty_khoi_tao').value = 0;
                document.getElementById('qty_ton_kho').value = 0;
            }
        }

    </script>
    <script>
        function update_pwarehouse(e) {
            var ele = e.split(",");
            var ktra = document.getElementById('idp').value;
                $.ajax({
                    method: "get",
                    url: '{{ route('getUpdateUnit') }}',
                    data: {_token: '{{ csrf_token() }}',
                        id: ele[0],
                        quantity: ktra},

                    success: function (result) {
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
                            title: 'Đã chọn sản phẩm'
                        });
                        window.setTimeout(function(){
                            window.location.reload();
                            return false;
                        } ,600);
                    }
                });
        }
    </script>
@endsection
