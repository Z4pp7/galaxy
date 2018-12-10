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
include_once 'Cliente.php';

class ModelCliente {

    public function getClientes() {

        $pdo = Database::connect();
        $sql = "select * from tbl_clientes";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $dato) {
            $atributo = new Cliente();
            $atributo->setID_CLI($dato['id_cli']);
            $atributo->setCEDULA_CLI($dato['cedula_cli']);
            $atributo->setNOMBRES_CLI($dato['nombres_cli']);
            $atributo->setAPELLIDOS_CLI($dato['apellidos_cli']);
            $atributo->setCIUDAD_NACIMIENTO_CLI($dato['ciudad_nacimiento_cli']);
            $atributo->setFECHA_NACIMIENTO_CLI($dato['fecha_nacimiento_cli']);
            $atributo->setDIRECCION_CLI($dato['direccion_cli']);
            $atributo->setTELEFONO_CLI($dato['telefono_cli']);
            $atributo->setEMAIL_CLI($dato['email_cli']);
            array_push($listado, $atributo);
        }
        Database::disconnect();
        return $listado;
    }

    public function getCliente($ID) {

        $pdo = Database::connect();
        $sql = "select * from tbl_clientes where id_cli=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($ID));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $atributo = new Cliente();
        $atributo->setID_CLI($dato['id_cli']);
        $atributo->setCEDULA_CLI($dato['cedula_cli']);
        $atributo->setNOMBRES_CLI($dato['nombres_cli']);
        $atributo->setAPELLIDOS_CLI($dato['apellidos_cli']);
        $atributo->setCIUDAD_NACIMIENTO_CLI($dato['ciudad_nacimiento_cli']);
        $atributo->setFECHA_NACIMIENTO_CLI($dato['fecha_nacimiento_cli']);
        $atributo->setDIRECCION_CLI($dato['direccion_cli']);
        $atributo->setTELEFONO_CLI($dato['telefono_cli']);
        $atributo->setEMAIL_CLI($dato['email_cli']);
        Database::disconnect();
        return $atributo;
    }

    public function crearCliente($CEDULA_CLI, $NOMBRES_CLI, $APELLIDOS_CLI, $CIUDAD_NACIMIENTO_CLI, $FECHA_NACIMIENTO_CLI, $DIRECCION_CLI, $TELEFONO_CLI, $EMAIL_CLI) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into tbl_clientes (cedula_cli, nombres_cli,apellidos_cli,ciudad_nacimiento_cli,fecha_nacimiento_cli,direccion_cli,telefono_cli,email_cli) values(?,?,?,?,?,?,?,?)";

        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($CEDULA_CLI, $NOMBRES_CLI, $APELLIDOS_CLI, $CIUDAD_NACIMIENTO_CLI, $FECHA_NACIMIENTO_CLI, $DIRECCION_CLI, $TELEFONO_CLI, $EMAIL_CLI));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarCliente($ID) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from tbl_clientes where id_cli=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($ID));
        Database::disconnect();
    }

    public function actualizarCliente($ID_CLI, $CEDULA_CLI, $NOMBRES_CLI, $APELLIDOS_CLI, $CIUDAD_NACIMIENTO_CLI, $FECHA_NACIMIENTO_CLI, $DIRECCION_CLI, $TELEFONO_CLI, $EMAIL_CLI) {

        $pdo = Database::connect();
        $sql = "update tbl_clientes set cedula_cli=?, nombres_cli=?,apellidos_cli=?,ciudad_nacimiento_cli=?,fecha_nacimiento_cli=?,direccion_cli=?,telefono_cli=?,email_cli=? where id_cli=?";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($CEDULA_CLI, $NOMBRES_CLI, $APELLIDOS_CLI, $CIUDAD_NACIMIENTO_CLI, $FECHA_NACIMIENTO_CLI, $DIRECCION_CLI, $TELEFONO_CLI, $EMAIL_CLI, $ID_CLI));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

}
