<?php

header("Access-Control-Allow-Origin: *");
include "conectar.php";

$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$telefone = $_POST["telefone"];

$sql = mysql_query("INSERT INTO tb_inscricao (nome,cpf,telefone) VALUES ('$nome', '$cpf', '$telefone')");
?>
