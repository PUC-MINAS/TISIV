<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link href="/css/app.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <style>
        body{
            margin: 0.5cm;
            font-family: 'Roboto', sans-serif;
            background-color: white;
        }

        .header {
            display: flex;
            justify-content: space-between;
            
        }

        .logo{
            width: 100px;
            height: 100px;
        }

        .text-align-right{
            text-align: right;       
        }
    </style>
</head>
<body >
    <div class="header">

        <div>
            <img class="logo" src="/img/logo-csf.png" alt="">
        </div>
        <p class="text-align-right">
            {{$filial->nome}}<br>
            {{$filial->logadouro}}, {{$filial->numero}} - {{$filial->bairro}}<br>
            {{$filial->cidade}} - {{App\Enums\UF::getDescription($filial->uf)}} - CEP {{$filial->cep}}<br>
            Tel.: {{$filial->telefone}}<br>
        </p>
    </div>

    @yield('pdf-content')

</body>
</html>
