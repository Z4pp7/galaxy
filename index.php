<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio de Sesión</title>
        <link rel="stylesheet" type="text/css" href="view/css/fontawesome-all.css">
        <link rel="stylesheet" type="text/css" href="view/css/login.css">
        <link rel="shortcut icon" href="view/img/planet.ico" />
        <script type="text/javascript" src="js/validaciones.js"></script>
    </head>
    <body>

        <section class="titulo">
            <h1>GALAXY</h1>
            <p>ALQUILER DE TRAJES</p>
        </section>

        <br>
        <form action="controller/con_main.php">
                <div><i class="ico_usuario fas fa-user-tie" aria-hidden="true"></i>
                        <input type="text" name="usuario" placeholder="Usuario" class="nombre" required/></div>
                <div><i class="ico_password fas fa-unlock-alt" aria-hidden="true"></i>
                    <input type="password" name="contrasena" placeholder="Contraseña" class="password" required/></div>
                <input type="hidden" value="entrar" name="opcion">
                <div><button type="submit" class="button-ingresar">
                        INGRESAR
                    </button></div>
            </form>
        </br>
    </body>
</html>
