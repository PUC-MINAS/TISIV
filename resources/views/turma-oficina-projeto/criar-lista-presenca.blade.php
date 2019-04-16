@extends('layouts.app')
@section('content-app')

<div class="card shadow">
    <div class="card-header">
        <h4 class="m-0 font-weight-bold text-primary">
            Criar Lista de Presença - {{$turma->getOficina()->nome}} - Turma {{$turma->id}}
        </h4>
    </div>
    <div class="card-body">
        <form action="{{url('projetos')}}" method="post" onsubmit="return validaForm(this);">
            @csrf
            <div class="form-group row">
                <label for="data" class="col-sm-2 col-form-label">Data</label>
                <div class="col-sm-10 col-md-6 col-lg-6">
                    <input type="date" class="form-control" id="data" name="data" value="{{date('Y-m-d')}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                <h5 class="font-weight-bold text-primary">Alunos</h5>
                @foreach($turma->getMatriculas() as $matricula)
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="check{{$matricula->id}}" name="{{$matricula->id}}">
                        <label class="custom-control-label" for="check{{$matricula->id}}">
                            {{$matricula->getUsuario()->nome}}
                        </label>
                    </div>                
                @endforeach 
                </div>
            
            </div>
            
            
        </form>
    </div>
</div>


@endsection

@section('script')
<script>
    
</script>
@endsection