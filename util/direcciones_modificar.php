<?php
include_once('../php_config.php');
if(!isset($_SESSION['u_ID'])){
    header('Location: ../index.php');
}

$ed_id = $_POST["id"]; 
$ed_nombre = $_POST["direccion_nombre_nuevo"];       
$ed_director_id = $_POST["direccion_director_nuevo"];

$query = "CALL ModificarDireccion('".$ed_id."','".$ed_nombre."','".$ed_director_id."')";        
$query_run = mysqli_query($con, $query);
// echo $query;
if($query_run) {
    mysqli_close($con);
    $_COOKIE["success"] = 1;
    header('Location: ../fiscalizador/direcciones.php');  
} else {
    $_COOKIE["success"] = 0;
    mysqli_close($con);
    header('Location: ../fiscalizador/direcciones.php');  
}

?>
