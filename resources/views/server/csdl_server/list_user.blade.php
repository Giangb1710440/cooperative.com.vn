@extends('server_view.master_admin')
@section('title','Danh sách thành viên')
@section('content')

    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2 class="mb-2 page-title text-center"><strong>Quản Lý Thành Viên</strong></h2>
                    @if(Auth::user()->role_id == 1)
                        <div class="row">
                            <ul style="margin-left: 20px" class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#all_order" role="tab" aria-controls="home" aria-selected="true">Tất cả thành viên</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#status0" role="tab" aria-controls="contact" aria-selected="false">Nhân viên</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#status1" role="tab" aria-controls="contact" aria-selected="false">Xã viên</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#status2" role="tab" aria-controls="contact" aria-selected="false">Khách hàng</a>
                                </li>

                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="all_order" role="tabpanel">
                                <div class="row my-4">
                                    <!-- Small table -->
                                    <div class="col-md-12">
                                        <div class="card shadow">
                                            <div class="row">
                                                @foreach($user as $users)
                                                    @php($role_user = DB::table('role_accesss')->where('id','=',$users->role_id)->get())
                                                    @if(Auth::user()->role_id == 2)
                                                        @if($users->role_id == 3)
                                                            <div class="col-md-3">
                                                                <div class="card shadow mb-4">
                                                                    <div class="card-body text-center">
                                                                        <div class="avatar avatar-lg mt-4">
                                                                            <a href="">
                                                                                <img width="64px" height="64px" src="{{asset('public/uploads/admin/'.$users->image_user)}}" alt="..." class="avatar-img rounded-circle">
                                                                            </a>
                                                                        </div>
                                                                        <div class="card-text my-2">
                                                                            <strong class="card-title my-0">{{$users->name_user}} </strong>
                                                                            <p class="small text-muted mb-0">{{$users->email }}</p>
                                                                            <p class="small text-muted mb-0">{{$users->phone_user}}</p>
                                                                            <p class="small"><span class="badge badge-light text-muted">{{$users->address_user}}</span></p>
                                                                        </div>
                                                                    </div> <!-- ./card-text -->
                                                                    <div class="card-footer">
                                                                        <div class="row align-items-center justify-content-between">
                                                                            <div class="col-auto">
                                                                                <small>
                                                                                    <span class="dot dot-lg bg-success mr-1"></span>
                                                                                    @foreach($role_user as $role_users)
                                                                                        {{trans($role_users->role_name)}}
                                                                                    @endforeach
                                                                                </small>
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                <div class="file-action">
                                                                                    {{--                                                    <button type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                                                                    {{--                                                        --}}
                                                                                    {{--                                                    </button>--}}
                                                                                    <a href="{{route('profile_user_admin',$users->id)}}" type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto">
                                                                                        <i class="fas fa-user-edit"></i>
                                                                                    </a>
                                                                                    {{--                                                    <div class="dropdown-menu m-2">--}}
                                                                                    {{--                                                        <a class="dropdown-item" href="{{route('profile_user_admin',$users->id)}}"><i class="fe fe-meh fe-12 mr-4"></i>Cập nhật thông tin</a>--}}

                                                                                    {{--                                                        <a class="dropdown-item" href="#"><i class="fe fe-delete fe-12 mr-4"></i>Xóa thành viên</a>--}}
                                                                                    {{--                                                    </div>--}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> <!-- /.card-footer -->
                                                                </div>
                                                            </div> <!-- .col -->
                                                        @else
                                                            @continue
                                                        @endif
                                                    @else
                                                        <div class="col-md-3">
                                                            <div class="card shadow mb-4">
                                                                <div class="card-body text-center">
                                                                    <div class="avatar avatar-lg mt-4">
                                                                        <a href="">
                                                                            <img width="64px" height="64px" src="{{asset('public/uploads/admin/'.$users->image_user)}}" alt="..." class="avatar-img rounded-circle">
                                                                        </a>
                                                                    </div>
                                                                    <div class="card-text my-2">
                                                                        <strong class="card-title my-0">{{$users->name_user}} </strong>
                                                                        <p class="small text-muted mb-0">{{$users->email }}</p>
                                                                        <p class="small text-muted mb-0">{{$users->phone_user}}</p>
                                                                        <p class="small"><span class="badge badge-light text-muted">{{$users->address_user}}</span></p>
                                                                    </div>
                                                                </div> <!-- ./card-text -->
                                                                <div class="card-footer">
                                                                    <div class="row align-items-center justify-content-between">
                                                                        <div class="col-auto">
                                                                            <small>
                                                                                <span class="dot dot-lg bg-success mr-1"></span>
                                                                                @foreach($role_user as $role_users)
                                                                                    {{trans($role_users->role_name)}}
                                                                                @endforeach
                                                                            </small>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <div class="file-action">
                                                                                {{--                                                    <button type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                                                                {{--                                                        --}}
                                                                                {{--                                                    </button>--}}
                                                                                <a href="{{route('profile_user_admin',$users->id)}}" type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto">
                                                                                    <i class="fas fa-user-edit"></i>
                                                                                </a>
                                                                                {{--                                                    <div class="dropdown-menu m-2">--}}
                                                                                {{--                                                        <a class="dropdown-item" href="{{route('profile_user_admin',$users->id)}}"><i class="fe fe-meh fe-12 mr-4"></i>Cập nhật thông tin</a>--}}

                                                                                {{--                                                        <a class="dropdown-item" href="#"><i class="fe fe-delete fe-12 mr-4"></i>Xóa thành viên</a>--}}
                                                                                {{--                                                    </div>--}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- /.card-footer -->
                                                            </div>
                                                        </div> <!-- .col -->
                                                @endif
                                            @endforeach
                                            <!-- .col -->
                                            </div> <!-- .row -->
                                        </div>
                                    </div> <!-- simple table -->
                                </div> <!-- end section -->
                            </div>
                            <div class="tab-pane" id="status0" role="tabpanel">
                                <div class="row my-4">
                                    <!-- Small table -->
                                    <div class="col-md-12">
                                        <div class="card shadow">
                                            <div class="row">
                                                @foreach($user as $users)
                                                    @php($role_user = DB::table('role_accesss')->where('id','=',$users->role_id)->get())
                                                    @if(Auth::user()->role_id == 2)
                                                        @if($users->role_id == 3)
                                                            <div class="col-md-3">
                                                                <div class="card shadow mb-4">
                                                                    <div class="card-body text-center">
                                                                        <div class="avatar avatar-lg mt-4">
                                                                            <a href="">
                                                                                <img width="64px" height="64px" src="{{asset('public/uploads/admin/'.$users->image_user)}}" alt="..." class="avatar-img rounded-circle">
                                                                            </a>
                                                                        </div>
                                                                        <div class="card-text my-2">
                                                                            <strong class="card-title my-0">{{$users->name_user}} </strong>
                                                                            <p class="small text-muted mb-0">{{$users->email }}</p>
                                                                            <p class="small text-muted mb-0">{{$users->phone_user}}</p>
                                                                            <p class="small"><span class="badge badge-light text-muted">{{$users->address_user}}</span></p>
                                                                        </div>
                                                                    </div> <!-- ./card-text -->
                                                                    <div class="card-footer">
                                                                        <div class="row align-items-center justify-content-between">
                                                                            <div class="col-auto">
                                                                                <small>
                                                                                    <span class="dot dot-lg bg-success mr-1"></span>
                                                                                    @foreach($role_user as $role_users)
                                                                                        {{trans($role_users->role_name)}}
                                                                                    @endforeach
                                                                                </small>
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                <div class="file-action">
                                                                                    {{--                                                    <button type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                                                                    {{--                                                        --}}
                                                                                    {{--                                                    </button>--}}
                                                                                    <a href="{{route('profile_user_admin',$users->id)}}" type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto">
                                                                                        <i class="fas fa-user-edit"></i>
                                                                                    </a>
                                                                                    {{--                                                    <div class="dropdown-menu m-2">--}}
                                                                                    {{--                                                        <a class="dropdown-item" href="{{route('profile_user_admin',$users->id)}}"><i class="fe fe-meh fe-12 mr-4"></i>Cập nhật thông tin</a>--}}

                                                                                    {{--                                                        <a class="dropdown-item" href="#"><i class="fe fe-delete fe-12 mr-4"></i>Xóa thành viên</a>--}}
                                                                                    {{--                                                    </div>--}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> <!-- /.card-footer -->
                                                                </div>
                                                            </div> <!-- .col -->
                                                        @else
                                                            @continue
                                                        @endif
                                                    @else
                                                        @if($users->role_id == 2)
                                                            <div class="col-md-3">
                                                                <div class="card shadow mb-4">
                                                                    <div class="card-body text-center">
                                                                        <div class="avatar avatar-lg mt-4">
                                                                            <a href="">
                                                                                <img width="64px" height="64px" src="{{asset('public/uploads/admin/'.$users->image_user)}}" alt="..." class="avatar-img rounded-circle">
                                                                            </a>
                                                                        </div>
                                                                        <div class="card-text my-2">
                                                                            <strong class="card-title my-0">{{$users->name_user}} </strong>
                                                                            <p class="small text-muted mb-0">{{$users->email }}</p>
                                                                            <p class="small text-muted mb-0">{{$users->phone_user}}</p>
                                                                            <p class="small"><span class="badge badge-light text-muted">{{$users->address_user}}</span></p>
                                                                        </div>
                                                                    </div> <!-- ./card-text -->
                                                                    <div class="card-footer">
                                                                        <div class="row align-items-center justify-content-between">
                                                                            <div class="col-auto">
                                                                                <small>
                                                                                    <span class="dot dot-lg bg-success mr-1"></span>
                                                                                    @foreach($role_user as $role_users)
                                                                                        {{trans($role_users->role_name)}}
                                                                                    @endforeach
                                                                                </small>
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                <div class="file-action">
                                                                                    {{--                                                    <button type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                                                                    {{--                                                        --}}
                                                                                    {{--                                                    </button>--}}
                                                                                    <a href="{{route('profile_user_admin',$users->id)}}" type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto">
                                                                                        <i class="fas fa-user-edit"></i>
                                                                                    </a>
                                                                                    {{--                                                    <div class="dropdown-menu m-2">--}}
                                                                                    {{--                                                        <a class="dropdown-item" href="{{route('profile_user_admin',$users->id)}}"><i class="fe fe-meh fe-12 mr-4"></i>Cập nhật thông tin</a>--}}

                                                                                    {{--                                                        <a class="dropdown-item" href="#"><i class="fe fe-delete fe-12 mr-4"></i>Xóa thành viên</a>--}}
                                                                                    {{--                                                    </div>--}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> <!-- /.card-footer -->
                                                                </div>
                                                            </div> <!-- .col -->
                                                    @endif
                                                @endif
                                            @endforeach
                                            <!-- .col -->
                                            </div> <!-- .row -->
                                        </div>
                                    </div> <!-- simple table -->
                                </div> <!-- end section -->
                            </div>
                            <div class="tab-pane" id="status1" role="tabpanel">
                                <div class="row my-4">
                                    <!-- Small table -->
                                    <div class="col-md-12">
                                        <div class="card shadow">
                                            <div class="row">
                                                @foreach($user as $users)
                                                    @php($role_user = DB::table('role_accesss')->where('id','=',$users->role_id)->get())
                                                    @if(Auth::user()->role_id == 2)
                                                        @if($users->role_id == 3)
                                                            <div class="col-md-3">
                                                                <div class="card shadow mb-4">
                                                                    <div class="card-body text-center">
                                                                        <div class="avatar avatar-lg mt-4">
                                                                            <a href="">
                                                                                <img width="64px" height="64px" src="{{asset('public/uploads/admin/'.$users->image_user)}}" alt="..." class="avatar-img rounded-circle">
                                                                            </a>
                                                                        </div>
                                                                        <div class="card-text my-2">
                                                                            <strong class="card-title my-0">{{$users->name_user}} </strong>
                                                                            <p class="small text-muted mb-0">{{$users->email }}</p>
                                                                            <p class="small text-muted mb-0">{{$users->phone_user}}</p>
                                                                            <p class="small"><span class="badge badge-light text-muted">{{$users->address_user}}</span></p>
                                                                        </div>
                                                                    </div> <!-- ./card-text -->
                                                                    <div class="card-footer">
                                                                        <div class="row align-items-center justify-content-between">
                                                                            <div class="col-auto">
                                                                                <small>
                                                                                    <span class="dot dot-lg bg-success mr-1"></span>
                                                                                    @foreach($role_user as $role_users)
                                                                                        {{trans($role_users->role_name)}}
                                                                                    @endforeach
                                                                                </small>
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                <div class="file-action">
                                                                                    {{--                                                    <button type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                                                                    {{--                                                        --}}
                                                                                    {{--                                                    </button>--}}
                                                                                    <a href="{{route('profile_user_admin',$users->id)}}" type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto">
                                                                                        <i class="fas fa-user-edit"></i>
                                                                                    </a>
                                                                                    {{--                                                    <div class="dropdown-menu m-2">--}}
                                                                                    {{--                                                        <a class="dropdown-item" href="{{route('profile_user_admin',$users->id)}}"><i class="fe fe-meh fe-12 mr-4"></i>Cập nhật thông tin</a>--}}

                                                                                    {{--                                                        <a class="dropdown-item" href="#"><i class="fe fe-delete fe-12 mr-4"></i>Xóa thành viên</a>--}}
                                                                                    {{--                                                    </div>--}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> <!-- /.card-footer -->
                                                                </div>
                                                            </div> <!-- .col -->
                                                        @else
                                                            @continue
                                                        @endif
                                                    @else
                                                        @if($users->role_id == 4)
                                                            <div class="col-md-3">
                                                                <div class="card shadow mb-4">
                                                                    <div class="card-body text-center">
                                                                        <div class="avatar avatar-lg mt-4">
                                                                            <a href="">
                                                                                <img width="64px" height="64px" src="{{asset('public/uploads/admin/'.$users->image_user)}}" alt="..." class="avatar-img rounded-circle">
                                                                            </a>
                                                                        </div>
                                                                        <div class="card-text my-2">
                                                                            <strong class="card-title my-0">{{$users->name_user}} </strong>
                                                                            <p class="small text-muted mb-0">{{$users->email }}</p>
                                                                            <p class="small text-muted mb-0">{{$users->phone_user}}</p>
                                                                            <p class="small"><span class="badge badge-light text-muted">{{$users->address_user}}</span></p>
                                                                        </div>
                                                                    </div> <!-- ./card-text -->
                                                                    <div class="card-footer">
                                                                        <div class="row align-items-center justify-content-between">
                                                                            <div class="col-auto">
                                                                                <small>
                                                                                    <span class="dot dot-lg bg-success mr-1"></span>
                                                                                    @foreach($role_user as $role_users)
                                                                                        {{trans($role_users->role_name)}}
                                                                                    @endforeach
                                                                                </small>
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                <div class="file-action">
                                                                                    {{--                                                    <button type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                                                                    {{--                                                        --}}
                                                                                    {{--                                                    </button>--}}
                                                                                    <a href="{{route('profile_user_admin',$users->id)}}" type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto">
                                                                                        <i class="fas fa-user-edit"></i>
                                                                                    </a>
                                                                                    {{--                                                    <div class="dropdown-menu m-2">--}}
                                                                                    {{--                                                        <a class="dropdown-item" href="{{route('profile_user_admin',$users->id)}}"><i class="fe fe-meh fe-12 mr-4"></i>Cập nhật thông tin</a>--}}

                                                                                    {{--                                                        <a class="dropdown-item" href="#"><i class="fe fe-delete fe-12 mr-4"></i>Xóa thành viên</a>--}}
                                                                                    {{--                                                    </div>--}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> <!-- /.card-footer -->
                                                                </div>
                                                            </div> <!-- .col -->
                                                    @endif
                                                @endif
                                            @endforeach
                                            <!-- .col -->
                                            </div> <!-- .row -->
                                        </div>
                                    </div> <!-- simple table -->
                                </div> <!-- end section -->
                            </div>
                            <div class="tab-pane" id="status2" role="tabpanel">
                                <div class="row my-4">
                                    <!-- Small table -->
                                    <div class="col-md-12">
                                        <div class="card shadow">
                                            <div class="row">
                                                @foreach($user as $users)
                                                    @php($role_user = DB::table('role_accesss')->where('id','=',$users->role_id)->get())
                                                    @if(Auth::user()->role_id == 2)
                                                        @if($users->role_id == 3)
                                                            <div class="col-md-3">
                                                                <div class="card shadow mb-4">
                                                                    <div class="card-body text-center">
                                                                        <div class="avatar avatar-lg mt-4">
                                                                            <a href="">
                                                                                <img width="64px" height="64px" src="{{asset('public/uploads/admin/'.$users->image_user)}}" alt="..." class="avatar-img rounded-circle">
                                                                            </a>
                                                                        </div>
                                                                        <div class="card-text my-2">
                                                                            <strong class="card-title my-0">{{$users->name_user}} </strong>
                                                                            <p class="small text-muted mb-0">{{$users->email }}</p>
                                                                            <p class="small text-muted mb-0">{{$users->phone_user}}</p>
                                                                            <p class="small"><span class="badge badge-light text-muted">{{$users->address_user}}</span></p>
                                                                        </div>
                                                                    </div> <!-- ./card-text -->
                                                                    <div class="card-footer">
                                                                        <div class="row align-items-center justify-content-between">
                                                                            <div class="col-auto">
                                                                                <small>
                                                                                    <span class="dot dot-lg bg-success mr-1"></span>
                                                                                    @foreach($role_user as $role_users)
                                                                                        {{trans($role_users->role_name)}}
                                                                                    @endforeach
                                                                                </small>
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                <div class="file-action">
                                                                                    {{--                                                    <button type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                                                                    {{--                                                        --}}
                                                                                    {{--                                                    </button>--}}
                                                                                    <a href="{{route('profile_user_admin',$users->id)}}" type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto">
                                                                                        <i class="fas fa-user-edit"></i>
                                                                                    </a>
                                                                                    {{--                                                    <div class="dropdown-menu m-2">--}}
                                                                                    {{--                                                        <a class="dropdown-item" href="{{route('profile_user_admin',$users->id)}}"><i class="fe fe-meh fe-12 mr-4"></i>Cập nhật thông tin</a>--}}

                                                                                    {{--                                                        <a class="dropdown-item" href="#"><i class="fe fe-delete fe-12 mr-4"></i>Xóa thành viên</a>--}}
                                                                                    {{--                                                    </div>--}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> <!-- /.card-footer -->
                                                                </div>
                                                            </div> <!-- .col -->
                                                        @else
                                                            @continue
                                                        @endif
                                                    @else
                                                        @if($users->role_id == 3)
                                                            <div class="col-md-3">
                                                                <div class="card shadow mb-4">
                                                                    <div class="card-body text-center">
                                                                        <div class="avatar avatar-lg mt-4">
                                                                            <a href="">
                                                                                <img width="64px" height="64px" src="{{asset('public/uploads/admin/'.$users->image_user)}}" alt="..." class="avatar-img rounded-circle">
                                                                            </a>
                                                                        </div>
                                                                        <div class="card-text my-2">
                                                                            <strong class="card-title my-0">{{$users->name_user}} </strong>
                                                                            <p class="small text-muted mb-0">{{$users->email }}</p>
                                                                            <p class="small text-muted mb-0">{{$users->phone_user}}</p>
                                                                            <p class="small"><span class="badge badge-light text-muted">{{$users->address_user}}</span></p>
                                                                        </div>
                                                                    </div> <!-- ./card-text -->
                                                                    <div class="card-footer">
                                                                        <div class="row align-items-center justify-content-between">
                                                                            <div class="col-auto">
                                                                                <small>
                                                                                    <span class="dot dot-lg bg-success mr-1"></span>
                                                                                    @foreach($role_user as $role_users)
                                                                                        {{trans($role_users->role_name)}}
                                                                                    @endforeach
                                                                                </small>
                                                                            </div>
                                                                            <div class="col-auto">
                                                                                <div class="file-action">
                                                                                    {{--                                                    <button type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                                                                    {{--                                                        --}}
                                                                                    {{--                                                    </button>--}}
                                                                                    <a href="{{route('profile_user_admin',$users->id)}}" type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto">
                                                                                        <i class="fas fa-user-edit"></i>
                                                                                    </a>
                                                                                    {{--                                                    <div class="dropdown-menu m-2">--}}
                                                                                    {{--                                                        <a class="dropdown-item" href="{{route('profile_user_admin',$users->id)}}"><i class="fe fe-meh fe-12 mr-4"></i>Cập nhật thông tin</a>--}}

                                                                                    {{--                                                        <a class="dropdown-item" href="#"><i class="fe fe-delete fe-12 mr-4"></i>Xóa thành viên</a>--}}
                                                                                    {{--                                                    </div>--}}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> <!-- /.card-footer -->
                                                                </div>
                                                            </div> <!-- .col -->
                                                    @endif
                                                @endif
                                            @endforeach

                                            <!-- .col -->
                                            </div> <!-- .row -->

                                        </div>
                                    </div> <!-- simple table -->
                                </div> <!-- end section -->
                            </div>
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
                    @elseif(Auth::user()->role_id == 2)
                        <div class="row">
                            @foreach($user as $users)
                                @php($role_user = DB::table('role_accesss')->where('id','=',$users->role_id)->get())
                                @if(Auth::user()->role_id == 2)
                                    @if($users->role_id == 3)
                                        <div class="col-md-3">
                                            <div class="card shadow mb-4">
                                                <div class="card-body text-center">
                                                    <div class="avatar avatar-lg mt-4">
                                                        <a href="">
                                                            <img width="64px" height="64px" src="{{asset('public/uploads/admin/'.$users->image_user)}}" alt="..." class="avatar-img rounded-circle">
                                                        </a>
                                                    </div>
                                                    <div class="card-text my-2">
                                                        <strong class="card-title my-0">{{$users->name_user}} </strong>
                                                        <p class="small text-muted mb-0">{{$users->email }}</p>
                                                        <p class="small text-muted mb-0">{{$users->phone_user}}</p>
                                                        <p class="small"><span class="badge badge-light text-muted">{{$users->address_user}}</span></p>
                                                    </div>
                                                </div> <!-- ./card-text -->
                                                <div class="card-footer">
                                                    <div class="row align-items-center justify-content-between">
                                                        <div class="col-auto">
                                                            <small>
                                                                <span class="dot dot-lg bg-success mr-1"></span>
                                                                @foreach($role_user as $role_users)
                                                                    {{trans($role_users->role_name)}}
                                                                @endforeach
                                                            </small>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="file-action">
                                                                {{--                                                    <button type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                                                {{--                                                        --}}
                                                                {{--                                                    </button>--}}
                                                                <a href="{{route('profile_user_admin',$users->id)}}" type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto">
                                                                    <i class="fas fa-user-edit"></i>
                                                                </a>
                                                                {{--                                                    <div class="dropdown-menu m-2">--}}
                                                                {{--                                                        <a class="dropdown-item" href="{{route('profile_user_admin',$users->id)}}"><i class="fe fe-meh fe-12 mr-4"></i>Cập nhật thông tin</a>--}}

                                                                {{--                                                        <a class="dropdown-item" href="#"><i class="fe fe-delete fe-12 mr-4"></i>Xóa thành viên</a>--}}
                                                                {{--                                                    </div>--}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> <!-- /.card-footer -->
                                            </div>
                                        </div> <!-- .col -->
                                    @else
                                        @continue
                                    @endif
                                @else
                                    @if($users->role_id == 3)
                                        <div class="col-md-3">
                                            <div class="card shadow mb-4">
                                                <div class="card-body text-center">
                                                    <div class="avatar avatar-lg mt-4">
                                                        <a href="">
                                                            <img width="64px" height="64px" src="{{asset('public/uploads/admin/'.$users->image_user)}}" alt="..." class="avatar-img rounded-circle">
                                                        </a>
                                                    </div>
                                                    <div class="card-text my-2">
                                                        <strong class="card-title my-0">{{$users->name_user}} </strong>
                                                        <p class="small text-muted mb-0">{{$users->email }}</p>
                                                        <p class="small text-muted mb-0">{{$users->phone_user}}</p>
                                                        <p class="small"><span class="badge badge-light text-muted">{{$users->address_user}}</span></p>
                                                    </div>
                                                </div> <!-- ./card-text -->
                                                <div class="card-footer">
                                                    <div class="row align-items-center justify-content-between">
                                                        <div class="col-auto">
                                                            <small>
                                                                <span class="dot dot-lg bg-success mr-1"></span>
                                                                @foreach($role_user as $role_users)
                                                                    {{trans($role_users->role_name)}}
                                                                @endforeach
                                                            </small>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="file-action">
                                                                {{--                                                    <button type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                                                                {{--                                                        --}}
                                                                {{--                                                    </button>--}}
                                                                <a href="{{route('profile_user_admin',$users->id)}}" type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto">
                                                                    <i class="fas fa-user-edit"></i>
                                                                </a>
                                                                {{--                                                    <div class="dropdown-menu m-2">--}}
                                                                {{--                                                        <a class="dropdown-item" href="{{route('profile_user_admin',$users->id)}}"><i class="fe fe-meh fe-12 mr-4"></i>Cập nhật thông tin</a>--}}

                                                                {{--                                                        <a class="dropdown-item" href="#"><i class="fe fe-delete fe-12 mr-4"></i>Xóa thành viên</a>--}}
                                                                {{--                                                    </div>--}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> <!-- /.card-footer -->
                                            </div>
                                        </div> <!-- .col -->
                                @endif
                            @endif
                        @endforeach

                        <!-- .col -->
                        </div> <!-- .row -->
                        <nav aria-label="Table Paging" class="mb-0 text-muted">
                            <ul class="pagination justify-content-center mb-0">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    @endif



                </div> <!-- .col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        @include('server_view.paner')
    </main> <!-- main -->
@endsection
