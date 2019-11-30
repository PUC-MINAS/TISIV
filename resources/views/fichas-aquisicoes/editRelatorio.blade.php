@extends('layouts.pdf')
@section('pdf-content')
<div id='chart-div' style='border:1px; height:400px'>
   
    <?php echo $lava->render($tipo, 'Dados', 'chart-div');?>
    
</div>
<div style='font-size:16px; display:inline; padding-left: 90%;'>
<ol>
    <li >Conscientes de seus direitos e deveres: <?php echo $primeiraCount; ?></li>
    <li >Valorizando o conhecimento e o saber social: <?php echo $segundaCount; ?>.</li>
    <li >Usando adequadamente os espaços e recursos coletivos, bens e serviços públicos: <?php echo $terceiraCount; ?></li>
    <li >Demonstrando atitudes de conservação da natureza e do ambiente onde vivem: <?php echo $quartaCount; ?>.</li>
    <li >Apresentando cuidados com a aparência: <?php echo $quintaCount; ?></li>
    <li >Expressando-se de forma fluente e livre nas atividades; Espontaneidade: <?php echo $sextaCount; ?>.</li>
    <li >Buscando informações: <?php echo $setimaCount; ?></li>
    <li >Interessados e envolvidos nas atividades: <?php echo $oitavaCount; ?>.</li>
    <li >Participando de campanhas e atividades de saúde e preservação do meio ambiente. Dinamismo: <?php echo $nonaCount; ?></li>
    <li >Assumindo autoria de ideias e invenções solucionando problemas. Autonomia. Inovação: <?php echo $decimaCount; ?>.</li>
    <li >Defendendo seu próprio ponto de vista e respeitando o ponto de vista do outro: <?php echo $decimoPCount; ?></li>
    <li >Comunicativos: <?php echo $decimoSCount; ?>.</li>
    <li >Aprendendo a ser, a conhecer, a fazer e a conviver: <?php echo $decimoTCount; ?></li>
    <li >Utilizando conhecimentos em contextos diferentes: <?php echo $decimoQCount; ?>.</li>
    <li >Com iniciativa: <?php echo $decimoQuiCount; ?></li>
    <li >Convivendo satisfatoriamente com a família e a comunidade. Entrosamento: <?php echo $decimoSexCount; ?>.</li>
    <li >Construindo coletivamente as regras: <?php echo $decimoSetCount; ?></li>
    <li >Participando e cientes da avaliação e planejamento do projeto educativo: <?php echo $decimoOitCount; ?>.</li>
</ol>
<!--  
    // for($i=0; $i<=0; $i++){
      
    // }
     -->
</div> 
@endsection

@section('script')
<script>
    
</script>
@endsection    