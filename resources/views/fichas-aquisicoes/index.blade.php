@extends('layouts.app')
@section('content-app')


@if(session('success'))
<div class="row">
    <div class="col">
        <div class="alert alert-success alert-dismissible fade show">
                {{session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>                       
        </div>
    </div>
</div>
@endif

<div class="card shadow">
    <div class="card-header card-header-space-between">
        <h4 class="m-0 font-weight-bold text-primary">Fichas de Aquisições de {{$usuario->nome}}</h4>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#criarFichaModal">
            Nova Ficha
        </button>
        
    </div>
    <div class="card-body">
        <div class="table-responsive table-full-width">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Data Criação</th>
                    <th scope="col">Válido Até</th>
                    <th scope="col">Status</th>
                    <th></th>
                </tr>
                </thead>
                @foreach($usuario->getFichasAquisicoes() as $ficha)
                    <tbody>
                    <tr>
                        <td>{{ $ficha->data_criacao }}</td>
                        <td>{{ $ficha->valido_ate }}</td>
                        <td>{{ $ficha->getStatus() }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ url('usuarios/'.$usuario->id.'/fichas-aquisicoes/'.$ficha->id) }}" >Detalhes</a>                    
                        </td>     
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
@if( !$usuario->temFichaAtiva() )
<div class="modal fade" id="criarFichaModal" tabindex="-1" role="dialog" aria-labelledby="criarFichaModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="criarFichaModalLabel">Criar Nova Ficha de Aquisição</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseja criar nova ficha de aquisição para o usuário <strong>{{$usuario->nome}}</strong> ?
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <form action="{{url('usuarios/'.$usuario->id.'/fichas-aquisicoes/store')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-success">Criar Nova Ficha</button>
        </form>
        
      </div>
    </div>
  </div>
</div>
@else

<div class="modal fade" id="criarFichaModal" tabindex="-1" role="dialog" aria-labelledby="criarFichaModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="criarFichaModalLabel">Criar Nova Ficha de Aquisição</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        O usuário <strong>{{$usuario->nome}}</strong> já possui uma ficha de aquisição ativa
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
        
      </div>
    </div>
  </div>
</div>

@endIf

@endsection