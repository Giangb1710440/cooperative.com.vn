<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Danh sách sản phẩm</title>
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
                    <h2 class="mb-2 page-title">Dữ liệu  sản phẩm</h2>
                    <p class="card-text">
                        Nếu muốn thêm mới sản phẩm hãy
                        <a href="" data-toggle="modal" data-target="#add_product" data-whatever="@mdo">nhấp vào đây</a>
                        <div class="modal fade" id="add_product" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="varyModalLabel">Thêm mới sản phẩm</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
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
                                                <label for="validationCustom02">Sale(%)</label>
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
                                            <div class="col-md-8 mb-3">
                                                <label for="validationCustom03">Trạng thái</label>
                                                <input type="text" class="form-control" name="status_product" id="validationCustom03" required>
                                                <div class="invalid-feedback"> Please provide a valid city. </div>
                                            </div>
                                            <div class="col-md-4 mb-4">
                                                <label for="validationCustom05">Hình ảnh</label>
                                                <input required type="file" class="form-control" id="validatedCustomFile" name="image[]" placeholder="images" multiple>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn mb-2 btn-info">Thêm mới</button>
                                            <button type="button" class="btn mb-2 btn-primary" data-dismiss="modal">Đóng</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </p>
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
                                            <th><strong>ID_PRODUCT</strong></th>
                                            <th><strong>Tên sản phẩm</strong></th>
                                            <th><strong>Giá nhập (VNĐ)</strong></th>
                                            <th><strong>Giá bán (VNĐ)</strong></th>
                                            <th><strong>Chiếc khấu (%)</strong></th>
                                            <th><strong>Tình trạng</strong></th>
                                            <th><strong>Tùy chọn</strong></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($product as $products)
                                            <tr>
                                                <td>
                                                    <i class="fas fa-paperclip"></i>
                                                </td>
                                                <style>
                                                    .dropdown {
                                                        position: relative;
                                                        display: inline-block;
                                                    }

                                                    .dropdown-content {
                                                        display: none;
                                                        position: absolute;
                                                        background-color: #f9f9f9;
                                                        min-width: 160px;
                                                        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                                                        z-index: 1;
                                                    }

                                                    .dropdown:hover .dropdown-content {
                                                        display: block;
                                                    }

                                                    .desc {
                                                        padding: 15px;
                                                        text-align: center;
                                                    }
                                                </style>
                                                <td>
                                                    <div class="dropdown">
                                                        PRODUCT0{{$products->id}}
                                                        <div class="dropdown-content">
                                                            @foreach((array)json_decode($products->image_product, true) as $image)
                                                                <img src="{{asset('public/server/DB_image/'.$image)}}" alt="Cinque Terre" width="300" height="200">
                                                                <div class="desc">{{$products->name_product}}</div>
                                                                @break
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <a href="" data-toggle="modal" data-target="#edit_namep{{$products->id}}" data-whatever="@mdo">{{$products->name_product}}</a>
                                                    <div class="modal fade" id="edit_namep{{$products->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="varyModalLabel">Chỉnh sửa tên sản phẩm</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('post_edit_product',[$products->id,1])}}" method="post">
                                                                        @csrf
                                                                        <div class="form-group mb-3">
                                                                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                                                                            <input type="text" class="form-control" id="" name="name_product"  placeholder="{{$products->name_product}}" required>
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

                                                <td>
                                                    <a href="" data-toggle="modal" data-target="#edit_gianhap{{$products->id}}" data-whatever="@mdo">{{$products->cost_price_product}}</a>
                                                    <div class="modal fade" id="edit_gianhap{{$products->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="varyModalLabel">Cập nhật giá nhập sản phẩm</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('post_edit_product',[$products->id,2])}}" method="post">
                                                                        @csrf
                                                                        <div class="form-group mb-3">
                                                                            <label for="exampleInputEmail1">Giá nhập sản phẩm</label>
                                                                            <input type="text" class="form-control" id="" name="cost_price"  placeholder="{{$products->cost_price_product}} VNĐ" required>
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

                                                <td>
                                                    <a href="" data-toggle="modal" data-target="#edit_giaban{{$products->id}}" data-whatever="@mdo">{{$products->sale_price_product}}</a>
                                                    <div class="modal fade" id="edit_giaban{{$products->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="varyModalLabel">Cập nhật giá sản phẩm bán ra</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('post_edit_product',[$products->id,3])}}" method="post">
                                                                        @csrf
                                                                        <div class="form-group mb-3">
                                                                            <label for="exampleInputEmail1">Giá nhập sản phẩm bán ra</label>
                                                                            <input type="text" class="form-control" id="" name="sale_price"  placeholder="{{$products->sale_price_product}} VNĐ" required>
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

                                                <td>
                                                    <a href="" data-toggle="modal" data-target="#edit_km{{$products->id}}" data-whatever="@mdo">{{$products->sale}}</a>
                                                    <div class="modal fade" id="edit_km{{$products->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="varyModalLabel">Cập nhật giá khuyến mãi</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('post_edit_product',[$products->id,4])}}" method="post">
                                                                        @csrf
                                                                        <div class="form-group mb-3">
                                                                            <label for="exampleInputEmail1">Phần trăm chiết khấu trên sản phẩm</label>
                                                                            <input type="text" class="form-control" id="" name="salep"  placeholder="{{$products->sale}} (%)" required>
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

                                                <td>
                                                    <a href="" data-toggle="modal" data-target="#edit_stt{{$products->id}}" data-whatever="@mdo">{{$products->status_product}}</a>
                                                    <div class="modal fade" id="edit_stt{{$products->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="varyModalLabel">Cập nhật tình trạng sản phẩm</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('post_edit_product',[$products->id,5])}}" method="post">
                                                                        @csrf
                                                                        <div class="form-group mb-3">
                                                                            <label for="exampleInputEmail1">Tình trạng sản phẩm</label>
                                                                            <input type="text" class="form-control" id="" name="stt_product"  placeholder="{{$products->status_product}}" required>
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

                                                <td>
{{--                                                    <a href="{{route('detail_diary',$products->id)}}" type="button" class="btn mb-2 btn-outline-secondary"> </a>--}}
                                                    <a href="" type="button" class="btn mb-2 btn-outline-secondary" data-toggle="modal" data-target="#eđit_product{{$products->id}}" data-whatever="@mdo"><i class="fas fa-edit"></i></a>
                                                    <div class="modal fade" id="eđit_product{{$products->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="varyModalLabel">Cập nhật sản phẩm</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('post_edit_product',[$products->id,0])}}" method="post">
                                                                        @csrf
                                                                        <div class="form-group mb-3">
                                                                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                                                                            <input type="text" class="form-control" id="" name="name_product"  placeholder="{{$products->name_product}}" required>
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label for="exampleInputEmail1">Giá nhập sản phẩm</label>
                                                                            <input type="text" class="form-control" id="" name="cost_price"  placeholder="{{$products->cost_price_product}} VNĐ" required>
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label for="exampleInputEmail1">Giá sản phẩm bán ra</label>
                                                                            <input type="text" class="form-control" id="" name="sale_price"  placeholder="{{$products->sale_price_product}} VNĐ" required>
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label for="exampleInputEmail1">Chiếc khấu sản phẩm</label>
                                                                            <input type="text" class="form-control" id="" name="sale"  placeholder="{{$products->sale}} %" required>
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label for="exampleInputEmail1">Tình trạng sản phẩm</label>
                                                                            <input type="text" class="form-control" id="" name="stt_product"  placeholder="{{$products->status_product}}" required>
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
                                                    <button type="button" class="btn mb-2 btn-outline-secondary" data-toggle="modal" title="Xóa" data-target="#varyModal{{$products->id}}" data-whatever="@mdo"><i class="fas fa-trash-alt"></i></button>
                                                    <div class="modal fade" id="varyModal{{$products->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
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
                                                                            <label for="recipient-name" class="col-form-label">Nếu bạn ấn xóa, tất cả dữ liệu liên quan đến sản phẩm
                                                                                sẽ biến mất và không thể khôi phục được nửa</label>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Đóng</button>

                                                                    <a href="{{route('post_delete_product',$products->id)}}" style="background-color: red" type="button" class="btn mb-2 btn-primary">Xác nhận xóa</a>
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

        <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="list-group list-group-flush my-n3">
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-box fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Package has uploaded successfull</strong></small>
                                        <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                                        <small class="badge badge-pill badge-light text-muted">1m ago</small>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-download fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Widgets are updated successfull</strong></small>
                                        <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                                        <small class="badge badge-pill badge-light text-muted">2m ago</small>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-inbox fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Notifications have been sent</strong></small>
                                        <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                                        <small class="badge badge-pill badge-light text-muted">30m ago</small>
                                    </div>
                                </div> <!-- / .row -->
                            </div>
                            <div class="list-group-item bg-transparent">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="fe fe-link fe-24"></span>
                                    </div>
                                    <div class="col">
                                        <small><strong>Link was attached to menu</strong></small>
                                        <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                                        <small class="badge badge-pill badge-light text-muted">1h ago</small>
                                    </div>
                                </div>
                            </div> <!-- / .row -->
                        </div> <!-- / .list-group -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body px-5">
                        <div class="row align-items-center">
                            <div class="col-6 text-center">
                                <div class="squircle bg-success justify-content-center">
                                    <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Control area</p>
                            </div>
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Activity</p>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Droplet</p>
                            </div>
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Upload</p>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-users fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Users</p>
                            </div>
                            <div class="col-6 text-center">
                                <div class="squircle bg-primary justify-content-center">
                                    <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                                </div>
                                <p>Settings</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                [16, 32, 64, -1],
                [16, 32, 64, "All"]
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
</body>
</html>
