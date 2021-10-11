@extends('client_view.master')
@section('title','Trang chủ')
@section('content')

<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản phẩm nổi bật</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">Tất cả</li>
                        <li data-filter=".oranges">Trái cây</li>
                        <li data-filter=".fresh-meat">Rau củ quả</li>
                        <li data-filter=".vegetables">Thịt, cá, trứng</li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach($product_flu as $product_flus)
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges">
                    <div class="featured__item">
                        @foreach((array)json_decode($product_flus ->image_product,true) as $images)
                            <div class="featured__item__pic set-bg" data-setbg="{{asset('public/uploads/'.$images)}}">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="far fa-eye"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            @break
                        @endforeach
                        <div class="featured__item__text">
                            <h6><a href="#">{{$product_flus->name_product}}</a></h6>
                            <h5>{{number_format($product_flus->sale_price_product)}} VNĐ</h5>
                        </div>
                    </div>
                </div>
            @endforeach
            @foreach($product_ve as $product_ves)
                 <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat">
                <div class="featured__item">
                    @foreach((array)json_decode($product_ves ->image_product,true) as $images)
                        <div class="featured__item__pic set-bg" data-setbg="{{asset('public/uploads/'.$images)}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="far fa-eye"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        @break
                    @endforeach
                    <div class="featured__item__text">
                        <h6><a href="#">{{$product_ves->name_product}}</a></h6>
                        <h5>{{number_format($product_ves->sale_price_product)}} VNĐ</h5>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- Blog Section Begin -->
<section class="from-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title from-blog__title">
                    <h2>Blog chia sẽ</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="{{asset('public/client/img/blog/blog-1.jpg')}}" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> 13/09/1999</li>
                            <li><i class="fa fa-comment-o"></i> 8</li>
                        </ul>
                        <h5><a href="#">Mẹo hay nấu ăn</a></h5>
                        <p>Thời gian bận rộn, đôi khi bạn chỉ cần một bữa ăn đơn giản để quên đi mệt mõi </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="{{asset('public/client/img/blog/blog-2.jpg')}}" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> 13/09/1999</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">6 món ăn sáng cực đơn giản cho gia đình</a></h5>
                        <p>Một bữa ăn sáng để cung cấp thật đầy đủ chất dinh dưỡng cho cả gia đình vào mỗi buổi sáng </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="{{asset('public/client/img/blog/blog-3.jpg')}}" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> 13/09/1999</li>
                            <li><i class="fa fa-comment-o"></i> 5</li>
                        </ul>
                        <h5><a href="#">Tham quan kho hàng của Gos - Cooperative</a></h5>
                        <p>Vệ sinh, an toàn luôn là những tiêu chí hàng đầu mà chúng tôi đặt ra </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Section End -->
@endsection

