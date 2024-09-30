<?php
session_start();
include("conexion.php");

// Comprobar si la sesión del usuario está activa
if (!isset($_SESSION['usuario'])) {
    // Si no hay sesión de usuario, redirigir a la página de inicio de sesión
    header("location: index.php");
    exit();
}

// Obtener los datos del usuario de la base de datos
$usuario = $_SESSION['usuario'];
$query = "SELECT nombre_completo, correo, usuario FROM usuarios WHERE usuario='$usuario'";
$resultado = odbc_exec($link2, $query);
$datos_usuario = odbc_fetch_array($resultado);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../recursos/css/estilos_nav.css">
    <title>Perfil</title>
</head>
<style>
.profile-container {
  width: 100%;
  max-width: 600px;
  margin: 0 auto;
  background: #fff;
  padding: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  border-radius: 8px;
}

.profile-header h2 {
  margin: 0;
  color: #333;
  font-weight: normal;
}


.info-field {
  margin-bottom: 10px;
}

.info-field label {
  display: block;
  color: #333;
  margin-bottom: 5px;
}

.info-field input {
  width: 100%;
  padding: 8px;
  border: 1px solid #ddd;
  border-radius: 4px;
}

.profile-actions button {
  padding: 10px 15px;
  border: none;
  border-radius: 4px;
  background-color: #5cb85c;
  color: white;
  margin-right: 10px;
  cursor: pointer;
}

.profile-actions button:nth-child(2) {
  background-color: #f0ad4e;
}

</style>
<body>
      <!-- INICIO DE MENU DE NAVEGACION -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="../inicio.php">Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="info.php">Información de salud</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="requerimientos.php">Calcula tus requerimientos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../alimentos/armado_de_dieta.php">Arma tu propia dieta</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../php/perfil.php">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../php/cerrar_sesion.php">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>  
    <!-- FIN DE MENU DE NEVAGACION   -->
    <br>
    <br>

<div class="profile-container">
  <div class="profile-header">
    <h2 align="center">Perfil de Usuario</h2>
  </div>
  <div class="profile-info">
        <div class="info-field">
            <label for="username">Usuario</label>
            <input type="text" id="username" placeholder="<?php echo $datos_usuario['usuario']; ?>" readonly>
        </div>

        <div class="info-field">
            <label for="name">Nombre</label>
            <input type="text" id="name" placeholder="<?php echo $datos_usuario['nombre_completo']; ?>" readonly>
        </div>

        <div class="info-field">
            <label for="surname">Correo</label>
            <input type="email" id="correo" placeholder="<?php echo $datos_usuario['correo']; ?>" readonly>
        </div>

  </div>
  <div class="profile-actions">
        <button type="button">Actualizar</button>
        <button type="button">Cambiar Contraseña</button>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
