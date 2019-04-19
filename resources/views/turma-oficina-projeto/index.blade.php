@extends('layouts.app')
@section('content-app')

<div class="card shadow">
    <div class="card-header card-header-space-between">
        <h4 class="m-0 font-weight-bold text-primary">Turmas</h4>
        <a class="btn btn-primary" href="{{ url('turma-oficina-projeto/create') }}" >Criar Turma</a>
    </div>
    <div class="card-body">
        <div class="table-responsive table-full-width">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Oficina</th>
                    <th scope="col">Educador</th>
                    <th scope="col">Horário</th>
                    <th scope="col">Máximo de alunos</th>
                    <th scope="col">Idade mínima</th>
                    <th scope="col">Idade máxima</th>                    
                    <th></th>
                </tr>
                </thead>
                @foreach($turmas as $turma)
                    <tbody>
                    <tr>
                        <td>{{ $turma->id_oficinas_projetos }}</td>
                        <td>{{ $turma->educador }}</td>
                        <td>{{ $turma->horario }}</td>
                        <td>{{ $turma->maximoAlunos }}</td>
                        <td>{{ $turma->idadeMinima }}</td>
                        <td>{{ $turma->idadeMaxima }}</td>                    
                        <td>
                            <a class="btn btn-primary" href="{{ url('turma-oficina-projeto/'.$turma->id) }}" >Detalhes</a>                    
                        </td>     
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection