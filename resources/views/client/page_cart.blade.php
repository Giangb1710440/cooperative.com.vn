@extends('client_view.master')
@section('title','Giỏ hàng')
@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('public/client/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Giỏ hàng</h2>
                        <div class="breadcrumb__option">
                            <a href="{{route('home')}}">Home</a>
                            <span>Giỏ hàng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    @php($unit = DB::table('units')->get())
    <section class="shoping-cart spad">
        <div class="container">
            @if(Auth::check())
                @if(Session::has('cart'))
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shoping__cart__table">
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="shoping__product">Sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Đơn vị</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($product_cart as $product)
                                        <tr>
                                            <td class="shoping__cart__item">
                                                @foreach((array)json_decode($product['item']['image_product'],true) as $images)
                                                    <a href="{{route('page_detail_product',$product['item']['id'])}}"><img height="70px" width="90px" src="{{asset('public/uploads/'.$images)}}" alt=""></a>
                                                    @break
                                                @endforeach
                                                <h5>{{$product['item']['name_product']}}</h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                {{number_format($product['item']['sale_price_product'])}} VNĐ
                                            </td>
                                            <td class="shoping__cart__price">
                                                @foreach($unit as $units)
                                                    @if($units->id == $product['item']['id_unit'])
                                                        {{$units->name_unit}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <input style="max-width: 60px" type="number" id="txt_solg" name="txt_solg"
                                                       value="{{$product['qty']}}"
                                                       onchange="update_cart({{ $product['item']['id']}} + ',' + this.value)">
                                            </td>
                                            <td class="shoping__cart__total">
                                                {{number_format($product['item']['sale_price_product']*$product['qty'])}} VNĐ
                                            </td>
                                            <td class="shoping__cart__item__close">
                                                <a onclick="return   xacnhanxoa('Bạn chắc chắn xóa')"
                                                   href="{{ route('getDeleteCart',$product['item']['id']) }}"
                                                   class="btn btn-danger"
                                                   data-toggle="tooltip">
                                                    <span class="icon_close"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shoping__cart__btns">
                                <a href="{{route('page_product',0)}}" class="primary-btn cart-btn">Tiếp tục mua hàng</a>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="shoping__continue">
                                <div class="shoping__discount">
                                    <h5>Mã giảm giá</h5>
                                    <form action="#">
                                        <input type="text" placeholder="Nhập mã giảm giá">
                                        <button type="submit" class="site-btn">Áp dụng</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="shoping__checkout">
                                <h5>Tổng tiền</h5>
                                <ul>
                                    <li> Chiết khấu<span>0 VNĐ</span></li>
                                    <li>Thành tiền <span>{{number_format($totalPrice)}} VNĐ</span></li>
                                </ul>
                                <a href="{{route('page_checkout')}}" class="primary-btn">Đặt hàng</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                <tr>
                                    <th class="shoping__product" colspan="5">Chưa có sản phẩm trong giỏ hàng</th>

                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                @endif
            @else
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th class="shoping__product" colspan="5">Bạn chưa đăng nhập</th>

                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <script>
        function update_cart(e) {
            var ele = e.split(",");
            var ktra = document.getElementById('txt_solg').value;
            if(ktra > 0 && ktra < 100){
                $.ajax({
                    method: "get",
                    url: '{{ route('getUpdateCart') }}',
                    data: {_token: '{{ csrf_token() }}',
                        id: ele[0],
                        quantity: ele[1]},

                    success: function (result) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 600,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'success',
                            title: 'Đã cập nhật giỏ hàng'
                        });
                        window.setTimeout(function(){
                            window.location.reload();
                        } ,600);
                    }
                });
            }else{
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 1000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'info',
                    title: 'Số lượng không hợp lệ'
                });
                document.getElementById('txt_solg').value = 1;
            }
        }
    </script>

    <!-- Shoping Cart Section End -->
@endsection
