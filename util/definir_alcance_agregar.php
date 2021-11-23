<?php
include_once('../php_config.php');
if(!isset($_SESSION['u_ID'])){
    header('Location: ../index.php');
}

$nv_id = $_POST['id'];
$nv_atributo = $_POST["alcance_atributo"];
$nv_descripcion = $_POST['alcance_descripcion_propia'];

$query = "CALL Ingresar_Alcances('".$nv_id."','".$nv_atributo."','".$nv_descripcion."')";        
$query_run = mysqli_query($con, $query);
// echo $query;
if($query_run) {
    mysqli_close($con);
    $_COOKIE["success"] = 1;
    header('Location: ../fiscalizador/definir_alcance_metas1.php');  
} else {
    $_COOKIE["success"] = 0;
    mysqli_close($con);
    header('Location: ../fiscalizador/definir_alcance_metas1.php');  
}

?>