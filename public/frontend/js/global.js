
if (typeof TENNISCLUB_STORAGE == 'undefined') var TENNISCLUB_STORAGE = {};

TENNISCLUB_STORAGE["strings"] = {
    ajax_error: "Invalid server answer",
    bookmark_add: "Add the bookmark",
    email_confirm: "On the e-mail address &quot;%s&quot; we sent a confirmation email. Please, open it and click on the link.",
    error_global: "Global error text",
    name_empty: "The name can&#039;t be empty",
    name_long: "Too long name",
    email_empty: "Too short (or empty) email address",
    email_long: "Too long email address",
    email_not_valid: "Invalid email address",
    subject_empty: "The subject can&#039;t be empty",
    subject_long: "Too long subject",
    text_empty: "The message text can&#039;t be empty",
    text_long: "Too long message text",
    send_complete: "Send message complete!",
    send_error: "Transmit failed!",
    login_empty: "The Login field can&#039;t be empty",
    login_long: "Too long login field",
    login_success: "Login success! The page will be reloaded in 3 sec.",
    login_failed: "Login failed!",
    password_empty: "The password can&#039;t be empty and shorter then 4 characters",
    password_long: "Too long password",
    password_not_equal: "The passwords in both fields are not equal",
    geocode_error: "Geocode was not successful for the following reason:",
    googlemap_not_avail: "Google map API not available!"
};

TENNISCLUB_STORAGE['slider_height'] = 100;
TENNISCLUB_STORAGE['system_message'] = {
    message: '',
    status: '',
    header: ''
};
TENNISCLUB_STORAGE['user_logged_in'] = false;
TENNISCLUB_STORAGE['toc_menu'] = 'float';
TENNISCLUB_STORAGE['toc_menu_home'] = true;
TENNISCLUB_STORAGE['toc_menu_top'] = true;
TENNISCLUB_STORAGE['menu_fixed'] = true;
TENNISCLUB_STORAGE['menu_mobile'] = 1023;
TENNISCLUB_STORAGE['menu_slider'] = true;
TENNISCLUB_STORAGE['menu_cache'] = false;
TENNISCLUB_STORAGE['demo_time'] = 0;
TENNISCLUB_STORAGE['media_elements_enabled'] = true;
TENNISCLUB_STORAGE['css_animation'] = true;
TENNISCLUB_STORAGE['menu_animation_in'] = 'fadeIn';
TENNISCLUB_STORAGE['menu_animation_out'] = 'fadeOutDown';
TENNISCLUB_STORAGE['popup_engine'] = 'magnific';
TENNISCLUB_STORAGE['email_mask'] = '^([a-zA-Z0-9_\-]+\.)*[a-zA-Z0-9_\-]+@[a-z0-9_\-]+(\.[a-z0-9_\-]+)*\.[a-z]{2,6}$';
TENNISCLUB_STORAGE['contacts_maxlength'] = 1000;
TENNISCLUB_STORAGE['comments_maxlength'] = 1000;
TENNISCLUB_STORAGE['isotope_resize_delta'] = 0.3;
TENNISCLUB_STORAGE['error_message_box'] = null;
TENNISCLUB_STORAGE['viewmore_busy'] = false;
TENNISCLUB_STORAGE['video_resize_inited'] = false;
TENNISCLUB_STORAGE['top_panel_height'] = 0;


/* Isotope */
jQuery(document).ready(function() {
    TENNISCLUB_STORAGE['ppp'] = 8;
    jQuery(".isotope_filters.isotope_wrap_lessons_4_filters").append('<a href="#" data-filter="*" class="isotope_filters_button active">All</a><a href="#" data-filter=".flt_93" class="isotope_filters_button">tips</a><a href="#" data-filter=".flt_94" class="isotope_filters_button">serve</a><a href="#" data-filter=".flt_95" class="isotope_filters_button">strategy</a>');
});

jQuery(document).ready(function() {
    TENNISCLUB_STORAGE['ppp'] = 12;
    jQuery(".isotope_filters.isotope_wrap_portfolio_3_filters").append('<a href="#" data-filter="*" class="isotope_filters_button active">All</a><a href="#" data-filter=".flt_19" class="isotope_filters_button">games</a><a href="#" data-filter=".flt_21" class="isotope_filters_button">players</a><a href="#" data-filter=".flt_27" class="isotope_filters_button">tournaments</a><a href="#" data-filter=".flt_28" class="isotope_filters_button">couches</a><a href="#" data-filter=".flt_24" class="isotope_filters_button">matches</a><a href="#" data-filter=".flt_29" class="isotope_filters_button">court</a>');
});

/* Woocommerce */
var woocommerce_price_slider_params = {
    "currency_symbol": "\u00a3",
    "currency_pos": "left",
    "min_price": "",
    "max_price": ""
};

var wc_single_product_params = {
    "i18n_required_rating_text": "Please select a rating",
    "review_rating_required": "yes"
};

/* Tribe Events */
var tribe_bootstrap_datepicker_strings = {
    "dates": {
        "days": ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"],
        "daysShort": ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
        "daysMin": ["S", "M", "T", "W", "T", "F", "S", "S"],
        "months": ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        "monthsShort": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        "clear": "Clear",
        "today": "Today"
    }
};

var tribe_js_config = {
    "permalink_settings": "\/%year%\/%monthnum%\/%day%\/%postname%\/",
    "events_post_type": "tribe_events"
};

var tribeEventsSingleMap = {
    "addresses": [{
        "address": "573 Chestnut St Franklin, NY 02038  New York United States ",
        "title": "Central Tennis Courts"
    }],
    "zoom": "8"
};

/* Revolution Slider */
var htmlDiv = document.getElementById("rs-plugin-settings-inline-css");
var htmlDivCss = ".tp-caption.Fashion-BigDisplay,.Fashion-BigDisplay{color:rgba(0,0,0,1.00);font-size:60px;line-height:60px;font-weight:900;font-style:normal;font-family:Raleway;padding:0px 0px 0px 0px;text-decoration:none;background-color:transparent;border-color:transparent;border-style:none;border-width:0px;border-radius:0px 0px 0px 0px;letter-spacing:2px}";
if (htmlDiv) {
    htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
} else {
    var htmlDiv = document.createElement("div");
    htmlDiv.innerHTML = "<style>" + htmlDivCss + "</style>";
    document.getElementsByTagName("head")[0].appendChild(htmlDiv.childNodes[0]);
}

/******************************************
 -	PREPARE PLACEHOLDER FOR SLIDER	-
 ******************************************/

 if (jQuery('#rev_slider_1_1').length>0){
    var setREVStartSize = function () {
        try {
            var e = new Object,
                i = jQuery(window).width(),
                t = 9999,
                r = 0,
                n = 0,
                l = 0,
                f = 0,
                s = 0,
                h = 0;
            e.c = jQuery('#rev_slider_1_1');
            e.gridwidth = [1800];
            e.gridheight = [584];

            e.sliderLayout = "fullwidth";
            if (e.responsiveLevels && (jQuery.each(e.responsiveLevels, function (e, f) {
                    f > i && (t = r = f, l = e), i > f && f > r && (r = f, n = e)
                }), t > r && (l = n)), f = e.gridheight[l] || e.gridheight[0] || e.gridheight, s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth, h = i / s, h = h > 1 ? 1 : h, f = Math.round(h * f), "fullscreen" == e.sliderLayout) {
                var u = (e.c.width(), jQuery(window).height());
                if (void 0 != e.fullScreenOffsetContainer) {
                    var c = e.fullScreenOffsetContainer.split(",");
                    if (c) jQuery.each(c, function (e, i) {
                        u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u
                    }), e.fullScreenOffset.split("%").length > 1 && void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 ? u -= jQuery(window).height() * parseInt(e.fullScreenOffset, 0) / 100 : void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 && (u -= parseInt(e.fullScreenOffset, 0))
                }
                f = u
            } else void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
            e.c.closest(".rev_slider_wrapper").css({
                height: f
            })

        } catch (d) {
            console.log("Failure at Presize of Slider:" + d)
        }
    };


    setREVStartSize();

    function revslider_showDoubleJqueryError(sliderID) {
        var errorMessage = "Revolution Slider Error: You have some jquery.js library include that comes after the revolution files js include.";
        errorMessage += "<br> This includes make eliminates the revolution slider libraries, and make it not work.";
        errorMessage += "<br><br> To fix it you can:<br>&nbsp;&nbsp;&nbsp; 1. In the Slider Settings -> Troubleshooting set option:  <strong><b>Put JS Includes To Body</b></strong> option to true.";
        errorMessage += "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jquery.js include and remove it.";
        errorMessage = "<span style='font-size:16px;color:#BC0C06;'>" + errorMessage + "</span>";
        jQuery(sliderID).show().html(errorMessage);
    }

    var tpj = jQuery;

    var revapi1;
    tpj(document).ready(function () {
        if (tpj("#rev_slider_1_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_1_1");
        } else {
            revapi1 = tpj("#rev_slider_1_1").show().revolution({
                sliderType: "standard",
                jsFileLocation: "js/revslider/",
                sliderLayout: "fullwidth",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {
                    keyboardNavigation: "off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    onHoverStop: "off",
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 50,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    bullets: {
                        enable: true,
                        hide_onmobile: false,
                        style: "",
                        hide_onleave: false,
                        direction: "horizontal",
                        h_align: "center",
                        v_align: "bottom",
                        h_offset: 0,
                        v_offset: 30,
                        space: 10,
                        tmp: '<span class="tp-bullet-image"></span><span class="tp-bullet-title"></span>'
                    }
                },
                visibilityLevels: [1240, 1024, 778, 480],
                gridwidth: 1800,
                gridheight: 584,
                lazyType: "none",
                shadow: 0,
                spinner: "spinner0",
                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,
                shuffle: "off",
                autoHeight: "off",
                disableProgressBar: "on",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false,
                }
            });
        }
    });
}

if (jQuery('#rev_slider_2_1').length>0){
    var setREVStartSize = function() {
        try {
            var e = new Object,
                i = jQuery(window).width(),
                t = 9999,
                r = 0,
                n = 0,
                l = 0,
                f = 0,
                s = 0,
                h = 0;
            e.c = jQuery('#rev_slider_2_1');
            e.gridwidth = [1170];
            e.gridheight = [345];

            e.sliderLayout = "auto";
            if (e.responsiveLevels && (jQuery.each(e.responsiveLevels, function(e, f) {
                    f > i && (t = r = f, l = e), i > f && f > r && (r = f, n = e)
                }), t > r && (l = n)), f = e.gridheight[l] || e.gridheight[0] || e.gridheight, s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth, h = i / s, h = h > 1 ? 1 : h, f = Math.round(h * f), "fullscreen" == e.sliderLayout) {
                var u = (e.c.width(), jQuery(window).height());
                if (void 0 != e.fullScreenOffsetContainer) {
                    var c = e.fullScreenOffsetContainer.split(",");
                    if (c) jQuery.each(c, function(e, i) {
                        u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u
                    }), e.fullScreenOffset.split("%").length > 1 && void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 ? u -= jQuery(window).height() * parseInt(e.fullScreenOffset, 0) / 100 : void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 && (u -= parseInt(e.fullScreenOffset, 0))
                }
                f = u
            } else void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
            e.c.closest(".rev_slider_wrapper").css({
                height: f
            })

        } catch (d) {
            console.log("Failure at Presize of Slider:" + d)
        }
    };


    setREVStartSize();

    function revslider_showDoubleJqueryError(sliderID) {
        var errorMessage = "Revolution Slider Error: You have some jquery.js library include that comes after the revolution files js include.";
        errorMessage += "<br> This includes make eliminates the revolution slider libraries, and make it not work.";
        errorMessage += "<br><br> To fix it you can:<br>&nbsp;&nbsp;&nbsp; 1. In the Slider Settings -> Troubleshooting set option:  <strong><b>Put JS Includes To Body</b></strong> option to true.";
        errorMessage += "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jquery.js include and remove it.";
        errorMessage = "<span style='font-size:16px;color:#BC0C06;'>" + errorMessage + "</span>";
        jQuery(sliderID).show().html(errorMessage);
    }
    var tpj = jQuery;

    var revapi2;
    tpj(document).ready(function() {
        if (tpj("#rev_slider_2_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_2_1");
        } else {
            revapi2 = tpj("#rev_slider_2_1").show().revolution({
                sliderType: "standard",
                jsFileLocation: "js/revslider",
                sliderLayout: "auto",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {
                    keyboardNavigation: "off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    onHoverStop: "off",
                    arrows: {
                        style: "gyges",
                        enable: true,
                        hide_onmobile: false,
                        hide_onleave: true,
                        hide_delay: 200,
                        hide_delay_mobile: 1200,
                        tmp: '',
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 20,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 20,
                            v_offset: 0
                        }
                    }
                },
                visibilityLevels: [1240, 1024, 778, 480],
                gridwidth: 1170,
                gridheight: 345,
                lazyType: "none",
                shadow: 0,
                spinner: "spinner3",
                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,
                shuffle: "off",
                autoHeight: "off",
                disableProgressBar: "on",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false
                }
            });
        }
    });

    var htmlDivCss = '	#rev_slider_2_1_wrapper .tp-loader.spinner3 div { background-color: #ffffff !important; } ';
    var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
    if (htmlDiv) {
        htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
    } else {
        var htmlDiv = document.createElement('div');
        htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
        document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
    }
}

