@extends('client_view.master')
@section('title','Sản phẩm')
@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg">
    <div class="container">
            <hr style="size: 1px">
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row" style="padding-bottom: 45px">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Lựa chọn cho bạn</h4>
                        <ul>
                            @php($cate_product = DB::table('product_caterogys')->get())
                            @foreach($cate_product as $cate_products)
                                <li><a href="{{route('page_product',$cate_products->id)}}">{{ucwords($cate_products->name_cate_product)}}</a></li>
                            @endforeach
                        </ul>
                    </div>


                    <div class="sidebar__item">
                        <h4>Loại hàng</h4>
                        <div class="sidebar__item__size">
                            <label for="large">
                                Bảo quản lạnh
                                <input type="radio" id="large">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="medium">
                                Bảo quản đông
                                <input type="radio" id="medium">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="small">
                                Sỉ tại vườn
                                <input type="radio" id="small">
                            </label>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <style>
                            div.tieude_giua1
                            {
                                color: #fff;
                                font-size: 16px;
                                height: 37px;
                                line-height: 37px;

                                text-transform: uppercase;
                                border-bottom: 1px solid #ee4d2d;
                                margin-bottom: 5px;
                                font-family:Tahoma, Geneva, sans-serif;
                            }
                            div.tieude_giua1 div {
                                float: left;
                                background: coral;
                                padding: 0px 20px;
                                min-width: 170px;
                                position: relative;
                            }
                            div.tieude_giua1 div:before {
                                position: absolute;
                                right: -37px;
                                top: 0px;
                                height: 0;
                                width: 0;
                                content: '';
                                border-top: 37px solid transparent;
                                border-left: 37px solid coral;
                            }
                        </style>
                        <div class="tieude_giua1">
                            <div>Giảm giá  <p style="margin-left: 200px; color: white"><i class="fas fa-shopping-cart"></i> Sale Lớn mùa dịch</p> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            @php($product_sale = DB::table('products')->where('sale','!=',0)->get())
                            @foreach($product_sale as $key => $product_sales)
                                @php($key += 1)
                                @if($key < 5)
                                    <div class="col-lg-4">
                                        <div class="product__discount__item">
                                            @foreach((array)json_decode($product_sales->image_product,true) as $images)
                                                <div class="product__discount__item__pic set-bg"
                                                     data-setbg="{{asset('public/uploads/'.$images)}}">
                                                    <div class="product__discount__percent">-{{$product_sales->sale}}%</div>
                                                    <ul class="product__item__pic__hover">
                                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                        <li><a href="{{route('page_detail_product',$product_sales->id)}}"><i class="far fa-eye"></i></a></li>
                                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                                    </ul>
                                                </div>
                                                @break
                                            @endforeach
                                            <div class="product__discount__item__text">
                                                <h5><a href="{{route('page_detail_product',$product_sales->id)}}">{{$product_sales->name_product}}</a></h5>
                                                <div class="product__item__price">{{number_format(ceil($product_sales->sale_price_product -($product_sales->sale_price_product*($product_sales->sale/100))))}} VNĐ <span>{{number_format($product_sales->sale_price_product)}} VNĐ</span></div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            div.tieude_giua
            {
                color: #fff;
                font-size: 16px;
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
            @if(Session::has('tieude'))
                <div>{{Session::get('tieude')}}</div>
            @else
                <div>Không tìm thấy sản phẩm</div>
            @endif
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="filter__sort">
                                <span>Sắp xiếp</span>
                                <select>
                                    <option value="0">Giá tăng dần</option>
                                    <option value="0">Giá giảm dần</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>{{count($product)}}</span> Sản phẩm được tìm thấy</h6>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    @foreach($product as $products)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            @foreach((array)json_decode($products->image_product,true) as $images)
                                <div class="product__item__pic set-bg" data-setbg="{{asset('public/uploads/'.$images)}}">
                                    <ul class="product__item__pic__hover">
                                        <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="far fa-eye"></i></a></li>
                                        <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                @break
                            @endforeach
                            <div class="product__item__text">
                                <h6><a href="#">{{$products->name_product}}</a></h6>
                                <h5>{{number_format($products->sale_price_product)}} VNĐ</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="product__pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
@endsection
