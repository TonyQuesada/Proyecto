<?php

include_once('../php_config.php');
if(!isset($_SESSION['u_ID'])) 
{ 
    header('Location: ../index.php');
} 

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../favicon.ico">
        <link rel="stylesheet" href="../css/styles_general.css">
        <link rel="stylesheet" href="../css/styles_departamento.css">
        <link rel="stylesheet" href="../icofont/icofont.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>        
    </head>
    <body>

        <div class="cabecera gradient-border">
            <div class="perfil">
                <div>
                    <a class="a" href="cuenta.php">👤 <?php echo $_SESSION['u_Nombre']; ?></a>
                    </br>
                </div>                
                <div>
                    <a class="a" href="../util/logout.php">🚪 Salir</a>
                </div>
            </div>
            <img class="logo" src="../favicon.png" width="67" height="62"> 
            <a class="a" href="../index.php"><h2 class="h2">Sistema de Gestión de Control Interno | <?php echo $_SESSION['u_Rol'] ?> </h2></a>
        </div>

        <div class="container">            
            <div class="columna_der" id="demo">
                <a class="a" href="../administrador.php">Inicio</a>
                
                <!-- Director de Área -->
                <?php if ($_SESSION['u_idRol'] == 1){ ?>                
                </br><div class="dropdown">
                        <a class="a" onclick="myFunction()" style="color: #031075; font-size: 21px; font-weight: bold;">> Metas</a>
                        <div id="myDropdown" class="dropdown-content">
                            <a class="a" href="./metas.php">Definir Metas</a>
                            <a class="a" href="./metas_seccion.php">Comunicar Definición</a>
                        </div>
                    </div>
                    </br><a class="a"href="./resultados.php"> Resultados</a>
                <?php } ?>

                <!-- Fiscalizador -->
                <?php if ($_SESSION['u_idRol'] == 2){ ?>
                    </br><a class="a" href="./asignar_roles.php"> Asignar Roles</a>
                    </br><div class="dropdown">
                        <a class="a" onclick="myFunction()">Alcance de Metas</a>
                        <div id="myDropdown" class="dropdown-content">
                            <a class="a" href="./definir_alcance_metas1.php">Definir Alcances</a>
                            <a class="a" href="./definir_alcance_metas2.php">Comunicar Apertura y Cierre del Proceso</a>
                        </div>
                    </div>
                    </br><a class="a" href="./departamentos.php"> Departamentos</a>
                    </br><a class="a" href="./direcciones.php"> Direcciones</a>
                    </br><a class="a" href="./establecer_fechas_evaluacion.php"> Establecer Fechas de Evaluación</a>
                    </br><a class="a" href="./resultados.php"> Resultados</a>
                <?php } ?>                        
                
                <!-- Encargado de Departamento -->
                <?php if ($_SESSION['u_idRol'] == 3){ ?>
                <?php } ?>                        
                
                <!-- Empleado -->
                <?php if ($_SESSION['u_idRol'] == 4){ ?>
                <?php } ?>                
            </div>

            <div class="panel">
                <h2>Metas</h2>

                </br>
                <div class="items">
                    <input type="text" id="Buscar" placeholder="Buscar">
                    <a class="a2" href="./metas_agregar.php"><i class="icofont-plus"></i> Agregar meta</a>
                </div>

                <div class="items">
                    <table>
                        <thead>
                            <tr>
                                <th>Componente</th>
                                <th>Descripción</th>
                                <th>Fecha de Apertura</th>
                                <th>Fecha de Cierre</th>
                                <th style="text-align: center;">Opciones</th>
                            </tr>
                        </thead>
                        <tbody id="Tabla">
                            <?php
                            $sql = "SELECT * FROM Listar_Metas";
                            $result = mysqli_query($con, $sql);
                            while($row = mysqli_fetch_assoc($result)) { 
                                echo 
                                "<tr>
                                    <td>".$row["Componente"]."</td>";                                    
                                    $descripcion = $row["Descripcion"];
                                    $caracteres = 22;
                                echo
                                    "<td>"; echo substr($descripcion, 0, $caracteres).'...'; echo "</td>
                                    <td>".$row["Fecha_De_Apertura"]."</td>
                                    <td>".$row["Fecha_De_Cierre"]."</td>
                                    <td>
                                        <div style=\"text-align: center;\">
                                            <a class=\"buttontable\" href=\"./metas_detalle.php?id=".$row["ID"]."\"><i class=\"icofont-search-document\"></i></a>
                                            <a class=\"buttontable\" href=\"./metas_modificar.php?id=".$row["ID"]."\"><i class=\"icofont-edit\"></i></a>
                                            <a class=\"buttontable\" href=\"./metas_eliminar.php?id=".$row["ID"]."\"><i class=\"icofont-ui-delete\"></i></a>
                                        </div>
                                    </td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div> 

            </div>

        </div>
        <script src="./common.js"></script>
    </body>
    <script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
        if (!event.target.matches('.a')) {

            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
            }
        }
        }
    </script>    

    <!-- Para el filtro -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
        $("#Buscar").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#Tabla tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
    </script>
    <!-- -------------- -->
    
</html>