<?php
// Iniciamos la sesión para guardar los datos del usuario, como este archivo se importa en todas las páginas se mantiene la sesión
session_start();

// Parámetros de conexión a MySQL
$host = "bpqw7wy3m4jxuqui9qxt-mysql.services.clever-cloud.com"; /* Host name */
$user = "u6us1gqytoh1zhax"; /* User */
$password = "GC5S9CoFBHH79baNv7lF"; /* Password */
$dbname = "bpqw7wy3m4jxuqui9qxt"; /* Database name */

// Establecemos la conexión, si falla imprimimos un error.
$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}