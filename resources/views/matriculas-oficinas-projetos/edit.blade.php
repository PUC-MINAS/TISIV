@extends('layouts.pdf')
@section('pdf-content')
<div id='chart-div' style='border:1px; height:400px'>
   
    <?php echo $lava->render($tipo, 'Dados', 'chart-div');?>
    
</div>
<div style='font-size:16px; display:inline; text-align:center'>
<center>
<p style='display:inline'>Número total de alunos presentes na semana: <?php echo $presenca; ?><p>
<p style='display:inline'>Número total de faltas da semana: <?php echo $falta; ?>.<p>
</center>
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