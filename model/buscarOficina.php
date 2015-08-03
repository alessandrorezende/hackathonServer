<?php

header("Access-Control-Allow-Origin: *");
include "conectar.php";
include "oficina.php";

$oficinas = mysql_query("SELECT * FROM tb_oficina");
$arrayOficina = array();
$i=0;
while ($obj = mysql_fetch_object($oficinas)) {
    $oficina = new Oficina();
    $oficina->setIdOficina($obj->idoficina);
    $oficina->setNome($obj->nome);
    $oficina->setDescricao($obj->descricao);
    $oficina->setData($obj->data);
    
    $arrayOficina[$i] = (array) $oficina; 
    $i++;
}

$json_arr = json_encode($arrayOficina);
echo $json_arr;


?>
