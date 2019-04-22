@extends('layouts.app')
@section('content-app')

@if(session('error'))
<div class="row">
    <div class="col">
        <div class="alert alert-danger alert-dismissible fade show">
                {{session('error')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>                       
        </div>
    </div>
</div>
@endif

<div class="card shadow">
    <div class="card-header card-header-space-between">
        <h4 class="m-0 font-weight-bold text-primary">
            Matricular Aluno - {{$oficina->nome}}
        </h4>
    </div>
    <div class="card-body">
        <form action="{{url('oficinas-projetos/'.$oficina->id.'/matriculas/')}}" method="post" onsubmit="return validaForm(this);">
            @csrf
            <div class="form-row">
                <div class="form-group col">
                    <label for="usuario">Usuário</label>
                    <select class="form-control" name="usuario" id="usuario" onfocusout="validaSelectUsuario(this)">
                        <option value="">-- Selecione o usuário --</option>
                        @foreach($usuarios as $usuario)
                            <option value="{{$usuario->id}}">{{$usuario->nome}}{{$usuario->cpf != null ? ' - Cpf '.$usuario->cpf : ''}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="turma">Turma</label>
                    <select class="form-control" name="turma" id="" onfocusout="validaSelectTurma(this)">
                        <option value="">-- Selecione a turma --</option>
                        @foreach($turmas as $turma)
                            <option value="{{$turma->id}}">{{$turma->nome()}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <button type="submit" class="btn btn-success">Matricular Aluno</button>
                    <a href="{{ url('oficinas-projetos/'.$oficina->id)}}" class="btn btn-warning">Cancelar</a>
                </div>
            </div>  
        </form>
        
        
    </div>
</div>

@endsection

@section('script')
<script>
    const invalid = 'is-invalid';

    function validaSelectUsuario(select) {
        if(select.value == "") {
            select.classList.add(invalid);
            return false;
        }
        else {
            select.classList.remove(invalid);
            return true;
        }
    }

    function validaSelectTurma(select) {
        if(select.value == "") {
            select.classList.add(invalid);
            return false;
        }
        else {
            select.classList.remove(invalid);
            return true;
        }
    }

    function validaForm(form){
        let usuarioOK = validaSelectUsuario( form.elements.namedItem('usuario') );
        let turmaOK = validaSelectTurma(form.elements.namedItem('turma'));

        if ( usuarioOK && turmaOK ){
            return true;
        }
        else {
            alert("Exitem campos inválidos. Verifique por favor!");
            return false;
        };
        
    }
    
</script>
@endsection