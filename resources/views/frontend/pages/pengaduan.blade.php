@extends('frontend.layouts.main')


@section('content')
    <!-- Page Content Wrap -->
    <div class="page_content_wrap page_paddings_no">
        <!-- Contact form  -->
        <div class="content contact_form_custom_1">
            <div class="sc_content content_wrap margin_top_null margin_bottom_null">
                <h3
                    class="sc_title sc_title_underline sc_align_center margin_top_null margin_bottom_null text_align_center color_white font_size_3_571em">
                    Contact Us Today</h3>
                <div id="sc_form_1_wrap" class="sc_form_wrap">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: none;"
                        style="color: red">
                    </div>
                    <div id="sc_form_1" class="sc_form sc_form_style_form_1 aligncenter width_66_per">
                        <form id="aduanForm" method="post">
                            <div class="sc_form_info">
                                <div class="sc_form_item sc_form_field label_over">
                                    <label class="required" for="name">Name</label>
                                    <input id="name" type="text" name="name" placeholder="Name *"
                                        value="{{ Auth::user()->name }}" disabled>
                                    <input id="user_id" type="hidden" name="user_id" placeholder="Name *"
                                        value="{{ Auth::user()->id }}" disabled>
                                </div>
                                <div class="sc_form_item sc_form_field label_over">
                                    <label class="required" for="email">E-mail</label>
                                    <input id="email" type="text" name="email" placeholder="E-mail"
                                        value="{{ Auth::user()->email }}" disabled>
                                </div>
                                <div class="sc_form_item sc_form_field label_over">
                                    <label class="required" for="subjek">Subject Aduan</label>
                                    <input id="subjek" type="text" name="subject" placeholder="Subject">
                                </div>
                            </div>
                            <div class="sc_form_item sc_form_message label_over">
                                <label class="required" for="deskripsi">Deskripsi Aduan</label>
                                <textarea id="deskripsi" name="deskripsi" placeholder="Deskripsi Aduan"></textarea>
                            </div>
                            <div class="sc_form_item sc_form_button">
                                <button name="sendBtn" id="sendBtn" value="create">Send Message</button>
                            </div>
                            <div class="result sc_infobox"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Contact form  -->
        <!-- Google map -->
        <div class="content">
            <div class="sc_section">
                <div class="sc_section_inner">
                    <div id="sc_googlemap_1" class="sc_googlemap width_100_per height_400" data-zoom="10"
                        data-style="custom">
                        <div id="sc_googlemap_1_1" class="sc_googlemap_marker" data-title="U.S. Bank"
                            data-description="&lt;p&gt;&lt;strong&gt;U.S. Bank&lt;/strong&gt;&lt;br /&gt; A reliable bank with ancient traditions and friendly staff&lt;/p&gt;"
                            data-address="5611 West Madison Street, Chicago, IL 60644" data-latlng=""
                            data-point="images/marker.png"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Google map -->
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

        $('#sendBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');
            var formData = new FormData();
            formData.append('user_id', $("#user_id").val());
            formData.append('subjek', $("#subjek").val());
            formData.append('deskripsi', $("#deskripsi").val());

            $.ajax({
                url: "{{ route('aduan.store') }}",
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
                        $('#sendBtn').html('SIMPAN');
                    } else {
                        swal({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });
                        $('#sendBtn').html('SIMPAN');
                        window.location = '{{ url('/aduanSukses') }}'
                    }
                }
            });
        });

    });
</script>
