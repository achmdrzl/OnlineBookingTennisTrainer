@extends('frontend.layouts.main')


@section('content')
    <!-- Top Panel -->
    <div class="top_panel_title top_panel_style_3 breadcrumbs_present scheme_original">
        <div class="top_panel_title_inner top_panel_inner_style_3 breadcrumbs_present_inner">
            <div class="content_wrap">
                <div class="breadcrumbs">
                    <a class="breadcrumbs_item home" href="index.html">Home</a>
                    <span class="breadcrumbs_delimiter"></span>
                    <span class="breadcrumbs_item current">Profile</span>
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
                                <form name="profileForm" class="checkout woocommerce-checkout" action="#">
                                    <div class="col1-set" id="customer_details">
                                        <!-- Checkout column 1 -->
                                        <div class="col-1">
                                            <div class="woocommerce-billing-fields">
                                                <h3>Profile</h3>
                                                <p class="form-row form-row form-row-first validate-required"
                                                    id="billing_first_name_field">
                                                    <label for="name" class="">Name</label>
                                                    <input type="text" class="input-text " name="name" id="name"
                                                        placeholder="Masukkan Nama Anda"
                                                        value="{{ ucfirst($user->name) }}" />
                                                </p>
                                                <p class="form-row form-row form-row-last validate-required"
                                                    id="billing_last_name_field">
                                                    <label for="email" class="">Email Address</label>
                                                    <input type="email" class="input-text " name="email" id="email"
                                                        placeholder="Masukkan Email Anda" value="{{ $user->email }}" />
                                                </p>
                                                <p class="form-row form-row form-row-wide address-field validate-required"
                                                    id="billing_address_1_field">
                                                    <label for="nohp" class="">No Handphone</label>
                                                    <input type="number" class="input-text" name="nohp" id="nohp"
                                                        placeholder="Masukkan No Handphone Anda"
                                                        value="{{ $user->nohp }}" />
                                                </p>
                                                @foreach ($user->biodata as $item)
                                                    <div class="clear"></div>
                                                    <p class="form-row form-row form-row-first validate-required validate-email"
                                                        id="billing_email_field">
                                                        <label for="umur" class="">Umur</label>
                                                        <input type="number" class="input-text" name="umur"
                                                            id="umur" placeholder="Masukkan Umur Anda"
                                                            value="{{ ucfirst($item->umur) }}" />
                                                    </p>
                                                    <p class="form-row form-row form-row-last validate-required"
                                                        id="billing_last_name_field">
                                                        <label for="jk" class="">Jenis Kelamin</label>
                                                        <input type="text" class="input-text" name="jk"
                                                            id="jk" placeholder="Masukkan Jenis Kelamin Anda"
                                                            value="{{ ucfirst($item->jenis_kelamin) }}" />
                                                    </p>
                                                    <div class="clear"></div>
                                                    <p class="form-row form-row form-row-wide address-field validate-required"
                                                        id="billing_address_1_field">
                                                        <label for="alamat" class="">Address</label>
                                                        <input type="text" class="input-text " name="alamat"
                                                            id="alamat" placeholder="Masukkan Alamat Anda"
                                                            value="{{ ucfirst($item->alamat) }}" />
                                                    </p>
                                                    <p class="form-row form-row form-row-first address-field validate-state"
                                                        id="billing_state_field">
                                                        <label for="status" class="">Status</label>
                                                        <input type="text" class="input-text "
                                                            value="{{ ucfirst($item->status) }}"
                                                            placeholder="Masukkan Status Anda, seperti lajang, sudah menikah, dll."
                                                            name="status" id="status" />
                                                    </p>
                                                    <p class="form-row form-row form-row-last address-field validate-required validate-postcode"
                                                        id="billing_postcode_field">
                                                        <label for="pengalaman_tennis" class="">Pengalaman
                                                            Tennis</label>
                                                        <input type="text" class="input-text " name="pengalaman_tennis"
                                                            id="pengalaman_tennis"
                                                            placeholder="Masukkan Pengalaman Bermain Tennis Anda seperti, Medium, Expert, dll."
                                                            value="{{ ucfirst($item->pengalaman_tennis) }}" />
                                                    </p>
                                                    <div class="clear"></div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- /Checkout column 1 -->
                                    </div>

                                    <!-- Review Order -->
                                    <div id="order_review" class="woocommerce-checkout-review-order"
                                        style="margin-top:15px">
                                        <div id="payment" class="woocommerce-checkout-payment">
                                            <div class="form-row place-order">
                                                <button type="submit" class="button alt" name="update-profile"
                                                    id="update-profile" value="create">Update Profile</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Review Order -->
                                </form>
                                <h4 id="order_review_heading">Riwayat Pemesanan</h4>

                                <table class="shop_table woocommerce-checkout-review-order-table">
                                    <thead>
                                        <th>No</th>
                                        <th>Tgl Transaksi</th>
                                        <th>Paket Order</th>
                                        <th>Lapangan Latihan</th>
                                        <th>Waktu Latihan</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataOrder as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->tgl_transaksi }}</td>
                                                <td>{{ ucfirst($item->paket->nama_paket) }}</td>
                                                <td>{{ $item->lap_lat }}</td>
                                                <td>Mulai {{ $item->start }} Sampai dengan {{ $item->end }}</td>
                                                <td>
                                                    @if ($item->status_pemb == 'pembayaran-valid')
                                                        <div class="btn btn-success">Selesai</div>
                                                    @else
                                                        <div class="btn btn-warning"> Belum Selesai</div>
                                                       
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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


        $('#update-profile').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');
            var formData = new FormData();
            formData.append('name', $("#name").val());
            formData.append('email', $("#email").val());
            formData.append('nohp', $("#nohp").val());
            formData.append('alamat', $("#alamat").val());
            formData.append('umur', $("#umur").val());
            formData.append('jk', $("#jk").val());
            formData.append('status', $("#status").val());
            formData.append('pengalaman_tennis', $("#pengalaman_tennis").val());

            $.ajax({
                url: "{{ route('profile.store') }}",
                data: formData,
                type: "POST",
                processData: false,
                contentType: false,
                cache: false,

                success: function(response) {
                    console.log(response)
                    if (response.errors) {
                        $('#update-profile').html('Update Profile');
                        swal({
                            type: 'success',
                            icon: 'success',
                            title: 'Sukses Menyimpan Data!',
                            text: 'Tetapi Lengkapi Data Kamu Masih Belum Lengkap!',
                            showConfirmButton: false,
                            timer: 3000
                        });
                    } else {
                        swal({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        $('#update-profile').html('SIMPAN');
                    }
                }
            });
        });

    });
</script>
