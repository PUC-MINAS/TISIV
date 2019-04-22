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
			<h4 class="card-title">Cadastrar Grupo Familiar</h4>
		</div>
		<div class="card-body container">
            <form method="POST" action="{{ route('familia.store') }}">
                @method('POST')
                @csrf
                <div class="card">
                    <div class="row col-xs-6 col-sm-12">
                        <div class="form-group col-sm-6">
                            <input
                                type="hidden"
                                id="usuario-id"
                                name="usuario-id"
                                value="{{$id}}"
                            >
                            <label for="nome1">Nome</label>
                            <input type="text" name="nome1" class="form-control" id="nome1">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="parentesco1">Parentesco</label>
                            <select class="form-control" name="parentesco1" id="parentesco1">[
                                <option value=0></option>
                                <option value=1>Pai</option>
                                <option value=2>Mãe</option>
                                <option value=3>Avô/Avó</option>
                                <option value=4>Irmã(o)</option>
                                <option value=5>Filho(a)</option>
                                <option value=6>Padrasto/Madastra</option>
                                <option value=7>Enteado</option>
                                <option value=8>Cônjuge</option>
                                <option value=9>Neto</option>
                                <option value=10>Tio</option>
                                <option value=11>Sobrinho</option>
                                <option value=12>Primo</option>
                            </select>
                        </div>
                    </div>
                    <div class="row col-xs-6 col-sm-12">
                        <div class="form-group col-xs-2 col-sm-6">
                            <label for="dta-nasc1">Data de Nascimento</label>
                            <input type="date" name="dta-nasc1" class="form-control" id="dta-nasc1">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="profissao1">Profissão</label>
                            <input type="text" name="profissao1" id="profissao1" class="form-control">
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="row col-xs-6 col-sm-12">
                        <div class="form-group col-sm-6">
                            <label for="nome2">Nome</label>
                            <input type="text" name="nome2" class="form-control" id="nome2">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="parentesco2">Parentesco</label>
                            <select class="form-control" name="parentesco2" id="parentesco1">[
                                <option value=0></option>
                                <option value=1>Pai</option>
                                <option value=2>Mãe</option>
                                <option value=3>Avô/Avó</option>
                                <option value=4>Irmã(o)</option>
                                <option value=5>Filho(a)</option>
                                <option value=6>Padrasto/Madastra</option>
                                <option value=7>Enteado</option>
                                <option value=8>Cônjuge</option>
                                <option value=9>Neto</option>
                                <option value=10>Tio</option>
                                <option value=11>Sobrinho</option>
                                <option value=12>Primo</option>
                            </select>
                        </div>
                    </div>
                    <div class="row col-xs-6 col-sm-12">
                        <div class="form-group col-xs-2 col-sm-6">
                            <label for="dta-nasc2">Data de Nascimento</label>
                            <input type="date" name="dta-nasc2" class="form-control" id="dta-nasc2">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="profissao2">Profissão</label>
                            <input type="text" name="profissao2" id="profissao2" class="form-control">
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="row col-xs-6 col-sm-12">
                        <div class="form-group col-sm-6">
                            <label for="nome3">Nome</label>
                            <input type="text" name="nome3" class="form-control" id="nome3">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="parentesco3">Parentesco</label>
                            <select class="form-control" name="parentesco3" id="parentesco1">[
                                <option value=0></option>
                                <option value=1>Pai</option>
                                <option value=2>Mãe</option>
                                <option value=3>Avô/Avó</option>
                                <option value=4>Irmã(o)</option>
                                <option value=5>Filho(a)</option>
                                <option value=6>Padrasto/Madastra</option>
                                <option value=7>Enteado</option>
                                <option value=8>Cônjuge</option>
                                <option value=9>Neto</option>
                                <option value=10>Tio</option>
                                <option value=11>Sobrinho</option>
                                <option value=12>Primo</option>
                            </select>
                        </div>
                    </div>
                    <div class="row col-xs-6 col-sm-12">
                        <div class="form-group col-xs-2 col-sm-6">
                            <label for="dta-nasc3">Data de Nascimento</label>
                            <input type="date" name="dta-nasc3" class="form-control" id="dta-nasc3">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="profissao3">Profissão</label>
                            <input type="text" name="profissao3" id="profissao3" class="form-control">
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="row col-xs-6 col-sm-12">
                        <div class="form-group col-sm-6">
                            <label for="nome4">Nome</label>
                            <input type="text" name="nome4" class="form-control" id="nome4">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="parentesco4">Parentesco</label>
                            <select class="form-control" name="parentesco4" id="parentesco1">[
                                <option value=0></option>
                                <option value=1>Pai</option>
                                <option value=2>Mãe</option>
                                <option value=3>Avô/Avó</option>
                                <option value=4>Irmã(o)</option>
                                <option value=5>Filho(a)</option>
                                <option value=6>Padrasto/Madastra</option>
                                <option value=7>Enteado</option>
                                <option value=8>Cônjuge</option>
                                <option value=9>Neto</option>
                                <option value=10>Tio</option>
                                <option value=11>Sobrinho</option>
                                <option value=12>Primo</option>
                            </select>
                        </div>
                    </div>
                    <div class="row col-xs-6 col-sm-12">
                        <div class="form-group col-xs-2 col-sm-6">
                            <label for="dta-nasc4">Data de Nascimento</label>
                            <input type="date" name="dta-nasc4" class="form-control" id="dta-nasc4">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="profissao4">Profissão</label>
                            <input type="text" name="profissao4" id="profissao4" class="form-control">
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="row col-xs-6 col-sm-12">
                        <div class="form-group col-sm-6">
                            <label for="nome5">Nome</label>
                            <input type="text" name="nome5" class="form-control" id="nome5">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="parentesco5">Parentesco</label>
                            <select class="form-control" name="parentesco5" id="parentesco1">[
                                <option value=0></option>
                                <option value=1>Pai</option>
                                <option value=2>Mãe</option>
                                <option value=3>Avô/Avó</option>
                                <option value=4>Irmã(o)</option>
                                <option value=5>Filho(a)</option>
                                <option value=6>Padrasto/Madastra</option>
                                <option value=7>Enteado</option>
                                <option value=8>Cônjuge</option>
                                <option value=9>Neto</option>
                                <option value=10>Tio</option>
                                <option value=11>Sobrinho</option>
                                <option value=12>Primo</option>
                            </select>
                        </div>
                    </div>
                    <div class="row col-xs-6 col-sm-12">
                        <div class="form-group col-xs-2 col-sm-6">
                            <label for="dta-nasc5">Data de Nascimento</label>
                            <input type="date" name="dta-nasc5" class="form-control" id="dta-nasc5">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="profissao5">Profissão</label>
                            <input type="text" name="profissao5" id="profissao5" class="form-control">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row ml-0 col-xs-6 col-sm-12">
                    <button type="submit" class="btn btn-success btn-fill col-sm-2">Cadastrar</button>
                    <form action="{{ route('usuarios.destroy', $id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-fill ml-3 col-sm-2">Cancelar</button>
                    </form>
                </div>
			</form>
		</div>
	</div>
</div>

@endsection

