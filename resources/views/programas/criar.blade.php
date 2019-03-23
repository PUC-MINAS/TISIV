@extends('layouts.app')
@section('content-app')

<form action="{{url('/programas/store/')}}" method="post" class="form">
    <div class="row">
        <div class="col-4">
            <div class="form-group">
                <label for="">Nome</label>
                <input type="text" name="nome" class="form-control">
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="objetivo">Objetivo</label>
                <input type="text" name="objetivo" class="form-control">
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label for="filiais">Filial</label>
                <select class="form-control" name="filiais">
                    <option></option>
                </select>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">
        Salvar
    </button>
    <a href="{{ route('programas')}}" class="btn btn-default">Cancelar</a>
</form>

@endsection