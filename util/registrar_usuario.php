<?php

    require_once('../php_config.php');
    // session_start();

    if(isset($_POST['Register']))
    {
        $nombre = mysqli_real_escape_string($con, $_POST['user-nombre']);
        $email = mysqli_real_escape_string($con, $_POST['user-correo']);
        $password = mysqli_real_escape_string($con, $_POST['user-contrasena']);
        $rol = $_POST['user-rol'];
        $rol2 = 4;
        $direccion = $_POST['user-direccion'];
        
        if($rol == 1){
            $departamento = 1;
        } else if ($rol == 2){
            $direccion = 1;
            $departamento = 1;
        }

        if(!preg_match("/^[a-zA-Z]*$/", $nombre)){
            header("location: ../register.php?Invalid");
        } else {
            if ($nombre != "" && $email != "" && $password != "" && $rol != ""){
                $sql_query = "CALL IngresarUsuario('".$nombre."','".$email."','".$password."','".$rol."','".$rol2."', '".$direccion."', '".$departamento."');";
                $result = mysqli_query($con, $sql_query);
                header("location: ../index.php?success");
                // echo $sql_query;
                exit();



            } //elseif ($email == ""){
            //     $_COOKIE["error"] = "Debe llenar el campo de email.";
            //     header('Location: ../index.php');
            // } else {
            //     $_COOKIE["error"] = "Debe de llenar el campo de contraseña.";
            //     header('Location: ../index.php');
            // }
        }
        


    }
?>