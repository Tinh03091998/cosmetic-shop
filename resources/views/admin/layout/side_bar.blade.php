<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="admin/homepage">
                <i class="mdi mdi-view-dashboard-outline menu-icon"></i>
                <span class="menu-title">Trang chủ</span>
            </a>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">--}}
{{--                <i class="mdi mdi-puzzle-outline menu-icon"></i>--}}
{{--                <span class="menu-title">Manage Menu</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="ui-basic">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="admin/menus/add">Add Menu</a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="admin/menus/view">View Menu</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}
        @can('categories roles')
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-advanced" aria-expanded="false" aria-controls="ui-advanced">
                <i class="mdi mdi-bullseye-arrow menu-icon"></i>
                <span class="menu-title">Quản lý danh mục</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-advanced">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="admin/categories/add_category">Thêm danh mục</a></li>
                    <li class="nav-item"> <a class="nav-link" href="admin/categories/view_category">Danh sách danh mục</a></li>
                </ul>
            </div>
        </li>
        @endcan
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">Quản lý sản phẩm</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="admin/products/add_product">Thêm sản phẩm</a></li>
                    <li class="nav-item"><a class="nav-link" href="admin/products/product_list">Danh sách sản phẩm</a></li>
                </ul>
            </div>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-toggle="collapse" href="#editors" aria-expanded="false" aria-controls="editors">--}}
{{--                <i class="mdi mdi-pencil-box-outline menu-icon"></i>--}}
{{--                <span class="menu-title">Manage slides</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="editors">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item"><a class="nav-link" href="pages/forms/text_editor.html">Add slides</a></li>--}}
{{--                    <li class="nav-item"><a class="nav-link" href="pages/forms/code_editor.html">Edit slides</a></li>--}}
{{--                    <li class="nav-item"><a class="nav-link" href="pages/forms/code_editor.html">Delete slides</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="mdi mdi-finance menu-icon"></i>
                <span class="menu-title">Quản lý tài khoản</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="admin/accounts/admin-account-list">Danh sách admin</a></li>
                    <li class="nav-item"> <a class="nav-link" href="admin/accounts/customer-account-list">Danh sách khách hàng</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="mdi mdi-table-large menu-icon"></i>
                <span class="menu-title">Quản lý vai trò</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="admin/roles/add_role">Thêm vai trò</a></li>
                    <li class="nav-item"> <a class="nav-link" href="admin/roles/role_list">Danh sách vai trò</a></li>
                </ul>
            </div>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="pages/ui-features/popups.html">--}}
{{--                <i class="mdi mdi-comment-account-outline menu-icon"></i>--}}
{{--                <span class="menu-title">Manage comments</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="pages/ui-features/notifications.html">--}}
{{--                <i class="mdi mdi-bell-ring-outline menu-icon"></i>--}}
{{--                <span class="menu-title">Notifications</span>--}}
{{--            </a>--}}
{{--        </li>--}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <i class="mdi mdi-apple-keyboard-command menu-icon"></i>
                <span class="menu-title">Quản lý giao dịch</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="admin/import_invoices/add_import_invoice">Thêm hóa đơn nhập</a></li>
                    <li class="nav-item"> <a class="nav-link" href="admin/import_invoices/import_invoice_list">Danh sách hóa đơn nhập</a></li>
{{--                    <li class="nav-item"> <a class="nav-link" href="pages/icons/simple-line-icon.html">Xóa hóa đơn nhập</a></li>--}}
                </ul>
            </div>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-toggle="collapse" href="#maps" aria-expanded="false" aria-controls="maps">--}}
{{--                <i class="mdi mdi-map-marker-outline menu-icon"></i>--}}
{{--                <span class="menu-title">Manage discount codes</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="maps">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="pages/maps/mapeal.html">Add discount code</a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="pages/maps/vector-map.html">Delete discount code</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-lock-outline menu-icon"></i>
                <span class="menu-title">Quản lý nhà sản xuất</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="admin/manufactures/add_manufacture"> Thêm nhà sản xuất </a></li>
                    <li class="nav-item"> <a class="nav-link" href="admin/manufactures/manufacture_list"> Danh sách nhà sản xuất </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
                <i class="mdi mdi-security-account-outline menu-icon"></i>
                <span class="menu-title">Quản lý bình luận</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="admin/comments/comment_list"> Danh sách bình luận </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#abc" aria-expanded="false" aria-controls="abc">
                <i class="mdi mdi-apple-keyboard-command menu-icon"></i>
                <span class="menu-title">Thống kê</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="abc">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="admin/statistical/viewRevenue">Quản lý doanh thu</a></li>
                    {{--                    <li class="nav-item"> <a class="nav-link" href="pages/icons/simple-line-icon.html">Xóa hóa đơn nhập</a></li>--}}
                </ul>
            </div>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">--}}
{{--                <i class="mdi mdi-codepen menu-icon"></i>--}}
{{--                <span class="menu-title">General Pages</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="general-pages">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="pages/samples/profile.html"> Profile </a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="pages/samples/faq.html"> FAQ </a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="pages/samples/faq-2.html"> FAQ 2 </a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="pages/samples/news-grid.html"> News grid </a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="pages/samples/timeline.html"> Timeline </a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="pages/samples/search-results.html"> Search Results </a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="pages/samples/portfolio.html"> Portfolio </a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" data-toggle="collapse" href="#e-commerce" aria-expanded="false" aria-controls="e-commerce">--}}
{{--                <i class="mdi mdi-cart-outline menu-icon"></i>--}}
{{--                <span class="menu-title">E-commerce</span>--}}
{{--                <i class="menu-arrow"></i>--}}
{{--            </a>--}}
{{--            <div class="collapse" id="e-commerce">--}}
{{--                <ul class="nav flex-column sub-menu">--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="pages/samples/invoice.html"> Invoice </a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="pages/samples/pricing-table.html"> Pricing Table </a></li>--}}
{{--                    <li class="nav-item"> <a class="nav-link" href="pages/samples/orders.html"> Orders </a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="pages/apps/email.html">--}}
{{--                <i class="mdi mdi-email-outline menu-icon"></i>--}}
{{--                <span class="menu-title">E-mail</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="pages/apps/calendar.html">--}}
{{--                <i class="mdi mdi-calendar menu-icon"></i>--}}
{{--                <span class="menu-title">Calendar</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="pages/apps/todo.html">--}}
{{--                <i class="mdi mdi-playlist-check menu-icon"></i>--}}
{{--                <span class="menu-title">Todo List</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="pages/apps/gallery.html">--}}
{{--                <i class="mdi mdi-image-filter menu-icon"></i>--}}
{{--                <span class="menu-title">Gallery</span>--}}
{{--            </a>--}}
{{--        </li>--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="pages/documentation/documentation.html">--}}
{{--                <i class="mdi mdi-file-document-box-outline menu-icon"></i>--}}
{{--                <span class="menu-title">Documentation</span>--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>
</nav>
<!-- partial -->
