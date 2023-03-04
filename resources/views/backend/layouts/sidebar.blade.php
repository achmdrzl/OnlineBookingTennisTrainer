<!-- Main Sidebar -->
<div id="sidebar">
    <!-- Wrapper for scrolling functionality -->
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Brand -->
            <a href="index.html" class="sidebar-brand">
                <i class="gi gi-flash"></i><span class="sidebar-nav-mini-hide"><strong>Trainer</strong>Tennis</span>
            </a>
            <!-- END Brand -->

            <!-- User Info -->
            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                <div class="sidebar-user-avatar">
                    <a href="page_ready_user_profile.html">
                        <img src="{{ asset('backend/img/placeholders/avatars/avatar2.jpg') }}" alt="avatar">
                    </a>
                </div>
                @if (Auth::user()->HasRole('user'))
                    <div class="sidebar-user-name">John Doe</div>
                @endif
                <div class="sidebar-user-links">
                    <a href="page_ready_user_profile.html" data-toggle="tooltip" data-placement="bottom"
                        title="Profile"><i class="gi gi-user"></i></a>
                    <a href="page_ready_inbox.html" data-toggle="tooltip" data-placement="bottom" title="Messages"><i
                            class="gi gi-envelope"></i></a>
                    <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                    <a href="javascript:void(0)" class="enable-tooltip" data-placement="bottom" title="Settings"
                        onclick="$('#modal-user-settings').modal('show');"><i class="gi gi-cogwheel"></i></a>
                </div>
            </div>
            <!-- END User Info -->

            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">
                <li>
                    <a href="index.html" class=" active"><i class="gi gi-stopwatch sidebar-nav-icon"></i><span
                            class="sidebar-nav-mini-hide">Dashboard</span></a>
                </li>
                <li>
                    <a href="#" class="sidebar-nav-menu"><i
                            class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i
                            class="gi gi-shopping_cart sidebar-nav-icon"></i><span
                            class="sidebar-nav-mini-hide">eCommerce</span></a>
                    <ul>
                        <li>
                            <a href="page_ecom_dashboard.html">Dashboard</a>
                        </li>
                        <li>
                            <a href="page_ecom_orders.html">Orders</a>
                        </li>
                        <li>
                            <a href="page_ecom_order_view.html">Order View</a>
                        </li>
                        <li>
                            <a href="page_ecom_products.html">Products</a>
                        </li>
                        <li>
                            <a href="page_ecom_product_edit.html">Product Edit</a>
                        </li>
                        <li>
                            <a href="page_ecom_customer_view.html">Customer View</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-header">
                    <span class="sidebar-header-title">Data Master</span>
                </li>

                <li>
                    <a href="#" class="sidebar-nav-menu"><i
                            class="fa fa-angle-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i
                            class="gi gi-certificate sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Data
                            Master</span></a>
                    <ul>
                        <li>
                            <a href="page_ui_grid_blocks.html">Data Pelangga</a>
                        </li>
                        <li>
                            <a href="page_ui_draggable_blocks.html">Data Paket Latihan</a>
                        </li>
                        <li>
                            <a href="page_ui_draggable_blocks.html">Data Pengaduan</a>
                        </li>
                        <li>
                            <a href="page_ui_draggable_blocks.html">Data Tutorial</a>
                        </li>
                        <li>
                            <a href="page_ui_draggable_blocks.html">Data Pelatih</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-header">
                    <span class="sidebar-header-title">Data Transaksi</span>
                </li>
                <li>
                    <a href="page_widgets_social.html"><i class="gi gi-share_alt sidebar-nav-icon"></i><span
                            class="sidebar-nav-mini-hide">Transaksi</span></a>
                </li>
            </ul>
            <!-- END Sidebar Navigation -->
        </div>
        <!-- END Sidebar Content -->
    </div>
    <!-- END Wrapper for scrolling functionality -->
</div>
<!-- END Main Sidebar -->
