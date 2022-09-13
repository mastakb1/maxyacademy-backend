@extends('layout.master')
@section('title', 'Order Confirm')
@section('content')
<?php

use Illuminate\Support\Facades\Session;

?>
<div class="right_col" role="main">
    <div class="">
        <div class="row top_tiles">
            <div class="wrapper">
                <div class="row" id="row-report">
                    <div class="col-md-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Daftar Order Confirm
                            </header>
                            <div class="panel-body" id="toro-area">
                                @if(\Session::has('alert'))
                                <div class="alert alert-danger">
                                    <div>{{Session::get('alert')}}</div>
                                </div>
                                @endif
                                @can('access','order_confirm_create')
                                <a class="btn btn-info" href="{{ route('order_confirms.create') }}">Tambah Order Confirm</a>
                                @endcan
                                <div id="btnbar" style="float: right; margin-bottom: 10px"></div>
                                <table id="toro-data" class=" table table-hover table-bordered convert-data-table display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Actions</th>
                                            <th>ID</th>
                                            <th>No Order</th>
                                            <th>No Confirm Order</th>
                                            <th>Tanggal</th>
                                            <th>Nama Akun Bank Pengirim</th>
                                            <th>Nomor Akun Bank Pengirim</th>
                                            <th>Nama Bank Pengirim</th>
                                            <th>Nama Akun Bank Tujuan</th>
                                            <th>Nama Bank Tujuan</th>
                                            <th>Jumlah Pembayaran</th>
                                            <th>Member</th>
                                            <th>Status</th>
                                            <th>Verified At</th>
                                            <th>Verified By</th>
                                            <th>Verified Comment</th>
                                            <th>Created At</th>
                                            <th>Created By</th>
                                            <th>Updated At</th>
                                            <th>Updated By</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Actions</th>
                                            <th>ID</th>
                                            <th>No Order</th>
                                            <th>No Confirm Order</th>
                                            <th>Tanggal</th>
                                            <th>Nama Akun Bank Pengirim</th>
                                            <th>Nomor Akun Bank Pengirim</th>
                                            <th>Nama Bank Pengirim</th>
                                            <th>Nama Akun Bank Tujuan</th>
                                            <th>Nama Bank Tujuan</th>
                                            <th>Jumlah Pembayaran</th>
                                            <th>Member</th>
                                            <th>Status</th>
                                            <th>Verified At</th>
                                            <th>Verified By</th>
                                            <th>Verified Comment</th>
                                            <th>Created At</th>
                                            <th>Created By</th>
                                            <th>Updated At</th>
                                            <th>Updated By</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modalcomplete" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal"><span>&times;</span></button>
                <h4 class="modal-title" id="modal_title">Complete Order</h4>
            </div>
            <div class="modal-body">
                <div id='content' class="tab-content">
                    <div class="tab-pane active" id="uplod">
                        <form action="{{ route('order_confirms.verified') }}" method="POST" id="form_complete">
                            @csrf
                            <input type="hidden" name="id" id="id_order_confirm_complete">
                            <input type="hidden" name="action" value="COMPLETE">
                            <div class="form-group row">
                                <label for="forced_comment" class="col-sm-2 col-form-label">Alasan Complete</label>
                                <div class="col-sm-10">
                                    <textarea class="textarea form-control" rows="8" id="verified_comment" name="verified_comment"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="submit_complete">Simpan</button>
                <button class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<div id="modalcancel" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" data-dismiss="modal"><span>&times;</span></button>
                <h4 class="modal-title" id="modal_title">Cancel Order</h4>
            </div>
            <div class="modal-body">
                <div id='content' class="tab-content">
                    <div class="tab-pane active" id="uplod">
                        <form action="{{ route('order_confirms.verified') }}" method="POST" id="form_cancel">
                            @csrf
                            <input type="hidden" name="id" id="id_order_confirm_cancel">
                            <input type="hidden" name="action" value="CANCEL">
                            <div class="form-group row">
                                <label for="forced_comment" class="col-sm-2 col-form-label">Alasan Cancel</label>
                                <div class="col-sm-10">
                                    <textarea class="textarea form-control" rows="8" id="verified_comment" name="verified_comment"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" id="submit_cancel">Simpan</button>
                <button class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footerScripts')
<link href="{{ asset ('js/data-table/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset ('js/data-table/buttons/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset ('js/data-table/colreorder/colReorder.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset ('js/data-table/keytable/keyTable.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset ('js/data-table/fixedheader/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset ('js/data-table/fixedcolumns/fixedColumns.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset ('css/parsley/parsley.css') }}" rel="stylesheet">
<link href="{{ asset ('semantic/components/icon.min.css') }}" rel="stylesheet">
<link href="{{ asset ('semantic/components/statistic.min.css') }}" rel="stylesheet">
<link href="{{ asset ('semantic/components/label.css') }}" rel="stylesheet">

<script src="{{ asset ('js/data-table/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset ('js/data-table/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset ('js/data-table/buttons/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset ('js/data-table/buttons/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset ('js/data-table/buttons/buttons.flash.min.js') }}"></script>
<script src="{{ asset ('js/data-table/buttons/jszip.min.js') }}"></script>
<script src="{{ asset ('js/data-table/buttons/pdfmake.min.js') }}"></script>
<script src="{{ asset ('js/data-table/buttons/vfs_fonts.js') }}"></script>
<script src="{{ asset ('js/data-table/buttons/buttons.html5.min.js') }}"></script>
<script src="{{ asset ('js/data-table/buttons/buttons.print.min.js') }}"></script>
<script src="{{ asset ('js/data-table/buttons/buttons.colVis.min.js') }}"></script>
<script src="{{ asset ('js/data-table/colreorder/dataTables.colReorder.min.js') }}"></script>
<script src="{{ asset ('js/data-table/keytable/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset ('js/data-table/fixedheader/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset ('js/data-table/fixedcolumns/dataTables.fixedColumns.min.js') }}"></script>
<script src="{{ asset ('js/parsley/parsley.min.js') }}"></script>
@endsection

@section('script')
<script type="text/javascript">
    var tabel = null;

    function generateTable() {
        tabel.ajax.reload();
    }

    $(document).ready(function() {
        $('#toro-data').on('click', '#modal_cancel', function(e) {
            var id = $(e.currentTarget).data('order');
            $('#id_order_confirm_cancel').val(btoa(id));
        });

        $('#toro-data').on('click', '#modal_complete', function(e) {
            var id = $(e.currentTarget).data('order');
            $('#id_order_confirm_complete').val(btoa(id));
        });

        $('#submit_complete').on('click', function() {
            $('#form_complete').submit();
        });

        $('#submit_cancel').on('click', function() {
            $('#form_cancel').submit();
        });

        $('#toro-data tfoot th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" class="form-control" name="search_tabel" placeholder="Search ' + title + '" />');
        });
        tabel = $('#toro-data').DataTable({
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "ordering": true,
            "order": [
                [0, 'asc']
            ],
            "ajax": {
                "url": "{{ route('order_confirms.datatable') }}",
                "type": "GET",
            },
            "deferRender": true,
            "columnDefs": [{
                    "targets": [0],
                    "searchable": true,
                    "sortable": true
                },
                {
                    "targets": [1],
                    "searchable": true,
                    "sortable": true
                },
                {
                    "targets": [2],
                    "searchable": true,
                    "sortable": true
                }
            ],
            "PaginationType": "bootstrap",
            "lengthMenu": [
                [10, 25, 50, 100, 200, 300],
                [10, 25, 50, 100, 200, 300]
            ],
            colReorder: true,
            keys: true,
            fixedHeader: true,
            scrollX: true,
        });

        new $.fn.dataTable.Buttons(tabel, {
            buttons: [{
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [':visible']
                }
            }, {
                extend: 'csvHtml5',
                exportOptions: {
                    columns: [':visible']
                }
            }, {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [':visible']
                }
            }, {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                exportOptions: {
                    columns: [':visible']
                }
            }, {
                extend: 'print',
                exportOptions: {
                    columns: [':visible']
                }
            }, 'colvis']
        });

        tabel.buttons().container().appendTo($('#btnbar'));

        tabel.columns().every(function() {
            var that = this;
            $('input', this.footer()).on('keyup change', function() {
                if (that.search() !== this.value) {
                    that.search(this.value).draw();
                }
            });
        });
    });
</script>
@endsection