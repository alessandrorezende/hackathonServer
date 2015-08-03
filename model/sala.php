<?php

class Sala {

    private $idSala = 0;
    private $nomeSala = "";

    function __construct($nomeSala) {
        $this->nomeSala = $nomeSala;
    }

    public function getIdSala() {
        return $this->idSala;
    }

    public function setIdSala($idSala) {
        $this->idSala = $idSala;
    }

    public function getNomeSala() {
        return $this->nomeSala;
    }

    public function setNomeSala($nomeSala) {
        $this->nomeSala = $nomeSala;
    }

}
