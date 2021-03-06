@extends('layouts.app')
@section('content-app')

<div class="card shadow">
    <div class="card-header card-header-space-between">
        <h4 class="card-title">Programas</h4>
        <a class="btn btn-primary" href="{{ url('programas/create') }}" >Criar Programa</a>
    </div>
    <div class="card-body">
    <form action="{{url('programas')}}" method="get" class="mb-4">
        <div class="form-row">
            <div class="form-group col-md-5">
                <input type="text" name="programa_search" class="form-control" value="{{$search}}"/>
            </div>
            <div class="form-group col-md-5">
                <select class="form-control" name="filial_search">
                    <option value="">Selecione uma filial</option>
                    @foreach($filiais as $filial)
                        <option {{$idFilial == $filial->id ? 'selected' : ''}} value="{{ $filial->id }}">{{$filial->nome}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2">
                <button type="submit" class="btn btn-primary form-control">Pesquisar</button>
            </div>
        </div>
        
    </form>
    <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Objetivo</th>
                    <th scope="col">Filial</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                @foreach($programas as $programa)
                    <tbody>
                    <tr>
                        <td>{{ $programa->nome }}</td>
                        <td>{{ $programa->objetivo }}</td>                
                        <td>{{ $programa->getFilial()->nome }}</td>
                        <td>
                            <a class="btn btn-success" href="{{ url('programas/editar', $programa->id) }}" >Editar</a>                    
                        </td>
                        <td>
                            <form action="{{ route('deletarPrograma', $programa->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>   
                    </tr>
                    </tbody>
                @endforeach
            </table>
    </div>
</div>

<!-- <a class="btn btn-primary" href="{{ url('programas/create') }}" >Criar programa</a>
<div>
    <form action="/programas/" method="get">
        <div class="form-group">
            <div class="col-md-4">
                <input type="text" name="programa_search" class="form-control" />
            </div>
            <div class="form-group col-md-4">
                <select class="form-control" name="filial_search">
                    <option value="">Selecione uma filial</option>
                    @foreach($filiais as $filial)
                        <option value="{{ $filial->id }}">{{$filial->nome}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
    </form>
</div>
<div class="table-responsive table-full-width">
    <table class="table table-hover">
        <thead>
    <br><tr>
            <th scope="col">Nome</th>
            <th scope="col">Objetivo</th>
            <th scope="col">Filial</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        @foreach($programas as $programa)
            <tbody>
            <tr>
                <td>{{ $programa->nome }}</td>
                <td>{{ $programa->objetivo }}</td>                
                <td>{{ $programa->getFilial()->nome }}</td>
                <td>
                    <a class="btn btn-success" href="{{ url('programas/editar', $programa->id) }}" >Editar</a>                    
                </td>
                <td>
                    <form action="{{ route('deletarPrograma', $programa->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>        
            </tr>
            </tbody>
        @endforeach
    </table>
</div> -->

@endsection