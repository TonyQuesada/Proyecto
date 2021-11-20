<?php
include_once('../php_config.php');
if(!isset($_SESSION['u_ID'])){
    header('Location: ../index.php');
}

$nv_direccion = $_POST['departamento_direccion'];     
$nv_nombre = $_POST["departamento_nombre"];       
$nv_id = $_POST["departamento_id"];

$query = "CALL IngresarDepartamento('".$nv_direccion."','".$nv_nombre."','".$nv_id."')";        
$query_run = mysqli_query($con, $query);
// echo $query;
if($query_run) {
    mysqli_close($con);
    $_COOKIE["success"] = 1;
    header('Location: ../fiscalizador/departamentos.php');  
} else {
    $_COOKIE["success"] = 0;
    mysqli_close($con);
    header('Location: ../fiscalizador/departamentos.php');  
}

?>