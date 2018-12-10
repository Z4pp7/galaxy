<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cajeros
 *
 * @author jorgi
 */
class Cliente {
  
   private $ID_CLI;             
   private $CEDULA_CLI;        
   private $NOMBRES_CLI;
   private $APELLIDOS_CLI;
   private $CIUDAD_NACIMIENTO_CLI;
   private $FECHA_NACIMIENTO_CLI;
   private $DIRECCION_CLI;
   private $TELEFONO_CLI;
   private $EMAIL_CLI;

   function getID_CLI() {
       return $this->ID_CLI;
   }

   function getCEDULA_CLI() {
       return $this->CEDULA_CLI;
   }

   function getNOMBRES_CLI() {
       return $this->NOMBRES_CLI;
   }

   function getAPELLIDOS_CLI() {
       return $this->APELLIDOS_CLI;
   }

   function getCIUDAD_NACIMIENTO_CLI() {
       return $this->CIUDAD_NACIMIENTO_CLI;
   }

   function getFECHA_NACIMIENTO_CLI() {
       return $this->FECHA_NACIMIENTO_CLI;
   }

   function getDIRECCION_CLI() {
       return $this->DIRECCION_CLI;
   }

   function getTELEFONO_CLI() {
       return $this->TELEFONO_CLI;
   }

   function getEMAIL_CLI() {
       return $this->EMAIL_CLI;
   }

   function setID_CLI($ID_CLI) {
       $this->ID_CLI = $ID_CLI;
   }

   function setCEDULA_CLI($CEDULA_CLI) {
       $this->CEDULA_CLI = $CEDULA_CLI;
   }

   function setNOMBRES_CLI($NOMBRES_CLI) {
       $this->NOMBRES_CLI = $NOMBRES_CLI;
   }

   function setAPELLIDOS_CLI($APELLIDOS_CLI) {
       $this->APELLIDOS_CLI = $APELLIDOS_CLI;
   }

   function setCIUDAD_NACIMIENTO_CLI($CIUDAD_NACIMIENTO_CLI) {
       $this->CIUDAD_NACIMIENTO_CLI = $CIUDAD_NACIMIENTO_CLI;
   }

   function setFECHA_NACIMIENTO_CLI($FECHA_NACIMIENTO_CLI) {
       $this->FECHA_NACIMIENTO_CLI = $FECHA_NACIMIENTO_CLI;
   }

   function setDIRECCION_CLI($DIRECCION_CLI) {
       $this->DIRECCION_CLI = $DIRECCION_CLI;
   }

   function setTELEFONO_CLI($TELEFONO_CLI) {
       $this->TELEFONO_CLI = $TELEFONO_CLI;
   }

   function setEMAIL_CLI($EMAIL_CLI) {
       $this->EMAIL_CLI = $EMAIL_CLI;
   }






}
