@extends('layout.master')
@section('title', 'Confirm Order')
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
                                else echo 'Ubah'; ?> Confirm Order
                            </header>
                            <div class="panel-body" id="toro-area">
                                <form id="toro-form" method="POST" action="{{ ($data['actions'] == 'store') ? route('order_confirms.store') : route('order_confirms.update', base64_encode($data['order_confirm']->id)) }}">
                                    @if($data['actions']=='update') @method('PUT') @endif
                                    @csrf
                                    <div class="form-group row">
                                        <label for="date" class="col-sm-2 col-form-label" style="font-size: 13px;">Tanggal</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="date" name="date" placeholder="Enter tanggal" data-bind="dateTimePicker: date, dateTimePickerOptions: {format: 'DD MMMM YYYY'}" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="course" class="col-sm-2 col-form-label">Course</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="course" name="course" placeholder="Enter course">
                                            <input type="hidden" class="form-control" id="id_course" name="id_course" value='<?= (isset($data['order_confirm'])) ? $data['order_confirm']->id_course : null ?>'>
                                            <input type="hidden" class="form-control" id="id_course_class" name="id_course_class" value='<?= (isset($data['order_confirm'])) ? $data['order_confirm']->id_course_class : null ?>'>
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
                                        <label for="order_number" class="col-sm-2 col-form-label">Order Number</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="order_number" name="order_number" placeholder="Enter order number">
                                            <input type="hidden" class="form-control" id="id_trans_order" name="id_trans_order" value='<?= (isset($data['order_confirm'])) ? $data['order_confirm']->id_trans_order : null ?>'>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="order_detail">
                                        <label class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <div class="ui visible message green">
                                                <p id="order_message"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="amount">
                                        <label for="amount" class="col-sm-2 col-form-label">Nominal Pembayaran</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter nominal pembayaran" data-bind="value: amount" required>
                                        </div>
                                    </div>
                                    <div class="form-group row" id="payment_type">
                                        <label for="payement_type" class="col-sm-2 col-form-label">Metode Pembayaran</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="payment_type" name="payment_type" required data-bind="value: id_m_payment_type, valueAllowUnset: true, options: $root.availablePaymentType, 
                                            optionsText: 'name', optionsValue: 'id', select2: { placeholder: 'Choose Metode Pembayaran', 
                                                allowClear: true, theme: 'bootstrap' }">
                                            </select>
                                        </div>
                                    </div>
                                    <div data-bind="if: id_m_payment_type() == 1">
                                        <div class="form-group row">
                                            <label for="bank" class="col-sm-2 col-form-label">Bank Account Tujuan</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="bank" name="bank" required data-bind="value: bank, valueAllowUnset: true, options: $root.availableBankAccount, 
                                            optionsText: function(item){ return ko.unwrap(item.account_name) + ' - ' + ko.unwrap(item.bank.name) }, optionsValue: 'id', select2: { placeholder: 'Choose Bank Tujuan', 
                                                allowClear: true, theme: 'bootstrap' }">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="sender_bank" class="col-sm-2 col-form-label">Bank Pengirim</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="sender_bank" name="sender_bank" required data-bind="value: sender_bank, valueAllowUnset: true, options: $root.availableSenderBank, 
                                            optionsText: 'name', optionsValue: 'id', select2: { placeholder: 'Choose Bank Pengirim', 
                                                allowClear: true, theme: 'bootstrap' }">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="sender_account_name" class="col-sm-2 col-form-label">Nama Pengirim</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="sender_account_name" name="sender_account_name" placeholder="Enter nama akun bank pengirim" data-bind="value: sender_account_name" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="sender_account_number" class="col-sm-2 col-form-label">Nomer Rekening Pengirim</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="sender_account_number" name="sender_account_number" placeholder="Enter nomor rekening pengirim" data-bind="value: sender_account_number" required>
                                            </div>
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
<link href="{{ asset ('semantic/components/message.css') }}" rel="stylesheet">
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

    ko.bindingHandlers.dateTimePicker = {
        init: function(element, valueAccessor, allBindingsAccessor) {
            //initialize datepicker with some optional options
            var options = allBindingsAccessor().dateTimePickerOptions || {};
            $(element).datetimepicker(options);

            //when a user changes the date, update the view model
            ko.utils.registerEventHandler(element, "dp.change", function(event) {
                var value = valueAccessor();
                if (ko.isObservable(value)) {
                    if (event.date != null && !(event.date instanceof Date)) {
                        value(event.date.toDate());
                    } else {
                        value(event.date);
                    }
                }
            });

            ko.utils.domNodeDisposal.addDisposeCallback(element, function() {
                var picker = $(element).data("DateTimePicker");
                if (picker) {
                    picker.destroy();
                }
            });
        },
        update: function(element, valueAccessor, allBindings, viewModel, bindingContext) {

            var picker = $(element).data("DateTimePicker");
            //when the view model is updated, update the widget
            if (picker) {
                var koDate = ko.utils.unwrapObservable(valueAccessor());

                //in case return from server datetime i am get in this form for example /Date(93989393)/ then fomat this
                // koDate = (typeof(koDate) !== 'object') ? new Date(parseFloat(koDate.replace(/[^0-9]/g, ''))) : koDate;

                picker.date(new Date(koDate));
            }
        }
    };

    ko.bindingHandlers.jqAuto = {
        init: function(element, valueAccessor, allBindingsAccessor, viewModel) {
            var options = valueAccessor() || {},
                allBindings = allBindingsAccessor(),
                unwrap = ko.utils.unwrapObservable,
                modelValue = allBindings.jqAutoValue,
                source = allBindings.jqAutoSource,
                query = allBindings.jqAutoQuery,
                valueProp = allBindings.jqAutoSourceValue,
                inputValueProp = allBindings.jqAutoSourceInputValue || valueProp,
                labelProp = allBindings.jqAutoSourceLabel || inputValueProp;

            //function that is shared by both select and change event handlers
            function writeValueToModel(valueToWrite) {
                if (ko.isWriteableObservable(modelValue)) {
                    modelValue(valueToWrite);
                } else { //write to non-observable
                    if (allBindings['_ko_property_writers'] && allBindings['_ko_property_writers']['jqAutoValue'])
                        allBindings['_ko_property_writers']['jqAutoValue'](valueToWrite);
                }
            }

            //on a selection write the proper value to the model
            options.select = function(event, ui) {
                writeValueToModel(ui.item ? ui.item.actualValue : null);
            };

            //on a change, make sure that it is a valid value or clear out the model value
            options.change = function(event, ui) {
                var currentValue = $(element).val();
                var matchingItem = ko.utils.arrayFirst(unwrap(source), function(item) {
                    return unwrap(item[inputValueProp]) === currentValue;
                });

                if (!matchingItem) {
                    writeValueToModel(null);
                }
            }

            //hold the autocomplete current response
            var currentResponse = null;

            //handle the choices being updated in a DO, to decouple value updates from source (options) updates
            var mappedSource = ko.dependentObservable({
                read: function() {
                    mapped = ko.utils.arrayMap(unwrap(source), function(item) {
                        var result = {};
                        result.label = labelProp ? unwrap(item[labelProp]) : unwrap(item).toString(); //show in pop-up choices
                        result.value = inputValueProp ? unwrap(item[inputValueProp]) : unwrap(item).toString(); //show in input box
                        result.actualValue = valueProp ? unwrap(item[valueProp]) : item; //store in model
                        return result;
                    });
                    return mapped;
                },
                write: function(newValue) {
                    source(newValue); //update the source observableArray, so our mapped value (above) is correct
                    if (currentResponse) {
                        currentResponse(mappedSource());
                    }
                }
            });

            if (query) {
                options.source = function(request, response) {
                    currentResponse = response;
                    query.call(this, request.term, mappedSource);
                }
            } else {
                //whenever the items that make up the source are updated, make sure that autocomplete knows it
                mappedSource.subscribe(function(newValue) {
                    $(element).autocomplete("option", "source", newValue);
                });

                options.source = mappedSource();
            }

            ko.utils.domNodeDisposal.addDisposeCallback(element, function() {
                $(element).autocomplete("destroy");
            });


            //initialize autocomplete
            $(element).autocomplete(options);
        },
        update: function(element, valueAccessor, allBindingsAccessor, viewModel) {
            //update value based on a model change
            var allBindings = allBindingsAccessor(),
                unwrap = ko.utils.unwrapObservable,
                modelValue = unwrap(allBindings.jqAutoValue) || '',
                valueProp = allBindings.jqAutoSourceValue,
                inputValueProp = allBindings.jqAutoSourceInputValue || valueProp;

            //if we are writing a different property to the input than we are writing to the model, then locate the object
            if (valueProp && inputValueProp !== valueProp) {
                var source = unwrap(allBindings.jqAutoSource) || [];
                var modelValue = ko.utils.arrayFirst(source, function(item) {
                    return unwrap(item[valueProp]) === modelValue;
                }) || {};
            }

            //update the element with the value that should be shown in the input
            $(element).val(modelValue && inputValueProp !== valueProp ? unwrap(modelValue[inputValueProp]) : modelValue.toString());
        }
    };

    function OrderTicketConfirmViewModel() {
        var self = this;

        self.availableBank = ko.observableArray(<?php if (isset($data['bank'])) echo $data['bank'] ?>);
        self.availableBankAccount = ko.observableArray(<?php if (isset($data['bank_account'])) echo $data['bank_account'] ?>);
        self.availableSenderBank = ko.observableArray(<?php if (isset($data['bank'])) echo $data['bank'] ?>);
        self.availablePaymentType = ko.observableArray(<?php if (isset($data['payment_type'])) echo $data['payment_type'] ?>);

        self.date = ko.observable(moment('<?php if (isset($data['order_confirm'])) echo $data['order_confirm']->date ?>').format('DD MMMM YYYY H:mm'));
        self.amount = ko.observable('<?php if (isset($data['order_confirm'])) echo $data['order_confirm']->amount ?>');
        self.id_m_payment_type = ko.observable('<?php if (isset($data['order_confirm'])) echo $data['order_confirm']->id_m_payment_type ?>');
        self.bank = ko.observable('<?php if (isset($data['order_confirm'])) echo $data['order_confirm']->id_m_bank_account ?>');
        self.sender_bank = ko.observable('<?php if (isset($data['order_confirm'])) echo $data['order_confirm']->sender_bank ?>');
        self.sender_account_name = ko.observable('<?php if (isset($data['order_confirm'])) echo $data['order_confirm']->sender_account_name ?>');
        self.sender_account_number = ko.observable('<?php if (isset($data['order_confirm'])) echo $data['order_confirm']->sender_account_number ?>');

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

        $('#order_number').autocomplete({
            source: function(req, res) {
                var id_course = $('#id_course').val();
                var search = $('#order_number').val();
                if (id_course != null && id_course != '') {
                    $.post("{{ route('orders.getByCourseId') }}", {
                        '_token': '<?= csrf_token() ?>',
                        'id_course': btoa(id_course),
                        'search': search,
                    }, function(data) {
                        res(data);
                    });
                }
            },
            select: function(event, ui) {
                $.post("{{ route('orders.getById') }}", {
                    '_token': '<?= csrf_token() ?>',
                    'id_trans_order': btoa(ui.item.id),
                }, function(data) {
                    $('#order_detail').show();
                    $('#amount').show();
                    $('#payment_type').show();
                    $('#id_trans_order').val(data.id);
                    $('#order_message').html(`<b>Order Number :</b> ${data.order_number} <br> <b>Date :</b> ${ moment(data.date).format('DD MMMM YYYY')} <br> <b>Member :</b> ${data.member} <br> <b>Course :</b> ${data.course} <br> <b>Course Price :</b> ${data.course_price} <br> <b>Total Price :</b> ${data.total_after_discount.toLocaleString()} `);
                });
            }
        })

    }

    ko.applyBindings(new OrderTicketConfirmViewModel());

    $(document).ready(function() {
        <?php if (isset($data['order_confirm'])) : ?>
            $('#course').val('<?= $data['selected_course']->name ?>');
            $('#order_number').val('<?= $data['selected_order']->order_number ?>');
            $('#course_message').html("<b>Name :</b> <?= $data['selected_course']->name ?> <br> <b>Description :</b> <?= $data['selected_course']->description ?>");
            $('#order_message').html("<b>Order Number :</b> <?= $data['selected_order']->order_number ?> <br> <b>Date :</b> <?= date('d F Y', strtotime($data['selected_order']->order_number)) ?> <br> <b>Member :</b> <?= $data['selected_order']->member->name ?> <br> <b>Course :</b> <?= $data['selected_order']->course->name ?> <br> <b>Package :</b> <?= $data['selected_order']->course_price->name ?> <br><b>Total Price :</b> <?= $data['selected_order']->total_after_discount ?> ");
            $('#course_detail').show();
            $('#order_detail').show();
            $('#payment_type').show();
            $('#amount').show();
        <?php else : ?>
            $('#course_detail').hide();
            $('#order_detail').hide();
            $('#payment_type').hide();
            $('#amount').hide();
        <?php endif; ?>
    });
</script>
@endsection