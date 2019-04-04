@extends('layouts.app')
@section('content-app')
<div class="card shadow">
    <div class="card-header"><h4 class="m-0 font-weight-bold text-primary">Editar: {{$projeto->nome}}</h4></div>
    <div class="card-body">
        <form action="{{url('projetos')}}" method="post" onsubmit="return validaForm(this);">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" onfocusout="validaInputNome(this)" value="{{$projeto->nome}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="programa">Programa</label>
                    <select class="form-control" name="programa" id="programa" onfocusout="validaSelectPrograma(this)">
                        <option value="">-- Selecione um Programa --</option>
                        @foreach($programas as $programa)
                            @if($programa->id == $projeto->programa_id)
                            <option selected value="{{ $programa->id }}">{{$programa->nome}}</option>
                            @endif
                            <option value="{{ $programa->id }}">{{$programa->nome}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inicio">Início do Projeto</label>
                    <input id="inputDataInicio" class="form-control" type="date" name="inicio" value="{{$projeto->inicio}}" onfocusout="validaInputDataInicio(this)">
                </div>
                <div class="form-group col-md-6">
                    <label for="fim">Fim do Projeto</label>
                    <input class="form-control" type="date" name="fim" value="{{$projeto->fim}}" onfocusout="validaInputDataFim(this)">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="objetivo">Objetivo</label>
                    <textarea class="form-control" name="objetivo" id="objetivo" rows="5">{{$projeto->objetivo}}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" name="descricao" id="descricao" rows="5">{{$projeto->descricao}}</textarea>
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
    const invalid = 'is-invalid';

    function validaInputNome (input) {
        if (input.value <= 0) {
            input.classList.add(invalid);     
            return false;       
        }
        else {
            input.classList.remove(invalid);
            return true;
        }
    }

    function validaSelectPrograma (select) {
        if (select.value == "") {
            select.classList.add(invalid);
            return false;
        }
        else {
            select.classList.remove(invalid);
            return true;
        }
    }

    function validaInputDataInicio (input) {
        if (input.value == "") {
            input.classList.add(invalid);
            return false;
        }
        else {
            input.classList.remove(invalid);
            return true;
        }
    }

    function validaInputDataFim (input) {
        let inputInicio = document.getElementById('inputDataInicio');
        if ( input.value == "" ) {
            input.classList.add(invalid);
            return false;
        }
        else if ( !validaData(inputInicio.value, input.value)) {
            console.log("data fim menor que data inicio");
            input.classList.add(invalid);
            return false;
        }
        else {
            input.classList.remove(invalid);
            return true;
        }
    }

    function validaData(inicio, fim){
        let dInicio = new Date(inicio);
        let dFim = new Date(fim);
        return dInicio <= dFim;
    }

    function validaForm(form){
        let nomeOK = validaInputNome( form.elements.namedItem('nome') );
        let programaOk = validaSelectPrograma(form.elements.namedItem('programa'));
        let dataInicioOK = validaInputDataInicio(form.elements.namedItem('inicio'));
        let dataFimOK = validaInputDataFim(form.elements.namedItem('fim'));
        console.log('Nomeok: ' + nomeOK);
        console.log('programaOk: ' + programaOk);
        console.log('dataInicioOK: ' + dataInicioOK);
        console.log('dataFimOK: ' + dataFimOK);

        if ( nomeOK && programaOk && dataInicioOK && dataFimOK ){
            return true;
        }
        else {
            alert("Exitem campos inválidos. Verifique por favor!");
            return false;
        };
        
    }
</script>
@endsection