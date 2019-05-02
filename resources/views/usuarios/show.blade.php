@extends('layouts.app')

@section('sidebar')
    @parent
@endsection

@section('topbar')
    @parent
@endsection

@section('content')

@if(session('error'))
<div class="row">
    <div class="col">
        <div class="alert alert-danger alert-dismissible fade show">
                {{session('error')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>                       
        </div>
    </div>
</div>
@endif

<div class="container-fluid">

	<div class="card">
		<div class="card-header">
            <h4 class="card-title" style="display: inline">Detalhes: {{$usuario->nome}}</h4>
            <div class="ml-auto close">
                <a
                    href="{{ url('usuarios') }}"
                    class="btn btn-circle"
                    style="position: relative; bottom: 0.5vh"
                    ><i class="far fa-times-circle"></i>
                </a>
            </div>
		</div>
		<div class="card-body container">
            <form>
                <h5>Informações Pessoais</h5>
                <div class="row">
                    <div class="form-group col">
					    <label for="nome-completo">Nome Completo</label>
					    <input type="text" name="nome-completo" class="form-control" id="nome-completo" value="{{$usuario->nome}}" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf" class="form-control" id="cpf" value="{{$usuario->cpf}}" disabled>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="rg">RG</label>
                        <input type="text" name="rg" class="form-control" id="rg" value="{{$usuario->rg}}" disabled>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="certidao-nasc">Nº Certidão de Nascimento</label>
                        <input type="text" name="certidao-nasc" class="form-control" id="certidao-nasc" value="{{$usuario->certidao_nasc}}" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label>Data de Nascimento</label>
                        <input type="date" name="dta_nasc" id="dta_nasc" class="form-control" value="{{$usuario->dta_nasc}}" disabled>
                    </div>
                    <div class="form-group col-sm-4">
                        <label>Sexo</label>
                        <select class="form-control" name="sexo" id="sexo" disabled>
                            <option value="{{$usuario->sexo}}">{{\App\Enums\Sexo::getDescription($usuario->sexo)}}</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label>Estado Civil</label>
                        <select disabled class="form-control" name="estado-civil" id="estado-civil">
                            <option value="{{$usuario->estado_civil}}">{{\App\Enums\EstadoCivil::getDescription($usuario->estado_civil)}}</option>
                        </select>
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group col-sm-4">
					    <label>Raça/Cor</label>
					    <select disabled class="form-control" name="raca-cor" id="raca-cor">
						    <option value="{{$usuario->raca_cor}}">{{\App\Enums\RacaCor::getDescription($usuario->raca_cor)}}</option>
					    </select>
                    </div>
                    <div class="form-group col-sm-4">
					    <label>Povos Tradicionais</label>
					    <select disabled class="form-control" name="povo-tradicional" id="povo-tradicional">[
						    <option value="{{$usuario->povo_tradicional}}">{{\App\Enums\PovoTradicional::getDescription($usuario->povo_tradicional)}}</option>
					    </select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label>Escolaridade</label>
                        <select disabled class="form-control" name="escolaridade" id="escolaridade">[
                            <option value="{{$usuario->escolaridade}}">{{\App\Enums\Escolaridade::getDescription($usuario->escolaridade)}}</option>
                        </select>
                    </div>                    
                </div>
                <div class="row">
                    <div class="form-group col">
					    <label for="profissao">Profissão</label>
					    <input disabled type="text" name="profissao" class="form-control" id="profissao" value="{{$usuario->profissao}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
					    <label for="telefone">Telefone</label>
					    <input disabled type="text" name="telefone" class="form-control" id="telefone" value="{{$usuario->telefone}}">
                    </div>
                    <div class="form-group col-sm-4">
					    <label for="whats-app">Nº WhatsApp</label>
				        <input type="text" name="whats-app" class="form-control" id="whats-app" value="{{$usuario->num_wpp}}" disabled>
                    </div>
                    <div class="form-group col-sm-4">
					    <label for="contato-emergencial">Contato Emergencial</label>
					    <input type="text" name="contato-emergencial" class="form-control" id="contato-emergencial" value="{{$usuario->contato_emerg}}" disabled>
                    </div>
                    
                </div>
                <h5 class="mt-5">Endereço</h5>
                <div class="row">
                    <div class="form-group col-sm-9">
                        <label for="logadouro">Endereço</label>
                        <input type="text" name="logadouro" class="form-control" value="{{$endereco != null ? $endereco->logadouro : ''}}" disabled>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="numero">Número</label>
                        <input type="text" name="numero" class="form-control" value="{{ $endereco != null ? $endereco->numero : ''}}" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="complemento">Complemento</label>
                        <input type="text" name="complemento" class="form-control" value="{{ $endereco != null ? $endereco->complemento : ''}}" disabled>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" class="form-control" value="{{ $endereco != null ? $endereco->bairro : ''}}" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="cep">CEP</label>
                        <input type="text" name="cep" class="form-control" value="{{ $endereco != null ? $endereco->cep : ''}}" disabled>
                    </div>
                    <div class="form-group col-sm-5">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" class="form-control" value="{{ $endereco != null ? $endereco->cidade : ''}}" disabled>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="uf">Estado</label>
                        <select name="uf" id="uf" class="form-control" disabled>
                        @foreach(\App\Enums\UF::list() as $uf)
                            <option {{$endereco != null && $endereco->uf == $uf ? 'selected' : ''}} value="{{$uf}}">{{ \App\Enums\UF::getDescription($uf) }}</option>
                        @endforeach
                        </select>
                    </div>

                </div>
                <h5 class="mt-5">Informações Adicionais</h5>
                <div class="row">
                    <div class="col">
                        <div class="custom-control custom-checkbox form-check mb-2">
                            <input disabled {{$usuario->cras ? 'checked' : ''}} type="checkbox" class="custom-control-input" id="cras" name="cras">
                            <label class="custom-control-label" for="cras">Possui Cadastro no CRAS?</label>
                        </div>
                    </div>                
                    
                </div>
                <div class="row">
                    <div class="form-group col">
					    <label for="cad-unico">Nº Cadastro Único</label>
					    <input type="text" name="cad-unico" class="form-control" id="cad-unico" value="{{$usuario->num_cad}}" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
					    <label for="medicamentos">Medicamentos</label>
                        <textarea name="medicamentos" class="form-control" id="medicamentos" rows="3" cols="30" disabled>{{$usuario->medicamentos}}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
					    <label for="alergias">Alergias</label>
                        <textarea name="alergias" class="form-control" id="alergias" rows="3" cols="30" disabled>{{$usuario->alergias}}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label>Como chegou até nós?</label>
                        <select class="form-control" name="descobriu-por" id="descobriu-por" disabled>
                            <option value="{{$usuario->descobriu_por}}">{{\App\Enums\FormaDivulgacao::getDescription($usuario->descobriu_por)}}</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="observacoes">Observações</label>
                        <textarea name="observacoes" class="form-control" id="observacoes" rows="3" cols="30" disabled>{{$usuario->observacao}}</textarea>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <a href="{{url('usuarios')}}" class="btn btn-primary">Voltar</a>
                        <a href="{{url('usuarios/'.$usuario->id.'/edit')}}" class="btn btn-success">Editar</a>
                        <button type="button" class="btn btn-danger">Deletar</button>
                    </div>                    
                </div>
			</form>

		</div>
	</div>
</div>

@endsection

