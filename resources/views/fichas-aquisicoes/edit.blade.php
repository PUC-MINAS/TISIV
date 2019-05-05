@extends('layouts.app')
@section('content-app')

<div class="card shadow">
    <div class="card-header card-header-space-between">
        <div class="align-baseline">
            <a href="{{url('usuarios/'.$usuario->id.'/fichas-aquisicoes')}}" class="btn btn-circle"><i class="fas fa-chevron-circle-left"></i></a>
            <h4 class="card-title">
                {{$usuario->nome}} - Ficha de Aquisição
                <span class="badge badge-pill badge-success">Ficha Ativa</span>
            </h4>
        </div>
        
    </div>
    <div class="card-body">
        
        <form action="{{ url('usuarios/'.$usuario->id.'/fichas-aquisicoes/'.$ficha->id) }}" method="post">
        @csrf
        @method('put')
        <input type="hidden" name="ficha" value="{{$ficha->id}}">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="">Data de Criação</label>
                <input class="form-control" type="date" disabled value="{{ $ficha->data_criacao }}">
            </div>
            <div class="form-group col-md-6">
                <label for="">Valido Até</label>
                <input class="form-control" type="date" disabled value="{{ $ficha->valido_ate }}">
            </div>
        </div>
        <h5 class="mb-2 font-weight-bold text-primary">Indicadores do Usuário</h5>
            @foreach($ficha->getItensIndicadoresUsuarios() as $item)            
            <div class="custom-control custom-checkbox mb-1">
                <input type="checkbox" class="custom-control-input" id="aquisicao{{$item->getAquisicao()->id}}" 
                    name="aquisicao{{$item->getAquisicao()->id}}" {{ $item->atende ? 'checked' : '' }} >
                <label class="custom-control-label" for="aquisicao{{$item->getAquisicao()->id}}">{{$item->getAquisicao()->nome}}</label>
            </div>
            @endforeach

        <h5 class="mb-2 mt-3 font-weight-bold text-primary">Indicadores da Família</h5>
            @foreach($ficha->getItensIndicadoresFamiliares() as $item)            
            <div class="custom-control custom-checkbox mb-1">
                <input type="checkbox" class="custom-control-input" id="aquisicao{{$item->getAquisicao()->id}}" 
                    name="aquisicao{{$item->getAquisicao()->id}}" {{ $item->atende ? 'checked' : '' }} >
                <label class="custom-control-label" for="aquisicao{{$item->getAquisicao()->id}}">{{$item->getAquisicao()->nome}}</label>
            </div>
            @endforeach
            <div class="row mt-5">
                <div class="col">
                    <button type="submit" class="btn btn-success">Salvar</button>
                    <a href="{{url('usuarios/'.$usuario->id.'/fichas-aquisicoes/')}}" class="btn btn-primary">Voltar</a>
                </div>
            </div>
            
        </form>
    </div>
</div>

@endsection