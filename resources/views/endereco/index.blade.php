@extends('layouts.app')

@section('sidebar')
    @parent
@endsection

@section('topbar')
    @parent
@endsection

@section('content')

<div class="card shadow m-4">
    <div class="card-header card-header-space-between">
        <h4 class="m-0 font-weight-bold text-primary">Endereço</h4>
        @if ($endereco->isEmpty())
            <form action="{{ route('endereco.formulario', $id) }}" method="GET">
                @method('GET')
                <button
                    type="submit"
                    class="btn btn-primary"
                    >Cadastrar Endereço
                </button>
            </form>
        @endif
    </div>
    <div class="card-body" style="overflow: auto; white-space: nowrap;">
        <div class="form-group m-auto col-sm-12">
            <input
                type="text"
                name="nome-beneficiado"
                class="form-control text-center"
                id="nome-beneficiado"
                value="{{$nome}}"
                disabled
            >
        </div>
        <div class="table-responsive table-full-width">
            <table class="table table-hover">
                <thead>
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
                @forelse ($endereco as $end)
                    <tbody>
                        <tr>
                            <td>{{ $end->rua }}</td>
                            <td>{{ $end->numero}}</td>
                            <td>{{ $end->apto}}</td>
                            <td>{{ $end->bairro}}</td>
                            <td>{{ $end->cep}}</td>
                            <td>{{ $end->cidade}}</td>
                            <td>{{ \App\Enums\UF::getDescription($end->uf)}}</td>
                            <td>{{ $end->nacionalidade}}</td>
                            <td>
                                &nbsp;
                                <form action="{{ route('endereco.edit', $end->id) }}" method="GET">
                                    @method('GET')
                                    <button
                                        type="submit"
                                        class="btn btn-warning"
                                        style="position: relative; bottom: 4vh"
                                        ><i class="fas fa-pen-square"></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                &nbsp;
                                <form action="{{ route('endereco.destroy', $id) }}" method="GET">
                                    @method('GET')
                                    <button
                                        type="submit"
                                        class="btn btn-danger"
                                        style="position: relative; bottom: 4vh"
                                        ><i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                @empty
                @endforelse
            </table>
        </div>
    </div>
    <div class="card-footer">
        <form action="{{ route('usuarios.index') }}" method="GET">
            @method('GET')
            <button
                type="submit"
                class="btn btn-circle"
                ><i class="far fa-arrow-alt-circle-left"></i>
            </button>
        </form>
    </div>
</div>
<br>
@endsection
