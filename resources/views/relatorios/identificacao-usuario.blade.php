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