<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelCajeros
 *
 * @author jorgi
 */
include_once 'Database.php';
include_once 'Cajero.php';

class ModelCajero {

    public function getCajeros() {

        $pdo = Database::connect();
        $sql = "select * from tbl_cajeros";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $dato) {
            $atributo = new Cajero();
            $atributo->setID_CAJ($dato['id_caj']);
            $atributo->setCEDULA_CAJ($dato['cedula_caj']);
            $atributo->setNOMBRES_CAJ($dato['nombres_caj']);
            $atributo->setAPELLIDOS_CAJ($dato['apellidos_caj']);
            $atributo->setCIUDAD_NACIMIENTO_CAJ($dato['ciudad_nacimiento_caj']);
            $atributo->setFECHA_NACIMIENTO_CAJ($dato['fecha_nacimiento_caj']);
            $atributo->setDIRECCION_CAJ($dato['direccion_caj']);
            $atributo->setTELEFONO_CAJ($dato['telefono_caj']);
            $atributo->setEMAIL_CAJ($dato['email_caj']);
            $atributo->setESTADO_CAJ($dato['estado_caj']);
            array_push($listado, $atributo);
        }
        Database::disconnect();
        return $listado;
    }

    public function getCajero($ID) {

        $pdo = Database::connect();
        $sql = "select * from tbl_cajeros where id_caj=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($ID));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $atributo = new Cajero();
       $atributo->setID_CAJ($dato['id_caj']);
            $atributo->setCEDULA_CAJ($dato['cedula_caj']);
            $atributo->setNOMBRES_CAJ($dato['nombres_caj']);
            $atributo->setAPELLIDOS_CAJ($dato['apellidos_caj']);
            $atributo->setCIUDAD_NACIMIENTO_CAJ($dato['ciudad_nacimiento_caj']);
            $atributo->setFECHA_NACIMIENTO_CAJ($dato['fecha_nacimiento_caj']);
            $atributo->setDIRECCION_CAJ($dato['direccion_caj']);
            $atributo->setTELEFONO_CAJ($dato['telefono_caj']);
            $atributo->setEMAIL_CAJ($dato['email_caj']);
            $atributo->setESTADO_CAJ($dato['estado_caj']);
        Database::disconnect();
        return $atributo;
    }

    public function crearCajero($CEDULA_CAJ, $NOMBRES_CAJ, $APELLIDOS_CAJ, $CIUDAD_NACIMIENTO_CAJ, $FECHA_NACIMIENTO_CAJ, $DIRECCION_CAJ, $TELEFONO_CAJ, $EMAIL_CAJ, $ESTADO_CAJ) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into tbl_cajeros (cedula_caj, nombres_caj,apellidos_caj,ciudad_nacimiento_caj,fecha_nacimiento_caj,direccion_caj,telefono_caj,email_caj,estado_caj) values(?,?,?,?,?,?,?,?,?)";

                $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($CEDULA_CAJ, $NOMBRES_CAJ, $APELLIDOS_CAJ, $CIUDAD_NACIMIENTO_CAJ, $FECHA_NACIMIENTO_CAJ, $DIRECCION_CAJ, $TELEFONO_CAJ, $EMAIL_CAJ, $ESTADO_CAJ));

        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarCajero($ID) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from TBL_CAJERO where ID_CAJ=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($ID));
        Database::disconnect();
    }

    public function actualizarCajero($ID_CAJ,$CEDULA_CAJ, $NOMBRES_CAJ, $APELLIDOS_CAJ, $CIUDAD_NACIMIENTO_CAJ, $FECHA_NACIMIENTO_CAJ, $DIRECCION_CAJ, $TELEFONO_CAJ, $EMAIL_CAJ, $ESTADO_CAJ) {

           $pdo = Database::connect();
        $sql = "update tbl_cajeros set cedula_caj=?, nombres_caj=?,apellidos_caj=?,ciudad_nacimiento_caj=?,fecha_nacimiento_caj=?,direccion_caj=?,telefono_caj=?,email_caj=?,estado_caj=? where id_caj=?";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($CEDULA_CAJ, $NOMBRES_CAJ, $APELLIDOS_CAJ, $CIUDAD_NACIMIENTO_CAJ, $FECHA_NACIMIENTO_CAJ, $DIRECCION_CAJ, $TELEFONO_CAJ, $EMAIL_CAJ, $ESTADO_CAJ, $ID_CAJ));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

}
