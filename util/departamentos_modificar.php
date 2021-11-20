<?php
include_once('../php_config.php');
if(!isset($_SESSION['u_ID'])){
    header('Location: ../index.php');
}

$ed_id_departamento = $_POST["id"]; 
$ed_direccion = $_POST['departamento_direccion_nuevo'];
$ed_nombre = $_POST["departamento_nombre_nuevo"];       
$ed_id = $_POST["departamento_id_nuevo"];

$query = "CALL ModificarDepartamento('".$ed_id_departamento."','".$ed_direccion."','".$ed_nombre."','".$ed_id."')";        
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
