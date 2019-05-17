@extends('layouts.pdf')

@section('pdf-content')
<style>
    h1{
        text-align: center;
    }

    .ficha{
        border-bottom: 1px dashed gray;
        padding-bottom: 10px;
    }

    .aquisicoes{
        padding-left: 1.25cm;
    }
    
    .declaracao{
        font-size: 16px;
        text-align:justify;
    }

    .bold {
        font-weight: bold;
    }
</style>
<h1>Relatório de Aquisicões</h1>

@component('relatorios.identificacao-usuario', [ 'usuario' => $usuario])
@endcomponent

<div class="secao">
    <div class="secao-header">2 - Fichas de Aquisições</div>
    <div class="container-fluid secao-body">
    @foreach($usuario->getFichasAquisicoes() as $ficha)
        <div class="row">
            <div class="col">
                <div class="ficha">
                    <div class="ficha-title">Período {{ strftime('%d/%m/%Y', strtotime($ficha->data_criacao))}} à {{strftime('%d/%m/%Y', strtotime($ficha->valido_ate))}}</div>
                    <div class="ficha-body">
                        <strong>Aquisicões Obtidas</strong>
                        <div class="aquisicoes">
                            Indicadores Usuário
                            <ul>
                                @foreach($ficha->aquisicoesObtidasIndicadoresUsuarios() as $item)
                                    <li>{{$item->getAquisicao()->nome}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="aquisicoes">
                            Indicadores da Familia
                            <ul>
                                @foreach($ficha->aquisicoesObtidasIndicadoresFamiliares() as $item)
                                    <li>{{$item->getAquisicao()->nome}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="ficha-footer">
                        <strong>Total: {{count($ficha->aquisicoesObtidas())}}</strong>
                    </div>
                </div>
                
            </div>
        </div>
    @endforeach
    </div>
</div>


@endsection
