<?php
// Iniciamos la sesión para guardar los datos del usuario, como este archivo se importa en todas las páginas se mantiene la sesión
session_start();

// Parámetros de conexión a MySQL
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = "root"; /* Password */
$dbname = "control_interno"; /* Database name */

// Establecemos la conexión, si falla imprimimos un error.
$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}