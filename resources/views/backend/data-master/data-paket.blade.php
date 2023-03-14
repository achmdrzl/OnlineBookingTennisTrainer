@extends('backend.main')

@section('content')
    <!-- Page content -->
    <div id="page-content">
        <!-- Datatables Header -->
        <div class="content-header">
            <div class="header-section">
                <h1>
                    <i class="fa fa-table"></i>Master Data<br><small>Data Paket Latihan</small>
                </h1>
            </div>
        </div>
        <ul class="breadcrumb breadcrumb-top">
            <li>Master Data</li>
            <li><a href="">Data Paket Latihan</a></li>
        </ul>
        <!-- END Datatables Header -->

        <!-- Datatables Content -->
        <div class="block full">
            <div class="block-title">
                <h2><strong>Data</strong> Paket Latihan</h2>
            </div>
            <div>
                <div class="col">
                    <button style="margin-bottom:10px" type="button" class="btn btn-info btn-sm mt-2" data-toggle="modal"
                        data-target="#modal-create" id="btn-create-paket"><i class="fa fa-plus"></i>
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
                            <th>Nama Paket</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Akhir</th>
                            <th>Harga</th>
                            <th>Durasi</th>
                            <th>Kuota</th>
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
                    <input type="hidden" class="paket_id" name="paket_id" id="paket_id">
                    <div class="form-group">
                        <label for="nama_paket">Nama Paket</label>
                        <input type="text" id="nama_paket" name="nama_paket" class="form-control"
                            placeholder="Enter Nama Paket..">
                        <span class="help-block">Please enter your nama paket</span>
                    </div>
                    <div class="form-group">
                        <label for="jml_pelatih">Jumlah Pelatih</label>
                        <input type="number" id="jml_pelatih" name="jml_pelatih" class="form-control"
                            placeholder="Enter Jumlah Pelatih..">
                        <span class="help-block">Please enter jumlah pelatih</span>
                    </div>
                    <div class="form-group">
                        <label for="jml_asisten">Jumlah Asisten</label>
                        <input type="number" id="jml_asisten" name="jml_asisten" class="form-control"
                            placeholder="Enter Jumlah Asisten..">
                        <span class="help-block">Please enter your jumlah asisten</span>
                    </div>
                    <div class="form-group">
                        <label for="jml_ballboy">Jumlah Ballboy</label>
                        <input type="number" id="jml_ballboy" name="jml_ballboy" class="form-control"
                            placeholder="Enter Jumlah Ballboy..">
                        <span class="help-block">Please enter jumlah bllboy</span>
                    </div>
                    <div class="form-group">
                        <label for="tgl_start">Tanggal Mulai</label>
                        <input type="date" id="tgl_start" name="tgl_start" class="form-control"
                            placeholder="Enter Tanggal Mulai..">
                        <span class="help-block">Please enter tanggal mulai</span>
                    </div>
                    <div class="form-group">
                        <label for="tgl_end">Tanggal Berakhir</label>
                        <input type="date" id="tgl_end" name="tgl_end" class="form-control"
                            placeholder="Enter Tanggal Berakhir..">
                        <span class="help-block">Please enter tanggal berakhir</span>
                    </div>
                    <div class="form-group">
                        <label for="time_start">Waktu Mulai</label>
                        <input type="time" id="time_start" name="time_start" class="form-control"
                            placeholder="Enter Waktu Mulai..">
                        <span class="help-block">Please enter waktu mulai</span>
                    </div>
                    <div class="form-group">
                        <label for="time_end">Waktu Berakhir</label>
                        <input type="time" id="time_end" name="time_end" class="form-control"
                            placeholder="Enter Waktu Berakhir..">
                        <span class="help-block">Please enter waktu berakhir</span>
                    </div>
                    <div class="form-group">
                        <label for="durasi">Durasi Latihan</label>
                        <input type="number" id="durasi" name="durasi" class="form-control"
                            placeholder="Enter Durasi Latihan..">
                        <span class="help-block">Please enter durasi latihan</span>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Paket</label>
                        <input type="number" id="harga" name="harga" class="form-control"
                            placeholder="Enter Harga Paket..">
                        <span class="help-block">Please enter harga paket</span>
                    </div>
                    <div class="form-group">
                        <label for="kuota">Kuota Paket</label>
                        <input type="number" id="kuota" name="kuota" class="form-control"
                            placeholder="Enter Jumlah Kuota..">
                        <span class="help-block">Please enter jumlah kuota</span>
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
            ajax: "{{ route('paket.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama_paket',
                    name: 'nama_paket'
                },
                {
                    data: 'tgl_start',
                    name: 'tgl_start'
                },
                {
                    data: 'tgl_end',
                    name: 'tgl_end'
                },
                {
                    data: 'harga',
                    name: 'harga'
                },
                {
                    data: 'durasi',
                    name: 'durasi'
                },
                {
                    data: 'kuota',
                    name: 'kuota'
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

        // Create Data Paket Latihan.
        $('#btn-create-paket').click(function() {
            $('#saveBtn').val("create-paket");
            $('#paket_id').val('');
            $('#paketForm').trigger("reset");
            $('#modelHeading').html("TAMBAH DATA PAKET BARU");
            $('#ajaxModel').modal('show');
        });

        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');
            var formData = $('#paketForm').serialize();

            $.ajax({
                url: "{{ route('paket.store') }}",
                // method: 'post',
                data: {
                    id: $('#paket_id').val(),
                    nama_paket: $('#nama_paket').val(),
                    jml_pelatih: $('#jml_pelatih').val(),
                    jml_asisten: $('#jml_asisten').val(),
                    jml_ballboy: $('#jml_ballboy').val(),
                    tgl_start: $('#tgl_start').val(),
                    tgl_end: $('#tgl_end').val(),
                    time_start: $('#time_start').val(),
                    time_end: $('#time_end').val(),
                    harga: $('#harga').val(),
                    durasi: $('#durasi').val(),
                    kuota: $('#kuota').val(),
                },
                // data: $('#supplierForm').serialize(),
                type: "POST",
                dataType: 'json',

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

        // Edit Data Paket Latihan
        $('body').on('click', '.edit-paket', function() {
            var paket_id = $(this).data('id');
            $.get("{{ route('paket.index') }}" + '/' + paket_id + '/edit', function(
                data) {
                $('#modelHeading').html("EDIT DATA PAKET LATIHAN");
                $('#saveBtn').val("edit-user").attr('disabled', false);
                $('#ajaxModel').modal('show');
                $('#paket_id').val(data.id);
                $('#nama_paket').val(data.nama_paket).attr('disabled', false);
                $('#jml_pelatih').val(data.jml_pelatih).attr('disabled', false);
                $('#jml_asisten').val(data.jml_asisten).attr('disabled', false);
                $('#jml_ballboy').val(data.jml_ballboy).attr('disabled', false);
                $('#tgl_start').val(data.tgl_start).attr('disabled', false);
                $('#tgl_end').val(data.tgl_end).attr('disabled', false);
                $('#time_start').val(data.time_start).attr('disabled', false);
                $('#time_end').val(data.time_end).attr('disabled', false);
                $('#durasi').val(data.durasi).attr('disabled', false);
                $('#harga').val(data.harga).attr('disabled', false);
                $('#kuota').val(data.kuota).attr('disabled', false);
            })
        });

        // Show Data Paket Latihan
        $('body').on('click', '#show-paket', function() {
            var paket_id = $(this).data('id');
            $.get("{{ route('paket.index') }}" + '/' + paket_id + '/edit', function(
                data) {
                $('#modelHeading').html("SHOW DATA PAKET LATIHAN");
                $('#saveBtn').val("show-paket").attr('disabled', true);
                $('#ajaxModel').modal('show');
                $('#paket_id').val(data.id);
                $('#nama_paket').val(data.nama_paket).attr('disabled', true);
                $('#jml_pelatih').val(data.jml_pelatih).attr('disabled', true);
                $('#jml_asisten').val(data.jml_asisten).attr('disabled', true);
                $('#jml_ballboy').val(data.jml_ballboy).attr('disabled', true);
                $('#tgl_start').val(data.tgl_start).attr('disabled', true);
                $('#tgl_end').val(data.tgl_end).attr('disabled', true);
                $('#time_start').val(data.time_start).attr('disabled', true);
                $('#time_end').val(data.time_end).attr('disabled', true);
                $('#durasi').val(data.durasi).attr('disabled', true);
                $('#harga').val(data.harga).attr('disabled', true);
                $('#kuota').val(data.kuota).attr('disabled', true);
            })
        });

        // Arsipkan Data
        $('body').on('click', '#delete-paket', function() {

            swal({
                    text: "Apakah anda yakin?",
                    text: "Setelah diNon-Aktifkan, Data paket Tidak Akan di Tampilkan!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })

                .then((willDelete) => {
                    if (willDelete) {
                        var paket_id = $(this).data("id");
                        $.ajax({
                            type: "DELETE",
                            url: 'paket/' + paket_id,
                            data: paket_id,
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
