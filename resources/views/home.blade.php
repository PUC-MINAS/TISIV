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

         <div class="row">
          <div class="col-md-4">
            <div class="card card-chart">
              <div class="card-header bg-info" style="">
                <h5 style="color:white;"><i class="fas fa-chart-bar fa-2x"></i>
                Relatórios Demográficos</h5>
              </div>
            <div class="card-body">
              <ul class="list-group list-group-flush">
              <div class="dropdown">
                <li class="btn dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Projeto
                </li>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach($projetos as $projeto)
                <a class="dropdown-item" href="{{ url('relatorio-demografico/'.$projeto->id.'/projeto')}}">{{ $projeto->nome }}</a>
                @endforeach
              
              </div>
              <div class="dropdown">
              <li class="btn dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Oficina</li>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach($oficinas as $oficina)
                <a class="dropdown-item" href="{{ url('relatorio-demografico/'.$oficina->id.'/oficina')}}">{{ $oficina->nome }}</a>
                @endforeach
              </div>
              </div>
              <div class="dropdown">
              <li class="btn dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Turma</li>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach($turmas as $turma)
                <a class="dropdown-item" href="{{ url('relatorio-demografico/'.$turma->id.'/turma')}}">{{ $turma->nome() }}</a>
                @endforeach
              </div>
              </div>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-header bg-success" style="">
            <h5 style="color:white;"><i class="fas fa-chart-pie fa-2x"></i>
              Relatórios de Frequência</h5>
          </div>
          <div class="card-body">
          <ul class="list-group list-group-flush">
              <div class="dropdown">
                <li class="btn dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Projeto
                </li>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach($projetos as $projeto)
                <a class="dropdown-item" href="{{ url('projetos/'.$projeto->id.'/presencaGrafico')}}">{{ $projeto->nome }}</a>
                @endforeach
              
              </div>
              <div class="dropdown">
              <li class="btn dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Oficina</li>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach($oficinas as $oficina)
                <a class="dropdown-item" href="{{ url('oficinas-projetos/'.$oficina->id.'/presencaGrafico')}}">{{ $oficina->nome }}</a>
                @endforeach
              
              </div>
              </div>
              <div class="dropdown">
              <li class="btn dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Turma</li>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach($turmas as $turma)
                <a class="dropdown-item" href="{{ url('oficinas-projetos/'.$oficina->id.'/turmas/'.$turma->id.'/presencaGrafico/'.$turma->id)}}">{{ $turma->nome() }}</a>
                @endforeach
              
              </div>
              </div>
              </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-header bg-danger" style="">
            <h5 style="color:white;"><i class="fas fa-chart-pie fa-2x"></i> 
            Relatórios de Desistência</h5>
          </div>
          <div class="card-body">
          <ul class="list-group list-group-flush">
              <div class="dropdown">
                <li class="btn dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Projeto
                </li>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach($projetos as $projeto)
                <a class="dropdown-item" href="{{ url('projetos/'.$projeto->id.'/presencaGrafico')}}">{{ $projeto->nome }}</a>
                @endforeach
              
              </div>
              <div class="dropdown">
              <li class="btn dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Oficina</li>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach($oficinas as $oficina)
                <a class="dropdown-item" href="{{ url('oficinas-projetos/'.$oficina->id.'/presencaGrafico')}}">{{ $oficina->nome }}</a>
                @endforeach
              
              </div>
              </div>
              <div class="dropdown">
              <li class="btn dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Turma</li>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach($turmas as $turma)
                <a class="dropdown-item" href="{{ url('oficinas-projetos/'.$oficina->id.'/turmas/'.$turma->id.'/presencaGrafico/'.$turma->id)}}">{{ $turma->nome() }}</a>
                @endforeach
              
              </div>
              </div>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-header bg-info" style="">
            <h5 style="color:white;"><i class="fas fa-chart-bar fa-2x"></i> 
            Relatórios de Aquisições</h5>
          </div>
          <div class="card-body">
          <ul class="list-group list-group-flush">
              <div class="dropdown">
              <li class="btn dropdown-toggle"  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Turma</li>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach($turmas as $turma)
                <a class="dropdown-item" href="{{ url('oficinas-projetos/'.$oficina->id.'/turmas/'.$turma->id.'/graficoAquisicao/'.$turma->id)}}">{{ $turma->nome() }}</a>
                @endforeach
              
              </div>
              </div>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@parent
@endsection