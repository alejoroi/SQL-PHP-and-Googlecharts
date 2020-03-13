<?php
header("content-type: application/json");
header("Access-Control-Allow-Origin: *");
require_once('../inc/dbconnworld.php');
$datas = [];
$qPages=$pdo->query('SELECT * FROM `country`WHERE Name="Canada" OR Name="China" OR Name="Colombia" OR Name="Mexico" OR Name="Nigeria" OR Name="Kazakhstan" OR Name="Ukraine" OR Name="Iran" OR Name="Syria" ');
while($row=$qPages->fetch()){        
    $dataClass[] = $row;


}
echo json_encode($dataClass);