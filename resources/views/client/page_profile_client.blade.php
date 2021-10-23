@extends('client_view.master')
@section('title','Thông tin cá nhân')
@section('content')

            <section class="breadcrumb-section set-bg">
                <div class="container">
                    <hr style="size: 1px">
                    <style>
                        div.tieude_giua
                        {
                            color: #fff;
                            font-size: 20px;
                            height: 37px;
                            line-height: 37px;

                            text-transform: uppercase;
                            border-bottom: 1px solid #61B000;
                            margin-bottom: 5px;
                            font-family:Tahoma, Geneva, sans-serif;
                        }
                        div.tieude_giua div {
                            float: left;
                            background: #61B000;
                            padding: 0px 20px;
                            min-width: 170px;
                            position: relative;
                        }
                        div.tieude_giua div:before {
                            position: absolute;
                            right: -37px;
                            top: 0px;
                            height: 0;
                            width: 0;
                            content: '';
                            border-top: 37px solid transparent;
                            border-left: 37px solid #61B000;
                        }
                    </style>
                    <div class="tieude_giua">
                        <div>Thông tin cá nhân</div>
                    </div>
                </div>
            </section>
            <section class="checkout spad">
                <div class="container">
                    <div class="checkout__form">
                        <form action="{{route('post_checkout')}}" method="post" >
                            @csrf
                            <div class="row">
                                <ul style="width: 100%;display: flex;margin-left: 15px" class="nav nav-tabs text-center" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                           aria-selected="false"><h5><b>Thông tin cá nhân</b></h5></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                           aria-selected="false"><h5><b>Quản lý đơn hàng</b></h5></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                           aria-selected="false"><h5><b>Lịch sử đặt hàng</b></h5></a>
                                    </li>
                                </ul>
                            </div>
                            <br>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <h2 class="h3 mb-4 page-title text-center"><strong>Quản lý thông tin cá nhân</strong></h2>
                                            @foreach($user as $users)
                                                <div class="my-4">
                                                    <form action="{{route('post_edit_profile',$users->id)}}" method="post">
                                                        @csrf
                                                        <div class="row mt-5 align-items-center">
                                                            <div class="col-md-3 text-center mb-5">
                                                                <div class="avatar avatar-xl">
                                                                    <img src="{{asset('public/uploads/admin/'.$users->image_user)}}" alt="..." class="avatar-img rounded-circle">
                                                                </div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="row align-items-center">
                                                                    <div class="col-md-7">
                                                                        <h4 class="mb-1">{{ucwords($users->name_user)}} </h4>
                                                                        @foreach($role as $roles)
                                                                            @if($roles->id == $users->role_id )
                                                                                <p class="small mb-3"><span class="badge badge-dark">{{$roles->role_name}}</span></p>
                                                                            @endif
                                                                        @endforeach

                                                                    </div>
                                                                </div>
                                                                <div class="row mb-4">
                                                                    <div class="col-md-7">
                                                                        <p class="text-muted" style="text-align: left"> Số đơn đã đặt: 15 <br>
                                                                            Số đơn đã hủy: 10 &nbsp;<i style="color: orangered" class="fas fa-info-circle" title="Báo xấu"></i> <br>
                                                                            Trạng thái: Báo xấu tài khoảng</p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <p class="small mb-0 text-muted">Giới tính:
                                                                            @if($users->sex_user == 0)
                                                                                Nam
                                                                            @endif
                                                                            @if($users->sex_user == 1)
                                                                                Nữ
                                                                            @endif
                                                                            @if($users->sex_user == 1)
                                                                                Khác
                                                                            @endif
                                                                        </p>
                                                                        <p class="small mb-0 text-muted">Địa chỉ: {{$users->address_user}}</p>
                                                                        <p class="small mb-0 text-muted">Email: {{$users->email}}</p>
                                                                        <p class="small mb-0 text-muted">SĐT: {{$users->phone_user}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr class="my-4">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-12">
                                                                <label for="firstname">Họ và Tên</label>
                                                                <input type="text" id="firstname" name="name_user" class="form-control" value="{{$users->name_user}}">
                                                            </div>

                                                        </div>

                                                        <div class="form-group">
                                                            <label for="inputAddress5">Address</label>
                                                            <input type="text" class="form-control" id="inputAddress5" name="address_user" value="{{ucwords($users->address_user)}}">
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label for="inputCompany5">Số điện thoại</label>
                                                                <input type="text" class="form-control" id="inputCompany5" name="phone_user" value="{{$users->phone_user}}">
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="inputState5">Giới tính</label>
                                                                <select id="inputState5" name="sex_user" class="form-control">
                                                                    @if($users->sex_user == 0)
                                                                        <option selected value="0">Nam</option>
                                                                        <option value="1">Nữ</option>
                                                                        <option value="2">Khác</option>
                                                                    @endif
                                                                    @if($users->sex_user == 1)
                                                                        <option selected value="1">Nữ</option>
                                                                        <option value="0">Nam</option>
                                                                        <option value="2">Khác</option>
                                                                    @endif
                                                                    @if($users->sex_user == 2)
                                                                        <option selected value="2">Khác</option>
                                                                        <option  value="0">Nam</option>
                                                                        <option value="1">Nữ</option>

                                                                    @endif
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="inputZip5">Ngày sinh</label>
                                                                <input type="date" class="form-control" id="inputZip5" name="birthday_user" value="{{$users->birthday_user}}">
                                                            </div>
                                                        </div>
                                                        <hr class="my-4">
                                                        <div class="row mb-4">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="inputPassword4">Mật khẩu củ</label>
                                                                    <input type="password" class="form-control" id="inputPassword5" name="password">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputPassword5">Mật khẩu mới</label>
                                                                    <input type="password" class="form-control" id="inputPassword5" name="new_password">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="inputPassword6">Xác nhận mật khẩu mới</label>
                                                                    <input type="password" class="form-control" id="inputPassword6" name="confifm_password">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p class="mb-2">Yêu cầu mật khẩu mới</p>
                                                                <p class="small text-muted mb-2"> Để tạo mật khẩu mới, bạn cần đáp ứng những yêu cầu sau: </p>
                                                                <ul class="small text-muted pl-4 mb-0">
                                                                    <li> Tối thiểu 8 ký tự </li>
                                                                    <li>Có ít nhất một ký tự đặc biệt</li>
                                                                    <li>Có ít nhất một chữ số</li>
                                                                    <li>Không được trùng với mật khẩu trước đó </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <button style="background-color: #7fad39" type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                                    </form>
                                                </div> <!-- /.card-body -->
                                            @endforeach
                                        </div> <!-- /.col-12 -->
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-2" role="tabpanel">
                                    <div class="row">
                                        Thông tin đơn hàng
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-3" role="tabpanel">
                                    <div class="row">
                                        Lịch sử đặt hàng
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>
            </section>


    <!-- Checkout Section End -->

@endsection
