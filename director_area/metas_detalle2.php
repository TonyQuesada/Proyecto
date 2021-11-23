<?php

include_once('../php_config.php');
if(!isset($_SESSION['u_ID'])) 
{ 
    header('Location: ../index.php');
} 

$id = $_GET["id"];
$sql = "SELECT * FROM Listar_Metas WHERE ID=$id";
$result = mysqli_query($con, $sql);
if ($result) {
    $metas = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../favicon.ico">
        <link rel="stylesheet" href="../css/styles_general.css">
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
                <h2>Detalle de la meta</h2>

                <div class="contenido" style="padding-bottom: 55px;">
                    
                    <?php
                        if (isset($_GET["id"])) {
                            echo "<input type=\"hidden\" name=\"id\" value=\"".$_GET["id"]."\">";
                        }
                    ?>

                    <div class="items">
                        <label for="metas_componente">Componente:</label>
                        <input type="text" name="metas_componente" id="metas_componente" value="<?php echo $metas["Componente"]?>" readonly>
                    </div>
                    <div class="items" style="margin-right: 18.45%;">
                        <label for="metas_fecha_apertura">Fecha de apertura:</label>
                        <input type="text" name="metas_fecha_apertura" id="metas_fecha_apertura" value="<?php echo $metas["Fecha_De_Apertura"]?>" readonly>
                    </div>
                    <div class="items" style="margin-right: 16.99%;">
                        <label for="metas_fecha_cierre">Fecha de cierre:</label>
                        <input type="text" name="metas_fecha_cierre" id="metas_fecha_cierre" value="<?php echo $metas["Fecha_De_Cierre"]?>" readonly>
                    </div>    
                    </br>                    
                    
                    <div class="items">
                        <label>Nueva descripción de la meta:</label>
                        <textarea name="meta_descripcion_nueva" rows="6" cols="50" placeholder="Ingrese la descripción de la meta..."><?php echo $metas["Descripcion"]?></textarea>      
                    </div>
                    </br>
                    <input type="button" class="submit" onclick="location.href='metas_seccion.php' "value="Volver" /> 

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
</html>