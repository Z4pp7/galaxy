<?php


class Alquiler {

    //put your code here
    private $ID_ALQ;
    private $CLIENTE;
    private $CAJERO;
    private $TRAJE;
    private $FECHA_INICIO;
    private $FECHA_FIN;
    private $VALOR;

    function getID_ALQ() {
        return $this->ID_ALQ;
    }

    function getCLIENTE() {
        return $this->CLIENTE;
    }

    function getCAJERO() {
        return $this->CAJERO;
    }

    function getTRAJE() {
        return $this->TRAJE;
    }

    function getFECHA_INICIO() {
        return $this->FECHA_INICIO;
    }

    function getFECHA_FIN() {
        return $this->FECHA_FIN;
    }

    function getVALOR() {
        return $this->VALOR;
    }

    function setID_ALQ($ID_ALQ) {
        $this->ID_ALQ = $ID_ALQ;
    }

    function setCLIENTE($CLIENTE) {
        $this->CLIENTE = $CLIENTE;
    }

    function setCAJERO($CAJERO) {
        $this->CAJERO = $CAJERO;
    }

    function setTRAJE($TRAJE) {
        $this->TRAJE = $TRAJE;
    }

    function setFECHA_INICIO($FECHA_INICIO) {
        $this->FECHA_INICIO = $FECHA_INICIO;
    }

    function setFECHA_FIN($FECHA_FIN) {
        $this->FECHA_FIN = $FECHA_FIN;
    }

    function setVALOR($VALOR) {
        $this->VALOR = $VALOR;
    }


  
}
