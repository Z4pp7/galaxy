<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelTraje
 *
 * @author jorgi
 */
include_once 'Database.php';
include_once 'Traje.php';

class ModelTraje {

    public function getTrajes() {

        $pdo = Database::connect();
        $sql = "select * from tbl_trajes";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $dato) {
            $atributo = new Traje();
            $atributo->setID_TRA($dato['id_tra']);
            $atributo->setCOD_TRA($dato['cod_tra']);
            $atributo->setCATEGORIA_TRA($dato['categoria_tra']);
            $atributo->setDESCRIPCION_TRA($dato['descripcion_tra']);
            $atributo->setNUM_PRENDAS_TRA($dato['num_prendas_tra']);
            array_push($listado, $atributo);
        }
        Database::disconnect();
        return $listado;
    }

    public function getTraje($ID) {

        $pdo = Database::connect();
        $sql = "select * from tbl_trajes where id_tra=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($ID));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $atributo = new Traje();
        $atributo->setID_TRA($dato['id_tra']);
        $atributo->setCOD_TRA($dato['cod_tra']);
        $atributo->setCATEGORIA_TRA($dato['categoria_tra']);
        $atributo->setDESCRIPCION_TRA($dato['descripcion_tra']);
        $atributo->setNUM_PRENDAS_TRA($dato['num_prendas_tra']);
        Database::disconnect();
        return $atributo;
    }

    public function crearTraje($COD_TRA, $CATEGORIA_TRA, $DESCRIPCION_TRA, $NUM_PRENDAS_TRA) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "insert into tbl_trajes (cod_tra,categoria_tra,descripcion_tra,num_prendas_tra) values(?,?,?,?)";

        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($COD_TRA, $CATEGORIA_TRA, $DESCRIPCION_TRA, $NUM_PRENDAS_TRA));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

    public function eliminarTraje($ID) {

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from tbl_trajes where id_tra=?";
        $consulta = $pdo->prepare($sql);
        $consulta->execute(array($ID));
        Database::disconnect();
    }

    public function actualizarTraje($ID_TRA, $COD_TRA, $CATEGORIA_TRA, $DESCRIPCION_TRA, $NUM_PRENDAS_TRA) {

        $pdo = Database::connect();
        $sql = "update tbl_trajes set cod_tra=?,categoria_tra=?,descripcion_tra=?,num_prendas_tra=? where id_tra=?";
        $consulta = $pdo->prepare($sql);
        try {
            $consulta->execute(array($COD_TRA, $CATEGORIA_TRA, $DESCRIPCION_TRA, $NUM_PRENDAS_TRA, $ID_TRA));
        } catch (PDOException $e) {
            Database::disconnect();
            throw new Exception($e->getMessage());
        }
        Database::disconnect();
    }

}
