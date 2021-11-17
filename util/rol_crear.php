<?php
session_start();
if(!isset($_SESSION['u_ID'])){
    header('Location: ../index.php');
}
include "../php_config.php";

if (isset($_POST["id"])) {
    $ed_ID = $_POST['id'];
    $ed_descripcion = $_POST["unit-descripcion"];
    $query = "CALL sp_Cuenta_Modificar(
        ".$ed_ID.", 
        '".$ed_descripcion."'
    )";  
    $query_run = mysqli_query($con, $query);
    if($query_run) {
        mysqli_close($con);
        $_COOKIE["success"] = 1;
        header('Location: ../seguridad/cuentas.php');  
    } else {
        mysqli_close($con);
        $_COOKIE["success"] = 0;
        header('Location: ../seguridad/cuentas.php?');  
    }
} 