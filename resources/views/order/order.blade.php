@extends('layout.master')
@section('title', 'Order')
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
                                else echo 'Ubah'; ?> Order
                            </header>
                            <div class="panel-body" id="toro-area">
                                <form id="toro-form" method="POST" action="{{ ($data['actions'] == 'store') ? route('orders.store') : route('orders.update', base64_encode($data['order']->id)) }}">
                                    @if($data['actions']=='update') @method('PUT') @endif
                                    @csrf
                                    <div class="form-group row">
                                        <label for="course" class="col-sm-2 col-form-label">Course</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="course" name="course" placeholder="Enter course">
                                            <input type="hidden" class="form-control" id="id_course" name="id_course" value='<?= (isset($data['order'])) ? $data['order']->id_course : null ?>'>
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
                                            <input type="hidden" class="form-control" id="id_member" name="id_member" value='<?= (isset($data['order'])) ? $data['order']->id_member : null ?>'>
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
                                        <label for="course_price" class="col-sm-2 col-form-label">Course Price</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="course_price" name="course_price" placeholder="Enter course price">
                                            <input type="hidden" class="form-control" id="id_course_price" name="id_course_price" value='<?= (isset($data['order'])) ? $data['order']->id_course_price : null ?>'>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="course_price_detail">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <div class="ui visible message green">
                                                <p id="course_price_message"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="promotion" class="col-sm-2 col-form-label">Promotion</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="promotion" name="promotion" placeholder="Enter promotion">
                                            <input type="hidden" class="form-control" id="id_promotion" name="id_promotion" value='<?= (isset($data['order'])) ? $data['order']->id_promotion : null ?>'>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="promotion_detail">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <div class="ui visible message green">
                                                <p id="promotion_message"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="price_detail">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <div class="ui visible message red">
                                                <p id="price_message">Total : 0</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="submit" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <input type="hidden" id="id_course_class" name="id_course_class" value=''>
                                            <input type="hidden" id="total" name="total" value='<?= (isset($data['order'])) ? $data['order']->total : null ?>'>
                                            <input type="hidden" id="discount" name="discount" value='<?= (isset($data['order'])) ? $data['order']->discount : null ?>'>
                                            <input type="hidden" id="total_after_discount" name="total_after_discount" value='<?= (isset($data['order'])) ? $data['order']->total_after_discount : null ?>'>
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

        $("#course").autocomplete({
            source: function(request, response) {
                var searchText = $('#course').val();
                if (searchText != '') {
                    $.ajax({
                        url: "<?= url('courses/filter') ?>" + "/" + searchText,
                        type: 'get',
                        dataType: "json",
                        success: function(data) {
                            response(data);
                        }
                    });
                }
            },
            select: function(event, ui) {
                $.post("{{ route('courses.getById') }}", {
                    '_token': '<?= csrf_token() ?>',
                    'id_course': btoa(ui.item.id),
                }, function(data) {
                    $('#course_detail').show();
                    $('#id_course').val(data.id);
                    $('#id_course_class').val(data.class.id);
                    $('#course_message').html(`<b>Name :</b> ${data.name} Bootcamp Batch ${data.class.batch} <br> <b>Description :</b> ${data.description} `);
                });
            }
        });

        $("#member").autocomplete({
            source: function(request, response) {
                var searchText = $('#member').val();
                if (searchText != '') {
                    $.ajax({
                        url: "<?= url('members/filter') ?>" + "/" + searchText,
                        type: 'get',
                        dataType: "json",
                        success: function(data) {
                            response(data);
                        }
                    });
                }
            },
            select: function(event, ui) {
                $.post("{{ route('members.getById') }}", {
                    '_token': '<?= csrf_token() ?>',
                    'id_member': btoa(ui.item.id),
                }, function(data) {
                    $('#member_detail').show();
                    $('#id_member').val(data.id);
                    $('#member_message').html(`<b>Name :</b> ${data.name} <br> <b>Email :</b> ${data.email} <br> <b>Phone :</b> ${data.phone ?? ''} <br> <b>Address :</b> ${data.address ?? ''} `);
                });
            }
        });

        $("#course_price").autocomplete({
            source: function(request, response) {
                var searchText = $('#course_price').val();
                if (searchText != '') {
                    $.ajax({
                        url: "<?= url('course_prices/filter') ?>" + "/" + searchText,
                        type: 'get',
                        dataType: "json",
                        success: function(data) {
                            response(data);
                        }
                    });
                }
            },
            select: function(event, ui) {
                $.post("{{ route('course_prices.getById') }}", {
                    '_token': '<?= csrf_token() ?>',
                    'id_course_price': btoa(ui.item.id),
                }, function(data) {
                    $('#course_price_detail').show();
                    $('#id_course_price').val(data.id);
                    $('#total').val(data.price);
                    $('#total_after_discount').val(data.price);
                    $('#price_message').html(`Total : ${data.price.toLocaleString()}`);
                    var benefits = '';
                    if (data.benefits.length > 0) {
                        benefits += '<b>Benefits: </b><br><ul>';
                        data.benefits.forEach(e => {
                            benefits += `<li>${e.name}</li>`;
                        });
                        benefits += '</ul>';
                    }
                    $('#course_price_message').html(`<b>Name :</b> ${data.name} <br> <b>Price :</b> ${data.price.toLocaleString()} <br> ${benefits}`);
                });
            }
        });

        $("#promotion").autocomplete({
            source: function(request, response) {
                var searchText = $('#promotion').val();
                if (searchText != '') {
                    $.ajax({
                        url: "<?= url('promotions/filter') ?>" + "/" + searchText,
                        type: 'get',
                        dataType: "json",
                        success: function(data) {
                            response(data);
                        }
                    });
                }
            },
            select: function(event, ui) {
                $.post("{{ route('promotions.getById') }}", {
                    '_token': '<?= csrf_token() ?>',
                    'id_promotion': btoa(ui.item.id),
                }, function(data) {
                    $('#promotion_detail').show();
                    $('#id_promotion').val(data.id);
                    var discount = 0;
                    var total = $('#total').val();
                    if (data.discount_type == 'PERCENTAGE') {
                        discount = total * (data.discount / 100);

                        if (discount > data.max_discount) {
                            discount = data.max_discount;
                        }
                    } else {
                        discount = data.discount;
                    }

                    var total_after_discount = total - discount;

                    $('#price_message').html(`Total : ${total_after_discount.toLocaleString()}`);
                    $('#discount').val(discount);
                    $('#total_after_discount').val(total_after_discount);

                    console.log(data);
                    $('#promotion_message').html(`<b>Name :</b> ${data.name} <br> <b>Code :</b> ${data.code} <br> <b>Discount Type :</b> ${data.discount_type} <br> <b>Discount :</b> ${data.discount}`);
                });
            }
        });
    }

    $(document).ready(function() {
        <?php if (isset($data['order'])) : ?>
            $('#course').val('<?= $data['selected_course']->name ?>');
            $('#member').val('<?= $data['selected_member']->name ?>');
            $('#course_price').val('<?= $data['selected_course_price']->name ?>');
            <?php if ($data['selected_promotion'] != NULL) : ?>
                $('#promotion_detail').show();
                $('#promotion').val('<?= $data['selected_promotion']->code ?>');
                $('#promotion_message').html("<b>Name :</b> <?= $data['selected_promotion']->name ?> <br> <b>Code :</b> <?= $data['selected_promotion']->code ?> <br> <b>Discount Type :</b> <?= $data['selected_promotion']->discount_type ?> <br> <b>Discount :</b> <?= $data['selected_promotion']->discount ?>");
            <?php endif; ?>
            $('#course_message').html("<b>Name :</b> <?= $data['selected_course']->name ?> <br> <b>Description :</b> <?= $data['selected_course']->description ?> ");
            $('#member_message').html("<b>Name :</b> <?= $data['selected_member']->name ?> <br> <b>Email :</b>  <?= $data['selected_member']->email ?>  <br> <b>Phone :</b>  <?= $data['selected_member']->phone ?>  <br> <b>Address :</b>  <?= $data['selected_member']->address ?> ");
            <?php
            $benefits = '';
            if (count($data['selected_course_price']->benefits) > 0) {
                $benefits .= '<b>Benefits: </b><br><ul>';
                foreach ($data['selected_course_price']->benefits as $benefit) {
                    $benefits .= "<li>$benefit->name</li>";
                }
                $benefits .= '</ul>';
            }
            ?>
            $('#course_price_message').html("<b>Name :</b> <?= $data['selected_course_price']->name ?> <br> <b>Price :</b> <?= $data['selected_course_price']->price ?> <br> <?= $benefits ?>");
            $('#price_message').html("Total : " + '<?= number_format($data['order']->total_after_discount, 0, ',', '.') ?>')

            $('#promotion_detail').hide();
            $('#course_detail').show();
            $('#member_detail').show();
            $('#course_price_detail').show();
        <?php else : ?>
            $('#course_detail').hide();
            $('#member_detail').hide();
            $('#course_price_detail').hide();
            $('#promotion_detail').hide();
        <?php endif; ?>
    });

    ko.applyBindings(new OrderCourseViewModel());
</script>
@endsection