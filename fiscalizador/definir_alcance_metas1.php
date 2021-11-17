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
            <a class="a" href="../index.php"><h2 class="h2">Sistema de Gestión de Control Interno</h2></a>
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
                        <a class="a" onclick="myFunction()" style="color: #031075; font-size: 21px; font-weight: bold;">Alcance de Metas</a>
                        <div id="myDropdown" class="dropdown-content">
                            <a class="a" href="./definir_alcance_metas1.php">Definir Alcances</a>
                            <a class="a" href="./definir_alcance_metas2.php">Comunicar Apertura y Cierre del Proceso</a>
                        </div>
                    </div>
                    </br><a class="a" href="./departamentos.php"> Departamentos</a>
                    </br><a class="a" href="./direccciones.php"> Direccciones</a>
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
                <h2>Formulario para el alcance de metas</h2>
                <div class="contenido" style="width: 1000px;">
                    
                    <form method="post" action="../administrador.php">  

                        <div style="float: left; margin-left: 10%;">
                            <div style="float: left; text-align: left; padding-left: 0%;">
                                <div class="items2"> 
                                    <label for="alcance_direccion">Dirección:</label>
                                    <select name="alcance_direccion" id="alcance_direccion">
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>                        
                                <div class="items2"> 
                                    <label for="alcance_departamento">Departamento:</label>
                                    <select name="alcance_departamento" id="alcance_departamento">
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>
                            </div>   

                            <div style="float: right; text-align: right; padding-right: 0%;">
                                <div class="items2"> 
                                    <label for="alcance_modelo">Modelo de Madurez:</label>
                                    <select name="alcance_modelo" id="alcance_modelo">
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>  
                                <div class="items2"> 
                                    <label for="alcance_meta">Meta:</label>
                                    <select name="alcance_meta" id="alcance_meta">
                                        <option>1</option>
                                        <option>2</option>
                                    </select>
                                </div>  
                            </div>  
                            
                        </div>

                        </br></br>
                        </br></br>

                        <div style="margin-right: 35%;">
                            <div class="items">
                                <label for="alcance_atributo">Atributo:</label>
                                <input type="text" id="alcance_atributo" name="alcance_atributo" value="">                            
                            </div>              
                            </br>   
                            
                            <div class="items">
                                <label>Descripción del alcance:</label>
                                <textarea name="descrip_alcance" rows="5" cols="50" placeholder="Ingrese la descripción del alcance..."></textarea>      
                            </div>   
                            <input type="submit" value="Guardar" class="submit">
                            <input type="button" class="submit" onclick="location.href='../administrador.php' "value="Volver" /> 
                        </div>

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