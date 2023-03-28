@extends('frontend.layouts.main')


@section('content')
    <!-- Top Panel -->
    <div class="top_panel_title top_panel_style_3 breadcrumbs_present scheme_original">
        <div class="top_panel_title_inner top_panel_inner_style_3 breadcrumbs_present_inner">
            <div class="content_wrap">
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="index.html">Home</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <a class="breadcrumbs_item all" href="shop.html">Shop</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">Checkout</span>
                </div>
            </div>
        </div>
    </div>
    <!-- /Top Panel -->
    <!-- Page Content Wrap -->
    <div class="page_content_wrap page_paddings_yes">
        <div class="content_wrap">
            <!-- Content -->
            <div class="content">
                <div class="post_item post_item_single page">
                    <section class="post_content">
                        <div class="sc_content content_wrap">
                            <div class="woocommerce">
                                <form name="checkout" id="checkout" method="post" class="checkout woocommerce-checkout"
                                    enctype="multipart/form-data">
                                    <h3 id="order_review_heading">Biodata Pelanggan</h3>

                                    <table class="shop_table woocommerce-checkout-review-order-table">
                                        <thead>
                                            <tr>
                                                <th class="product-name" colspan="2">Data Pelanggan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="cart_item">
                                                <td class="product-name text-center">
                                                    Nama
                                                </td>
                                                <td class="product-name text-center">
                                                    {{ $user->name }}
                                                </td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td class="product-name text-center">
                                                    Email
                                                </td>
                                                <td class="product-name text-center">
                                                    {{ $user->email }}
                                                </td>
                                            </tr>
                                            @foreach ($user->biodata as $item)
                                                <tr class="cart_item">
                                                    <td class="product-name text-center">
                                                        Umur
                                                    </td>
                                                    <td class="product-name text-center">
                                                        {{ ucfirst($item->umur) }} Tahun
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="product-name text-center">
                                                        Alamat
                                                    </td>
                                                    <td class="product-name text-center">
                                                        {{ ucfirst($item->alamat) }}
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="product-name text-center">
                                                        Jenis Kelamin
                                                    </td>
                                                    <td class="product-name text-center">
                                                        {{ ucfirst($item->jenis_kelamin) }}
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="product-name text-center">
                                                        Status
                                                    </td>
                                                    <td class="product-name text-center">
                                                        {{ ucfirst($item->status) }}
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="product-name text-center">
                                                        Pengalaman Tennis
                                                    </td>
                                                    <td class="product-name text-center">
                                                        {{ ucfirst($item->pengalaman_tennis) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <h3 id="order_review_heading">Pesanan Anda</h3>
                                    <!-- Review Order -->
                                    <div id="order_review" class="woocommerce-checkout-review-order">
                                        {{-- @foreach ($paket as $item) --}}
                                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="paket_id" id="paket_id" value="{{ $paket->id }}">
                                        <table class="shop_table woocommerce-checkout-review-order-table">
                                            <thead>
                                                <tr>
                                                    <th class="product-name">Product</th>
                                                    <th class="product-total">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="cart_item">
                                                    <td class="product-name text-center">
                                                        {{ $paket->nama_paket }}
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount">Rp.
                                                            {{ number_format($paket->harga) }}</span>
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        Fasilitas
                                                    </td>
                                                    <td class="product-total">
                                                        Jumlah Pelatih <strong class="product-quantity">&times;
                                                            {{ $paket->jml_pelatih }}</strong>,
                                                        Jumlah Asisten <strong class="product-quantity">&times;
                                                            {{ $paket->jml_asisten }}</strong>,
                                                        Jumlah Ballboy <strong class="product-quantity">&times;
                                                            {{ $paket->jml_ballboy }}</strong>,
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        Tanggal Latihan
                                                    </td>
                                                    <td class="product-total">
                                                        Mulai Dari <strong
                                                            class="product-quantity">{{ date('d F Y', strtotime($paket->tgl_start)) }}</strong>
                                                        Sampai Dengan <strong
                                                            class="product-quantity">{{ date('d F Y', strtotime($paket->tgl_end)) }}</strong>
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        Waktu Latihan
                                                    </td>
                                                    <td class="product-total">
                                                        Mulai Dari <strong
                                                            class="product-quantity">{{ date('h:i:sa', strtotime($paket->time_start)) }}</strong>
                                                        Sampai Dengan <strong
                                                            class="product-quantity">{{ date('h:i:sa', strtotime($paket->time_end)) }}</strong>
                                                    </td>
                                                </tr>
                                                @foreach ($paket->detail as $item)
                                                    <tr class="cart_item">
                                                        <td class="product-name">
                                                            Nama Pelatih
                                                        </td>
                                                        <td class="product-total">
                                                            <strong class="product-quantity">{{ $item->nama_pelatih1 }} {{ $item->nama_pelatih2 == null ? '' : '&' }} {{ $item->nama_pelatih2 }} {{ $item->nama_pelatih3 == null ? '' : '&' }} {{ $item->nama_pelatih3 }} </strong>
                                                        </td>
                                                    </tr>
                                                    <tr class="cart_item">
                                                        <td class="product-name">
                                                            Nama Asisten
                                                        </td>
                                                        <td class="product-total">
                                                            <strong class="product-quantity">{{ $item->nama_asisten1 }} {{ $item->nama_asisten2 == null ? '' : '&' }} {{ $item->nama_asisten2 }} {{ $item->nama_asisten3 == null ? '' : '&' }} {{ $item->nama_asisten3 }} </strong>
                                                        </td>
                                                    </tr>
                                                    <tr class="cart_item">
                                                        <td class="product-name">
                                                            Nama Ballboy
                                                        </td>
                                                        <td class="product-total">
                                                            <strong class="product-quantity">{{ $item->nama_ballboy1 }} {{ $item->nama_ballboy2 == null ? '' : '&' }} {{ $item->nama_ballboy2 }} {{ $item->nama_ballboy3 == null ? '' : '&' }} {{ $item->nama_ballboy3 }} </strong>
                                                        </td>
                                                    </tr>
                                                    <tr class="cart_item">
                                                        <td class="product-name">
                                                            Materi Pembelajaran
                                                        </td>
                                                        <td class="product-total">
                                                            Topik : <strong class="product-quantity">{{ $item->materi }} </strong>
                                                        </td>
                                                    </tr>
                                                    <tr class="cart_item">
                                                        <td class="product-name">
                                                            Peralatan Latihan
                                                        </td>
                                                        <td class="product-total">
                                                            Peralatan : <strong class="product-quantity">{{ $item->peralatan }} </strong>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr class="order-total">
                                                    <th>Total</th>
                                                    <td><strong><span class="amount">Rp.
                                                                {{ number_format($paket->harga) }}</span></strong>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        {{-- @endforeach --}}
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                            style="display: none;" style="color: red">
                                        </div>
                                        <div id="payment" class="woocommerce-checkout-payment">
                                            <ul class="wc_payment_methods payment_methods methods">
                                                <li>
                                                    <p class="form-row form-row form-row-wide address-field validate-required"
                                                        id="billing_city_field">
                                                        <label for="lap_lat" class="">Masukkan Lapangan Tempat Anda
                                                            Latihan</label>
                                                        <input type="text" class="input-text " name="lap_lat"
                                                            id="lap_lat" placeholder="Nama Lapangan / Alamat Lapangan"
                                                            value="" />
                                                    </p>
                                                </li>
                                                <li>
                                                    <p class="form-row form-row form-row-wide address-field validate-required"
                                                        id="billing_city_field">
                                                        <label for="start" class="">Masukkan Tanggal / Waktu
                                                            Mulai Anda Latihan</label>
                                                        <input type="datetime-local" class="input-text " name="start"
                                                            id="start" placeholder="Nama Lapangan / Alamat Lapangan"
                                                            value="" />
                                                    </p>
                                                </li>
                                                <li>
                                                    <p class="form-row form-row form-row-wide address-field validate-required"
                                                        id="billing_city_field">
                                                        <label for="end" class="">Masukkan Tanggal / Waktu
                                                            Berakhir Anda Latihan</label>
                                                        <input type="datetime-local" class="input-text " name="end"
                                                            id="end" placeholder="Nama Lapangan / Alamat Lapangan"
                                                            value="" />
                                                    </p>
                                                </li>
                                                <li class="wc_payment_method payment_method_paypal">
                                                    <input id="metode_pemb" type="radio" class="input-radio"
                                                        name="metode_pemb" value="bank_bri"
                                                        data-order_button_text="Proceed to BankBri" />
                                                    <label for="payment_method_paypal">
                                                        Bank BRI a/n Volvo Budi 871293717293781293
                                                    </label>
                                                </li>
                                                <li class="wc_payment_method payment_method_paypal">
                                                    <input id="metode_pemb" type="radio" class="input-radio"
                                                        name="metode_pemb" value="bank_bca"
                                                        data-order_button_text="Proceed to BankBca" />
                                                    <label for="bank_bca">
                                                        Bank BCA a/n Volvo Budi 98989289382983
                                                    </label>
                                                </li>
                                                <li class="wc_payment_method payment_method_paypal">
                                                    <input id="metode_pemb" type="radio" class="input-radio"
                                                        name="metode_pemb" value="bank_bni"
                                                        data-order_button_text="Proceed to BankBni" />
                                                    <label for="bank_bni">
                                                        Bank BNI a/n Volvo Budi 123912931922
                                                    </label>
                                                    <div class="payment_box payment_method_paypal">
                                                        <p>Lakukan pembayaran dengan cara melakukan transfer terhadap salah
                                                            satu bank yang tersedia.</p>
                                                    </div>
                                                    <p class="payment_box payment_method_paypal"
                                                        id="billing_first_name_field">
                                                        <label for="bukti_bayar" class="">Upload Bukti Pembayaran
                                                            Anda : </label>
                                                        <input type="file" class="" name="bukti_bayar"
                                                            id="bukti_bayar" placeholder="Upload Bukti Pembayaran Anda"
                                                            value="" />
                                                    </p>
                                                </li>
                                            </ul>

                                            <div class="form-row place-order">
                                                <button class="btn btn-primary" id="submitBtn" value="create"
                                                    name="submitBtn" type="submit">
                                                    Submit
                                                </button>
                                                {{-- <input type="submit" class="button alt"
                                                    name="submitBtn" id="submitBtn"
                                                    value="create" /> --}}
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /Review Order -->
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- /Content -->
        </div>
    </div>
    <!-- /Page Content Wrap -->
@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>


<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#submitBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');
            var img = document.getElementById('bukti_bayar');
            var formData = new FormData();
            formData.append('bukti_bayar', img.files[0]);
            formData.append('user_id', $("#user_id").val());
            formData.append('paket_id', $("#paket_id").val());
            formData.append('lap_lat', $("#lap_lat").val());
            formData.append('start', $("#start").val());
            formData.append('end', $("#end").val());
            formData.append('metode_pemb', $("#metode_pemb:checked").val());

            $.ajax({
                url: "{{ route('store.transaction') }}",
                data: formData,
                type: "POST",
                processData: false,
                contentType: false,
                cache: false,

                success: function(response) {
                    console.log(response)
                    if (response.errors) {
                        $('#update-profile').html('Store Transaction');
                        $('.btn-warning').html('');
                        $.each(response.errors, function(key, value) {
                            $('.alert-danger').show();
                            $('.alert-danger').append('<strong><li>' + value +
                                '</li></strong>');
                        });
                        $('#submitBtn').html('SIMPAN');
                    } else {
                        swal({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        $('#submitBtn').html('SIMPAN');
                        window.location = '{{ url('/orderSukses') }}'
                    }
                }
            });
        });

    });
</script>
