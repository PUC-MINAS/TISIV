@extends('layouts.app')
@section('content-app')

<div class="card shadow">
    <div class="card-header card-header-space-between">
        <h4 class="m-0 font-weight-bold text-primary">
            Aluno - {{$matricula->getUsuario()->nome}}
        </h4>
    </div>
    <div class="card-body">
        <form >
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="usuario">Usuário</label>
                    <select readonly class="form-control" name="usuario" id="usuario">
                        <option value="">
                            {{$matricula->getUsuario()->nome}}
                            {{$matricula->getUsuario()->cpf != null ? ' - Cpf '.$matricula->getUsuario()->cpf : ''}}
                        </option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Data da Matrícula</label>
                    <input type="date" class="form-control" readonly value="{{$matricula->data_matricula}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="turma">Turma</label>
                    <select readonly class="form-control" name="turma" id="" onfocusout="validaSelectTurma(this)">
                        <option value="">{{$matricula->getTurma()->nome()}}</option>
                    </select>
                </div>
            </div>
            @if($matricula->desistente)
            <div class="row">
                <div class="col">
                    <div class="card bg-danger text-white shadow">
                        <div class="card-body">
                            Aluno Desistente
                            <div class="text-white-50 small">
                                Data desistência {{$matricula->data_desistencia}}
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
            @endif
            @if($matricula->concluiu)
            <div class="row">
                <div class="col">
                    <div class="card bg-success text-white shadow">
                        <div class="card-body">
                            Aluno Concluiu a oficina
                            <div class="text-white-50 small">
                                Data conclusão {{$matricula->data_conclusao}}
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
            @endif
        </form>
        <div class="row mt-5">
            <div class="col">
                <div class="dropdown" style="display: inline-block">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Ações
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#concluirModal" >Marcar conclusão</button>
                        <button type="button" class="dropdown-item" data-toggle="modal" data-target="#desistirModal" >Marcar desistência</button>
                    </div>
                </div>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletarModal">
                    Deletar
                </button>
                <a href="{{ url('oficinas-projetos/'.$oficina->id.'/turmas/'.$matricula->getTurma()->id)}}" class="btn btn-primary">Voltar</a>
            </div>
        </div>  
        
    </div>
</div>

<!-- Modals -->
<div class="modal fade" id="deletarModal" tabindex="-1" role="dialog" aria-labelledby="deletarModalLable" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deletar matrícula de "{{$matricula->getUsuario()->nome}}"</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseja realmente deletar a matrícula de "{{$matricula->getUsuario()->nome}}" na {{$matricula->getTurma()->nome()}}
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <form action="{{url('/oficinas-projetos/'.$oficina->id.'/turmas/'.$matricula->getTurma()->id.'/matriculas/'.$matricula->id)}}" method="post">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="concluirModal" tabindex="-1" role="dialog" aria-labelledby="concluirModalLable" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="concluirModalLable">Marcar conclusão Oficina</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseja marcar a conclusão da oficina para "{{$matricula->getUsuario()->nome}}"
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <form action="{{url('/oficinas-projetos/'.$oficina->id.'/turmas/'.$matricula->getTurma()->id.'/matriculas/'.$matricula->id.'/concluir')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-success">Concluir</button>
        </form>
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="desistirModal" tabindex="-1" role="dialog" aria-labelledby="desistirModalLable" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="desistirModalLable">Marcar desistência da Oficina</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseja informar a desistência do aluno "{{$matricula->getUsuario()->nome}}" da oficina?
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <form action="{{url('/oficinas-projetos/'.$oficina->id.'/turmas/'.$matricula->getTurma()->id.'/matriculas/'.$matricula->id.'/desistir')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">Informar Desistência</button>
        </form>
        
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
<script>
    
</script>
@endsection