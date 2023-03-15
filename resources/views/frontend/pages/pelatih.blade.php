@extends('frontend.layouts.main')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@section('content')
    <!-- Club coaches section -->
    <div
        class="sc_section margin_top_null margin_bottom_null aligncenter theme_background_1 padding_top_7_143em_imp padding_bottom_4_286em_imp">
        <div class="content_wrap">
            <div class="sc_section_inner">
                <h3
                    class="sc_title sc_title_underline sc_align_center margin_top_null text_align_center font_weight_600 font_size_3_571em">
                    Our Club Coaches</h3>
                <div class="text_uppercase margin_bottom_50_imp club_coaches_subtitle">
                    <p class="text_align_center add_color_2">Tennis Club is honored to work with the country’s league best
                        tennis players that now can become your personal coach and help you win</p>
                </div>
                <!-- Team wrap -->
                <div class="sc_team_wrap">
                    <div class="sc_team sc_team_style_team-3">
                        <div class="sc_columns columns_wrap">
                            <div class="row">
                                @foreach ($pelatih as $item)

                                    <div class="col-md-6 mb-5">
                                        <!-- Team member -->
                                        <div class="">
                                            <div id="sc_team_1586660725_1"
                                                class="sc_team_item sc_team_item_1 odd first columns_wrap">
                                                <div class="sc_team_item_avatar column-2_5">
                                                    <img alt="player-5.jpg" src="{{ asset('storage/uploads/img/'.$item->img_pelatih.'')}}">
                                                    {{-- <div
                                                        class="sc_socials sc_socials_type_icons sc_socials_shape_square sc_socials_size_tiny">
                                                        <div class="sc_socials_item">
                                                            <a href="#" target="_blank"
                                                                class="social_icons social_twitter">
                                                                <span class="icon-twitter"></span>
                                                            </a>
                                                        </div>
                                                        <div class="sc_socials_item">
                                                            <a href="#" target="_blank"
                                                                class="social_icons social_facebook">
                                                                <span class="icon-facebook"></span>
                                                            </a>
                                                        </div>
                                                        <div class="sc_socials_item">
                                                            <a href="#" target="_blank" class="social_icons social_gplus">
                                                                <span class="icon-gplus"></span>
                                                            </a>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                                <div class="sc_team_item_info column-3_5">
                                                    <h5 class="sc_team_item_title">
                                                        <a href="player-profile.html">{{ ucfirst($item->nama_pelatih) }}</a>
                                                    </h5>
                                                    <div class="sc_team_item_position">Professional trainer</div>
                                                    <div class="sc_team_item_description">{{ $item->pengalaman }}</div>
                                                </div>
                                            </div>
                                        </div><!-- /Team member -->
                                    </div>
                                @endforeach
                            </div>
                            <!-- /Team member -->
                        </div>
                    </div>
                    <!-- /.sc_team -->
                </div>
                <!-- /Team wrap -->
                <a href="#"
                    class="sc_button sc_button_square sc_button_style_filled sc_button_size_large margin_top_tiny margin_bottom_small">
                    <span class="cube flip-to-top">
                        <span class="default-state">
                            <span>Learn More</span>
                        </span>
                        <span class="active-state">
                            <span>Learn More</span>
                        </span>
                    </span>
                </a>
            </div>
            <!--/Section inner-->
        </div>
    </div>
    <!-- /Club coaches section -->
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
