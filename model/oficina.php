<?php

class Oficina {

    private $idOficina = "";
    private $nome = "";
    private $descricao = "";
    private $data = "";

    function geral($idf, $no, $desc, $dt) {
        $this->idOficina = $idf;
        $this->nome = $no;
        $this->descricao = $desc;
        $this->data = $dt;
    }

    function getIdOficina() {
        return $this->idOficina;
    }

    function getNome() {
        return $this->nome;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getData() {
        return $this->data;
    }

    function setIdOficina($idOficina) {
        $this->idOficina = $idOficina;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setData($data) {
        $this->data = $data;
    }




}
