@extends('layout.master')
@section('title', 'Course Price')
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
                                else echo 'Ubah'; ?> Course Price
                            </header>
                            <div class="panel-body" id="toro-area">
                                <form id="toro-form" method="POST" action="{{ ($data['actions'] == 'store') ? route('course_prices.store') : route('course_prices.update', base64_encode($data['course_price']->id)) }}">
                                    @if($data['actions']=='update') @method('PUT') @endif
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" data-bind="value: name" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="description" class="col-sm-2 col-form-label">Keterangan</label>
                                        <div class="col-sm-10">
                                            <textarea class="textarea form-control" rows="8" name="description" data-bind="wysiwyg: description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="price" class="col-sm-2 col-form-label">Harga</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="price" name="price" placeholder="Enter price" data-bind="value: price" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="benefits" class="col-sm-2 col-form-label">Benefits</label>
                                        <div class="col-sm-10">
                                            <button type="button" class="btn btn-success" data-bind="click: addBenefit"><i class="fa fa-plus"></i> Add Benefit</button>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="benefits" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10" data-bind="foreach: benefits">
                                            <div class="form-group row">
                                                <div class="col-sm-1">
                                                    <input type="checkbox" name="benefit" data-bind="checked: isChecked">
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter benefit name" data-bind="value: name" required>
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="description" name="description" placeholder="Enter benefit description" data-bind="value: description">
                                                </div>
                                                <div class="col-sm-1">
                                                    <button type="button" class="btn btn-danger" data-bind="click: $parent.removeBenefit"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </div>
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

<script src="{{ asset ('js/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset ('js/knockout.js') }}"></script>
<script src="{{ asset ('js/knockout-sortable.js') }}"></script>
<script src="{{ asset ('js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset ('js/tinymce/jquery.tinymce.min.js') }}"></script>
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

    function Benefit(name, description, isChecked) {
        var self = this;

        self.name = ko.observable(name);
        self.description = ko.observable(description);
        self.isChecked = ko.observable(isChecked == 1 ? true : false);
    }

    function CoursePriceViewModel() {
        var self = this;

        self.name = ko.observable('<?php if (isset($data['course_price'])) echo $data['course_price']->name ?>');
        self.description = ko.observable('<?php if (isset($data['course_price'])) echo $data['course_price']->description ?>');
        self.price = ko.observable('<?php if (isset($data['course_price'])) echo $data['course_price']->price ?>');
        self.status = ko.observable(<?= (isset($data['course_price'])) ? (($data['course_price']->status == 1) ? 'true' : 'false') : 'true' ?>);
        self.benefits = ko.observableArray([]);

        <?php if (isset($data['course_price'])) : ?>
            <?php foreach ($data['course_price']->benefits as $benefit) : ?>
                self.benefits.push(new Benefit('<?= $benefit->name ?>', '<?= $benefit->description ?>', '<?= $benefit->status ?>'))
            <?php endforeach; ?>
        <?php endif; ?>

        self.addBenefit = function() {
            self.benefits.push(new Benefit('', '', false));
        }

        self.removeBenefit = function(benefit) {
            self.benefits.remove(benefit);
        }
    }

    ko.applyBindings(new CoursePriceViewModel());
</script>
@endsection