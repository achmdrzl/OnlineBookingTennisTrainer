<!-- Header -->
<header class="top_panel_wrap top_panel_style_3 scheme_original">
    <div class="top_panel_wrap_inner top_panel_inner_style_3 top_panel_position_above">
        <!-- User panel -->
        <div class="top_panel_top">
            <div class="content_wrap clearfix">
                <div class="top_panel_top_contact_area icon-smartphone">+44 (0) 1234 56789</div>
                <div class="top_panel_top_open_hours icon-mail-2">info@sitename.com</div>
                <div class="top_panel_top_user_area">
                    <ul id="menu_user" class="menu_user_nav">
                        @if (Auth::check())
                            <li class="menu_user_register">
                                <a href="{{ route('profile.index') }}"
                                    class="popup_link popup_register_link icon-user">Profil</a>
                            </li>
                        @else
                            <li class="menu_user_register">
                                <a href="{{ route('register') }}"
                                    class="popup_link popup_register_link icon-pencil">Register</a>
                            </li>
                            <li class="menu_user_login">
                                <a href="{{ route('login') }}" class="popup_link popup_login_link icon-user">Login</a>
                            </li>
                        @endif
                        <li class="top_panel_link">
                            <a href="{{ route('daftar.index') }}">Beli Paket Latihan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /User panel -->
        <!-- Top Menu -->
        <div class="top_panel_middle">
            <div class="content_wrap">
                <div class="contact_logo">
                    <div class="logo">
                        <a href="index.html">
                            <img src="http://placehold.it/290x50" class="logo_main" alt="">
                            <img src="http://placehold.it/290x50" class="logo_fixed" alt=""></a>
                    </div>
                </div>
                <div class="menu_main_social_wrap">
                    {{-- <div class="top_panel_top_socials">
                        <div class="sc_socials sc_socials_type_icons sc_socials_shape_square sc_socials_size_small">
                            <div class="sc_socials_item">
                                <a href="#" target="_blank" class="social_icons social_twitter">
                                    <span class="icon-twitter"></span>
                                </a>
                            </div>
                            <div class="sc_socials_item">
                                <a href="#" target="_blank" class="social_icons social_facebook">
                                    <span class="icon-facebook"></span>
                                </a>
                            </div>
                            <div class="sc_socials_item">
                                <a href="#" target="_blank" class="social_icons social_gplus">
                                    <span class="icon-gplus"></span>
                                </a>
                            </div>
                        </div>
                    </div> --}}
                    <div class="menu_main_wrap">
                        <a href="#" class="menu_main_responsive_button icon-menu"></a>
                        <nav class="menu_main_nav_area">
                            <ul id="menu_main" class="menu_main_nav">
                                <li class="menu-item current-menu-item current_page_item">
                                    <a href="{{ route('homepage') }}">Home</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('tutorial.index') }}">Tutorial</a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('jadwal.index') }}">Jadwal Kegiatan</a>
                                </li>
                                <li class="menu-item"
                                    class="{{ request()->segment(1) == 'daftar' ? 'current-menu-item current_page_item' : '' }}">
                                    <a href="{{ route('daftar.index') }}">Pendaftaran</a>
                                </li>
                                @if (Auth::check())
                                    <li class="menu-item"
                                        class="{{ request()->segment(1) == 'aduan' ? 'current-menu-item current_page_item' : '' }}">
                                        <a href="{{ route('aduan.index') }}">Pengaduan</a>
                                    </li>
                                @endif
                                <li class="menu-item">
                                    <a href="{{ route('pelatih.index') }}">Profil Pelatih</a>
                                </li>
                                @if (Auth::check())
                                    <li class="menu-item">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button class="">
                                                <i class="fa fa-ban fa-fw pull-right"></i> Logout
                                            </button>
                                        </form>
                                    </li>
                                @endif
                                {{-- <li class="menu-item menu-item-has-children">
                                    <a href="#">Profil</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item">
                                            <a href="typography.html">Pelatih</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="shortcodes.html">User</a>
                                        </li>
                                    </ul>
                                </li> --}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Top Menu -->
    </div>
</header>
<!-- /Header -->
<!-- Header Mobile -->
<div class="header_mobile">
    <div class="content_wrap">
        <div class="menu_button icon-menu"></div>
        <div class="logo">
            <a href="index.html">
                <img src="http://placehold.it/290x50" class="logo_main" alt="">
            </a>
        </div>
    </div>
    <div class="side_wrap">
        <div class="close">Close</div>
        <div class="panel_top">
            <nav class="menu_main_nav_area">
                <ul id="menu_main_mobile" class="menu_main_nav">
                    <li class="menu-item current-menu-item current_page_item">
                        <a href="{{ route('homepage') }}">Home</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('tutorial.index') }}">Tutorial</a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('jadwal.index') }}">Jadwal Kegiatan</a>
                    </li>
                    <li class="menu-item"
                        class="{{ request()->segment(1) == 'daftar' ? 'current-menu-item current_page_item' : '' }}">
                        <a href="{{ route('daftar.index') }}">Pendaftaran</a>
                    </li>
                    <li class="menu-item"
                        class="{{ request()->segment(1) == 'aduan' ? 'current-menu-item current_page_item' : '' }}">
                        <a href="{{ route('aduan.index') }}">Pengaduan</a>
                    </li>
                    <li class="menu-item">
                        <a href="#">Profil Pelatih</a>
                    </li>
                </ul>
            </nav>
            <div class="search_wrap search_style_regular search_state_fixed">
                <div class="search_form_wrap">
                    <form method="get" class="search_form" action="#">
                        <button type="submit" class="search_submit icon-magnifier" title="Start search"></button>
                        <input type="text" class="search_field" placeholder="Search" value="" name="s" />
                    </form>
                </div>
                <div class="search_results widget_area scheme_original">
                    <a class="search_results_close icon-cancel"></a>
                    <div class="search_results_content"></div>
                </div>
            </div>
            @if (Auth::check())
                <div class="login">
                    <a href="{{ route('profile.index') }}" class="popup_link popup_login_link">Profile</a>
                </div>
            @else
                <div class="login">
                    <a href="{{ route('login') }}" class="popup_link popup_login_link">Login</a>
                </div>
                <div class="login">
                    <a href="{{ route('register') }}" class="popup_link popup_login_link">Register</a>
                </div>
            @endif
        </div>
        <div class="panel_bottom">
            <div class="contact_socials">
                <div class="sc_socials sc_socials_type_icons sc_socials_shape_square sc_socials_size_small">
                    <div class="sc_socials_item">
                        <a href="#" target="_blank" class="social_icons social_twitter">
                            <span class="icon-twitter"></span>
                        </a>
                    </div>
                    <div class="sc_socials_item">
                        <a href="#" target="_blank" class="social_icons social_facebook">
                            <span class="icon-facebook"></span>
                        </a>
                    </div>
                    <div class="sc_socials_item">
                        <a href="#" target="_blank" class="social_icons social_gplus">
                            <span class="icon-gplus"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="top_panel_link">
            <a href="{{ route('daftar.index') }}">Beli Paket Latihan</a>
        </div>
    </div>
    <div class="mask"></div>
</div>
<!-- /Header Mobile -->
