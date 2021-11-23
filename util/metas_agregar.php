<?php
include_once('../php_config.php');
if(!isset($_SESSION['u_ID'])){
    header('Location: ../index.php');
}

$nv_componentes = $_POST['metas_componentes'];
$nv_descripcion = $_POST['meta_descripcion'];

$query = "CALL Ingresar_Metas('".$nv_componentes."','".$nv_descripcion."', NULL, NULL)";        
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