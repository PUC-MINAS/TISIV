@extends('layouts.app')

@section('sidebar')
    @parent
@endsection

@section('topbar')
    @parent
@endsection

@section('content')

<div class="container-fluid">

	<div class="card">
		<div class="card-header">
            <h4 class="card-title" style="display: inline">Cadastrar Endereço</h4>
            <div class="ml-auto close">
                <form action="{{ route('usuarios.destroy', $id) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button
                        type="submit"
                        class="btn btn-circle"
                        style="position: relative; bottom: 0.5vh"
                        ><i class="far fa-times-circle"></i>
                    </button>
                </form>
            </div>
		</div>
		<div class="card-body container">
            <form method="POST" action="{{ route('endereco.store') }}">
                @method('POST')
                @csrf
                <div class="row col-xs-6 col-sm-12">
                    <div class="form-group col-sm-8">
                        <input
                            type="hidden"
                            id="usuario-id"
                            name="usuario-id"
                            value="{{$id}}"
                        >
					    <label for="rua">Rua</label>
					    <input type="text" name="rua" class="form-control" id="rua">
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="numero" >Número</label>
                        <input type="text" name="numero" class="form-control" id="numero">
                    </div>
                    <div class="form-group col-xs-2 col-sm-2">
                        <label for="apto">Apartamento</label>
                        <input type="text" name="apto" class="form-control" id="apto">
                    </div>
                </div>
                <div class="row col-xs-6 col-sm-12">
                    <div class="form-group col-sm-9">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" id="bairro" class="form-control">
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="cep">CEP</label>
                        <input type="text" name="cep" class="form-control" id="cep">
                    </div>
                </div>
                <div class="row col-xs-6 col-sm-12">
                    <div class="form-group col-sm-9">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" class="form-control" id="cidade">
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="uf">UF</label>
                        <select class="form-control" name="uf" id="uf">[
                            <option value=0></option>
                            <option value=1>Minas Gerais</option>
                            <option value=2>Ceará</option>
                        </select>
                    </div>
                </div>
                <div class="row col-xs-6 col-sm-12">
                    <div class="form-group col-sm-12">
                        <label for="nacionalidade">Nacionalidade</label>
                        <input type="text" name="nacionalidade" class="form-control" id="nacionalidade">
                    </div>
                </div>
                <br>
                <div class="row ml-0 col-xs-6 col-sm-12">
                    <button type="submit" class="btn btn-success btn-lg btn-circle ml-auto"><i class="fas fa-angle-right"></i></button>
                </div>
			</form>

		</div>
	</div>
</div>

@endsection

