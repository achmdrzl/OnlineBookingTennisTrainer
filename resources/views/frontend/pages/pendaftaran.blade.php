@extends('frontend.layouts.main')


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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

                                    @foreach ($paket as $item)
                                        <!-- Price Block -->
                                        <div class="col-md-4 mb-4">
                                            <div class="sc_price_block sc_price_block_style_2">
                                                <div class="sc_price_block_title">
                                                    <span>{{ ucfirst($item->nama_paket) }}</span>
                                                </div>
                                                <div class="sc_price_block_money">
                                                    <div class="sc_price">
                                                        <span class="sc_price_currency">Rp.</span>
                                                        <span
                                                            class="sc_price_money">{{ number_format($item->harga) }}</span>
                                                        <span class="sc_price_period">mg</span>
                                                    </div>
                                                </div>
                                                <div class="sc_price_block_description" style="margin-top: -20px">
                                                    {{-- Jumlah Pelatih {{ $item->jml_pelatih }},<br>
                                                    Jumlah Asisten {{ $item->jml_asisten }},<br>
                                                    Jumlah BallBoy {{ $item->jml_ballboy }}, <br> --}}
                                                    {{ date('d F Y', strtotime($item->tgl_start)) }} -
                                                    {{ date('d F Y', strtotime($item->tgl_end)) }} <br>

                                                    {{ date('h:i:sa', strtotime($item->time_start)) }} -
                                                    {{ date('h:i:sa ', strtotime($item->time_end)) }}

                                                    <div style="color:red"> Kuota :
                                                        {{ $item->kuota }} /org</div>

                                                </div>
                                                <div class="sc_price_block_link">
                                                    <a href="{{ route('checkout', $item->id) }}"
                                                        class="sc_button sc_button_square sc_button_style_filled sc_button_size_large">
                                                        <span class="cube flip-to-top">
                                                            <span class="default-state">
                                                                <span>Order now</span>
                                                            </span>
                                                            <span class="active-state">
                                                                <span>Order now</span>
                                                            </span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
