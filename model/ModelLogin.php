<?php

include_once 'Database.php';
include_once 'Usuario.php';

class ModelLogin {

    public function verificacionUsuario($usuario, $contrasena) {

        $pdo = Database::connect();
        $sql = "SELECT u.id_usu,u.tipo_usu,c.cedula_caj,c.nombres_caj,c.apellidos_caj,u.nombre_usu,u.pass_usu FROM tbl_usuarios u INNER join tbl_cajeros c on u.id_caj=c.id_caj where u.nombre_usu=? and u.pass_usu=?";
        $consulta = $pdo->prepare($sql);
        
        $consulta->execute(array($usuario, $contrasena));
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        $atributo = new Usuario();
        $atributo->setID_USU($dato['id_usu']);
        $atributo->setTIPO_USU($dato['tipo_usu']);
        $atributo->setCEDULA_USU($dato['cedula_caj']);
        $atributo->setNOMBRES_USU($dato['nombres_caj']);
        $atributo->setAPELLIDOS_USU($dato['apellidos_caj']);
        $atributo->setNOMBRE_USU($dato['nombre_usu']);
        $atributo->setPASS_USU($dato['pass_usu']);

        Database::disconnect();

        return $atributo;
    }

}
