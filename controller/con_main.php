<?php

require_once '../model/ModelCajero.php';
session_start();
$opcion = $_REQUEST['opcion'];
$cajero = new ModelCajero();

switch ($opcion) {

    case 'entrar':

        $listaCajeros = $cajero->getCajeros();
        $_SESSION['listaCajeros'] = serialize($listaCajeros);


        header('Location: ../view/home/index.php');
        break;


    case 'guardar_cajero':


        $CEDULA_CAJ = $_REQUEST['cedula'];
        $NOMBRES_CAJ = $_REQUEST['nombres'];
        $APELLIDOS_CAJ = $_REQUEST['apellidos'];
        $CIUDAD_NACIMIENTO_CAJ = $_REQUEST['ciudad'];
        $FECHA_NACIMIENTO_CAJ = $_REQUEST['fecha'];
        $DIRECCION_CAJ = $_REQUEST['direccion'];
        $TELEFONO_CAJ = $_REQUEST['telefono'];
        $EMAIL_CAJ = $_REQUEST['correo'];
        $ESTADO_CAJ = $_REQUEST['estado'];
        $cajero->crearCajero($CEDULA_CAJ, $NOMBRES_CAJ, $APELLIDOS_CAJ, $CIUDAD_NACIMIENTO_CAJ, $FECHA_NACIMIENTO_CAJ, $DIRECCION_CAJ, $TELEFONO_CAJ, $EMAIL_CAJ, $ESTADO_CAJ);
        $listaCajeros = $cajero->getCajeros();
        $_SESSION['listaCajeros'] = serialize($listaCajeros);
        header('Location: ../view/cajeros/index.php');
        break;


    case 'cargar_cajero':
        $ID_CAJ = $_REQUEST['id'];
        $caj = $cajero->getCajero($ID_CAJ);
        $_SESSION['cajero'] = serialize($caj);
        header('Location: ../view/cajeros/cargar.php');
        break;

    case 'actualizar_cajero':

        $ID_CAJ = $_REQUEST['id_cajero'];
        $CEDULA_CAJ = $_REQUEST['cedula'];
        $NOMBRES_CAJ = $_REQUEST['nombres'];
        $APELLIDOS_CAJ = $_REQUEST['apellidos'];
        $CIUDAD_NACIMIENTO_CAJ = $_REQUEST['ciudad'];
        $FECHA_NACIMIENTO_CAJ = $_REQUEST['fecha'];
        $DIRECCION_CAJ = $_REQUEST['direccion'];
        $TELEFONO_CAJ = $_REQUEST['telefono'];
        $EMAIL_CAJ = $_REQUEST['correo'];
        $ESTADO_CAJ = $_REQUEST['estado'];
        $cajero->actualizarCajero($ID_CAJ, $CEDULA_CAJ, $NOMBRES_CAJ, $APELLIDOS_CAJ, $CIUDAD_NACIMIENTO_CAJ, $FECHA_NACIMIENTO_CAJ, $DIRECCION_CAJ, $TELEFONO_CAJ, $EMAIL_CAJ, $ESTADO_CAJ);
        $listaCajeros = $cajero->getCajeros();
        $_SESSION['listaCajeros'] = serialize($listaCajeros);
        header('Location: ../view/cajeros/index.php');
        break;



    default:
        header('Location: ../view/cajeros/cargar.php');
}

