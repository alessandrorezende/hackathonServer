<?php

header("Access-Control-Allow-Origin: *");
include "conectar.php";

$result = array(
    'total' => 0,
    'inscricao' => null,
    'msg' => null
);

$cpf = $_POST["cpf"];
$idoficina = $_POST["idoficina"];


$sql = mysql_query("SELECT idinscricao FROM tb_inscricao WHERE cpf = '$cpf'");

$contador = mysql_num_rows($sql);

$result['total'] = $contador;

if ($contador == 0) {
    $result['msg'] = "Pessoa não encontrada!";
} else {

    while ($obj = mysql_fetch_object($sql)) {
        $inscricao = $obj->idinscricao;
        $result['inscricao'] = $inscricao;
    }

    $sql2 = mysql_query("INSERT INTO tb_inscoficina (idinscricao,idoficina) VALUES ('$inscricao', '$idoficina')");
    if (!$sql2) {
        die(mysql_error());
    }
    $result['msg'] = "Pessoa encontrada!";
}

echo json_encode($result);
?>
