@extends('layout.master')
@section('title', 'Order Confirm Detail')
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
                                Order Confirm Detail
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
                                                    <b>Order Number : </b>
                                                </div>
                                                <div class="col-sm-10">
                                                    {{ $data['order_confirm']->order->order_number }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2">
                                                    <b>Order Confirm Number : </b>
                                                </div>
                                                <div class="col-sm-10">
                                                    {{ $data['order_confirm']->order_confirm_number }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2">
                                                    <b>Order Confirm Date : </b>
                                                </div>
                                                <div class="col-sm-10">
                                                    {{ date('d-m-Y H:i:s', strtotime($data['order_confirm']->date)) }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2">
                                                    <b>Course : </b>
                                                </div>
                                                <div class="col-sm-10">
                                                    {{ $data['order_confirm']->order->course->name }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2">
                                                    <b>Course Price : </b>
                                                </div>
                                                <div class="col-sm-10">
                                                    {{ $data['order_confirm']->order->course_price->name }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2">
                                                    <b>Total Price : </b>
                                                </div>
                                                <div class="col-sm-10">
                                                    {{ $data['order_confirm']->order->total_after_discount }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2">
                                                    <b>Sender Account Name : </b>
                                                </div>
                                                <div class="col-sm-10">
                                                    {{ $data['order_confirm']->sender_account_name }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2">
                                                    <b>Sender Account Number : </b>
                                                </div>
                                                <div class="col-sm-10">
                                                    {{ $data['order_confirm']->sender_account_number }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2">
                                                    <b>Amount : </b>
                                                </div>
                                                <div class="col-sm-10">
                                                    {{ $data['order_confirm']->amount }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2">
                                                    <b>Payment Type : </b>
                                                </div>
                                                <div class="col-sm-10">
                                                    {{ $data['order_confirm']->payment_type->name }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2">
                                                    <b>Transfer to : </b>
                                                </div>
                                                <div class="col-sm-10">
                                                    {{ $data['order_confirm']->bank_account->account_name }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2">
                                                    <b>Status : </b>
                                                </div>
                                                <div class="col-sm-10">
                                                    <?php
                                                    $status = '';
                                                    switch ($data['order_confirm']->status) {
                                                        case 0:
                                                            $status =  "Not Completed";
                                                            break;
                                                        case 1:
                                                            $status = "Completed";
                                                            break;
                                                        case 2:
                                                            $status = "Waiting Payment Confirmation";
                                                            break;
                                                        case 4:
                                                            $status = "Cancelled";
                                                            break;
                                                    }

                                                    ?>
                                                    <?= $status ?>
                                                </div>
                                            </div>
                                            @if($data['order_confirm']->verified_at != NULL)
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2">
                                                    <b>Verified At : </b>
                                                </div>
                                                <div class="col-sm-10">
                                                    {{ date('d-m-Y H:i:s', strtotime($data['order_confirm']->verified_at)) }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2">
                                                    <b>Verified By : </b>
                                                </div>
                                                <div class="col-sm-10">
                                                    {{ $data['order_confirm']->user_verified->name }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2">
                                                    <b>Verified Comment : </b>
                                                </div>
                                                <div class="col-sm-10">
                                                    {{ $data['order_confirm']->verified_comment }}
                                                </div>
                                            </div>
                                            @endif
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2">
                                                    <b>Created At : </b>
                                                </div>
                                                <div class="col-sm-10">
                                                    {{ date('d-m-Y H:i:s', strtotime($data['order_confirm']->created_at)) }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2">
                                                    <b>Created By : </b>
                                                </div>
                                                <div class="col-sm-10">
                                                    {{ $data['order_confirm']->user_create->name }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2">
                                                    <b>Updated At : </b>
                                                </div>
                                                <div class="col-sm-10">
                                                    {{ date('d-m-Y H:i:s', strtotime($data['order_confirm']->updated_at)) }}
                                                </div>
                                            </div>
                                            <div class="row" style="margin-bottom: 5px;">
                                                <div class="col-sm-2">
                                                    <b>Updated By : </b>
                                                </div>
                                                <div class="col-sm-10">
                                                    {{ $data['order_confirm']->user_update->name }}
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