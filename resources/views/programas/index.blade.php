@extends('layouts.app')
@section('content-app')

<a class="btn btn-primary" href="{{ url('programas/create') }}" >Criar programa</a>
<div class="table-responsive table-full-width">
    <table class="table table-hover">
        <thead>
    <br><tr>
            <th scope="col">Nome</th>
            <th scope="col">Objetivo</th>
            <th scope="col">Filial</th>
            <th></th>
        </tr>
        </thead>
        @foreach($programas as $programa)
            <tbody>
            <tr>
                <td>{{ $programa->nome }}</td>
                <td>{{ $programa->objetivo }}</td>
                <td>{{ $programa->filiais_id }}</td>
                <!-- <td><a class="btn btn-info" href="{{ route('programas/edit')}}">Editar</a></td> -->
                <!-- <td>
                    <form action="{{ route('programas/destroy', $usuario->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td> -->
            </tr>
            </tbody>
        @endforeach
    </table>
</div>

@endsection