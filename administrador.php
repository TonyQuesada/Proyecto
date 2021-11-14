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
        <link href="https://bootswatch.com/5/flatly/bootstrap.min.css" rel="stylesheet" id="theme-light">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>        
    </head>
    <body>
        <div class="container">

            <div class="cabecera">

                <div style="margin-left: 58%; margin-top: 18px; position:fixed; text-align: right;">
                    <div>
                        <a class="a" href="cuenta.php">👤 <?php echo $_SESSION['u_Nombre']; ?></a>
                        </br>
                    </div>                
                    <div>
                        <a class="a" href="./util/logout.php">🚪 Salir</a>
                    </div>
                </div>

                <img src="./favicon.png" width="67" height="62" style="margin-top: 15px; margin-left: 9px; position:fixed;"> 
                <a class="a" href="./index.php"><h2 class="h2">Sistema de Gestión de Control Interno</h2></a>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                <nav class="nav card flex-column">
                        <a href="administrador.php" class="nav-link active"><i class="icofont-home"></i> Inicio</a>

                        <!-- Director de Área -->
                        <?php if ($_SESSION['u_idRol'] == 1){ ?>
                            <a class="nav-link" href="./director_area/metas.php"><i class="icofont-ui-user-group"></i> Metas</a>
                            <a class="nav-link" href="./director_area/resultados.php"><i class="icofont-flag-alt-2"></i> Resultados</a>
                        <?php } ?>
                        
                        <!-- Fiscalizador -->
                        <?php if ($_SESSION['u_idRol'] == 2){ ?>
                            <a class="nav-link" href="./fiscalizador/asignar_roles.php"><i class="icofont-ui-user-group"></i> Asignar Roles</a>
                            <a class="nav-link" href="./fiscalizador/definir_alcance_metas.php"><i class="icofont-ui-user"></i> Definir Alcance Metas</a>
                            <a class="nav-link" href="./fiscalizador/departamentos.php"><i class="icofont-calendar"></i> Departamentos</a>
                            <a class="nav-link" href="./fiscalizador/direccciones.php"><i class="icofont-bank-alt"></i> Direccciones</a>
                            <a class="nav-link" href="./fiscalizador/establecer_fechas_evaluacion.php"><i class="icofont-flag-alt-2"></i> Establecer Fechas de Evaluación</a>
                            <a class="nav-link" href="./fiscalizador/resultados.php"><i class="icofont-flag-alt-2"></i> Resultados</a>
                        <?php } ?>                        
                        
                        <!-- Encargado de Departamento -->
                        <?php if ($_SESSION['u_idRol'] == 3){ ?>
                        <?php } ?>                        
                        
                        <!-- Empleado -->
                        <?php if ($_SESSION['u_idRol'] == 4){ ?>
                        <?php } ?>

                    </nav>                    
                </div>

                <div class="col-md-9">
                    <h2>Panel</h2>
                </div>
                
            </div>
        </div>
        <script src="./common.js"></script>
    </body>

</html>