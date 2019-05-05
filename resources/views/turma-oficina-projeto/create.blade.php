@extends('layouts.app')
@section('content-app')

<div class="card shadow">
    <div class="card-header"><h4 class="card-title">Nova Turma - {{$oficina->nome}}</h4></div>
    <div class="card-body">
        <form action="{{url('oficinas-projetos/'.$oficina->id.'/turmas')}}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="educador">Educador</label>
                    <input type="text" class="form-control" name="educador">
                </div>
                <div class="form-group col-md-6">
                    <label for="horario">Horário</label>
                    <input type="text" class="form-control" name="horario">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="maximoAlunos">Máximo alunos</label>
                    <input class="form-control" type="text" name="maximoAlunos" id="maximoAlunos">
                </div>
                <div class="form-group col-md-4">
                    <label for="idadeMinima">Idade mínima</label>
                    <input class="form-control" type="text" name="idadeMinima" id="idadeMinima">
                </div>
                <div class="form-group col-md-4">
                    <label for="idadeMaxima">Idade máxima</label>
                    <input class="form-control" type="text" name="idadeMaxima" id="idadeMaxima">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ url('oficinas-projetos/'.$oficina->id)}}" class="btn btn-warning">Voltar</a>            
        </form>
    </div>
</div>


@endsection