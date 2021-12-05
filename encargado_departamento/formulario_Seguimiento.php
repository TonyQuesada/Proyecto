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

            <div class="wrapper_row js_complete_quizz_question_wrapper" style="">
            <div class="row js_error_placement_parent step_22">
                <div class="m_header_step" data-step="22">
                <h3 class="js_error_placement quizz_question ">Componente Seguimiento</h3>
                </div>
                <div class="form_fields matrix_content matrix_single">
                <ul class="cols-4">
                    <li class="question_row header"><span class="question" style="max-width: calc( (100% / (4 + 1) ) - 1em);"></span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);">Participantes</span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);">Formalidad</span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);">Alcance</span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);">Contribución a la mejora del sistema de control interno</span></li>
                    <li class="question_row"><span class="question" style="max-width: calc( (100% / (4 + 1) ) - 1em);">Incipiente A</span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);"><input class="js_quizz_radio_button" data-next="1" data-adds-extra-text="0" type="radio" value="103622" name="participation[promo_response_attributes][response_36203_matrix_question_20]" id="participation_promo_response_attributes_response_36203_matrix_question_20_103622"></span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);"><input class="js_quizz_radio_button" data-next="1" data-adds-extra-text="0" type="radio" value="103623" name="participation[promo_response_attributes][response_36203_matrix_question_20]" id="participation_promo_response_attributes_response_36203_matrix_question_20_103623"></span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);"><input class="js_quizz_radio_button" data-next="1" data-adds-extra-text="0" type="radio" value="103624" name="participation[promo_response_attributes][response_36203_matrix_question_20]" id="participation_promo_response_attributes_response_36203_matrix_question_20_103624"></span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);"><input class="js_quizz_radio_button" data-next="1" data-adds-extra-text="0" type="radio" value="103625" name="participation[promo_response_attributes][response_36203_matrix_question_20]" id="participation_promo_response_attributes_response_36203_matrix_question_20_103625"></span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);"><input class="js_quizz_radio_button" data-next="1" data-adds-extra-text="0" type="radio" value="103626" name="participation[promo_response_attributes][response_36203_matrix_question_20]" id="participation_promo_response_attributes_response_36203_matrix_question_20_103626"></span></li>
                    <li class="question_row"><span class="question" style="max-width: calc( (100% / (4 + 1) ) - 1em);">Novato B</span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);"><input class="js_quizz_radio_button" data-next="1" data-adds-extra-text="0" type="radio" value="103622" name="participation[promo_response_attributes][response_36203_matrix_question_21]" id="participation_promo_response_attributes_response_36203_matrix_question_21_103622"></span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);"><input class="js_quizz_radio_button" data-next="1" data-adds-extra-text="0" type="radio" value="103623" name="participation[promo_response_attributes][response_36203_matrix_question_21]" id="participation_promo_response_attributes_response_36203_matrix_question_21_103623"></span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);"><input class="js_quizz_radio_button" data-next="1" data-adds-extra-text="0" type="radio" value="103624" name="participation[promo_response_attributes][response_36203_matrix_question_21]" id="participation_promo_response_attributes_response_36203_matrix_question_21_103624"></span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);"><input class="js_quizz_radio_button" data-next="1" data-adds-extra-text="0" type="radio" value="103625" name="participation[promo_response_attributes][response_36203_matrix_question_21]" id="participation_promo_response_attributes_response_36203_matrix_question_21_103625"></span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);"><input class="js_quizz_radio_button" data-next="1" data-adds-extra-text="0" type="radio" value="103626" name="participation[promo_response_attributes][response_36203_matrix_question_21]" id="participation_promo_response_attributes_response_36203_matrix_question_21_103626"></span></li>
                    <li class="question_row"><span class="question" style="max-width: calc( (100% / (4 + 1) ) - 1em);">Competente C</span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);"><input class="js_quizz_radio_button" data-next="1" data-adds-extra-text="0" type="radio" value="103622" name="participation[promo_response_attributes][response_36203_matrix_question_22]" id="participation_promo_response_attributes_response_36203_matrix_question_22_103622"></span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);"><input class="js_quizz_radio_button" data-next="1" data-adds-extra-text="0" type="radio" value="103623" name="participation[promo_response_attributes][response_36203_matrix_question_22]" id="participation_promo_response_attributes_response_36203_matrix_question_22_103623"></span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);"><input class="js_quizz_radio_button" data-next="1" data-adds-extra-text="0" type="radio" value="103624" name="participation[promo_response_attributes][response_36203_matrix_question_22]" id="participation_promo_response_attributes_response_36203_matrix_question_22_103624"></span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);"><input class="js_quizz_radio_button" data-next="1" data-adds-extra-text="0" type="radio" value="103625" name="participation[promo_response_attributes][response_36203_matrix_question_22]" id="participation_promo_response_attributes_response_36203_matrix_question_22_103625"></span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);"><input class="js_quizz_radio_button" data-next="1" data-adds-extra-text="0" type="radio" value="103626" name="participation[promo_response_attributes][response_36203_matrix_question_22]" id="participation_promo_response_attributes_response_36203_matrix_question_22_103626"></span></li>
                    <li class="question_row"><span class="question" style="max-width: calc( (100% / (4 + 1) ) - 1em);">Diestro D</span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);"><input class="js_quizz_radio_button" data-next="1" data-adds-extra-text="0" type="radio" value="103622" name="participation[promo_response_attributes][response_36203_matrix_question_23]" id="participation_promo_response_attributes_response_36203_matrix_question_23_103622"></span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);"><input class="js_quizz_radio_button" data-next="1" data-adds-extra-text="0" type="radio" value="103623" name="participation[promo_response_attributes][response_36203_matrix_question_23]" id="participation_promo_response_attributes_response_36203_matrix_question_23_103623"></span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);"><input class="js_quizz_radio_button" data-next="1" data-adds-extra-text="0" type="radio" value="103624" name="participation[promo_response_attributes][response_36203_matrix_question_23]" id="participation_promo_response_attributes_response_36203_matrix_question_23_103624"></span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);"><input class="js_quizz_radio_button" data-next="1" data-adds-extra-text="0" type="radio" value="103625" name="participation[promo_response_attributes][response_36203_matrix_question_23]" id="participation_promo_response_attributes_response_36203_matrix_question_23_103625"></span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);"><input class="js_quizz_radio_button" data-next="1" data-adds-extra-text="0" type="radio" value="103626" name="participation[promo_response_attributes][response_36203_matrix_question_23]" id="participation_promo_response_attributes_response_36203_matrix_question_23_103626"></span></li>
                    <li class="question_row"><span class="question" style="max-width: calc( (100% / (4 + 1) ) - 1em);">Experto E</span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);"><input class="js_quizz_radio_button" data-next="1" data-adds-extra-text="0" type="radio" value="103622" name="participation[promo_response_attributes][response_36203_matrix_question_24]" id="participation_promo_response_attributes_response_36203_matrix_question_24_103622"></span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);"><input class="js_quizz_radio_button" data-next="1" data-adds-extra-text="0" type="radio" value="103623" name="participation[promo_response_attributes][response_36203_matrix_question_24]" id="participation_promo_response_attributes_response_36203_matrix_question_24_103623"></span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);"><input class="js_quizz_radio_button" data-next="1" data-adds-extra-text="0" type="radio" value="103624" name="participation[promo_response_attributes][response_36203_matrix_question_24]" id="participation_promo_response_attributes_response_36203_matrix_question_24_103624"></span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);"><input class="js_quizz_radio_button" data-next="1" data-adds-extra-text="0" type="radio" value="103625" name="participation[promo_response_attributes][response_36203_matrix_question_24]" id="participation_promo_response_attributes_response_36203_matrix_question_24_103625"></span><span class="answer" style="max-width: calc( (100% / (4 + 1) ) - 1em);"><input class="js_quizz_radio_button" data-next="1" data-adds-extra-text="0" type="radio" value="103626" name="participation[promo_response_attributes][response_36203_matrix_question_24]" id="participation_promo_response_attributes_response_36203_matrix_question_24_103626"></span></li>
                </ul>
                </div>
            </div>
            <!-- - class=row -->
            </div>
            
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

</html>