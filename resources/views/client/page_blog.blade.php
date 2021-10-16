@extends('client_view.master')
@section('title','Tin tức')
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
                <div>Blog-Tin tức</div>

            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__item">
                            <h4>Sản phẩm</h4>
                            <ul>
                                @php($cate_product = DB::table('product_caterogys')->get())
                                @foreach($cate_product as $cate_products)
                                    <li><a href="{{route('page_product',$cate_products->id)}}">{{ucwords($cate_products->name_cate_product)}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Tin nổi bật</h4>
                            <div class="blog__sidebar__recent">
                                <a href="#" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="{{asset('public/uploads/blog/bog5.jpg')}}" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>ĂN TRÁI CÂY SAI CÁCH KHIẾN </h6>
                                        <span>06/01/2021 14:36:30</span>
                                    </div>
                                </a>
                                <a href="#" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="{{asset('public/uploads/blog/blog4.jpg')}}" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>TÁC DỤNG TỐT TỪ TRÁI KIWI<br /> </h6>
                                        <span>03/10/2021 15:40:50</span>
                                    </div>
                                </a>
                                <a href="#" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="{{asset('public/uploads/blog/blog2.jpg')}}" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>7 LOẠI TRÁI CÂY GIÚP TĂNG CƯỜNG TRÍ NHỚ <br /></h6>
                                        <span>07/10/2011 20:57:04</span>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="{{asset('public/uploads/blog/blog1.jpg')}}" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> 14/10/2021 20:16:51</li>
                                        <li><i class="fa fa-comment-o"></i> 5</li>
                                    </ul>
                                    <h5><a href="#">Lý do nên chọn các sản phẩm tại Hệ thống cửa hàng Trái cây GOS-COOPERATIVE</a></h5>
                                    <p>Trái cây tươi, các loại rau củ và bánh kẹo,… luôn đảm bảo nguồn gốc, xuất xứ rõ ràng và có giấy chứng nhận kèm theo. </p>
                                    <a href="#" class="blog__btn">Xem thêm <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="{{asset('public/uploads/blog/blog2.jpg')}}" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> 07/10/2011 20:57:04</li>
                                        <li><i class="fa fa-comment-o"></i> 2</li>
                                    </ul>
                                    <h5><a href="#">7 LOẠI TRÁI CÂY GIÚP TĂNG CƯỜNG TRÍ NHỚ
                                        </a></h5>
                                    <p>Càng có tuổi, nhiều người lo lắng trí nhớ của mình bị suy giảm. Các loại hoa quả dưới đây giàu vitamin C, A, E... giúp cải thiện trí nhớ và giúp não hoạt động tốt, giảm lo âu phiền muộn đồng thời cung cấp năng lượng cần thiết cho cơ thể. </p>
                                    <a href="#" class="blog__btn">Xem thêm <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="{{asset('public/uploads/blog/blog3.jpg')}}" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> 03/10/2011 15:40:50</li>
                                        <li><i class="fa fa-comment-o"></i> 10</li>
                                    </ul>
                                    <h5><a href="#">ĂN NHO CÓ TÁC DỤNG GÌ??</a></h5>
                                    <p>Nhiều người không biết rằng, nho có tác dụng ngăn ngừa sự hình thành huyết khối tốt hơn cả aspirin, đồng thời làm giảm lượng cholesterol huyết thanh </p>
                                    <a href="#" class="blog__btn">Xem thêm <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="{{asset('public/uploads/blog/blog4.jpg')}}" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> 30/03/2021 08:19:18</li>
                                        <li><i class="fa fa-comment-o"></i> 5</li>
                                    </ul>
                                    <h5><a href="#">VÌ SAO NÊN ĂN QUẢ CHERRY DÙ ĐẮT ĐỎ?
                                        </a></h5>
                                    <p>Các thành phần trong trái cherry rất tốt cho mắt, giúp bạn ngủ ngon hơn, cải thiện hệ tiêu hóa, ngăn ngừa ung thư.. </p>
                                    <a href="#" class="blog__btn">Xem thêm <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="{{asset('public/uploads/blog/bog5.jpg')}}" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> 06/01/2021 14:36:30</li>
                                        <li><i class="fa fa-comment-o"></i> 5</li>
                                    </ul>
                                    <h5><a href="#">ĂN TRÁI CÂY SAI CÁCH KHIẾN </a></h5>
                                    <p>Không phải cứ ăn nhiều trái cây là sẽ đẹp da, mà bạn phải biết.... </p>
                                    <a href="#" class="blog__btn">Xem thêm <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="product__pagination blog__pagination">
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->


    <!-- Shoping Cart Section End -->
@endsection
