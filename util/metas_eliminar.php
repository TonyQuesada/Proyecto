<?php
include_once('../php_config.php');
if(!isset($_SESSION['u_ID'])){
    header('Location: ../index.php');
}

$el_id = $_POST["id"];

$query = "CALL Eliminar_Meta('".$el_id."')";        
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
