<?php
include("../php/conexion.php");

session_start();

// Verificar si la sesión está iniciada
if(!isset($_SESSION['id_usuario'])){
    // Redirigir al usuario a la página de inicio de sesión si no hay sesión
    header("location: ../index.php");
    exit();
}
$id_usuario = $_SESSION['id_usuario']; // Obteniendo el id del usuario de la sesión

$alimento_id = $_GET['id'];

$consulta_eliminar = "DELETE FROM cena WHERE alimento_id = $alimento_id AND id_usuario = $id_usuario";
$ejecuta_eliminar = odbc_exec($link2, $consulta_eliminar);
header("Location: armado_de_dieta.php");
?>