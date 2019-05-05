@extends('layouts.app')

@section('sidebar')
    @parent
@endsection

@section('topbar')
    @parent
@endsection

@section('content-app')

<div class="card shadow">
    <div class="card-header card-header-space-between">
        <div class="align-baseline">
            <a href="{{url('usuarios/'.$usuario->id)}}" class="btn btn-circle"><i class="fas fa-chevron-circle-left"></i></a>
            <h4 class="card-title">Familiares</h4>
        </div>
        <a href="{{url('usuarios/'.$usuario->id.'/familiares/create')}}"  class="btn btn-primary">Cadastrar Familiar</a>
    </div>
    <div class="card-body">
        <div class="table-responsive table-full-width">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Parentesco</th>
                    <th scope="col">Data Nascimento</th>
                    <th scope="col">Profissão</th>                   
                    <th></th>
                </tr>
                </thead>
                @foreach($familiares as $familiar)
                    <tbody>
                    <tr>
                        <td>{{ $familiar->nome }}</td>
                        <td>{{\App\Enums\Parentesco::getDescription($familiar->parentesco) }}</td>
                        <td>{{ $familiar->dta_nasc }}</td>
                        <td>{{ $familiar->profissao }}</td>                 
                        <td>
                            <a class="btn btn-primary" href="{{ url('usuarios/'.$usuario->id.'/familiares/'.$familiar->id) }}" >Detalhes</a>                    
                        </td>     
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
