@extends('layout.master')
@section('title', 'Calendar')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="row top_tiles">
            <div class="wrapper">
                <div class="row" id="row-report">
                    <div class="col-md-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Calendar
                            </header>
                            <div class="panel-body" id="toro-area">
                                <div id="calendar"></div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="CalenderModalNew" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Calendar</h4>
            </div>
            <div class="modal-body">
                <div id="testmodal" style="padding: 5px 20px;">
                    <form id="antoform" class="form-horizontal calender" role="form">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" style="height:55px;" id="keterangan" name="keterangan"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jam</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="jam_awal" name="jam_awal" required autocomplete="off">
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="jam_akhir" name="jam_akhir" required autocomplete="off">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default antoclose" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary antosubmit">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div id="fc_create" data-toggle="modal" data-target="#CalenderModalNew"></div>

<div id="CalenderModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel2">Calendar</h4>
            </div>
            <div class="modal-body">

                <div id="testmodal2" style="padding: 5px 20px;">
                    <form id="antoform2" class="form-horizontal calender" role="form">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama2" name="nama2" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" style="height:55px;" id="keterangan2" name="keterangan2"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Jam</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="jam_awal2" name="jam_awal2" required autocomplete="off">
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="jam_akhir2" name="jam_akhir2" required autocomplete="off">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default antoclose2" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger antodelete2">Delete</button>
                <button type="button" class="btn btn-primary antosubmit2">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div id="fc_edit" data-toggle="modal" data-target="#CalenderModalEdit"></div>
@endsection
@section('footerScripts')
@parent
<link href="{{ asset ('js/select2/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset ('js/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset ('js/fullcalendar/lib/main.css') }}" rel="stylesheet">
<link href="{{ asset ('js/bootstrap-datetimepicker-master/build/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
<style>
    .form-control[disabled],
    .form-control[readonly],
    fieldset[disabled] .form-control {
        background-color: white;
    }
</style>

<script src="{{ asset ('js/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset ('js/knockout.js') }}"></script>
<script src="{{ asset ('js/knockout-sortable.js') }}"></script>
<script src="{{ asset ('js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset ('js/tinymce/jquery.tinymce.min.js') }}"></script>
<script src="{{ asset('js/fullcalendar/lib/main.js') }}"></script>
<script src="{{ asset ('js/moment/moment.min.js') }}"></script>
<script src="{{ asset ('js/bootstrap-datetimepicker-master/build/js/bootstrap-datetimepicker.min.js') }}"></script>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            selectable: true,
            select: function(info) {
                var start = info.startStr;
                var end = info.endStr;

                $('#fc_create').click();

                $('.antosubmit').on('click', function() {
                    var id_user = '<?= $data['id_user'] ?>';
                    var nama = $('#nama').val();
                    var keterangan = $('#keterangan').val();
                    var jam_awal = $('#jam_awal').val();
                    var jam_akhir = $('#jam_akhir').val();
                    $.ajax({
                        type: 'POST',
                        url: '<?= route('user_calendars.store') ?>',
                        data: {
                            _token: '<?= csrf_token() ?>',
                            id_user: id_user,
                            nama: nama,
                            keterangan: keterangan,
                            tanggal_awal: start,
                            tanggal_akhir: end,
                            jam_awal: jam_awal,
                            jam_akhir: jam_akhir,
                        },
                        success: function(result) {
                            calendar.unselect();
                            $('.antosubmit').off('click');
                            location.reload();
                        }
                    });
                });
            },
            events: <?php echo $data['calendar'] ?>,
            editable: true,
            eventClick: function(info) {
                $('#fc_edit').click();

                var event = info.event;
                var utc_start = moment.utc(event.start).toDate();
                var utc_end = moment.utc(event.end).toDate();

                $('#nama2').val(event.title);
                $('#keterangan2').val(event.extendedProps.keterangan);
                $('#jam_awal2').val(moment(utc_start).local().format('HH:mm'));
                $('#jam_akhir2').val(moment(utc_end).local().format('HH:mm'));

                $('.antosubmit2').on('click', function() {
                    var id_user = '<?= $data['id_user'] ?>';
                    var id_calendar = event.id;
                    var nama = $('#nama2').val();
                    var keterangan = $('#keterangan2').val();
                    var jam_awal = $('#jam_awal2').val();
                    var jam_akhir = $('#jam_akhir2').val();
                    $.ajax({
                        type: 'POST',
                        url: '<?= route('user_calendars.update') ?>',
                        data: {
                            _token: '<?= csrf_token() ?>',
                            id_user: id_user,
                            id_calendar: id_calendar,
                            nama: nama,
                            keterangan: keterangan,
                            jam_awal: jam_awal,
                            jam_akhir: jam_akhir,
                        },
                        success: function(result) {
                            calendar.unselect();
                            $('.antosubmit2').off('click');
                            location.reload();
                        }
                    });
                });

                $('.antodelete2').on('click', function() {
                    $.ajax({
                        type: 'POST',
                        url: '<?= route('user_calendars.destroy') ?>',
                        data: {
                            _token: '<?= csrf_token() ?>',
                            id_calendar: event.id,
                        },
                        success: function(result) {
                            calendar.unselect();
                            $('.antosubmit2').off('click');
                            location.reload();
                        }
                    });
                });
            }
        });
        calendar.render();

        $('#jam_awal').datetimepicker({
            format: 'H:mm',
        });

        $('#jam_akhir').datetimepicker({
            format: 'H:mm',
        });

        $('#jam_awal2').datetimepicker({
            format: 'H:mm',
        });

        $('#jam_akhir2').datetimepicker({
            format: 'H:mm',
        });
    });
</script>
@endsection