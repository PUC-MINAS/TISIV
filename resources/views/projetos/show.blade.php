@extends('layouts.app')
@section('content-app')
<div class="card shadow">
    <div class="card-header"><h4 class="m-0 font-weight-bold text-primary">Detalhes: {{$projeto->nome}}</h4></div>
    <div class="card-body">
        <form>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" value="{{$projeto->nome}}" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="programa">Programa</label>
                    <select class="form-control" name="programa" id="programa" readonly>
                        <option value="">-- Selecione um Programa --</option>   
                        <option selected value="{{ $projeto->getPrograma()->id }}">{{$projeto->getPrograma()->nome}}</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inicio">Início do Projeto</label>
                    <input id="inputDataInicio" class="form-control" type="date" name="inicio" value="{{$projeto->inicio}}" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="fim">Fim do Projeto</label>
                    <input class="form-control" type="date" name="fim" value="{{$projeto->fim}}" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="objetivo">Objetivo</label>
                    <textarea class="form-control" name="objetivo" id="objetivo" rows="5" readonly>{{$projeto->objetivo}}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" name="descricao" id="descricao" rows="5" readonly>{{$projeto->descricao}}</textarea>
                </div>
            </div>
            <a href="{{ url('projetos/'.$projeto->id.'/edit')}}" class="btn btn-primary">Editar</a>
            <a href="{{ url('projetos')}}" class="btn btn-warning">Voltar</a>
            
        </form>
    </div>
</div>
@endsection

@section('script')

@endsection