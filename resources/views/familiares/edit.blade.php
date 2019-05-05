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
                <a href="{{url('usuarios/'.$usuario->id.'/familiares/'.$familiar->id)}}" class="btn btn-circle"><i class="fas fa-chevron-circle-left"></i></a>
                <h4 class="card-title">Editar: {{$familiar->nome}}</h4>
            </div>
		</div>
		<div class="card-body">
            <form method="POST" action="{{ url('usuarios/'.$usuario->id.'/familiares/'.$familiar->id) }}">
                @method('put')
                @csrf
                <div class="form-row">
                    <div class="form-group col">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" class="form-control" id="nome" value="{{$familiar->nome}}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="dta-nasc">Data de Nascimento</label>
                        <input type="date" name="dta-nasc" class="form-control" id="dta-nasc" value="{{$familiar->dta_nasc}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="parentesco">Parentesco</label>
                        <select class="form-control" name="parentesco" id="parentesco">
                        @foreach(\App\Enums\Parentesco::list() as $parentesco)
                            <option value={{$parentesco}} 
                                    {{$familiar->parentesco == $parentesco ? 'selected' : ''}}>
                                    {{\App\Enums\Parentesco::getDescription($parentesco)}}
                            </option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="profissao">Profissão</label>
                        <input type="text" name="profissao" id="profissao" class="form-control" value="{{$familiar->profissao}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="{{ url('usuarios/'.$usuario->id.'/familiares/'.$familiar->id)}}" class="btn btn-primary">Voltar</a>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </div>               
                
			</form>
		</div>
	</div>

@endsection

