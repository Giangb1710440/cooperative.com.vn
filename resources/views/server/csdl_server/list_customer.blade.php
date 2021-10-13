@extends('server_view.master_admin')
@section('title','Danh sách khách hàng')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row align-items-center my-4">
                        <div class="col">
                            <h2 class="h3 mb-0 page-title">Danh sách khách hàng</h2>
                        </div>
                        <div class="col-auto">
                            <button type="button" class="btn btn-secondary"><span class="fe fe-trash fe-12 mr-2"></span>Thêm mới</button>
                            <button type="button" class="btn btn-primary"><span class="fe fe-filter fe-12 mr-2"></span>Lọc</button>
                        </div>
                    </div>
                    <!-- table -->
                    <div class="card shadow">
                        <div class="card-body">
                            <table class="table table-borderless table-hover">
                                <thead>
                                <tr>
                                    <th>
                                        <div class="custom-control custom-checkbox">
                                        </div>
                                    </th>
                                    <th>ID</th>
                                    <th>HỌ TÊN KHÁCH HÀNG</th>
                                    <th>EMAIL</th>
                                    <th>ĐỊA CHỈ</th>
                                    <th>NGÀY THÊM</th>
                                    <th>TÙY CHỌN</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($customer as $customers)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="2474">
                                                <label class="custom-control-label" for="2474"></label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="avatar avatar-sm">
                                                <img src="{{asset('public/server/avatar/girl.png')}}" alt="..." class="avatar-img rounded-circle">
                                            </div>
                                        </td>
                                        <td>
                                            <p class="mb-0 text-muted"><strong>{{$customers->name_customer}}</strong></p>

                                        </td>
                                        <td>
                                            <p class="mb-0 text-muted">{{$customers->email_customer}}</p>
                                            <small class="mb-0 text-muted">{{$customers->address_customer}}</small>
                                        </td>
                                        <td>
                                            <p class="mb-0 text-muted"><a href="#" class="text-muted">{{$customers->phone_customer}}</a></p>

                                        </td>
                                        <td class="text-muted">{{$customers->created_at}}</td>
                                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">EDIT</a>
                                                <a class="dropdown-item" href="#">DELETE</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <nav aria-label="Table Paging" class="my-3">
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        @include('server_view.paner')
    </main> <!-- main -->
@endsection
