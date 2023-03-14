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
                            <th>Nama Pengadu</th>
                            <th>Email Pengadu</th>
                            <th>Deskripsi Aduan</th>
                            <th>No Hp</th>
                            <th>No Rek</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Datatables Content -->
    </div>
    <!-- END Page Content -->
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

@push('script-alt')
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/dataTables.bootstrap4.min.js"></script> --}}
    {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    {{-- <script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script> --}}
    <script src="{{ asset('backend/js/pages/tablesDatatables.js') }}"></script>
    {{-- <script>
        $(function() {
            TablesDatatables.init();
        });
    </script> --}}
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
            ajax: "{{ route('pengaduan.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'user_id.name'
                },
                {
                    data: 'email',
                    name: 'user_id.email'
                },
                {
                    data: 'deskripsi_aduan',
                    name: 'deskripsi_aduan'
                },
                {
                    data: 'nohp',
                    name: 'nohp'
                },
                {
                    data: 'norek',
                    name: 'norek'
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

 


        // Arsipkan Data Pengaduan
        $('body').on('click', '#delete-pengaduan', function() {

            swal({
                    text: "Apakah anda yakin?",
                    text: "Akan Mengkonfirmasi Bahwa Aduan Ini Telah Selesai!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })

                .then((willDelete) => {
                    if (willDelete) {
                        var pengaduan_id = $(this).data("id");
                        $.ajax({
                            type: "DELETE",
                            url: 'pengaduan/' + pengaduan_id,
                            data: pengaduan_id,
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
