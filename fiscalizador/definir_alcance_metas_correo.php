<?php

include_once('../php_config.php');
if(!isset($_SESSION['u_ID'])) 
{ 
    header('Location: ../index.php');
} 

$id = $_GET["id"];
$sql = "SELECT * FROM Listar_Alcances WHERE ID=$id";
$result = mysqli_query($con, $sql);
if ($result) {
    $alcances = mysqli_fetch_assoc($result);
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
                    </br><a class="a" href="./metas.php"> Metas</a>
                    </br><a class="a"href="./resultados.php"> Resultados</a>
                <?php } ?>
                
                <!-- Fiscalizador -->
                <?php if ($_SESSION['u_idRol'] == 2){ ?>
                    </br><a class="a" href="./asignar_roles.php"> Asignar Roles</a>
                    </br><div class="dropdown">
                        <a class="a" onclick="myFunction()" style="color: #031075; font-size: 21px; font-weight: bold;">> Alcance de Metas</a>
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
            <h2>Notificación del Alcances</h2>
                <div class="contenido">

                    <form method="post" action="../util/alcances_correo.php">

                        <?php
                            if (isset($_GET["id"])) {
                                echo "<input type=\"hidden\" name=\"id\" value=\"".$_GET["id"]."\">";
                            }
                        ?>

                        <div class="items">
                            <label>Atributo del Alcance:</label>
                            <input type="text" name="atributo_viejo" id="atributo_viejo" readonly value="<?php echo $alcances['Atributo'] ?>"/>
                        </div>                        
                        </br>   
                        <div class="items">
                            <label>Descripción del Alcance: </label>
                            <textarea name="descrip_viejo" id="descrip_viejo" rows="5" cols="50" readonly><?php echo $alcances['Descripcion_Del_Alcance'] ?></textarea>
                        </div>                        
                        <div class="items">
                            <label>Descripción de la Meta: </label>
                            <textarea name="descrip_viejo" id="descrip_viejo" rows="5" cols="50" readonly><?php echo $alcances['Descripcion_Meta'] ?></textarea>
                        </div>                        
                        </br>

                        <input type="submit" value="Enviar Comunicado" class="submit">
                        <input type="button" class="submit" onclick="location.href='definir_alcance_metas2.php' "value="Volver" />
                        
                        
                    </form>
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
