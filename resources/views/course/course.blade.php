@extends('layout.master')
@section('title', 'Course')
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
                                else echo 'Ubah'; ?> Course
                            </header>
                            <div class="panel-body" id="toro-area">
                                <form id="toro-form" method="POST" action="{{ ($data['actions'] == 'store') ? route('courses.store') : route('courses.update', base64_encode($data['course']->id)) }}" enctype="multipart/form-data">
                                    @if($data['actions']=='update') @method('PUT') @endif
                                    @csrf
                                    <div class="form-group row">
                                        <label for="logo" class="col-sm-2 col-form-label" style="font-size: 13px;">Logo</label>
                                        <div class="col-sm-10">
                                            <div class="main-img-preview">
                                                <?php if (isset($data['course'])) : ?>
                                                    <?php if ($data['course']->image != NULL) : ?>
                                                        <img id="preview" name="preview" class="thumbnail img-preview" src="{{asset('uploads/course/'.$data['course']->image)}}" title="Preview Foto">
                                                    <?php else : ?>
                                                        <img id="preview" name="preview" class="thumbnail img-preview" src="{{asset('uploads/default.png')}}" title="Preview Logo">
                                                    <?php endif; ?>
                                                <?php else : ?>
                                                    <img id="preview" name="preview" class="thumbnail img-preview" src="{{asset('uploads/default.png')}}" title="Preview Logo">
                                                <?php endif; ?>
                                            </div>
                                            <input type="file" name="image" id="image" class="form-control" onchange="img_preview(this, 'preview')">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" data-bind="value: name, valueUpdate:'afterkeydown', event: {keyup:changeName}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter slug" data-bind="value: slug" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="description" class="col-sm-2 col-form-label">Keterangan</label>
                                        <div class="col-sm-10">
                                            <textarea class="textarea form-control" rows="8" name="description" data-bind="wysiwyg: description"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="course_type" class="col-sm-2 col-form-label">Course Type</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="course_type" name="course_type" required data-bind="value: id_m_course_type,valueAllowUnset: true, options: $root.availableCourseType, 
                                            optionsText: 'name', optionsValue: 'id', select2: { placeholder: 'Choose Course Type', 
                                                allowClear: true, theme: 'bootstrap' }">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="course_difficulty" class="col-sm-2 col-form-label">Course Level</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="course_difficulty" name="course_difficulty" required data-bind="value: id_m_difficulty_type,valueAllowUnset: true, options: $root.availableDifficulty, 
                                            optionsText: 'name', optionsValue: 'id', select2: { placeholder: 'Choose Course Difficulty', 
                                                allowClear: true, theme: 'bootstrap' }">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="course_tutor" class="col-sm-2 col-form-label">Course Tutor</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="course_tutor" name="course_tutor" required data-bind="selectedOptions: tutors,valueAllowUnset: true, options: $root.availableTutor, 
                                            optionsText: 'name', optionsValue: 'id', select2: { placeholder: 'Choose Course Tutor', 
                                                allowClear: true, theme: 'bootstrap' }" multiple>
                                            </select>
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

    function CourseViewModel() {
        var self = this;

        self.availableCourseType = ko.observableArray(<?php if (isset($data['course_type'])) echo $data['course_type'] ?>);
        self.availableDifficulty = ko.observableArray(<?php if (isset($data['difficulty'])) echo $data['difficulty'] ?>);
        self.availableTutor = ko.observableArray(<?php if (isset($data['tutor'])) echo $data['tutor'] ?>);

        self.name = ko.observable('<?php if (isset($data['course'])) echo $data['course']->name ?>');
        self.slug = ko.observable('<?php if (isset($data['course'])) echo $data['course']->slug ?>');
        self.description = ko.observable('<?php if (isset($data['course'])) echo $data['course']->description ?>');
        self.type = ko.observable('<?php if (isset($data['course'])) echo $data['course']->type ?>');
        self.id_m_course_type = ko.observable('<?php if (isset($data['course'])) echo $data['course']->id_m_course_type ?>');
        self.id_m_difficulty_type = ko.observable('<?php if (isset($data['course'])) echo $data['course']->id_m_difficulty_type ?>');
        self.status = ko.observable(<?= (isset($data['course'])) ? (($data['course']->status == 1) ? 'true' : 'false') : 'true' ?>);
        self.tutors = ko.observableArray(<?php if (isset($data['course'])) echo $data['course']->tutors->pluck('id') ?>);

        self.changeName = function() {
            var result = self.name();
            result = result.replace(/[^a-zA-Z ]/g, "");
            result = result.replace(/\s+/g, "-").toLowerCase();
            result = result.substring(0, 200);
            self.slug(result);
        };
    }

    ko.applyBindings(new CourseViewModel());
</script>
@endsection