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
            <h4 class="card-title" style="display: inline">Cadastrar Beneficiado</h4>
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
            <form method="POST" action="{{url('usuarios')}}">
                @csrf
                <div class="row">
                    <div class="form-group col">
					    <label for="nome-completo">Nome Completo</label>
					    <input type="text" name="nome-completo" class="form-control" id="nome-completo">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf" class="form-control" id="cpf">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="rg">RG</label>
                        <input type="text" name="rg" class="form-control" id="rg">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="certidao-nasc">Nº Certidão de Nascimento</label>
                        <input type="text" name="certidao-nasc" class="form-control" id="certidao-nasc">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label>Data de Nascimento</label>
                        <input type="date" name="dta_nasc" id="dta_nasc" class="form-control">
                    </div>
                    <div class="form-group col-sm-4">
                        <label>Sexo</label>
                        <select class="form-control" name="sexo" id="sexo">
                            <option value="{{\App\Enums\Sexo::NaoInformado}}">Não Informado</option>
                            <option value="{{\App\Enums\Sexo::Masculino}}">Masculino</option>
                            <option value="{{\App\Enums\Sexo::Feminino}}">Feminino</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label>Estado Civil</label>
                        <select class="form-control" name="estado-civil" id="estado-civil">
                            <option value="{{\App\Enums\EstadoCivil::NaoInformado}}">Não Informado</option>
                            <option value="{{\App\Enums\EstadoCivil::Solteiro}}">Solteiro(a)</option>
                            <option value="{{\App\Enums\EstadoCivil::Casado}}">Casado(a)</option>
                            <option value="{{\App\Enums\EstadoCivil::Divorciado}}">Divorciado(a)</option>
                            <option value="{{\App\Enums\EstadoCivil::Viuvo}}">Viúvo(a)</option>
                        </select>
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group col-sm-4">
					    <label>Raça/Cor</label>
					    <select class="form-control" name="raca-cor" id="raca-cor">
						    <option value="{{\App\Enums\RacaCor::NaoInformado}}">Não Informado</option>
						    <option value="{{\App\Enums\RacaCor::Branca}}">Branca</option>
						    <option value="{{\App\Enums\RacaCor::Preta}}">Preta</option>
                            <option value="{{\App\Enums\RacaCor::Amarela}}">Amarela</option>
                            <option value="{{\App\Enums\RacaCor::Parda}}">Parda</option>
					    </select>
                    </div>
                    <div class="form-group col-sm-4">
					    <label>Povos Tradicionais</label>
					    <select class="form-control" name="povo-tradicional" id="povo-tradicional">[
						    <option value="{{\App\Enums\PovoTradicional::NaoPertence}}">Não pertence</option>
					    	<option value="{{\App\Enums\PovoTradicional::Indigena}}">Indígena</option>
						    <option value="{{\App\Enums\PovoTradicional::Quilombola}}">Quilombola</option>
						    <option value="{{\App\Enums\PovoTradicional::Cigano}}">Cigano</option>
					    </select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label>Escolaridade</label>
                        <select class="form-control" name="escolaridade" id="escolaridade">[
                            <option value="{{\App\Enums\Escolaridade::NaoInformado}}">Não informado</option>
                            <option value="{{\App\Enums\Escolaridade::Analfabeto}}">Analfabeto(a)</option>
                            <option value="{{\App\Enums\Escolaridade::FundamentalIncompleto}}">Fundamental Incompleto</option>
                            <option value="{{\App\Enums\Escolaridade::FundamentalCompleto}}">Fundamental Completo</option>
                            <option value="{{\App\Enums\Escolaridade::MedioIncompleto}}">Médio Incompleto</option>
                            <option value="{{\App\Enums\Escolaridade::MedioCompleto}}">Médio Completo</option>
                            <option value="{{\App\Enums\Escolaridade::TecnicoIncompleto}}">Técnico Incompleto</option>
                            <option value="{{\App\Enums\Escolaridade::TecnicoCompleto}}">Técnico Completo</option>
                            <option value="{{\App\Enums\Escolaridade::SuperiorIncompleto}}">Superior Incompleto</option>
                            <option value="{{\App\Enums\Escolaridade::SuperiorCompleto}}">Superior Completo</option>
                            <option value="{{\App\Enums\Escolaridade::PosIncompleta}}">Pós Graduação Incompleta</option>
                            <option value="{{\App\Enums\Escolaridade::PosCompleta}}">Pós Graduação Completa</option>
                        </select>
                    </div>                    
                </div>
                <div class="row">
                    <div class="form-group col">
					    <label for="profissao">Profissão</label>
					    <input type="text" name="profissao" class="form-control" id="profissao">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
					    <label for="telefone">Telefone</label>
					    <input type="text" name="telefone" class="form-control" id="telefone">
                    </div>
                    <div class="form-group col-sm-4">
					    <label for="whats-app">Nº WhatsApp</label>
				        <input type="text" name="whats-app" class="form-control" id="whats-app">
                    </div>
                    <div class="form-group col-sm-4">
					    <label for="contato-emergencial">Contato Emergencial</label>
					    <input type="text" name="contato-emergencial" class="form-control" id="contato-emergencial">
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="cras" name="cras">
                            <label class="form-check-label" for="cras">Possui Cadastro no CRAS?</label>
                        </div>
                    </div>                    
                    
                </div>
                <div class="row">
                    <div class="form-group col">
					    <label for="cad-unico">Nº Cadastro Único</label>
					    <input type="text" name="cad-unico" class="form-control" id="cad-unico">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
					    <label for="medicamentos">Medicamentos</label>
                        <textarea name="medicamentos" class="form-control" id="medicamentos" rows="3" cols="30"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
					    <label for="alergias">Alergias</label>
                        <textarea name="alergias" class="form-control" id="alergias" rows="3" cols="30"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label>Como chegou até nós?</label>
                        <select class="form-control" name="descobriu-por" id="descobriu-por">[
                            <option value=0></option>
                            <option value=1>CRAS</option>
                            <option value=2>Instituição Pública</option>
                            <option value=3>Panfleto</option>
                            <option value=4>Cartaz</option>
                            <option value=5>Mídias Sociais</option>
                            <option value=6>Indicação</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label for="observacoes">Observações</label>
                        <textarea name="observacoes" class="form-control" id="observacoes" rows="3" cols="30"></textarea>
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

