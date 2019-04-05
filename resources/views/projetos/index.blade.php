@extends('layouts.app')
@section('content-app')

<a class="btn btn-primary" href="{{ url('projetos/create') }}" >Criar Projeto</a>
<div class="card shadow">
    <div class="card-header"><h4 class="m-0 font-weight-bold text-primary">Projetos</h4></div>
    <div class="card-body">
        <div class="table-responsive table-full-width">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Início</th>
                    <th scope="col">Fim</th>
                    <th scope="col">Programa</th>
                    <th></th>
                </tr>
                </thead>
                @foreach($projetos as $projeto)
                    <tbody>
                    <tr>
                        <td>{{ $projeto->nome }}</td>
                        <td>{{ $projeto->inicio }}</td>
                        <td>{{ $projeto->fim }}</td>
                        <td>{{ $projeto->getPrograma()->nome }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ url('projetos/'.$projeto->id) }}" >Detalhes</a>                    
                        </td>     
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>


@endsection