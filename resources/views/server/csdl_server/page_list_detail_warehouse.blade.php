<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="icons8-slack-64.png" style="color: yellow">
    <title>Quản lý kho hàng</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{asset('public/server/css/simplebar.css')}}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('public/server/css/feather.css')}}">
    <link rel="stylesheet" href="{{asset('public/server/css/dataTables.bootstrap4.css')}}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{asset('public/server/css/daterangepicker.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('public/server/css/app-light.css')}}" id="lightTheme" disabled>
    <link rel="stylesheet" href="{{asset('public/server/css/app-dark.css')}}" id="darkTheme">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://kit.fontawesome.com/12bbc8e57f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.all.min.js"></script>
</head>
<body class="vertical  dark  ">
<div class="wrapper">
    @include('server_view.header_admin')
    @include('server_view.taskbar_admin')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title text-center">QUẢN LÝ TỒN KHO</h2>

                    <div class="row my-4">
                        <!-- Small table -->

                        <div class="col-md-12">

                            <a href="{{route('post_detail_warehouse')}}" type="button" class="btn mb-2 btn-outline-secondary" style="background-color: #38d39f;
                                color: #ffffff;border-color: #38d39f">Cập nhật kho hàng</a>
                            <div class="card shadow">
                                <div class="card-body">
                                    <!-- table -->

                                    <table class="table datatables" id="dataTable-1">
                                        <thead>
                                        <tr>
                                            <th><strong>TÊN SẢN PHẨM</strong></th>
                                            <th><strong>TỒN ĐẦU</strong></th>
                                            <th><strong>NHẬP</strong></th>
                                            <th><strong>XUẤT</strong></th>
                                            <th><strong>TỒN KHO</strong></th>
                                            <th><strong>TRẠNG THÁI</strong></th>
                                            <th><strong>TÙY CHỌN</strong></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($warehouse as $warehouses)
                                            <tr>
                                                <td>
                                                    @foreach($product as $products)
                                                        @if($products->id == $warehouses->id_product)
                                                            @foreach($unit as $units)
                                                                @if($units->id == $products->id_unit )
                                                                    {{$products->name_product}}({{$units->name_unit}})
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    {{$warehouses->qty_opening_stock}}
                                                </td>
                                                <td>
                                                    {{$warehouses->qty_import_warehouse}}
                                                </td>
                                                <td>
                                                    {{$warehouses->qty_export_warehouse}}
                                                </td>
                                                <td>
                                                    {{$warehouses->inventory_warehouse}}
                                                </td>
                                                <td>
                                                    @if($warehouses->inventory_warehouse < 100)
                                                        <h6 style="color:red;">Cần nhập thêm</h6>
                                                    @else
                                                        <h6 ><i style="color:#34ce57;" class="fas fa-check-circle"></i></h6>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{--                                                    <a href="{{route('detail_diary',$products->id)}}" type="button" class="btn mb-2 btn-outline-secondary"> </a>--}}
                                                    <a href="" type="button" class="btn mb-2 btn-outline-secondary" data-toggle="modal" data-target="#update_warehouse{{$warehouses->id}}" data-whatever="@mdo"><i class="fas fa-edit"></i></a>
                                                    <div class="modal fade" id="update_warehouse{{$warehouses->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title " id="varyModalLabel">Cập nhật tồn kho</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('post_edit_warehouse',$warehouses->id)}}" method="post">
                                                                        @csrf
                                                                        <div class="form-group mb-3">
                                                                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                                                                            @foreach($product as $products)
                                                                                @if($products->id == $warehouses->id_product)
                                                                                    <input type="text" class="form-control" id="" name="name_product" value="{{$products->name_product}}" disabled>
                                                                                @endif
                                                                            @endforeach

                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            @foreach($product as $products)
                                                                                @if($products->id == $warehouses->id_product)
                                                                                    @foreach($unit as $units)
                                                                                        @if($units->id == $products->id_unit )
                                                                                            <label for="exampleInputEmail1">Tồn đầu({{$units->name_unit}})</label>
                                                                                        @endif
                                                                                    @endforeach
                                                                                @endif
                                                                            @endforeach
                                                                            <input type="text" class="form-control" id="" name="start_qty"  value="{{$warehouses->qty_opening_stock}}">
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            @foreach($product as $products)
                                                                                @if($products->id == $warehouses->id_product)
                                                                                    @foreach($unit as $units)
                                                                                        @if($units->id == $products->id_unit )
                                                                                            <label for="exampleInputEmail1">Nhập({{$units->name_unit}}) </label>
                                                                                        @endif
                                                                                    @endforeach
                                                                                @endif
                                                                            @endforeach
                                                                            <input type="text" class="form-control" id="" name="qty_import"  value="{{$warehouses->qty_import_warehouse}}" >
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
                                                    <button type="button" class="btn mb-2 btn-outline-secondary" data-toggle="modal" title="Xóa" data-target="#delete_warehouse{{$warehouses->id}}" data-whatever="@mdo"><i class="fas fa-trash-alt"></i></button>
                                                    <div class="modal fade" id="delete_warehouse{{$warehouses->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
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
                                                                            <label for="recipient-name" class="col-form-label">Nếu bạn ấn xóa, tất cả dữ liệu liên quan đến
                                                                                 tồn kho của sản phẩm sẽ biến mất và không thể khôi phục được nửa</label>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Đóng</button>
                                                                    <a href="{{route('post_delete_warehouse',$warehouses->id)}}" style="background-color: red" type="button" class="btn mb-2 btn-primary">Xác nhận xóa</a>
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
                        </div> <!-- simple table -->
                    </div> <!-- end section -->
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        @include('server_view.paner')
    </main> <!-- main -->
</div> <!-- .wrapper -->
<script src="{{asset('public/server/js/jquery.min.js')}}"></script>
<script src="{{asset('public/server/js/popper.min.js')}}"></script>
<script src="{{asset('public/server/js/moment.min.js')}}"></script>
<script src="{{asset('public/server/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/server/js/simplebar.min.js')}}"></script>
<script src='{{asset('public/server/js/daterangepicker.js')}}'></script>
<script src='{{asset('public/server/js/jquery.stickOnScroll.js')}}'></script>
<script src="{{asset('public/server/js/tinycolor-min.js')}}"></script>
<script src="{{asset('public/server/js/config.js')}}"></script>
<script src='{{asset('public/server/js/jquery.dataTables.min.js')}}'></script>
<script src='{{asset('public/server/js/dataTables.bootstrap4.min.js')}}'></script>
<script>
    $('#dataTable-1').DataTable(
        {
            autoWidth: true,
            "lengthMenu": [
                [6, 12, 24, -1],
                [6, 12, 24, "All"]
            ]
        });
</script>
<script src="{{asset('public/server/js/apps.js')}}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
{{--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>--}}
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag()
    {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
</script>
<script>
    var msg = '{{Session::get('success_delete_warehouse')}}';
    var exist = '{{Session::has('success_delete_warehouse')}}';
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
            title: 'Đã xóa'
        })
    }
</script>
<script>
    var msg = '{{Session::get('success_edit_warehouse')}}';
    var exist = '{{Session::has('success_edit_warehouse')}}';
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
            title: 'Đã cập nhật'
        })
    }
</script>
</body>
</html>
