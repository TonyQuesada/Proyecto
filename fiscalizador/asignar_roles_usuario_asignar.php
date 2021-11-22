<?php

include_once('../php_config.php');
if(!isset($_SESSION['u_ID'])) 
{ 
    header('Location: ../index.php');
} 

$id = $_GET["id"];
$sql = "SELECT * FROM ListarUsuarios WHERE idUsuario=$id";
$result = mysqli_query($con, $sql);
if ($result) {
    $usuarios = mysqli_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../favicon.ico">
        <!-- <link rel="stylesheet" href="../css/styles_general.css"> -->
        <link rel="stylesheet" href="../css/styles_roles.css">
        <link rel="stylesheet" href="../css/styles_usuarios.css">
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
                    </br><a class="a" href="./metas.php"> Metas</a>
                    </br><a class="a"href="./resultados.php"> Resultados</a>
                <?php } ?>
                
                <!-- Fiscalizador -->
                <?php if ($_SESSION['u_idRol'] == 2){ ?>
                    </br><a class="a" href="./asignar_roles.php" style="color: #031075; font-size: 21px; font-weight: bold;"s>> Asignar Roles</a>
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
                <h2>Modificación de rol de usuario</h2>
                </br>

                <div class="contenido">
                    
                    <form method="post" action="../util/asignar_roles_usuario_asignar.php">

                        <?php
                            if (isset($_GET["id"])) {
                                echo "<input type=\"hidden\" name=\"id\" value=\"".$_GET["id"]."\">";
                            }
                        ?>                        
                        
                        <div class="items">
                            <label for="user-rol">Rol Principal:</label>
                        </div>
                        <div class="items">
                            <select class="combobox" name="user-rol" id="user-rol" required>
                            <?php

                                $sql2 = "SELECT * FROM ListarRoles";
                                $result2 = mysqli_query($con, $sql2); 

                                if ($usuarios["Rol"] == NULL) { 
                                    echo "<option selected disabled> Seleccionar </option>";                                
                                } else {
                                    echo "<option selected disabled> ".$usuarios["Rol"]." </option>";
                                }

                                while ($row = mysqli_fetch_array($result2)) {
                                    echo "<option value=\"".$row["idRol"]."\">".$row["Nombre_Rol"]."</option>";
                                }
                                ?>
                            </select>
                        </div> 
                        </br>
                        </br>

                        <input type="submit" value="Editar" class="submit">
                        <input type="button" class="submit" onclick="location.href='asignar_roles_usuario.php' "value="Volver" /> 

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