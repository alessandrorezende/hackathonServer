<?php

	header ("Access-Control-Allow-Origin: *");
	include "conectar.php";

	$IdPergunta	  = $_POST["IdPergunta"];

	$sql = mysql_query("SELECT * FROM tb_respostas WHERE id_pergunta = $IdPergunta");

	$contador = mysql_num_rows($sql);

	$result['total'] = $contador;

	if($result['total'] > 0){

		while($linha = mysql_fetch_assoc($sql)){

			$arr[] = $linha;
		}

		$result['salas'] = $arr;
	}

	echo json_encode($result);

?>