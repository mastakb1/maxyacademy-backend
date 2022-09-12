@extends('layout.master')
@section('title', 'Access Master Detail')
@section('content')
<?php

use Carbon\Carbon;
?>
<div class="right_col" role="main">
    <div class="">
        <div class="row top_tiles">
            <div class="wrapper">
                <div class="row" id="row-report">
                    <div class="col-md-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Access Master Detail
                            </header>
                            <div class="panel-body" id="toro-area">
                                <div class="ui card" style="width: 100%;">
                                    <div class="content">
                                        <div class="header">General</div>
                                    </div>
                                    <div class="content">
                                        <div class="description">
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2"><b>Nama :</b></div>
                                                <div class="col-sm-10">{{ $data['access_master']->name }}</div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2"><b>Keterangan : </b></div>
                                                <div class="col-sm-10"><?php echo $data['access_master']->description ?></div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2"><b>Created At : </b></div>
                                                <div class="col-sm-10">{{ date('d-m-Y H:i:s', strtotime($data['access_master']->created_at)) }}</div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2"><b>Created By : </b></div>
                                                <div class="col-sm-10">{{ $data['access_master']->user_create->name }}</div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2"><b>Updated At : </b></div>
                                                <div class="col-sm-10">{{ date('d-m-Y H:i:s', strtotime($data['access_master']->updated_at)) }}</div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2"><b>Updated By : </b></div>
                                                <div class="col-sm-10">{{ $data['access_master']->user_update->name }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ui card" style="width: 100%;">
                                    <div class="content">
                                        <div class="header">Statistics</div>
                                    </div>
                                    <div class="content">
                                        <div class="description">
                                            <div class="ui one statistics">
                                                <div class="statistic">
                                                    <div class="value">
                                                        {{ $data['access_master']->access_groups->count() }}
                                                    </div>
                                                    <div class="label">
                                                        Access Group
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ui card" style="width: 100%;">
                                    <div class="content">
                                        <div class="header">Access Group</div>
                                    </div>
                                    <div class="content">
                                        <div class="description">
                                            <div id="btnbar" style="float: right; margin-bottom: 10px"></div>
                                            <table id="toro-data" class=" table table-hover table-bordered convert-data-table display" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Actions</th>
                                                        <th>ID</th>
                                                        <th>Access Group</th>
                                                        <th>Keterangan</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Actions</th>
                                                        <th>ID</th>
                                                        <th>Access Group</th>
                                                        <th>Keterangan</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footerScripts')
<link href="{{ asset ('semantic/components/icon.min.css') }}" rel="stylesheet">
<link href="{{ asset ('semantic/components/statistic.min.css') }}" rel="stylesheet">
<link href="{{ asset ('semantic/components/card.css') }}" rel="stylesheet">
<link href="{{ asset ('js/data-table/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset ('js/data-table/buttons/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset ('js/data-table/colreorder/colReorder.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset ('js/data-table/keytable/keyTable.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset ('js/data-table/fixedheader/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset ('js/data-table/fixedcolumns/fixedColumns.bootstrap.min.css') }}" rel="stylesheet">

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
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#toro-data tfoot th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" class="form-control" name="search_tabel" placeholder="Search ' + title + '" />');
        });
        tabel = $('#toro-data').DataTable({
            "responsive": true,
            "ordering": true,
            "data": <?= $data['access_master']->access_groups ?>,
            "columns": [{
                    data: 'id',
                    render: function(value) {
                        return "<a class='btn btn-success btn-xl' href='<?= url('access_groups') . '/' ?>" + btoa(value) + "'><i class='fa fa-fw fa-eye'></i> Detail</a>";
                    }
                }, {
                    data: 'id'
                },
                {
                    data: 'name'
                },
                {
                    data: 'description'
                }
            ],
            "PaginationType": "bootstrap",
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