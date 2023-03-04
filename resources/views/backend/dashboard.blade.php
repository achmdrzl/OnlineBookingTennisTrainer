@extends('backend.main')

@section('content')
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <a href="page_ready_article.html" class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                    <i class="fa fa-file-text"></i>
                </div>
                <h3 class="widget-content text-right animation-pullDown">
                    New <strong>Article</strong><br>
                    <small>Mountain Trip</small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <a href="page_comp_charts.html" class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                    <i class="gi gi-usd"></i>
                </div>
                <h3 class="widget-content text-right animation-pullDown">
                    + <strong>250%</strong><br>
                    <small>Sales Today</small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <a href="page_ready_inbox.html" class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background-fire animation-fadeIn">
                    <i class="gi gi-envelope"></i>
                </div>
                <h3 class="widget-content text-right animation-pullDown">
                    5 <strong>Messages</strong>
                    <small>Support Center</small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <a href="page_comp_gallery.html" class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
                    <i class="gi gi-picture"></i>
                </div>
                <h3 class="widget-content text-right animation-pullDown">
                    +30 <strong>Photos</strong>
                    <small>Gallery</small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
    <div class="col-sm-6">
        <!-- Widget -->
        <a href="page_comp_charts.html" class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background animation-fadeIn">
                    <i class="gi gi-wallet"></i>
                </div>
                <div class="pull-right">
                    <!-- Jquery Sparkline (initialized in j/pages/index.s), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                    <span id="mini-chart-sales"></span>
                </div>
                <h3 class="widget-content animation-pullDown visible-lg">
                    Latest <strong>Sales</strong>
                    <small>Per hour</small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
    <div class="col-sm-6">
        <!-- Widget -->
        <a href="page_widgets_stats.html" class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background animation-fadeIn">
                    <i class="gi gi-crown"></i>
                </div>
                <div class="pull-right">
                    <!-- Jquery Sparkline (initialized in js
                                                    /pages/index.s), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                    <span id="mini-chart-brand"></span>
                </div>
                <h3 class="widget-content animation-pullDown visible-lg">
                    Our <strong>Brand</strong>
                    <small>Popularity over time</small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
@endsection
