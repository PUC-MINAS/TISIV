@extends('layouts.app')
@section('content-app')

<div class="card shadow mb-4">
    <div class="card-header card-header-space-between">
        <h4 class="m-0 font-weight-bold text-primary">Detalhes: {{$oficina->nome}}</h4>
        <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                <!-- <div class="dropdown-header">Dropdown Header:</div> -->
                <a class="dropdown-item" href="{{url('oficinas-projetos/'.$oficina->id.'/matriculas/create')}}">Matricular Aluno</a>
                <!-- <a class="dropdown-item" href="#">Turmas</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a> -->
            </div>
        </div>
    </div>
    <div class="card-body">
        <form>
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" name="nome" value="{{$oficina->nome}}" readonly>
                </div>
                <div class="form-group col-md-4">
                    <label for="projeto">Projeto</label>
                    <select class="form-control" name="projeto" readonly >
                        <option value="">-- Selecione o Projeto --</option>
                        <option selected value="{{$oficina->getProjeto()->id}}">{{$oficina->getProjeto()->nome}}</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="local">Local</label>
                    <input type="text" class="form-control" name="local" value="{{$oficina->local}}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cargaHoraria">Carga Horária</label>
                            <input type="number" class="form-control" name="cargaHoraria" value="{{$oficina->cargaHoraria}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="percentualMinimoFrequencia">Frequência Mínima %</label>
                            <input type="number" class="form-control" name="percentualMinimoFrequencia" value="{{$oficina->percentualMinimoFrequencia}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inicio">Início</label>
                            <input type="date" class="form-control" name="inicio" value="{{$oficina->inicio}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fim">Fim</label>
                            <input type="date" class="form-control" name="fim" value="{{$oficina->fim}}" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="ementa">Ementa da Oficina</label>
                    <textarea name="ementa" class="form-control" cols="30" rows="10" readonly>{{$oficina->ementa}}</textarea>
                </div>
            </div>
            
            <a href="{{ url('oficinas-projetos/'.$oficina->id.'/edit')}}" class="btn btn-success">Editar</a>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                Deletar
            </button>
            <a href="{{ url('oficinas-projetos')}}" class="btn btn-primary">Voltar</a>           
        </form>
    </div>
</div>

<div class="card shadow">
    <div class="card-header card-header-space-between">
        <h4 class="m-0 font-weight-bold text-primary">Turmas</h4>
        <a class="btn btn-primary" href="{{ url('oficinas-projetos/'.$oficina->id.'/turmas/create') }}" >Criar Turma</a>
    </div>
    <div class="card-body">
        <div class="table-responsive table-full-width">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Turma</th>
                    <th scope="col">Educador</th>
                    <th scope="col">Horário</th>
                    <th scope="col">Máximo de alunos</th>
                    <th scope="col">Idade mínima</th>
                    <th scope="col">Idade máxima</th>                    
                    <th></th>
                </tr>
                </thead>
                @foreach($oficina->getTurma() as $turma)
                    <tbody>
                    <tr>
                        <td>{{ $turma->nome() }}</td>
                        <td>{{ $turma->educador }}</td>
                        <td>{{ $turma->horario }}</td>
                        <td>{{ $turma->maximoAlunos }}</td>
                        <td>{{ $turma->idadeMinima }}</td>
                        <td>{{ $turma->idadeMaxima }}</td>                    
                        <td>
                            <a class="btn btn-primary" href="{{ url('oficinas-projetos/'.$oficina->id.'/turmas/'.$turma->id) }}" >Detalhes</a>                    
                        </td>     
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deletar "{{$oficina->nome}}"</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseja realmente deletar a oficina "{{$oficina->nome}}"
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <form action="{{url('/oficinas-projetos/'.$oficina->id)}}" method="post">
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