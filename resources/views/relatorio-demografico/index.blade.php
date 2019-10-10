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
        margin-left: 120px;
        font-size: 16px;
        font-weight: bold;
    }
</style>


{{-- <h5>{!!$qtd_turmas!!}</h5>
<h5>{{gettype($turma)}}</h5>
<h5>{{print_r($turma)}}</h5> --}}
<h3>TURMAS</h3>
@foreach($turma as $turminha)
    <h3>{{$turminha}}</h3>
    <br>
@endforeach
{{-- @foreach($dadousuario as $dado)
    <p>{{$dado->id}}</p>
@endforeach --}}
<h3>DADOUSUARIO</h3>
@foreach($idUsuario as $dado)
<h6>{{$dado}}</h6>
<br>
@endforeach

{{-- <h3>DADO FORMATADO</h3>
@foreach($idFormatado as $dado)
<h6>{{$dado}}</h6>
<br>
@endforeach --}}
{{-- 
<h3>{{$idFormatado}}</h3> --}}

{{-- @foreach($genero as $g)
<h2>{{$genero}}</h2>
@endforeach --}}
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