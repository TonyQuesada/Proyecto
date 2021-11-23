<?php
include_once('../php_config.php');
if(!isset($_SESSION['u_ID'])){
    header('Location: ../index.php');
}

require "../PHPMailer/Exception.php";
require "../PHPMailer/PHPMailer.php";
require "../PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$cr_id = $_POST["id"]; 
$cr_componente = $_POST["metas_componente"];
$cr_descripcion = $_POST["meta_descripcion_nueva"]; 

$id = $_SESSION['u_ID'];
$sql2 = "SELECT * FROM Usuarios WHERE idUsuario=$id";
$result2 = mysqli_query($con, $sql2);
if ($result2) {
    $usuario_session = mysqli_fetch_assoc($result2);
}          

$sql3 = "SELECT * FROM Listar_Metas WHERE ID=$cr_id";
$result3 = mysqli_query($con, $sql3);
if ($result3) {
    $metas = mysqli_fetch_assoc($result3);
}


$asunto = "Definicion de metas.";
$contenido = "<table style=\"max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;\">
                <tr>
                    <td style=\"background-color: #ecf0f1; text-align: left; padding: 0\">
                        <a href=\"https://app-4212b22d-234c-4da6-bf57-4a12d610ac49.cleverapps.io/index.php\">
                            <img width=\"20%\" style=\"display:block; margin: 1.5% 3%\" src=\"https://i.postimg.cc/bJ1hbBL1/logo.png\">
                        </a>
                    </td>
                </tr>

                <tr>
                    <td style=\"padding: 0\">
                        <img style=\"padding: 0; display: block\" src=\"https://www.auditool.org/images/32-Azul-Artículo_940.png\" width=\"100%\">
                    </td>
                </tr>

                <tr>
                    <td style=\"background-color: #ecf0f1\">
                        <div style=\"color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif\">
                            <h2 style=\"color: #e67e22; margin: 0 0 7px\">Buenas Departamento de Fiscalización</h2>
                            <p style=\"margin: 2px; font-size: 15px\">
                                Saludos cordiales.<br>
                                Por este medio le comunico que las metas de " . $metas["Componente"] . ", han sido ya establecidas.<br><br>                                
                                Atentamente.<br><br>" .
                                $usuario_session["Nombre"] ."<br>
                                Director de Área de Control Interno<br>
                                </p><br><br><br><br><br>
                            <div style=\"width: 100%; text-align: center\">
                                <a style=\"text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #3498db\" href=\"https://app-4212b22d-234c-4da6-bf57-4a12d610ac49.cleverapps.io/index.php\">Ir a la página</a>	
                            </div>
                            <p style=\"color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0\">Control Interno - 2021</p>
                        </div>
                    </td>
                </tr>
                </table>";

$sql = "SELECT * FROM Usuarios WHERE idRol=2";
$result = mysqli_query($con, $sql);
while ($usuarios = mysqli_fetch_array($result)) {

    $oMail = new PHPMailer();
    $oMail->isSMTP();
    $oMail->Host="smtp.gmail.com";
    $oMail->Port=587;
    $oMail->SMTPSecure="tls";
    $oMail->SMTPAuth=true;
    $oMail->Username= $usuario_session["Email"];
    $oMail->Password="Rock123456789";
    $oMail->setFrom($de, $usuario_session["Nombre"]);
    $oMail->addAddress( $usuarios["Email"], $usuarios["Nombre"] );
    $oMail->Subject=$asunto;
    $oMail->msgHTML($contenido);
    
    if(!$oMail->send()){
        echo $oMail->ErrorInfo;
    }

}

mysqli_close($con);
$_COOKIE["success"] = 1;
header('Location: ../director_area/metas_seccion.php');  

?>
