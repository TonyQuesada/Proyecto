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
                    </br><a class="a" href="./definir_alcance_metas.php" style="color: #031075; font-size: 21px; font-weight: bold;">> Definir Alcance Metas</a>
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
                <h2>Definir Alcances</h2>
                <div class="contenido">
                    
                    <form method="post" action="../administrador.php">
                        <div class="items">
                            <label for="roles_nombre">Identificador de la meta:</label>
                        </div>                   
                        <div class="items">
                        <p><select name="id_meta"><option>1</option>
                            </select></p>
                        </div>                       
                        <p>Meta:<br/>
                            <textarea name="descrip_meta" rows="5" cols="50">Descripción de la meta</textarea></p>
                        </fieldset>  
                        <div class="items">
                        <p>Atributo: <input type="text" name="atributo"/></p>
                        <p>Descripción del alcance:<br/>
                            <textarea name="descrip_alcance" rows="5" cols="50">Ingrese la descripción del alcance</textarea></p>
                        </fieldset>   
                        </div>                   
                              
                        </br>

                        <input type="submit" value="Definir" class="submit">
                        <input type="button" class="submit" onclick="location.href='../administrador.php' "value="Volver" />

                    </form>
                </div>
            </div>

        </div>
        <script src="./common.js"></script>
    </body>

</html>