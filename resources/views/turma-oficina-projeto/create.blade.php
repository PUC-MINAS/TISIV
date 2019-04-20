@extends('layouts.app')
@section('content-app')

<div class="card shadow">
    <div class="card-header"><h4 class="m-0 font-weight-bold text-primary">Nova Turma</h4></div>
    <div class="card-body">
        <form action="{{url('turma-oficina-projeto')}}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="oficina">Oficina</label>
                    <select class="form-control" name="oficina" id="oficina">
                        <option value="">-- Selecione uma oficina --</option>
                        @foreach($oficinas as $oficina)
                            <option value="{{ $oficina->id }}">{{$oficina->nome}}</option>
                        @endforeach
                    </select>
               </div>
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
            <a href="{{ url('turma-oficina-projeto')}}" class="btn btn-warning">Voltar</a>            
        </form>
    </div>
</div>


@endsection