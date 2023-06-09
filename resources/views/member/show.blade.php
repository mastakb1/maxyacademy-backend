@extends('layout.master')
@section('title', 'Member Detail')
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
                                Member Detail
                            </header>
                            <div class="panel-body" id="toro-area">
                                <div class="ui card" style="width: 100%;">
                                    <div class="content">
                                        <div class="header">General</div>
                                    </div>
                                    <div class="content">
                                        <div class="description">
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2">
                                                    <b>Nama : </b>
                                                </div>
                                                <div class="col-sm-10">
                                                    {{ $data['member']->name }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2">
                                                    <b>Email : </b>
                                                </div>
                                                <div class="col-sm-10">
                                                    {{ $data['member']->email }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2">
                                                    <b>Telepon : </b>
                                                </div>
                                                <div class="col-sm-10">
                                                    {{ $data['member']->phone }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2">
                                                    <b>Alamat : </b>
                                                </div>
                                                <div class="col-sm-10">
                                                    {{ $data['member']->address }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2">
                                                    <b>Status : </b>
                                                </div>
                                                <div class="col-sm-10">
                                                    {{ $data['member']->status == 1 ? 'Aktif' : 'Tidak Aktif' }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2">
                                                    <b>Created At : </b>
                                                </div>
                                                <div class="col-sm-10">
                                                    {{ date('d-m-Y H:i:s', strtotime($data['member']->created_at)) }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2">
                                                    <b>Updated At : </b>
                                                </div>
                                                <div class="col-sm-10">
                                                    {{ date('d-m-Y H:i:s', strtotime($data['member']->updated_at)) }}
                                                </div>
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
                                                        {{ $data['member']->classes->count() }}
                                                    </div>
                                                    <div class="label">
                                                        Total Course
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ui card" style="width: 100%;">
                                    <div class="content">
                                        <div class="header">Member Courses</div>
                                    </div>
                                    <div class="content">
                                        <div class="description">
                                            <div id="btnbar" style="float: right; margin-bottom: 10px"></div>
                                            <table id="toro-data" class=" table table-hover table-bordered convert-data-table display" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>Actions</th>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Actions</th>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="ui card" style="width: 100%;">
                                    <div class="content">
                                        <div class="header">Member Education</div>
                                    </div>
                                    <div class="content">
                                        <div class="description">
                                            <div id="btnbar" style="float: right; margin-bottom: 10px"></div>
                                            <table id="toro-data-education" class=" table table-hover table-bordered convert-data-table display" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Degree</th>
                                                        <th>Field of Study</th>
                                                        <th>Score</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th>Description</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Degree</th>
                                                        <th>Field of Study</th>
                                                        <th>Score</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th>Description</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="ui card" style="width: 100%;">
                                    <div class="content">
                                        <div class="header">Member Transcripts</div>
                                    </div>
                                    <div class="content">
                                        <div class="description">
                                            <div id="btnbar" style="float: right; margin-bottom: 10px"></div>
                                            <table id="toro-data-transcript" class=" table table-hover table-bordered convert-data-table display" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Course Name</th>
                                                        <th>Score</th>
                                                        <th>Description</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Course Name</th>
                                                        <th>Score</th>
                                                        <th>Description</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="ui card" style="width: 100%;">
                                    <div class="content">
                                        <div class="header">Member Skills</div>
                                    </div>
                                    <div class="content">
                                        <div class="description">
                                            <div id="btnbar" style="float: right; margin-bottom: 10px"></div>
                                            <table id="toro-data-skill" class=" table table-hover table-bordered convert-data-table display" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Description</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Description</th>
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
    function datatable(btnBarElement, tableElement, footElement, data, column) {
        $(footElement).each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" class="form-control" name="search_tabel" placeholder="Search ' + title + '" />');
        });
        tabel = $(tableElement).DataTable({
            "responsive": true,
            "ordering": true,
            "data": data,
            "columns": column,
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

        tabel.buttons().container().appendTo($(btnBarElement));

        tabel.columns().every(function() {
            var that = this;
            $('input', this.footer()).on('keyup change', function() {
                if (that.search() !== this.value) {
                    that.search(this.value).draw();
                }
            });
        });
    }

    $(document).ready(function() {
        datatable('#btnbar', '#toro-data', '#toro-data tfoot th', <?= $data['courses'] ?>, [{
            data: {id_course: 'id_course', id_class: 'id_class'},
            render: function(value) {
                return "<a class='btn btn-success btn-xl' href='<?= url('courses') . '/' ?>" + btoa(value.id_course) + "/classes/" + btoa(value.id_class)  + "'><i class='fa fa-fw fa-eye'></i> Detail</a>";
            }
        }, {
            data: 'id_class'
        }, {
            data: 'name'
        }]);

        datatable('', '#toro-data-transcript', '#toro-data-transcript tfoot th', <?= $data['transcript'] ?>, [{
            data: 'id'
        }, {
            data: 'name'
        }, {
            data: 'score'
        }, {
            data: 'description'
        }]);

        datatable('', '#toro-data-skill', '#toro-data-skill tfoot th', <?= $data['skill'] ?>, [{
            data: 'id'
        }, {
            data: 'name'
        }, {
            data: 'description'
        }]);

        datatable('', '#toro-data-education', '#toro-data-education tfoot th', <?= $data['education'] ?>, [{
            data: 'id'
        }, {
            data: 'name'
        }, {
            data: 'degree'
        }, {
            data: 'field_of_study'
        }, {
            data: 'score'
        }, {
            data: 'start_date'
        }, {
            data: 'end_date'
        }, {
            data: 'description'
        }]);
    });
</script>
@endsection