@extends('layouts.app')
@section('content-app')

<div class="card shadow">
    <div class="card-header">
        <div class="align-baseline">   
            <a href="{{url('home/')}}" class="btn btn-circle"><i class="fas fa-chevron-circle-left"></i></a> 
            <h4 class="card-title">Redefinir Senha</h4>
        </div>
        
    </div>
    <div class="card-body">
        <form action="{{url('redefinir-senha/'.$user->id)}}" method="post" onsubmit="return validaForm(this);">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="form-group col">
                    <label for="nome">Senha Atual</label>
                    <input minlength="4" type="password" class="form-control" name="senhaAtual" onfocusout="validaInputSenhaAtual(this)" placeholder="Senha Atual">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="local">Nova Senha</label>
                    <input minlength="4" id="password" type="password" class="form-control" name="senhaNova" onfocusout="validaInputSenhaNova(this)" placeholder="Nova Senha">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="password-confirm">Confirme a  Nova Senha</label>
                    <input minlength="4" id="password-confirm" type="password" class="form-control" name="password-confirm" onfocusout="validaInputPasswordConfirm(this)" placeholder="Confirme a Nova Senha">
                </div>
            </div>
            
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ url('home')}}" class="btn btn-primary">Voltar</a>            
        </form>
    </div>
</div>

@endsection

@section('script')
<script>
    const invalid = 'is-invalid';

    function validaInputSenhaAtual (input) {
        if (input.value <= 0) {
            input.classList.add(invalid);     
            return false;       
        }
        else {
            input.classList.remove(invalid);
            return true;
        }
    }

    function validaInputSenhaNova (input) {
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

    function validaForm(form){
        let senhaAtualOK = validaInputSenhaAtual( form.elements.namedItem('senhaAtual') );
        let senhaNovaOK = validaInputSenhaNova(form.elements.namedItem('senhaNova'));
        let passwordConfirmOK = validaInputPasswordConfirm( form.elements.namedItem('password-confirm') );

        if ( senhaAtualOK && senhaNovaOK && passwordConfirmOK ){
            return true;
        }
        else {
            alert("Exitem campos inválidos. Verifique por favor!");
            return false;
        };
        
    }
</script>
@endsection