@extends('backend.main')

@section('content')
    <!-- Page content -->
    <div id="page-content">
        <!-- Datatables Header -->
        <div class="content-header">
            <div class="header-section">
                <h1>
                    <i class="fa fa-table"></i>Master Data<br><small>Data History Transaksi Pelanggan</small>
                </h1>
            </div>
        </div>
        <ul class="breadcrumb breadcrumb-top">
            <li>Master Data</li>
            <li><a href="">Data History Transaksi Pelanggan</a></li>
        </ul>
        <!-- END Datatables Header -->

        <!-- Datatables Content -->
        <div class="block full">
            <div class="block-title">
                <h2><strong>Data</strong> History Transaksi Pelanggan</h2>
            </div>

            <div class="table-responsive">
                <table id="example-datatable" class="table datatable table-center table-condensed table-bordered"
                    width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Nama Pelanggan</th>
                            <th>Email</th>
                            <th>No Hp</th>
                            <th>Metode Bayar</th>
                            <th>Bukti Bayar</th>
                            <th>Total</th>
                            <th>Tgl Transaksi</th>
                            <th>Status</th>
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
                <form id="userForm" name="userForm" class="form-bordered">
                    <input type="hidden" class="user_id" name="user_id" id="user_id">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control"
                            placeholder="Enter name..">
                        <span class="help-block">Please enter your name</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control"
                            placeholder="Enter Email..">
                        <span class="help-block">Please enter your email</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control"
                            placeholder="Enter Password..">
                        <span class="help-block">Please enter your password</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Confirmation Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="form-control" placeholder="Enter password again..">
                        <span class="help-block">Please enter your password again</span>
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
            ajax: "{{ route('history.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'nohp',
                    name: 'nohp'
                },
                {
                    data: 'metode_pemb',
                    name: 'metode_pemb'
                },
                {
                    data: 'bukti_bayar',
                    name: 'bukti_bayar'
                },
                {
                    data: 'total',
                    name: 'total'
                },
                {
                    data: 'tgl_transaksi',
                    name: 'tgl_transaksi'
                },
                {
                    data: 'status_pemb',
                    name: 'status_pemb'
                },
            ]
        });

        // Decline Data
        $('body').on('click', '#decline-transaksi', function() {

            swal({
                    title: "Apakah anda yakin?",
                    text: "Data Pembayaran Tidak Valid!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })

                .then((willDelete) => {
                    if (willDelete) {
                        var transaksi_id = $(this).data("id");
                        $.ajax({
                            type: "DELETE",
                            url: 'transaksi/' + transaksi_id,
                            data: transaksi_id,
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


        // Confirm Data
        $('body').on('click', '#confirm-transaksi', function() {

            swal({
                    title: "Apakah anda yakin?",
                    text: "Data Pembayaran Valid!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })

                .then((willDelete) => {
                    if (willDelete) {
                        var transaksi_id = $(this).data("id");
                        $.ajax({
                            type: "PUT",
                            url: 'transaksi/' + transaksi_id,
                            data: transaksi_id,
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
