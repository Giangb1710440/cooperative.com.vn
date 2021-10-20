<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{route('admin_home')}}">
                <img style="margin-left:-13px;margin-top: -24px;height: 150%;width: 115%" src="{{asset('public/server/assets/avatars/GosCooperative.png')}}" alt="">

            </a>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Gos - Cooperative</span><span class="sr-only">(current)</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="dashboard">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="./index.html"><span class="ml-1 item-text">Đơn hàng cần duyệt</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./dashboard-analytics.html"><span class="ml-1 item-text">Kiểm kho</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./dashboard-sales.html"><span class="ml-1 item-text">Hàng tồn</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./dashboard-saas.html"><span class="ml-1 item-text">Doanh thu</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./dashboard-system.html"><span class="ml-1 item-text">Sản phẩm</span></a>
                    </li>
                </ul>
            </li>
        </ul>
{{--        <p class="text-muted nav-heading mt-4 mb-1">--}}
{{--            <span><i class="fas fa-list-alt"></i>&nbsp Danh mục</span>--}}
{{--        </p>--}}
{{--        <ul class="navbar-nav flex-fill w-100 mb-2">--}}
{{--            <li class="nav-item w-100">--}}
{{--                <a class="nav-link" href="../docs/index.html">--}}
{{--                    <i class="fe fe-help-circle fe-16"></i>--}}
{{--                    <span class="ml-3 item-text">Getting Start</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li class="nav-item w-100">--}}
{{--                <a class="nav-link" href="../docs/index.html">--}}
{{--                    <i class="fe fe-help-circle fe-16"></i>--}}
{{--                    <span class="ml-3 item-text">Getting Start</span>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--        </ul>--}}

        <p class="text-muted nav-heading mt-4 mb-1">
            <span><i class="fas fa-list-alt"></i> Danh mục</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#ui-elementsbh" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fas fa-cash-register"></i>
                    <span class="ml-3 item-text">Bán hàng</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="ui-elementsbh">

                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('list_order')}}"><span class="ml-1 item-text">Quản lý đơn hàng</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#tables" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fas fa-warehouse"></i>
                    <span class="ml-3 item-text">Kho hàng</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="tables">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('list_warehouse')}}"><span class="ml-1 item-text">Quản lý kho hàng</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('page_add_detail_warehouse')}}"><span class="ml-1 item-text">Thêm kho</span></a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link pl-3" href="{{route('page_add_detail_warehouse')}}"><span class="ml-1 item-text">Khởi tạo kho hàng</span></a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link pl-3" href=""><span class="ml-1 item-text">Nhập hàng</span></a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link pl-3" href=""><span class="ml-1 item-text">Kiểm kho</span></a>--}}
{{--                    </li>--}}
                </ul>
            </li>

{{--            <li class="nav-item dropdown">--}}
{{--                <a href="#ketoan" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">--}}
{{--                    <i class="fas fa-money-bill-wave-alt"></i>--}}
{{--                    <span class="ml-3 item-text">Kế toán</span>--}}
{{--                </a>--}}
{{--                <ul class="collapse list-unstyled pl-4 w-100" id="ketoan">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link pl-3" href=""><span class="ml-1 item-text">Hóa đơn bán hàng</span></a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link pl-3" href=""><span class="ml-1 item-text">Hóa đơn nhập hàng </span></a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link pl-3" href=""><span class="ml-1 item-text">Báo cáo doanh thu</span></a>--}}
{{--                    </li>--}}

{{--                </ul>--}}
{{--            </li>--}}

        </ul>
        <p class="text-muted nav-heading mt-4 mb-1">
            <span><i class="fas fa-book"></i> Nhật ký nông hộ</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#nknh_kt" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fas fa-plus"></i>
                    <span class="ml-3 item-text">Khởi tạo nhật ký</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="nknh_kt">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('page_add_technique')}}"><span class="ml-1 item-text">Thêm kỹ thuật canh tác</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('page_add_gdst')}}"><span class="ml-1 item-text">Thêm giai đoạn sinh trưởng</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('page_add_diary')}}"><span class="ml-1 item-text">Khởi tạo nhật ký nông hộ</span></a>
                    </li>

                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="{{route('list_diary')}}">
                    <i class="fas fa-chart-area"></i>
                    <span class="ml-3 item-text">Quản lý nhật ký</span>
                </a>
            </li>
        </ul>

        <p class="text-muted nav-heading mt-4 mb-1">
            <span><i class="fas fa-cogs"></i> &nbsp Quản trị</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fas fa-plus"></i>
                    <span class="ml-3 item-text">Thêm mới dữ liệu</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('page_add_caterogy_product')}}"><span class="ml-1 item-text">Thêm loại sản phẩm</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('page_add_product')}}"><span class="ml-1 item-text">Thêm sản phẩm</span>
                        </a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link pl-3" href="{{route('add_user')}}"><span class="ml-1 item-text">Thêm thành viên</span></a>--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('page_add_unit')}}"><span class="ml-1 item-text">Thêm đơn vị</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('page_add_caterogy_order')}}"><span class="ml-1 item-text">Thêm loại hóa đơn</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('page_add_role_access')}}"><span class="ml-1 item-text">Thêm quyền user</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('page_add_position')}}"><span class="ml-1 item-text">Thêm chức vụ</span></a>
                    </li>

                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#tablesqtdl" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fas fa-database"></i>
                    <span class="ml-3 item-text">Quản trị dữ liệu</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="tablesqtdl">
                    {{--                    <li class="nav-item">--}}
                    {{--                        <a class="nav-link pl-3" href="{{route('list_supplier')}}"><span class="ml-1 item-text">CSDL nhà cung cấp</span></a>--}}
                    {{--                    </li>--}}
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('list_warehouse')}}"><span class="ml-1 item-text">CSDL kho hàng </span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('list_unit')}}"><span class="ml-1 item-text">CSDL đơn vị</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('list_caterogy_product')}}"><span class="ml-1 item-text">CSDL loại sản phẩm</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('list_invoice_caterogy')}}"><span class="ml-1 item-text">CSDL loại hóa đơn</span></a>
                    </li>

{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link pl-3" href="{{route('list_order_caterogy')}}"><span class="ml-1 item-text">CSDL loại đơn hàng</span></a>--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('list_position')}}"><span class="ml-1 item-text">CSDL chức vụ</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('list_role_access')}}"><span class="ml-1 item-text">CSDL quyền user</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('list_product')}}"><span class="ml-1 item-text">CSDL sản phẩm</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="{{route('list_user')}}"  class="dropdown-toggle nav-link">
                    <i class="fas fa-cog"></i>
                    <span class="ml-3 item-text">Quản lý thành viên</span>
                </a>
            </li>

        </ul>

{{--        <p class="text-muted nav-heading mt-4 mb-1">--}}
{{--            <span><i class="fas fa-scroll"></i> Báo cáo</span>--}}
{{--        </p>--}}
{{--        <ul class="navbar-nav flex-fill w-100 mb-2">--}}

{{--            <li class="nav-item dropdown">--}}
{{--                <a href="#contact" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">--}}
{{--                    <i class="fas fa-chart-line"></i>--}}
{{--                    <span class="ml-3 item-text">Biểu đồ</span>--}}
{{--                </a>--}}
{{--                <ul class="collapse list-unstyled pl-4 w-100" id="contact">--}}
{{--                    <a class="nav-link pl-3" href="./contacts-list.html"><span class="ml-1">Biểu đồ doanh thu</span></a>--}}
{{--                    <a class="nav-link pl-3" href="./contacts-new.html"><span class="ml-1">Biểu đồ thu chi</span></a>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="nav-item dropdown">--}}
{{--                <a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">--}}
{{--                    <i class="fas fa-chart-area"></i>--}}
{{--                    <span class="ml-3 item-text">Bán hàng</span>--}}
{{--                </a>--}}
{{--                <ul class="collapse list-unstyled pl-4 w-100" id="profile">--}}
{{--                    <a class="nav-link pl-3" href="./profile.html"><span class="ml-1">Doanh số bán</span></a>--}}
{{--                    <a class="nav-link pl-3" href="./profile-settings.html"><span class="ml-1">Khoản thu</span></a>--}}
{{--                    <a class="nav-link pl-3" href="./profile-security.html"><span class="ml-1">Danh sách đơn hàng</span></a>--}}
{{--                </ul>--}}
{{--            </li>--}}
{{--            <li class="nav-item dropdown">--}}
{{--                <a href="#fileman" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">--}}
{{--                    <i class="fas fa-chart-area"></i>--}}
{{--                    <span class="ml-3 item-text">Kho hàng</span>--}}
{{--                </a>--}}
{{--                <ul class="collapse list-unstyled pl-4 w-100" id="fileman">--}}
{{--                    <a class="nav-link pl-3" href="./files-list.html"><span class="ml-1">Báo cáo nhập hàng</span></a>--}}
{{--                    <a class="nav-link pl-3" href="./files-grid.html"><span class="ml-1">Báo cáo kho hàng</span></a>--}}
{{--                    <a class="nav-link pl-3" href="./files-grid.html"><span class="ml-1">khoản chi</span></a>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--        </ul>--}}


{{--        quan tri--}}
        <p class="text-muted nav-heading mt-4 mb-1">
            <span><i class="fas fa-hands-helping"></i> Hỗ trợ</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">

            <li class="nav-item dropdown">
                <a href="#layouts" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-layout fe-16"></i>
                    <span class="ml-3 item-text">Liên hệ với chúng tôi</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="layouts">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./index.html"><span class="ml-1 item-text">qiaq.nquyen1133@gmail.com</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./index-horizontal.html"><span class="ml-1 item-text">0939337416</span></a>
                    </li>
                </ul>
            </li>
        </ul>

        <div class="btn-box w-100 mt-4 mb-1">
            <a href="{{route('home')}}" target="_blank" class="btn mb-2 btn-primary btn-lg btn-block">
                <i class="fe fe-shopping-cart fe-12 mx-2"></i><span class="small">Trang chủ bán hàng</span>
            </a>
        </div>
    </nav>
</aside>
