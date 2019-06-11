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
        <h4 class="card-title">Buscas Ativas</h4>
    </div>
    <div class="card-body" style="overflow: auto; white-space: nowrap;">
        @for ($i = 0; $i < $tamanho; $i++)
            <div class="card" style="overflow: auto; white-space: nowrap;">
                <div class="card-body">
                    <h5 class="card-title">{{ $beneficiados[$i]->nome }}</h5>
                    <br>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Responsável: {{ Auth::user()->name }}</li>
                        <li class="list-group-item">Data de início: {{ $dadosBA[$i]->data_inicio }}</li>
                        <li class="list-group-item">Data de conclusão: {{ $dadosBA[$i]->data_conclusao }}</li>
                    </ul>
                    <br>
                    <form action="{{url('busca-ativa/concluir')}}" method="post" class="form">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Observação</label>
                                    <input type="text" name="observacao" id="observacao" class="form-control">
                                    <input type="hidden" name="idBusca" id="idBusca" value="{{ $dadosBA[$i]->id }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Concluir busca ativa</button>
                    </form>
                </div>
            </div>
            <br>
        @endfor
    </div>
</div>
@endsection
