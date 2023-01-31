@extends('layout.master')
@section('title', 'FaQ')
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
                                else echo 'Ubah'; ?> FaQ
                            </header>
                            <div class="panel-body" id="toro-area">
                                <form id="toro-form" method="POST" action="{{ ($data['actions'] == 'store') ? route('faqs.store') : route('faqs.update', base64_encode($data['faq']->id)) }}" enctype="multipart/form-data">
                                    @if($data['actions']=='update') @method('PUT') @endif
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Nama Kelompok</label>
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
                                        <label for="detail" class="col-sm-2 col-form-label">FaQ</label>
                                        <div class="col-sm-10">
                                            <button type="button" class="btn btn-success" data-bind="click: addFaq"><i class="fa fa-plus"></i> Add FaQ</button>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="faqs" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10" data-bind="foreach: faqs">
                                            <div class="form-group row">
                                                <div class="col-sm-1">
                                                    <input type="checkbox" name="faq" data-bind="checked: faqIsChecked">
                                                </div>
                                                <div class="col-sm-10">
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="faq_question">Pertanyaan</label>
                                                            <textarea class="textarea form-control" placeholder="Enter Question" rows="5" name="faq_question" data-bind="wysiwyg: faq_question"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <label for="faq_answer">Jawaban</label>
                                                            <textarea class="textarea form-control" placeholder="Enter Answer" rows="5" name="faq_answer" data-bind="wysiwyg: faq_answer"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <button type="button" class="btn btn-danger" data-bind="click: $parent.removeFaq"><i class="fa fa-trash"></i></button>
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
<link href="{{ asset ('js/bootstrap-datetimepicker-master/build/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<link href="{{ asset ('css/daterangepicker/daterangepicker.css') }}" rel="stylesheet">

<script src="{{ asset ('js/moment/moment.min.js') }}"></script>
<script src="{{ asset ('js/bootstrap-datetimepicker-master/build/js/bootstrap-datetimepicker.min.js') }}"></script>
<script src="{{ asset ('js/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
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

    function img_preview(_file, _element) {
        var gb = _file.files;
        for (var i = 0; i < gb.length; i++) {
            var gbPreview = gb[i];
            var imageType = /image.*/;
            var preview = document.getElementById(_element);
            var reader = new FileReader();
            if (gbPreview.type.match(imageType)) {
                preview.file = gbPreview;
                reader.onload = (function(element) {
                    return function(e) {
                        element.src = e.target.result;
                    };
                })(preview);
                reader.readAsDataURL(gbPreview);
            } else {
                alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
            }
        }
    };

    function Faq(question, answer, isChecked) {
        var self = this;

        self.faq_question = ko.observable(question);
        self.faq_answer = ko.observable(answer);
        self.faqIsChecked = ko.observable(isChecked == 1 ? true : false);
    }

    function FaqViewModel() {
        var self = this;

        self.name = ko.observable('<?php if (isset($data['faq'])) echo $data['faq']->name ?>');
        self.description = ko.observable('<?php if (isset($data['faq'])) echo $data['faq']->description ?>');
        self.status = ko.observable(<?= (isset($data['faq'])) ? (($data['faq']->status == 1) ? 'true' : 'false') : 'true' ?>);
        self.faqs = ko.observableArray([]);

        <?php if (isset($data['faq']->details) && $data['faq']->details->count() > 0) : ?>
            <?php foreach ($data['faq']->details as $index => $faq) : ?>
                self.faqs.push(new Faq('<?= $faq->name ?>', '<?= $faq->description ?>', '<?= $faq->status ?>'))
            <?php endforeach; ?>
        <?php endif; ?>

        self.addFaq = function() {
            self.faqs.push(new Faq('', '', true));
        }

        self.removeFaq = function(faq) {
            self.faqs.remove(faq);
        }

    }

    ko.applyBindings(new FaqViewModel());
</script>
@endsection