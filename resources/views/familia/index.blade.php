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
        <h4 class="m-0 font-weight-bold text-primary">Grupo Familiar</h4>
        @if ($familia->isEmpty())
            <form action="{{ route('familia.formulario', $id) }}" method="GET">
                @method('GET')
                <button
                    type="submit"
                    class="btn btn-primary"
                    >Cadastrar Familiar
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
                        <th scope="col">Nome</th>
                        <th scope="col">Parentesco</th>
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col">Profissão</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                @forelse ($familia as $familiar)
                    <tbody>
                        <tr>
                            <td>{{ $familiar->nome_parente }}</td>
                            <td>{{ \App\Enums\Parentesco::getDescription($familiar->parentesco)}}</td>
                            <td>{{ $familiar->dta_nasc->format('d/m/Y')}}</td>
                            <td>{{ $familiar->profissao}}</td>
                            <td>
                                &nbsp;
                                <form action="{{ route('familia.index', $id) }}" method="GET">
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
                                <form action="{{ route('familia.destroy', $id) }}" method="GET">
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
