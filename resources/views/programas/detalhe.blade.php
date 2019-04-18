@extends('layouts.app')
@section('content-app')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Programa "{{$programa->nome}}"</h4>
    </div>
    <div class="card-body">
        <p><b>Objetivo:</b> {{$programa->objetivo}}</p>
        <!-- Buscar nome da filial -->
        <p><b>Filial:</b> {{$programa->id_filiais}}</p>
    </div>
</div>

@endsection