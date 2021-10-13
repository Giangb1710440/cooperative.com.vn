@extends('server_view.master_admin')
@section('title','Danh sách nhà cung cấp')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row">
                        <!-- Small table -->
                        <div class="col-md-12 my-4">
                            <h2 class="h4 mb-1">Danh sách chức vụ</h2>
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
                                            <th><strong>TÊN NHÀ CUNG CẤP</strong></th>
                                            <th><strong>EMAIL</strong></th>
                                            <th><strong>SỐ ĐIỆN THOẠI</strong></th>
                                            <th class="w-25"><strong>ĐỊA CHỈ</strong></th>
                                            <th><strong>NGÀY THÊM</strong></th>
                                            <th><strong>TÙY CHỌN</strong></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($supplier as $suppliers)
                                                <tr>
                                                    <td>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="2474">
                                                            <label class="custom-control-label" for="2474"></label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="avatar avatar-md">
                                                            IDS0{{$suppliers->id}}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0 text-muted"><strong>{{trans($suppliers->name_supplier)}}</strong></p>

                                                    </td>
                                                    <td>
                                                        <p class="mb-0 text-muted">{{$suppliers->email_supplier}}</p>
                                                    </td>
                                                    <td>
                                                        <p class="mb-0 text-muted"><a href="#" class="text-muted">{{$suppliers->phone_supplier}}</a></p>
                                                    </td>
                                                    <td class="w-25"><small class="text-muted"> {{trans($suppliers->address_supplier)}}</small></td>
                                                    <td class="text-muted"> {{date('d-m-Y', strtotime($suppliers->created_at))}}</td>
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
                                            <li class="page-item" active><a class="page-link" href="#">1</a></li>
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
