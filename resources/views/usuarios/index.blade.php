@extends('layouts.app')

@section('sidebar')
    @parent
@endsection

@section('topbar')
    @parent
@endsection

@section('content')
@if(session('success'))
<div class="row">
    <div class="col">
        <div class="alert alert-danger alert-dismissible fade show">
                {{session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>                       
        </div>
    </div>
</div>
@endif
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
                        <!-- <td>
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
                            <a href="{{ url('usuarios/'.$usuario->id.'/fichas-aquisicoes') }}" class="btn btn-primary">
                                Fichas de Aquisições
                            </a>
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
                        </td> -->
                    </tr>
                    </tbody>
                @empty
                @endforelse
            </table>
        </div>
    </div>
</div>
@endsection
