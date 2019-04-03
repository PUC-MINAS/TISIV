@extends('layouts.app')
@section('content-app')

<div class="card shadow">
    <div class="card-header"><h4 class="m-0 font-weight-bold text-primary">Novo Projeto</h4></div>
    <div class="card-body">
        <form action="{{url('projetos/store')}}" method="post" onsubmit="return validaForm(this);">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome">
                </div>
                <div class="form-group col-md-4">
                    <label for="programa">Programa</label>
                    <select class="form-control" name="programa" id="programa">
                        <option value="">-- Selecione um Programa --</option>
                        @foreach($programas as $programa)
                            <option value="{{ $programa->id }}">{{$programa->nome}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inicio">Início do Projeto</label>
                    <input class="form-control" type="date" name="inicio" value="{{date('Y-m-d')}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="fim">Fim do Projeto</label>
                    <input class="form-control" type="date" name="fim" value="{{date('Y-m-d', strtotime('+6 month'))}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="objetivo">Objetivo</label>
                    <textarea class="form-control" name="objetivo" id="objetivo" rows="5"></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" name="descricao" id="descricao" rows="5"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ url('projetos')}}" class="btn btn-warning">Voltar</a>
            
        </form>
    </div>
</div>


@endsection

@section('script')
<script>
    function validaForm(form){
        console.log("Ta funfando");
        return false;
    }
</script>
@endsection