@extends('layouts.pdf')

@section('pdf-content')
<style>
    h1{
        text-align: center;
    }

    .secao{

    }

    .secao > .secao-header{
        background-color: gainsboro;
        padding: 10px;
        font-weight: bold;
    }

    .secao > .secao-body{
        padding: 10px;
        font-size: 18px;
    }
    
    .declaracao{
        font-size: 15px;
        text-align:justify;
    }

    .text-center{
        font-size: 15px;
        text-align: center;
    }

    .assinatura-box{
        display: flex;
        justify-content: center;
        height: 20px;
    }

    .linha-assinatura{
        border-bottom: 1px solid black;
        width: 300px;
    }
</style>

<h1>Formulário para Estudo Socioeconômico</h1>
<div class="secao">
    <div class="secao-header">1 - Identificação</div>
    <div class="container-fluid secao-body">
        <div class="row">
            <div class="col-md-6">
                Nome: {{$usuario->nome}}
            </div>
            <div class="col-md-6">
                Sexo: {{$usuario->getSexo()}}
            </div>
        </div>
        <div class="row">
            <div class="col">
                Endereço: {{$usuario->endereco() != null ? $usuario->endereco()->logadouro : '' }}
            </div>            
        </div>
        <div class="row">
            <div class="col-md-6">
                Telefone: {{$usuario->telefone}}
            </div>
            <div class="col-md-6">
                <!-- Email -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                CPF: {{$usuario->cpf}}
            </div>
            <div class="col-md-6">
                Identidade: {{$usuario->rg}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                Data de nascimento: {{$usuario->dta_nasc}}
            </div>
            <div class="col-md-6">
                Escolaridade: {{$usuario->getEscolaridade()}}
            </div>
        </div>
         <div class="row">
            <div class="col-md-6">
                Ocupação: {{$usuario->profissao}}
            </div>
            <div class="col-md-6">
                <!-- Renda -->
            </div>
         </div>
    </div>
</div>

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
                <p class="text-center">{{$filial->cidade}}, quarta, 15 de maio de 2019</p>
            </div>
        </div>
        <div class="assinatura-box">
            <div class="linha-assinatura"></div>
        </div>
        
    </div>
</div>
@endsection