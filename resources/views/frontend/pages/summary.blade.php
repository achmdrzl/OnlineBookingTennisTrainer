@extends('frontend.layouts.main')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
                                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
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

                                    <h3 id="order_review_heading">Layanan yang anda pilih</h3>
                                    <!-- Review Order -->
                                    @php($data = session()->get('data'))
                                    @php($lapangan = session()->get('lapangan'))
                                    <div id="order_review" class="woocommerce-checkout-review-order">
                                        {{-- @foreach ($paket as $item) --}}
                                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                        <table class="shop_table woocommerce-checkout-review-order-table">
                                            <thead>
                                                <tr>
                                                    <th class="product-name">Service</th>
                                                    <th class="product-total">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="cart_item">
                                                    <td class="product-name text-center">
                                                        Nama Lapangan
                                                    </td>
                                                    <td class="product-total">
                                                        <span
                                                            class="amount">{{ ucfirst($lapangan['nama_lapangan']) }}</span>
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="product-name text-center">
                                                        Alamat Lapangan
                                                    </td>
                                                    <td class="product-total">
                                                        {{ ucfirst($lapangan['alamat_lap']) }}
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="product-name text-center">
                                                        Jenis Lapangan
                                                    </td>
                                                    <td class="product-total">
                                                        {{ ucfirst($lapangan['jenis_lap']) }}
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="product-name text-center">
                                                        Harga Lapangan
                                                    </td>
                                                    <td class="product-total">
                                                        <strong>Rp.
                                                            {{ number_format($lapangan['harga'] * $data['durasiLat']) }}</strong>
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="product-name text-center">
                                                        Fasilitas
                                                    </td>
                                                    <td class="product-total">
                                                        Jumlah Ballboy <strong>x {{ $data['jml_ballboy'] }}</strong>,
                                                        @if ($data['jml_asisten'] == null)
                                                        @else
                                                            Jumlah Asisten <strong>x {{ $data['jml_asisten'] }}</strong>,
                                                        @endif
                                                        Jumlah Pelatih <strong>x {{ $data['jml_pelatih'] }}</strong>
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="product-name text-center">
                                                        Jadwal Latihan
                                                    </td>
                                                    <td class="product-total">
                                                        @php(date('Y-m-d', strtotime($data['start_date'])))
                                                        Tanggal
                                                        <strong>{{ date('Y-m-d', strtotime($data['start_date'])) }}</strong>
                                                        , Jam
                                                        <strong>{{ date('H:i', strtotime($data['start_date'])) }}</strong>
                                                        sampai dengan
                                                        <strong>{{ date('H:i', strtotime($data['end_date'])) }}</strong>
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="product-name text-center">
                                                        Durasi Latihan
                                                    </td>
                                                    <td class="product-total">
                                                        <strong>{{ $data['durasiLat'] }}</strong> jam
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="text-center">
                                            <img class="text-center"
                                                src="{{ asset('storage/uploads/img/' . $lapangan['gambar_lap']) }}"
                                                width="250px" alt="">
                                            <p>{{ $lapangan['nama_lapangan'] }}</p>
                                        </div>
                                        <table class="shop_table woocommerce-checkout-review-order-table">
                                            <thead>
                                                <tr>
                                                    <th class="product-name">Service</th>
                                                    <th class="product-name">Jumlah</th>
                                                    <th class="product-total">Harga</th>
                                                    <th class="product-total">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="cart_item">
                                                    <td class="product-name text-center">
                                                        Ballboy
                                                    </td>
                                                    <td class="product-total">
                                                        <strong>{{ $data['jml_ballboy'] }}</strong> orang
                                                    </td>
                                                    <td class="product-total">
                                                        <strong>Rp. 50.000,-</strong> / orang
                                                    </td>
                                                    <td class="product-total">
                                                        <strong>Rp.
                                                            {{ number_format($data['jml_ballboy'] * 50000) }}</strong>
                                                    </td>
                                                </tr>
                                                @if ($data['jml_asisten'] == null)
                                                @else
                                                    <tr class="cart_item">
                                                        <td class="product-name text-center">
                                                            Asisten
                                                        </td>
                                                        <td class="product-total">
                                                            <strong>{{ $data['jml_asisten'] }}</strong> orang
                                                        </td>
                                                        <td class="product-total">
                                                            <strong>Rp. 100.000,-</strong> / orang
                                                        </td>
                                                        <td class="product-total">
                                                            <strong>Rp.
                                                                {{ number_format($data['jml_asisten'] * 100000) }}</strong>
                                                        </td>
                                                    </tr>
                                                @endif
                                                <tr class="cart_item">
                                                    <td class="product-name text-center">
                                                        Pelatih
                                                    </td>
                                                    <td class="product-total">
                                                        <strong>{{ $data['jml_pelatih'] }}</strong> orang
                                                    </td>
                                                    <td class="product-total">
                                                        <strong>Rp. 250.000,-</strong> / orang
                                                    </td>
                                                    <td class="product-total">
                                                        <strong>Rp.
                                                            {{ number_format($data['jml_pelatih'] * 250000) }}</strong>
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="product-name text-center">
                                                        Lapangan
                                                    </td>
                                                    <td class="product-total">
                                                        <strong>{{ $data['durasiLat'] }}</strong> jam
                                                    </td>
                                                    <td class="product-total">
                                                        <strong>Rp. {{ number_format($lapangan['harga']) }}</strong> / jam
                                                    </td>
                                                    <td class="product-total">
                                                        <strong>Rp.
                                                            {{ number_format($lapangan['harga'] * $data['durasiLat']) }}</strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr class="order-total">
                                                    <th colspan="3">Total</th>
                                                    <td><strong><span class="amount">Rp.
                                                                {{ number_format($data['jml_ballboy'] * 50000 + $data['jml_asisten'] * 100000 + $data['jml_pelatih'] * 250000 + $lapangan['harga'] * $data['durasiLat']) }}</span></strong>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div id="payment" class="woocommerce-checkout-payment mb-5">
                                            <ul class="wc_payment_methods payment_methods methods">
                                                <li class="wc_payment_method payment_method_paypal">
                                                    <div class="payment_box payment_method_paypal">
                                                        Hal yang wajib diikuti :
                                                        <ul>
                                                            <li>Wajib membawa raket tenis pribadi</li>
                                                            <li>Wajib mengganti bola apabila dihilangkan</li>
                                                            <li>Wajib membawa sepatu pribadi yang memiliki spesifikasi tenis
                                                            </li>
                                                        </ul>

                                                        Hal yang di sarankan :
                                                        <ul>
                                                            <li>Disarankan membawa air mineral</li>
                                                            <li>Disarankan membawa baju ganti</li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <table class="shop_table woocommerce-checkout-review-order-table">
                                            <thead>
                                                <tr>
                                                    <th class="product-name">Materi Latihan</th>
                                                    <th class="product-total">Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="cart_item">
                                                    <td class="product-name text-center">
                                                        Praktek Latihan Basic Service dan Cara Melakukan Smash
                                                    </td>
                                                    <td class="product-total">
                                                        <ul>
                                                            <li>Pemanasan diawal selama 15 menit</li>
                                                            <li>Gerakan Memegang Raket dengan benar</li>
                                                            <li>Gerakan Memukul Bola dengan benar</li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        {{-- @endforeach --}}
                                        <div class="alert-danger alert-dismissible fade show" role="alert"
                                            style="display: none;" style="color: red">
                                        </div>
                                        <div id="payment" class="woocommerce-checkout-payment">
                                            <ul class="wc_payment_methods payment_methods methods">
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
                                                <button class="top_panel_link" id="submitBtn" value="create"
                                                    name="submitBtn" type="submit">
                                                    REGISTER
                                                </button>
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
