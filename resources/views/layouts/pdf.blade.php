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

    <link href="/css/print.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body onload="window.print()">
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

    
    @yield('script')
</body>
</html>
