<?php
    session_start();

    if(!isset($_SESSION['usuario'])){
        echo'
            <script>
                alert("Por favor, debe iniciar sesion");
                window.location = "index.php";
            </script>
        ';
        session_destroy();
        die();
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./recursos/css/estilos_nav.css">
    <title>INICIO</title>
</head>
<style>
    .container{
        min-height: 100%;
        margin-top: 5%; /*separa las cards del navbar*/
    }

    .btn{
        width: 100%;
        background: #003f82;
        border: none;
    }

    @media (max-width: 575.98px) {
        .card img {
            width: 100%; /* Ajusta la imagen para que ocupe el 100% del ancho de la tarjeta */
            height: auto; /* Mantiene la proporción de la imagen */
        }
    }

    /* Estilos para dispositivos medianos (entre 576px y 768px) */
    @media (min-width: 576px) and (max-width: 767.98px) {
        .card img {
            width: 100%; /* Opcional, si quieres un tamaño diferente para dispositivos medianos */
            height: auto;
        }
    }

</style>
<body>
    <!-- INICIO DE MENU DE NAVEGACION -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="inicio.php">Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./informacion/info.php">Información de salud</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./informacion/requerimientos.php">Calcula tus requerimientos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./alimentos/armado_de_dieta.php">Arma tu propia dieta</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./php/perfil.php">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./php/cerrar_sesion.php">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>  
    <!-- FIN DE MENU DE NEVAGACION   -->

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                    <img src="./recursos/multimedia/carnes.JPEG" class="create" alt="...">
                    <div class="card-body">
                      <h5 class="card-title" align="center">ORIGEN ANIMAL Y DERIVADOS</h5>
                      <p class="card-text" align="center"> Incluye alimentos de origen animal, como carne de res, cerdo, pollo, huevos y menudencias.</p>
                      <a href="./alimentos/read_carnes.php" class="btn btn-primary">Ir</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                    <img src="./recursos/multimedia/legumbres.JPEG" class="read" alt="...">
                    <div class="card-body">
                      <h5 class="card-title" align="center">LEGUMBRES</h5>
                      <p class="card-text" align="center">Incluye alimentos de origen vegetal, como legumbres, frijoles, lentejas y garbanzos, ricos en proteínas y fibras.</p>
                      <a href="./alimentos/read_legumbres.php" class="btn btn-primary">Ir</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                    <img src="./recursos/multimedia/frutos_secos.JPEG" class="update" alt="...">
                    <div class="card-body">
                      <h5 class="card-title" align="center">FRUTOS SECOS</h5>
                      <p class="card-text" align="center">Incluye frutos secos como nueces, almendras, avellanas y cacahuetes, que son fuentes de grasas saludables</p>
                      <a href="./alimentos/read_fsecos.php" class="btn btn-primary">Ir</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                    <img src="./recursos/multimedia/mariscos.JPEG" class="delete" alt="...">
                    <div class="card-body">
                      <h5 class="card-title" align="center">MARISCOS</h5>
                      <p class="card-text" align="center">Incluye camarones, langostas, cangrejos y mejillones,etc. que son una fuente de proteínas magras</p>
                      <a href="./alimentos/read_mariscos.php" class="btn btn-primary">Ir</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                    <img src="./recursos/multimedia/frutas.JPEG" class="read" alt="...">
                    <div class="card-body">
                      <h5 class="card-title" align="center">FRUTAS</h5>
                      <p class="card-text" align="center">Inluyen frutas populares como manzana, sandia, fresa que aportan un buen contenido nutricional</p>
                      <a href="./alimentos/read_frutas.php" class="btn btn-primary">Ir</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                    <img src="./recursos/multimedia/verduras.JPEG" class="update" alt="...">
                    <div class="card-body">
                      <h5 class="card-title" align="center">VERDURAS</h5>
                      <p class="card-text" align="center">Incluyen verduras populares como zanahoria, brocoli que aportan un buen contendio de micronutrinetes</p>
                      <a href="./alimentos/read_verduras.php" class="btn btn-primary">Ir</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                    <img src="./recursos/multimedia/quesos.JPEG" class="delete" alt="...">
                    <div class="card-body">
                      <h5 class="card-title" align="center">LACTEOS Y DERIVADOS</h5>
                      <p class="card-text" align="center">Incluyen alimentos derivados de la leche, como quesos, yogur que aportan buen contenido de calcio</p>
                      <a href="./alimentos/read_lac.php" class="btn btn-primary">Ir</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="card">
                    <img src="./recursos/multimedia/cereal.JPEG" class="create" alt="...">
                    <div class="card-body">
                      <h5 class="card-title" align="center">CEREALES Y GRANOS</h5>
                      <p class="card-text" align="center">Incluyen alimentos derivados del cereal y granos integrales que aportan buen contendio en fibra</p>
                      <a href="./alimentos/read_cereales.php" class="btn btn-primary">Ir</a>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>