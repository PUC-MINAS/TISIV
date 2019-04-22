@extends('layouts.app')

@section('sidebar')
    @parent
@endsection

@section('topbar')
    @parent
@endsection

@section('content')
<div class="card shadow m-4">
    <div class="card-header card-header-space-between">
        <h4 class="m-0 font-weight-bold text-primary">Beneficiados</h4>
        <a href="{{url('usuarios/create')}}"  class="btn btn-primary">Cadastrar Beneficiado</a>
    </div>
    <div class="card-body" style="overflow: auto; white-space: nowrap;">
        <div class="table-responsive table-full-width">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Cpf</th>
                    <th scope="col">RG</th>
                    <th scope="col">Certidão de Nascimento</th>
                    <th scope="col">Estado Civil</th>
                    <th scope="col">Escolaridade</th>
                    <th scope="col">Profissão</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Número WhatsApp</th>
                    <th scope="col">Contato Emergencial</th>
                    <th scope="col">CRAS</th>
                    <th scope="col">Cadastro Único</th>
                    <th scope="col">Medicamentos</th>
                    <th scope="col">Alergias</th>
                    <th scope="col">Descobriu Por</th>
                    <th scope="col">Observações</th>
                    <th scope="col">Raça/Cor</th>
                    <th scope="col">Povos Tradicionais</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                @forelse ( $usuarios as $usuario )
                    <tbody>
                    <tr>
                        <td>{{ $usuario->nome }}</td>
                        <td>{{ $usuario->sexo}}</td>
                        <td>{{ $usuario->dta_nasc}}</td>
                        <td>{{ $usuario->cpf}}</td>
                        <td>{{ $usuario->rg}}</td>
                        <td>{{ $usuario->certidao_nasc}}</td>
                        <td>{{ \App\Enums\EstadoCivil::getDescription($usuario->estado_civil)}}</td>
                        <td>{{ \App\Enums\Escolaridade::getDescription($usuario->escolaridade)}}</td>
                        <td>{{ $usuario->profissao}}</td>
                        <td>{{ $usuario->telefone}}</td>
                        <td>{{ $usuario->num_wpp}}</td>
                        <td>{{ $usuario->contato_emerg}}</td>
                        <td>{{ ($usuario->cras == 1) ? 'Sim' : 'Não'}}</td>
                        <td>{{ $usuario->num_cad}}</td>
                        <td>{{ $usuario->medicamentos}}</td>
                        <td>{{ $usuario->alergias}}</td>
                        <td>{{ \App\Enums\FormaDivulgacao::getDescription($usuario->descobriu_por)}}</td>
                        <td>{{ $usuario->observacao}}</td>
                        <td>{{ \App\Enums\RacaCor::getDescription($usuario->raca_cor)}}</td>
                        <td>{{ \App\Enums\PovoTradicional::getDescription($usuario->povo_tradicional)}}</td>
                        <td>
                            &nbsp;
                            <form action="{{ route('endereco.index', $usuario->id) }}" method="GET">
                                @method('GET')
                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                    style="position: relative; bottom: 3.7vh"
                                    ><i class="fas fa-map-marked-alt"></i>
                                </button>
                            </form>
                        <td>
                            &nbsp;
                            <form action="{{ route('familia.index', $usuario->id) }}" method="GET">
                                @method('GET')
                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                    style="position: relative; bottom: 3.7vh"
                                    ><i class="fas fa-users"></i>
                                </button>
                            </form>
                        </td>
                        <td>
                            &nbsp;
                            <button
                                type="button"
                                class="btn btn-warning"
                                >Editar
                            </button>
                        </td>
                        <td>
                            &nbsp;
                            <button
                                type="button"
                                class="btn btn-danger"
                                ><i class="fas fa-trash"></i>
                            </button>
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
