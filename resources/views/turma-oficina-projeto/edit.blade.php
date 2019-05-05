@extends('layouts.app')
@section('content-app')

<div class="card shadow">
    <div class="card-header"><h4 class="card-title">Editar: {{$turma->nome()}}</h4></div>
    <div class="card-body">
        <form action="{{url('oficinas-projetos/'.$oficina->id.'/turmas/'.$turma->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="educador">Educador</label>
                    <input type="text" class="form-control" value="{{$turma->educador}}" name="educador">
                </div>
                <div class="form-group col-md-6">
                    <label for="horario">Horário</label>
                    <input type="text" class="form-control" value="{{$turma->horario}}" name="horario">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="maximoAlunos">Máximo alunos</label>
                    <input class="form-control" type="text" value="{{$turma->maximoAlunos}}" name="maximoAlunos" id="maximoAlunos">
                </div>
                <div class="form-group col-md-4">
                    <label for="idadeMinima">Idade mínima</label>
                    <input class="form-control" type="text" value="{{$turma->idadeMinima}}" name="idadeMinima" id="idadeMinima">
                </div>
                <div class="form-group col-md-4">
                    <label for="idadeMaxima">Idade máxima</label>
                    <input class="form-control" type="text" value="{{$turma->idadeMaxima}}" name="idadeMaxima" id="idadeMaxima">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ url('turma-oficina-projeto')}}" class="btn btn-warning">Voltar</a>            
        </form>
    </div>
</div>


@endsection