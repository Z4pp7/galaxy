<?php

session_start();
$opcion = $_REQUEST['opcion'];

switch ($opcion) {

    case 'entrar':

          header('Location: ../view/home/index.php');
          break;
    default:
        header('Location: ../index.php');
}

