@extends('layouts.app')

@section('content-app')
<div class="card shadow">
    <div class="card-header">Dashboard</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        Seja bem vindo ao Gestão CSF
    </div>
</div>
@parent
@endsection
