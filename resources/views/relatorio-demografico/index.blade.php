@extends('layouts.pdf')
@section('pdf-content')

<style>
    .div-height{
        height: 400px;
    }

    .document_title{
        text-align: center;
    }

    div.col-md-6 > p{
        margin-left: 120px;
        font-size: 16px;
        font-weight: bold;
    }
</style>

<div class="container-fluid">
    <h2 class="document_title">Relatório Demográfico - {!!$tipo!!} {!!$nome!!}</h2>
    <div class="row">
        <div class="col-md-6 div-height" id='age-table'>{!! $lava->render('BarChart', 'Idade', 'age-table'); !!}</div>
        <div class="col-md-6 div-height" id='gender-table' style="position: inherit;">{!! $lava->render('PieChart', 'IMDB', 'gender-table'); !!}</div>
        <div class="col-md-6"> 
            <p>< 12: | 12-18: | 19-25: | 26-30: | 31-35: | 36-40: | 41-45: | > 45: </p>
        </div>
        <div class="col-md-6">
            <p>Feminino: | Masculino: </p>
        </div>
        <div class="col-md-6 div-height" id='ethnicity-table'>{!! $lava->render('BarChart', 'Votes', 'ethnicity-table'); !!}</div>
        <div class="col-md-6 div-height" id='salary-table'>{!! $lava->render('ColumnChart', 'Salary', 'salary-table'); !!}</div>
        <div class="col-md-6"> 
            <p>Amarela: | Branca: | Indígena: | Parda: | Preta: | Não declarada: </p>
        </div>
        <div class="col-md-6">
            <p>Baixa: | Média: | Alta: </p>
        </div>
        <div class="col-md-6 div-height" id='schooling-table'>{!! $lava->render('ColumnChart', 'Finances', 'schooling-table'); !!}</div>
        <div class="col-md-6 div-height" id='family-table'>{!! $lava->render('ColumnChart', 'Family', 'family-table'); !!}</div>
        <div class="col-md-6"> 
            <p style="margin-bottom: 0px;">Completos -> Superior: | Médio: | Fundamental: </p>
            <p style="margin-top: 0px">Incompletos -> Superior: | Médio: | Fundamental: </p>
        </div>
        <div class="col-md-6">
            <p>1-2: | 3-5: | 6-9: | 10+: </p>
        </div>
    </div>
</div>


@endsection