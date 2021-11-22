<?php

    require_once('../php_config.php');
    // session_start();

    if(isset($_POST['Register']))
    {
        $nombre = mysqli_real_escape_string($con, $_POST['user-nombre']);
        $email = mysqli_real_escape_string($con, $_POST['user-correo']);
        $password = mysqli_real_escape_string($con, $_POST['user-contrasena']);
        

        if(!preg_match("/^[a-zA-Z]*$/", $nombre)){
            header("location: ../register.php?Invalid");
        } else {
            if ($nombre != "" && $email != "" && $password != ""){
                $sql_query = "CALL Registro('".$nombre."','".$email."','".$password."');";
                $result = mysqli_query($con, $sql_query);
                header("location: ../index.php?success");
                // echo $sql_query;
                // exit();



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