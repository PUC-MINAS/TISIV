@extends('layouts.app')

@section('content-app')
<div class="card shadow">
    <div class="card-header">Dashboard</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        Seja bem vindo ao Gestão CSF
        
        
        <div class="container" style="margin-top: 40px;">
            <div class="row">
        <div class="col-md-4">
            <div class="card-header">Oficinas</div>
            <div class="" style="height: 300px; background-color:darkgray; display: inline">
            <select>
                <option>Frequência</option>
                <option value="">Demográfico</option>
            </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-header">Programas</div>
            <div class="" style="height: 300px; background-color:darkgray display: inline"></div>
        </div>
        <div class="col-md-4">
            <div class="card-header">Projetos</div>
            <div class="" style="height: 300px; background-color:darkgray; display: inline"></div>
        </div>
    </div>
    </div>
        
        
        
    </div>
</div>
@parent
@endsection
