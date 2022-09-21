@extends('layout.master')
@section('title', 'Confirm Order Report')
@section('content')
<?php

use Illuminate\Support\Facades\Session;

?>
<style>
    .multiselect-container {
        width: 100% !important;
    }
</style>
<div class="right_col" role="main">
    <div class="">
        <div class="row top_tiles">
            <div class="wrapper">
                <div class="row" id="row-report">
                    <div class="col-md-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Filter
                            </header>
                            <div class="panel-body">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="date" name="date" placeholder="Date" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="course">Course</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <div>
                                            <input type="text" class="form-control" id="course" name="course" placeholder="Course">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="course_price">Course Price</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <div>
                                            <input type="text" class="form-control" id="course_price" name="course_price" placeholder="Course Price">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="member">Member</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <div>
                                            <input type="text" class="form-control" id="member" name="member" placeholder="Member">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="status">Status</label>
                                    </div>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <select required class="selectpicker" multiple data-actions-box="true" data-live-search="true" id="status">
                                                <option value="0">Not Complete</option>
                                                <option value="1">Complete</option>
                                                <option value="2">Partial</option>
                                                <option value="4">Cancelled</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="confirm_order_number" class="col-sm-2 col-form-label">Nomor Confirm Order</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="confirm_order_number" name="confirm_order_number" placeholder="Enter nomor confirm order" data-bind="value: confirm_order_number">
                                    </div>
                                </div>
                                @if(check_user_access(Session::get('user_access'),'trans_order_confirm_report_create'))
                                <button type="button" class="btn btn-primary" id="btn-submit" data-bind="click: createReport">Create Report</button>
                                @else
                                <button type="button" class="btn btn-primary" id="btn-submit" disabled>You don't have permission to create report</button>
                                @endif
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="row top_tiles" id="executive_summary">
            <div class="wrapper">
                <div class="row" id="row-report">
                    <div class="col-md-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Executive Summary
                            </header>
                            <div class="panel-body">
                                <div class="ui two statistics">
                                    <div class="statistic">
                                        <div class="value" id="records">
                                            0
                                        </div>
                                        <div class="label">
                                            Records
                                        </div>
                                    </div>
                                    <div class="statistic">
                                        <div class="value" id="total_payment">
                                            0
                                        </div>
                                        <div class="label">
                                            Purchase Order
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="row top_tiles" id="detail_report">
            <div class="wrapper">
                <div class="row" id="row-report">
                    <div class="col-md-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Detail Report
                            </header>
                            <div class="panel-body">
                                <div id="btnbar" style="float: right; margin-bottom: 10px"></div>
                                <table id="toro-data" class=" table table-hover table-bordered convert-data-table display" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nomor Order</th>
                                            <th>Nomor Confirm Order</th>
                                            <th>Member</th>
                                            <th>Course</th>
                                            <th>Course Price</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                </table>
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
<link href="{{ asset ('js/data-table/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset ('js/data-table/buttons/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset ('js/data-table/colreorder/colReorder.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset ('js/data-table/keytable/keyTable.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset ('js/data-table/fixedheader/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset ('js/data-table/fixedcolumns/fixedColumns.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset ('semantic/components/icon.min.css') }}" rel="stylesheet">
<link href="{{ asset ('semantic/components/statistic.min.css') }}" rel="stylesheet">
<link href="{{ asset ('semantic/components/label.css') }}" rel="stylesheet">
<link href="{{ asset ('css/daterangepicker/daterangepicker.css') }}" rel="stylesheet">
<link href="{{ asset ('css/bootstrap-multiselect/bootstrap-multiselect.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

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
<script src="{{ asset ('js/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset ('js/bootstrap-daterangepicker/moment.js') }}"></script>
<script src="{{ asset ('js/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
<script src="{{ asset ('js/knockout.js') }}"></script>
@endsection

@section('script')
<script type="text/javascript">
    var start_date;
    var end_date;

    function generateTable(data) {
        $('#toro-data tfoot th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" class="form-control" name="search_tabel" placeholder="Search ' + title + '" />');
        });
        tabel = $('#toro-data').DataTable({
            "responsive": true,
            "ordering": true,
            "data": data,
            "columns": [{
                    data: 'date'
                },
                {
                    data: 'order_number'
                },
                {
                    data: 'order_confirm_number'
                },
                {
                    data: 'member'
                },
                {
                    data: 'course'
                },
                {
                    data: 'course_price'
                },
                {
                    data: 'total',
                    render: function(value) {
                        return parseInt(value).toLocaleString();
                    }
                },
                {
                    data: 'status',
                    render: function(value) {
                        var status = '';
                        if (value == 0) {
                            status = "<a class='label red ui' style='font-size: 10px;'>Not Complete</a>";
                        } else if (value == 1) {
                            status = "<a class='label green ui' style='font-size: 10px;'>Complete</a>";
                        } else if (value == 2) {
                            status = "<a class='label yellow ui' style='font-size: 10px;'>Partial</a>";
                        } else if (value == 4) {
                            status = "<a class='label red ui' style='font-size:10px;'>Cancelled</a>";
                        }
                        return status;
                    }
                },
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
    }

    function split(val) {
        return val.split(/,\s*/);
    }

    function extractLast(term) {
        return split(term).pop();
    }

    function OrderReportViewModel() {
        var self = this;

        self.confirm_order_number = ko.observable('');
        self.selectedMember = ko.observableArray([]);
        self.selectedCourse = ko.observableArray([]);
        self.selectedCoursePrice = ko.observableArray([]);

        $("#member").autocomplete({
            source: function(request, response) {
                var searchText = extractLast(request.term);
                if (searchText != '') {
                    $.ajax({
                        url: "<?= url('members/filter') ?>" + "/" + searchText,
                        type: 'get',
                        dataType: "json",
                        success: function(data) {
                            response(data);
                        }
                    });
                }
            },
            select: function(event, ui) {
                var terms = split($('#member').val());
                terms.pop();
                terms.push(ui.item.label);
                terms.push("");
                $('#member').val(terms.join(", "));

                self.selectedMember.push(ui.item.id);
                return false;
            }

        });

        $("#course").autocomplete({
            source: function(request, response) {
                var searchText = extractLast(request.term);
                if (searchText != '') {
                    $.ajax({
                        url: "<?= url('course_classes/filter') ?>" + "/" + searchText,
                        type: 'get',
                        dataType: "json",
                        success: function(data) {
                            response(data);
                        }
                    });
                }
            },
            select: function(event, ui) {
                var terms = split($('#course').val());
                terms.pop();
                terms.push(ui.item.label);
                terms.push("");
                $('#course').val(terms.join(", "));

                self.selectedCourse.push(ui.item.id);
                return false;
            }
        });

        $("#course_price").autocomplete({
            source: function(request, response) {
                var searchText = extractLast(request.term);
                if (searchText != '') {
                    $.ajax({
                        url: "<?= url('course_prices/filter') ?>" + "/" + searchText,
                        type: 'get',
                        dataType: "json",
                        success: function(data) {
                            response(data);
                        }
                    });
                }
            },
            select: function(event, ui) {
                var terms = split($('#course_price').val());
                terms.pop();
                terms.push(ui.item.label);
                terms.push("");
                $('#course_price').val(terms.join(", "));

                self.selectedCoursePrice.push(ui.item.id);
                return false;
            }

        });

        self.createReport = function() {
            if ($.fn.DataTable.isDataTable('#toro-data')) {
                $('#toro-data').DataTable().destroy();
            }
            $("#btn-submit").prop("disabled", true);
            $("#btn-submit").html('<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading...');

            start_date = moment(start_date).format('YYYY-MM-DD');
            end_date = moment(end_date).format('YYYY-MM-DD');
            var status = $('#status').val();

            $.post("{{ route('reports.generateConfirmOrderReport') }}", {
                '_token': '<?= csrf_token() ?>',
                'start_date': start_date,
                'end_date': end_date,
                'summary': ko.toJSON(self),
                'status': JSON.stringify(status),
            }, function(result) {
                let data = result.data;
                $("#btn-submit").html('Create Report');
                $("#btn-submit").prop("disabled", false);
                $('#executive_summary').show();
                $('#detail_report').show();
                $('#records').html(data.order.length);
                $('#total_payment').html(parseInt(data.total_payment).toLocaleString());
                generateTable(data.order);

                $('#confirm_order_number').val('');
                $('#course').val('');
                $('#member').val('');
                $('#course_price').val('');
                $('#status').val('default');
                $('#status').selectpicker('refresh');
                self.confirm_order_number('');
                self.selectedCourse([]);
                self.selectedMember([]);
                self.selectedCoursePrice([]);
            });
        }
    }

    ko.applyBindings(new OrderReportViewModel());

    $(document).ready(function() {
        $('#executive_summary').hide();
        $('#detail_report').hide();

        $('.selectpicker').selectpicker();

        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#date span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            start_date = start;
            end_date = end;
        }

        $('#date').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            locale: {
                format: 'DD/MM/YYYY'
            },
        }, cb);

        cb(start, end);
    });
</script>
@endsection