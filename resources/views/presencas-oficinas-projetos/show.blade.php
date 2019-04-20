@extends('layouts.app')
@section('content-app')

<div class="card shadow">
    <div class="card-header card-header-space-between">
        <h4 class="m-0 font-weight-bold text-primary">
            Lista de Presenca {{$data}} - {{$turma->getOficina()->nome}} - Turma {{$turma->id}}
        </h4>
    </div>
    <div class="card-body">
        <div class="table-responsive table-full-width">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Presença</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Justificativa</th>
                    <th></th>
                </tr>
                </thead>
                @foreach($presencas as $presenca)
                    <tbody>
                    <tr>
                        <td>{{ $presenca->estevePresente ? 'Presente' : 'Faltou' }}</td>
                        <td>{{ $presenca->getMatricula()->getUsuario()->nome }}</td>
                        <td>{{ $presenca->justificativa }}</td>
                        <td>
                            @if($presenca->faltaSemJustificativa())
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal{{$presenca->id}}">
                                    Justificar
                                </button> 
                            @endif
                        </td>     
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
        <div class="row">
            <div class="col">
                <a class="btn btn-primary" href="{{ url('oficinas-projetos/'.$oficina->id.'/turmas/'.$turma->id.'/presencas/') }}">Voltar</a> 
            </div>
        </div>
    </div>
</div>

<!-- Modals -->
@foreach($presencas as $presenca)
    <div class="modal fade" id="modal{{$presenca->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Justificar Falta de "{{$presenca->getMatricula()->getUsuario()->nome}}"</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('oficinas-projetos/'.$oficina->id.'/turmas/'.$turma->id.'/presencas/'.$presenca->id.'/justificar')}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="justificativa">Justificativa</label>
                                <textarea class="form-control" name="justificativa" id="justificativa{{$presenca->id}}" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-primary" data-dismiss="modal" 
                            onclick="limparJustificativa('justificativa{{$presenca->id}}')">
                            Cancelar
                        </button>
                        
                        <button type="submit" class="btn btn-success">Salvar</button>
                        
                    </div>
                </form>                
                
            </div>
        </div>
    </div>
@endforeach



@endsection

@section('script')
<script>
    function limparJustificativa (id) {
        $input = document.getElementById(id);
        $input.value = "";
    }
</script>
@endsection