<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="format-detection" content="telephone=no">

    <link rel="icon" type="image/x-icon" href="images/favicon.ico" />
    <title>Contacts &#8211; Tennis club</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic"
        type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/fontello/css/fontello.min.css') }}" type="text/css"
        media="all" />

    <link rel="stylesheet" href="{{ asset('frontend/css/woocommerce/woocommerce-layout.css') }}" type="text/css"
        media="all" />
    <link rel="stylesheet" href="{{ asset('frontend/css/woocommerce/woocommerce-smallscreen.css') }}" type="text/css"
        media="only screen and (max-width: 768px)" />
    <link rel="stylesheet" href="{{ asset('frontend/css/woocommerce/woocommerce.css') }}" type="text/css"
        media="all" />

    <link rel="stylesheet" href="{{ asset('frontend/css/style.min.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('frontend/css/core.animation.min.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('frontend/css/shortcodes.min.css') }}" type="text/css" media="all" />

    <link rel="stylesheet" href="{{ asset('frontend/css/plugin.woocommerce.min.css') }}" type="text/css"
        media="all" />

    <link rel="stylesheet" href="{{ asset('frontend/css/skin.min.css') }}" type="text/css" media="all" />

    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.min.css') }}" type="text/css" media="all" />

    <link rel="stylesheet" href="{{ asset('frontend/js/core.messages/core.messages.min.css') }}" type="text/css"
        media="all" />
    <link rel="stylesheet" href="{{ asset('frontend/js/magnific/magnific-popup.min.css') }}" type="text/css"
        media="all" />

</head>

<body
    class="page tennisclub_body body_style_wide body_filled article_style_stretch top_panel_show top_panel_above sidebar_hide">
    <!-- Body Wrap -->
    <div class="body_wrap">
        <div class="page_wrap">
            @include('frontend.layouts.navbar')
            <!-- Top Panel -->
            <div class="top_panel_title top_panel_style_3 title_present breadcrumbs_present scheme_original">
                <div
                    class="top_panel_title_inner top_panel_inner_style_3  title_present_inner breadcrumbs_present_inner">
                    <div class="content_wrap">
                        <h1 class="page_title">Contacts</h1>
                        <div class="breadcrumbs">
                            <a class="breadcrumbs_item home" href="index.html">Home</a>
                            <span class="breadcrumbs_delimiter"></span>
                            <span class="breadcrumbs_item current">Contacts</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Top Panel -->
            <!-- Page Content Wrap -->
            <div class="page_content_wrap page_paddings_no">
                <!-- Contact form  -->
                <div class="content contact_form_custom_1">
                    <div class="sc_content content_wrap margin_top_null margin_bottom_null">
                        <h3
                            class="sc_title sc_title_underline sc_align_center margin_top_null margin_bottom_null text_align_center color_white font_size_3_571em">
                            Contact Us Today</h3>
                        <div id="sc_form_1_wrap" class="sc_form_wrap">
                            <div id="sc_form_1" class="sc_form sc_form_style_form_1 aligncenter width_66_per">
                                <form id="sc_form_1_form" data-formtype="form_1" method="post"
                                    action="include/sendmail.php">
                                    <div class="sc_form_info">
                                        <div class="sc_form_item sc_form_field label_over">
                                            <label class="required" for="sc_form_username">Name</label>
                                            <input id="sc_form_username" type="text" name="username"
                                                placeholder="Name *">
                                        </div>
                                        <div class="sc_form_item sc_form_field label_over">
                                            <label class="required" for="sc_form_email">E-mail</label>
                                            <input id="sc_form_email" type="text" name="email"
                                                placeholder="E-mail *">
                                        </div>
                                        <div class="sc_form_item sc_form_field label_over">
                                            <label class="required" for="sc_form_subj">Subject</label>
                                            <input id="sc_form_subj" type="text" name="subject"
                                                placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="sc_form_item sc_form_message label_over">
                                        <label class="required" for="sc_form_message">Message</label>
                                        <textarea id="sc_form_message" name="message" placeholder="Message"></textarea>
                                    </div>
                                    <div class="sc_form_item sc_form_button">
                                        <button>Send Message</button>
                                    </div>
                                    <div class="result sc_infobox"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Contact form  -->
                <!-- Google map -->
                <div class="content">
                    <div class="sc_section">
                        <div class="sc_section_inner">
                            <div id="sc_googlemap_1" class="sc_googlemap width_100_per height_400" data-zoom="10"
                                data-style="custom">
                                <div id="sc_googlemap_1_1" class="sc_googlemap_marker" data-title="U.S. Bank"
                                    data-description="&lt;p&gt;&lt;strong&gt;U.S. Bank&lt;/strong&gt;&lt;br /&gt; A reliable bank with ancient traditions and friendly staff&lt;/p&gt;"
                                    data-address="5611 West Madison Street, Chicago, IL 60644" data-latlng=""
                                    data-point="images/marker.png"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Google map -->
            </div>
            <!-- /Page Content Wrap -->
            <!-- Copyright -->
            <div class="copyright_wrap copyright_style_menu">
                <div class="copyright_wrap_inner">
                    <div class="content_wrap">
                        <div class="copyright_text">ThemeREX © 2016 All Rights Reserved
                            <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Copyright -->
        </div>
    </div>
    <!-- /Body Wrap -->

    <a href="#" class="scroll_to_top icon-up" title="Scroll to top"></a>

    <script type="text/javascript" src="{{ asset('frontend/js/jquery/jquery.js') }}"></script>

    <script type="text/javascript" src="{{ asset('frontend/js/_packed.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/global.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('frontend/js/vendor/woocommerce/woocommerce.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/vendor/woocommerce/cart-fragments.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('frontend/js/core.utils.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/core.init.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/theme.init.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/shortcodes.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/core.messages/core.messages.min.js') }}"></script>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false?key="></script>
    <script type="text/javascript" src="{{ asset('frontend/js/core.googlemap.min.js') }}"></script>

</body>

</html>
