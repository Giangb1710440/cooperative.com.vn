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
                            <form action="{{route('post_checkout')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-8 col-md-6">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="checkout__input">
                                                    <p>Họ Tên<span>*</span></p>
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
                                                <textarea class="" id="w3review" name="ghichu" cols="74">Ghi chú trống</textarea>
                                            </div>
                                        </div>
                                        <div class="checkout__input__checkbox">
                                            <label for="diff-acc1">
                                                Nhận hàng tại Gos - Cooperative ?
                                                <input type="checkbox" name="htgh" id="diff-acc1" checked value="1">
                                                <span class="checkmark"></span>
                                            </label>
                                            <br>
                                            <label for="diff-acc2">
                                                Giao hàng ?
                                                <input type="checkbox" name="htgh" id="diff-acc2" value="2">
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
                                                    <li>{{$product['item']['name_product']}} <span>{{number_format($product['price'])}} VNĐ</span></li>
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
                                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                            <input type="hidden" value="{{$totalPrice}}" name="total_order">
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
