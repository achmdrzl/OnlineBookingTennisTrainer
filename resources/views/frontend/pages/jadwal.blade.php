@extends('frontend.layouts.main')

<script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.4/index.global.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        var calendarEl = document.getElementById('calendar');
        var events = @json($event);

        var calendar = new FullCalendar.Calendar(calendarEl, {
            schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
            themeSystem: 'bootstrap5',
            initialView: 'timeGridWeek',
            events: events
        });
        calendar.render();


    });
</script>

<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
<link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>

@section('content')
    <!-- Page Content Wrap -->
    <!-- Price Block -->
    <div class="page_content_wrap theme_background_1">
        <div class="content_wrap">
            <!-- Content -->
            <div class="content">
                <div class="post_item post_item_single page">
                    <section class="post_content">
                        <div class="padding_top_0_imp padding_bottom_7_857em_imp">
                            <div class="sc_content content_wrap">
                                <h3
                                    class="sc_title sc_title_underline sc_align_center text_align_center font_weight_600 font_size_3_571em">
                                    Choose your Package</h3>
                                <div class="text_uppercase margin_bottom_70_imp">
                                    <p class="price_blocks_subtitle text_align_center add_color_2 margin_auto">
                                        Tennis Club is honored to work with the country’s league best tennis
                                        players that now can become your personal coach and help you win
                                    </p>
                                </div>
                                <div class="row">
                                    <div class="card">
                                        <div class="card-body">
                                            <div id='calendar'></div>
                                        </div>
                                    </div>
                                    <!-- /Price Block -->
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- /Content -->
        </div>
    </div>
    <!-- Price Block -->
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
