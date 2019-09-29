@extends('layouts.pdf')
@section('pdf-content')

<style>
    .div-height{
        height: 400px;
    }

    .document_title{
        text-align: center;
    }
</style>

<div class="container-fluid">
    <h2 class="document_title">Relatório Demográfico - Oficina de </h2>
    <div class="row">
        <div class="col-md-6 div-height" id='age-table'>{!! $lava->render('BarChart', 'Idade', 'age-table'); !!}</div>
        <div class="col-md-6 div-height" id='gender-table'>{!! $lava->render('PieChart', 'IMDB', 'gender-table'); !!}</div>
        <div class="col-md-6 div-height" id='ethnicity-table'>{!! $lava->render('BarChart', 'Votes', 'ethnicity-table'); !!}</div>
        <div class="col-md-6 div-height" id='salary-table'>{!! $lava->render('ColumnChart', 'Salary', 'salary-table'); !!}</div>
        <div class="col-md-6 div-height" id='schooling-table'>{!! $lava->render('ColumnChart', 'Finances', 'schooling-table'); !!}</div>
        <div class="col-md-6 div-height" id='family-table'>{!! $lava->render('ColumnChart', 'Family', 'family-table'); !!}</div>
    </div>
</div>


@endsection