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
                            <th>Jumlah Pelatih</th>
                            <th>Jumlah Asisten</th>
                            <th>Jumlah Ballboy</th>
                            <th>Harga</th>
                            <th>Durasi</th>
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
                        <input type="text" id="jml_pelatih" name="jml_pelatih" class="form-control"
                            placeholder="Enter Jumlah Pelatih..">
                        <span class="help-block">Please enter jumlah pelatih</span>
                    </div>
                    <div class="form-group">
                        <label for="jml_asisten">Jumlah Asisten</label>
                        <input type="text" id="jml_asisten" name="jml_asisten" class="form-control"
                            placeholder="Enter Jumlah Asisten..">
                        <span class="help-block">Please enter your jumlah asisten</span>
                    </div>
                    <div class="form-group">
                        <label for="jml_ballboy">Jumlah Ballboy</label>
                        <input type="text" id="jml_ballboy" name="jml_ballboy" class="form-control"
                            placeholder="Enter Jumlah Ballboy..">
                        <span class="help-block">Please enter jumlah bllboy</span>
                    </div>
                    <div class="form-group">
                        <label for="durasi">Durasi Latihan</label>
                        <input type="text" id="durasi" name="durasi" class="form-control"
                            placeholder="Enter Durasi Latihan..">
                        <span class="help-block">Please enter durasi latihan</span>
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga Paket</label>
                        <input type="text" id="harga" name="harga" class="form-control"
                            placeholder="Enter Harga Paket..">
                        <span class="help-block">Please enter harga paket</span>
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
                    data: 'jml_pelatih',
                    name: 'jml_pelatih'
                },
                {
                    data: 'jml_asisten',
                    name: 'jml_asisten'
                },
                {
                    data: 'jml_ballboy',
                    name: 'jml_ballboy'
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

        // Create New Pelanggan.
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
                    harga: $('#harga').val(),
                    durasi: $('#durasi').val(),
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

        // Edit Data Pelanggan
        $('body').on('click', '.edit-paket', function() {
            var paket_id = $(this).data('id');
            $.get("{{ route('paket.index') }}" + '/' + paket_id + '/edit', function(
                data) {
                $('#modelHeading').html("EDIT DATA PELANGGAN");
                $('#saveBtn').val("edit-user");
                $('#ajaxModel').modal('show');
                $('#paket_id').val(data.id);
                $('#nama_paket').val(data.nama_paket);
                $('#jml_pelatih').val(data.jml_pelatih);
                $('#jml_asisten').val(data.jml_asisten);
                $('#jml_ballboy').val(data.jml_ballboy);
                $('#durasi').val(data.durasi);
                $('#harga').val(data.harga);
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
