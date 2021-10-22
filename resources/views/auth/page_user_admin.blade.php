@extends('server_view.master_admin')
@section('title','Thông tin cá nhân')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    <h2 class="h3 mb-4 page-title">Quản lý thông tin cá nhân</h2>
                    @foreach($user as $users)
                        <div class="my-4">
                            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thông tin cá nhân</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Quản lý đơn hàng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Lịch sử đặt hàng</a>
                                </li>
                            </ul>
                            <form>
                                <div class="row mt-5 align-items-center">
                                    <div class="col-md-3 text-center mb-5">
                                        <div class="avatar avatar-xl">
                                            <img src="{{asset('public/uploads/admin/'.$users->image_user)}}" alt="..." class="avatar-img rounded-circle">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row align-items-center">
                                            <div class="col-md-7">
                                                <h4 class="mb-1">{{ucwords($users->name_user)}}</h4>
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
                                                    Số đơn đã hủy: 10 <br>
                                                Trạng thái: Báo xấu tài khoảng</p>
                                            </div>
                                            <div class="col">
                                                <p class="small mb-0 text-muted">Giới tính: {{$users->sex_user}}</p>
                                                <p class="small mb-0 text-muted">Địa chỉ: {{$users->address_user}}</p>
                                                <p class="small mb-0 text-muted">Email: {{$users->email}}</p>
                                                <p class="small mb-0 text-muted">SĐT: {{$users->phone_user}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="firstname">Firstname</label>
                                        <input type="text" id="firstname" class="form-control" placeholder="Brown">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lastname">Lastname</label>
                                        <input type="text" id="lastname" class="form-control" placeholder="Asher">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="brown@asher.me">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress5">Address</label>
                                    <input type="text" class="form-control" id="inputAddress5" placeholder="P.O. Box 464, 5975 Eget Avenue">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputCompany5">Company</label>
                                        <input type="text" class="form-control" id="inputCompany5" placeholder="Nec Urna Suscipit Ltd">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputState5">State</label>
                                        <select id="inputState5" class="form-control">
                                            <option selected="">Choose...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputZip5">Zip</label>
                                        <input type="text" class="form-control" id="inputZip5" placeholder="98232">
                                    </div>
                                </div>
                                <hr class="my-4">
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputPassword4">Old Password</label>
                                            <input type="password" class="form-control" id="inputPassword5">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword5">New Password</label>
                                            <input type="password" class="form-control" id="inputPassword5">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword6">Confirm Password</label>
                                            <input type="password" class="form-control" id="inputPassword6">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="mb-2">Password requirements</p>
                                        <p class="small text-muted mb-2"> To create a new password, you have to meet all of the following requirements: </p>
                                        <ul class="small text-muted pl-4 mb-0">
                                            <li> Minimum 8 character </li>
                                            <li>At least one special character</li>
                                            <li>At least one number</li>
                                            <li>Can’t be the same as a previous password </li>
                                        </ul>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save Change</button>
                            </form>
                        </div> <!-- /.card-body -->
                    @endforeach
                </div> <!-- /.col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        @include('server_view.paner')
    </main> <!-- main -->
@endsection
