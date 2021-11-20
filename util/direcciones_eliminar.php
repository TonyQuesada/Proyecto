<?php
include_once('../php_config.php');
if(!isset($_SESSION['u_ID'])){
    header('Location: ../index.php');
}

$el_id_direccion = $_POST["id"];

$query = "CALL EliminarDireccion('".$el_id_direccion."')";        
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
