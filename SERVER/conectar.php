<?

$usuario = "hackathongse";

$senha = "Gohorse1@";

$banco = "hackathongse";

$hostname = "mysql01.hackathongse.hospedagemdesites.ws";


$db = mysql_connect($hostname, $usuario, $senha) or die('Erro na conexao');
mysql_select_db($banco,$db) or die('Erro na Seleção do Banco');




//codificacao de carateres

mysql_query("SET NAMES 'utf8' ",$db);

mysql_query("SET character_set_connection=utf8",$db);

mysql_query("SET character_set_client=utf8",$db);

mysql_query("SET character_set_results=utf8",$db);

mysql_query('SET collation_connection=utf8_general_ci',$db);


?>