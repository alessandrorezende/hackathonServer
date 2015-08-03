<?php

class Respostas {

    private $idResposta = 0;
    private $idPergunta = 0;
    private $resposta = "";

    function __construct($nomeSala) {
        $this->nomeSala = $nomeSala;
    }

    public function getIdResposta() {
        return $this->idResposta;
    }

    public function getIdPergunta() {
        return $this->idPergunta;
    }

    public function getResposta() {
        return $this->resposta;
    }

    public function setIdResposta($idResposta) {
        $this->idResposta = $idResposta;
    }

    public function setIdPergunta($idPergunta) {
        $this->idPergunta = $idPergunta;
    }

    public function setResposta($resposta) {
        $this->resposta = $resposta;
    }

}
