

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include("../../controller/iniciarSesion.php");
include '../../model/Usuario.php';
include '../../model/Cajero.php';

$login = unserialize($_SESSION['sesion']);
?>
<html>
    <head>
        <meta charset="UTF-8"> 
        <title>Registro</title>
        <link rel="stylesheet" type="text/css" href="../css/fontawesome-all.css">
        <script src="../js/jquery-2.1.4.js"></script>
        <script src="../js/bootstrap-table.js"></script>
        <link href="../css/bootstrap-table.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/jquery.dataTables.min.js"></script>
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
                        <a href="../proveedores/index.php"><i class="ico_ d fas fa-dolly" aria-hidden="true"></i> Proveedores</a>
                        <a href="../productos/index.php"><i class="ico_b fas fa-box" aria-hidden="true"></i> Productos</a>
                        <a href="../facturas/index.php"><i class="ico_f fas fa-file-alt"></i> Facturas</a><br>
                        <hr style="width:75%; margin-left: 11%;">
                        <a href="../../controller/cerrarSesion.php"><i class="ico_a fas fa-sign-out-alt"></i> Cerrar sesión</a><br>
                    </div>

                    <script>
                        function openSideMenu()
                        {
                            document.getElementById('side-menu').style.width = '150px';
                            document.getElementById('principal').style.marginLeft = '150px';
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
                        <p>MÓDULO COMPRAS</p>
                        <div class="logueado"> <i class="ico_logueado fa fa-user" aria-hidden="true"></i> <?php echo $login->getNOMBRES_USU() . " " . $login->getAPELLIDOS_USU(); ?></div>

                        <h1>REGISTRO DE CAJEROS</h1>       
                    </section>

                    <div id="contenedor">
                        <div id="lateral2">
                            <?php
                            $caj = unserialize($_SESSION['cajero']);
                            ?>
                            <form action="../../controller/controller.php" name="form">
                                <section class="datos">
                                    <div>Id</div>
                                    <i class="ico_keyid fas fa-key" aria-hidden="true"></i>
                                    <input type="text" name="id_cajero" value="<?php echo $caj->getID_CAJ(); ?>"placeholder="Usuario" readonly="readonly"class="cedula" required/></br>

                                    <div>Cédula/RUC/Pasaporte</div>
                                    <i class="ico_cedula fa fa-id-card" aria-hidden="true"></i>
                                    <input type="text" 
                                           name="cedula" 
                                           id="ced"
                                           placeholder="Cédula"  
                                           onkeypress="return soloNumeros(event);" 
                                           oninput="validarced();" 
                                           maxlength="10"
                                           class="cedula"
                                           value="<?php echo $caj->getCEDULA_CAJ(); ?>"
                                           required/></br>
                                    <div>Nombres/Apellidos</div>
                                    <i class="ico_user fa fa-user" aria-hidden="true"></i>
                                    <input type="text" 
                                           name="nombres"
                                           oninput="soloLetras(event);" 
                                           placeholder="Nombres" 
                                           class="nombre" 
                                           required 
                                           value="<?php echo $caj->getNOMBRES_CAJ(); ?>"

                                           /></br>
                                    <input type="text" 
                                           name="apellidos"
                                           oninput="soloLetras(event);" 
                                           placeholder="Apellidos" 
                                           class="apellido" 
                                           required 
                                           value="<?php echo $caj->getAPELLIDOS_CAJ(); ?>"

                                           /></br>

                                    <div>Fecha de nacimiento</div>
                                    <i class="ico_calendario far fa-calendar-alt" aria-hidden="true"></i>
                                    <input type="date"
                                           name="fecha" 
                                           placeholder="dd/mm/aaaa" 
                                           class="fecha" 
                                           value="<?php echo $caj->getFECHA_NACIMIENTO_CAJ(); ?>"
                                           required/></br>  
                                    <div>Ciudad de nacimiento</div>
                                    <i class="ico_ciudad fas fa-map-signs"></i>
                                    <input type="text" 
                                           name="ciudad"
                                           oninput="soloLetras(event);" 
                                           placeholder="Ciudad" 
                                           class="ciudad" 
                                           required 
                                           value="<?php echo $caj->getCIUDAD_NACIMIENTO_CAJ(); ?>"

                                           /></br>
                                    <div>Dirección</div>
                                    <i class="ico_direccion fas fa-map-marker-alt" aria-hidden="true"></i>
                                    <input type="text" 
                                           name="direccion" 
                                           placeholder="Dirección" 
                                           class="direccion" 
                                           id="direccion"  
                                           required
                                           value="<?php echo $caj->getDIRECCION_CAJ(); ?>"

                                           /></br>
                                    <div>Teléfono</div>
                                    <i class="ico_telefono fas fa-mobile-alt" aria-hidden="true"></i>
                                    <input type="text" 
                                           name="telefono" 
                                           onkeypress="return soloNumeros(event);" 
                                           placeholder="Teléfono" 
                                           class="telefono" 
                                           id="telefono"  
                                           required
                                           value="<?php echo $caj->getTELEFONO_CAJ(); ?>"
                                           /></br>
                                    <div>Correo electrónico</div>
                                    <i class="ico_correo far fa-envelope" aria-hidden="true"></i>
                                    <input type="text" 
                                           name="correo"
                                           placeholder="Correo electrónico" 
                                           class="correo" 
                                           value="<?php echo $caj->getEMAIL_CAJ(); ?>"
                                           required/></b>
                                    <div>Estado</div>
                                    <i class="ico_estaod fas fa-power-off" aria-hidden="true"></i>
                                    <select name="estado" class="tipo" >
                                        <option value="<?php echo $caj->getESTADO_CAJ(); ?>"><?php echo $caj->getESTADO_CAJ(); ?></option>
                                        <option value="Activo" >Activo</option> 
                                        <option value="Inactivo">Inactivo</option> 
                                    </select></br>
                                    <input type="hidden" value="actualizar_cajero" name="opcion">
                                    <button type="submit" class="button-guardar" name="validar" >
                                        <i class="ico_guardar far fa-save" aria-hidden="true"></i>
                                    </button>
                                </section>
                            </form>

                        </div>
                        <div id="principal2">
                            <section class="datosTabla">

                                <table  id="tablaEmple" class="display" data-toggle="table"> 
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>CÉDULA</th>
                                            <th>NOMBRES</th>
                                            <th>APELLIDOS</th>
                                            <th>CIUDAD DE NACIMIENTO</th>
                                            <th>FECHA DE NACIMIENTO</th> 
                                            <th>DIRECCIÓN</th>
                                            <th>TELÉFONO</th>
                                            <th>EMAIL</th>
                                            <th>ESTADO</th>
                                            <th>ACTUALIZAR</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($_SESSION['listaCajeros'])) {

                                            $registro = unserialize($_SESSION['listaCajeros']);

                                            foreach ($registro as $dato) {
                                                echo "<tr>";
                                                echo "<td>" . $dato->getID_CAJ() . "</td>";
                                                echo "<td>" . $dato->getCEDULA_CAJ() . "</td>";
                                                echo "<td>" . $dato->getNOMBRES_CAJ() . "</td>";
                                                echo "<td>" . $dato->getAPELLIDOS_CAJ() . "</td>";
                                                echo "<td>" . $dato->getCIUDAD_NACIMIENTO_CAJ() . "</td>";
                                                echo "<td>" . $dato->getFECHA_NACIMIENTO_CAJ() . "</td>";
                                                echo "<td>" . $dato->getDIRECCION_CAJ() . "</td>";
                                                echo "<td>" . $dato->getTELEFONO_CAJ() . "</td>";
                                                echo "<td>" . $dato->getEMAIL_CAJ() . "</td>";
                                                echo "<td>" . $dato->getESTADO_CAJ() . "</td>";
                                                echo "<td><a href='../../controller/controller.php?opcion=cargar_cajero&id=" . $dato->getID_CAJ() . "' class=\"actualizar\"><i class=\"ico_actualizar fas fa-pencil-alt\" aria-hidden=\"true\"></i></a></td>";

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
