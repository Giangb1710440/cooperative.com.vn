<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>
@if(Auth::check())
    <header class="header">
        <div class="header__top" style="background-color: rgba(97, 173, 4, 0.89);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> giang@gmail.com</li>
                                <li>Free ship cho đơn hàng từ 99k</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </div>

                        </div>
                    </div>

                    <div class="col-ld-1 col-md-1">
                        <style>
                            .dropbtn {
                                margin-top: 6px;
                                width: 50%;
                                height: 50%;
                                border-radius: 90px;
                                background-color: #1b1e21;
                                color: white;
                                padding: 0px;
                                border: none;
                                cursor: pointer;
                            }

                            .dropbtn:hover, .dropbtn:focus {
                                background-color: #2bbb8b;
                            }

                            .dropdown {
                                position: relative;
                                display: inline-block;

                            }

                            .dropdown-content {
                                display: none;
                                position: absolute;
                                background-color: #f1f1f1;
                                min-width: 200px;
                                overflow: auto;
                                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                                z-index: 1;
                            }

                            .dropdown-content a {
                                margin-top: 10px;
                                color: black;
                                padding: 14px 16px;
                                text-decoration: none;
                                display: block;
                            }

                            .dropdown a:hover {background-color: #7fad39;}

                            .show {display: block;}
                        </style>
                        <div class="dropdown">
                            <img  onclick="myFunction()" class="dropbtn" src="{{asset('public/server/assets/avatars/face-1.jpg')}}" alt="...">

                            <div id="myDropdown" class="dropdown-content">
                                <a href="#home"><i class="fas fa-user"></i>&nbsp{{ucwords(Auth::user()->name_user)}}</a>
                                <a href="#about"><i class="fas fa-user"></i> Lịch sử mua</a>
                                <a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                            </div>
                        </div>
                        <script>
                            /* When the user clicks on the button,
                            toggle between hiding and showing the dropdown content */
                            function myFunction() {
                                document.getElementById("myDropdown").classList.toggle("show");
                            }

                            // Close the dropdown if the user clicks outside of it
                            window.onclick = function(event) {
                                if (!event.target.matches('.dropbtn')) {
                                    var dropdowns = document.getElementsByClassName("dropdown-content");
                                    var i;
                                    for (i = 0; i < dropdowns.length; i++) {
                                        var openDropdown = dropdowns[i];
                                        if (openDropdown.classList.contains('show')) {
                                            openDropdown.classList.remove('show');
                                        }
                                    }
                                }
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{route('home')}}"><img src="{{asset('public/server/assets/avatars/GosCooperativehome.jpg')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class=""><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('page_product',0)}}">Sản phẩm</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{route('page_product',0)}}">Tất cả sản phẩm</a></li>
                                    <li><a href="{{route('page_product',4)}}"><i class="fas fa-fish"></i> Thịt, Cá, Trứng</a></li>
                                    <li><a href="{{route('page_product',1)}}"><i class="fas fa-apple-alt"></i> Trái cây</a></li>
                                    <li><a href="{{route('page_product',2)}}"><i class="fas fa-carrot"></i> Rau củ</a></li>
                                    <li><a href="{{route('page_product',3)}}"><i class="fab fa-servicestack"></i> Gạo </a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('page_discount')}}">Khuyến mãi</a>

                            </li>
                            <li><a href="{{route('page_news')}}">Tin tức</a></li>
                            <li><a href="{{route('page_contact')}}">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            @if(Session::has('cart'))
                                <li><a href="{{route('page_cart')}}"><i class="fa fa-shopping-bag"></i> <span>{{count($product_cart)}}</span></a></li>
                            @else
                                <li><a href="{{route('page_cart')}}"><i class="fa fa-shopping-bag"></i> <span>0</span></a></li>
                            @endif
                        </ul>
                        @if(Session::has('cart'))
                            <div class="header__cart__price">Tạm tính: <span>{{number_format($totalPrice)}} VNĐ</span></div>
                        @else
                            <div class="header__cart__price">Tạm tính: <span>0 VNĐ</span></div>
                        @endif

                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    @if(Session::has('home'))
        <section class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="hero__categories">
                            <div class="hero__categories__all">
                                <i class="fa fa-bars"></i>
                                <span>Danh mục sản phẩm</span>
                            </div>
                            <ul>
                                <li><a href="{{route('page_product',0)}}">Tất cả sản phẩm</a></li>
                                <li><a href="{{route('page_product',4)}}"><i class="fas fa-fish"></i> Thịt, Cá, Trứng</a></li>
                                <li><a href="{{route('page_product',1)}}"><i class="fas fa-apple-alt"></i> Trái cây</a></li>
                                <li><a href="{{route('page_product',2)}}"><i class="fas fa-carrot"></i> Rau củ</a></li>
                                <li><a href="{{route('page_product',3)}}"><i class="fab fa-servicestack"></i> Gạo </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="hero__search">
                            <div class="hero__search__form">
                                <form action="#">
                                    <input type="text" name="user_name" id="user_name" class="form-control-lg" placeholder="Bạn cần tìm gì . . ." />
                                    <button type="submit" class="site-btn">SEARCH</button>
                                </form>
                            </div>
                            <div class="hero__search__phone">
                                <div class="hero__search__phone__icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="hero__search__phone__text">
                                    <h5>+84 93.933.7416</h5>
                                    <span>Hỗ trợ 24/7</span>
                                </div>
                            </div>
                        </div>
                        <div class="categories__slider owl-carousel">
                            @foreach($product_slider as $product_sliders)
                                <div class="col-lg-3">
                                    @foreach((array)json_decode($product_sliders->image_product,true) as $image)
                                        <div class="categories__item set-bg" data-setbg="{{asset('public/uploads/'.$image)}}">
                                            <h5><a href="{{route('page_detail_product',$product_sliders->id)}}">{{$product_sliders->name_product}}</a></h5>
                                        </div>
                                        @break
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="hero hero-normal">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="hero__categories">
                            <div class="hero__categories__all">
                                <i class="fa fa-bars"></i>
                                <span>Danh mục sản phẩm</span>
                            </div>
                            <ul>
                                <li><a href="{{route('page_product',0)}}">Tất cả sản phẩm</a></li>
                                <li><a href="{{route('page_product',4)}}"><i class="fas fa-fish"></i> Thịt, Cá, Trứng</a></li>
                                <li><a href="{{route('page_product',1)}}"><i class="fas fa-apple-alt"></i> Trái cây</a></li>
                                <li><a href="{{route('page_product',2)}}"><i class="fas fa-carrot"></i> Rau củ</a></li>
                                <li><a href="{{route('page_product',3)}}"><i class="fab fa-servicestack"></i> Gạo </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="hero__search">
                            <div class="hero__search__form">
                                <form action="#">
                                    <input type="text" name="user_name" id="user_name" class="form-control-lg" placeholder="Bạn cần tìm gì..." />
                                    <button type="submit" class="site-btn">SEARCH</button>
                                </form>
                            </div>
                            <div class="hero__search__phone">
                                <div class="hero__search__phone__icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="hero__search__phone__text">
                                    <h5>+84 93.933.7416</h5>
                                    <span>Hỗ trợ 24/7</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@else
    <header class="header">
        <div class="header__top" style="background-color: rgba(97, 173, 4, 0.89);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> giang@gmail.com</li>
                                <li>Free ship cho đơn hàng từ 99k</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="{{route('login')}}"><i class="fa fa-user"></i> Đăng nhập</a>
                            <a href="{{route('page_sign_up')}}"><i class="fa fa-user"></i> Đăng ký</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{route('home')}}"><img src="{{asset('public/server/assets/avatars/GosCooperativehome.jpg')}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class=""><a href="{{route('home')}}">Home</a></li>
                            <li><a href="{{route('page_product',0)}}">Sản phẩm</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{route('page_product',0)}}">Tất cả sản phẩm</a></li>
                                    <li><a href="{{route('page_product',4)}}"><i class="fas fa-fish"></i> Thịt, Cá, Trứng</a></li>
                                    <li><a href="{{route('page_product',1)}}"><i class="fas fa-apple-alt"></i> Trái cây</a></li>
                                    <li><a href="{{route('page_product',2)}}"><i class="fas fa-carrot"></i> Rau củ</a></li>
                                    <li><a href="{{route('page_product',3)}}"><i class="fab fa-servicestack"></i> Gạo </a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('page_discount')}}">Khuyến mãi</a>
                            </li>
                            <li><a href="{{route('page_news')}}">Tin tức</a></li>
                            <li><a href="{{route('page_contact')}}">Liên hệ</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            @if(Session::has('cart'))
                                <li><a href="{{route('page_cart')}}"><i class="fa fa-shopping-bag"></i> <span>{{count($product_cart)}}</span></a></li>
                            @else
                                <li><a href="{{route('page_cart')}}"><i class="fa fa-shopping-bag"></i> <span>0</span></a></li>
                            @endif
                        </ul>
                        @if(Session::has('cart'))
                                <div class="header__cart__price">Tạm tính: <span>{{number_format($totalPrice)}} VNĐ</span></div>
                        @else
                            <div class="header__cart__price">Tạm tính: <span>0 VNĐ</span></div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    @if(Session::has('home'))
        <section class="hero">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="hero__categories">
                            <div class="hero__categories__all">
                                <i class="fa fa-bars"></i>
                                <span>Danh mục sản phẩm</span>
                            </div>
                            <ul>
                                <li><a href="{{route('page_product',0)}}">Tất cả sản phẩm</a></li>
                                <li><a href="{{route('page_product',4)}}"><i class="fas fa-fish"></i> Thịt, Cá, Trứng</a></li>
                                <li><a href="{{route('page_product',1)}}"><i class="fas fa-apple-alt"></i> Trái cây</a></li>
                                <li><a href="{{route('page_product',2)}}"><i class="fas fa-carrot"></i> Rau củ</a></li>
                                <li><a href="{{route('page_product',3)}}"><i class="fab fa-servicestack"></i> Gạo </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="hero__search">
                            <div class="hero__search__form">
                                <form action="#">
                                    <input type="text" name="user_name" id="user_name" class="form-control-lg" placeholder="Bạn cần tìm gì . . ." />
                                    <button type="submit" class="site-btn">SEARCH</button>
                                </form>
                            </div>
                            <div class="hero__search__phone">
                                <div class="hero__search__phone__icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="hero__search__phone__text">
                                    <h5>+84 93.933.7416</h5>
                                    <span>Hỗ trợ 24/7</span>
                                </div>
                            </div>
                        </div>
                        <div class="categories__slider owl-carousel">
                            @foreach($product_slider as $product_sliders)
                                <div class="col-lg-3">
                                    @foreach((array)json_decode($product_sliders->image_product, true) as $image)
                                        <div class="categories__item set-bg" data-setbg="{{asset('public/uploads/'.$image)}}">
                                            <h5><a href="{{route('page_detail_product',$product_sliders->id)}}">{{$product_sliders->name_product}}</a></h5>
                                        </div>
                                        @break
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="hero hero-normal">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="hero__categories">
                            <div class="hero__categories__all">
                                <i class="fa fa-bars"></i>
                                <span>Danh mục sản phẩm</span>
                            </div>
                            <ul>
                                <li><a href="{{route('page_product',0)}}">Tất cả sản phẩm</a></li>
                                <li><a href="{{route('page_product',4)}}"><i class="fas fa-fish"></i> Thịt, Cá, Trứng</a></li>
                                <li><a href="{{route('page_product',1)}}"><i class="fas fa-apple-alt"></i> Trái cây</a></li>
                                <li><a href="{{route('page_product',2)}}"><i class="fas fa-carrot"></i> Rau củ</a></li>
                                <li><a href="{{route('page_product',3)}}"><i class="fab fa-servicestack"></i> Gạo </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="hero__search">
                            <div class="hero__search__form">
                                <form action="#">
                                    <input type="text" name="user_name" id="user_name" class="form-control-lg" placeholder="Bạn cần tìm gì . . ." />
                                    <button type="submit" class="site-btn">SEARCH</button>
                                </form>
                            </div>
                            <div class="hero__search__phone">
                                <div class="hero__search__phone__icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="hero__search__phone__text">
                                    <h5>+84 93.933.7416</h5>
                                    <span>Hỗ trợ 24/7</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endif
<script>

    var path = "{{ url('typeahead_autocomplete/action') }}";

    $('#user_name').typeahead({

        source: function(query, process){

            return $.get(path, {query:query}, function(data){

                return process(data);

            });

        }

    });
</script>




