<?php

class Pergunta {

    private $idPergunta = 0;
    private $nomePergunta = "";
    private $idSala = 0;

    function __construct($nomePergunta, $idSala) {
        $this->nomePergunta = $nomePergunta;
        $this->idSala = $idSala;
    }

    public function getIdPergunta() {
        return $this->idPergunta;
    }

    public function setIdPergunta($idPergunta) {
        $this->idPergunta = $idPergunta;
    }

    public function getNomePergunta() {
        return $this->nomePergunta;
    }

    public function getIdSala() {
        return $this->idSala;
    }

    public function setNomePergunta($nomePergunta) {
        $this->nomePergunta = $nomePergunta;
    }

    public function setIdSala($idSala) {
        $this->idSala = $idSala;
    }

}
