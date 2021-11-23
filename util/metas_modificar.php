<?php
include_once('../php_config.php');
if(!isset($_SESSION['u_ID'])){
    header('Location: ../index.php');
}

$ed_id = $_POST["id"]; 
$ed_componente = $_POST["metas_componente_nueva"];
$ed_descripcion = $_POST["meta_descripcion_nueva"]; 

$query = "CALL Modificar_Meta('".$ed_id."','".$ed_componente."','".$ed_descripcion."')";        
$query_run = mysqli_query($con, $query);
// echo $query;
if($query_run) {
    mysqli_close($con);
    $_COOKIE["success"] = 1;
    header('Location: ../director_area/metas.php');  
} else {
    $_COOKIE["success"] = 0;
    mysqli_close($con);
    header('Location: ../director_area/metas.php');  
}

?>
