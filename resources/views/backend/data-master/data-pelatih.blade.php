@extends('backend.main')

@section('content')
    <!-- Page content -->
    <div id="page-content">
        <!-- Datatables Header -->
        <div class="content-header">
            <div class="header-section">
                <h1>
                    <i class="fa fa-table"></i>Master Data<br><small>Data Pelatih</small>
                </h1>
            </div>
        </div>
        <ul class="breadcrumb breadcrumb-top">
            <li>Master Data</li>
            <li><a href="">Data Pelatih</a></li>
        </ul>
        <!-- END Datatables Header -->

        <!-- Datatables Content -->
        <div class="block full">
            <div class="block-title">
                <h2><strong>Data</strong> Pelatih</h2>
            </div>
            <div>
                <div class="col">
                    <button style="margin-bottom:10px" type="button" class="btn btn-info btn-sm mt-2" data-toggle="modal"
                        data-target="#modal-create" id="btn-create-pelatih"><i class="fa fa-plus"></i>
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
                            <th>Nama Pelatih</th>
                            <th>Pengalaman</th>
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
                <form id="pelatihForm" name="pelatihForm" class="form-bordered">
                    <input type="hidden" class="pelatih_id" name="pelatih_id" id="pelatih_id">
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="nama_pelatih">Nama Pelatih</label>
                        <div class="col-md-9">
                            <input type="text" id="nama_pelatih" name="nama_pelatih"
                                class="form-control" placeholder="Masukkan Nama Pelatih">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="pengalaman">Pengalaman</label>
                        <div class="col-md-9">
                            <textarea id="pengalaman" name="pengalaman" rows="9" class="form-control"
                                placeholder="Masukkan Pengalaman Pelatih..."></textarea>
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Rendering Table
        var table = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('pelatih.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama_pelatih',
                    name: 'nama_pelatih'
                },
                {
                    data: 'pengalaman',
                    name: 'pengalaman'
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
        $('#btn-create-pelatih').click(function() {
            $('#saveBtn').val("create-pelatih");
            $('#pelatih_id').val('');
            $('#pelatihForm').trigger("reset");
            $('#modelHeading').html("TAMBAH DATA PELATIH BARU");
            $('#ajaxModel').modal('show');
        });

        $('#saveBtn').click(function(e) {
            e.preventDefault();
            $(this).html('Sending..');
            var formData = $('#pelatihForm').serialize();

            $.ajax({
                url: "{{ route('pelatih.store') }}",
                // method: 'post',
                data: {
                    id: $('#pelatih_id').val(),
                    nama_pelatih: $('#nama_pelatih').val(),
                    pengalaman: $('#pengalaman').val(),
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

                        $('#pelatihForm').trigger("reset");
                        $('#saveBtn').html('SIMPAN');
                        $('#ajaxModel').modal('hide');

                        table.draw();
                    }
                }
            });
        });

        // Edit Data Pelanggan
        $('body').on('click', '.edit-pelatih', function() {
            var pelatih_id = $(this).data('id');
            $.get("{{ route('pelatih.index') }}" + '/' + pelatih_id + '/edit', function(
                data) {
                $('#modelHeading').html("EDIT DATA PELANGGAN");
                $('#saveBtn').val("edit-user");
                $('#ajaxModel').modal('show');
                $('#pelatih_id').val(data.id);
                $('#nama_pelatih').val(data.nama_pelatih);
                $('#pengalaman').val(data.pengalaman);
            })
        });

        // Arsipkan Data
        $('body').on('click', '#delete-pelatih', function() {

            swal({
                    text: "Apakah anda yakin?",
                    text: "Setelah diNon-Aktifkan, Data Pelatih Tidak Akan di Tampilkan!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })

                .then((willDelete) => {
                    if (willDelete) {
                        var pelatih_id = $(this).data("id");
                        $.ajax({
                            type: "DELETE",
                            url: 'pelatih/' + pelatih_id,
                            data: pelatih_id,
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
