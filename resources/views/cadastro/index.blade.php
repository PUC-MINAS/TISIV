@extends('layouts.app')

@section('sidebar')
    @parent
@endsection

@section('topbar')
    @parent
@endsection

@section('content')
<div class="table-responsive table-full-width">
    <table class="table table-hover">
        <thead>
    <br><tr>
            <th scope="col">Nome</th>
            <th scope="col">Sexo</th>
            <th scope="col">Nascimento</th>
            <th scope="col">Cpf</th>
            <th scope="col">RG</th>
            <th scope="col">Estado Civil</th>
            <th scope="col">Escolaridade</th>
        </tr>
        </thead>
        @forelse ( $usuarios as $usuario )
            <tbody>
            <tr>
                <td>{{ $usuario->nome }}</td>
                <td>{{ $usuario->sexo}}</td>
                <td>{{ $usuario->dta_nasc->format('d/m/Y')}}</td>
                <td>{{ $usuario->cpf}}</td>
                <td>{{ $usuario->rg}}</td>
                <td>{{ \App\Enums\EstadoCivil::getDescription($usuario->estado_civil)}}</td>
                <td>{{ \App\Enums\Escolaridade::getDescription($usuario->escolaridade)}}</td>
            </tr>
            </tbody>
        @empty
        @endforelse
    </table>
</div>
@endsection
