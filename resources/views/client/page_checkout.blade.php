@extends('client_view.master')
@section('title','Thanh toán')
@section('content')

    @if(Auth::check())
        @if(Session::has('cart'))
            <section class="breadcrumb-section set-bg" data-setbg="{{asset('public/client/img/breadcrumb.jpg')}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="breadcrumb__text">
                                <h2>Thanh toán</h2>
                                <div class="breadcrumb__option">
                                    <a href="{{route('home')}}">Home</a>
                                    <span>Thanh toán</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


                <section class="checkout spad">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <h6><span class="icon_tag_alt"></span> Bạn có mã giảm giá? <a href="#">Bấm vào đây </a> để áp dụng mã giảm giá
                                </h6>
                            </div>
                        </div>
                        <div class="checkout__form">
                            <h4>Chi tiết thanh toán</h4>
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-8 col-md-6">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="checkout__input">
                                                    <p>Họ Tên<span>*</span></p>
                                                    <input type="text">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="checkout__input">
                                            <p>Địa chỉ<span>*</span></p>
                                            <input type="text" placeholder="Địa chỉ của bạn" class="checkout__input__add">
                                            <input type="text" placeholder="Địa chỉ cụ thể">
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="checkout__input">
                                                    <p>Số điện thoại<span>*</span></p>
                                                    <input type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="checkout__input">
                                                    <p>Email<span>*</span></p>
                                                    <input type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="checkout__input__checkbox">
                                            <label for="acc">
                                                Tạo tài khoản?
                                                <input type="checkbox" id="acc">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <p>Tạo tài khoản bằng cách nhập thông tin bên dưới, nếu bạn đã có tài khoản vui lòng đăng nhập ở đầu trang</p>
                                        <div class="checkout__input">
                                            <p>Mật khẩu tài khoản<span>*</span></p>
                                            <input type="text">
                                        </div>
                                        <div class="checkout__input__checkbox">
                                            <label for="diff-acc">
                                                Giao hàng đến địa chỉ khác ?
                                                <input type="checkbox" id="diff-acc">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                        <div class="checkout__input">
                                            <p>Nhập địa chỉ<span>*</span></p>
                                            <input type="text"
                                                   placeholder="Ghi đầy đủ thông tin địa chỉ giao đến">
                                        </div>
                                        <div class="checkout__input__checkbox">
                                            <label for="diff-acc1">
                                                Nhận hàng tại Gos - Cooperative ?
                                                <input type="checkbox" id="diff-acc1">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="checkout__order">
                                            <h4>Đơn hàng của bạn</h4>
                                            <div class="checkout__order__products">Sản phẩm <span>Tổng tiền</span></div>
                                            <ul>
                                                @foreach($product_cart as $product)
                                                    <li>{{$product['item']['name_product']}} <span>{{number_format($product['item']['sale_price_product']*$product['qty'])}} VNĐ</span></li>
                                                @endforeach
                                            </ul>
                                            <div class="checkout__order__subtotal">Giảm giá <span>0 VNĐ</span></div>
                                            <div class="checkout__order__total">Tổng đơn hàng <span>{{number_format($totalPrice)}} VNĐ</span></div>

                                            <div class="checkout__input__checkbox">
                                                <label for="payment">
                                                    Thanh toán tại cửa hàng
                                                    <input checked type="checkbox" id="payment" >
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>

                                            <button type="submit" class="site-btn">Đặt hàng</button>
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
