@extends('server_view.master_admin')
@section('title','Danh sách thành viên')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row align-items-center my-4">
                        <div class="col text-center">
                            <h2 class="h3 mb-0 page-title">Danh sách thành viên</h2>
                        </div>
                        <div class="col-auto">
                            <a href="{{route('page_sign_up')}}" type="button" class="btn btn-primary" ><i class="fas fa-plus"></i>Thêm mới thành viên</a>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($user as $users)
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
                        @endforeach
                        <!-- .col -->
                    </div> <!-- .row -->
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
