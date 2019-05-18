@extends('layouts.app')
@section('content-app')

<div class="card shadow">
    <div class="card-header">
        <div class="align-baseline">   
            <a href="{{url('users/'.$user->id)}}" class="btn btn-circle"><i class="fas fa-chevron-circle-left"></i></a> 
            <h4 class="card-title">Editar: {{$user->name}}</h4>
        </div>
        
    </div>
    <div class="card-body">
        <form action="{{url('users/'.$user->id)}}" method="post" onsubmit="return validaForm(this);">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="form-group col">
                    <label for="nome">Nome</label>
                    <input value="{{$user->name}}" type="text" class="form-control" name="name" onfocusout="validaInputNome(this)" placeholder="Nome do Usuário">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="local">Email</label>
                    <input value="{{$user->email}}" type="text" class="form-control" name="email" onfocusout="validaInputEmail(this)" placeholder="Email">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tipo">Tipo</label>
                    <select class="form-control" name="tipo" onfocusout="validaSelectTipo(this)" >
                        <option value="">-- Selecione o Tipo de Usuário --</option>
                        @foreach(App\Enums\UserType::list() as $tipo)
                            <option {{$user->tipo == $tipo ? 'selected' : ''}} value="{{$tipo}}">{{App\Enums\UserType::getDescription($tipo)}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="filial">Filial</label>
                    <select class="form-control" name="filial" onfocusout="validaSelectFilial(this)" >
                        <option value="">-- Selecione a Filial --</option>
                        @foreach($filiais as $filial)
                            <option {{$user->id_filiais == $filial->id ? 'selected' : ''}} value="{{$filial->id}}">{{$filial->nome}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ url('users/'.$user->id)}}" class="btn btn-primary">Voltar</a>            
        </form>
    </div>
</div>

@endsection

@section('script')
<script>
    const invalid = 'is-invalid';

    function validaInputNome (input) {
        if (input.value <= 0) {
            input.classList.add(invalid);     
            return false;       
        }
        else {
            input.classList.remove(invalid);
            return true;
        }
    }

    function validaInputEmail (input) {
        if (input.value <= 0) {
            input.classList.add(invalid);     
            return false;       
        }
        else {
            input.classList.remove(invalid);
            return true;
        }
    }

    function validaSelectTipo (select) {
        if (select.value == "") {
            select.classList.add(invalid);
            return false;
        }
        else {
            select.classList.remove(invalid);
            return true;
        }
    }

    function validaInputPassword (input) {
        var inputPasswordConfirm = document.getElementById('password-confirm');
        
        if (input.value == "") {
            input.classList.add(invalid);
            return false;
        }
        else if(inputPasswordConfirm.value != "" && inputPasswordConfirm.value !== input.value) {
            input.classList.add(invalid);
            return false;
        }
        else {
            input.classList.remove(invalid);
            return true;
        }
    }

    function validaInputPasswordConfirm (input) {
        var inputPassword = document.getElementById('password');
        
        if (input.value == "") {
            input.classList.add(invalid);
            return false;
        }
        else if(inputPassword.value !== input.value) {
            input.classList.add(invalid);
            return false;
        }
        else {
            input.classList.remove(invalid);
            return true;
        }
    }

    function validaSelectFilial (select) {
        if (select.value == "") {
            select.classList.add(invalid);
            return false;
        }
        else {
            select.classList.remove(invalid);
            return true;
        }
    }
    

    function validaForm(form){
        let nomeOK = validaInputNome( form.elements.namedItem('name') );
        let emailOK = validaInputEmail(form.elements.namedItem('email'));
        let tipoOK = validaSelectTipo(form.elements.namedItem('tipo'));
        let filialOK = validaSelectFilial(form.elements.namedItem('filial'));
        let passwordOK = validaInputPassword( form.elements.namedItem('password') );
        let passwordConfirmOK = validaInputPasswordConfirm( form.elements.namedItem('password-confirm') );

        if ( nomeOK && emailOK && tipoOK && filialOK && passwordOK && passwordConfirmOK ){
            return true;
        }
        else {
            alert("Exitem campos inválidos. Verifique por favor!");
            return false;
        };
        
    }
</script>
@endsection