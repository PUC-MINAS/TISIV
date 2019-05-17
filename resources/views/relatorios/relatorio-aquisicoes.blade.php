@extends('layouts.pdf')

@section('pdf-content')
<style>
    h1{
        text-align: center;
    }
    
    .declaracao{
        font-size: 16px;
        text-align:justify;
    }

    .bold {
        font-weight: bold;
    }
</style>
<h1>Relatório de Aquisicões</h1>

@component('relatorios.identificacao-usuario', [ 'usuario' => $usuario])
@endcomponent

<div class="secao">
    <div class="secao-header">2 - Fichas de Aquisições</div>
    <div class="container-fluid secao-body">
        <div class="row">
            <div class="col">
                <h3>Período 16/05/2019 à 16/11/2019</h3>
            </div>
        </div>
    </div>
</div>


@endsection
