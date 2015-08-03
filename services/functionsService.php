<?php
session_start();
require_once("model/sala.php");
require_once("model/pergunta.php");
require_once("model/respostas.php");
require_once("database/conexaoMySQL.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class FunctionsService {

    function getSalasByIdService($idSala) {
        //http://localhost/enqueteWS/salaService.php?idsala=all
        //http://localhost/enqueteWS/salaService.php?idsala=1
        $conexao = new Connection();

        if (is_null($idSala) == true or $idSala == '' or $idSala == 'all') {
            $query = "SELECT * FROM sala";
        } else {
            $query = "SELECT * FROM sala WHERE idsala = $idSala";
        }

        $result = $conexao->Select($query);
        
        $arraySala = array();
        $i=0;
        while ($obj = mysql_fetch_object($result)) {
            $sala = new Sala("");
            $sala->setIdSala($obj->idsala);
            $sala->setNomeSala($obj->nomesala);
            
            //passa obj para array
            $arraySala[$i] = (array) $sala; 
            $i++;
        }

        $conexao->closeConnection();
        return $arraySala;
    }

}

?>