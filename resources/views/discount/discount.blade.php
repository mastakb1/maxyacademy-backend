@extends('layout.master')
@section('title', 'Discount')
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
                                else echo 'Ubah'; ?> Discount
                            </header>
                            <div class="panel-body" id="toro-area">
                                <form id="toro-form" method="POST" action="{{ ($data['actions'] == 'store') ? route('discounts.store') : route('discounts.update', base64_encode($data['discount']->id)) }}">
                                    @if($data['actions']=='update') @method('PUT') @endif
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" data-bind="value: name" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="code" class="col-sm-2 col-form-label">Code</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="code" name="code" placeholder="Enter code" data-bind="value: code" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="description" class="col-sm-2 col-form-label">Keterangan</label>
                                        <div class="col-sm-10">
                                            <textarea class="textarea form-control" rows="8" name="description" data-bind="wysiwyg: description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-2 col-form-label" style="font-size: 13px;">Tanggal Barlaku</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="date" name="date" placeholder="Enter tanggal" data-bind="value:date" required autocomplete="off" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="discount_type" class="col-sm-2 col-form-label">Discount Type</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="discount_type" name="discount_type" required data-bind="value: discount_type,valueAllowUnset: true, options: $root.availableDiscountType, 
                                            optionsText: $data, optionsValue: $data, select2: { placeholder: 'Choose Discount Type', 
                                                allowClear: true, theme: 'bootstrap' }">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="discount" class="col-sm-2 col-form-label">Discount</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="discount" name="discount" placeholder="Enter discount" data-bind="value: discount" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="course" class="col-sm-2 col-form-label">Course</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="course" name="course" required data-bind="selectedOptions: id_m_course,valueAllowUnset: true, options: $root.availableCourse, 
                                            optionsText: 'name', optionsValue: 'id', select2: { placeholder: 'Choose Course', 
                                                allowClear: true, theme: 'bootstrap' }" multiple>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="package" class="col-sm-2 col-form-label">Package</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="package" name="package" required data-bind="selectedOptions: id_m_package,valueAllowUnset: true, options: $root.availablePackage, 
                                            optionsText: 'name', optionsValue: 'id', select2: { placeholder: 'Choose Package', 
                                                allowClear: true, theme: 'bootstrap' }" multiple>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="auto_apply" class="col-sm-2 col-form-label">Auto Apply</label>
                                        <div class="col-sm-10">
                                            <input type="checkbox" name="auto_apply" data-bind="checked: is_auto_apply"> Aktif
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
    .form-control[disabled],
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

    function DiscountViewModel() {
        var self = this;

        self.availableCourse = ko.observableArray(<?php if (isset($data['course'])) echo $data['course'] ?>);
        self.availablePackage = ko.observableArray(<?php if (isset($data['package'])) echo $data['package'] ?>);
        self.availableDiscountType = ko.observableArray(['FIXED', 'PERCENTAGE']);

        self.name = ko.observable('<?php if (isset($data['discount'])) echo $data['discount']->name ?>');
        self.code = ko.observable('<?php if (isset($data['discount'])) echo $data['discount']->code ?>');
        self.description = ko.observable('<?php if (isset($data['discount'])) echo $data['discount']->description ?>');
        self.discount_type = ko.observable('<?php if (isset($data['discount'])) echo $data['discount']->discount_type ?>');
        self.discount = ko.observable('<?php if (isset($data['discount'])) echo $data['discount']->discount ?>');
        self.id_m_course = ko.observableArray(<?php if (isset($data['course_discount'])) echo $data['course_discount'] ?>);
        self.id_m_package = ko.observableArray(<?php if (isset($data['package_discount'])) echo $data['package_discount'] ?>);
        self.date = ko.observable('');
        self.is_auto_apply = ko.observable(<?= (isset($data['discount'])) ? (($data['discount']->is_auto_apply == 1) ? 'true' : 'false') : 'true' ?>);
        self.status = ko.observable(<?= (isset($data['discount'])) ? (($data['discount']->status == 1) ? 'true' : 'false') : 'true' ?>);

        function dateRange(element, ko, _start, _end) {
            var start = _start != '' ? moment(_start) : moment();
            var end = _end != '' ? moment(_end) : moment();

            if (_start != '' && _end != '') {
                ko(moment(_start).format('DD MMMM YYYY H:mm') + ' - ' + moment(_end).format('DD MMMM YYYY H:mm'));
            }

            $('#' + element).daterangepicker({
                minDate: moment(),
                autoUpdateInput: false,
                timePicker: true,
                startDate: start,
                endDate: end,
                locale: {
                    format: 'DD MMMM YYYY H:mm',
                },
            }).on("apply.daterangepicker", function(e, picker) {
                ko(picker.startDate.format(picker.locale.format) + ' - ' + picker.endDate.format(picker.locale.format));
            }).on("cancel.daterangepicker", function(e, picker) {
                ko('');
            });
        }

        dateRange('date', self.date, '<?php if (isset($data['discount'])) echo $data['discount']->start_date ?>', '<?php if (isset($data['discount'])) echo $data['discount']->end_date ?>');
    }

    ko.applyBindings(new DiscountViewModel());
</script>
@endsection