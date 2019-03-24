@extends('layouts.app')
@section('content-app')

<form action="{{ route('editarPrograma', $programa->id)}}" method="POST" class="form">
    @csrf  
    @method('PUT')
    
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ $programa->nome }}">
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="objetivo">Objetivo</label>
                <input type="text" name="objetivo" id="objetivo" class="form-control" value="{{ $programa->objetivo }}">
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="filial">Filial</label>
                <select class="form-control" name="filial" id="filial">
                @foreach($filiais as $filial)
                <!-- Adicionar a Filial atual como selecionada -->
                    <option value="{{ $filial->id }}">{{ $filial->nome }}</option>
                @endforeach
                </select>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="{{ route('programas')}}" class="btn btn-default">Cancelar</a>
</form>

@endsection