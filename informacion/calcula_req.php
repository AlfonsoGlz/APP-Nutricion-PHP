<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $edad = $_POST['edad'];
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    $genero = $_POST['genero'];
    $actividad = $_POST['actividad'];

    // Fórmula de Mifflin-St Jeor
    if ($genero == "hombre") {
        $bmr = 10 * $peso + 6.25 * $altura - 5 * $edad + 5;
    } else {
        $bmr = 10 * $peso + 6.25 * $altura - 5 * $edad - 161;
    }

    // Calcular requerimientos calóricos diarios
    $calorias = $bmr * $actividad;

    echo "<h3>Tus requerimientos calóricos diarios son: " . round($calorias) . " calorías.</h3>";
}
?>
