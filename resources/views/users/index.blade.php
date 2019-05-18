@extends('layouts.app')
@section('content-app')


<div class="card shadow">
    <div class="card-header card-header-space-between">
        <h4 class="card-title">Usuários do Sistema</h4>
        <a class="btn btn-primary" href="{{ url('users/create') }}" >Novo Usuário</a>
    </div>
    <div class="card-body">
        <div class="table-responsive table-full-width">
            <table class="table table-hover table-sm">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Filial</th>
                    <th scope="col">Tipo</th>
                    <th></th>
                </tr>
                </thead>
                @foreach($users as $user)
                    <tbody>
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->getFilial()->nome }}</td>
                        <td>{{ $user->getTipo() }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ url('users/'.$user->id) }}" >Detalhes</a>                    
                        </td>     
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>


@endsection