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
        <link rel="stylesheet" href="../css/styles_card.css">
        <script src="./common.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js" integrity="sha512-NhRZzPdzMOMf005Xmd4JonwPftz4Pe99mRVcFeRDcdCtfjv46zPIi/7ZKScbpHD/V0HB1Eb+ZWigMqw94VUVaw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                        <a class="a" onclick="myFunction()">Metas</a>
                        <div id="myDropdown" class="dropdown-content">
                            <a class="a" href="./director_area/metas.php">Definir Metas</a>
                            <a class="a" href="./director_area/metas_seccion.php">Comunicar Definición</a>
                        </div>
                    </div>
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
                    </br><a class="a" href="./fiscalizador/direcciones.php"> Direcciones</a>
                    </br><a class="a" href="./fiscalizador/establecer_fechas_evaluacion.php"> Establecer Fechas de Evaluación</a>
                    </br><a class="a" href="./fiscalizador/resultados.php"> Resultados</a>
                <?php } ?>                        
                
                <!-- Encargado de Departamento -->
                <?php if ($_SESSION['u_idRol'] == 3){ ?>
                    </br><a class="a" href="../encargado_departamento/formulario.php" style="color: #031075; font-size: 21px; font-weight: bold;">> Formulario</a>
                    </br><a class="a" href="../encargado_departamento/comunicar.php"> Comunicar Formulario</a>
                <?php } ?>                        
                
                <!-- Empleado -->
                <?php if ($_SESSION['u_idRol'] == 4){ ?>
                    </br><a class="a" href="../empleado/evidencias.php"> Evidencias</a>
                <?php } ?>                
            </div>

            <div class="panel">
            <h2>Seleccione el componente</h2>
                <!-- <a href="formulario_ambiente_control.php"><input type="button" value="Ambiente de Control"></a> -->
                <!-- <a href="formulario_valoracion_riesgo.php"><input type="button" value="Valoracion del riesgo"></a> -->
                <!-- <a href="formulario_actividades_control.php"><input type="button" value="Actividades de control"></a> -->
                <!-- <a href="formulario_sistemas_informacion.php"><input type="button" value="Sistemas de informacion"></a> -->
                <!-- <a href="formulario_seguimiento.php"><input type="button" value="Seguimiento"></a> -->
                <div class="items">
                </div>
                
                <a style="text-decoration: none;" href="formulario_ambiente_control.php">
                    <article class="c-card c-card--wide" id="a">
                        <header class="c-card__header">
                            <h2 class="c-card__title">
                                Ambiente de control
                            </h2>
                            <!-- <img src="http://placehold.it/300x250" class="c-card__image" alt="Card Image" />-->
                            <div class="circular-process" style="margin-top: 3px;">
                                <input class="circle" id="circulo1" name="circulo1" type="text" value= <?php echo 60 ?> >						
                            </div>
                        </header>					
                    </article>
                </a>

                <a style="text-decoration: none;" href="formulario_valoracion_riesgo.php">
                    <article class="c-card c-card--wide" id="e">
                        <header class="c-card__header">
                            <h2 class="c-card__title">
                                Valoración del riesgo
                            </h2>
                            <!-- <img src="http://placehold.it/300x250" class="c-card__image" alt="Card Image" />-->
                            <div class="circular-process" style="margin-top: 3px;">
                                <input class="circle" id="circulo2" name="circulo2" type="text" value= <?php echo 40 ?> >						
                            </div>
                        </header>
                        <div class="c-card__body">                        
                            <p class="c-card__intro">                                
                            </p>
                        </div>							
                    </article>
                </a>

                <a style="text-decoration: none;" href="formulario_actividades_control.php">
                    <article class="c-card c-card--wide" id="c">
                        <header class="c-card__header">
                            <h2 class="c-card__title">
                                Actividades de control
                            </h2>
                            <!-- <img src="http://placehold.it/300x250" class="c-card__image" alt="Card Image" />-->
                            <div class="circular-process" style="margin-top: 3px;">
                                <input class="circle" id="circulo3" name="circulo3" type="text" value= <?php echo 20 ?> >
                            </div>
                        </header>
                        <div class="c-card__body">                        
                            <p class="c-card__intro">                                
                            </p>
                        </div>							
                    </article>
                </a>

                <a style="text-decoration: none;" href="formulario_sistemas_informacion.php">
                    <article class="c-card c-card--wide" id="b">
                        <header class="c-card__header">
                            <h2 class="c-card__title">
                                Sistemas de información
                            </h2>
                            <!-- <img src="http://placehold.it/300x250" class="c-card__image" alt="Card Image" />-->
                            <div class="circular-process" style="margin-top: 3px;">
                                <input class="circle" id="circulo4" name="circulo4" type="text" value= <?php echo 80 ?> >
                            </div>
                        </header>
                        <div class="c-card__body">                        
                            <p class="c-card__intro">                                
                            </p>
                        </div>							
                    </article>
                </a>

                <a style="text-decoration: none;" href="formulario_seguimiento.php">
                    <article class="c-card c-card--wide" id="d">
                        <header class="c-card__header">
                            <h2 class="c-card__title">
                                Seguimiento
                            </h2>
                            <!-- <img src="http://placehold.it/300x250" class="c-card__image" alt="Card Image" />-->
                            <div class="circular-process" style="margin-top: 3px;">
                                <input class="circle" id="circulo5" name="circulo5" type="text" value= <?php echo 80 ?> >
                            </div>
                        </header>
                        <div class="c-card__body">                        
                            <p class="c-card__intro">                                
                            </p>
                        </div>							
                    </article>
                </a>

            </div>			
            


        </div>
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

    <script>
        $(document).ready(function(){
            $(".circle").knob({
                "min":0,
                "max":100,
                "width":65,
                "height":65,
                "fgColor":"#1e6dc2",
                "bgColor":"black",
                "readOnly":true,
                "displayInput":true,
                
            });
            // var x; 
            // x = document.getElementById("circulo1").textContent;
            // if(x => "20")
            // {
            // 	document.getElementById("circulo1").style.color = "red";
            // }

        })
    </script>

</html>