

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include("../../controller/iniciarSesion.php");
include '../../model/Usuario.php';
include '../../model/Traje.php';

$login = unserialize($_SESSION['sesion']);
?>
<html>
    <head>
        <meta charset="UTF-8"> 
        <title>Registro</title>

        <script src="../js/jquery-2.1.4.js"></script>
        <script src="../js/bootstrap-table.js"></script>
        <link href="../css/bootstrap-table.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/jquery.dataTables.min.js"></script>
        <link rel="shortcut icon" href="../img/planet.ico" />



        <link rel="stylesheet" type="text/css" href="../css/fontawesome-all.css">
        <link rel="stylesheet" type="text/css" href="../css/registroCajeros.css">
        <link rel="stylesheet" type="text/css" href="../css/menuToggle.css">


        <script>
            $(document).ready(function () {
                $('#tablaEmple').DataTable();
            });
        </script>



    </head>

    <body onload="openSideMenu()">

        <div id="contenedor"> 

            <div id="cuerpo"> 
                <div id="lateral">


                    <nav class="navbar">
                        <span class="open-slide">
                            <a href="#" onclick="openSideMenu()" >
                                <svg width="30" height="30">
                                <path d="M0,2 20,2" stroke="#777777" stroke-width="2"/>
                                <path d="M0,6 20,6" stroke="#777777" stroke-width="2"/>
                                <path d="M0,10 20,10" stroke="#777777" stroke-width="2"/>
                            </a>
                        </span>


                    </nav>
                    <div id="side-menu" class="side-nav">
                        <a href="#" class="btn_close" onclick="closeSideMenu()">  
                            <svg width="30" height="12">
                            <path d="M0,2 20,2" stroke="#fff" stroke-width="2"/>
                            <path d="M0,6 20,6" stroke="#fff" stroke-width="2"/>
                            <path d="M0,10 20,10" stroke="#fff" stroke-width="2"/>
                        </a>

                        <a href="../home/index.php" > <i class="fa fa-home" aria-hidden="true"></i> Inicio</a>
                        <a href="../cajeros/index.php" > <i class="ico_t fas fa-user-tie"></i> Cajeros</a>
                        <a href="../usuarios/index.php"><i class="ico_u fa fa-user" aria-hidden="true"></i> Usuarios</a>
                        <a href="../clientes/index.php"><i class="ico_ d fas fa-user-tag" aria-hidden="true"></i> Clientes</a>
                        <a href="../trajes/index.php"><i class="ico_b fas fa-tshirt" aria-hidden="true"></i> Trajes</a>
                        <a href="../alquiler/index.php"><i class="ico_f fas fa-stopwatch"></i> Alquiler</a><br>
                        <hr style="width:75%; margin-left: 11%;">
                        <a href="../../controller/cerrarSesion.php"><i class="ico_a fas fa-sign-out-alt"></i> Cerrar sesión</a><br>
                    </div>

                    <script>
                        function openSideMenu()
                        {
                            document.getElementById('side-menu').style.width = '175px';
                            document.getElementById('principal').style.marginLeft = '175px';
                        }
                        function closeSideMenu()
                        {
                            document.getElementById('side-menu').style.width = '0px';
                            document.getElementById('principal').style.marginLeft = '0px';
                        }
                    </script>

                </div>
                <div id="principal"> 

                    <section class="titulo_menu">
                        <p>GALAXY</p>
                        <div class="logueado"> <i class="ico_logueado fa fa-user" aria-hidden="true"></i> <?php echo $login->getNOMBRES_USU() . " " . $login->getAPELLIDOS_USU(); ?></div>

                        <h1>REGISTRO DE TRAJES</h1>       
                    </section>

                    <div id="contenedor">
                        <div id="lateral2">
                            <form action="../../controller/con_main.php" name="form">
                                <section class="datos">
                                    <div>Código</div>
                                    <i class="ico_cedula fas fa-barcode" aria-hidden="true"></i>
                                    <input type="text" 
                                           name="codigo" 
                                           id="ced"
                                           placeholder="Código"  
                                           oninput="validarced();" 
                                           maxlength="10"
                                           class="cedula"
                                           required/></br>
                                    <div>Categoría</div>
                                    <i class="ico_user fas fa-tag" aria-hidden="true"></i>
                                    <input type="text" 
                                           name="categoria"
                                           oninput="soloLetras(event);" 
                                           placeholder="Categoria" 
                                           class="nombre" 
                                           required 

                                           /></br>

                                    <div>Descripción</div>
                                    <i class="ico_ciudad fas fa-comment-alt"></i>
                                    <input type="text" 
                                           name="descripcion"
                                           oninput="soloLetras(event);" 
                                           placeholder="Descripción" 
                                           class="ciudad" 
                                           required 

                                           /></br>
                                    <div>Numero de prendas</div>
                                    <i class="ico_direccion fas fa-hashtag" aria-hidden="true"></i>
                                    <input type="text" 
                                           name="numero" 
                                           placeholder="N° prendas" 
                                           class="direccion" 
                                           id="direccion"  
                                           required

                                           /></br>
                                    <input type="hidden" value="guardar_traje" name="opcion">
                                    <button type="submit" class="button-guardar" name="validar" >
                                        <i class="ico_guardar far fa-save" aria-hidden="true"></i>
                                    </button>
                                </section>
                            </form>

                        </div>
                        <div id="principal2">
                            <section class="datosTabla">

                                <table  id="tablaEmple" class="display" data-toggle="table" > 
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>CÓDIGO</th>
                                            <th>CATEGORÍA</th>
                                            <th>DESCRIPCIÓN</th>
                                            <th>N° DE PRENDAS</th>
                                            <th>ELIMINAR</th>
                                            <th>ACTUALIZAR</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($_SESSION['listaTrajes'])) {

                                            $registro = unserialize($_SESSION['listaTrajes']);

                                            foreach ($registro as $dato) {
                                                echo "<tr>";
                                                echo "<td>" . $dato->getID_TRA() . "</td>";
                                                echo "<td>" . $dato->getCOD_TRA() . "</td>";
                                                echo "<td>" . $dato->getCATEGORIA_TRA() . "</td>";
                                                echo "<td>" . $dato->getDESCRIPCION_TRA() . "</td>";
                                                echo "<td>" . $dato->getNUM_PRENDAS_TRA() . "</td>";

                                                echo "<td>
                                                    <form action=\"../../controller/con_main.php\" name=\"form\">
                            <input type=\"hidden\" value=\"eliminar_traje\" name=\"opcion\">
                            <input type=\"hidden\" value=\"" . $dato->getID_TRA() . "\" name=\"id\">
                            <button type=\"submit\" class=\"button_tbl\">
                                <i class=\"ico_borrar fas fa-trash\" aria-hidden=\"true\"></i>
                            </button> </form></td> ";



                                                echo "<td>   
                                

                        <form action=\"../../controller/con_main.php\" name=\"form\">
                            <input type=\"hidden\" value=\"cargar_traje\" name=\"opcion\">
                            <input type=\"hidden\" value=\"" . $dato->getID_TRA() . "\" name=\"id\">
                            <button type=\"submit\" class=\"button_tbl\">
                                <i class=\"ico_actualizar fas fa-pencil-alt\" aria-hidden=\"true\"></i>
                            </button> </form></td> ";

                                                echo "</tr>";
                                            }
                                        } else {
                                            
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </section>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>

</html>
