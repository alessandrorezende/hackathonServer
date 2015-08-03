<?php

header("Access-Control-Allow-Origin: *");
include "conectar.php";

$result = array(

    'total' => 0,

    'oficinas' => null

);

//SOLUTION::  add this comment before your 1st query -- force multiLanuage support 
mysql_query("set names 'utf8'");

$sql = mysql_query("SELECT * FROM tb_oficina");

$contador = mysql_num_rows($sql);

$result['total'] = $contador;

if($result['total'] > 0){
    while($linha = mysql_fetch_assoc($sql)){
        $arr[] = $linha;
    }
    $result['oficinas'] = $arr;
}

echo json_encode($result);
?>
