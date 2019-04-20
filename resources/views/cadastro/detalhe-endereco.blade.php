@extends('layouts.app')

@section('sidebar')
    @parent
@endsection

@section('topbar')
    @parent
@endsection

@section('content')

<div class="container-fluid" style="overflow: auto; white-space: nowrap;">
    <div class="table-responsive table-full-width">
        <table class="table table-hover table-striped">
            <thead class="thead-dark">
            <br><tr>
                    <th scope="col">Rua</th>
                    <th scope="col">Número</th>
                    <th scope="col">Apartamento</th>
                    <th scope="col">Bairro</th>
                    <th scope="col">CEP</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">UF</th>
                    <th scope="col">Nacionalidade</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $endereco->rua }}</td>
                    <td>{{ $endereco->numero}}</td>
                    <td>{{ $endereco->apto}}</td>
                    <td>{{ $endereco->bairro}}</td>
                    <td>{{ $endereco->cep}}</td>
                    <td>{{ $endereco->cidade}}</td>
                    <td>{{ \App\Enums\UF::getDescription($endereco->uf)}}</td>
                    <td>{{ $endereco->nacionalidade}}</td>
                    <td>
                        &nbsp;
                        <button
                            type="button"
                            class="btn btn-warning"
                            ><i class="fas fa-pen-square"></i>
                        </button>
                    </td>
                    <td>
                        &nbsp;
                        <button
                            type="button"
                            class="btn btn-danger"
                            ><i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<br>
@if ($endereco == '')
    <a href="{{url('cadastro/create')}}"  class="btn btn-success btn-fill ml-4">Cadastrar Endereço</a>
@endif

@endsection
