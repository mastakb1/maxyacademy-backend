@extends('layout.master')
@section('title', 'Order Course')
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
                                else echo 'Ubah'; ?> Order Course
                            </header>
                            <div class="panel-body" id="toro-area">
                                <form id="toro-form" method="POST" action="{{ ($data['actions'] == 'store') ? route('order_courses.store') : route('order_courses.update', base64_encode($data['order_course']->id)) }}">
                                    @if($data['actions']=='update') @method('PUT') @endif
                                    @csrf
                                    <div class="form-group row">
                                        <label for="course" class="col-sm-2 col-form-label">Course</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="course" name="course" placeholder="Enter course">
                                            <input type="hidden" class="form-control" id="id_m_course" name="id_m_course" value='<?= (isset($data['order_course'])) ? $data['order_course']->id_m_course : null ?>'>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="course_detail">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <div class="ui visible message green">
                                                <p id="course_message"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="member" class="col-sm-2 col-form-label">Member</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="member" name="member" placeholder="Enter member">
                                            <input type="hidden" class="form-control" id="id_member" name="id_member" value='<?= (isset($data['order_course'])) ? $data['order_course']->id_mmember : null ?>'>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="member_detail">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <div class="ui visible message green">
                                                <p id="member_message"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="package" class="col-sm-2 col-form-label">Package</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="package" name="package" placeholder="Enter package">
                                            <input type="hidden" class="form-control" id="id_m_package" name="id_m_package" value='<?= (isset($data['order_course'])) ? $data['order_course']->id_m_package : null ?>'>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="package_detail">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <div class="ui visible message green">
                                                <p id="package_message"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="discount" class="col-sm-2 col-form-label">Discount</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="discount" name="discount" placeholder="Enter discount">
                                            <input type="hidden" class="form-control" id="id_m_discount" name="id_m_discount" value='<?= (isset($data['order_course'])) ? $data['order_course']->id_m_discount : null ?>'>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="discount_detail">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <div class="ui visible message green">
                                                <p id="discount_message"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="submit" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <input type="hidden" id="total_price" name="total_price" value='<?= (isset($data['order_course'])) ? $data['order_course']->total_price : null ?>'>
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<link href="{{ asset ('js/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset ('semantic/components/message.css') }}" rel="stylesheet">


<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
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

    function OrderCourseViewModel() {
        var self = this;

        self.availableCourse = ko.observableArray(<?php if (isset($data['course'])) echo $data['course'] ?>);
        self.availableMember = ko.observableArray(<?php if (isset($data['member'])) echo $data['member'] ?>);
        self.availablePackage = ko.observableArray(<?php if (isset($data['package'])) echo $data['package'] ?>);
        self.availableDiscount = ko.observableArray(<?php if (isset($data['discount'])) echo $data['discount'] ?>);

        self.id_m_course = ko.observable('<?php if (isset($data['order_course'])) echo $data['order_course']->id_m_course ?>');
        self.id_member = ko.observable('<?php if (isset($data['order_course'])) echo $data['order_course']->id_member ?>');
        self.id_m_package = ko.observable('<?php if (isset($data['order_course'])) echo $data['order_course']->id_m_package ?>');
        self.id_m_discount = ko.observable('<?php if (isset($data['order_course'])) echo $data['order_course']->id_m_discount ?>');

        $("#course").autocomplete({
            source: <?= $data['course'] ?>,
            select: function(event, ui) {
                $.post("{{ route('courses.getById') }}", {
                    '_token': '<?= csrf_token() ?>',
                    'id_m_course': btoa(ui.item.id),
                }, function(data) {
                    $('#course_detail').show();
                    $('#id_m_course').val(data.id);
                    $('#course_message').html(`<b>Name :</b> ${data.name} <br> <b>Description :</b> ${data.description} `);
                });
            }
        });

        $("#member").autocomplete({
            source: <?= $data['member'] ?>,
            select: function(event, ui) {
                $.post("{{ route('members.getById') }}", {
                    '_token': '<?= csrf_token() ?>',
                    'id_member': btoa(ui.item.id),
                }, function(data) {
                    $('#member_detail').show();
                    $('#id_member').val(data.id);
                    $('#member_message').html(`<b>Name :</b> ${data.name} <br> <b>Email :</b> ${data.email} <br> <b>Phone :</b> ${data.phone} <br> <b>Address :</b> ${data.address} `);
                });
            }
        });

        $("#package").autocomplete({
            source: <?= $data['package'] ?>,
            select: function(event, ui) {
                $.post("{{ route('packages.getById') }}", {
                    '_token': '<?= csrf_token() ?>',
                    'id_m_package': btoa(ui.item.id),
                    'id_m_course': btoa($('#id_m_course').val()),
                }, function(data) {
                    $('#package_detail').show();
                    $('#id_m_package').val(data.id);
                    $('#total_price').val(data.price);
                    var benefits = '';
                    if (data.benefits.length > 0) {
                        benefits += '<b>Benefits: </b><br><ul>';
                        data.benefits.forEach(e => {
                            benefits += `<li>${e.name}</li>`;
                        });
                        benefits += '</ul>';
                    }
                    $('#package_message').html(`<b>Name :</b> ${data.name} <br> <b>Price :</b> ${data.price.toLocaleString()} <br> ${benefits}`);
                });
            }
        });

        $("#discount").autocomplete({
            source: <?= $data['discount'] ?>,
            select: function(event, ui) {
                $.post("{{ route('discounts.getById') }}", {
                    '_token': '<?= csrf_token() ?>',
                    'id_m_discount': btoa(ui.item.id),
                }, function(data) {
                    $('#discount_detail').show();
                    $('#id_m_discount').val(data.id);
                    $('#discount_message').html(`<b>Name :</b> ${data.name} <br> <b>Code :</b> ${data.code} <br> <b>Discount Type :</b> ${data.discount_type} <br> <b>Discount :</b> ${data.discount}`);
                });
            }
        });
    }

    $(document).ready(function() {
        <?php if (isset($data['order_course'])) : ?>
            $('#course').val('<?= $data['selected_course']->name ?>');
            $('#member').val('<?= $data['selected_member']->name ?>');
            $('#package').val('<?= $data['selected_package']->name ?>');
            <?php if ($data['selected_discount'] != NULL) : ?>
                $('#discount').val('<?= $data['selected_discount']->code ?>');
                $('#discount_message').html("<b>Name :</b> <?= $data['selected_discount']->name ?> <br> <b>Code :</b> <?= $data['selected_discount']->code ?> <br> <b>Discount Type :</b> <?= $data['selected_discount']->discount_type ?> <br> <b>Discount :</b> <?= $data['selected_discount']->discount ?>");
            <?php endif; ?>
            $('#course_message').html("<b>Name :</b> <?= $data['selected_course']->name ?> <br> <b>Description :</b> <?= $data['selected_course']->description ?> ");
            $('#member_message').html("<b>Name :</b> <?= $data['selected_member']->name ?> <br> <b>Email :</b>  <?= $data['selected_member']->email ?>  <br> <b>Phone :</b>  <?= $data['selected_member']->phone ?>  <br> <b>Address :</b>  <?= $data['selected_member']->address ?> ");
            <?php
            $benefits = '';
            if (count($data['selected_package']->benefits) > 0) {
                $benefits .= '<b>Benefits: </b><br><ul>';
                foreach ($data['selected_package']->benefits as $benefit) {
                    $benefits .= "<li>$benefit->name</li>";
                }
                $benefits .= '</ul>';
            }
            ?>
            $('#package_message').html("<b>Name :</b> <?= $data['selected_package']->name ?> <br> <b>Price :</b> <?= $data['selected_package']->price ?> <br> <?= $benefits ?>");
            $('#course_detail').show();
            $('#member_detail').show();
            $('#package_detail').show();
            $('#discount_detail').show();
        <?php else : ?>
            $('#course_detail').hide();
            $('#member_detail').hide();
            $('#package_detail').hide();
            $('#discount_detail').hide();
        <?php endif; ?>
    });

    ko.applyBindings(new OrderCourseViewModel());
</script>
@endsection