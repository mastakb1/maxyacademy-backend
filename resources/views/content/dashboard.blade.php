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

    <?php if (strpos(Session::get('user_access'), 'dashboard') !== false) : ?>

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

    $(document).ready(function() {
        
    });
</script>
@parent
@endsection