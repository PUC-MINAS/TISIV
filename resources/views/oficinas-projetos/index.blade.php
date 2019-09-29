@extends('layouts.app')
@section('content-app')

<div class="card shadow">
    <div class="card-header card-header-space-between">
        <h4 class="card-title">Oficinas de Projetos</h4>
        <a class="btn btn-primary" href="{{ url('oficinas-projetos/create') }}" >Criar Oficina</a>
    </div>
    <div class="card-body">
        <div class="table-responsive table-full-width">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Início</th>
                    <th scope="col">Fim</th>
                    <th scope="col">Projeto</th>
                    <th scope="col">Programa</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                @foreach($oficinas as $oficina)
                    <tbody>
                    <tr>
                        <td>{{ $oficina->nome }}</td>
                        <td>{{ $oficina->inicio }}</td>
                        <td>{{ $oficina->fim }}</td>
                        <td>{{ $oficina->getProjeto()->nome }}</td>
                        <td>{{ $oficina->getProjeto()->getPrograma()->nome }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ url('oficinas-projetos/'.$oficina->id) }}" >Detalhes</a>                    
                        </td>   
                        <td>
                            <a href="{{url('relatorio-demografico/oficina')}}" class="btn btn-success">Relatório Demográfico</a>    
                        </td>  
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection