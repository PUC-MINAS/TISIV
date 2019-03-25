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
			<h4 class="card-title">Cadastrar Favorecido</h4>
		</div>
		<div class="card-body">

            <form method="POST" action="{{url('cadastro')}}">
                @csrf
				<div class="form-group">
					<label for="nome-completo">Nome Completo</label>
					<input type="text" name="nome-completo" class="form-control" id="nome-completo">
				</div>
				<div class="form-group">
					<label>Sexo</label>
					<select class="form-control" name="sexo" id="sexo">[
						<option></option>
						<option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Nao Informado">Prefere não informar</option>
					</select>
				</div>
                <div class="form-group">
					<label>Data de Nascimento</label>
					<input type="date" name="dta_nasc" id="dta_nasc" class="form-control">
				</div>
				<div class="form-group">
					<label for="cpf">CPF</label>
					<input type="text" name="cpf" class="form-control" id="cpf">
                </div>
                <div class="form-group">
					<label for="rg">RG</label>
					<input type="text" name="rg" class="form-control" id="rg">
                </div>
                <div class="form-group">
					<label for="certidao-nasc">Nº Certidão de Nascimento</label>
					<input type="text" name="certidao-nasc" class="form-control" id="certidao-nasc">
				</div>
				<div class="form-group">
					<label>Estado Civil</label>
					<select class="form-control" name="estado-civil" id="estado-civil">[
						<option value=0></option>
						<option value=1>Solteiro(a)</option>
                        <option value=2>Casado(a)</option>
                        <option value=3>Divorciado(a)</option>
                        <option value=4>Viúvo(a)</option>
					</select>
                </div>
                <div class="form-group">
					<label>Ecolaridade</label>
					<select class="form-control" name="escolaridade" id="escolaridade">[
						<option value=0></option>
                        <option value=1>Analfabeto(a)</option>
                        <option value=2>Fundamental Incompleto</option>
                        <option value=3>Fundamental Completo</option>
                        <option value=4>Médio Incompleto</option>
                        <option value=5>Médio Completo</option>
                        <option value=6>Técnico Incompleto</option>
                        <option value=7>Técnico Completo</option>
                        <option value=8>Superior Incompleto</option>
                        <option value=9>Superior Completo</option>
                        <option value=10>Pós Graduação Incompleta</option>
                        <option value=11>Pós Graduação Completa</option>
					</select>
                </div>
                <div class="form-group">
					<label for="profissao">Profissao</label>
					<input type="text" name="profissao" class="form-control" id="profissao">
                </div>
                <div class="form-group">
					<label for="telefone">Telefone</label>
					<input type="text" name="telefone" class="form-control" id="telefone">
                </div>
                <div class="form-group">
					<label for="whats-app">Nº WhatsApp</label>
					<input type="text" name="whats-app" class="form-control" id="whats-app">
                </div>
                <div class="form-group">
					<label for="contato-emergencial">Contato Emergencial</label>
					<input type="text" name="contato-emergencial" class="form-control" id="contato-emergencial">
                </div>
                <div class="form-group">
					<label for="cras">Possui Cadastro no CRAS?</label>
					<input type="checkbox" name="cras" class="form-control" value="true" id="cras">
                </div>
                <div class="form-group">
					<label for="cad-unico">Nº Cadastro Único</label>
					<input type="text" name="cad-unico" class="form-control" id="cad-unico">
                </div>
                <div class="form-group">
					<label for="medicamentos">Medicamentos</label>
					<input type="text" name="medicamentos" class="form-control" id="medicamentos">
                </div>
                <div class="form-group">
					<label for="alergias">Alergias</label>
					<input type="text" name="alergias" class="form-control" id="alergias">
                </div>
				<div class="form-group">
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
                <div class="form-group">
                    <label for="observacoes">Observações</label>
                    <textarea name="observacoes" class="form-control" id="observacoes" rows="3" cols="30"></textarea>
                </div>
                <div class="form-group">
					<label>Raça/Cor</label>
					<select class="form-control" name="raca-cor" id="raca-cor">[
						<option value=0></option>
						<option value=1>Branca</option>
						<option value=2>Preta</option>
                        <option value=3>Amarela</option>
                        <option value=4>Parda</option>
					</select>
                </div>
                <div class="form-group">
					<label>Povos Tradicionais</label>
					<select class="form-control" name="povo-tradicional" id="povo-tradicional">[
						<option value=0></option>
						<option value=1>Indígena</option>
						<option value=2>Quilombola</option>
						<option value=3>Cigano</option>
					</select>
                </div>
				<button type="submit" class="btn btn-success btn-fill">Cadastrar</button>
				<a href="{{url('cadastro')}}" class="btn btn-danger btn-fill">Cancelar</a>
			</form>

		</div>
	</div>
</div>

@endsection

