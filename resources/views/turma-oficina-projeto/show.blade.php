@extends('layouts.app')
@section('content-app')
<div class="card shadow">
    <div class="card-header"><h4 class="m-0 font-weight-bold text-primary">Detalhes: Turma {{$turma->id}}</h4></div>
    <div class="card-body">
        <form>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="oficina">Oficina</label>
                    <input type="text" class="form-control" name="oficina" value="{{$turma->id_oficinas_projetos}}" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="educador">Educador</label>
                    <input type="text" class="form-control" name="educador" value="{{$turma->educador}}" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="horario">Horário</label>
                    <input type="text" class="form-control" name="horario" value="{{$turma->horario}}" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inicio">Máximo alunos</label>
                    <input class="form-control" type="text" name="inicio" value="{{$turma->maximoAlunos}}" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="fim">Idade mínima</label>
                    <input class="form-control" type="text" name="idadeMinima" value="{{$turma->idadeMinima}}" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="fim">Idade máxima</label>
                    <input class="form-control" type="text" name="idadeMaxima" value="{{$turma->idadeMaxima}}" readonly>
                </div>
            </div>
            <a href="{{ url('turma-oficina-projeto/'.$turma->id.'/edit')}}" class="btn btn-success">Editar</a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                Deletar
            </button>
            <a href="{{ url('turma-oficina-projeto')}}" class="btn btn-primary">Voltar</a>
            
            
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deletar "{{$turma->id}}"</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseja realmente deletar a turma "{{$turma->id}}?"
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <form action="{{url('/turma-oficina-projeto/'.$turma->id)}}" method="post">
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