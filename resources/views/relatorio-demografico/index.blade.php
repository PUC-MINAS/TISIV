@extends('layouts.pdf')
@section('pdf-content')

<style>

    /*without this, graphics will render with 1px height*/
    .div-height{
        height: 400px;
    }

    .document_title{
        text-align: center;
    }

    /*subtitle paragraphs. align with graphics*/
    div.col-md-6 > p{
        margin-left: 100px;
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
            <p>< 12: {!!$idade[0]!!} | 12-18: {!!$idade[1]!!} | 19-25: {!!$idade[2]!!} | 26-30: {!!$idade[3]!!} | 31-35: {!!$idade[4]!!} | 36-40: {!!$idade[5]!!} | 41-45: {!!$idade[6]!!} | > 45: {!!$idade[7]!!}</p>
        </div>
        <div class="col-md-6">
            <p>Feminino: {!!$genero[2]!!} | Masculino: {!!$genero[1]!!} | NE: {!!$genero[0]!!} </p>
        </div>
        <div class="col-md-6 div-height" id='ethnicity-table'>{!! $lava->render('BarChart', 'Votes', 'ethnicity-table'); !!}</div>
        <div class="col-md-6 div-height" id='salary-table'>{!! $lava->render('ColumnChart', 'Salary', 'salary-table'); !!}</div>
        <div class="col-md-6"> 
            <p>Amarela: {!!$etnia[3]!!} | Branca: {!!$etnia[1]!!} | Indígena: 0 | Parda: {!!$etnia[4]!!} | Preta: {!!$etnia[2]!!} | Não declarada: {!!$etnia[0]!!}</p>
        </div>
        <div class="col-md-6">
            <p>Baixa: | Média: | Alta: </p>
        </div>
        <div class="col-md-6 div-height" id='schooling-table'>{!! $lava->render('ColumnChart', 'Finances', 'schooling-table'); !!}</div>
        <div class="col-md-6 div-height" id='family-table'>{!! $lava->render('ColumnChart', 'Family', 'family-table'); !!}</div>
        <div class="col-md-6"> 
            <p style="margin-bottom: 0px;">Completos -> Pós: {!!$escolaridade[11]!!}| Superior: {!!$escolaridade[9]!!}| Técnico: {!!$escolaridade[7]!!}| Médio: {!!$escolaridade[5]!!}| Fundamental: {!!$escolaridade[3]!!}</p>
            <p style="margin-top: 0px">Incompletos -> Pós: {!!$escolaridade[10]!!}| Superior: {!!$escolaridade[8]!!}| Técnico: {!!$escolaridade[6]!!}| Médio: {!!$escolaridade[4]!!}| Fundamental: {!!$escolaridade[2]!!}</p>
        </div>
        <div class="col-md-6">
            <p>1-2: | 3-5: | 6-9: | 10+: </p>
        </div>
    </div>
</div>


@endsection