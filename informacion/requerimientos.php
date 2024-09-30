<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Requerimientos Calóricos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="estilo.css" rel="stylesheet">
    <link rel="stylesheet" href="../recursos/css/estilos_req.css">
    <link rel="stylesheet" href="../recursos/css/estilos_nav.css">
</head>
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

    <div class="container">
        <h2 class="text-center my-4">Calculadora de Requerimientos Calóricos</h2>
        <form action="#" method="post">
            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" class="form-control" id="edad" name="edad" required>
            </div>
            <div class="form-group">
                <label for="peso">Peso (kg):</label>
                <input type="number" class="form-control" id="peso" name="peso" required>
            </div>
            <div class="form-group">
                <label for="altura">Altura (cm):</label>
                <input type="number" class="form-control" id="altura" name="altura" required>
            </div>
            <div class="form-group">
                <label for="genero">Género:</label>
                <select class="form-control" id="genero" name="genero">
                    <option value="hombre">Hombre</option>
                    <option value="mujer">Mujer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="actividad">Nivel de Actividad Física:</label>
                <select class="form-control" id="actividad" name="actividad">
                    <option value="1.2">Mayormente inactivo o sedentario</option>
                    <option value="1.3">Relativamente activo</option>
                    <option value="1.4">Moderadamente activo</option>
                    <option value="1.5">Activo</option>
                    <option value="1.7">Muy activo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Calcular</button>
        </form>
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
                
                    echo '
                        <div class="alert alert-primary" role="alert">
                            <h2>Tus requerimientos calóricos diarios son: ' . round($calorias) . ' calorias
                        </div>
                    ';
                }
            ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

