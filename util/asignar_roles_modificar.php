<?php
include_once('../php_config.php');
if(!isset($_SESSION['u_ID'])){
    header('Location: ../index.php');
}

$ed_id = $_POST["id"];
$ed_nombre = $_POST["rol_nombre_nuevo"];       

$query = "CALL ModificarRol('".$ed_id."','".$ed_nombre."')";        
$query_run = mysqli_query($con, $query);
// echo $query;
if($query_run) {
    mysqli_close($con);
    $_COOKIE["success"] = 1;
    header('Location: ../fiscalizador/asignar_roles.php');  
} else {
    $_COOKIE["success"] = 0;
    mysqli_close($con);
    header('Location: ../fiscalizador/asignar_roles.php');  
}

?>
