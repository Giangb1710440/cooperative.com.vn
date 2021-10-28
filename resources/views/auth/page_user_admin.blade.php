@extends('server_view.master_admin')
@section('title','Thông tin cá nhân')
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    <h2 class="h3 mb-4 page-title">Quản lý thông tin cá nhân</h2>

                        <div class="my-4">
                            <div class="row">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Thông tin cá nhân</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Lịch sử đặt hàng</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    @foreach($user as $users)
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
                                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                    </form>
                                    @endforeach
                                </div>
                                <div class="tab-pane" id="contact" role="tabpanel">
                                    @foreach($order as $orders)
                                        @if($orders->status_order == 2)
                                            @php($order_detail = DB::table('order_details')->where('id_order',$orders->id)->get())
                                            <table class="table table-hover table-borderless border-v">
                                                <thead class="thead-dark">
                                                <tr>
                                                    {{--                                                            <th colspan="4">{{date('d-m-Y', strtotime($orders->created_at))}}</th>--}}
                                                    <th colspan="4">
                                                        @if($orders->status_order == 0)
                                                            <strong>Chờ xác nhận</strong>
                                                        @elseif($orders->status_order == 1)
                                                            <strong style="color:cornflowerblue;">Đã nhận đơn</strong>
                                                        @elseif($orders->status_order == 2)
                                                            <strong style="color:#34ce57;">Đã giao hàng</strong>
                                                        @elseif($orders->status_order == -1)
                                                            <strong style="color:red;">Đã hủy đơn</strong>
                                                        @endif
                                                    </th>
                                                    <th colspan="2" style="margin-right: 0px">
                                                        @if($orders->status_checkout == 0)
                                                            <strong>Chưa thanh toán</strong>
                                                        @elseif($orders->status_checkout == 1)
                                                            <strong style="color:#34ce57;">Đã thanh toán</strong>
                                                        @elseif($orders->status_checkout == 2)
                                                            <strong>Đã hoàn tiền</strong>
                                                        @endif
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="accordion-toggle collapsed" id="c-3599" data-toggle="collapse" data-parent="#c-3599" href="#collap-3599">
                                                    <td style="padding-top: 30px">Đơn hàng: {{$orders->id}}</td>
                                                    @foreach($order_detail as $order_details)
                                                        @php($product = DB::table('products')->get())
                                                        @foreach($product as $products)
                                                            @if($products->id == $order_details->id_product)
                                                                <td>
                                                                    @foreach((array)json_decode($products->image_product,true) as $images)
                                                                        <img style="height: 60px;width: 80px;" src="{{asset('public/uploads/'.$images)}}" alt="">
                                                                        @break
                                                                    @endforeach
                                                                </td>
                                                            @endif
                                                        @endforeach
                                                        @break
                                                    @endforeach
                                                    <td style="padding-top: 30px">{{date('d-m-Y', strtotime($orders->created_at))}}</td>
                                                    <td style="padding-top: 30px">{{number_format($orders->total_price_order)}} VNĐ</td>
                                                    <td style="padding-top: 30px">Ghi chú trống</td>
                                                    <td style="padding-top: 30px">
                                                        <a href="" type="button" class="btn mb-2 btn-outline-secondary" data-toggle="modal" data-target="#successdetail_order{{$orders->id}}" data-whatever="@mdo"><i style="color: black" class="fas fa-print"></i></a>
                                                        <div class="modal fade" id="successdetail_order{{$orders->id}}" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content" style="width: 120%;margin-top: -28px">
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
                                                                                @php($detail_order = DB::table('order_details')->get())
                                                                                @foreach($detail_order as $detail_orders)
                                                                                    @if($detail_orders ->id_order ==$orders->id)
                                                                                    <tr>
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
                                                                                            @php($unit = DB::table('units')->get())
                                                                                            @if($products->id ==$detail_orders->id_product )
                                                                                                @foreach($unit as $units)
                                                                                                    @if($units->id == $products->id_unit  )
                                                                                                        <td class="text-right">{{$detail_orders->quality_order}}{{strtoupper($units->name_unit)}}</td>
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            @endif
                                                                                        @endforeach
                                                                                        <td class="text-right">{{number_format($detail_orders->unit_price_order*$detail_orders->quality_order*((100-$detail_orders->discount_order_detail)/100))}} (-{{$detail_orders->discount_order_detail}}%)</td>
                                                                                    </tr>
                                                                                    @endif
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
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <hr style="border-top: 1px dashed #61B000;">
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div> <!-- /.card-body -->


                </div> <!-- /.col-12 -->
            </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        @include('server_view.paner')
    </main> <!-- main -->

    <script>
        var msg = '{{Session::get('no_confirm_pass')}}';
        var exist = '{{Session::has('no_confirm_pass')}}';
        if (exist) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'warning',
                title: 'Xác nhận mật khẩu sai'
            })
        }
    </script>
    <script>
        var msg = '{{Session::get('no_confirm_old')}}';
        var exist = '{{Session::has('no_confirm_old')}}';
        if (exist) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'warning',
                    title: 'Bạn đã nhập không đúng mật khẩu củ'
            })
        }
    </script>
    <script>
        var msg = '{{Session::get('no_old_passwd')}}';
        var exist = '{{Session::has('no_old_passwd')}}';
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
                icon: 'warning',
                title: 'Bạn chưa nhập mật khẩu củ'
            })
        }
    </script>
    <script>
        var msg = '{{Session::get('update_profile_success')}}';
        var exist = '{{Session::has('update_profile_success')}}';
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
        var msg = '{{Session::get('no_passwd')}}';
        var exist = '{{Session::has('no_passwd')}}';
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


@endsection
