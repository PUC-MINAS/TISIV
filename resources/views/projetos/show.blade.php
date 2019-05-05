@extends('layouts.app')
@section('content-app')
<div class="card shadow">
    <div class="card-header">
        <div class="align-baseline">   
            <a href="{{url('projetos/')}}" class="btn btn-circle"><i class="fas fa-chevron-circle-left"></i></a> 
            <h4 class="card-title">Detalhes: {{$projeto->nome}}</h4>
        </div>
    </div>
    <div class="card-body">
        <form>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" value="{{$projeto->nome}}" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="programa">Programa</label>
                    <select class="form-control" name="programa" id="programa" readonly>
                        <option value="">-- Selecione um Programa --</option>   
                        <option selected value="{{ $projeto->getPrograma()->id }}">{{$projeto->getPrograma()->nome}}</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inicio">Início do Projeto</label>
                    <input id="inputDataInicio" class="form-control" type="date" name="inicio" value="{{$projeto->inicio}}" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="fim">Fim do Projeto</label>
                    <input class="form-control" type="date" name="fim" value="{{$projeto->fim}}" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="objetivo">Objetivo</label>
                    <textarea class="form-control" name="objetivo" id="objetivo" rows="5" readonly>{{$projeto->objetivo}}</textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" name="descricao" id="descricao" rows="5" readonly>{{$projeto->descricao}}</textarea>
                </div>
            </div>
            <a href="{{ url('projetos/'.$projeto->id.'/edit')}}" class="btn btn-success">Editar</a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                Deletar
            </button>
            <a href="{{ url('projetos')}}" class="btn btn-primary">Voltar</a>
            
            
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deletar "{{$projeto->nome}}"</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseja realmente deletar o projeto "{{$projeto->nome}}"
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <form action="{{url('/projetos/'.$projeto->id)}}" method="post">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
        
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')

@endsection