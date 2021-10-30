<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="icons8-slack-64.png" style="color: yellow">
    <title>Quản lý đơn hàng</title>
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
    <link rel="stylesheet" href="{{asset('public/server/css/app-light.css')}}" id="lightTheme">
{{--    <link rel="stylesheet" href="{{asset('public/server/css/app-dark.css')}}" id="darkTheme">--}}
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://kit.fontawesome.com/12bbc8e57f.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.2/dist/sweetalert2.all.min.js"></script>
</head>
<body class="vertical  light  ">
<div class="wrapper">
    @include('server_view.header_admin')

    @include('server_view.taskbar_admin')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title text-center"><strong>Quản Lý Đơn Hàng</strong></h2>
                    <div class="row">
                        <ul style="margin-left: 20px" class="nav nav-tabs mb-4" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#all_order" role="tab" aria-controls="home" aria-selected="true">Tất cả đơn hàng</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#status0" role="tab" aria-controls="contact" aria-selected="false">Đơn hàng cần duyệt</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#status1" role="tab" aria-controls="contact" aria-selected="false">Đơn hàng đã duyệt</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#status2" role="tab" aria-controls="contact" aria-selected="false">Đơn hàng đã hoàn thành</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#status_1" role="tab" aria-controls="contact" aria-selected="false">Đơn hàng đã hủy</a>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane active" id="all_order" role="tabpanel">
                            <div class="row my-4">
                        <!-- Small table -->
                                <div class="col-md-12">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <!-- table -->
                                            <table class="table datatables" id="dataTable-1">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th><strong>Mã đơn hàng</strong></th>
                                                    <th><strong>Tên khách hàng</strong></th>
                                                    <th><strong>Tổng tiền (VNĐ)</strong></th>
        {{--                                            <th><strong>Ghi chú</strong></th>--}}
                                                    <th><strong>Thanh toán</strong></th>
                                                    <th><strong>Trạng thái</strong></th>
                                                    <th><strong>Cập nhật</strong></th>

                                                    <th><strong>Tùy chọn</strong></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($order as $orders)
                                                    <tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474" href="#collap-{{$orders->id}}">
                                                        <td>
                                                            <i class="fas fa-paperclip"></i>
                                                        </td>

                                                        <td>
                                                            ORDER{{$orders->id}}
                                                        </td>
                                                        <td>
                                                            @foreach($user as $users)
                                                                @if($users->id == $orders->id_user )
                                                                    <a href="">{{$users->name_user}}</a>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            {{number_format($orders->total_price_order)}}
                                                        </td>

        {{--                                                <td>--}}
        {{--                                                    {{$orders->note_order}}--}}
        {{--                                                </td>--}}
                                                        <td>
                                                            @if($orders->status_checkout == 0)
                                                                Chưa thanh toán
                                                            @elseif($orders->status_checkout == 1)
                                                                <h6 style="color:#34ce57;">Đã thanh toán</h6>
                                                            @elseif($orders->status_checkout == 2)
                                                                Đã hoàn tiền
                                                            @endif
                                                        </td>

                                                        <td>
                                                            @if($orders->status_order == 0)
                                                                Chờ xác nhận
                                                            @elseif($orders->status_order == 1)
                                                                <h6 style="color:cornflowerblue;">Đã nhận đơn</h6>
                                                            @elseif($orders->status_order == 2)
                                                                <h6 style="color:#34ce57;">Đã giao hàng</h6>
                                                            @elseif($orders->status_order == -1)
                                                                <h6 style="color:red;">Đã hủy đơn</h6>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($orders->status_order == 0)
                                                                <button style="background-color: #6c757d">
                                                                    <a style="color: white " type="button" href="{{route('getUpdate_status_order',$orders->id)}}">Xác nhận đơn</a>
                                                                </button>
        {{--                                                        <a style="color: white " type="button" href="{{route('getUpdate_status_order',$orders->id)}}">Xác nhận đơn</a>--}}
                                                                <input type="hidden" name="status_order_detail" id="status_order_detail" value="{{$orders->id}}">
                                                            @elseif($orders->status_order == 1)
                                                                <button style="background-color: #34ce57">
                                                                    <a style="color: white " type="button" href="{{route('getUpdate_status_order',$orders->id)}}">Xác nhận giao hàng</a>
                                                                </button>
        {{--                                                        <a style="color: #34ce57 " type="button" href="{{route('getUpdate_status_order',$orders->id)}}">Đã giao hàng</a>--}}
                                                                <input type="hidden" name="status_order_detail" id="status_order_detail" value="{{$orders->id}}">
                                                            @elseif($orders->status_order == 2)
                                                                <i style="color: #2bbb8b" class="fas fa-check-circle"></i>
                                                            @elseif($orders->status_order == -1)
                                                                <i style="color: red" class="fas fa-times"></i>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            {{--                                                    <a href="{{route('detail_diary',$products->id)}}" type="button" class="btn mb-2 btn-outline-secondary"> </a>--}}
                                                            <a href="" type="button" class="btn mb-2 btn-outline-secondary" data-toggle="modal" data-target="#all_order{{$orders->id}}" data-whatever="@mdo"><i class="fas fa-print"></i></a>
                                                            <div class="modal fade" id="all_order{{$orders->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                            <div class="card shadow">
                                                                                <div class="card-body p-5">
                                                                                    <div class="row mb-12">
                                                                                        <div class="col-12 text-center mb-4">
                                                                                            <img width="250px" height="100px" src="{{asset('public/server/assets/avatars/GosCooperative.png')}}" class="" alt="...">
                                                                                            <h2 class="mb-0 text-uppercase">Hóa đơn bán hàng</h2>
                                                                                            <p class="text-muted"> Gos - Cooperative<br /> 13/10/2021 </p>
                                                                                        </div>

                                                                                        <div class="col-md-7" style="padding-left: 20px">
                                                                                            <p style="margin-left: 40px" class="small text-muted text-uppercase mb-2">Đơn vị bán hàng</p>
                                                                                            <p style="margin-left: 40px" class="mb-4">
                                                                                                <strong>Gos - Cooperative</strong><br /> Hợp tác xã nông nghiệp<br /> 225/27,30/4, Ninh Kiều, Cần Thơ<br /> 0939337416<br />
                                                                                            </p>
                                                                                            <p style="margin-left: 40px">
                                                                                                <span class="small text-muted text-uppercase">Mã hóa đơn: #{{$orders->id}}</span><br />
                                                                                            </p>
                                                                                        </div>
                                                                                        <div class="col-md-5" style="padding-left: 50px">
                                                                                            <p class="small text-muted text-uppercase mb-2">Khách hàng</p>
                                                                                            <p class="mb-4">
                                                                                                @foreach($user as $users)
                                                                                                    @if($users->id == $orders->id_user )
                                                                                                        <strong>{{$users->name_user}}</strong><br />
                                                                                                {{$users->address_user}}<br /> {{$users->email}}<br /> {{$users->phone_user}}<br />
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            </p>
                                                                                            <p>
                                                                                                <small class="small text-muted text-uppercase">Ngày đặt hàng</small><br />
                                                                                                <strong>{{date('d-m-Y', strtotime($orders->created_at))}} </strong>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div> <!-- /.row -->
                                                                                    <table class="table table-borderless table-striped">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th scope="col">#</th>
                                                                                            <th width="130px" scope="col">Sản phẩm</th>
                                                                                            <th scope="col" class="text-right">Đơn giá(VNĐ)</th>
                                                                                            <th scope="col" class="text-right">Số lượng</th>
                                                                                            <th scope="col" class="text-right">Thành tiền</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        @php($key=0)
                                                                                        @foreach($detail_order as $detail_orders)
                                                                                            <tr>
                                                                                                @if($detail_orders ->id_order ==$orders->id)
                                                                                                    <th scope="row">{{++$key}}</th>
                                                                                                    <td width="130px">
                                                                                                        @foreach($product as $products)
                                                                                                            @if($products->id ==$detail_orders->id_product )
                                                                                                                {{$products->name_product}}
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                    </td>
                                                                                                    <td class="text-right">{{number_format($detail_orders->unit_price_order)}}</td>
                                                                                                    @foreach($product as $products)
                                                                                                        @if($products->id ==$detail_orders->id_product )
                                                                                                            @foreach($unit as $units)
                                                                                                                @if($units->id == $products->id_unit  )
                                                                                                                    <td class="text-right">{{$detail_orders->quality_order}}{{strtoupper($units->name_unit)}}</td>
                                                                                                                @endif
                                                                                                            @endforeach
                                                                                                        @endif
                                                                                                    @endforeach
                                                                                                    <td class="text-right">{{number_format($detail_orders->unit_price_order*$detail_orders->quality_order*((100-$detail_orders->discount_order_detail)/100))}} (-{{$detail_orders->discount_order_detail}}%)</td>
                                                                                                @endif
                                                                                            </tr>
                                                                                        @endforeach

                                                                                        </tbody>
                                                                                    </table>
                                                                                    <div class="row mt-5">
                                                                                        <div class="col-2 text-center">

                                                                                        </div>
                                                                                        <div class="col-md-5">
                                                                                            <img style="width: 50px;height: 50px" src="{{asset('public/server/assets/images/qrcode.svg')}}" class="navbar-brand-img brand-sm mx-auto my-4" alt="...">
                                                                                        </div>
                                                                                        <div class="col-md-5">
                                                                                            <div class="text-right mr-2">
                                                                                                <p class="mb-2 h6">
                                                                                                    <span class="text-muted">Tạm tính : </span>
                                                                                                    <strong>{{number_format($orders->total_price_order)}} VNĐ</strong>
                                                                                                </p>
                                                                                                <p class="mb-2 h6">
                                                                                                    <span class="text-muted">VAT (0%) : </span>
                                                                                                    <strong>0</strong>
                                                                                                </p>
                                                                                                <p class="mb-2 h6">
                                                                                                    <span class="text-muted">Tổng tiền : </span>
                                                                                                    <span>{{number_format($orders->total_price_order)}} VNĐ</span>
                                                                                                </p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> <!-- /.row -->
                                                                                </div> <!-- /.card-body -->
                                                                            </div> <!-- /.card -->
                                                                        <div class="row align-items-center mb-4">
                                                                            <div class="col">

                                                                            </div>
                                                                            <div style="margin-right: 40px" class="col-auto">

                                                                                <button type="button" class="btn btn-secondary">In hóa đơn</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @if($orders->status_order == 0)
                                                                <button style="background-color: red;color: white" type="button" class="btn mb-2 btn-outline-secondary" data-toggle="modal" title="Xóa" data-target="#all_order_delete{{$orders->id}}" data-whatever="@mdo">Hủy</button>
                                                                <div class="modal fade" id="all_order_delete{{$orders->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
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
                                                                                        <label for="recipient-name" class="col-form-label">Đồng ý hủy đơn hàng ORDER{{$orders->id}}</label>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Đóng</button>

                                                                                <a href="{{route('post_delete_order',$orders->id)}}" style="background-color: red" type="button" class="btn mb-2 btn-primary">Hủy đơn</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> <!-- simple table -->
                            </div> <!-- end section -->
                        </div>
                        <div class="tab-pane" id="status0" role="tabpanel">
                            <div class="row my-4">
                                <!-- Small table -->
                                <div class="col-md-12">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <!-- table -->
                                            <table class="table datatables" id="dataTable-2">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th><strong>Mã đơn hàng</strong></th>
                                                    <th><strong>Tên khách hàng</strong></th>
                                                    <th><strong>Tổng tiền (VNĐ)</strong></th>
                                                    {{--                                            <th><strong>Ghi chú</strong></th>--}}
                                                    <th><strong>Thanh toán</strong></th>
                                                    <th><strong>Trạng thái</strong></th>
                                                    <th><strong>Cập nhật</strong></th>

                                                    <th><strong>Tùy chọn</strong></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($order as $orders)
                                                    @if($orders->status_order == 0)
                                                        <tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474" href="#collap-{{$orders->id}}">
                                                            <td>
                                                                <i class="fas fa-paperclip"></i>
                                                            </td>

                                                            <td>
                                                                ORDER{{$orders->id}}
                                                            </td>
                                                            <td>
                                                                @foreach($user as $users)
                                                                    @if($users->id == $orders->id_user )
                                                                        <a href="">{{$users->name_user}}</a>
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                {{number_format($orders->total_price_order)}}
                                                            </td>
                                                            <td>
                                                                @if($orders->status_checkout == 0)
                                                                    Chưa thanh toán
                                                                @elseif($orders->status_checkout == 1)
                                                                    <h6 style="color:#34ce57;">Đã thanh toán</h6>
                                                                @elseif($orders->status_checkout == 2)
                                                                    Đã hoàn tiền
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if($orders->status_order == 0)
                                                                    Chờ xác nhận
                                                                @elseif($orders->status_order == 1)
                                                                    <h6 style="color:cornflowerblue;">Đã nhận đơn</h6>
                                                                @elseif($orders->status_order == 2)
                                                                    <h6 style="color:#34ce57;">Đã giao hàng</h6>
                                                                @elseif($orders->status_order == -1)
                                                                    <h6 style="color:red;">Đã hủy đơn</h6>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($orders->status_order == 0)
                                                                    <button style="background-color: #6c757d">
                                                                        <a style="color: white " type="button" href="{{route('getUpdate_status_order',$orders->id)}}">Xác nhận đơn</a>
                                                                    </button>
                                                                    {{--                                                        <a style="color: white " type="button" href="{{route('getUpdate_status_order',$orders->id)}}">Xác nhận đơn</a>--}}
                                                                    <input type="hidden" name="status_order_detail" id="status_order_detail" value="{{$orders->id}}">
                                                                @elseif($orders->status_order == 1)
                                                                    <button style="background-color: #34ce57">
                                                                        <a style="color: white " type="button" href="{{route('getUpdate_status_order',$orders->id)}}">Xác nhận giao hàng</a>
                                                                    </button>
                                                                    {{--                                                        <a style="color: #34ce57 " type="button" href="{{route('getUpdate_status_order',$orders->id)}}">Đã giao hàng</a>--}}
                                                                    <input type="hidden" name="status_order_detail" id="status_order_detail" value="{{$orders->id}}">
                                                                @elseif($orders->status_order == 2)
                                                                    <i style="color: #2bbb8b" class="fas fa-check-circle"></i>
                                                                @elseif($orders->status_order == -1)
                                                                    <i style="color: red" class="fas fa-times"></i>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                {{--                                                    <a href="{{route('detail_diary',$products->id)}}" type="button" class="btn mb-2 btn-outline-secondary"> </a>--}}
                                                                <a href="" type="button" class="btn mb-2 btn-outline-secondary" data-toggle="modal" data-target="#status0{{$orders->id}}" data-whatever="@mdo"><i class="fas fa-print"></i></a>
                                                                <div class="modal fade" id="status0{{$orders->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="card shadow">
                                                                                <div class="card-body p-5">
                                                                                    <div class="row mb-12">
                                                                                        <div class="col-12 text-center mb-4">
                                                                                            <img width="250px" height="100px" src="{{asset('public/server/assets/avatars/GosCooperative.png')}}" class="" alt="...">
                                                                                            <h2 class="mb-0 text-uppercase">Hóa đơn bán hàng</h2>
                                                                                            <p class="text-muted"> Gos - Cooperative<br /> 13/10/2021 </p>
                                                                                        </div>

                                                                                        <div class="col-md-7" style="padding-left: 20px">
                                                                                            <p style="margin-left: 40px" class="small text-muted text-uppercase mb-2">Đơn vị bán hàng</p>
                                                                                            <p style="margin-left: 40px" class="mb-4">
                                                                                                <strong>Gos - Cooperative</strong><br /> Hợp tác xã nông nghiệp<br /> 225/27,30/4, Ninh Kiều, Cần Thơ<br /> 0939337416<br />
                                                                                            </p>
                                                                                            <p style="margin-left: 40px">
                                                                                                <span class="small text-muted text-uppercase">Mã hóa đơn: #{{$orders->id}}</span><br />
                                                                                            </p>
                                                                                        </div>
                                                                                        <div class="col-md-5" style="padding-left: 50px">
                                                                                            <p class="small text-muted text-uppercase mb-2">Khách hàng</p>
                                                                                            <p class="mb-4">
                                                                                                @foreach($user as $users)
                                                                                                    @if($users->id == $orders->id_user )
                                                                                                        <strong>{{$users->name_user}}</strong><br />
                                                                                                        {{$users->address_user}}<br /> {{$users->email}}<br /> {{$users->phone_user}}<br />
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            </p>
                                                                                            <p>
                                                                                                <small class="small text-muted text-uppercase">Ngày đặt hàng</small><br />
                                                                                                <strong>{{date('d-m-Y', strtotime($orders->created_at))}} </strong>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div> <!-- /.row -->
                                                                                    <table class="table table-borderless table-striped">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th scope="col">#</th>
                                                                                            <th width="130px" scope="col">Sản phẩm</th>
                                                                                            <th scope="col" class="text-right">Đơn giá(VNĐ)</th>
                                                                                            <th scope="col" class="text-right">Số lượng</th>
                                                                                            <th scope="col" class="text-right">Thành tiền</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        @php($key=0)
                                                                                        @foreach($detail_order as $detail_orders)
                                                                                            <tr>
                                                                                                @if($detail_orders ->id_order ==$orders->id)
                                                                                                    <th scope="row">{{++$key}}</th>
                                                                                                    <td width="130px">
                                                                                                        @foreach($product as $products)
                                                                                                            @if($products->id ==$detail_orders->id_product )
                                                                                                                {{$products->name_product}}
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                    </td>
                                                                                                    <td class="text-right">{{number_format($detail_orders->unit_price_order)}}</td>
                                                                                                    @foreach($product as $products)
                                                                                                        @if($products->id ==$detail_orders->id_product )
                                                                                                            @foreach($unit as $units)
                                                                                                                @if($units->id == $products->id_unit  )
                                                                                                                    <td class="text-right">{{$detail_orders->quality_order}}{{strtoupper($units->name_unit)}}</td>
                                                                                                                @endif
                                                                                                            @endforeach
                                                                                                        @endif
                                                                                                    @endforeach
                                                                                                    <td class="text-right">{{number_format($detail_orders->unit_price_order*$detail_orders->quality_order*((100-$detail_orders->discount_order_detail)/100))}} (-{{$detail_orders->discount_order_detail}}%)</td>
                                                                                                @endif
                                                                                            </tr>
                                                                                        @endforeach

                                                                                        </tbody>
                                                                                    </table>
                                                                                    <div class="row mt-5">
                                                                                        <div class="col-2 text-center">

                                                                                        </div>
                                                                                        <div class="col-md-5">
                                                                                            <img style="width: 50px;height: 50px" src="{{asset('public/server/assets/images/qrcode.svg')}}" class="navbar-brand-img brand-sm mx-auto my-4" alt="...">
                                                                                        </div>
                                                                                        <div class="col-md-5">
                                                                                            <div class="text-right mr-2">
                                                                                                <p class="mb-2 h6">
                                                                                                    <span class="text-muted">Tạm tính : </span>
                                                                                                    <strong>{{number_format($orders->total_price_order)}} VNĐ</strong>
                                                                                                </p>
                                                                                                <p class="mb-2 h6">
                                                                                                    <span class="text-muted">VAT (0%) : </span>
                                                                                                    <strong>0</strong>
                                                                                                </p>
                                                                                                <p class="mb-2 h6">
                                                                                                    <span class="text-muted">Tổng tiền : </span>
                                                                                                    <span>{{number_format($orders->total_price_order)}} VNĐ</span>
                                                                                                </p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> <!-- /.row -->
                                                                                </div> <!-- /.card-body -->
                                                                            </div> <!-- /.card -->
                                                                            <div class="row align-items-center mb-4">
                                                                                <div class="col">

                                                                                </div>
                                                                                <div style="margin-right: 40px" class="col-auto">

                                                                                    <button type="button" class="btn btn-secondary">In hóa đơn</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @if($orders->status_order == 0)
                                                                    <button style="background-color: red;color: white" type="button" class="btn mb-2 btn-outline-secondary" data-toggle="modal" title="Xóa" data-target="#status0_delete{{$orders->id}}" data-whatever="@mdo">Hủy</button>
                                                                    <div class="modal fade" id="status0_delete{{$orders->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
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
                                                                                            <label for="recipient-name" class="col-form-label">Đồng ý hủy đơn hàng ORDER{{$orders->id}}</label>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Đóng</button>

                                                                                    <a href="{{route('post_delete_order',$orders->id)}}" style="background-color: red" type="button" class="btn mb-2 btn-primary">Hủy đơn</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> <!-- simple table -->
                            </div> <!-- end section -->
                        </div>
                        <div class="tab-pane" id="status1" role="tabpanel">
                            <div class="row my-4">
                                <!-- Small table -->
                                <div class="col-md-12">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <!-- table -->
                                            <table class="table datatables" id="dataTable-3">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th><strong>Mã đơn hàng</strong></th>
                                                    <th><strong>Tên khách hàng</strong></th>
                                                    <th><strong>Tổng tiền (VNĐ)</strong></th>
                                                    {{--                                            <th><strong>Ghi chú</strong></th>--}}
                                                    <th><strong>Thanh toán</strong></th>
                                                    <th><strong>Trạng thái</strong></th>
                                                    <th><strong>Cập nhật</strong></th>

                                                    <th><strong>Tùy chọn</strong></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($order as $orders)
                                                    @if($orders->status_order == 1)
                                                        <tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474" href="#collap-{{$orders->id}}">
                                                            <td>
                                                                <i class="fas fa-paperclip"></i>
                                                            </td>

                                                            <td>
                                                                ORDER{{$orders->id}}
                                                            </td>
                                                            <td>
                                                                @foreach($user as $users)
                                                                    @if($users->id == $orders->id_user )
                                                                        <a href="">{{$users->name_user}}</a>
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                {{number_format($orders->total_price_order)}}
                                                            </td>

                                                            {{--                                                <td>--}}
                                                            {{--                                                    {{$orders->note_order}}--}}
                                                            {{--                                                </td>--}}
                                                            <td>
                                                                @if($orders->status_checkout == 0)
                                                                    Chưa thanh toán
                                                                @elseif($orders->status_checkout == 1)
                                                                    <h6 style="color:#34ce57;">Đã thanh toán</h6>
                                                                @elseif($orders->status_checkout == 2)
                                                                    Đã hoàn tiền
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if($orders->status_order == 0)
                                                                    Chờ xác nhận
                                                                @elseif($orders->status_order == 1)
                                                                    <h6 style="color:cornflowerblue;">Đã nhận đơn</h6>
                                                                @elseif($orders->status_order == 2)
                                                                    <h6 style="color:#34ce57;">Đã giao hàng</h6>
                                                                @elseif($orders->status_order == -1)
                                                                    <h6 style="color:red;">Đã hủy đơn</h6>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($orders->status_order == 0)
                                                                    <button style="background-color: #6c757d">
                                                                        <a style="color: white " type="button" href="{{route('getUpdate_status_order',$orders->id)}}">Xác nhận đơn</a>
                                                                    </button>
                                                                    {{--                                                        <a style="color: white " type="button" href="{{route('getUpdate_status_order',$orders->id)}}">Xác nhận đơn</a>--}}
                                                                    <input type="hidden" name="status_order_detail" id="status_order_detail" value="{{$orders->id}}">
                                                                @elseif($orders->status_order == 1)
                                                                    <button style="background-color: #34ce57">
                                                                        <a style="color: white " type="button" href="{{route('getUpdate_status_order',$orders->id)}}">Xác nhận giao hàng</a>
                                                                    </button>
                                                                    {{--                                                        <a style="color: #34ce57 " type="button" href="{{route('getUpdate_status_order',$orders->id)}}">Đã giao hàng</a>--}}
                                                                    <input type="hidden" name="status_order_detail" id="status_order_detail" value="{{$orders->id}}">
                                                                @elseif($orders->status_order == 2)
                                                                    <i style="color: #2bbb8b" class="fas fa-check-circle"></i>
                                                                @elseif($orders->status_order == -1)
                                                                    <i style="color: red" class="fas fa-times"></i>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                {{--                                                    <a href="{{route('detail_diary',$products->id)}}" type="button" class="btn mb-2 btn-outline-secondary"> </a>--}}
                                                                <a href="" type="button" class="btn mb-2 btn-outline-secondary" data-toggle="modal" data-target="#status1{{$orders->id}}" data-whatever="@mdo"><i class="fas fa-print"></i></a>
                                                                <div class="modal fade" id="status1{{$orders->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="card shadow">
                                                                                <div class="card-body p-5">
                                                                                    <div class="row mb-12">
                                                                                        <div class="col-12 text-center mb-4">
                                                                                            <img width="250px" height="100px" src="{{asset('public/server/assets/avatars/GosCooperative.png')}}" class="" alt="...">
                                                                                            <h2 class="mb-0 text-uppercase">Hóa đơn bán hàng</h2>
                                                                                            <p class="text-muted"> Gos - Cooperative<br /> 13/10/2021 </p>
                                                                                        </div>

                                                                                        <div class="col-md-7" style="padding-left: 20px">
                                                                                            <p style="margin-left: 40px" class="small text-muted text-uppercase mb-2">Đơn vị bán hàng</p>
                                                                                            <p style="margin-left: 40px" class="mb-4">
                                                                                                <strong>Gos - Cooperative</strong><br /> Hợp tác xã nông nghiệp<br /> 225/27,30/4, Ninh Kiều, Cần Thơ<br /> 0939337416<br />
                                                                                            </p>
                                                                                            <p style="margin-left: 40px">
                                                                                                <span class="small text-muted text-uppercase">Mã hóa đơn: #{{$orders->id}}</span><br />
                                                                                            </p>
                                                                                        </div>
                                                                                        <div class="col-md-5" style="padding-left: 50px">
                                                                                            <p class="small text-muted text-uppercase mb-2">Khách hàng</p>
                                                                                            <p class="mb-4">
                                                                                                @foreach($user as $users)
                                                                                                    @if($users->id == $orders->id_user )
                                                                                                        <strong>{{$users->name_user}}</strong><br />
                                                                                                        {{$users->address_user}}<br /> {{$users->email}}<br /> {{$users->phone_user}}<br />
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            </p>
                                                                                            <p>
                                                                                                <small class="small text-muted text-uppercase">Ngày đặt hàng</small><br />
                                                                                                <strong>{{date('d-m-Y', strtotime($orders->created_at))}} </strong>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div> <!-- /.row -->
                                                                                    <table class="table table-borderless table-striped">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th scope="col">#</th>
                                                                                            <th width="130px" scope="col">Sản phẩm</th>
                                                                                            <th scope="col" class="text-right">Đơn giá(VNĐ)</th>
                                                                                            <th scope="col" class="text-right">Số lượng</th>
                                                                                            <th scope="col" class="text-right">Thành tiền</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        @php($key=0)
                                                                                        @foreach($detail_order as $detail_orders)
                                                                                            <tr>
                                                                                                @if($detail_orders ->id_order ==$orders->id)
                                                                                                    <th scope="row">{{++$key}}</th>
                                                                                                    <td width="130px">
                                                                                                        @foreach($product as $products)
                                                                                                            @if($products->id ==$detail_orders->id_product )
                                                                                                                {{$products->name_product}}
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                    </td>
                                                                                                    <td class="text-right">{{number_format($detail_orders->unit_price_order)}}</td>
                                                                                                    @foreach($product as $products)
                                                                                                        @if($products->id ==$detail_orders->id_product )
                                                                                                            @foreach($unit as $units)
                                                                                                                @if($units->id == $products->id_unit  )
                                                                                                                    <td class="text-right">{{$detail_orders->quality_order}}{{strtoupper($units->name_unit)}}</td>
                                                                                                                @endif
                                                                                                            @endforeach
                                                                                                        @endif
                                                                                                    @endforeach
                                                                                                    <td class="text-right">{{number_format($detail_orders->unit_price_order*$detail_orders->quality_order*((100-$detail_orders->discount_order_detail)/100))}} (-{{$detail_orders->discount_order_detail}}%)</td>
                                                                                                @endif
                                                                                            </tr>
                                                                                        @endforeach

                                                                                        </tbody>
                                                                                    </table>
                                                                                    <div class="row mt-5">
                                                                                        <div class="col-2 text-center">

                                                                                        </div>
                                                                                        <div class="col-md-5">
                                                                                            <img style="width: 50px;height: 50px" src="{{asset('public/server/assets/images/qrcode.svg')}}" class="navbar-brand-img brand-sm mx-auto my-4" alt="...">
                                                                                        </div>
                                                                                        <div class="col-md-5">
                                                                                            <div class="text-right mr-2">
                                                                                                <p class="mb-2 h6">
                                                                                                    <span class="text-muted">Tạm tính : </span>
                                                                                                    <strong>{{number_format($orders->total_price_order)}} VNĐ</strong>
                                                                                                </p>
                                                                                                <p class="mb-2 h6">
                                                                                                    <span class="text-muted">VAT (0%) : </span>
                                                                                                    <strong>0</strong>
                                                                                                </p>
                                                                                                <p class="mb-2 h6">
                                                                                                    <span class="text-muted">Tổng tiền : </span>
                                                                                                    <span>{{number_format($orders->total_price_order)}} VNĐ</span>
                                                                                                </p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> <!-- /.row -->
                                                                                </div> <!-- /.card-body -->
                                                                            </div> <!-- /.card -->
                                                                            <div class="row align-items-center mb-4">
                                                                                <div class="col">

                                                                                </div>
                                                                                <div style="margin-right: 40px" class="col-auto">

                                                                                    <button type="button" class="btn btn-secondary">In hóa đơn</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @if($orders->status_order == 0)
                                                                    <button style="background-color: red;color: white" type="button" class="btn mb-2 btn-outline-secondary" data-toggle="modal" title="Xóa" data-target="#status1_delete{{$orders->id}}" data-whatever="@mdo">Hủy</button>
                                                                    <div class="modal fade" id="status1_delete{{$orders->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
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
                                                                                            <label for="recipient-name" class="col-form-label">Đồng ý hủy đơn hàng ORDER{{$orders->id}}</label>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Đóng</button>

                                                                                    <a href="{{route('post_delete_order',$orders->id)}}" style="background-color: red" type="button" class="btn mb-2 btn-primary">Hủy đơn</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> <!-- simple table -->
                            </div> <!-- end section -->
                        </div>
                        <div class="tab-pane" id="status2" role="tabpanel">
                            <div class="row my-4">
                                <!-- Small table -->
                                <div class="col-md-12">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <!-- table -->
                                            <table class="table datatables" id="dataTable-4">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th><strong>Mã đơn hàng</strong></th>
                                                    <th><strong>Tên khách hàng</strong></th>
                                                    <th><strong>Tổng tiền (VNĐ)</strong></th>
                                                    {{--                                            <th><strong>Ghi chú</strong></th>--}}
                                                    <th><strong>Thanh toán</strong></th>
                                                    <th><strong>Trạng thái</strong></th>
                                                    <th><strong>Cập nhật</strong></th>

                                                    <th><strong>Tùy chọn</strong></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($order as $orders)
                                                    @if($orders->status_order == 2)
                                                        <tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474" href="#collap-{{$orders->id}}">
                                                            <td>
                                                                <i class="fas fa-paperclip"></i>
                                                            </td>

                                                            <td>
                                                                ORDER{{$orders->id}}
                                                            </td>
                                                            <td>
                                                                @foreach($user as $users)
                                                                    @if($users->id == $orders->id_user )
                                                                        <a href="">{{$users->name_user}}</a>
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                {{number_format($orders->total_price_order)}}
                                                            </td>

                                                            {{--                                                <td>--}}
                                                            {{--                                                    {{$orders->note_order}}--}}
                                                            {{--                                                </td>--}}
                                                            <td>
                                                                @if($orders->status_checkout == 0)
                                                                    Chưa thanh toán
                                                                @elseif($orders->status_checkout == 1)
                                                                    <h6 style="color:#34ce57;">Đã thanh toán</h6>
                                                                @elseif($orders->status_checkout == 2)
                                                                    Đã hoàn tiền
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if($orders->status_order == 0)
                                                                    Chờ xác nhận
                                                                @elseif($orders->status_order == 1)
                                                                    <h6 style="color:cornflowerblue;">Đã nhận đơn</h6>
                                                                @elseif($orders->status_order == 2)
                                                                    <h6 style="color:#34ce57;">Đã giao hàng</h6>
                                                                @elseif($orders->status_order == -1)
                                                                    <h6 style="color:red;">Đã hủy đơn</h6>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($orders->status_order == 0)
                                                                    <button style="background-color: #6c757d">
                                                                        <a style="color: white " type="button" href="{{route('getUpdate_status_order',$orders->id)}}">Xác nhận đơn</a>
                                                                    </button>
                                                                    {{--                                                        <a style="color: white " type="button" href="{{route('getUpdate_status_order',$orders->id)}}">Xác nhận đơn</a>--}}
                                                                    <input type="hidden" name="status_order_detail" id="status_order_detail" value="{{$orders->id}}">
                                                                @elseif($orders->status_order == 1)
                                                                    <button style="background-color: #34ce57">
                                                                        <a style="color: white " type="button" href="{{route('getUpdate_status_order',$orders->id)}}">Xác nhận giao hàng</a>
                                                                    </button>
                                                                    {{--                                                        <a style="color: #34ce57 " type="button" href="{{route('getUpdate_status_order',$orders->id)}}">Đã giao hàng</a>--}}
                                                                    <input type="hidden" name="status_order_detail" id="status_order_detail" value="{{$orders->id}}">
                                                                @elseif($orders->status_order == 2)
                                                                    <i style="color: #2bbb8b" class="fas fa-check-circle"></i>
                                                                @elseif($orders->status_order == -1)
                                                                    <i style="color: red" class="fas fa-times"></i>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                {{--                                                    <a href="{{route('detail_diary',$products->id)}}" type="button" class="btn mb-2 btn-outline-secondary"> </a>--}}
                                                                <a href="" type="button" class="btn mb-2 btn-outline-secondary" data-toggle="modal" data-target="#status2{{$orders->id}}" data-whatever="@mdo"><i class="fas fa-print"></i></a>
                                                                <div class="modal fade" id="status2{{$orders->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="card shadow">
                                                                                <div class="card-body p-5">
                                                                                    <div class="row mb-12">
                                                                                        <div class="col-12 text-center mb-4">
                                                                                            <img width="250px" height="100px" src="{{asset('public/server/assets/avatars/GosCooperative.png')}}" class="" alt="...">
                                                                                            <h2 class="mb-0 text-uppercase">Hóa đơn bán hàng</h2>
                                                                                            <p class="text-muted"> Gos - Cooperative<br /> 13/10/2021 </p>
                                                                                        </div>

                                                                                        <div class="col-md-7" style="padding-left: 20px">
                                                                                            <p style="margin-left: 40px" class="small text-muted text-uppercase mb-2">Đơn vị bán hàng</p>
                                                                                            <p style="margin-left: 40px" class="mb-4">
                                                                                                <strong>Gos - Cooperative</strong><br /> Hợp tác xã nông nghiệp<br /> 225/27,30/4, Ninh Kiều, Cần Thơ<br /> 0939337416<br />
                                                                                            </p>
                                                                                            <p style="margin-left: 40px">
                                                                                                <span class="small text-muted text-uppercase">Mã hóa đơn: #{{$orders->id}}</span><br />
                                                                                            </p>
                                                                                        </div>
                                                                                        <div class="col-md-5" style="padding-left: 50px">
                                                                                            <p class="small text-muted text-uppercase mb-2">Khách hàng</p>
                                                                                            <p class="mb-4">
                                                                                                @foreach($user as $users)
                                                                                                    @if($users->id == $orders->id_user )
                                                                                                        <strong>{{$users->name_user}}</strong><br />
                                                                                                        {{$users->address_user}}<br /> {{$users->email}}<br /> {{$users->phone_user}}<br />
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            </p>
                                                                                            <p>
                                                                                                <small class="small text-muted text-uppercase">Ngày đặt hàng</small><br />
                                                                                                <strong>{{date('d-m-Y', strtotime($orders->created_at))}} </strong>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div> <!-- /.row -->
                                                                                    <table class="table table-borderless table-striped">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th scope="col">#</th>
                                                                                            <th width="130px" scope="col">Sản phẩm</th>
                                                                                            <th scope="col" class="text-right">Đơn giá(VNĐ)</th>
                                                                                            <th scope="col" class="text-right">Số lượng</th>
                                                                                            <th scope="col" class="text-right">Thành tiền</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        @php($key=0)
                                                                                        @foreach($detail_order as $detail_orders)
                                                                                            <tr>
                                                                                                @if($detail_orders ->id_order ==$orders->id)
                                                                                                    <th scope="row">{{++$key}}</th>
                                                                                                    <td width="130px">
                                                                                                        @foreach($product as $products)
                                                                                                            @if($products->id ==$detail_orders->id_product )
                                                                                                                {{$products->name_product}}
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                    </td>
                                                                                                    <td class="text-right">{{number_format($detail_orders->unit_price_order)}}</td>
                                                                                                    @foreach($product as $products)
                                                                                                        @if($products->id ==$detail_orders->id_product )
                                                                                                            @foreach($unit as $units)
                                                                                                                @if($units->id == $products->id_unit  )
                                                                                                                    <td class="text-right">{{$detail_orders->quality_order}}{{strtoupper($units->name_unit)}}</td>
                                                                                                                @endif
                                                                                                            @endforeach
                                                                                                        @endif
                                                                                                    @endforeach
                                                                                                    <td class="text-right">{{number_format($detail_orders->unit_price_order*$detail_orders->quality_order*((100-$detail_orders->discount_order_detail)/100))}} (-{{$detail_orders->discount_order_detail}}%)</td>
                                                                                                @endif
                                                                                            </tr>
                                                                                        @endforeach

                                                                                        </tbody>
                                                                                    </table>
                                                                                    <div class="row mt-5">
                                                                                        <div class="col-2 text-center">

                                                                                        </div>
                                                                                        <div class="col-md-5">
                                                                                            <img style="width: 50px;height: 50px" src="{{asset('public/server/assets/images/qrcode.svg')}}" class="navbar-brand-img brand-sm mx-auto my-4" alt="...">
                                                                                        </div>
                                                                                        <div class="col-md-5">
                                                                                            <div class="text-right mr-2">
                                                                                                <p class="mb-2 h6">
                                                                                                    <span class="text-muted">Tạm tính : </span>
                                                                                                    <strong>{{number_format($orders->total_price_order)}} VNĐ</strong>
                                                                                                </p>
                                                                                                <p class="mb-2 h6">
                                                                                                    <span class="text-muted">VAT (0%) : </span>
                                                                                                    <strong>0</strong>
                                                                                                </p>
                                                                                                <p class="mb-2 h6">
                                                                                                    <span class="text-muted">Tổng tiền : </span>
                                                                                                    <span>{{number_format($orders->total_price_order)}} VNĐ</span>
                                                                                                </p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> <!-- /.row -->
                                                                                </div> <!-- /.card-body -->
                                                                            </div> <!-- /.card -->
                                                                            <div class="row align-items-center mb-4">
                                                                                <div class="col">

                                                                                </div>
                                                                                <div style="margin-right: 40px" class="col-auto">

                                                                                    <button type="button" class="btn btn-secondary">In hóa đơn</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @if($orders->status_order == 0)
                                                                    <button style="background-color: red;color: white" type="button" class="btn mb-2 btn-outline-secondary" data-toggle="modal" title="Xóa" data-target="#status2_delete{{$orders->id}}" data-whatever="@mdo">Hủy</button>
                                                                    <div class="modal fade" id="status2_delete{{$orders->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
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
                                                                                            <label for="recipient-name" class="col-form-label">Đồng ý hủy đơn hàng ORDER{{$orders->id}}</label>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Đóng</button>

                                                                                    <a href="{{route('post_delete_order',$orders->id)}}" style="background-color: red" type="button" class="btn mb-2 btn-primary">Hủy đơn</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> <!-- simple table -->
                            </div> <!-- end section -->
                        </div>
                        <div class="tab-pane" id="status_1" role="tabpanel">
                            <div class="row my-4">
                                <!-- Small table -->
                                <div class="col-md-12">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <!-- table -->
                                            <table class="table datatables" id="dataTable-5">
                                                <thead>
                                                <tr>
                                                    <th></th>
                                                    <th><strong>Mã đơn hàng</strong></th>
                                                    <th><strong>Tên khách hàng</strong></th>
                                                    <th><strong>Tổng tiền (VNĐ)</strong></th>
                                                    {{--                                            <th><strong>Ghi chú</strong></th>--}}
                                                    <th><strong>Thanh toán</strong></th>
                                                    <th><strong>Trạng thái</strong></th>
                                                    <th><strong>Cập nhật</strong></th>

                                                    <th><strong>Tùy chọn</strong></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($order as $orders)
                                                    @if($orders->status_order == -1)
                                                        <tr class="accordion-toggle collapsed" id="c-2474" data-toggle="collapse" data-parent="#c-2474" href="#collap-{{$orders->id}}">
                                                            <td>
                                                                <i class="fas fa-paperclip"></i>
                                                            </td>

                                                            <td>
                                                                ORDER{{$orders->id}}
                                                            </td>
                                                            <td>
                                                                @foreach($user as $users)
                                                                    @if($users->id == $orders->id_user )
                                                                        <a href="">{{$users->name_user}}</a>
                                                                    @endif
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                {{number_format($orders->total_price_order)}}
                                                            </td>

                                                            {{--                                                <td>--}}
                                                            {{--                                                    {{$orders->note_order}}--}}
                                                            {{--                                                </td>--}}
                                                            <td>
                                                                @if($orders->status_checkout == 0)
                                                                    Chưa thanh toán
                                                                @elseif($orders->status_checkout == 1)
                                                                    <h6 style="color:#34ce57;">Đã thanh toán</h6>
                                                                @elseif($orders->status_checkout == 2)
                                                                    Đã hoàn tiền
                                                                @endif
                                                            </td>

                                                            <td>
                                                                @if($orders->status_order == 0)
                                                                    Chờ xác nhận
                                                                @elseif($orders->status_order == 1)
                                                                    <h6 style="color:cornflowerblue;">Đã nhận đơn</h6>
                                                                @elseif($orders->status_order == 2)
                                                                    <h6 style="color:#34ce57;">Đã giao hàng</h6>
                                                                @elseif($orders->status_order == -1)
                                                                    <h6 style="color:red;">Đã hủy đơn</h6>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($orders->status_order == 0)
                                                                    <button style="background-color: #6c757d">
                                                                        <a style="color: white " type="button" href="{{route('getUpdate_status_order',$orders->id)}}">Xác nhận đơn</a>
                                                                    </button>
                                                                    {{--                                                        <a style="color: white " type="button" href="{{route('getUpdate_status_order',$orders->id)}}">Xác nhận đơn</a>--}}
                                                                    <input type="hidden" name="status_order_detail" id="status_order_detail" value="{{$orders->id}}">
                                                                @elseif($orders->status_order == 1)
                                                                    <button style="background-color: #34ce57">
                                                                        <a style="color: white " type="button" href="{{route('getUpdate_status_order',$orders->id)}}">Xác nhận giao hàng</a>
                                                                    </button>
                                                                    {{--                                                        <a style="color: #34ce57 " type="button" href="{{route('getUpdate_status_order',$orders->id)}}">Đã giao hàng</a>--}}
                                                                    <input type="hidden" name="status_order_detail" id="status_order_detail" value="{{$orders->id}}">
                                                                @elseif($orders->status_order == 2)
                                                                    <i style="color: #2bbb8b" class="fas fa-check-circle"></i>
                                                                @elseif($orders->status_order == -1)
                                                                    <i style="color: red" class="fas fa-times"></i>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                {{--                                                    <a href="{{route('detail_diary',$products->id)}}" type="button" class="btn mb-2 btn-outline-secondary"> </a>--}}
                                                                <a href="" type="button" class="btn mb-2 btn-outline-secondary" data-toggle="modal" data-target="#status_1{{$orders->id}}" data-whatever="@mdo"><i class="fas fa-print"></i></a>
                                                                <div class="modal fade" id="status_1{{$orders->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="card shadow">
                                                                                <div class="card-body p-5">
                                                                                    <div class="row mb-12">
                                                                                        <div class="col-12 text-center mb-4">
                                                                                            <img width="250px" height="100px" src="{{asset('public/server/assets/avatars/GosCooperative.png')}}" class="" alt="...">
                                                                                            <h2 class="mb-0 text-uppercase">Hóa đơn bán hàng</h2>
                                                                                            <p class="text-muted"> Gos - Cooperative<br /> 13/10/2021 </p>
                                                                                        </div>

                                                                                        <div class="col-md-7" style="padding-left: 20px">
                                                                                            <p style="margin-left: 40px" class="small text-muted text-uppercase mb-2">Đơn vị bán hàng</p>
                                                                                            <p style="margin-left: 40px" class="mb-4">
                                                                                                <strong>Gos - Cooperative</strong><br /> Hợp tác xã nông nghiệp<br /> 225/27,30/4, Ninh Kiều, Cần Thơ<br /> 0939337416<br />
                                                                                            </p>
                                                                                            <p style="margin-left: 40px">
                                                                                                <span class="small text-muted text-uppercase">Mã hóa đơn: #{{$orders->id}}</span><br />
                                                                                            </p>
                                                                                        </div>
                                                                                        <div class="col-md-5" style="padding-left: 50px">
                                                                                            <p class="small text-muted text-uppercase mb-2">Khách hàng</p>
                                                                                            <p class="mb-4">
                                                                                                @foreach($user as $users)
                                                                                                    @if($users->id == $orders->id_user )
                                                                                                        <strong>{{$users->name_user}}</strong><br />
                                                                                                        {{$users->address_user}}<br /> {{$users->email}}<br /> {{$users->phone_user}}<br />
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            </p>
                                                                                            <p>
                                                                                                <small class="small text-muted text-uppercase">Ngày đặt hàng</small><br />
                                                                                                <strong>{{date('d-m-Y', strtotime($orders->created_at))}} </strong>
                                                                                            </p>
                                                                                        </div>
                                                                                    </div> <!-- /.row -->
                                                                                    <table class="table table-borderless table-striped">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th scope="col">#</th>
                                                                                            <th width="130px" scope="col">Sản phẩm</th>
                                                                                            <th scope="col" class="text-right">Đơn giá(VNĐ)</th>
                                                                                            <th scope="col" class="text-right">Số lượng</th>
                                                                                            <th scope="col" class="text-right">Thành tiền</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                        @php($key=0)
                                                                                        @foreach($detail_order as $detail_orders)
                                                                                            <tr>
                                                                                                @if($detail_orders ->id_order ==$orders->id)
                                                                                                    <th scope="row">{{++$key}}</th>
                                                                                                    <td width="130px">
                                                                                                        @foreach($product as $products)
                                                                                                            @if($products->id ==$detail_orders->id_product )
                                                                                                                {{$products->name_product}}
                                                                                                            @endif
                                                                                                        @endforeach
                                                                                                    </td>
                                                                                                    <td class="text-right">{{number_format($detail_orders->unit_price_order)}}</td>
                                                                                                    @foreach($product as $products)
                                                                                                        @if($products->id ==$detail_orders->id_product )
                                                                                                            @foreach($unit as $units)
                                                                                                                @if($units->id == $products->id_unit  )
                                                                                                                    <td class="text-right">{{$detail_orders->quality_order}}{{strtoupper($units->name_unit)}}</td>
                                                                                                                @endif
                                                                                                            @endforeach
                                                                                                        @endif
                                                                                                    @endforeach
                                                                                                    <td class="text-right">{{number_format($detail_orders->unit_price_order*$detail_orders->quality_order*((100-$detail_orders->discount_order_detail)/100))}} (-{{$detail_orders->discount_order_detail}}%)</td>
                                                                                                @endif
                                                                                            </tr>
                                                                                        @endforeach

                                                                                        </tbody>
                                                                                    </table>
                                                                                    <div class="row mt-5">
                                                                                        <div class="col-2 text-center">

                                                                                        </div>
                                                                                        <div class="col-md-5">
                                                                                            <img style="width: 50px;height: 50px" src="{{asset('public/server/assets/images/qrcode.svg')}}" class="navbar-brand-img brand-sm mx-auto my-4" alt="...">
                                                                                        </div>
                                                                                        <div class="col-md-5">
                                                                                            <div class="text-right mr-2">
                                                                                                <p class="mb-2 h6">
                                                                                                    <span class="text-muted">Tạm tính : </span>
                                                                                                    <strong>{{number_format($orders->total_price_order)}} VNĐ</strong>
                                                                                                </p>
                                                                                                <p class="mb-2 h6">
                                                                                                    <span class="text-muted">VAT (0%) : </span>
                                                                                                    <strong>0</strong>
                                                                                                </p>
                                                                                                <p class="mb-2 h6">
                                                                                                    <span class="text-muted">Tổng tiền : </span>
                                                                                                    <span>{{number_format($orders->total_price_order)}} VNĐ</span>
                                                                                                </p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div> <!-- /.row -->
                                                                                </div> <!-- /.card-body -->
                                                                            </div> <!-- /.card -->
                                                                            <div class="row align-items-center mb-4">
                                                                                <div class="col">

                                                                                </div>
                                                                                <div style="margin-right: 40px" class="col-auto">

                                                                                    <button type="button" class="btn btn-secondary">In hóa đơn</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @if($orders->status_order == 0)
                                                                    <button style="background-color: red;color: white" type="button" class="btn mb-2 btn-outline-secondary" data-toggle="modal" title="Xóa" data-target="#status_1_delete{{$orders->id}}" data-whatever="@mdo">Hủy</button>
                                                                    <div class="modal fade" id="status_1_delete{{$orders->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
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
                                                                                            <label for="recipient-name" class="col-form-label">Đồng ý hủy đơn hàng ORDER{{$orders->id}}</label>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Đóng</button>

                                                                                    <a href="{{route('post_delete_order',$orders->id)}}" style="background-color: red" type="button" class="btn mb-2 btn-primary">Hủy đơn</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> <!-- simple table -->
                            </div> <!-- end section -->
                        </div>
                    </div>

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
<script>
    $('#dataTable-2').DataTable(
        {
            autoWidth: true,
            "lengthMenu": [
                [6, 12, 24, -1],
                [6, 12, 24, "All"]
            ]
        });
</script>
<script>
    $('#dataTable-3').DataTable(
        {
            autoWidth: true,
            "lengthMenu": [
                [6, 12, 24, -1],
                [6, 12, 24, "All"]
            ]
        });
</script>
<script>
    $('#dataTable-4').DataTable(
        {
            autoWidth: true,
            "lengthMenu": [
                [6, 12, 24, -1],
                [6, 12, 24, "All"]
            ]
        });
</script>
<script>
    $('#dataTable-5').DataTable(
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
    var msg = '{{Session::get('success_edit_order')}}';
    var exist = '{{Session::has('success_edit_order')}}';
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
<script>
    var msg = '{{Session::get('no_add_product')}}';
    var exist = '{{Session::has('no_add_product')}}';
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
            title: 'Thêm không thành công'
        })
    }
</script>
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
            title: 'Thành công'
        })
    }
</script>
<script>
    var msg = '{{Session::get('success_delete_product')}}';
    var exist = '{{Session::has('success_delete_product')}}';
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
            title: 'Đã xóa sản phẩm ra khỏi CSDL'
        })
    }
</script>

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
    var msg = '{{Session::get('success_delete_order')}}';
    var exist = '{{Session::has('success_delete_order')}}';
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
            title: 'Đã hủy đơn'
        })
    }
</script>

</body>
</html>
