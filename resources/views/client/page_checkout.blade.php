@extends('client_view.master')
@section('title','Thanh toán')
@section('content')

    @if(Auth::check())
        @if(Session::has('cart'))
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
                        <div>Thanh toán</div>
                    </div>
                </div>
            </section>
                <section class="checkout spad">
                    <div class="container">
                        <div class="checkout__form">
                            <form action="{{route('post_checkout')}}" method="post" >
                                @csrf
                                <div class="row">

                                    <ul style="width: 100%;display: flex;" class="nav nav-tabs text-center" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                               aria-selected="false"><h5><b>Đặt hàng và nhận hàng tại cửa hàng</b></h5></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                               aria-selected="false"><h5><b>Đặt hàng và thanh toán VNPAY</b></h5></a>
                                        </li>
                                    </ul>
                                </div>
                                <br>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-6">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="checkout__input">
                                                            <p>Họ Tên <span>*</span></p>
                                                            <input type="text" name="name_ck" value="{{ucwords(Auth::user()->name_user)}}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="checkout__input">
                                                    <p>Địa chỉ<span>*</span></p>
                                                    <input type="text" name="address_ck"  class="checkout__input__add" value="{{ Auth::user()->address_user }}">
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="checkout__input">
                                                            <p>Số điện thoại<span>*</span></p>
                                                            <input type="text" name="phone_ck" value="{{Auth::user()->phone_user}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="checkout__input">
                                                            <p>Email<span>*</span></p>
                                                            <input type="text" name="email_ck" value="{{Auth::user()->email }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <p>Ghi chú<span>*</span></p>
                                                        <textarea id="ghichu" name="ghichu" cols="74">Ghi chú trống</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="checkout__order">
                                                    <h4>Đơn hàng của bạn</h4>
                                                    <div class="checkout__order__products">Sản phẩm <span>Tổng tiền</span></div>
                                                    <ul>
                                                        @foreach($product_cart as $product)
                                                            <li>{{$product['item']['name_product']}} <span>{{number_format($product['price'])}} VNĐ</span></li>
                                                        @endforeach
                                                    </ul>
                                                    <div class="checkout__order__subtotal">Giảm giá <span>0 VNĐ</span></div>
                                                    <div class="checkout__order__total">Tổng đơn hàng <span>{{number_format($totalPrice)}} VNĐ</span></div>

                                                    <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                                    <input type="hidden" value="{{$totalPrice}}" name="total_order">
                                                    <button type="submit" class="site-btn">Đặt hàng</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tabs-2" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-6">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="checkout__input">
                                                            <p><strong><u>Thông tin đặt hàng</u></strong><span>*</span></p>
                                                            <input type="text" name="name_vnpay" value="{{ucwords(Auth::user()->name_user)}} - {{ucwords(Auth::user()->address_user)}} - {{ucwords(Auth::user()->phone_user)}}" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p><strong><u>Thông tin thanh toán</u></strong><span>*</span></p>
                                                <div class="row">
                                                    <div class="col-lg-5">
                                                        <div class="checkout__input">
                                                            <p><strong>Mã hóa đơn</strong><span>*</span></p>
                                                            <input type="text" name="phone_vnpay" value="<?php echo date("YmdHis") ?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <div class="checkout__input">
                                                            <p><strong>Nội dung thanh toán</strong><span>*</span></p>
                                                            <input maxlength="32" type="text" name="note_vnpay" value="THANHTOANHOADON" >
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-5">
                                                        <div class="checkout__input">
                                                            <p><strong>Loại dịch vụ thanh toán</strong><span>*</span></p>
                                                            <input type="text" name="cate_pay" value="Thanh toán hóa đơn" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="checkout__input">
                                                            <p><strong>Ngân hàng</strong><span>*</span></p>
                                                            <select name="bank_code" id="bank_code">
                                                                <option value="0">Không chọn</option>
                                                                <option value="NCB"> Ngan hang NCB</option>
                                                                <option value="AGRIBANK"> Ngan hang Agribank</option>
                                                                <option value="SCB"> Ngan hang SCB</option>
                                                                <option value="SACOMBANK">Ngan hang SacomBank</option>
                                                                <option value="EXIMBANK"> Ngan hang EximBank</option>
                                                                <option value="MSBANK"> Ngan hang MSBANK</option>
                                                                <option value="NAMABANK"> Ngan hang NamABank</option>
                                                                <option value="VNMART"> Vi dien tu VnMart</option>
                                                                <option value="VIETINBANK">Ngan hang Vietinbank</option>
                                                                <option value="VIETCOMBANK"> Ngan hang VCB</option>
                                                                <option value="HDBANK">Ngan hang HDBank</option>
                                                                <option value="DONGABANK"> Ngan hang Dong A</option>
                                                                <option value="TPBANK"> Ngân hàng TPBank</option>
                                                                <option value="OJB"> Ngân hàng OceanBank</option>
                                                                <option value="BIDV"> Ngân hàng BIDV</option>
                                                                <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                                                                <option value="VPBANK"> Ngan hang VPBank</option>
                                                                <option value="MBBANK"> Ngan hang MBBank</option>
                                                                <option value="ACB"> Ngan hang ACB</option>
                                                                <option value="OCB"> Ngan hang OCB</option>
                                                                <option value="IVB"> Ngan hang IVB</option>
                                                                <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <div class="checkout__input">
                                                            <p><strong>Ngôn ngữ</strong><span>*</span></p>
                                                            <select name="language" id="language">
                                                                <option value="vn">Tiếng Việt</option>
                                                                <option value="en">English</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6">
                                                <div class="checkout__order">
                                                    <h4>Đơn hàng của bạn</h4>
                                                    <div class="checkout__order__products">Sản phẩm <span>Tổng tiền</span></div>
                                                    <ul>
                                                        @foreach($product_cart as $product)
                                                            <li>{{$product['item']['name_product']}} <span>{{number_format($product['price'])}} VNĐ</span></li>
                                                        @endforeach
                                                    </ul>
                                                    <div class="checkout__order__subtotal">Giảm giá <span>0 VNĐ</span></div>
                                                    <div class="checkout__order__total">Tổng đơn hàng <span>{{number_format($totalPrice)}} VNĐ</span></div>

                                                    <input type="hidden" value="{{ Auth::user()->id }}" name="user_vnpay">
                                                    <input type="hidden" value="{{$totalPrice}}" name="total_order_vnpay">
                                                    <button type="submit" class="site-btn">Thanh toán</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </section>
        @else
            <section class="checkout spad">
                <div class="container">
                    <div class="checkout__form">
                        <h4>Giỏ hàng rỗng</h4>
                    </div>
                </div>
            </section>
        @endif
    @else
        <section class="checkout spad">
            <div class="container">
                <div class="checkout__form">
                    <h4>Giỏ hàng rỗng</h4>
                </div>
            </div>
        </section>
    @endif
    <!-- Checkout Section End -->

@endsection
