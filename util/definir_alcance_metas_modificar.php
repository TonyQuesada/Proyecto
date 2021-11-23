<?php
include_once('../php_config.php');
if(!isset($_SESSION['u_ID'])){
    header('Location: ../index.php');
}

$ed_id_alcance = $_POST["id"];
$ed_atributo = $_POST["atributo_nuevo"];
$ed_descripcion = $_POST["descrip_nuevo"];
$ed_descripcion_old = $_POST["descripcion_meta"];
                            
$sql2 = "SELECT * FROM Listar_Metas WHERE Descripcion='$ed_descripcion_old'";
$result2 = mysqli_query($con, $sql2);
// echo $sql2;
if ($result2) {
    $metas = mysqli_fetch_assoc($result2);
}

$ed_id_metas = $metas["ID"];

// Configurar




$query = "CALL Modificar_Alcance ('".$ed_id_alcance."','".$ed_id_metas."','".$ed_atributo."','".$ed_descripcion."')";        
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
