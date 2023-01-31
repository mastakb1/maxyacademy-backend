@extends('layout.master')
@section('title', 'Content Carousel')
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
                                else echo 'Ubah'; ?> Content Carousel
                            </header>
                            <div class="panel-body" id="toro-area">
                                <form id="toro-form" method="POST" action="{{ ($data['actions'] == 'store') ? route('content_carousels.store') : route('content_carousels.update', base64_encode($data['content_carousel']->id)) }}" enctype="multipart/form-data">
                                    @if($data['actions']=='update') @method('PUT') @endif
                                    @csrf
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-3 col-form-label" style="font-size: 13px;">Image</label>
                                        <div class="col-sm-9">
                                            <div class="main-img-preview">
                                                <?php if (isset($data['content_carousel'])) : ?>
                                                    <?php if ($data['content_carousel']->image != NULL) : ?>
                                                        <img id="preview" name="preview" class="thumbnail img-preview" src="{{asset('uploads/carousel/' . $data['content_carousel']->image)}}" title="Preview Image">
                                                    <?php else : ?>
                                                        <img id="preview" name="preview" class="thumbnail img-preview" src="{{asset('uploads/default.png')}}" title="Preview Image">
                                                    <?php endif; ?>
                                                <?php else : ?>
                                                    <img id="preview" name="preview" class="thumbnail img-preview" src="{{asset('uploads/default.png')}}" title="Preview Image">
                                                <?php endif; ?>
                                            </div>
                                            <input type="file" name="image" id="image" class="form-control" onchange="img_preview(this, 'preview')">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" data-bind="value: name" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="content" class="col-sm-3 col-form-label">Konten</label>
                                        <div class="col-sm-9">
                                            <textarea class="textarea form-control" rows="8" name="content" data-bind="wysiwyg: content"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="description" class="col-sm-3 col-form-label">Keterangan</label>
                                        <div class="col-sm-9">
                                            <textarea class="textarea form-control" rows="8" name="description" data-bind="wysiwyg: description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="button" class="col-sm-2 col-form-label">Button</label>
                                        <div class="col-sm-10">
                                            <button type="button" class="btn btn-success" data-bind="click: addButton"><i class="fa fa-plus"></i> Add Button</button>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="buttons" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10" data-bind="foreach: buttons">
                                            <div class="form-group row">
                                                <div class="col-sm-11">
                                                    <div class="form-group row">
                                                        <div class="col-sm-1">
                                                            <input type="checkbox" name="button" data-bind="checked: buttonIsChecked">
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <input type="text" class="form-control" name="button_name" placeholder="Enter Button name" data-bind="value: button_name" required>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="button_icon" placeholder="Enter Button icon" data-bind="value: button_icon">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="button_style" placeholder="Enter Button style" data-bind="value: button_style">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="button_url" placeholder="Enter Button url" data-bind="value: button_url">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <textarea class="form-control" name="button_description" placeholder="Enter description" data-bind="value: button_description"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <button type="button" class="btn btn-danger" data-bind="click: $parent.removeButton"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <input type="checkbox" name="status" data-bind="checked: status"> Aktif
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

    function Button(name, icon, style, url, description, isChecked) {
        var self = this;

        self.button_name = ko.observable(name);
        self.button_icon = ko.observable(icon);
        self.button_style = ko.observable(style);
        self.button_url = ko.observable(url);
        self.button_description = ko.observable(description);
        self.buttonIsChecked = ko.observable(isChecked == 1 ? true : false);
    }

    function ContentCarouselViewModel() {
        var self = this;
        self.name = ko.observable('<?php if (isset($data['content_carousel'])) echo $data['content_carousel']->name ?>');
        self.description = ko.observable('<?php if (isset($data['content_carousel'])) echo $data['content_carousel']->description ?>');
        self.content = ko.observable('<?php if (isset($data['content_carousel'])) echo $data['content_carousel']->content ?>');
        self.status = ko.observable(<?= (isset($data['content_carousel'])) ? (($data['content_carousel']->status == 1) ? 'true' : 'false') : 'true' ?>);        
        self.buttons = ko.observableArray([]);

        <?php if (isset($data['content_carousel'])) : ?>
            <?php foreach ($data['content_carousel']->buttons as $button) : ?>
                self.buttons.push(new Button('<?= $button->name ?>', '<?= $button->icon ?>', '<?= $button->style ?>', '<?= $button->url ?>', '<?= $button->description ?>', '<?= $button->status ?>'))
            <?php endforeach; ?>    
        <?php endif; ?>

        self.addButton = function() {
            self.buttons.push(new Button('', '', '', '', '', false));
        }

        self.removeButton = function(button) {
            self.buttons.remove(button);
        }
    }

    ko.applyBindings(new ContentCarouselViewModel());
</script>
@endsection