@extends('client_view.master')

@foreach($product as $products)
    @section('title','Tìm kiếm - '.$keyWord)
@endforeach
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
                <div>Tìm kiếm</div>
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
                                    <h6><span>{{$count}}</span> Sản phẩm được tìm thấy</h6>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        @foreach($product as $products)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__discount__item">
                                    @foreach((array)json_decode($products->image_product,true) as $images)
                                        <div class="product__discount__item__pic set-bg"
                                             data-setbg="{{asset('public/uploads/'.$images)}}">
                                            <div class="product__discount__percent">-{{$products->sale}}%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="{{route('page_detail_product',$products->id)}}"><i class="far fa-eye"></i></a></li>
                                                <li><a href="{{route('addCard_qty',$products->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        @break
                                    @endforeach
                                    <div class="product__discount__item__text">
                                        <h5><a href="{{route('page_detail_product',$products->id)}}">{{$products->name_product}}</a></h5>
                                        <div class="product__item__price">{{number_format(ceil($products->sale_price_product -($products->sale_price_product*($products->sale/100))))}} VNĐ <span>{{number_format($products->sale_price_product)}} VNĐ</span></div>
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
