@extends('layout.master')
@section('title', 'Course Class')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="row top_tiles">
            <div class="wrapper">
                <div class="row" id="row-report">
                    <div class="col-md-12">
                        <section class="panel">
                            <header class="panel-heading">
                                <?php if ($data['actions'] == 'store') echo 'Tambah';
                                else echo 'Ubah'; ?> Course Class
                            </header>
                            <div class="panel-body" id="toro-area">
                                <form id="toro-form" method="POST" action="{{ ($data['actions'] == 'store') ? route('course_classes.store', $data['id_course']) : route('course_classes.update', ['id' => $data['id_course'], 'id_course_class' => base64_encode($data['course_class']->id)]) }}">
                                    @if($data['actions']=='update') @method('PUT') @endif
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" data-bind="value: name" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="batch" class="col-sm-2 col-form-label">Batch</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="batch" name="batch" placeholder="Enter batch" data-bind="value: batch" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-2 col-form-label" style="font-size: 13px;">Tanggal</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="date" name="date" placeholder="Enter tanggal" data-bind="value:date" required autocomplete="off" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="quota" class="col-sm-2 col-form-label">Quota</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="quota" name="quota" placeholder="Enter quota" data-bind="value: quota">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <input type="checkbox" name="status" data-bind="checked: status"> Aktif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="submit" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <input type="hidden" name="summary" data-bind="value: ko.toJSON($root)">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
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
@parent
<link href="{{ asset ('js/select2/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset ('js/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset ('js/bootstrap-datetimepicker-master/build/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<link href="{{ asset ('css/daterangepicker/daterangepicker.css') }}" rel="stylesheet">
<style>
    .form-control[readonly],
    fieldset[disabled] .form-control {
        background-color: white;
    }
</style>

<script src="{{ asset ('js/moment/moment.min.js') }}"></script>
<script src="{{ asset ('js/bootstrap-datetimepicker-master/build/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset ('js/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset ('js/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset ('js/knockout.js') }}"></script>
<script src="{{ asset ('js/knockout-sortable.js') }}"></script>
<script src="{{ asset ('js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset ('js/tinymce/jquery.tinymce.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
@endsection

@section('script')
<script>
    (function($, ko) {
        var binding = {
            'after': ['attr', 'value'],

            'defaults': {
                theme: "modern",
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                    "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
                ],
                image_advtab: true,
                toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
                toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code | qrcode ",
                entity_encoding: "raw",
                external_filemanager_path: "",
                filemanager_title: "ToroERP File Manager",
                external_plugins: {
                    "filemanager": ""
                },
            },

            'extensions': {},

            'init': function(element, valueAccessor, allBindings, viewModel, bindingContext) {
                if (!ko.isWriteableObservable(valueAccessor())) {
                    throw 'valueAccessor must be writeable and observable';
                }

                var options = allBindings.has('wysiwygConfig') ? allBindings.get('wysiwygConfig') : null,

                    ext = allBindings.has('wysiwygExtensions') ? allBindings.get('wysiwygExtensions') : [],

                    settings = configure(binding['defaults'], ext, options, arguments);

                $(element).text(valueAccessor()());
                setTimeout(function() {
                    $(element).tinymce(settings);
                }, 0);
                ko.utils['domNodeDisposal'].addDisposeCallback(element, function() {
                    $(element).tinymce().remove();
                });

                return {
                    controlsDescendantBindings: true
                };
            },

            'update': function(element, valueAccessor, allBindings, viewModel, bindingContext) {
                var tinymce = $(element).tinymce(),
                    value = valueAccessor()();

                if (tinymce) {
                    if (tinymce.getContent() !== value) {
                        tinymce.setContent(value);
                        tinymce.execCommand('keyup');
                    }
                }
            }

        };

        var configure = function(defaults, extensions, options, args) {
            var config = $.extend(true, {}, defaults);
            if (options) {
                ko.utils.objectForEach(options, function(property) {
                    if (Object.prototype.toString.call(options[property]) === '[object Array]') {
                        if (!config[property]) {
                            config[property] = [];
                        }
                        options[property] = ko.utils.arrayGetDistinctValues(config[property].concat(options[property]));
                    }
                });

                $.extend(true, config, options);
            }
            if (!config['plugins']) {
                config['plugins'] = ['paste'];
            } else if ($.inArray('paste', config['plugins']) === -1) {
                config['plugins'].push('paste');
            }
            var applyChange = function(editor) {
                editor.on('change keyup nodechange', function(e) {
                    args[1]()(editor.getContent());
                    for (var name in extensions) {
                        if (extensions.hasOwnProperty(name)) {
                            binding['extensions'][extensions[name]](editor, e, args[2], args[4]);
                        }
                    }
                });
            };

            if (typeof(config['setup']) === 'function') {
                var setup = config['setup'];
                config['setup'] = function(editor) {
                    setup(editor);
                    applyChange(editor);
                };
            } else {
                config['setup'] = applyChange;
            }

            return config;
        };

        ko.bindingHandlers['wysiwyg'] = binding;

    })(jQuery, ko);

    ko.bindingHandlers.select2 = {
        after: ["options", "value"],
        init: function(el, valueAccessor, allBindingsAccessor, viewModel) {
            $(el).select2(ko.unwrap(valueAccessor()));
            ko.utils.domNodeDisposal.addDisposeCallback(el, function() {
                $(el).select2('destroy');
            });
        },
        update: function(el, valueAccessor, allBindingsAccessor, viewModel) {
            var allBindings = allBindingsAccessor();
            var select2 = $(el).data("select2");
            if ("value" in allBindings) {
                var newValue = "" + ko.unwrap(allBindings.value);
                if ((allBindings.select2.multiple || el.multiple) && newValue.constructor !== Array) {
                    select2.val([newValue.split(",")]);
                } else {
                    select2.val([newValue]);
                }
            }
        }
    };

    function CourseClassViewModel() {
        var self = this;

        self.name = ko.observable('<?php if (isset($data['course'])) echo $data['course']->name ?>');
        self.batch = ko.observable('<?php if (isset($data['batch'])) echo $data['batch'] ?>');
        self.date = ko.observable('');
        self.quota = ko.observable('<?php if (isset($data['course_class'])) echo $data['course_class']->quota ?>');
        self.status = ko.observable(<?= (isset($data['course_class'])) ? (($data['course_class']->status == 1) ? 'true' : 'false') : 'true' ?>);

        function dateRange(element, ko, _start, _end) {
            var start = _start != '' ? moment(_start) : moment();
            var end = _end != '' ? moment(_end) : moment();

            if (_start != '' && _end != '') {
                ko(moment(_start).format('DD MMMM YYYY') + ' - ' + moment(_end).format('DD MMMM YYYY'));
            }

            $('#' + element).daterangepicker({
                minDate: moment(),
                autoUpdateInput: false,
                startDate: start,
                endDate: end,
                locale: {
                    format: 'DD MMMM YYYY',
                },
            }).on("apply.daterangepicker", function(e, picker) {
                ko(picker.startDate.format(picker.locale.format) + ' - ' + picker.endDate.format(picker.locale.format));
            }).on("cancel.daterangepicker", function(e, picker) {
                ko('');
            });
        }

        dateRange('date', self.date, '<?php if (isset($data['course_class'])) echo $data['course_class']->start_date ?>', '<?php if (isset($data['course_class'])) echo $data['course_class']->end_date ?>');
    }

    ko.applyBindings(new CourseClassViewModel());
</script>
@endsection