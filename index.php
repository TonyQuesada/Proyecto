<?php
include_once('php_config.php');
if(isset($_SESSION['u_ID'])) 
{ 
    header('Location: administrador.php');
} 
?>    



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./icofont/icofont.min.css">
        <link rel="stylesheet" href="./css/styles_login.css">
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

                    <?php
                        if(@$_GET['Empty']==true)
                        {
                    ?>
                        <div> <?php echo $_GET['Empty']?> </div>                    
                    <?php
                        }
                    ?>                    
                    
                    <?php
                    if(@$_GET['Invalid']==true)
                    {
                    ?>
                        <div> <?php echo $_GET['Invalid']?> </div>                    
                    <?php
                        }
                    ?>

                    <div class="login">
                        <div class="form">
                            <h2>Iniciar Sesión</h2>
                            <img src="./favicon.png" width="80" height="75" style="margin-left: 35%;"> 
                            <form method="post" action="./util/login.php">
                                <input type="email" id="user-correo" name="user-correo" placeholder="Correo Electrónico" required>
                                <input type="password" id="user-contrasena" name="user-contrasena" placeholder="Contraseña" required>
                                <input type="submit" name="Login" value="Ingresar" class="submit" >
                                <div class="div_a">
                                    <a class="a" href="./register.php"> Registrarse</a>
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