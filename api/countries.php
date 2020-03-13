<?php
header("content-type: application/json; ");
header("Access-Control-Allow-Origin: *");
require_once('../inc/dbconnworld.php');
$datas = [];
$qPages=$pdo->query('SELECT `name`,`Population`, `LifeExpectancy` FROM `country` order by `name`');
while($row=$qPages->fetch()){        
    $datas[] = $row;
//$datas[] = "['".$row['name']."',".$row['population'].",".$row['LifeExpectancy']."],"."<br/>";

}
echo json_encode($datas);