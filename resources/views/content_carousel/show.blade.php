@extends('layout.master')
@section('title', 'Content Carousel Detail')
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
                                Content Carousel Detail
                            </header>
                            <div class="panel-body" id="toro-area">
                                <div class="ui card" style="width: 100%;">
                                    <div class="content">
                                        <div class="header">General</div>
                                    </div>
                                    <div class="content">
                                        <div class="description">
                                            @if($data['content_carousel']->image != NULL)
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-3">
                                                    <b>Image : </b>
                                                </div>
                                                <div class="col-sm-9">
                                                    <img src="{{asset('uploads/carousel/' . $data['content_carousel']->image)}}" width="264px">
                                                </div>
                                            </div>
                                            @endif
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-3">
                                                    <b>Nama : </b>
                                                </div>
                                                <div class="col-sm-9">
                                                    {{ $data['content_carousel']->name }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-3">
                                                    <b>Konten : </b>
                                                </div>
                                                <div class="col-sm-9">
                                                    <?php echo $data['content_carousel']->content ?>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-3">
                                                    <b>Keterangan : </b>
                                                </div>
                                                <div class="col-sm-9">
                                                    <?php echo $data['content_carousel']->description ?>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-3">
                                                    <b>Status : </b>
                                                </div>
                                                <div class="col-sm-9">
                                                    {{ $data['content_carousel']->status == 1 ? 'Aktif' : 'Tidak Aktif' }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-3">
                                                    <b>Status Button : </b>
                                                </div>
                                                <div class="col-sm-9">
                                                    {{ $data['content_carousel']->status_button == 1 ? 'Aktif' : 'Tidak Aktif' }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-3">
                                                    <b>Url Button : </b>
                                                </div>
                                                <div class="col-sm-9">
                                                    {{ $data['content_carousel']->url_button}}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-3">
                                                    <b>Created At : </b>
                                                </div>
                                                <div class="col-sm-9">
                                                    {{ date('d-m-Y H:i:s', strtotime($data['content_carousel']->created_at)) }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-3">
                                                    <b>Created By : </b>
                                                </div>
                                                <div class="col-sm-9">
                                                    {{ $data['content_carousel']->user_create->name }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-3">
                                                    <b>Updated At : </b>
                                                </div>
                                                <div class="col-sm-9">
                                                    {{ date('d-m-Y H:i:s', strtotime($data['content_carousel']->updated_at)) }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-3">
                                                    <b>Updated By : </b>
                                                </div>
                                                <div class="col-sm-9">
                                                    {{ $data['content_carousel']->user_update->name }}
                                                </div>
                                            </div>
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

    });
</script>
@endsection