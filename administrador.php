<?php
session_start();
if(!isset($_SESSION['u_ID'])){
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./favicon.ico">
        <link rel="stylesheet" href="./css/styles_general.css">
        <link rel="stylesheet" href="./css/styles_process.css">
        <script src="./common.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js" integrity="sha512-NhRZzPdzMOMf005Xmd4JonwPftz4Pe99mRVcFeRDcdCtfjv46zPIi/7ZKScbpHD/V0HB1Eb+ZWigMqw94VUVaw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body>

        <div class="cabecera">
            <div class="perfil">
                <div>
                    <a class="a" href="cuenta.php">👤 <?php echo $_SESSION['u_Nombre']; ?></a>
                    </br>
                </div>                
                <div>
                    <a class="a" href="./util/logout.php">🚪 Salir</a>
                </div>
            </div>
            <img class="logo" src="./favicon.png" width="67" height="62"> 
            <a class="a" href="./index.php"><h2 class="h2">Sistema de Gestión de Control Interno</h2></a>
        </div>

        <div class="container">            
            <div class="columna_der">
                <a class="a" href="administrador.php" style="color: #031075; font-size: 21px; font-weight: bold;">Inicio</a>

                <!-- Director de Área -->
                <?php if ($_SESSION['u_idRol'] == 1){ ?>
                    </br><a class="a" href="./director_area/metas.php"> Metas</a>
                    </br><a class="a"href="./director_area/resultados.php"> Resultados</a>
                <?php } ?>
                
                <!-- Fiscalizador -->
                <?php if ($_SESSION['u_idRol'] == 2){ ?>
                    </br><a class="a" href="./fiscalizador/asignar_roles.php"> Asignar Roles</a>
                    </br><div class="dropdown">
                        <a class="a" onclick="myFunction()">Alcance de Metas</a>
                        <div id="myDropdown" class="dropdown-content">
                            <a class="a" href="./fiscalizador/definir_alcance_metas1.php">Definir Alcances</a>
                            <a class="a" href="./fiscalizador/definir_alcance_metas2.php">Comunicar Apertura y Cierre del Proceso</a>
                        </div>
                    </div>
                    </br><a class="a" href="./fiscalizador/departamentos.php"> Departamentos</a>
                    </br><a class="a" href="./fiscalizador/direccciones.php"> Direccciones</a>
                    </br><a class="a" href="./fiscalizador/establecer_fechas_evaluacion.php"> Establecer Fechas de Evaluación</a>
                    </br><a class="a" href="./fiscalizador/resultados.php"> Resultados</a>
                <?php } ?>                        
                
                <!-- Encargado de Departamento -->
                <?php if ($_SESSION['u_idRol'] == 3){ ?>
                <?php } ?>                        
                
                <!-- Empleado -->
                <?php if ($_SESSION['u_idRol'] == 4){ ?>
                <?php } ?>                
            </div>

            <div class="panel">
                <h1>Barras de Proceso</h1>
                <div class="circular-process">
                    <input id="circulo1" name="circulo1" type="text" value="20" class="circle">
                    <input id="circulo2" name="circulo2" type="text" value="45" class="circle">
                    <input id="circulo3" name="circulo3" type="text" value="60" class="circle">
                </div>

            </div>

        </div>
    </body>

    <script>
        $(document).ready(function(){
            $(".circle").knob({
                "min":0,
                "max":100,
                "width":150,
                "height":150,
                // "fgColor":"red",
                "readOnly":true,
                "displayInput":true
            });
            var x; 
            x = document.getElementById("circulo1").textContent;
            if(x => "20")
            {
                document.getElementById("circulo1").style.color = "green";
            }

        })
    </script>
    
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