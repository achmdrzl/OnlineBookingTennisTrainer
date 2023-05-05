@extends('backend.main')

@section('content')
    <!-- Page content -->
    <div id="page-content">
        <!-- Datatables Header -->
        <div class="content-header">
            <div class="header-section">
                <h1>
                    <i class="fa fa-table"></i>Master Data<br><small>Data Lapangan</small>
                </h1>
            </div>
        </div>
        <ul class="breadcrumb breadcrumb-top">
            <li>Master Data</li>
            <li><a href="">Data Lapangan</a></li>
        </ul>
        <!-- END Datatables Header -->

        <!-- Datatables Content -->
        <div class="block full">
            <div class="block-title">
                <h2><strong>Data</strong> Lapangan</h2>
            </div>
            <div>
                <div class="col">
                    <button style="margin-bottom:10px" type="button" class="btn btn-info btn-sm mt-2" data-toggle="modal"
                        data-target="#modal-create" id="btn-create-lapangan"><i class="fa fa-plus"></i>
                        Tambah
                        Data</button>
                </div>
            </div>

            <div class="table-responsive">
                <table id="example-datatable" class="table datatable table-center table-condensed table-bordered"
                    width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Lapangan</th>
                            <th>Alamat</th>
                            <th>Jenis Lapangan</th>
                            <th>Gambar Lapangan</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Datatables Content -->
    </div>
    <!-- END Page Content -->
@endsection

<!-- Modal -->
<div class="modal fade" id="ajaxModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modelHeading"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="btn-warning" style="font-color:red;" role="alert" style="display: none;"></div>
                <form id="paketForm" name="paketForm" class="form-bordered">
                    <input type="hidden" class="lap_id" name="lap_id" id="lap_id">
                    <div class="form-group">
                        <label for="nama_lapangan">Nama Lapangan</label>
                        <input type="text" id="nama_lapangan" name="nama_lapangan" class="form-control"
                            placeholder="Enter Nama Lapangan..">
                        <span class="help-block">Please enter your nama lapangan</span>
                    </div>
                    <div class="form-group">
                        <label for="alamat_lap">Alamat Lapangan</label>
                        <textarea name="alamat_lap" class="form-control" id="alamat_lap" placeholder="Enter Alamat Lapangan" cols=""
                            rows=""></textarea>
                        <span class="help-block">Please enter alamat lapangan</span>
                    </div>
                    <div class="form-group">
                        <label for="nama_lapangan">Jenis Lapangan</label>
                        <select name="jenis_lap" id="jenis_lap" class="form-control">
                            <option value="" disabled selected>-- Jenis Lapangan --</option>
                            <option value="outdoor">Outdoor</option>
                            <option value="indoor">Indoor</option>
                        </select>
                        <span class="help-block">Please enter your jenis lapangan</span>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" id="harga" name="harga" class="form-control"
                            placeholder="Enter Harga Lapangan..">
                        <span class="help-block">Please enter your harga lapangan</span>
                    </div>
                    <div class="form-group">
                        <label for="gambar_lap">Gambar Lapangan</label>
                        <input type="file" id="gambar_lap" name="gambar_lap" class="form-control"
                            placeholder="Enter Gambar Lapangan..">
                        <span class="help-block">Please enter your gambar lapangan</span>
                        <img id="image_preview" src="" width="150px" alt="">
                        <div class="mt-2 d-none" id="avatar">

                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <button type="submit" class="btn btn-sm btn-primary" id="saveBtn" value="create"><i
                                class="fa fa-user"></i>
                            Save</button>
                        <button type="reset" class="btn btn-sm btn-secondary" data-dismiss="modal"><i
                                class="fa fa-power-off"></i>
                            Close</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="btn-info" style="margin-left: 10px " role="alert" style="display: none;"></div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

@push('script-alt')
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap4.min.js"></script> --}}
    {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script> --}}
    <script src="{{ asset('backend/js/pages/tablesDatatables.js') }}"></script>
@endpush

<script>
    $(document).ready(function() {

        // $('#harga').formatCurrency();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Rendering Table
        var table = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('dataLap.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama_lapangan',
                    name: 'nama_lapangan'
                },
                {
                    data: 'alamat_lap',
                    name: 'alamat_lap'
                },
                {
                    data: 'jenis_lap',
                    name: 'jenis_lap'
                },
                {
                    data: 'gambar_lap',
                    name: 'gambar_lap'
                },
                {
                    data: 'harga',
                    name: 'harga'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        $('#gambar_lap').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#image_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        })

        // Create Data Lapangan.
        $('#btn-create-lapangan').click(function() {
            $('#saveBtn').val("create-lapangan");
            $('#lap_id').val('');
            $('#lapanganForm').trigger("reset");
            $('#modelHeading').html("TAMBAH DATA LAPANGAN BARU");
            $('#ajaxModel').modal('show');
            $('#nama_lapangan').attr('disabled', false).val('');
            $('#alamat_lap').attr('disabled', false).val('');
            $('#jenis_lap').attr('disabled', false).val('');
            $('#harga').attr('disabled', false).val('');
            $('#gambar_lap').attr('disabled', false).val('');
            $('#image_preview').attr('src', '');
            $('#saveBtn').val("show-lapangan").attr('disabled', false);

        });

        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');
            var img = document.getElementById('gambar_lap');
            var nama_lapangan = $('#nama_lapangan').val();
            var alamat_lap = $('#alamat_lap').val();
            var jenis_lap = $('#jenis_lap').val();
            var harga = $('#harga').val();
            var id = $('#lap_id').val();

            var formData = new FormData();
            formData.append('gambar_lap', img.files[0]);
            formData.append('nama_lapangan', nama_lapangan);
            formData.append('jenis_lap', jenis_lap);
            formData.append('alamat_lap', alamat_lap);
            formData.append('harga', harga);
            formData.append('lap_id', id);

            $.ajax({
                url: "{{ route('dataLap.store') }}",
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                type: "POST",

                success: function(response) {
                    console.log(response)
                    if (response.errors) {
                        $('.btn-warning').html('');
                        $.each(response.errors, function(key, value) {
                            $('.btn-warning').show();
                            $('.btn-warning').append(
                                '<li>' + value +
                                '</li>');
                        });
                        $('#saveBtn').html('SIMPAN');

                    } else {
                        $('.btn-warning').hide();
                        swal({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });

                        $('#paketForm').trigger("reset");
                        $('#saveBtn').html('SIMPAN');
                        $('#ajaxModel').modal('hide');

                        table.draw();
                    }
                }
            });
        });

        // Edit Data Lapangan
        $('body').on('click', '.edit-lap', function() {
            var lap_id = $(this).data('id');
            $.get("{{ route('dataLap.index') }}" + '/' + lap_id + '/edit', function(
                data) {
                $('#modelHeading').html("EDIT DATA LAPANGAN");
                $('#saveBtn').val("edit-lapangan").attr('disabled', false);
                $('#ajaxModel').modal('show');
                $('#lap_id').val(data.id);
                $('#nama_lapangan').val(data.nama_lapangan).attr('disabled', false);
                $('#alamat_lap').val(data.alamat_lap).attr('disabled', false);
                $('#jenis_lap').val(data.jenis_lap).attr('disabled', false);
                $('#harga').val(data.harga).attr('disabled', false);
                if (data.gambar_lap) {
                    var url = `storage/uploads/img/${data.gambar_lap}`;
                    $('#image_preview').attr('src', url);
                    // $("#avatar").html(
                    //     `<img src="storage/uploads/img/${data.img_pelatih}" width="100" class="img-fluid img-thumbnail">`
                    // );
                    console.log(data);
                }
            })
        });

        // Show Data Paket Latihan
        $('body').on('click', '#show-lap', function() {
            var lap_id = $(this).data('id');
            $.get("{{ route('dataLap.index') }}" + '/' + lap_id + '/edit', function(
                data) {
                console.log(data)
                $('#modelHeading').html("SHOW DATA LAPANGAN");
                $('#saveBtn').val("show-paket").attr('disabled', true);
                $('#ajaxModel').modal('show');
                $('#paket_id').val(data.id);
                $('#nama_lapangan').val(data.nama_lapangan).attr('disabled', true);
                $('#alamat_lap').val(data.alamat_lap).attr('disabled', true);
                $('#jenis_lap').val(data.jenis_lap).attr('disabled', true);
                $('#harga').val(data.harga).attr('disabled', true);
                if (data.gambar_lap) {
                    var url = `storage/uploads/img/${data.gambar_lap}`;
                    $('#image_preview').attr('src', url);
                    // $("#avatar").html(
                    //     `<img src="storage/uploads/img/${data.img_pelatih}" width="100" class="img-fluid img-thumbnail">`
                    // );
                    console.log(data);
                }
            })
        });

        // Arsipkan Data
        $('body').on('click', '#delete-lap', function() {

            swal({
                    title: "Apakah anda yakin?",
                    text: "Setelah diNon-Aktifkan, Data Lapangan ini Tidak Akan di Tampilkan!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })

                .then((willDelete) => {
                    if (willDelete) {
                        var lap_id = $(this).data("id");
                        $.ajax({
                            type: "DELETE",
                            url: 'dataLap/' + lap_id,
                            data: lap_id,
                            success: function(response) {
                                swal(response.status, {
                                        icon: "success",
                                    })
                                    .then((result) => {
                                        table.draw();
                                    });
                            }
                        });
                    } else {
                        swal("Cancel!", "Perintah dibatalkan!", "error");

                    }
                });
        });
    });
</script>
