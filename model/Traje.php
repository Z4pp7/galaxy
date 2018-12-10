<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Traje
 *
 * @author jorgi
 */
class Traje {

    private $ID_TRA;
    private $COD_TRA;
    private $CATEGORIA_TRA;
    private $DESCRIPCION_TRA;
    private $NUM_PRENDAS_TRA;
    
    function getID_TRA() {
        return $this->ID_TRA;
    }

    function getCOD_TRA() {
        return $this->COD_TRA;
    }

    function getCATEGORIA_TRA() {
        return $this->CATEGORIA_TRA;
    }

    function getDESCRIPCION_TRA() {
        return $this->DESCRIPCION_TRA;
    }

    function getNUM_PRENDAS_TRA() {
        return $this->NUM_PRENDAS_TRA;
    }

    function setID_TRA($ID_TRA) {
        $this->ID_TRA = $ID_TRA;
    }

    function setCOD_TRA($COD_TRA) {
        $this->COD_TRA = $COD_TRA;
    }

    function setCATEGORIA_TRA($CATEGORIA_TRA) {
        $this->CATEGORIA_TRA = $CATEGORIA_TRA;
    }

    function setDESCRIPCION_TRA($DESCRIPCION_TRA) {
        $this->DESCRIPCION_TRA = $DESCRIPCION_TRA;
    }

    function setNUM_PRENDAS_TRA($NUM_PRENDAS_TRA) {
        $this->NUM_PRENDAS_TRA = $NUM_PRENDAS_TRA;
    }



}
