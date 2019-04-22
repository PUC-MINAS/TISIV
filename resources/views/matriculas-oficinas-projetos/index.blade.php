@extends('layouts.app')
@section('content-app')

<div class="card shadow">
    <div class="card-header card-header-space-between">
        <h4 class="m-0 font-weight-bold text-primary">
            Alunos - {{$turma->getOficina()->nome}} - Turma {{$turma->id}}
        </h4>
        <a class="btn btn-primary" href="{{ url('oficinas-projetos/'.$oficina->id.'/matriculas/create') }}" >
            Matricular Aluno
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive table-full-width">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Data Matricula</th>
                    <th scope="col">Data Conclusão</th>
                    <th scope="col">Data Desistência</th>
                    <th></th>
                </tr>
                </thead>
                @foreach($turma->getMatriculas() as $matricula)
                    <tbody>
                    <tr>
                        <td>{{ $matricula->getUsuario()->nome }}</td>
                        <td>{{ $matricula->data_matricula }}</td>
                        <td>{{ $matricula->data_conclusao }}</td>
                        <td>{{ $matricula->data_desistencia}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ url('oficinas-projetos/'.$oficina->id.'/turmas/'.$matricula->id_turmas.'/matriculas/'.$matricula->id) }}" >Detalhes</a>
                        </td>     
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
        
    </div>
</div>

@endsection

@section('script')
<script>
    
</script>
@endsection