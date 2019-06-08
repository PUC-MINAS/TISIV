@extends('layouts.app')

@section('sidebar')
    @parent
@endsection

@section('topbar')
    @parent
@endsection

@section('content-app')

<div class="card shadow">
    <div class="card-header card-header-space-between">
        <h4 class="card-title">Beneficiados</h4>
        <a href="{{url('usuarios/create')}}"  class="btn btn-primary">Cadastrar Beneficiado</a>
    </div>
    <div class="card-body" style="overflow: auto; white-space: nowrap;">
    <!-- PESQUISA DE USUÁRIO -->
        <form action="{{url('usuarios')}}" method="get" class="mb-4">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Idade</label>
                    <input type="number" max="150" name="idade_search" class="form-control" value=""/>
                </div>
                <div class="form-group col-md-4">                    
                    <label>Sexo</label>
                    <select class="form-control" name="sexo_search">
                        <option value=""></option>
                        <option value="{{\App\Enums\Sexo::NaoInformado}}">Não Informado</option>
                        <option value="{{\App\Enums\Sexo::Masculino}}">Masculino</option>
                        <option value="{{\App\Enums\Sexo::Feminino}}">Feminino</option>
                    </select>
                </div>     
                <div class="form-group col-md-4">                    
                    <label>Raça/Cor</label>
                    <select class="form-control" name="raca_search">
                        <option value=""></option>
                        <option value="{{\App\Enums\RacaCor::NaoInformado}}">Não Informado</option>
                        <option value="{{\App\Enums\RacaCor::Branca}}">Branca</option>
                        <option value="{{\App\Enums\RacaCor::Preta}}">Preta</option>
                        <option value="{{\App\Enums\RacaCor::Amarela}}">Amarela</option>
                        <option value="{{\App\Enums\RacaCor::Parda}}">Parda</option>
                    </select>
                </div>           
            </div>                
            <div class="form-row">
                <div class="form-group col-md-4">                    
                    <label>Escolaridade</label>
                    <select class="form-control" name="escolaridade_search">
                        <option value=""></option>
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
                <div class="form-group col-md-4">                    
                    <label>Grupo familiar</label>
                    <select class="form-control" name="familia_search">
                        <option value=""></option>
                        <option value="1,2">1 a 2 membros</option>
                        <option value="3,5">3 a 5 membros</option>
                        <option value="6,9">6 a 9 membros</option>
                        <option value="10,50">mais de 10 membros</option>                        
                    </select>
                </div>       
            </div>
            <div class="form-group col-md-2">
                <button type="submit" class="btn btn-primary form-control">Pesquisar</button>
            </div>       
        </form>
    <!-- FIM PESQUISA -->
        <div class="table-responsive table-full-width">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Cpf</th>
                    <th scope="col">RG</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Número WhatsApp</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                @forelse ( $usuarios as $usuario )
                    <tbody>
                    <tr>
                        <td>{{ $usuario->nome }}</td>
                        <td>{{ $usuario->getSexo()}}</td>
                        <td>{{ $usuario->dta_nasc}}</td>
                        <td>{{ $usuario->cpf}}</td>
                        <td>{{ $usuario->rg}}</td>
                        <td>{{ $usuario->telefone}}</td>
                        <td>{{ $usuario->num_wpp}}</td>
                        <td>
                            <a href="{{ url('usuarios/'.$usuario->id) }}" class="btn btn-primary">Detalhes</a>
                        </td>
                    </tr>
                    </tbody>
                @empty
                @endforelse
            </table>
        </div>
    </div>
</div>
@endsection
