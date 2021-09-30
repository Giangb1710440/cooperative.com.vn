@extends('server_view.master_admin')

@foreach($detail_diary as $detail_diarys)
    @section('title', 'Nhật ký nông hộ Diary-0'.$detail_diarys->id )
@endforeach
@section('content')
    <main role="main" class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">
                    @foreach($detail_diary as $detail_diarys)
                        <div class="row align-items-center mb-4">
                            <div class="col">
                                <h2 class="h5 page-title"><small class="text-muted text-uppercase">
                                        <a href="{{route('admin_home')}}">Admin</a>/
                                        <a href="{{route('list_diary')}}">CSDL nhật ký nông hộ</a>/
                                        Chi tiết nhật ký nông hộ</small><br />#DIARY0{{$detail_diarys->id}}</h2>

                            </div>
                            <div class="col-auto">
                                <button type="button" title="" class="btn btn-secondary">Xuất file ".docx"</button>
                            </div>
                        </div>
                        <div class="card shadow">
                            <div class="card-body p-5">
                                <div class="row mb-5">
                                    <div class="col-12 text-center mb-4">

                                        <h2 class="mb-0 text-uppercase" style="color: #1b5dab">NHẬT KÝ NÔNG HỘ</h2>
                                        <br>

                                        <p class="text-muted" style="font-size: 20px"> {{ucwords($detail_diarys->name_diary)}}</p>
                                    </div>

                                    <div class="col-md-7">
                                        <p>
                                            <small class="small text-muted text-uppercase">Họ và tên chủ hộ:</small>
                                            <strong style="padding-left: 10px">&nbsp;Nguyễn Hà Giang</strong>
                                        </p>
                                        <p>
                                            <small class="small text-muted text-uppercase">Địa chỉ mô hình: </small>
                                            <strong style="padding-left: 10px">Địa chỉ mô hình: &nbsp;{{$detail_diarys->address_diary}}</strong>
                                        </p>
                                        <p>
                                            <small class="small text-muted text-uppercase">Thời gian ghi chép: </small>
                                            <strong style="padding-left: 10px">{{date('d-m-Y', strtotime($detail_diarys->created_at))}}</strong>
                                        </p>
                                        <p>
                                            <small class="small text-muted text-uppercase">Diện tích canh tác: </small>
                                            <strong style="padding-left: 10px">{{$detail_diarys->dientich_diary}} (M<sup>2</sup>)</strong>
                                        </p>
                                        <p>
                                            <small class="small text-muted text-uppercase">Loại cây trồng: </small>
                                            <strong style="padding-left: 10px">
                                                @foreach($product as $products)
                                                    @if($products->id == $detail_diarys->id_product )
                                                        {{$products->name_product}}
                                                    @endif
                                                @endforeach
                                            </strong>
                                        </p>
                                        <p>
                                            <small class="small text-muted text-uppercase">Kỹ thuật canh tác: </small>
                                            <strong style="padding-left: 10px">
                                                @foreach($technique as $techniques)
                                                    @if($techniques->id == $detail_diarys->id_technique)
                                                        {{$techniques->name_technique}}
                                                    @endif
                                                @endforeach
                                            </strong>
                                        </p>
                                    </div>
                                    <div class="col-md-5">
                                        <img src="{{asset('public/server/DB_image/BUOIDAXANH.jpg')}}" alt="">
                                    </div>

                                    <div style="padding-top: 15px" class="col-md-12">
                                        <h5 class="mb-0 text-uppercase" style="color: #1b5dab"><i class="fas fa-database"></i> QUẢN LÝ NHẬT KÝ NÔNG HỘ</h5>
                                    </div>
                                    <div class="card-body">
                                        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="st-tabxx" data-toggle="tab" href="#stxx" role="tab" aria-controls="stxx" aria-selected="true">Giai đoạn sinh trưởng</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="bonphan-tabxx" data-toggle="tab" href="#bonphanxx" role="tab" aria-controls="bonphanxx" aria-selected="false">Bón phân</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="phunthuoc-tabxx" data-toggle="tab" href="#phunthuoc" role="tab" aria-controls="phunthuoc" aria-selected="false">Phun thuốc</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="thsb-tabxx" data-toggle="tab" href="#thsb" role="tab" aria-controls="thsb" aria-selected="false">Tình hình sâu bệnh</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="th-tabxx" data-toggle="tab" href="#th" role="tab" aria-controls="th" aria-selected="false">Thu hoạch</a>
                                            </li>

                                        </ul>
                                        <div class="tab-content" id="myTabContent">
{{--                                            giai đoạn sinh trưởng--}}
                                            <div class="tab-pane fade show active" id="stxx" role="tabpanel" aria-labelledby="st-tabxx">
                                                <h5 class="card-title">Cơ sở  dữ liệu giai đoạn sinh trưởng của
                                                    @foreach($product as $products)
                                                        @if($products->id == $detail_diarys->id_product )
                                                            <u>{{ucwords($products->name_product)}}</u>
                                                        @endif
                                                    @endforeach
                                                </h5>
                                                <p class="card-text">(*) Hãy chọn chức năng thêm mới nếu bạn muốn cập nhật giai đoạn sinh trưởng</p>
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Giai đoạn sinh trưởng</th>
                                                        <th>Thời gian</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($detail_gdst as $detail_gdsts)
                                                        @if($detail_gdsts->id_diary == $detail_diarys->id)
                                                            <tr>
                                                                <td>DST0{{$detail_gdsts->id}}</td>
                                                                @foreach($gdst as $gdsts)
                                                                    @if($gdsts->id == $detail_gdsts->id_gdst )
                                                                        <td>{{ucwords($gdsts->name_gdst)}}</td>
                                                                    @endif
                                                                @endforeach
                                                                <td>{{date('d-m-Y', strtotime($detail_gdsts->time_st))}}</td>
                                                                <td>
                                                                    <button type="button" class="btn mb-2 btn-info" data-toggle="modal" data-target="#varyModal" data-whatever="@mdo"><i class="fas fa-edit"></i> Sửa</button>
                                                                    <div class="modal fade" id="varyModal" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="varyModalLabel">Chỉnh sửa</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form action="{{route('post_edit_gdsts',$detail_gdsts->id)}}" method="post">
                                                                                        @csrf
                                                                                        <div class="form-group mb-3">
                                                                                            <label for="exampleInputEmail1">Tên giai đoạn sinh trưởng</label>
                                                                                            <select class="form-control" name="edit_name_gdst">
                                                                                                @foreach($gdst as $gdsts)
                                                                                                    @if($gdsts->id == $detail_gdsts->id_gdst)
                                                                                                        <option value="{{$gdsts->id}}">{{$gdsts->name_gdst}}</option>
                                                                                                        @break
                                                                                                    @else
                                                                                                        <option value="0">Chọn . . .</option>
                                                                                                    @endif
                                                                                                @endforeach
                                                                                                @foreach($gdst as $gdsts)
                                                                                                    @if($gdsts->id == $detail_gdsts->id_gdst)
                                                                                                        @continue
                                                                                                    @else
                                                                                                            <option value="{{$gdsts->id}}">{{$gdsts->name_gdst}}</option>
                                                                                                    @endif
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="form-group mb-3">
                                                                                            <label for="exampleInputEmail1">Thời gian</label>
                                                                                            <input type="date" class="form-control" id="" name="edit_time_gdst"  placeholder="{{$detail_gdsts->time_st}}" required>
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
                                                                    <a type="button" class="btn mb-2 btn-danger" onclick="xacnhanxoa()" href="{{route('page_delete_gdst',$detail_gdsts->id)}}"><i class="fas fa-trash-alt"></i> Xóa</a>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                <button type="button" class="btn mb-2 btn-info" data-toggle="modal" data-target="#sinhtruong" data-whatever="@mdo"><i class="fas fa-plus-square"></i> &nbsp;Thêm mới</button>
                                                <div class="modal fade" id="sinhtruong" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="varyModalLabel">Thêm mới giai đoạn sinh trưởng</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{route('post_gdst',$detail_diarys->id)}}" method="post">
                                                                    @csrf
                                                                    <div class="form-group mb-3">
                                                                        <label for="exampleInputEmail1">Tên giai đoạn sinh trưởng</label>
                                                                        <select class="form-control" name="id_gdst" id="">
                                                                            @foreach($gdst as $gdsts)
                                                                                <option value="{{$gdsts->id}}">{{$gdsts->name_gdst}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="exampleInputEmail1">Thời gian</label>
                                                                        <input type="date" class="form-control" id="" name="time_gdst"  required>
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
                                            </div>

{{--                                            bón phân--}}
                                            <div class="tab-pane fade" id="bonphanxx" role="tabpanel" aria-labelledby="bonphan-tabxx">
                                                <h5 class="card-title">Cơ sở dữ liệu quá trình bón phân cho
                                                    @foreach($product as $products)
                                                        @if($products->id == $detail_diarys->id_product )
                                                            <u>{{ucwords($products->name_product)}}</u>
                                                        @endif
                                                    @endforeach
                                                </h5>
                                                <p class="card-text">(*) Hãy chọn chức năng thêm mới nếu bạn muốn cập nhật tình hình bón phân</p>
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Ngày bón</th>
                                                        <th>Loại phân</th>
                                                        <th>Lượng bón (KG/1000 M<sup>2</sup> )</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($bonphan as $bonphans)
                                                            <tr>
                                                                <td>BP0{{$bonphans->id}}</td>
                                                                <td>{{$bonphans->ngaybon}}</td>
                                                                <td>{{$bonphans->loaiphan}}</td>
                                                                <td>{{$bonphans->luongbon}}</td>
                                                                <td>
                                                                    <button type="button" class="btn mb-2 btn-info" data-toggle="modal" data-target="#edit_bonphan" data-whatever="@mdo"><i class="fas fa-edit"></i> Sửa</button>
                                                                    <div class="modal fade" id="edit_bonphan" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="varyModalLabel">Chỉnh sửa</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form action="{{route('post_edit_bonphan',$bonphans->id)}}" method="post">
                                                                                        @csrf
                                                                                        <div class="form-group mb-3">
                                                                                            <label for="exampleInputEmail1">Ngày bón phân</label>
                                                                                            <input type="date" class="form-control" id="" name="edit_time_bonphan"  placeholder="{{$bonphans->ngaybon}}" required>
                                                                                        </div>
                                                                                        <div class="form-group mb-3">
                                                                                            <label for="exampleInputEmail1">Loại phân được sử dụng</label>
                                                                                            <input type="text" class="form-control" id="" name="edit_cate_phan"  placeholder="{{$bonphans->loaiphan}}" required>
                                                                                        </div>
                                                                                        <div class="form-group mb-3">
                                                                                            <label for="exampleInputEmail1">Định lượng</label>
                                                                                            <input type="text" class="form-control" id="" name="edit_dinhluong"  placeholder="{{$bonphans->luongbon}}" required>
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
                                                                    <a type="button" class="btn mb-2 btn-danger" onclick="xacnhanxoa()" href="{{route('page_delete_bp',$bonphans->id)}}">Xóa</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <button type="button" class="btn mb-2 btn-info" data-toggle="modal" data-target="#bonphan" data-whatever="@mdo"><i class="fas fa-plus-square"></i> &nbsp;Thêm mới</button>
                                                <div class="modal fade" id="bonphan" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="varyModalLabel">Thêm mới nhật ký bón phân</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{route('post_bonphan',$detail_diarys->id)}}" method="post">
                                                                    @csrf
                                                                    <div class="form-group mb-3">
                                                                        <label for="exampleInputEmail1">Ngày bón phân</label>
                                                                        <input type="date" class="form-control" id="" name="time_bonphan"  required>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="exampleInputEmail1">Loại phân</label>
                                                                        <input type="text" class="form-control" id="" name="loaiphan"  required>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="exampleInputEmail1">Lượng bón</label>
                                                                        <input type="text" class="form-control" id="" name="luongbon"  required>
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
                                            </div>

{{--                                            phun thuốc--}}
                                            <div class="tab-pane fade" id="phunthuoc" role="tabpanel" aria-labelledby="phunthuoc-tabxx">
                                                <h5 class="card-title">Cơ sở  dữ liệu quá trình phun thuốc cho
                                                    @foreach($product as $products)
                                                        @if($products->id == $detail_diarys->id_product )
                                                            <u>{{ucwords($products->name_product)}}</u>
                                                        @endif
                                                    @endforeach
                                                </h5>
                                                <p class="card-text">(*) Hãy chọn chức năng thêm mới nếu bạn muốn cập nhật tình hình phun thuốc</p>
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Ngày phun</th>
                                                        <th>Loại thuốc</th>
                                                        <th>Liều lượng</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($phunthuoc as $phunthuocs)
                                                            <tr>
                                                                <td>PT0{{$phunthuocs -> id}}</td>
                                                                <td>{{$phunthuocs->ngayphun}}</td>
                                                                <td>{{$phunthuocs->loaithuoc}}</td>
                                                                <td>{{$phunthuocs->luongphun}}</td>
                                                                <td>
                                                                    <button type="button" class="btn mb-2 btn-info" data-toggle="modal" data-target="#edit_phunthuoc" data-whatever="@mdo"><i class="fas fa-edit"></i> Sửa</button>
                                                                    <div class="modal fade" id="edit_phunthuoc" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="varyModalLabel">Chỉnh sửa</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form action="{{route('post_edit_phunthuoc',$phunthuocs->id)}}" method="post">
                                                                                        @csrf
                                                                                        <div class="form-group mb-3">
                                                                                            <label for="exampleInputEmail1">Ngày phun</label>
                                                                                            <input type="date" class="form-control" id="" name="edit_time_bonphan"  placeholder="{{$phunthuocs->ngayphun}}" required>
                                                                                        </div>
                                                                                        <div class="form-group mb-3">
                                                                                            <label for="exampleInputEmail1">Loại thuốc được sử dụng</label>
                                                                                            <input type="text" class="form-control" id="" name="edit_cate_phan"  placeholder="{{$phunthuocs->loaithuoc}}" required>
                                                                                        </div>
                                                                                        <div class="form-group mb-3">
                                                                                            <label for="exampleInputEmail1">liều lượng</label>
                                                                                            <input type="text" class="form-control" id="" name="edit_dinhluong"  placeholder="{{$phunthuocs->luongphun}}" required>
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
                                                                    <a type="button" class="btn mb-2 btn-danger" onclick="xacnhanxoa()" href="{{route('page_delete_pt',$phunthuocs->id)}}">Xóa</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <button type="button" class="btn mb-2 btn-info" data-toggle="modal" data-target="#phunthuocs" data-whatever="@mdo"><i class="fas fa-plus-square"></i> &nbsp;Thêm mới</button>
                                                <div class="modal fade" id="phunthuocs" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="varyModalLabel">Thêm mới nhật ký phun thuốc</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{route('post_phunthuoc',$detail_diarys->id)}}" method="post">
                                                                    @csrf
                                                                    <div class="form-group mb-3">
                                                                        <label for="exampleInputEmail1">Ngày phun</label>
                                                                        <input type="date" class="form-control" id="" name="time_phunthuoc"  required>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="exampleInputEmail1">Tên loại thuốc</label>
                                                                        <input type="text" class="form-control" id="" name="loaithuoc"  required>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="exampleInputEmail1">Lượng phun</label>
                                                                        <input type="text" class="form-control" id="" name="lieuluong"  required>
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
                                            </div>

{{--                                            tinh hinh sau benh--}}
                                            <div class="tab-pane fade" id="thsb" role="tabpanel" aria-labelledby="thsb-tabxx">
                                                <h5 class="card-title">Cơ sở dữ liệu tình hình sâu bệnh của
                                                    @foreach($product as $products)
                                                        @if($products->id == $detail_diarys->id_product )
                                                            <u>{{ucwords($products->name_product)}}</u>
                                                        @endif
                                                    @endforeach
                                                </h5>
                                                <p class="card-text">(*) Hãy chọn chức năng thêm mới nếu bạn muốn cập nhật tình hình sâu bệnh</p>
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Tên bệnh</th>
                                                        <th>Ngày phát hiện</th>
                                                        <th>Loại bệnh</th>
                                                        <th>Triệu trứng</th>
                                                        <th>Ảnh hưởng</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($thsb as $thsbs)
                                                        <tr>
                                                            <td>THSB0{{$thsbs->id}}</td>
                                                            <td>{{$thsbs->date_phathien}}</td>
                                                            <td>{{$thsbs->loaibenh}}</td>
                                                            <td>{{$thsbs->trieutrung}}</td>
                                                            <td>{{$thsbs->anhhuong}}</td>
                                                            <td>
                                                                <button type="button" class="btn mb-2 btn-info" data-toggle="modal" data-target="#edit_thsb" data-whatever="@mdo"><i class="fas fa-edit"></i> Sửa</button>
                                                                <div class="modal fade" id="edit_thsb" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="varyModalLabel">Chỉnh sửa</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form action="{{route('post_edit_thsb',$thsbs->id)}}" method="post">
                                                                                    @csrf
                                                                                    <div class="form-group mb-3">
                                                                                        <label for="exampleInputEmail1">Loại bệnh</label>
                                                                                        <input type="text" class="form-control" id="" name="edit_lb"  placeholder="{{$thsbs->loaibenh}}" required>
                                                                                    </div>
                                                                                    <div class="form-group mb-3">
                                                                                        <label for="exampleInputEmail1">Ngày phát hiện</label>
                                                                                        <input type="date" class="form-control" id="" name="edit_time_lb"  placeholder="{{$thsbs->date_phathien}}" required>
                                                                                    </div>
                                                                                    <div class="form-group mb-3">
                                                                                        <label for="exampleInputEmail1">Triệu trứng</label>

                                                                                        <textarea type="text" class="form-control" id="" name="edit_thsb_tt"  placeholder="{{$thsbs->trieutrung}}" required></textarea>
                                                                                    </div>
                                                                                    <div class="form-group mb-3">
                                                                                        <label for="exampleInputEmail1">Ảnh hưởng tới cây trồng</label>

                                                                                        <textarea type="text" class="form-control" id="" name="edit_thsb_ah"  placeholder="{{$thsbs->anhhuong}}" required></textarea>
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
                                                                <a type="button" class="btn mb-2 btn-danger" onclick="xacnhanxoa()" href="{{route('page_delete_thsb',$thsbs->id)}}">Xóa</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                <button type="button" class="btn mb-2 btn-info" data-toggle="modal" data-target="#thsbxs" data-whatever="@mdo"><i class="fas fa-plus-square"></i> &nbsp;Thêm mới</button>
                                                <div class="modal fade" id="thsbxs" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="varyModalLabel">Thêm mới nhật ký sâu bệnh</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{route('post_thsb',$detail_diarys->id)}}" method="post">
                                                                    @csrf
                                                                    <div class="form-group mb-3">
                                                                        <label for="exampleInputEmail1">Tên bệnh</label>
                                                                        <input type="text" class="form-control" id="" name="loaibenh"  required>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="exampleInputEmail1">Ngày phát hiện</label>
                                                                        <input type="date" class="form-control" id="" name="ngayphathien"  required>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="exampleInputEmail1">Triệu trứng</label>
                                                                        <textarea class="form-control" name="trieutrung" required></textarea>

                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="exampleInputEmail1">Ảnh hưởng</label>
                                                                        <input type="text" class="form-control" id="" name="anhhuong"  required>
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
                                            </div>
{{--                                            thu hoach--}}
                                            <div class="tab-pane fade" id="th" role="tabpanel" aria-labelledby="th-tabxx">
                                                <h5 class="card-title">Cơ sở  dữ liệu tình hình thu hoạch của mô hình
                                                </h5>
                                                <p class="card-text">(*) Hãy chọn chức năng thêm mới nếu bạn muốn cập nhật quá trình thu hoạch trên cây</p>
                                                <table class="table table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Ngày thu hoạch</th>
                                                        <th>Sản lượng(KG)</th>
                                                        <th>Sản lượng bán(KG)</th>
                                                        <th>Giá bán (VNĐ)</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($thuhoach as $thuhoachs)
                                                            <tr>
                                                                <td>TH0{{$thuhoachs->id}}</td>
                                                                <td>{{$thuhoachs->date_thuhoach}}</td>
                                                                <td>{{$thuhoachs->sl_thuhoach}}</td>
                                                                <td>{{$thuhoachs->sl_banra}}</td>
                                                                <td>{{$thuhoachs->giaban}}</td>
                                                                <td>
                                                                    <button type="button" class="btn mb-2 btn-info" data-toggle="modal" data-target="#thuhoachxs" data-whatever="@mdo"><i class="fas fa-edit"></i> Sửa</button>
                                                                    <div class="modal fade" id="thuhoachxs" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="varyModalLabel">Chỉnh sửa</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form action="{{route('post_edit_th',$thuhoachs->id)}}" method="post">
                                                                                        @csrf
                                                                                        <div class="form-group mb-3">
                                                                                            <label for="exampleInputEmail1">Ngày thu hoạch</label>
                                                                                            <input type="date" class="form-control" id="" name="edit_date_th"  placeholder="{{$thuhoachs->date_thuhoach}}" required>
                                                                                        </div>
                                                                                        <div class="form-group mb-3">
                                                                                            <label for="exampleInputEmail1">Sản lượng thu hoạch (kg)</label>
                                                                                            <input type="text" class="form-control" id="" name="edit_thsl"  placeholder="{{$thuhoachs->sl_thuhoach}}" required>
                                                                                        </div>
                                                                                        <div class="form-group mb-3">
                                                                                            <label for="exampleInputEmail1">Sản lượng bán ra (kg)</label>
                                                                                            <input type="text" class="form-control" id="" name="edit_slbr"  placeholder="{{$thuhoachs->sl_banra}}" required>
                                                                                        </div>
                                                                                        <div class="form-group mb-3">
                                                                                            <label for="exampleInputEmail1">Giá bán (VNĐ)</label>
                                                                                            <input type="text" class="form-control" id="" name="edit_thgb"  placeholder="{{$thuhoachs->giaban}}" required>
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
                                                                    <a type="button" class="btn mb-2 btn-danger" onclick="xacnhanxoa()" href="{{route('page_delete_th',$thuhoachs->id)}}">Xóa</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <button type="button" class="btn mb-2 btn-info" data-toggle="modal" data-target="#thuhoach" data-whatever="@mdo"><i class="fas fa-plus-square"></i> &nbsp;Thêm mới</button>
                                                <div class="modal fade" id="thuhoach" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="varyModalLabel">Thêm mới dữ liệu thu hoạch</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{route('post_thuhoach',$detail_diarys->id)}}" method="post">
                                                                    @csrf
                                                                    <div class="form-group mb-3">
                                                                        <label for="exampleInputEmail1">Thời gian thu hoạch</label>
                                                                        <input type="date" class="form-control" id="" name="time_thuhoach"  required>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="exampleInputEmail1">Sản lượng thu hoạch (KG)</label>
                                                                        <input type="text" class="form-control" id="" name="sl_thuhoach"  required>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label for="exampleInputEmail1">Sản lượng bán ra (KG)</label>
                                                                        <input type="text" class="form-control" id="" name="sl_banra"  required>
                                                                    </div>

                                                                    <div class="form-group mb-3">
                                                                        <label for="exampleInputEmail1">Giá bán</label>
                                                                        <input type="text" class="form-control" id="" name="giabanra"  required>
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
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- /.row -->
                            </div> <!-- /.card-body -->
                        </div> <!-- /.card -->
                    @endforeach
                </div> <!-- /.col-12 -->
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
    <script>
        var msg = '{{Session::get('success_add_detail_diary')}}';
        var exist = '{{Session::has('success_add_detail_diary')}}';
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
        var msg = '{{Session::get('success_edit_diary_unit')}}';
        var exist = '{{Session::has('success_edit_diary_unit')}}';
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
                title: 'Đã cập nhật đổi'
            })
        }
    </script>
    <script>
        var msg = '{{Session::get('success_delete_diary')}}';
        var exist = '{{Session::has('success_delete_diary')}}';
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
                title: 'Đã xóa'
            })
        }
    </script>

    <script>
        function xacnhanxoa() {
            alert('Bạn có chắc chắn xóa!');
        }
    </script>
@endsection
