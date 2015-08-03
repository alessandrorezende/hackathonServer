<?php

// Incrementar respostas
header("Access-Control-Allow-Origin: *");
include "conectar.php";

$idresposta = $_POST["resposta"];


$sql = mysql_query("UPDATE tb_resposta SET contador =contador + 1   WHERE idresposta = $idresposta");
if (!$sql) {
    die(mysql_error());
}
?>