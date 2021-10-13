@extends('server_view.master_admin')
@section('title','Danh sách loại đơn hàng')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">
                        <!-- Small table -->
                        <div class="col-md-12 my-4">
                            <h2 class="h4 mb-1">Danh sách loại đơn hàng</h2>
                            <p class="mb-3">Danh sách chỉ hiển thị với người dùng có quyền Admin</p>
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
                                                    <label for="search" class="sr-only">Tìm kiếm</label>
                                                    <input type="text" class="form-control" id="search1" value="" placeholder="Tìm kiêm">
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
                                            <th>ID</th>
                                            <th>TÊN LOẠI ĐƠN HÀNG</th>
                                            <th class="w-25">MÔ TẢ</th>
                                            <th>NGÀY THÊM</th>
                                            <th>TÙY CHỌN</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($list_order_caterogy as $list_order_caterogys)
                                            <tr>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="2474">
                                                        <label class="custom-control-label" for="2474"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="avatar avatar-md">
                                                        IDIC0{{$list_order_caterogys->id}}
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="mb-0 text-muted"><strong>{{ucwords($list_order_caterogys->name_cate_order)}}</strong></p>
                                                </td>
                                                <td class="w-25"><small class="text-muted">{{trans($list_order_caterogys->description_cate_order)}}.</small></td>
                                                {{--                                                ham lay ngay thang trong laravel
                                                --}}
                                                <td class="text-muted">{{date('d-m-Y', strtotime($list_invoice_cates->created_at))}}</td>
                                                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="#">Edit</a>
                                                        <a class="dropdown-item" href="#">Remove</a>
                                                        <a class="dropdown-item" href="#">Assign</a>
                                                    </div>
                                                </td>
                                            </tr>
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
@endsection
