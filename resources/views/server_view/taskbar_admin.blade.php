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
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="#"><span class="ml-1 item-text">Doanh Thu</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{route('list_order')}}"><span class="ml-1 item-text">Quản Lý Đơn Hàng</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('page_list_detail_warehouse')}}"><span class="ml-1 item-text">Tồn Kho</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('list_product')}}"><span class="ml-1 item-text">Sản Phẩm</span></a>
                    </li>
                </ul>
            </li>
        </ul>

        <p class="text-muted nav-heading mt-4 mb-1">
            <span><i class="fas fa-list-alt"></i> DANH MỤC</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#ui-elementsbh" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fas fa-cash-register"></i>
                    <span class="ml-3 item-text">Bán Hàng</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="ui-elementsbh">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('list_order')}}"><span class="ml-1 item-text">Quản Lý Đơn Hàng</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('list_order')}}"><span class="ml-1 item-text">Doanh Thu</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#tables" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fas fa-warehouse"></i>
                    <span class="ml-3 item-text">Kho Hàng</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="tables">

                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('page_add_detail_warehouse')}}"><span class="ml-1 item-text">Khởi Tạo Tồn Kho</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('page_list_detail_warehouse')}}"><span class="ml-1 item-text">Quản Lý Tồn Kho</span></a>
                    </li>

                </ul>
            </li>

        </ul>
        <p class="text-muted nav-heading mt-4 mb-1">
            <span><i class="fas fa-book"></i> NHẬT KÝ NÔNG HỘ</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#nknh_kt" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fas fa-plus"></i>
                    <span class="ml-3 item-text">Quản lý Dữ liệu Nhật Ký</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="nknh_kt">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('page_add_technique')}}"><span class="ml-1 item-text">Quản Lý Kỹ Thuật Canh Tác</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('page_add_gdst')}}"><span class="ml-1 item-text">Quản Lý GĐ Sinh Trưởng</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('page_add_diary')}}"><span class="ml-1 item-text">Khởi Tạo Nhật Ký Nông Hộ</span></a>
                    </li>

                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="{{route('list_diary')}}">
                    <i class="fas fa-chart-area"></i>
                    <span class="ml-3 item-text">Quản Lý Nhật Ký</span>
                </a>
            </li>
        </ul>

        <p class="text-muted nav-heading mt-4 mb-1">
            <span><i class="fas fa-cogs"></i> &nbsp QUẢN TRỊ</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fas fa-plus"></i>
                    <span class="ml-3 item-text">Thêm Mới Dữ Liệu</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('page_add_caterogy_product')}}"><span class="ml-1 item-text">Thêm Loại Sản Phẩm</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('page_add_product')}}"><span class="ml-1 item-text">Thêm Sản Phẩm</span>
                        </a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link pl-3" href="{{route('add_user')}}"><span class="ml-1 item-text">Thêm thành viên</span></a>--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('page_add_unit')}}"><span class="ml-1 item-text">Thêm Đơn Vị</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('page_add_caterogy_order')}}"><span class="ml-1 item-text">Thêm Loại Đơn Hàng</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('page_add_role_access')}}"><span class="ml-1 item-text">Thêm Quyền User</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('page_add_position')}}"><span class="ml-1 item-text">Thêm Chức Vụ</span></a>
                    </li>

                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#tablesqtdl" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fas fa-database"></i>
                    <span class="ml-3 item-text">Quản Trị Dữ Liệu</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="tablesqtdl">
                    
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('list_unit')}}"><span class="ml-1 item-text">CSDL Đơn Vị</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('list_caterogy_product')}}"><span class="ml-1 item-text">CSDL Loại Sản Phẩm</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('list_invoice_caterogy')}}"><span class="ml-1 item-text">CSDL Loại Hóa Đơn</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('list_position')}}"><span class="ml-1 item-text">CSDL Chức Vụ</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('list_role_access')}}"><span class="ml-1 item-text">CSDL Quyền User</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{route('list_product')}}"><span class="ml-1 item-text">CSDL Sản Phẩm</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="{{route('list_user')}}"  class="dropdown-toggle nav-link">
                    <i class="fas fa-cog"></i>
                    <span class="ml-3 item-text">Quản Lý Thành viên</span>
                </a>
            </li>

        </ul>
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
