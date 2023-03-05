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
