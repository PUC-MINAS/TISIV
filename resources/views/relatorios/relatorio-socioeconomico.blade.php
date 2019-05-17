@extends('layouts.pdf')

@section('pdf-content')
<style>
    h1{
        text-align: center;
    }
    
    .declaracao{
        font-size: 16px;
        text-align:justify;
    }

    .bold {
        font-weight: bold;
    }
</style>
<h1>Formulário para Estudo Socioeconômico</h1>

@component('relatorios.identificacao-usuario', [ 'usuario' => $usuario])
@endcomponent

<div class="secao">
    <div class="secao-header">2 - Saúde</div>
    <div class="secao-body container-fuid">
        <div class="row">
            <div class="col">
                Medicamento de maneira continuada que o assistido toma: {{$usuario->medicamentos}}
            </div>
        </div>
        <div class="row">
            <div class="col">
            Alergia que assistido tenha: {{$usuario->alergias}}
            </div>
        </div>
    </div>
</div>

<div class="secao">
    <div class="secao-header">3 - Composição Familiar</div>
    <div class="secao-body container-fluid">
        <div class="row">
            <div class="col">
                <table class="table table-sm table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Parentesco</th>
                            <th scope="col">Idade</th>
                            <th scope="col">Ocupação</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($usuario->getFamiliares() as $familiar)
                        <tr>
                            <td>{{$familiar->nome}}</td>
                            <td>{{$familiar->getParentesco()}}</td>
                            <td>{{$familiar->getIdade()}}</td>
                            <td>{{$familiar->profissao}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col">
                        <p class="bold">
                            Núcleo Familiar: {{count($usuario->getFamiliares())}}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <p class="declaracao">
                    Declaro para os devidos fins de direito que no presente momento participo na condição de assistido (a) dos Serviços Assistenciais do
                    Instituto dos Missionários Sacramentinos de Nossa Senhora, e que usufruo de seus benefícios diretos e indiretos. Declaro também
                    estar ciente de que minha imagem poderá ser veiculada pelo Instituto em seus diversos meios de divulgação, por período
                    indeterminado e que não receberei cachê.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col">
            
                <p class="text-center">{{$filial->cidade}}, {{strftime('%A, %d de %B de %Y', strtotime('today'))}}</p>
            </div>
        </div>
        <div class="assinatura-box">
            <div class="assinatura-linha"></div>
        </div>
        
    </div>
</div>
@endsection
