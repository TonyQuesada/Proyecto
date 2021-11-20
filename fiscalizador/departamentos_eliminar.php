<?php

include_once('../php_config.php');
if(!isset($_SESSION['u_ID'])) 
{ 
    header('Location: ../index.php');
} 

$id = $_GET["id"];
$sql = "SELECT * FROM ListarDepartamentos WHERE ID_Dpto=$id";
$result = mysqli_query($con, $sql);
if ($result) {
    $departamento = mysqli_fetch_assoc($result);
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

        <div class="cabecera">
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
            <div class="columna_der">
                <a class="a" href="../administrador.php">Inicio</a>

                <!-- Director de Área -->
                <?php if ($_SESSION['u_idRol'] == 1){ ?>
                    </br><a class="a" href="./metas.php"> Metas</a>
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
                    </br><a class="a" href="./departamentos.php" style="color: #031075; font-size: 21px; font-weight: bold;">> Departamentos</a>
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

                <h2>Eliminación de departamentos</h2>

                <div class="contenido">
                    
                    <form method="post" action="../util/departamentos_eliminar.php">

                        <?php
                            if (isset($_GET["id"])) {
                                echo "<input type=\"hidden\" name=\"id\" value=\"".$_GET["id"]."\">";
                            }
                        ?>

                        <div class="items">
                            <label for="departamento_direccion">Dirección:</label>
                        </div>
                        <div class="items">
                            <input type="text" name="departamento_direccion" id="departamento_direccion" value="<?php echo $departamento["Direccion"]?>" readonly>
                        </div>
                        <div class="items">
                            <label for="departamento_nombre">Departamento:</label>
                        </div>
                        <div class="items">
                            <input type="text" name="departamento_nombre" id="departamento_nombre" value="<?php echo $departamento["Nombre_Departamento"]?>" readonly>
                        </div>
                        <div class="items">
                            <label for="departamento_id">Encargado:</label>
                        </div>
                        <div class="items">
                            <input type="text" name="departamento_id" id="departamento_id" value="<?php echo $departamento["Encargado"]?>" readonly>
                        </div> 
                        </br>

                        <input type="submit" value="Eliminar" class="submit">
                        <input type="button" class="submit" onclick="location.href='departamentos.php' "value="Volver" /> 

                    </form>
                </div>                
            </div>

        </div>
        <script src="./common.js"></script>
    </body>
    <script>

        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

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