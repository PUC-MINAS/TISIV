@extends('layouts.app')

@section('sidebar')
    @parent
@endsection

@section('topbar')
    @parent
@endsection

@section('content-app')


<div class="card shadow">
    <div class="card-header">
        <div class="align-baseline">
            <a href="{{url('usuarios/'.$usuario->id.'/familiares')}}" class="btn btn-circle"><i class="fas fa-chevron-circle-left"></i></a>
            <h4 class="card-title">Familiar: {{$familiar->nome}}</h4>
        </div>
    </div>
    <div class="card-body">
        <form>
            <div class="form-row">
                <div class="form-group col">
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome" disabled value="{{$familiar->nome}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="dta-nasc">Data de Nascimento</label>
                    <input type="date" name="dta-nasc" class="form-control" id="dta-nasc" disabled value="{{$familiar->dta_nasc}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="parentesco">Parentesco</label>
                    <select class="form-control" name="parentesco" id="parentesco" disabled>
                        <option value="{{$familiar->parentesco}}">{{\App\Enums\Parentesco::getDescription($familiar->parentesco)}}</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="profissao">Profissão</label>
                    <input type="text" name="profissao" id="profissao" class="form-control" disabled value="{{$familiar->profissao}}">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <a href="{{ url('usuarios/'.$usuario->id)}}" class="btn btn-primary">Voltar</a>
                    <a href="{{ url('usuarios/'.$usuario->id.'/familiares/'.$familiar->id.'/edit')}}" class="btn btn-success">Editar</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Deletar</button>
                </div>
            </div>               
            
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deletar familiar "{{$familiar->nome}}"</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseja realmente deletar o familiar "{{$familiar->nome}}"?
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <form action="{{url('/usuarios/'.$usuario->id.'/familiares/'.$familiar->id)}}" method="post">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
        
      </div>
    </div>
  </div>
</div>

@endsection

