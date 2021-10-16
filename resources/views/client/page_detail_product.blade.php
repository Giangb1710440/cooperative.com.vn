@extends('client_view.master')
@foreach($product_detail as $product_details)
    @section('title',$product_details->name_product)
@endforeach

@section('content')
    <!-- Breadcrumb Section Begin -->
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
                @php($catep = DB::table('product_caterogys')->get())
                @foreach($product_detail as $product_details)
                    @foreach($catep as $cateps)
                        @if($cateps->id == $product_details->id_cate_product)
                            <div>{{strtoupper($cateps->name_cate_product)}}</div>
                        @endif
                    @endforeach

                @endforeach
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                @php($unit = DB::table('units')->get())
                @foreach($product_detail as $product_details)
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__pic">
                            <div class="product__details__pic__item">
                                    @foreach((array)json_decode($product_details->image_product,true) as $images)
                                    <img width="450px" height="340px" class="product__details__pic__item--large"
                                         src="{{asset('public/uploads/'.$images)}}" alt="">
                                        @break
                                    @endforeach
                            </div>
{{--                            <div class="product__details__pic__slider owl-carousel">--}}
{{--                                @foreach((array)json_decode($product_details->image_product,true) as $images)--}}
{{--                                    <img width="97px" height="65px" data-imgbigurl="{{asset('public/uploads/'.$images)}}"--}}
{{--                                     src="{{asset('public/uploads/'.$images)}}" alt="">--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__text">
                            <form action="{{route('addCard',$product_details->id)}}" method="get">
                                @csrf
                                <h3>{{$product_details->name_product}}</h3>
                                <div class="product__details__rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <span>(18 đánh giá)</span>
                                </div>
                                    @if($product_details->sale == 0)
                                        <div class="product__details__price">{{number_format($product_details->sale_price_product)}} VNĐ</div>
                                    @else
                                        <div style="text-align: left" class="product__discount__item__text">
                                            <div style="font-size: 30px;color: #dd2222;font-weight: 600;margin-bottom: 15px;" class="product__item__price">{{number_format(ceil($product_details->sale_price_product -($product_details->sale_price_product*($product_details->sale/100))))}} VNĐ
                                                <span style="font-size: 20px">{{number_format($product_details->sale_price_product)}} VNĐ</span>
                                            </div>
                                        </div>
                                    @endif
                                <div class="product__details__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="1" name="qty_product">
                                        </div>
                                    </div>
                                </div>
{{--                                <a  ><i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng</a>--}}
                                <button class="primary-btn"><i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng</button>
                                <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                            </form>
                            <ul>
                                <li><b>Tình trạng</b> <span>còn hàng</span></li>
                                <li><b>Vận chuyển</b> <span>Miễn ship cho đơn trong  <samp>phạm vi 5km.</samp></span></li>
                                <li><b>Đơn vị</b>
                                    @foreach($unit as $units)
                                        @if($units->id == $product_details->id_unit)
                                            <span>{{strtoupper($units->name_unit)}}</span>
                                        @endif
                                    @endforeach
                                </li>
                                <li><b>Chia sẻ</b>
                                    <div class="share">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"--}}
{{--                                       aria-selected="true">Mô tả sản phẩm</a>--}}
{{--                                </li>--}}
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-2" role="tab"
                                       aria-selected="false">Thông tin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                       aria-selected="false">Đánh giá <span></span></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-2" role="tabpanel">
                                    <div class="product__details__tab__desc">
                                        <h6>Mô tả sản phẩm</h6>
                                        <p>{{$product_details->description_product}}</p>

                                    </div>
                                </div>

                                <div class="tab-pane" id="tabs-3" role="tabpanel">
                                    <div id="fb-root"></div>
                                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="K5JNo5F2"></script>
                                    <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#http://localhost/cooperative.com.vn/page-detail-product/{{$product_details->id}}" data-width="500" data-numposts="0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->

    @foreach($product_detail as $product_details)
        @php($product_lq = DB::table('products')->where('id_cate_product','=',$product_details->id_cate_product )->take(4)->latest()->get())
        <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($product_lq as $product_lqs)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product__item">
                            @foreach((array)json_decode($product_lqs->image_product,true) as $images)
                                <div class="product__item__pic set-bg" data-setbg="{{asset('public/uploads/'.$images)}}">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="{{route('page_detail_product',$product_lqs->id)}}"><i class="far fa-eye"></i></a></li>
                                        <li><a href="{{route('addCard_qty',$product_lqs->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                @break
                            @endforeach
                            <div class="product__item__text">
                                <h6><a href="{{route('page_detail_product',$product_lqs->id)}}">{{$product_lqs->name_product}}</a></h6>
                                <h5>{{$product_lqs->sale_price_product}} VNĐ</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endforeach
@endsection
