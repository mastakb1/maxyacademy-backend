@extends('layout.master')
@section('title', 'General')
@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="row top_tiles">
            <div class="wrapper">
                <div class="row" id="row-report">
                    <div class="col-md-12">
                        <section class="panel">
                            <header class="panel-heading">
                                General
                            </header>
                            <div class="panel-body" id="toro-area">
                                <form id="toro-form" method="POST" action="{{route('generals.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="logo" class="col-sm-2 col-form-label" style="font-size: 13px;">Logo</label>
                                        <div class="col-sm-10">
                                            <div class="main-img-preview">
                                                <?php if (isset($data['logo'])) : ?>
                                                    <?php if ($data['logo']->value != NULL) : ?>
                                                        <img id="preview" name="preview" class="thumbnail img-preview" src="{{asset($data['logo']->value)}}" title="Preview Foto">
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
                                        <label for="logo" class="col-sm-2 col-form-label" style="font-size: 13px;">Icon</label>
                                        <div class="col-sm-10">
                                            <div class="main-img-preview">
                                                <?php if (isset($data['icon'])) : ?>
                                                    <?php if ($data['icon']->value != '') : ?>
                                                        <img id="preview_icon" name="preview_icon" class="thumbnail img-preview" src="{{asset($data['icon']->value)}}" title="Preview Foto">
                                                    <?php else : ?>
                                                        <img id="preview_icon" name="preview_icon" class="thumbnail img-preview" src="{{asset('uploads/default.png')}}" title="Preview Logo">
                                                    <?php endif; ?>
                                                <?php else : ?>
                                                    <img id="preview_icon" name="preview_icon" class="thumbnail img-preview" src="{{asset('uploads/default.png')}}" title="Preview Logo">
                                                <?php endif; ?>
                                            </div>
                                            <input type="file" name="icon" id="icon" class="form-control" onchange="img_preview(this, 'preview_icon')">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Lengkap / Singkat</label>
                                        <div class="col-sm-10">
                                            <div class="col-sm-6" style="padding-left: 0px;">
                                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Enter nama lengkap" data-bind="value: nama_lengkap" required>
                                            </div>
                                            <div class="col-sm-6" style="padding: 0px;">
                                                <input type="text" class="form-control" id="nama_singkat" name="nama_singkat" placeholder="Enter nama singkat" data-bind="value: nama_singkat" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat_lengkap" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap" placeholder="Enter alamat lengkap" data-bind="value: alamat_lengkap" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Alamat Baris Pertama / Kedua</label>
                                        <div class="col-sm-10">
                                            <div class="col-sm-6" style="padding-left: 0px;">
                                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Enter alamat" data-bind="value: alamat" required>
                                            </div>
                                            <div class="col-sm-6" style="padding: 0px;">
                                                <input type="text" class="form-control" id="alamat2" name="alamat2" placeholder="Enter alamat 2" data-bind="value: alamat2" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat3" class="col-sm-2 col-form-label">Alamat Baris Ketiga</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="alamat3" name="alamat3" placeholder="Enter alamat 3" data-bind="value: alamat3" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama / Nomor Contact</label>
                                        <div class="col-sm-10">
                                            <div class="col-sm-6" style="padding-left: 0px;">
                                                <input type="text" class="form-control" id="nama_contact" name="nama_contact" placeholder="Enter nama contact" data-bind="value: nama_contact" required>
                                            </div>
                                            <div class="col-sm-6" style="padding: 0px;">
                                                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Enter nomor contact" data-bind="value: telepon" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="facebook" name="facebook" placeholder="Enter facebook" data-bind="value: facebook" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Enter instagram" data-bind="value: instagram" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="twitter" name="twitter" placeholder="Enter twitter" data-bind="value: twitter" required>
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

    function GeneralViewModel() {
        var self = this;

        self.nama_lengkap = ko.observable('<?php if (isset($data['nama_lengkap'])) echo $data['nama_lengkap']->value ?>');
        self.nama_singkat = ko.observable('<?php if (isset($data['nama_singkat'])) echo $data['nama_singkat']->value ?>');
        self.alamat_lengkap = ko.observable('<?php if (isset($data['alamat_lengkap'])) echo $data['alamat_lengkap']->value ?>');
        self.alamat = ko.observable('<?php if (isset($data['alamat'])) echo $data['alamat']->value ?>');
        self.alamat2 = ko.observable('<?php if (isset($data['alamat2'])) echo $data['alamat2']->value ?>');
        self.alamat3 = ko.observable('<?php if (isset($data['alamat3'])) echo $data['alamat3']->value ?>');
        self.nama_contact = ko.observable('<?php if (isset($data['nama_contact'])) echo $data['nama_contact']->value ?>');
        self.telepon = ko.observable('<?php if (isset($data['telepon'])) echo $data['telepon']->value ?>');
        self.facebook = ko.observable('<?php if (isset($data['facebook'])) echo $data['facebook']->value ?>');
        self.instagram = ko.observable('<?php if (isset($data['instagram'])) echo $data['instagram']->value ?>');
        self.twitter = ko.observable('<?php if (isset($data['twitter'])) echo $data['twitter']->value ?>');

    }

    ko.applyBindings(new GeneralViewModel());
</script>
@endsection