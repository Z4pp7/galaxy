<?php

require_once '../model/ModelLogin.php';
require_once '../model/ModelCajero.php';
require_once '../model/ModelUsuario.php';
require_once '../model/ModelCliente.php';
require_once '../model/ModelTraje.php';
require_once '../model/ModelAlquiler.php';
session_start();
$opcion = $_REQUEST['opcion'];
$login = new ModelLogin();
$cajero = new ModelCajero();
$usuario = new ModelUsuario();
$cliente = new ModelCliente();
$traje = new ModelTraje();
$alquiler = new ModelAlquiler();

switch ($opcion) {

    case 'entrar':



        $user = $_REQUEST['usuario'];
        $contrasena = $_REQUEST['contrasena'];
        $sesion = $login->verificacionUsuario($user, $contrasena);

        if ($sesion->getNOMBRE_USU() == $user && $sesion->getPASS_USU() == $contrasena) {


            $_SESSION['sesion'] = serialize($sesion);
            $_SESSION["login"] = "login";

            if ($sesion->getTIPO_USU() === "Administrador") {



                $listaAlquiler = $alquiler->getAlquiler();
                $_SESSION['listaAlquileres'] = serialize($listaAlquiler);

                $listaTrajes = $traje->getTrajes();
                $_SESSION['listaTrajes'] = serialize($listaTrajes);

                $listaUsuarios = $usuario->getUsuarios();
                $_SESSION['listaUsuarios'] = serialize($listaUsuarios);

                $listaClientes = $cliente->getClientes();
                $_SESSION['listaClientes'] = serialize($listaClientes);

                $listaCajeros = $cajero->getCajeros();
                $_SESSION['listaCajeros'] = serialize($listaCajeros);
                header('Location: ../view/home/index.php');
            } else {

                $listaTrajes = $traje->getTrajes();
                $_SESSION['listaTrajes'] = serialize($listaTrajes);

                $listaUsuarios = $usuario->getUsuarios();
                $_SESSION['listaUsuarios'] = serialize($listaUsuarios);

                $listaAlquiler = $alquiler->getAlquiler();
                $_SESSION['listaAlquileres'] = serialize($listaAlquiler);


                $listaClientes = $cliente->getClientes();
                $_SESSION['listaClientes'] = serialize($listaClientes);

                $listaCajeros = $cajero->getCajeros();
                $_SESSION['listaCajeros'] = serialize($listaCajeros);
                header('Location: ../view/home/index.php');

//                header('Location: ../view/homeCajero/index.php');
            }
        } else {
            header('Location: ../index.php');
        }


        break;


    // CAJERO
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

    // USUARIO

    case 'guardar_usuario':
        $ID_CAJ = $_REQUEST['cajero'];
        $TIPO_USU = $_REQUEST['tipo'];
        $NOMBRE_USU = $_REQUEST['nombre'];
        $PASS_USU = $_REQUEST['contrasena'];
        $usuario->crearUsuario($ID_CAJ, $TIPO_USU, $NOMBRE_USU, $PASS_USU);
        $listaUsuarios = $usuario->getUsuarios();
        $_SESSION['listaUsuarios'] = serialize($listaUsuarios);
        header('Location: ../view/usuarios/index.php');
        break;
    case 'eliminar_usuario':
        $ID_USU = $_REQUEST['id'];
        $usuario->eliminarUsuario($ID_USU);
        $listaUsuarios = $usuario->getUsuarios();
        $_SESSION['listaUsuarios'] = serialize($listaUsuarios);
        header('Location: ../view/usuarios/index.php');
        break;
    case 'cargar_usuario':
        $ID_USU = $_REQUEST['id'];
        $usu = $usuario->getUsuario($ID_USU);
        $_SESSION['usuario'] = serialize($usu);
        header('Location: ../view/usuarios/cargar.php');
        break;
    case 'actualizar_usuario':
        $ID_USU = $_REQUEST['id_usuario'];
        $ID_CAJ = $_REQUEST['cajero'];
        $TIPO_USU = $_REQUEST['tipo'];
        $NOMBRE_USU = $_REQUEST['nombre'];
        $PASS_USU = $_REQUEST['contrasena'];
        $usuario->actualizarUsuario($ID_USU, $ID_CAJ, $TIPO_USU, $NOMBRE_USU, $PASS_USU);
        $listaUsuarios = $usuario->getUsuarios();
        $_SESSION['listaUsuarios'] = serialize($listaUsuarios);
        header('Location: ../view/usuarios/index.php');
        break;

    //CLIENTE

    case 'guardar_cliente':


        $CEDULA_CLI = $_REQUEST['cedula'];
        $NOMBRES_CLI = $_REQUEST['nombres'];
        $APELLIDOS_CLI = $_REQUEST['apellidos'];
        $CIUDAD_NACIMIENTO_CLI = $_REQUEST['ciudad'];
        $FECHA_NACIMIENTO_CLI = $_REQUEST['fecha'];
        $DIRECCION_CLI = $_REQUEST['direccion'];
        $TELEFONO_CLI = $_REQUEST['telefono'];
        $EMAIL_CLI = $_REQUEST['correo'];

        $cliente->crearCliente($CEDULA_CLI, $NOMBRES_CLI, $APELLIDOS_CLI, $CIUDAD_NACIMIENTO_CLI, $FECHA_NACIMIENTO_CLI, $DIRECCION_CLI, $TELEFONO_CLI, $EMAIL_CLI);
        $listaClientes = $cliente->getClientes();
        $_SESSION['listaClientes'] = serialize($listaClientes);
        header('Location: ../view/clientes/index.php');
        break;

    case 'cargar_cliente':
        $ID = $_REQUEST['id'];
        $cli = $cliente->getCliente($ID);
        $_SESSION['cliente'] = serialize($cli);
        header('Location: ../view/clientes/cargar.php');
        break;

    case 'eliminar_cliente':
        $ID_CLI = $_REQUEST['id'];
        $cliente->eliminarCliente($ID_CLI);
        $listaClientes = $cliente->getClientes();
        $_SESSION['listaClientes'] = serialize($listaClientes);
        header('Location: ../view/clientes/index.php');
        break;

    case 'actualizar_cliente':

        $ID_CLI = $_REQUEST['id_cliente'];
        $CEDULA_CLI = $_REQUEST['cedula'];
        $NOMBRES_CLI = $_REQUEST['nombres'];
        $APELLIDOS_CLI = $_REQUEST['apellidos'];
        $CIUDAD_NACIMIENTO_CLI = $_REQUEST['ciudad'];
        $FECHA_NACIMIENTO_CLI = $_REQUEST['fecha'];
        $DIRECCION_CLI = $_REQUEST['direccion'];
        $TELEFONO_CLI = $_REQUEST['telefono'];
        $EMAIL_CLI = $_REQUEST['correo'];
        $cliente->actualizarCliente($ID_CLI, $CEDULA_CLI, $NOMBRES_CLI, $APELLIDOS_CLI, $CIUDAD_NACIMIENTO_CLI, $FECHA_NACIMIENTO_CLI, $DIRECCION_CLI, $TELEFONO_CLI, $EMAIL_CLI);
        $listaClientes = $cliente->getClientes();
        $_SESSION['listaClientes'] = serialize($listaClientes);
        header('Location: ../view/clientes/index.php');
        break;


    // TRAJES

    case 'guardar_traje':


        $COD_TRA = $_REQUEST['codigo'];
        $CATEGORIA_TRA = $_REQUEST['categoria'];
        $DESCRIPCION_TRA = $_REQUEST['descripcion'];
        $NUM_PRENDAS_TRA = $_REQUEST['numero'];
        $traje->crearTraje($COD_TRA, $CATEGORIA_TRA, $DESCRIPCION_TRA, $NUM_PRENDAS_TRA);
        $listaTrajes = $traje->getTrajes();
        $_SESSION['listaTrajes'] = serialize($listaTrajes);
        header('Location: ../view/trajes/index.php');
        break;

    case 'cargar_traje':
        $ID = $_REQUEST['id'];
        $tra = $traje->getTraje($ID);
        $_SESSION['traje'] = serialize($tra);
        header('Location: ../view/trajes/cargar.php');
        break;

    case 'eliminar_traje':
        $ID = $_REQUEST['id'];
        $traje->eliminarTraje($ID);
        $listaTrajes = $traje->getTrajes();
        $_SESSION['listaTrajes'] = serialize($listaTrajes);
        header('Location: ../view/trajes/index.php');
        break;

    case 'actualizar_traje':

        $ID_TRA = $_REQUEST['id_traje'];
        $COD_TRA = $_REQUEST['codigo'];
        $CATEGORIA_TRA = $_REQUEST['categoria'];
        $DESCRIPCION_TRA = $_REQUEST['descripcion'];
        $NUM_PRENDAS_TRA = $_REQUEST['numero'];
        $traje->actualizarTraje($ID_TRA, $COD_TRA, $CATEGORIA_TRA, $DESCRIPCION_TRA, $NUM_PRENDAS_TRA);


        $listaTrajes = $traje->getTrajes();
        $_SESSION['listaTrajes'] = serialize($listaTrajes);
        header('Location: ../view/trajes/index.php');
        break;

    //ALQUILER

    case 'guardar_alquiler':


        $CLIENTE = $_REQUEST['cliente'];
        $CAJERO = $_REQUEST['cajero'];
        $TRAJE = $_REQUEST['traje'];
        $FECHA_INICIO = $_REQUEST['tiempo_ini'];
        $FECHA_FIN = $_REQUEST['tiempo_fin'];
        $VALOR = $_REQUEST['valor'];

        $alquiler->crearAlquiler($CLIENTE, $CAJERO, $TRAJE, $FECHA_INICIO, $FECHA_FIN, $VALOR);
        $listaAlquiler = $alquiler->getAlquiler();
        $_SESSION['listaAlquileres'] = serialize($listaAlquiler);

        header('Location: ../view/trajes/index.php');
        break;




    default:
        header('Location: ../home/index.php');
}

