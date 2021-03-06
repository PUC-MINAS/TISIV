@extends('layouts.app')

@section('sidebar')
    @parent
@endsection

@section('topbar')
    @parent
@endsection

@section('content-app')

<div class="card">
    <div class="card-header">
        <div class="align-baseline">
            <a href="{{url('usuarios/'.$usuario->id)}}" class="btn btn-circle"><i class="fas fa-chevron-circle-left"></i></a>
            <h4 class="card-title" style="display: inline">Editar: {{$usuario->nome}}</h4>
        </div>
    </div>
    <div class="card-body">
        <form action="{{url('usuarios/'.$usuario->id)}}" method="post">
            @csrf
            @method('put')
            <h5>Informações Pessoais</h5>
            <div class="row">
                <div class="form-group col">
                    <label for="nome-completo">Nome Completo</label>
                    <input type="text" name="nome-completo" class="form-control" id="nome-completo" value="{{$usuario->nome}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-4">
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" class="form-control" id="cpf" value="{{$usuario->cpf}}">
                </div>
                <div class="form-group col-sm-4">
                    <label for="rg">RG</label>
                    <input type="text" name="rg" class="form-control" id="rg" value="{{$usuario->rg}}">
                </div>
                <div class="form-group col-sm-4">
                    <label for="certidao-nasc">Nº Certidão de Nascimento</label>
                    <input type="text" name="certidao-nasc" class="form-control" id="certidao-nasc" value="{{$usuario->certidao_nasc}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-4">
                    <label>Data de Nascimento</label>
                    <input type="date" name="dta_nasc" id="dta_nasc" class="form-control" value="{{$usuario->dta_nasc}}">
                </div>
                <div class="form-group col-sm-4">
                    <label>Sexo</label>
                    <select class="form-control" name="sexo" id="sexo">
                        @foreach(\App\Enums\Sexo::list() as $sexo)
                            <option value="{{$sexo}}" {{$usuario->sexo == $sexo ? 'selected' : ''}} >{{\App\Enums\Sexo::getDescription($sexo)}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label>Estado Civil</label>
                    <select class="form-control" name="estado-civil" id="estado-civil">
                        @foreach(\App\Enums\EstadoCivil::list() as $estadoCivil)
                            <option value="{{$estadoCivil}}" {{$usuario->estado_civil == $estadoCivil ? 'selected' : ''}} >{{\App\Enums\EstadoCivil::getDescription($estadoCivil)}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row ">
                <div class="form-group col-sm-4">
                    <label>Raça/Cor</label>
                    <select class="form-control" name="raca-cor" id="raca-cor">
                        @foreach(\App\Enums\RacaCor::list() as $raca)
                            <option value="{{$raca}}" {{$usuario->raca_cor == $raca ? 'selected' : ''}}>{{\App\Enums\RacaCor::getDescription($raca)}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label>Povos Tradicionais</label>
                    <select class="form-control" name="povo-tradicional" id="povo-tradicional">
                        @foreach(\App\Enums\PovoTradicional::list() as $povo)
                            <option value="{{$povo}}" {{$usuario->povo_tradicional == $povo ? 'selected' : ''}}>{{\App\Enums\PovoTradicional::getDescription($povo)}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label>Escolaridade</label>
                    <select class="form-control" name="escolaridade" id="escolaridade">
                        @foreach(\App\Enums\Escolaridade::list() as $escolaridade)
                            <option value="{{$escolaridade}}" {{$usuario->escolaridade == $escolaridade ? 'selected' : ''}}>{{\App\Enums\Escolaridade::getDescription($escolaridade)}}</option>
                        @endforeach
                    </select>
                </div>                    
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="profissao">Profissão</label>
                    <input type="text" name="profissao" class="form-control" id="profissao" value="{{$usuario->profissao}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-4">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="telefone" class="form-control" id="telefone" value="{{$usuario->telefone}}">
                </div>
                <div class="form-group col-sm-4">
                    <label for="whats-app">Nº WhatsApp</label>
                    <input type="text" name="whats-app" class="form-control" id="whats-app" value="{{$usuario->num_wpp}}">
                </div>
                <div class="form-group col-sm-4">
                    <label for="contato-emergencial">Contato Emergencial</label>
                    <input type="text" name="contato-emergencial" class="form-control" id="contato-emergencial" value="{{$usuario->contato_emerg}}">
                </div>
                
            </div>
            <h5 class="mt-5">Endereço</h5>
            <div class="row">
                <div class="form-group col-sm-9">
                    <label for="logadouro">Endereço</label>
                    <input type="text" name="logadouro" class="form-control" value="{{$endereco != null ? $endereco->logadouro : ''}}">
                </div>
                <div class="form-group col-sm-3">
                    <label for="numero">Número</label>
                    <input type="text" name="numero" class="form-control" value="{{ $endereco != null ? $endereco->numero : ''}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-6">
                    <label for="complemento">Complemento</label>
                    <input type="text" name="complemento" class="form-control" value="{{ $endereco != null ? $endereco->complemento : ''}}">
                </div>
                <div class="form-group col-sm-6">
                    <label for="bairro">Bairro</label>
                    <input type="text" name="bairro" class="form-control" value="{{ $endereco != null ? $endereco->bairro : ''}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-sm-4">
                    <label for="cep">CEP</label>
                    <input type="text" name="cep" class="form-control" value="{{ $endereco != null ? $endereco->cep : ''}}">
                </div>
                <div class="form-group col-sm-5">
                    <label for="cidade">Cidade</label>
                    <input type="text" name="cidade" class="form-control" value="{{ $endereco != null ? $endereco->cidade : ''}}">
                </div>
                <div class="form-group col-sm-3">
                    <label for="uf">Estado</label>
                    <select name="uf" id="uf" class="form-control">
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
                        <input {{$usuario->cras ? 'checked' : ''}} type="checkbox" class="custom-control-input" id="cras" name="cras">
                        <label class="custom-control-label" for="cras">Possui Cadastro no CRAS?</label>
                    </div>
                </div>                
                
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="cad-unico">Nº Cadastro Único</label>
                    <input type="text" name="cad-unico" class="form-control" id="cad-unico" value="{{$usuario->num_cad}}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="medicamentos">Medicamentos</label>
                    <textarea name="medicamentos" class="form-control" id="medicamentos" rows="3" cols="30">{{$usuario->medicamentos}}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="alergias">Alergias</label>
                    <textarea name="alergias" class="form-control" id="alergias" rows="3" cols="30">{{$usuario->alergias}}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label>Como chegou até nós?</label>
                    <select class="form-control" name="descobriu-por" id="descobriu-por">
                        @foreach(\App\Enums\FormaDivulgacao::list() as $divulgacao)
                            <option value="{{$divulgacao}}" {{$usuario->descobriu_por == $divulgacao ? 'selected' : ''}}>{{\App\Enums\FormaDivulgacao::getDescription($divulgacao)}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label for="observacoes">Observações</label>
                    <textarea name="observacoes" class="form-control" id="observacoes" rows="3" cols="30">{{$usuario->observacao}}</textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <a href="{{url('usuarios')}}" class="btn btn-primary">Voltar</a>
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>                    
            </div>
        </form>

    </div>
</div>


@endsection

