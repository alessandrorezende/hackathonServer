<?php

header("Access-Control-Allow-Origin: *");
include "conectar.php";

$result = array(
    'totalpergunta' => 0,
    'totalresposta' => 0,
    'perguntas' => null,
    'respostas' => null
);

$salanome = $_POST["salanome"];

//SOLUTION::  add this comment before your 1st query -- force multiLanuage support 
mysql_query("set names 'utf8'");

$sql = mysql_query("SELECT * FROM tb_salas, tb_pergunta WHERE tb_salas.nome = '$salanome' and tb_pergunta.idsala = tb_salas.id and tb_pergunta.idpergunta = (select min(tb_pergunta.idpergunta) from tb_pergunta)");

$contador = mysql_num_rows($sql);

$result['totalpergunta'] = $contador;

if ($result['totalpergunta'] > 0) {
    while ($linha = mysql_fetch_assoc($sql)) {
        $arr[] = $linha;
    }
    $result['perguntas'] = $arr;
}

$sql = mysql_query("SELECT tb_resposta.* FROM tb_salas, tb_pergunta, tb_resposta WHERE tb_salas.nome = '$salanome' and tb_pergunta.idsala = tb_salas.id and tb_pergunta.idpergunta = tb_resposta.idpergunta and tb_pergunta.idpergunta = (select min(tb_pergunta.idpergunta) from tb_pergunta)");

$contador = mysql_num_rows($sql);

$result['totalresposta'] = $contador;

if ($result['totalresposta'] > 0) {
    while ($linha = mysql_fetch_assoc($sql)) {
        $arr[] = $linha;
    }
    $result['respostas'] = $arr;
}

echo json_encode($result);
?>
