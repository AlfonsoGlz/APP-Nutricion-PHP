<?php
    include("../php/conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../recursos/css/estilos_nav.css">
    <title>Origen Animal y Derivados</title>
</head>
<style>
    a{
        color: #FF8033;
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
                        <a class="nav-link active" aria-current="page" href="../informacion/info.php">Información de salud</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../informacion/requerimientos.php">Calcula tus requerimientos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="armado_de_dieta.php">Arma tu propia dieta</a>
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

    <div class="container">
        <h1 align="center">Origen Animal y Derivados</h1>
        <br>
        <table class="table table-bordered" id="myTable_carnes">
            <thead>
                <tr>
                  <th scope="col">Alimento</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Unidad</th>
                  <th scope="col">calorias (Kcal)</th>
                  <th scope="col">Proteinas (g)</th>
                  <th scope="col">Carbohidratos (g)</th>
                  <th scope="col">Grasas (g)</th>
                  <th scope="col">Sodio (mg)</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    $consulta_carnes = "SELECT a.nombre_alimento, a.cantidad, a.unidad, n.calorias, n.proteinas, n.carbohidratos, n.grasas, n.sodio
                                            FROM alimentos a
                                            JOIN 
                                                nutrientes n ON a.alimento_id = n.alimento_id
                                            JOIN
                                                categorias c ON a.tipo_alimento_id = c.tipo_alimento_id
                                            WHERE
                                                c.nombre = 'carnes'";
                    $ejecuta_consulta = odbc_exec($link2, $consulta_carnes);

                    while($row=odbc_fetch_array($ejecuta_consulta)){
                        $modalId = str_replace(' ', '_', $row['nombre_alimento']); // Reemplazar espacios con guiones bajos
                        echo'
                            <tr>
                                <td>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalAlimento-'.$modalId.'">'.$row['nombre_alimento'].'</a>
                                        <div class="modal fade" id="modalAlimento-'.$modalId.'" tabindex="-1">
                                            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalLabel'.$row['nombre_alimento'].'">Micronutrientes y fibra</h5>
                                                    </div>
                                                        <div class="modal-body">
                                                            <table class="table table-bordered" id="myTable_carnes_micros">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Nombre</th>
                                                                        <th scope="col">Vitamina A (ug)</th>
                                                                        <th scope="col">Vitamina B9 (mg)</th>
                                                                        <th scope="col">Vitamina B12 (ug)</th>
                                                                        <th scope="col">Vitamina C (mg)</th>
                                                                        <th scope="col">Vitamina D (ug)</th>
                                                                        <th scope="col">Hierro (mg)</th>
                                                                        <th scope="col">Calcio (mg)</th>
                                                                        <th scope="col">Magnesio (mg)</th>
                                                                        <th scope="col">Zinc (mg)</th>
                                                                        <th scope="col">Potasio (mg)</th>
                                                                        <th scope="col">Fibra (g)</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>';
                                                                    $nombre_alimento = $row['nombre_alimento'];
                                                                    $consulta_detalles = "SELECT a.nombre_alimento, n.vitamina_a, n.vitamina_b9, n.vitamina_b12, n.vitamina_c, n.vitamina_d, n.hierro, n.calcio, n.magnesio, n.zinc, n.potasio, n.fibra
                                                                            FROM alimentos a
                                                                            JOIN 
                                                                                nutrientes n ON a.alimento_id = n.alimento_id
                                                                            WHERE
                                                                                a.nombre_alimento = '$nombre_alimento'";

                                                                    $ejecuta_detalles = odbc_exec($link2, $consulta_detalles);

                                                                    while($detalle=odbc_fetch_array($ejecuta_detalles)){
                                                                        echo'
                                                                            <tr>
                                                                                <td>'.$detalle['nombre_alimento'].'</td>
                                                                                <td>'.$detalle['vitamina_a'].'</td>
                                                                                <td>'.$detalle['vitamina_b9'].'</td>
                                                                                <td>'.$detalle['vitamina_b12'].'</td>
                                                                                <td>'.$detalle['vitamina_c'].'</td>
                                                                                <td>'.$detalle['vitamina_d'].'</td>
                                                                                <td>'.$detalle['hierro'].'</td>
                                                                                <td>'.$detalle['calcio'].'</td>
                                                                                <td>'.$detalle['magnesio'].'</td>
                                                                                <td>'.$detalle['zinc'].'</td>
                                                                                <td>'.$detalle['potasio'].'</td>
                                                                                <td>'.$detalle['fibra'].'</td>
                                                                            </tr>';
                                                                    }
                                                                echo'
                                                                </tbody>
                                                            </table>
                                                      </div>
                                                </div>
                                            </div>
                                        </div>';        
                        echo'       
                                </td>
                                <td>'.$row['cantidad'].'</td>
                                <td>'.$row['unidad'].'</td>
                                <td>'.$row['calorias'].'</td>
                                <td>'.$row['proteinas'].'</td>
                                <td>'.$row['carbohidratos'].'</td>
                                <td>'.$row['grasas'].'</td>
                                <td>'.$row['sodio'].'</td>
                            </tr>
                        ';
                    }
                ?>
            </tbody>
        </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
          $('#myTable_carnes').DataTable({
              "columnDefs": [
                  {
                      "targets": [3, 4, 5, 6, 7],  // Indices de las columnas a las que quieres aplicar el formato
                      "render": function(data, type, row) {
                          if (type === 'display' || type === 'filter') {
                              let number = parseFloat(data);
                              if (isNaN(number)) {
                                  return data; // Si no es un número, simplemente devuelve el valor original
                              }
                              if (number === 0) {
                                  return '0.00'; // Esto asegura que el cero se muestre correctamente
                              }
                              return number.toFixed(2); // En otros casos, simplemente asegúrate de que tenga dos decimales
                          }
                          return data; // Retorna el valor original para los otros tipos de datos (por ejemplo, para ordenación)
                      }
                  }
              ]
          });


</script>

</body>
</html>