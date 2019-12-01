@extends('layouts.pdf')
@section('pdf-content')
<div class="container-fluid">
    <div class="row">
        <h5 style="margin: 0px auto; font-weight: bold">Relatório de aquisição - Oficina {!!$nome!!}</h5>
        <div id='chart-div' class="col-md-12 div-height" style='border:1px; height:400px;display:inline;height:500px'>
        
            <?php echo $lava->render('BarChart', 'Aquisicoes', 'chart-div');?>
            
        </div>
        <center>
        <div style='font-size:14px; padding-left: 6%;'>
    <ol>
        <div class="col-sm-5" style="display:inline-block; border-right: 1px solid rgba(0,0,0,0.5);text-align:left;">
        <li >Conscientes de seus direitos e deveres: <?php echo $primeiraCount; ?></li>
        <li >Valorizando o conhecimento e o saber social: <?php echo $segundaCount; ?>.</li>
        <li >Usando adequadamente os espaços e recursos coletivos, bens e serviços públicos: <?php echo $terceiraCount; ?></li>
        <li >Demonstrando atitudes de conservação da natureza e do ambiente onde vivem: <?php echo $quartaCount; ?>.</li>
        <li >Apresentando cuidados com a aparência: <?php echo $quintaCount; ?></li>
        <li >Expressando-se de forma fluente e livre nas atividades; Espontaneidade: <?php echo $sextaCount; ?>.</li>
        <li >Buscando informações: <?php echo $setimaCount; ?></li>
        <li >Interessados e envolvidos nas atividades: <?php echo $oitavaCount; ?>.</li>
        <li >Participando de campanhas e atividades de saúde e preservação do meio ambiente. Dinamismo: <?php echo $nonaCount; ?></li>
        </div>
        <div class="col-sm-5" style="display:inline-block; padding:4%;text-align:left;">
        <li >Assumindo autoria de ideias e invenções solucionando problemas. Autonomia. Inovação: <?php echo $decimaCount; ?>.</li>
        <li >Defendendo seu próprio ponto de vista e respeitando o ponto de vista do outro: <?php echo $decimoPCount; ?></li>
        <li >Comunicativos: <?php echo $decimoSCount; ?>.</li>
        <li >Aprendendo a ser, a conhecer, a fazer e a conviver: <?php echo $decimoTCount; ?></li>
        <li >Utilizando conhecimentos em contextos diferentes: <?php echo $decimoQCount; ?>.</li>
        <li >Com iniciativa: <?php echo $decimoQuiCount; ?></li>
        <li >Convivendo satisfatoriamente com a família e a comunidade. Entrosamento: <?php echo $decimoSexCount; ?>.</li>
        <li >Construindo coletivamente as regras: <?php echo $decimoSetCount; ?></li>
        <li >Participando e cientes da avaliação e planejamento do projeto educativo: <?php echo $decimoOitCount; ?>.</li>
        </div> 
    </ol>
    </div> 
    </center>
    <div id='chart-div2' class="col-md-12 div-height"  style='border:1px; height:400px;display:inline;height:500px'>
   
   <?php echo $lava->render('BarChart','Dados', 'chart-div2');?>
   
</div>
</div>
<center>
<div style='font-size:14px; display:inline; padding-left: 90%;display:inline;'>
<ol start="19">
<div class="col-sm-5" style="display:inline-block; border-right: 1px solid rgba(0,0,0,0.5);text-align:left;">
    <li >Conscientes de seus direitos e deveres: <?php echo $decimoNonoCount; ?></li>
    <li >Valorizando o conhecimento e o saber social: <?php echo $vigesimoCount; ?>.</li>
    <li>Participantes na organização do programa de atendimento: <?php echo $vigesimoPCount; ?> </li>
    <li >Informada sobre o processo socioeducativo: <?php echo $vigesimoSCount; ?></li>
    <li >Presente e participante nas reuniões e eventos promovidos pela entidade: <?php echo $vigesimoTCount; ?>.</li>
    <li>Criativa e cooperativa em relação ao trabalho desenvolvido pela entidade: <?php echo $vigesimoQCount; ?> </li>
    <li>Satisfeita com o desenvolvimento das crianças e adolescentes: <?php echo $vigesimoQuiCount; ?></li>
</div>
<div class="col-sm-6" style="display:inline-block; padding:4%;text-align:left;">    
    <li>Participativa nas atividades promovidas pela entidade e com mudança de postura em relação à educação das crianças e adolescentes: <?php echo $vigesimoSexCount; ?>.</li>
    <li>Inovando nas estratégias de relacionamento entre instituições e família: <?php echo $vigesimoSetCount; ?> </li>
    <li>Aumento do interesse, da presença e das ações conjuntas entre membros da família, escola e comunidade: <?php echo $vigesimoOitCount; ?></li>
    <li>Informada sobre os princípios e valores da entidade e cooperativa com o trabalho desenvolvido: <?php echo $vigesimoNonoCount; ?>.</li>
    <li>Ciente de seu papel e cooperando no trabalho educativo desenvolvido pela entidade: <?php echo $trigesimoCount; ?>.</li>
</div>
</ol>
</div>  
</div>
</div>  
<!--  
    // for($i=0; $i<=0; $i++){
      
    // }
     -->

@endsection

@section('script')
<script>
    
</script>
@endsection    