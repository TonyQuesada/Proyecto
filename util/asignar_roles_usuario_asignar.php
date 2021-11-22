<?php

    require_once('../php_config.php');
    // session_start();

    $id = mysqli_real_escape_string($con, $_POST['id']);
    $rol = mysqli_real_escape_string($con, $_POST['user-rol']);
    $rol2 = 4 ;
    

    $query = "CALL Asignar_Roles('".$id."','".$rol."','".$rol2."', NULL, NULL);";
    $query_run = mysqli_query($con, $query);
    // echo $query;
    if($query_run) {
        mysqli_close($con);
        $_COOKIE["success"] = 1;
        header('Location: ../fiscalizador/asignar_roles_usuario.php');  
    } else {
        $_COOKIE["success"] = 0;
        mysqli_close($con);
        header('Location: ../fiscalizador/asignar_roles_usuario.php');  
    }


?>