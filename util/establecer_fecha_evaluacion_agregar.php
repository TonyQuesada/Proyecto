<?php
include_once('../php_config.php');
if(!isset($_SESSION['u_ID'])){
    header('Location: ../index.php');
}

$nv_componente = $_POST['fecha_componente'];
$nv_apertura = $_POST['fecha_apertura'];
$nv_cierre = $_POST['fecha_cierre'];

$query = "CALL Asignar_Fechas('".$nv_componente."','".$nv_apertura."','".$nv_cierre."')";        
$query_run = mysqli_query($con, $query);
// echo $query;
if($query_run) {
    mysqli_close($con);
    $_COOKIE["success"] = 1;
    header('Location: ../fiscalizador/establecer_fechas_evaluacion.php');  
} else {
    $_COOKIE["success"] = 0;
    mysqli_close($con);
    header('Location: ../fiscalizador/establecer_fechas_evaluacion.php');  
}

?>