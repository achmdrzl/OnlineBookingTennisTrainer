@extends('backend.main')

@section('content')
    <!-- Page content -->
    <div id="page-content">

        <!-- Dashboard Header -->
        <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
        <div class="content-header content-header-media">
            <div class="header-section">
                <div class="row">
                    <!-- Main Title (hidden on small devices for the statistics to fit) -->
                    <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                        <h1>Welcome <strong>{{ ucfirst(Auth::user()->name) }}</strong><br><small>You Look Awesome!</small>
                        </h1>
                    </div>
                    <!-- END Main Title -->
                </div>
            </div>
            <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
            <img src="{{ asset('backend/img/placeholders/headers/dashboard_header.jpg') }}" alt="header image"
                class="animation-pulseSlow">
        </div>


        <!-- Mini Top Stats Row -->
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <!-- Widget -->
                <a href="page_ready_article.html" class="widget widget-hover-effect1">
                    <div class="widget-simple">
                        <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                            <i class="fa fa-file-text"></i>
                        </div>
                        <h3 class="widget-content text-right animation-pullDown">
                            Jumlah <strong>Paket Latihan</strong><br>
                            <small>{{ $paket }} Paket Latihan</small>
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
                            Total <strong>Transaksi</strong><br>
                            <small>{{ $transaksi }} Transaksi</small>
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
                            Jumlah <strong>Pengaduan </strong>
                            <small>{{ $aduan }} Pengaduan</small>
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
                            Jumlah <strong>Pelatih</strong>
                            <small>{{ $pelatih }} orang</small>
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
                            Jumlah <strong>Pelanggan</strong>
                            <small>{{ $user }} orang</small>
                        </h3>
                    </div>
                </a>
                <!-- END Widget -->
            </div>
        </div>
        <!-- END Mini Top Stats Row -->
    </div>
    <!-- END Page Content -->
@endsection
