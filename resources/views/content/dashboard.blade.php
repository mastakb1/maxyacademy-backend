@extends('layout.master')
@section('title', 'Dashboard')
@section('content')
<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
?>
<div class="right_col" role="main">

    @if(\Session::has('error'))
    <div class="alert alert-danger">
        <div>{{Session::get('error')}}</div>
    </div>
    @endif

    {{-- cek user access -> di LoginController -> dia pas login, cek user access, trs di put ke Session('user_access') --}}
    <?php if (strpos(Session::get('user_access'), 'dashboard_manage') !== false) : ?>
        {{-- card grid buat data partner, course, tutor, dsb --}}
        <div class="ui grid">
            {{-- Partner --}}
            <div class="four wide column">
                <div class="ui fluid card">
                    <div class="content">
                        <div class="ui right floated header" style="color: #73879C;">
                            <i class="fa fa-building"></i>
                        </div>
                        <div class="header">
                            <div class="ui header" style="color: #73879C;">{{$data['partner']}}
                            </div>
                        </div>
                        <div class="meta">
                            Partner
                        </div>
                    </div>
                </div>
            </div>

            {{-- Course --}}
            <div class="four wide column">
                <div class="ui fluid card">
                    <div class="content">
                        <div class="ui right floated header" style="color: #73879C;">
                            <i class="fa fa-book"></i>
                        </div>
                        <div class="header">
                            <div class="ui header" style="color: #73879C;">{{$data['course']}}
                            </div>
                        </div>
                        <div class="meta">
                            Course
                        </div>
                    </div>
                </div>
            </div>

            {{-- Difficulty --}}
            <div class="four wide column">
                <div class="ui fluid card">
                    <div class="content">
                        <div class="ui right floated header" style="color: #73879C;">
                            <i class="fa fa-level-up"></i>
                        </div>
                        <div class="header">
                            <div class="ui header" style="color: #73879C;">{{$data['difficulty']}}
                            </div>
                        </div>
                        <div class="meta">
                            Difficulty
                        </div>
                    </div>
                </div>
            </div>

            {{-- Course Module --}}
            <div class="four wide column">
                <div class="ui fluid card">
                    <div class="content">
                        <div class="ui right floated header" style="color: #73879C;">
                            <i class="fa fa-book"></i>
                        </div>
                        <div class="header">
                            <div class="ui header" style="color: #73879C;">{{$data['course_module']}}
                            </div>
                        </div>
                        <div class="meta">
                            Course Module
                        </div>
                    </div>
                </div>
            </div>

            {{-- Course Price --}}
            <div class="four wide column">
                <div class="ui fluid card">
                    <div class="content">
                        <div class="ui right floated header" style="color: #73879C;">
                            <i class="fa fa-archive"></i>
                        </div>
                        <div class="header">
                            <div class="ui header" style="color: #73879C;">{{$data['course_price']}}
                            </div>
                        </div>
                        <div class="meta">
                            Course Price
                        </div>
                    </div>
                </div>
            </div>

            {{-- Tutor --}}
            <div class="four wide column">
                <div class="ui fluid card">
                    <div class="content">
                        <div class="ui right floated header" style="color: #73879C;">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="header">
                            <div class="ui header" style="color: #73879C;">{{$data['tutor']}}
                            </div>
                        </div>
                        <div class="meta">
                            Tutor
                        </div>
                    </div>
                </div>
            </div>

            {{-- Member --}}
            <div class="four wide column">
                <div class="ui fluid card">
                    <div class="content">
                        <div class="ui right floated header" style="color: #73879C;">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="header">
                            <div class="ui header" style="color: #73879C;">{{$data['member']}}
                            </div>
                        </div>
                        <div class="meta">
                            Member
                        </div>
                    </div>
                </div>
            </div>

            {{-- Content Carousel --}}
            <div class="four wide column">
                <div class="ui fluid card">
                    <div class="content">
                        <div class="ui right floated header" style="color: #73879C;">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="header">
                            <div class="ui header" style="color: #73879C;">{{$data['content_carousel']}}
                            </div>
                        </div>
                        <div class="meta">
                            Content Carousel
                        </div>
                    </div>
                </div>
            </div>

            {{-- Transaction --}}
            <div class="four wide column">
                <div class="ui fluid card">
                    <div class="content">
                        <div class="ui right floated header" style="color: #73879C;">
                            <strong>Rp</strong>
                        </div>
                        <div class="header">
                            <div class="ui header" style="color: #73879C;">{{$data['transaction']}}
                            </div>
                        </div>
                        <div class="meta">
                            Transaction
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- New Member Chart --}}
        <div class="ui equal width grid">
            <div class="sixteen wide column">
                <div class="ui fluid card">
                    <div class="content">
                        <div class="meta">
                            New Member Report -
                            <select name="new_member_report" id="new_member_report">
                                <option selected>Daily</option>
                                <option>Weekly</option>
                                <option>Monthly</option>
                                <option>Yearly</option>
                            </select>
                        </div>
                        <div class="new-member-chart-space" id="new-member-chart-space"></div>
                    </div>
                </div>
            </div>
        </div>
    <?php else : ?>
        <h1 align="middle"> ... Welcome ... </h1>
        <h2 align="middle"> <small>to</small> </h2>
        <h3 align="middle"> Linkmagangku </h3>
    <?php endif; ?>
</div>
@endsection

@section('footerScripts')
<link href="{{ asset ('semantic/components/grid.css') }}" rel="stylesheet">
<link href="{{ asset ('semantic/components/card.css') }}" rel="stylesheet">
<link href="{{ asset ('semantic/components/icon.css') }}" rel="stylesheet">
<link href="{{ asset ('semantic/components/image.css') }}" rel="stylesheet">
<link href="{{ asset ('semantic/components/header.css') }}" rel="stylesheet">
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script>
    function generateChart(htmlElement, xAxisText, seriesName, seriesData) {
        Highcharts.chart(htmlElement, {
            chart: {
                type: 'areaspline'
            },
            title: {
                text: ''
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: 150,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
            },
            xAxis: {
                categories: xAxisText,
            },
            yAxis: {
                title: {
                    text: ''
                }
            },
            tooltip: {
                shared: true,
                valueSuffix: ''
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                areaspline: {
                    fillOpacity: 0.5
                }
            },
            series: [{
                name: seriesName,
                data: seriesData
            }]
        });
    }

    // function untuk update saat ada perubahan di selectbox utk chart new_member -> ganti format daily/monthly/yearly
    $(document).ready(function() {
        $('#new_member_report').on('change', function() {
            var filter = $('#new_member_report').val();
            $.get("{{route('dashboards.getReport')}}", {
                'filter': filter,
                'type': 'member',
            }, function(data) {
                generateChart('new-member-chart-space', Object.keys(data), 'Member', Object.values(data));
            });
        });

        $('#new_member_report').change();
    });
</script>
@parent
@endsection