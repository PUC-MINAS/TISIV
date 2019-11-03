@extends('layouts.app')
@section('content-app')


<h1>Testando</h1>


<?php


use Illuminate\Support\Lavacharts;
//use Illuminate\Support\Carbon;


$lava = new \Khill\Lavacharts\Lavacharts;


$stocksTable = $lava->DataTable();  // Lava::DataTable() if using Laravel

$stocksTable->addDateColumn('Day of Month')
            ->addNumberColumn('Projected')
            ->addNumberColumn('Official');

// Random Data For Example
for ($a = 1; $a < 30; $a++) {
    $stocksTable->addRow([
      '2015-10-' . $a, rand(800,1000), rand(800,1000)
    ]);
}
$chart = $lava->LineChart('MyStocks', $stocksTable);
echo $lava->render('LineChart', 'MyStocks', 'stocks-chart');
?>
    <div id="stocks-chart"></div>

<?php
      







?>




@endsection