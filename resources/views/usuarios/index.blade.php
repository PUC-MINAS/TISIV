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
