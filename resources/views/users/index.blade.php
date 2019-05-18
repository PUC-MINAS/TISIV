@extends('layouts.app')
@section('content-app')


<div class="card shadow">
    <div class="card-header card-header-space-between">
        <h4 class="card-title">Usuários do Sistema</h4>
        <a class="btn btn-primary" href="{{ url('users/create') }}" >Novo Usuário</a>
    </div>
    <div class="card-body">
        <form action="{{url('users')}}" method="get" class="mb-4">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" name="user_search" class="form-control" value="{{$user_search}}" placeholder="Pesquisar"/>
                </div>
                <div class="form-group col-md-4">
                    <select class="form-control" name="filial_search" placeholder="Filiais">
                        <option value="">Filtrar por filial</option>
                        @foreach($filiais as $filial)
                            <option {{$filial_search == $filial->id ? 'selected' : ''}} value="{{ $filial->id }}">{{$filial->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <select class="form-control" name="tipo_search" placeholder="Tipo">
                        <option value="">Filtrar por tipo</option>
                        @foreach(App\Enums\UserType::list() as $tipo)
                            <option {{$tipo_search != null && $tipo_search == $tipo ? 'selected' : ''}} value="{{$tipo}}">{{App\Enums\UserType::getDescription($tipo)}}</option>
                        @endforeach
                    </select>
                </div>                
            </div>
            <div class="form-row">
                <div class="form-group col-md-2 col-sm-3">
                    <button type="submit" class="btn btn-primary form-control">Pesquisar</button>
                </div>
            </div>
            
        </form>
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