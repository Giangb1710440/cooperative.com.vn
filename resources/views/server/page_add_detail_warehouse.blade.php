@extends('server_view.master_admin')
@section('title','Khỏi tạo kho hàng')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="page-title">Khởi tạo kho hàng</h2>
                    <p class="text-muted">Kho hàng sau khi được khỏi tạo có thể cung cấp các chức năng quản lý kho hàng cho người quản trị</p>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
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
                        <div class="col-md-1"></div>
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
