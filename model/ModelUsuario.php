<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelUsuario
 *
 * @author jorgi
 */
include_once 'Database.php';
include_once 'Usuario.php';

class ModelUsuario {

    public function getUsuarios() {

        $pdo = Database::connect();
        $sql = "select u.id_usu,u.tipo_usu, c.cedula_caj,c.nombres_caj,c.apellidos_caj,u.nombre_usu,u.pass_usu from tbl_usuarios u inner join tbl_cajeros c on u.id_caj=c.id_caj;";
                $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $dato) {
            $atributo = new Usuario();
            $atributo->setID_USU($dato['id_usu']);
            $atributo->setTIPO_USU($dato['tipo_usu']);
            $atributo->setCEDULA_USU($dato['cedula_caj']);
            $atributo->setNOMBRES_USU($dato['nombres_caj']);
            $atributo->setAPELLIDOS_USU($dato['apellidos_caj']);
            $atributo->setNOMBRE_USU($dato['nombre_usu']);
            $atributo->setPASS_USU($dato['pass_usu']);
            array_push($listado, $atributo);
        }
        Database::disconnect();
        return $listado;
    }

    public function getUsuario($ID) {

        $pdo = Database::connect();
        $sql = "SELECT u.id_usu,u.tipo_usu, c.cedula_caj,c.nombres_caj,c.apellidos_caj,c.id_caj,u.nombre_usu,u.pass_usu FROM tbl_usuarios u INNER join tbl_cajeros c on u.id_caj=c.id_caj where id_usu=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($ID));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $atributo = new Usuario();
        $atributo->setID_USU($dato['id_usu']);
        $atributo->setID_CAJ($dato['id_caj']);
        $atributo->setTIPO_USU($dato['tipo_usu']);
        $atributo->setCEDULA_USU($dato['cedula_caj']);
        $atributo->setNOMBRES_USU($dato['nombres_caj']);
        $atributo->setAPELLIDOS_USU($dato['apellidos_caj']);
        $atributo->setNOMBRE_USU($dato['nombre_usu']);
        $atributo->setPASS_USU($dato['pass_usu']);
        Database::disconnect();
        return $atributo;
    }

    public function crearUsuario($ID_CAJ, $TIPO_USU, $NOMBRE_USU, $PASS_USU) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into tbl_usuarios (id_caj,tipo_usu,nombre_usu,pass_usu) values(?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($ID_CAJ, $TIPO_USU, $NOMBRE_USU, $PASS_USU));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarUsuario($ID) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from tbl_usuarios where id_usu=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($ID));
        Database::disconnect();
    }

    public function actualizarUsuario($ID_USU, $ID_CAJ, $TIPO_USU, $NOMBRE_USU, $PASS_USU) {

        $pdo = Database::connect();
        $sql = "update TBL_USUARIOS set ID_CAJ=?,TIPO_USU=?,NOMBRE_USU=?,PASS_USU=? where ID_USU=?";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($ID_CAJ, $TIPO_USU, $NOMBRE_USU, $PASS_USU,$ID_USU));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

}
