@extends('layout.master')
@section('title', 'Company')
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
                                else echo 'Ubah'; ?> Company
                            </header>
                            <div class="panel-body" id="toro-area">
                                <form id="toro-form" method="POST" action="{{ ($data['actions'] == 'store') ? route('companies.store') : route('companies.update', base64_encode($data['company']->id)) }}" enctype="multipart/form-data">
                                    @if($data['actions']=='update') @method('PUT') @endif
                                    @csrf
                                    <div class="form-group row">
                                        <label for="logo" class="col-sm-3 col-form-label" style="font-size: 13px;">Logo</label>
                                        <div class="col-sm-9">
                                            <div class="main-img-preview">
                                                <?php if (isset($data['company'])) : ?>
                                                    <?php if ($data['company']->logo != NULL) : ?>
                                                        <img id="preview" name="preview" class="thumbnail img-preview" src="{{asset('uploads/company/' . $data['company']->logo)}}" title="Preview Logo">
                                                    <?php else : ?>
                                                        <img id="preview" name="preview" class="thumbnail img-preview" src="{{asset('uploads/default.png')}}" title="Preview Logo">
                                                    <?php endif; ?>
                                                <?php else : ?>
                                                    <img id="preview" name="preview" class="thumbnail img-preview" src="{{asset('uploads/default.png')}}" title="Preview Logo">
                                                <?php endif; ?>
                                            </div>
                                            <input type="file" name="logo" id="logo" class="form-control" onchange="img_preview(this, 'preview')">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" data-bind="value: name" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="type" class="col-sm-3 col-form-label">Jenis</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="type" id="type" required data-bind="value: type,valueAllowUnset: true, options: $root.availableType, 
                                            select2: { placeholder: 'Choose Type', 
                                                allowClear: true, theme: 'bootstrap' }">
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" data-bind="value: address" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-3 col-form-label">No Telepon</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone" data-bind="value: phone" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" data-bind="value: email" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="contact_person" class="col-sm-3 col-form-label">Narahubung</label>
                                        <div class="col-sm-9">
                                            <textarea class="textarea form-control" rows="8" name="contact_person" data-bind="wysiwyg: contact_person"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="url" class="col-sm-3 col-form-label">Website</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="url" name="url" placeholder="Enter Url" data-bind="value: url" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="contact_person" class="col-sm-3 col-form-label">Keterangan</label>
                                        <div class="col-sm-9">
                                            <textarea class="textarea form-control" rows="8" name="description" data-bind="wysiwyg: description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <input type="checkbox" name="status" data-bind="checked: status"> Aktif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status_highlight" class="col-sm-3 col-form-label">Status Highlight</label>
                                        <div class="col-sm-9">
                                            <input type="checkbox" name="status_highlight" data-bind="checked: status_highlight"> Aktif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="submit" class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
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

    function CompanyViewModel() {
        var self = this;
        self.availableType = ko.observableArray(['COMPANY', 'UNIVERSITY', 'GOVERNMENT']);
        self.name = ko.observable('<?php if (isset($data['company'])) echo $data['company']->name ?>');
        self.type = ko.observable('<?php if (isset($data['company'])) echo $data['company']->type ?>');
        self.url = ko.observable('<?php if (isset($data['company'])) echo $data['company']->url ?>');
        self.description = ko.observable('<?php if (isset($data['company'])) echo $data['company']->description ?>');
        self.address = ko.observable('<?php if (isset($data['company'])) echo $data['company']->address ?>');
        self.phone = ko.observable('<?php if (isset($data['company'])) echo $data['company']->phone ?>');
        self.email = ko.observable('<?php if (isset($data['company'])) echo $data['company']->email ?>');
        self.contact_person = ko.observable('<?php if (isset($data['company'])) echo $data['company']->contact_person ?>');
        self.status = ko.observable(<?= (isset($data['company'])) ? (($data['company']->status == 1) ? 'true' : 'false') : 'true' ?>);
        self.status_highlight = ko.observable(<?= (isset($data['company'])) ? (($data['company']->status_highlight == 1) ? 'true' : 'false') : 'true' ?>);
    }

    ko.applyBindings(new CompanyViewModel());
</script>
@endsection