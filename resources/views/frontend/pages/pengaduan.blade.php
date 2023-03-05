@extends('frontend.layouts.main')

@section('content')
    <!-- Page Content Wrap -->
    <div class="page_content_wrap page_paddings_no">
        <!-- Services section -->
        <div class="content_wrap">
            <!-- Content -->
            <div class="content">
                <div class="post_item post_item_single page">
                    <div class="post_content">
                        <div class="sc_content content_wrap padding_top_17_imp padding_bottom_3_imp">
                            <div class="sc_services_wrap">
                                <div
                                    class="sc_services sc_services_style_services-1 sc_services_type_icons margin_top_huge margin_bottom_large">
                                    <div class="sc_columns columns_wrap">
                                        <div class="column-1_3 column_padding_bottom">
                                            <div class="sc_services_item sc_services_item_1 odd first">
                                                <span class="sc_icon icon-email-2"></span>
                                                <div class="sc_services_item_content">
                                                    <div class="sc_services_item_description">
                                                        <p><a href="#">info@yoursite.com</a>
                                                            <br />
                                                            <a href="#">www.yoursite.com</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column-1_3 column_padding_bottom">
                                            <div class="sc_services_item sc_services_item_2 even">
                                                <span class="sc_icon icon-map-2"></span>
                                                <div class="sc_services_item_content">
                                                    <div class="sc_services_item_description">
                                                        <p>
                                                            +1(800)123-4567
                                                            <br /> +1(800)123-4566
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column-1_3 column_padding_bottom">
                                            <div class="sc_services_item sc_services_item_3 odd">
                                                <span class="sc_icon icon-home-2"></span>
                                                <div class="sc_services_item_content">
                                                    <div class="sc_services_item_description">
                                                        <p>176 W street name,<br />
                                                            New York, NY 10014
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Content -->
        </div>
        <!-- /Services section -->
        <!-- Contact form  -->
        <div class="content contact_form_custom_1">
            <div class="sc_content content_wrap margin_top_null margin_bottom_null">
                <h3
                    class="sc_title sc_title_underline sc_align_center margin_top_null margin_bottom_null text_align_center color_white font_size_3_571em">
                    Contact Us Today</h3>
                <div id="sc_form_1_wrap" class="sc_form_wrap">
                    <div id="sc_form_1" class="sc_form sc_form_style_form_1 aligncenter width_66_per">
                        <form id="sc_form_1_form" data-formtype="form_1" method="post" action="include/sendmail.php">
                            <div class="sc_form_info">
                                <div class="sc_form_item sc_form_field label_over">
                                    <label class="required" for="sc_form_username">Name</label>
                                    <input id="sc_form_username" type="text" name="username" placeholder="Name *">
                                </div>
                                <div class="sc_form_item sc_form_field label_over">
                                    <label class="required" for="sc_form_email">E-mail</label>
                                    <input id="sc_form_email" type="text" name="email" placeholder="E-mail *">
                                </div>
                                <div class="sc_form_item sc_form_field label_over">
                                    <label class="required" for="sc_form_subj">Subject</label>
                                    <input id="sc_form_subj" type="text" name="subject" placeholder="Subject">
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
                            data-address="5611 West Madison Street, Chicago, IL 60644" data-latlng="-7.298888, 112.766679"
                            data-point="images/marker.png"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Google map -->
    </div>
    <!-- /Page Content Wrap -->
@endsection
