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
        <h4 class="card-title">Notificações de busca ativa</h4>
        <a href="{{ route('markAllAsRead') }}"  class="btn btn-primary">Marcar todas como lidas</a>
    </div>
    <div class="card-body" style="overflow: auto; white-space: nowrap;">
        @foreach ($beneficiados as $beneficiado)
            <div class="card" style="overflow: auto; white-space: nowrap;">
                <div class="card-body">
                    <h5 class="card-title">{{ $beneficiado->data['nome'] }}</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Telefone: {{ $beneficiado->data['telefone'] }}</li>
                        <li class="list-group-item">Número whatsapp: {{ $beneficiado->data['whatsapp'] }}</li>
                        <li class="list-group-item">Contato emergencial: {{ $beneficiado->data['cto_emerg'] }}</li>
                    </ul>
                    <br>
                    <a href="{{ route('markAsRead', ['id' => $beneficiado->id]) }}" class="btn btn-secondary">Marcar como lida</a>
                    <a href="{{ route('iniciar-busca', ['nome' => $beneficiado->data['nome'], 'idNotificacao' => $beneficiado->id ]) }}" class="btn btn-warning">Iniciar busca ativa</a>
                </div>
            </div>
            <br>
        @endforeach
    </div>
</div>
@endsection
