@extends('layouts.app')
@section('content-app')

<div class="card shadow">
    <div class="card-header">
        <h4 class="card-title">
            Criar Lista de Presença - {{$turma->getOficina()->nome}} - Turma {{$turma->id}}
        </h4>
        
    </div>
    <div class="card-body">
        <form action="{{url('oficinas-projetos/'.$oficina->id.'/turmas/'.$turma->id.'/presencas')}}" method="post" onsubmit="return validaForm(this);">
            @csrf
            <div class="form-group row">
                <label for="data" class="col-sm-2 col-form-label">Data</label>
                <div class="col-sm-10 col-md-6 col-lg-6">
                    <input type="date" class="form-control" id="data" name="data" value="{{date('Y-m-d')}}" onfocusout="validaInputData(this)">
                </div>
            </div>
            <div class="row">
                <div class="col">
                <h5 class="font-weight-bold text-primary">Alunos</h5>
                </div>                
            </div>

            <div class="row">
                <div class="col-md-4">
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
            <div class="row mt-5">
                <div class="col">
                    <button type="submit" class="btn btn-success">Criar lista</button>
                    <a href="{{ url('oficinas-projetos/'.$turma->getOficina()->id)}}" class="btn btn-warning">Cancelar</a>
                </div>
            </div>            
            
        </form>
    </div>
</div>


@endsection

@section('script')
<script>
    var app = @json($turma->getMatriculas());
    const invalid = 'is-invalid';

    function validaInputData (input) {
        if (input.value == "") {
            input.classList.add(invalid);
            return false;
        }
        else {
            input.classList.remove(invalid);
            return true;
        }
    }

    function validaForm(form){
        let dataOK = validaInputData(form.elements.namedItem('data'));

        if ( dataOK ){
            return true;
        }
        else {
            alert("Exitem campos inválidos. Verifique por favor!");
            return false;
        };
        
    }
    
</script>
@endsection