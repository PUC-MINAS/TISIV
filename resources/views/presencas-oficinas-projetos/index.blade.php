@extends('layouts.app')
@section('content-app')

<div class="card shadow">
    <div class="card-header card-header-space-between">
        <h4 class="m-0 font-weight-bold text-primary">
            Listas de Presencas - {{$turma->getOficina()->nome}} - Turma {{$turma->id}}
        </h4>
        <a class="btn btn-primary" href="{{ url('oficinas-projetos/'.$oficina->id.'/turmas/'.$turma->id.'/presencas/create') }}" >
            Criar Lista
        </a>
    </div>
    <div class="card-body">
        <ul>
            @foreach($turma->getListasDePresencas() as $lista)
                <li>
                    <a class="btn btn-link" 
                       href="{{ url('oficinas-projetos/'.$oficina->id.'/turmas/'.$turma->id.'/presencas/'.$lista->data) }}">
                       Aula {{$lista->data}}
                    </a>
                </li>
            @endforeach
        </ul>
        <a href="{{ url('oficinas-projetos/'.$oficina->id.'/turmas/'.$turma->id)}}" class="btn btn-primary">Voltar</a>
    </div>
</div>

@endsection

@section('script')
<script>
    
</script>
@endsection