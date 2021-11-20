<?php
    include_once("php_config.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./icofont/icofont.min.css">
        <link rel="stylesheet" href="./css/styles_register.css">
        <link rel="stylesheet" href="./css/styles_general.css">
		<link rel="stylesheet" href="./css/styles_targeta_login.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        
        <div class="cabecera">
            <img class="logo" src="./favicon.png" width="67" height="62"> 
            <a class="a" href="./index.php"><h2 class="h2">Sistema de Gestión de Control Interno</h2></a>
        </div>

        <div class="container">
            <div id="tarjeta">	
                <div class="product-details">
                    <h1>Sistema de Gestión de Control Interno</h1>
                    <p class="information">"Administración y Programación de Sitios Web "</p>		
                </div>
                <div class="product-image">
                    <img src="https://www.auditool.org/images/32-Azul-Artículo_940.png" alt="Omar Dsoky">
                </div>
            </div>

            <div>
                <div>



                    <div class="register">
                        <div class="form">
                            <h2>Registrarse</h2>
                            <img src="./favicon.png" width="80" height="75" style="margin-left: 35%;"> 
                            <form method="post" action="./util/registrar_usuario.php">
                                <input type="text" id="user-nombre" name="user-nombre" placeholder="Nombre Completo" required>
                                <input type="email" id="user-correo" name="user-correo" placeholder="Correo Electrónico" required>
                                <input type="password" id="user-contrasena" name="user-contrasena" placeholder="Contraseña" required>                        
                                <div class="items">
                                    <select class="combobox" name="user-rol" id="user-rol" required>
                                        <?php

                                            $sql2 = "SELECT * FROM ListarRoles";
                                            $result2 = mysqli_query($con, $sql2);   
                                            echo "<option selected disabled>Seleccionar</option>";
                                            while ($row = mysqli_fetch_array($result2)) {
                                                echo "<option value=\"".$row["idRol"]."\">".$row["Nombre_Rol"]."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>                                 
                                <div class="items">
                                    <select class="combobox" name="user-direccion" id="user-direccion" required>
                                        <?php

                                            $sql3 = "SELECT * FROM ListarDirecciones";
                                            $result3 = mysqli_query($con, $sql3);   
                                            echo "<option selected disabled>Seleccionar</option>";
                                            while ($row = mysqli_fetch_array($result3)) {
                                                echo "<option value=\"".$row["ID"]."\">".$row["Direccion"]."</option>";
                                            }
                                        ?>
                                    </select>
                                </div> 

                                <input type="submit" name="Register" value="Registrarse" class="submit" >
                                <div class="div_a">
                                    <a class="a" href="./index.php"> Ingresar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <script src="./common.js"></script>
    </body>

</html>

<!-- <?php
    mysqli_close($con);
?> -->