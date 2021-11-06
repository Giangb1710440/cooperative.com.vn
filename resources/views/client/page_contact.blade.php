@extends('client_view.master')
@section('title','Liên hệ')
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
                <div>Liên hệ với chúng tôi</div>

            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->

    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Số điện thoại</h4>
                        <p>+84 939.33.7416</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Địa chỉ</h4>
                        <p>Hẻm 391, Đường 30/4, Ninh Kiều, Cần Thơ</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Giờ mở cửa</h4>
                        <p>07:00 am to 17:00 pm</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>Giangb1710440@student.ctu.edu.vn</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    <div class="container">
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7857.986139148492!2d105.76985230000001!3d10.017429900000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1634055425488!5m2!1svi!2s"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
            <div class="map-inside">
                <i class="icon_pin"></i>
                <div class="inside-widget">
                    <h4>Cần thơ</h4>
                    <ul>
                        <li>SĐT: +84 939 33 7416</li>
                        <li>Địa chỉ: 391-30/4-Hưng Lợi-Ninh kiều-Cần Thơ</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>


    <!-- Shoping Cart Section End -->
@endsection
