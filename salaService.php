<?php
require_once ("database/conexaoMySQL.php");
require_once ("services/functionsService.php");

$f = new FunctionsService();
$arraySala = array();
$arraySala = (array) $f->getSalasByIdService($_GET["idsala"]);
$json_arr = json_encode($arraySala);
echo $json_arr;
?>


