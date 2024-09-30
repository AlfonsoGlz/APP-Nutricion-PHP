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


$porciones = $_GET['porciones'];
$alimento_id = $_GET['alimento_id'];
$nombre_alimento = $_GET['nombre_alimento'];
$cantidad = $_GET['cantidad'];
$unidad = $_GET['unidad'];


// Consulta para obtener los datos nutricionales del alimento
$sql = "SELECT calorias, proteinas, carbohidratos, grasas FROM nutrientes WHERE alimento_id = $alimento_id";
$resultado = odbc_exec($link2, $sql);

if(odbc_fetch_row($resultado)) {
    $cantidad_total = $cantidad * $porciones;
    $calorias = odbc_result($resultado, "calorias") * $porciones;
    $proteinas = odbc_result($resultado, "proteinas") * $porciones;
    $carbohidratos = odbc_result($resultado, "carbohidratos") * $porciones;
    $grasas = odbc_result($resultado, "grasas") * $porciones;
    

    // Insertar en la tabla de desayuno
    $sql_insert = "INSERT INTO comida (id_usuario, alimento_id, alimento_c, cantidad_c, unidad_c, calorias_c, proteinas_c, carbohidratos_c, grasas_c) VALUES ($id_usuario, $alimento_id, '$nombre_alimento', $cantidad_total, '$unidad', $calorias, $proteinas, $carbohidratos, $grasas)";
    odbc_exec($link2, $sql_insert);
    header("Location: armado_de_dieta.php");
    exit;
} else {
    echo "Error al obtener datos del alimento";
}
?>