@extends('layout.master')
@section('title', 'Member')
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
                                else echo 'Ubah'; ?> Member
                            </header>
                            <div class="panel-body" id="toro-area">
                                <form id="toro-form" method="POST" action="{{ ($data['actions'] == 'store') ? route('members.store') : route('members.update', base64_encode($data['member']->id)) }}" enctype="multipart/form-data">
                                    @if($data['actions']=='update') @method('PUT') @endif
                                    @csrf
                                    <div class="form-group row">
                                        <label for="profile" class="col-sm-2 col-form-label" style="font-size: 13px;">Profile Picture</label>
                                        <div class="col-sm-10">
                                            <div class="main-img-preview">
                                                <?php if (isset($data['member'])) : ?>
                                                    <?php if ($data['member']->profile_picture != NULL) : ?>
                                                        <img id="preview" name="preview" class="thumbnail img-preview" src="{{asset('uploads/member/' . $data['member']->profile_picture)}}" title="Preview Profile Picture">
                                                    <?php else : ?>
                                                        <img id="preview" name="preview" class="thumbnail img-preview" src="{{asset('uploads/default.png')}}" title="Preview Profile Picture">
                                                    <?php endif; ?>
                                                <?php else : ?>
                                                    <img id="preview" name="preview" class="thumbnail img-preview" src="{{asset('uploads/default.png')}}" title="Preview Profile Picture">
                                                <?php endif; ?>
                                            </div>
                                            <input type="file" name="profile_picture" id="profile_picture" class="form-control" onchange="img_preview(this, 'preview')">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" data-bind="value: name" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" data-bind="value: email" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" data-bind="value: password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone" data-bind="value: phone" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" data-bind="value: address" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="parents" class="col-sm-2 col-form-label">Orang Tua</label>
                                        <div class="col-sm-10" data-bind="foreach: parents">
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="parent_name" data-bind="value: parent_name, attr:{ placeholder: ph_name}" required>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="parent_phone" data-bind="value: parent_phone, attr:{ placeholder: ph_phone}">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" name="parent_job" data-bind="value: parent_job, attr:{ placeholder: ph_job}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <textarea class="form-control" name="parent_address" data-bind="value: parent_address, attr:{ placeholder: ph_address}" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="education" class="col-sm-2 col-form-label">Pendidikan</label>
                                        <div class="col-sm-10">
                                            <button type="button" class="btn btn-success" data-bind="click: addEducation"><i class="fa fa-plus"></i> Add Education</button>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="educations" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10" data-bind="foreach: educations">
                                            <div class="form-group row">
                                                <div class="col-sm-1">
                                                    <input type="checkbox" name="education" data-bind="checked: educationIsChecked">
                                                </div>
                                                <div class="col-sm-10">
                                                    <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="education_name" placeholder="Enter School/university" data-bind="value: education_name" required>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="education_degree" placeholder="Enter School/university" data-bind="value: education_degree">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" name="education_field_of_study" placeholder="Enter Field of Study" data-bind="value: education_field_of_study">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-4">
                                                            <input type="number" class="form-control" name="education_score" placeholder="Score" data-bind="value: education_score">
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control edu_date" name="education_date" data-bind="value: education_date" autocomplete="off" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="description" name="education_description" placeholder="Enter description" data-bind="value: education_description">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <button type="button" class="btn btn-danger" data-bind="click: $parent.removeEducation"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="transcript" class="col-sm-2 col-form-label">Transkrip</label>
                                        <div class="col-sm-10">
                                            <button type="button" class="btn btn-success" data-bind="click: addTranscript"><i class="fa fa-plus"></i> Add Transcript</button>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="transcripts" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10" data-bind="foreach: transcripts">
                                            <div class="form-group row">
                                                <div class="col-sm-1">
                                                    <input type="checkbox" name="transcript" data-bind="checked: transcriptIsChecked">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Enter Course name" data-bind="value: course_name" required>
                                                </div>
                                                <div class="col-sm-2">
                                                    <input type="number" class="form-control" id="score" name="score" placeholder="Score" data-bind="value: score" required>
                                                </div>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="description" name="description" placeholder="Enter description" data-bind="value: description">
                                                </div>
                                                <div class="col-sm-1">
                                                    <button type="button" class="btn btn-danger" data-bind="click: $parent.removeTranscript"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="skill" class="col-sm-2 col-form-label">Keahlian</label>
                                        <div class="col-sm-10">
                                            <button type="button" class="btn btn-success" data-bind="click: addSkill"><i class="fa fa-plus"></i> Add Skill</button>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="skills" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10" data-bind="foreach: skills">
                                            <div class="form-group row">
                                                <div class="col-sm-1">
                                                    <input type="checkbox" name="skill" data-bind="checked: skillIsChecked">
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" name="skill_name" placeholder="Enter Skill name" data-bind="value: skill_name" required>
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" name="skill_description" placeholder="Enter description" data-bind="value: skill_description">
                                                </div>
                                                <div class="col-sm-1">
                                                    <button type="button" class="btn btn-danger" data-bind="click: $parent.removeSkill"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="experience" class="col-sm-2 col-form-label">Pengalaman</label>
                                        <div class="col-sm-10">
                                            <button type="button" class="btn btn-success" data-bind="click: addExperience"><i class="fa fa-plus"></i> Add Experience</button>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="experiences" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10" data-bind="foreach: experiences">
                                            <div class="form-group row">
                                                <div class="col-sm-1">
                                                    <input type="checkbox" name="experience" data-bind="checked: experienceIsChecked">
                                                </div>
                                                <div class="col-sm-10">
                                                    <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="experience_name" placeholder="Enter Position" data-bind="value: experience_name" required>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="experience_job_type" placeholder="Enter Job Type" data-bind="value: experience_job_type" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" name="experience_company" placeholder="Enter Company" data-bind="value: experience_company" required>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" name="experience_industry" placeholder="Enter Industry" data-bind="value: experience_industry" required>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" name="experience_location" placeholder="Enter Location" data-bind="value: experience_location" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control exp_date" name="experience_date" data-bind="value: experience_date" autocomplete="off" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control" id="description" name="experience_description" placeholder="Enter description" data-bind="value: experience_description">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <button type="button" class="btn btn-danger" data-bind="click: $parent.removeExperience"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="organization" class="col-sm-2 col-form-label">Organisasi</label>
                                        <div class="col-sm-10">
                                            <button type="button" class="btn btn-success" data-bind="click: addOrganization"><i class="fa fa-plus"></i> Add Organization</button>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="organizations" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10" data-bind="foreach: organizations">
                                            <div class="form-group row">                                                
                                                <div class="col-sm-1">
                                                    <input type="checkbox" name="organization" data-bind="checked: organizationIsChecked">
                                                </div>
                                                <div class="col-sm-10">
                                                    <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="organization_name" placeholder="Enter Organization" data-bind="value: organization_name" required>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="organization_position" placeholder="Enter position" data-bind="value: organization_position" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control org_date" name="organization_date" data-bind="value: organization_date" autocomplete="off" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <textarea type="text" class="form-control" name="organization_description" placeholder="Enter description" data-bind="value: organization_description"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <button type="button" class="btn btn-danger" data-bind="click: $parent.removeOrganization"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="certification" class="col-sm-2 col-form-label">Sertifikasi</label>
                                        <div class="col-sm-10">
                                            <button type="button" class="btn btn-success" data-bind="click: addCertification"><i class="fa fa-plus"></i> Add Certification</button>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="certifications" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10" data-bind="foreach: certifications">
                                            <div class="form-group row">                                                
                                                <div class="col-sm-1">
                                                    <input type="checkbox" name="certification" data-bind="checked: certificationIsChecked">
                                                </div>
                                                <div class="col-sm-10">
                                                    <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="certification_name" placeholder="Enter certification name" data-bind="value: certification_name" required>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="certification_company" placeholder="Enter company" data-bind="value: certification_company" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="certification_id_credential" placeholder="Enter credential id" data-bind="value: certification_id_credential">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="certification_url_credential" placeholder="Enter credential url" data-bind="value: certification_url_credential">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control ctf_date" name="certification_date" data-bind="value: certification_date" autocomplete="off" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <textarea type="text" class="form-control" name="certification_description" placeholder="Enter description" data-bind="value: certification_description"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <button type="button" class="btn btn-danger" data-bind="click: $parent.removeCertification"><i class="fa fa-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="portfolio" class="col-sm-2 col-form-label">Portofolio</label>
                                        <div class="col-sm-10">
                                            <button type="button" class="btn btn-success" data-bind="click: addPortfolio"><i class="fa fa-plus"></i> Add Portfolio</button>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="portfolios" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10" data-bind="foreach: portfolios">
                                            <div class="form-group row">                                                
                                                <div class="col-sm-1">
                                                    <input type="checkbox" name="portfolio" data-bind="checked: portfolioIsChecked">
                                                </div>
                                                <div class="col-sm-10">
                                                    <div class="form-group row">
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="portfolio_name" placeholder="Enter name" data-bind="value: portfolio_name" required>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" name="portfolio_url_portfolio" placeholder="Enter url portfolio" data-bind="value: portfolio_url_portfolio" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <input type="text" class="form-control org_date" name="portfolio_date" data-bind="value: portfolio_date" autocomplete="off" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <textarea type="text" class="form-control" name="portfolio_description" placeholder="Enter description" data-bind="value: portfolio_description"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <button type="button" class="btn btn-danger" data-bind="click: $parent.removePortfolio"><i class="fa fa-trash"></i></button>
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

    function Transcript(name, score, description, isChecked) {
        var self = this;

        self.course_name = ko.observable(name);
        self.score = ko.observable(score);
        self.description = ko.observable(description);
        self.transcriptIsChecked = ko.observable(isChecked == 1 ? true : false);
    }

    function Skill(name, description, isChecked) {
        var self = this;

        self.skill_name = ko.observable(name);
        self.skill_description = ko.observable(description);
        self.skillIsChecked = ko.observable(isChecked == 1 ? true : false);
    }

    function Education(name, degree, field_of_study, score, start_date, end_date, description, isChecked) {
        var self = this;

        self.education_name = ko.observable(name);
        self.education_degree = ko.observable(degree);
        self.education_field_of_study = ko.observable(field_of_study);
        self.education_score = ko.observable(score);
        self.education_date = ko.observable('');
        self.education_description = ko.observable(description);
        self.educationIsChecked = ko.observable(isChecked == 1 ? true : false);

        function dateRange(element, ko, _start, _end) {
            var start = _start != '' ? moment(_start) : moment();
            var end = _end != '' ? moment(_end) : moment();

            if (_start != '' && _end != '') {
                ko(moment(_start).format('DD MMMM YYYY') + ' - ' + moment(_end).format('DD MMMM YYYY'));
            }

            $('.' + element).daterangepicker({
                minDate: moment(),
                autoUpdateInput: false,
                timePicker: true,
                startDate: start,
                endDate: end,
                locale: {
                    format: 'DD MMMM YYYY',
                },
            }).on("apply.daterangepicker", function(e, picker) {
                ko(picker.startDate.format(picker.locale.format) + ' - ' + picker.endDate.format(picker.locale.format));
            }).on("cancel.daterangepicker", function(e, picker) {
                ko('');
            });
        }

        dateRange('edu_date', self.education_date, start_date, end_date);
    }

    function Experience(name, job_type, company, industry, location, start_date, end_date, description, isChecked) {
        var self = this;

        self.experience_name = ko.observable(name);
        self.experience_job_type = ko.observable(job_type);
        self.experience_company = ko.observable(company);
        self.experience_industry = ko.observable(industry);
        self.experience_location = ko.observable(location);
        self.experience_date = ko.observable('');
        self.experience_description = ko.observable(description);
        self.experienceIsChecked = ko.observable(isChecked == 1 ? true : false);
        
        function dateRange(element, ko, _start, _end) {
            var start = _start != '' ? moment(_start) : moment();
            var end = _end != '' ? moment(_end) : moment();

            if (_start != '' && _end != '') {
                ko(moment(_start).format('DD MMMM YYYY') + ' - ' + moment(_end).format('DD MMMM YYYY'));
            }

            $('.' + element).daterangepicker({
                minDate: moment(),
                autoUpdateInput: false,
                timePicker: true,
                startDate: start,
                endDate: end,
                locale: {
                    format: 'DD MMMM YYYY',
                },
            }).on("apply.daterangepicker", function(e, picker) {
                ko(picker.startDate.format(picker.locale.format) + ' - ' + picker.endDate.format(picker.locale.format));
            }).on("cancel.daterangepicker", function(e, picker) {
                ko('');
            });
        }

        dateRange('exp_date', self.experience_date, start_date, end_date);
    }

    function Organization(name, position, start_date, end_date, description, isChecked) {
        var self = this;

        self.organization_name = ko.observable(name);
        self.organization_position = ko.observable(position);
        self.organization_date = ko.observable('');
        self.organization_description = ko.observable(description);
        self.organizationIsChecked = ko.observable(isChecked == 1 ? true : false);

        function dateRange(element, ko, _start, _end) {
            var start = _start != '' ? moment(_start) : moment();
            var end = _end != '' ? moment(_end) : moment();

            if (_start != '' && _end != '') {
                ko(moment(_start).format('DD MMMM YYYY') + ' - ' + moment(_end).format('DD MMMM YYYY'));
            }

            $('.' + element).daterangepicker({
                minDate: moment(),
                autoUpdateInput: false,
                timePicker: true,
                startDate: start,
                endDate: end,
                locale: {
                    format: 'DD MMMM YYYY',
                },
            }).on("apply.daterangepicker", function(e, picker) {
                ko(picker.startDate.format(picker.locale.format) + ' - ' + picker.endDate.format(picker.locale.format));
            }).on("cancel.daterangepicker", function(e, picker) {
                ko('');
            });
        }

        dateRange('org_date', self.organization_date, start_date, end_date);
    }

    function Certification(name, company, id_credential, url_credential, start_date, end_date, description, isChecked) {
        var self = this;

        self.certification_name = ko.observable(name);
        self.certification_company = ko.observable(company);
        self.certification_id_credential = ko.observable(id_credential);
        self.certification_url_credential = ko.observable(url_credential);
        self.certification_date = ko.observable('');
        self.certification_description = ko.observable(description);
        self.certificationIsChecked = ko.observable(isChecked == 1 ? true : false);

        function dateRange(element, ko, _start, _end) {
            var start = _start != '' ? moment(_start) : moment();
            var end = _end != '' ? moment(_end) : moment();

            if (_start != '' && _end != '') {
                ko(moment(_start).format('DD MMMM YYYY') + ' - ' + moment(_end).format('DD MMMM YYYY'));
            }

            $('.' + element).daterangepicker({
                minDate: moment(),
                autoUpdateInput: false,
                timePicker: true,
                startDate: start,
                endDate: end,
                locale: {
                    format: 'DD MMMM YYYY',
                },
            }).on("apply.daterangepicker", function(e, picker) {
                ko(picker.startDate.format(picker.locale.format) + ' - ' + picker.endDate.format(picker.locale.format));
            }).on("cancel.daterangepicker", function(e, picker) {
                ko('');
            });
        }

        dateRange('ctf_date', self.certification_date, start_date, end_date);
    }

    function Portfolio(name, url_portfolio, start_date, end_date, description, isChecked) {
        var self = this;

        self.portfolio_name = ko.observable(name);
        self.portfolio_url_portfolio = ko.observable(url_portfolio);
        self.portfolio_date = ko.observable('');
        self.portfolio_description = ko.observable(description);
        self.portfolioIsChecked = ko.observable(isChecked == 1 ? true : false);

        function dateRange(element, ko, _start, _end) {
            var start = _start != '' ? moment(_start) : moment();
            var end = _end != '' ? moment(_end) : moment();

            if (_start != '' && _end != '') {
                ko(moment(_start).format('DD MMMM YYYY') + ' - ' + moment(_end).format('DD MMMM YYYY'));
            }

            $('.' + element).daterangepicker({
                minDate: moment(),
                autoUpdateInput: false,
                timePicker: true,
                startDate: start,
                endDate: end,
                locale: {
                    format: 'DD MMMM YYYY',
                },
            }).on("apply.daterangepicker", function(e, picker) {
                ko(picker.startDate.format(picker.locale.format) + ' - ' + picker.endDate.format(picker.locale.format));
            }).on("cancel.daterangepicker", function(e, picker) {
                ko('');
            });
        }

        dateRange('prt_date', self.portfolio_date, start_date, end_date);
    }

    function Parent(name, phone, job, address, index) {
        var self = this;

        var gender_parent = "Father";

        if(index == 1){
            gender_parent = "Mother";
        }

        self.parent_name = ko.observable(name);
        self.parent_phone = ko.observable(phone);
        self.parent_job = ko.observable(job);
        self.parent_address = ko.observable(address);
        
        // Placeholder parent
        self.ph_name = ko.observable("Enter "+gender_parent+" Name");
        self.ph_phone = ko.observable("Enter "+gender_parent+" Phone");
        self.ph_job = ko.observable("Enter "+gender_parent+" Job");
        self.ph_address = ko.observable("Enter "+gender_parent+" Address");

        
    }

    function MemberViewModel() {
        var self = this;

        self.name = ko.observable('<?php if (isset($data['member'])) echo $data['member']->name ?>');
        self.email = ko.observable('<?php if (isset($data['member'])) echo $data['member']->email ?>');
        self.password = ko.observable('');
        self.phone = ko.observable('<?php if (isset($data['member'])) echo $data['member']->phone ?>');
        self.address = ko.observable('<?php if (isset($data['member'])) echo $data['member']->address ?>');
        self.status = ko.observable(<?= (isset($data['member'])) ? (($data['member']->status == 1) ? 'true' : 'false') : 'true' ?>);
        self.transcripts = ko.observableArray([]);
        self.parents = ko.observableArray([]);
        self.skills = ko.observableArray([]);
        self.educations = ko.observableArray([]);
        self.experiences = ko.observableArray([]);
        self.organizations = ko.observableArray([]);
        self.certifications = ko.observableArray([]);
        self.portfolios = ko.observableArray([]);

        <?php if (isset($data['member'])) : ?>
            <?php foreach ($data['member']->transcripts as $transcript) : ?>
                self.transcripts.push(new Transcript('<?= $transcript->name ?>', '<?= $transcript->score ?>', '<?= $transcript->description ?>', '<?= $transcript->status ?>'))
            <?php endforeach; ?>    

            <?php foreach ($data['member']->skills as $skill) : ?>
                self.skills.push(new Skill('<?= $skill->name ?>', '<?= $skill->description ?>', '<?= $skill->status ?>'))
            <?php endforeach; ?>   

            <?php foreach ($data['member']->educations as $education) : ?>
                self.educations.push(new Education('<?= $education->name ?>', '<?= $education->degree ?>', '<?= $education->fields_of_study ?>', '<?= $education->score ?>', '<?= $education->start_date ?>', '<?= $education->end_date ?>', '<?= $education->description ?>', '<?= $education->status ?>'))
            <?php endforeach; ?>    

            <?php foreach ($data['member']->experiences as $experience) : ?>
                self.experiences.push(new Experience('<?= $experience->name ?>', '<?= $experience->job_type ?>', '<?= $experience->company ?>', '<?= $experience->industry ?>', '<?= $experience->location ?>', '<?= $experience->start_date ?>', '<?= $experience->end_date ?>', '<?= $experience->description ?>', '<?= $experience->status ?>'))
            <?php endforeach; ?>    

            <?php foreach ($data['member']->organizations as $organization) : ?>
                self.organizations.push(new Organization('<?= $organization->name ?>', '<?= $organization->position ?>', '<?= $organization->start_date ?>', '<?= $organization->end_date ?>', '<?= $organization->description ?>', '<?= $organization->status ?>'))
            <?php endforeach; ?>    

            <?php foreach ($data['member']->certifications as $certification) : ?>
                self.certifications.push(new Certification('<?= $certification->name ?>', '<?= $certification->company ?>', '<?= $certification->id_credential ?>', '<?= $certification->url_credential ?>', '<?= $certification->start_date ?>', '<?= $certification->end_date ?>', '<?= $certification->description ?>', '<?= $certification->status ?>'))
            <?php endforeach; ?>    

            <?php foreach ($data['member']->portfolios as $portfolio) : ?>
                self.portfolios.push(new Portfolio('<?= $portfolio->name ?>', '<?= $portfolio->url_portfolio ?>', '<?= $portfolio->start_date ?>', '<?= $portfolio->end_date ?>', '<?= $portfolio->description ?>', '<?= $portfolio->status ?>'))
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if (isset($data['member']->parents) && $data['member']->parents->count() > 0) : ?>
            <?php foreach ($data['member']->parents as $index => $parent) : ?>
                self.parents.push(new Parent('<?= $parent->name ?>', '<?= $parent->phone ?>', '<?= $parent->job ?>', '<?= $parent->address ?>', '<?= $index ?>'))
            <?php endforeach; ?>
        <?php else : ?>
            for (let index = 0; index < 2; index++) {
                self.parents.push(new Parent('', '', '', '', index))
            }
        <?php endif; ?>

        self.addTranscript = function() {
            self.transcripts.push(new Transcript('', 0, '', false));
        }

        self.removeTranscript = function(transcript) {
            self.transcripts.remove(transcript);
        }

        self.addSkill = function() {
            self.skills.push(new Skill('', '', false));
        }

        self.removeSkill = function(skill) {
            self.skills.remove(skill);
        }

        self.addEducation = function() {
            self.educations.push(new Education('', '', '', '', '', '', ''));
        }

        self.removeEducation = function(education) {
            self.educations.remove(education);
        }

        self.addExperience = function() {
            self.experiences.push(new Experience('', '', '', '', '', '', '', '',));
        }

        self.removeExperience = function(experience) {
            self.experiences.remove(experience);
        }

        self.addOrganization = function() {
            self.organizations.push(new Organization('', '', '', '', '',));
        }

        self.removeOrganization = function(organization) {
            self.organizations.remove(organization);
        }
        
        self.addCertification = function() {
            self.certifications.push(new Certification('', '', '', '', '', '', '',));
        }

        self.removeCertification = function(certification) {
            self.certifications.remove(certification);
        }

        self.addPortfolio = function() {
            self.portfolios.push(new Portfolio('', '', '', '', '',));
        }

        self.removePortfolio = function(portfolio) {
            self.portfolios.remove(portfolio);
        }

    }

    ko.applyBindings(new MemberViewModel());
</script>
@endsection