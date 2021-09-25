@extends('client_view.master')
@section('title','Trang chủ')
@section('content')
<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{asset('public/client/img/categories/cat-1.jpg')}}">
                        <h5><a href="#">Name_product</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{asset('public/client/img/categories/cat-2.jpg')}}">
                        <h5><a href="#">Name_product</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{asset('public/client/img/categories/cat-3.jpg')}}">
                        <h5><a href="#">Name_product</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{asset('public/client/img/categories/cat-4.jpg')}}">
                        <h5><a href="#">Name_product</a></h5>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{asset('public/client/img/categories/cat-5.jpg')}}">
                        <h5><a href="#">Name_product</a></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

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
                        <li data-filter=".oranges">Hoa quả</li>
                        <li data-filter=".fresh-meat">Rau củ quả</li>
                        <li data-filter=".vegetables">Thịt, cá, trứng</li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{asset('public/client/img/featured/feature-1.jpg')}}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fas fa-glasses"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Name_product</a></h6>
                        <h5>1xx.xxx VNĐ</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fastfood">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{asset('public/client/img/featured/feature-2.jpg')}}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fas fa-glasses"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Name_product</a></h6>
                        <h5>1xx.xxx VNĐ</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{asset('public/client/img/featured/feature-3.jpg')}}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fas fa-glasses"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Name_product</a></h6>
                        <h5>1xx.xxx VNĐ</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood oranges">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{asset('public/client/img/featured/feature-4.jpg')}}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fas fa-glasses"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Name_product</a></h6>
                        <h5>1xx.xxx VNĐ</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{asset('public/client/img/featured/feature-5.jpg')}}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fas fa-glasses"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Name_product</a></h6>
                        <h5>1xx.xxx VNĐ</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fastfood">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{asset('public/client/img/featured/feature-6.jpg')}}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fas fa-glasses"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Name_product</a></h6>
                        <h5>1xx.xxx VNĐ</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat vegetables">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{asset('public/client/img/featured/feature-7.jpg')}}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fas fa-glasses"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Name_product</a></h6>
                        <h5>1xx.xxx VNĐ</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood vegetables">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{asset('public/client/img/featured/feature-8.jpg')}}">
                        <ul class="featured__item__pic__hover">
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fas fa-glasses"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">Name_product</a></h6>
                        <h5>1xx.xxx VNĐ</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Featured Section End -->

{{--<!-- Banner Begin -->--}}
{{--<div class="banner">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-6 col-md-6 col-sm-6">--}}
{{--                <div class="banner__pic">--}}
{{--                    <img src="{{asset('public/client/img/banner/banner-1.jpg')}}" alt="">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-6 col-md-6 col-sm-6">--}}
{{--                <div class="banner__pic">--}}
{{--                    <img src="{{asset('public/client/img/banner/banner-2.jpg')}}" alt="">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- Banner End -->--}}

<!-- Latest Product Section Begin -->
<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Sản phẩm mới</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('public/client/img/latest-product/lp-1.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Name_product</h6>
                                    <span>1xx.xxx VNĐ</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('public/client/img/latest-product/lp-2.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Name_product</h6>
                                    <span>1xx.xxx VNĐ</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('public/client/img/latest-product/lp-3.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Name_product</h6>
                                    <span>1xx.xxx VNĐ</span>
                                </div>
                            </a>
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('public/client/img/latest-product/lp-1.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Name_product</h6>
                                    <span>1xx.xxx VNĐ</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('public/client/img/latest-product/lp-2.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Name_product</h6>
                                    <span>1xx.xxx VNĐ</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('public/client/img/latest-product/lp-3.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Name_product</h6>
                                    <span>1xx.xxx VNĐ</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Xiếp hạng tốt nhất</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('public/client/img/latest-product/lp-1.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Name_product</h6>
                                    <span>1xx.xxx VNĐ</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('public/client/img/latest-product/lp-2.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Name_product</h6>
                                    <span>1xx.xxx VNĐ</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('public/client/img/latest-product/lp-3.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Name_product</h6>
                                    <span>1xx.xxx VNĐ</span>
                                </div>
                            </a>
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('public/client/img/latest-product/lp-1.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Name_product</h6>
                                    <span>1xx.xxx VNĐ</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('public/client/img/latest-product/lp-2.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Name_product</h6>
                                    <span>1xx.xxx VNĐ</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('public/client/img/latest-product/lp-3.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Name_product</h6>
                                    <span>1xx.xxx VNĐ</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Đánh giá bởi người dùng</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('public/client/img/latest-product/lp-1.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Name_product</h6>
                                    <span>1xx.xxx VNĐ</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('public/client/img/latest-product/lp-2.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Name_product</h6>
                                    <span>1xx.xxx VNĐ</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('public/client/img/latest-product/lp-3.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Name_product</h6>
                                    <span>1xx.xxx VNĐ</span>
                                </div>
                            </a>
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('public/client/img/latest-product/lp-1.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Name_product</h6>
                                    <span>1xx.xxx VNĐ</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('public/client/img/latest-product/lp-2.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Name_product</h6>
                                    <span>1xx.xxx VNĐ</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{asset('public/client/img/latest-product/lp-3.jpg')}}" alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>Name_product</h6>
                                    <span>1xx.xxx VNĐ</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Latest Product Section End -->

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

