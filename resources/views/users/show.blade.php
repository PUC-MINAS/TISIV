@extends('layouts.app')
@section('content-app')

<div class="card shadow">
    <div class="card-header">
        <div class="align-baseline">   
            <a href="{{url('users/')}}" class="btn btn-circle"><i class="fas fa-chevron-circle-left"></i></a> 
            <h4 class="card-title">Detalhes: {{$user->name}}</h4>
        </div>
        
    </div>
    <div class="card-body">
        <form>

            <div class="form-row">
                <div class="form-group col">
                    <label for="nome">Nome</label>
                    <input value="{{$user->name}}" disabled type="text" class="form-control" name="name" onfocusout="validaInputNome(this)" placeholder="Nome do Usuário">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="local">Email</label>
                    <input value="{{$user->email}}" disabled type="text" class="form-control" name="email" onfocusout="validaInputEmail(this)" placeholder="Email">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tipo">Tipo</label>
                    <select disabled class="form-control" name="tipo" onfocusout="validaSelectTipo(this)" >
                        <option checked value="{{$user->tipo}}">{{App\Enums\UserType::getDescription($user->tipo)}}</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="filial">Filial</label>
                    <select disabled class="form-control" name="filial" onfocusout="validaSelectFilial(this)" >
                        <option value="{{$user->getFilial()->id}}">{{$user->getFilial()->nome}}</option>
                    </select>
                </div>
            </div>
            
            <a href="{{url('users/'.$user->id.'/edit')}}" class="btn btn-success">Editar</a>
            <a href="{{ url('users')}}" class="btn btn-primary">Voltar</a>            
        </form>
    </div>
</div>

@endsection