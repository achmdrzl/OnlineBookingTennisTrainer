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
                    <span class="breadcrumbs_item current">Form Registration</span>
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
                                <div class="alert-danger alert-dismissible fade show" role="alert" style="display: none;"
                                    style="color: red">
                                </div>
                                <form name="continueOrder" method="post" class="checkout woocommerce-checkout">
                                    <div class="col2-set" id="customer_details">
                                        <!-- Checkout column 1 -->
                                        <div class="col-1">
                                            <div class="woocommerce-billing-fields">
                                                <h3>Choose your service</h3>
                                                <div class="clear"></div>
                                                <p class="form-row form-row form-row-wide address-field update_totals_on_change validate-required"
                                                    id="billing_country_field">
                                                    <label for="jml_ballboy" class="">Select Ballboy<abbr
                                                            class="required" title="required">*</abbr></label>
                                                    <select name="jml_ballboy" id="jml_ballboy" class="form-control">
                                                        <option value="" selected disabled>-- Select Amount Ballboy
                                                        </option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                    </select>
                                                </p>
                                                <p class="form-row form-row form-row-wide address-field update_totals_on_change validate-required"
                                                    id="billing_country_field">
                                                    <label for="jml_asisten" class="">Select Asisstant Coach<abbr
                                                            class="required" title="required">*</abbr></label>
                                                    <select name="jml_asisten" id="jml_asisten" class="form-control">
                                                        <option value="" selected>-- Select Amount Asisstant
                                                            Coach</option>
                                                        <option value="1">1</option>
                                                    </select>
                                                </p>
                                                <p class="form-row form-row form-row-wide address-field update_totals_on_change validate-required"
                                                    id="billing_country_field">
                                                    <label for="jml_pelatih" class="">Select Coach<abbr
                                                            class="required" title="required">*</abbr></label>
                                                    <select name="jml_pelatih" id="jml_pelatih" class="form-control">
                                                        <option value="" selected disabled>-- Select Amount Coach
                                                        </option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                    </select>
                                                </p>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <!-- /Checkout column 1 -->
                                        <!-- Checkout column 1 -->
                                        <div class="col-2">
                                            <div class="woocommerce-billing-fields">
                                                <h3>Choose time for training</h3>
                                                <div class="clear"></div>
                                                <p class="form-row form-row form-row-wide" id="billing_company_field">
                                                    <label for="start_date" class="">Masukkan Tanggal / Waktu
                                                        Mulai Anda Latihan<abbr class="required"
                                                            title="required">*</abbr></label>
                                                    <input type="datetime-local" class="form-control" name="start_date"
                                                        id="start_date" placeholder="" value="" />
                                                </p>
                                                <div class="clear"></div>
                                                <p class="form-row form-row form-row-wide address-field update_totals_on_change validate-required"
                                                    id="billing_country_field">
                                                    <label for="durasiLat" class="">Select Durasi Latihan<abbr
                                                            class="required" title="required">*</abbr></label>
                                                    <select name="durasiLat" id="durasiLat" class="form-control">
                                                        <option value="" selected disabled>-- Select Duration
                                                        </option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                </p>
                                                {{-- <p class="form-row form-row form-row-wide" id="billing_company_field">
                                                    <label for="end_date" class="">Masukkan Tanggal / Waktu
                                                        Akhir Anda Latihan<abbr class="required"
                                                            title="required">*</abbr></label>
                                                    <input type="datetime-local" class="form-control" name="end_date"
                                                        id="end_date" placeholder="" value="" />
                                                </p> --}}
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <!-- /Checkout column 1 -->
                                    </div>

                                    <!-- Review Order -->
                                    <div id="order_review" class="woocommerce-checkout-review-order">

                                        <div id="payment" class="woocommerce-checkout-payment">
                                            <ul class="wc_payment_methods payment_methods methods">
                                                <li class="wc_payment_method payment_method_paypal">
                                                    <div class="payment_box payment_method_paypal">
                                                        <p><strong>PERHATIAN!!!</strong> Pemilihan waktu latihan maksimal 2
                                                            jam, terhitung dari pemilihan waktu mulai latihan. Harap perhatikan setiap isian yang anda lakukan.</p>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="form-row place-order">
                                                <button class="top_panel_link" id="continueOrder" value="create"
                                                    name="continueOrder" type="submit">
                                                    CONTINUE REGISTER
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

        $('#continueOrder').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');

            var formData = new FormData();
            formData.append('jml_ballboy', $("#jml_ballboy").val());
            formData.append('jml_asisten', $("#jml_asisten").val());
            formData.append('jml_pelatih', $("#jml_pelatih").val());
            formData.append('start_date', $("#start_date").val());
            formData.append('end_date', $("#end_date").val());
            formData.append('durasiLat', $("#durasiLat").val());

            $.ajax({
                url: "{{ route('continue.order') }}",
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
                        $('#continueOrder').html('CONTINE REGISTER');
                    } else {
                        swal({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });

                        $('#continueOrder').html('CONTINE REGISTER');
                        window.location = '{{ url('/summary') }}'
                    }
                }
            });
        });

    });
</script>
