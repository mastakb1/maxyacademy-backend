@extends('layout.master')
@section('title', 'Page')
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
                                else echo 'Ubah'; ?> Page
                            </header>
                            <div class="panel-body" id="toro-area">
                                <form id="toro-form" method="POST" action="{{ ($data['actions'] == 'store') ? route('pages.store') : route('pages.update', base64_encode($data['page']->id)) }}">
                                    @if($data['actions']=='update') @method('PUT') @endif
                                    @csrf
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Page/Section Name<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Ganti [spasi] dengan _(underscore)" data-bind="value: name" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="section" class="col-sm-2 col-form-label">Type<span class="text-danger">*</span></label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="type" id="type" required data-bind="value: type,valueAllowUnset: true, options: $root.availableType, 
                                            select2: { placeholder: 'Choose Type', 
                                                allowClear: true, theme: 'bootstrap' }">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row hidden" id="row-heading">
                                        <label for="heading" class="col-sm-2 col-form-label">Heading Section<span class="text-danger">*</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="heading" name="heading" placeholder="Enter heading" data-bind="value: heading">
                                        </div>
                                    </div>
                                    <div class="form-group row hidden" id="row-title">
                                        <label for="title" class="col-sm-2 col-form-label">Title<span class="text-danger">*</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" data-bind="value: title, valueUpdate:'afterkeydown', event: {keyup:changeTitle}">
                                        </div>
                                    </div>
                                    <div class="form-group row hidden" id="row-slug">
                                        <label for="slug" class="col-sm-2 col-form-label">Slug<span class="text-danger">*</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter slug" data-bind="value: slug">
                                        </div>
                                    </div>
                                    <div class="form-group row hidden" id="row-meta-keyword">
                                        <label for="meta_keyword" class="col-sm-2 col-form-label">Meta Keyword<span class="text-danger">*</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="meta_keyword" placeholder="Enter meta keyword" data-bind="value: meta_keyword">
                                        </div>
                                    </div>
                                    <div class="form-group row hidden" id="row-meta-description">
                                        <label for="meta_description" class="col-sm-2 col-form-label">Meta Description<span class="text-danger">*</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="meta_description" placeholder="Enter meta description" data-bind="value: meta_description">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="description" class="col-sm-2 col-form-label">Keterangan</label>
                                        <div class="col-sm-10">
                                            <textarea class="textarea form-control" rows="8" name="description" data-bind="wysiwyg: description"></textarea>
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
                extended_valid_elements : 'button',
                toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
                toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code | qrcode ",
                entity_encoding: 'raw',
                doctype: '<!doctype html>',
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

    function SectionViewModel() {
        var self = this;

        
        self.availableType = ko.observableArray(['SECTION', 'PAGE']);
        self.name = ko.observable('<?php if (isset($data['page'])) echo $data['page']->name ?>');
        self.heading = ko.observable('<?php if (isset($data['page'])) echo $data['page']->heading ?>');
        self.type = ko.observable('<?php if (isset($data['page'])) echo $data['page']->type ?>');
        self.title = ko.observable('<?php if (isset($data['page'])) echo $data['page']->title ?>');
        self.slug = ko.observable('<?php if (isset($data['page'])) echo $data['page']->slug ?>');
        self.meta_keyword = ko.observable('<?php if (isset($data['page'])) echo $data['page']->meta_keyword ?>');
        self.meta_description = ko.observable('<?php if (isset($data['page'])) echo $data['page']->meta_description ?>');
        self.description = ko.observable(`<?php if (isset($data['page'])) echo $data['page']->description ?>`);
        
        self.status = ko.observable(<?= (isset($data['page'])) ? (($data['page']->status == 1) ? 'true' : 'false') : 'true' ?>);
        
        self.changeTitle = function() {
            var result = self.title();
            result = result.replace(/[^a-zA-Z ]/g, "");
            result = result.replace(/\s+/g, "-").toLowerCase();
            result = result.substring(0, 200);
            self.slug(result);
        };
    }

    ko.applyBindings(new SectionViewModel());

    $(document).ready(function() {
        <?php if(isset($data['page'])) echo "showComponentForm('".$data['page']->type."')" ?>

        $('select#type').on('change', function() {
            showComponentForm($(this).find(":selected").val());
        });

        function showComponentForm(type) {
            if(type == "SECTION"){
                $("#row-heading").removeClass('hidden');
                $("input[name=heading]").prop('required', true);
                
                $("#row-title").addClass('hidden');
                $("input[name=title]").prop('required', false);
                
                $("#row-slug").addClass('hidden');
                $("input[name=slug]").prop('required', false);
                
                $("#row-meta-keyword").addClass('hidden');
                $("input[name=meta_keyword]").prop('required', false);
                
                $("#row-meta-description").addClass('hidden');
                $("input[name=meta_description]").prop('required', false);
            }else if(type == "PAGE"){
                $("#row-heading").addClass('hidden');
                $("input[name=heading]").prop('required', false);

                $("#row-title").removeClass('hidden');
                $("input[name=title]").prop('required', true);
                
                $("#row-slug").removeClass('hidden');
                $("input[name=slug]").prop('required', true);

                $("#row-meta-keyword").removeClass('hidden');
                $("input[name=meta_keyword]").prop('required', true);

                $("#row-meta-description").removeClass('hidden');
                $("input[name=meta_description]").prop('required', true);
            }else{
                $("#row-heading").addClass('hidden');
                $("input[name=heading]").prop('required', false);
                
                $("#row-title").addClass('hidden');
                $("input[name=title]").prop('required', false);

                $("#row-slug").addClass('hidden');
                $("input[name=slug]").prop('required', false);

                $("#row-meta-keyword").addClass('hidden');
                $("input[name=meta_keyword]").prop('required', false);

                $("#row-meta-description").addClass('hidden');
                $("input[name=meta_description]").prop('required', false);
            }
        }
    });

</script>
@endsection