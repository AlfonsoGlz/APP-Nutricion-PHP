<?php
session_start();
include("../php/conexion.php");

// Verificar si la sesión está iniciada
if(!isset($_SESSION['id_usuario'])){
    // Redirigir al usuario a la página de inicio de sesión si no hay sesión
    header("location: ../index.php");
    exit();
}
$id_usuario = $_SESSION['id_usuario']; // Obteniendo el id del usuario de la sesión
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../recursos/css/estilos_nav.css">
    <title>Document</title>
</head>
<style>
  @media only screen and (max-width: 600px) {
    .table {
        font-size: 12px;
    }
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

    <!--------------------------------------- TABLA DESAYUNO  --------------------------------------->
    <div class="container">
        <table class="table table-bordered" id="myTable_desayuno">
            <thead>                   <!---------- HEADER ---------->
                <h1>Desayuno</h1>
                <tr>
                  <th scope="col" hidden>Usuario</th>
                  <th scope="col" hidden>Id</th>
                  <th scope="col">Alimento</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Unidad</th>
                  <th scope="col">calorias (Kcal)</th>
                  <th scope="col">Proteinas (g)</th>
                  <th scope="col">Carbohidratos (g)</th>
                  <th scope="col">Grasas (g)</th>
                  <th scope="col">Eliminar</th>
                </tr>
            </thead>

            <tbody>                   <!---------- BODY ---------->
              <?php
                  $consulta_desayuno = "SELECT id_usuario, alimento_id, alimento_d, cantidad_d, unidad_d, calorias_d, proteinas_d, carbohidratos_d, grasas_d 
                                          FROM desayuno WHERE id_usuario=".$id_usuario;
                  $ejecuta_desayuno = odbc_exec($link2, $consulta_desayuno);
              ?>

              <?php
                while($row=odbc_fetch_array($ejecuta_desayuno)){
                  echo'
                  <tr>
                    <td hidden>'.$row['id_usuario'].'</td>
                    <td hidden>'.$row['alimento_id'].'</td>
                    <td>'.$row['alimento_d'].'</td>
                    <td>'.$row['cantidad_d'].'</td>
                    <td>'.$row['unidad_d'].'</td>
                    <td>'.$row['calorias_d'].'</td>
                    <td>'.$row['proteinas_d'].'</td>
                    <td>'.$row['carbohidratos_d'].'</td>
                    <td>'.$row['grasas_d'].'</td>
                    <td><a href="eliminar_de_desayuno.php?id='.$row['alimento_id'].'" class="btn btn-danger">Eliminar</a></td>
                  </tr>
                  ';
                }
              ?>
            </tbody>

            <tfoot>                   <!---------- FOOTER ---------->
              <?php
                $consulta_totales = "SELECT
                                      SUM(calorias_d) AS TotalCalorias,
                                      SUM(proteinas_d) AS TotalProteinas,
                                      SUM(carbohidratos_d) AS TotalCarbohidratos,
                                      SUM(grasas_d) AS TotalGrasas
                                    FROM desayuno
                                    WHERE id_usuario=".$id_usuario;
                $resultado = odbc_exec($link2, $consulta_totales);
                $totales = odbc_fetch_array($resultado);
              ?>
              <tr>
                  <th>Total</th>
                  <th></th>
                  <th></th>
                  <th><?php echo htmlspecialchars($totales['TotalCalorias']); ?></th>
                  <th><?php echo htmlspecialchars($totales['TotalProteinas']); ?></th>
                  <th><?php echo htmlspecialchars($totales['TotalCarbohidratos']); ?></th>
                  <th><?php echo htmlspecialchars($totales['TotalGrasas']); ?></th>
                  <th></th>
              </tr>
            </tfoot>
        </table>
        <a href="seleccion_desayuno.php">Seleccionar alimento</a>
    </div>

    <!--------------------------------------- TABLA COMIDA  --------------------------------------->            
    <div class="container">
        <table class="table table-bordered" id="myTable_comida">
            <thead>                   <!---------- HEADER ---------->
                <h1>Comida</h1>
                <tr>
                  <th scope="col" hidden>Usuario</th>
                  <th scope="col" hidden>Id</th>
                  <th scope="col">Alimento</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Unidad</th>
                  <th scope="col">calorias (Kcal)</th>
                  <th scope="col">Proteinas (g)</th>
                  <th scope="col">Carbohidratos (g)</th>
                  <th scope="col">Grasas (g)</th>
                  <th scope="col">Eliminar</th>
                </tr>
            </thead>

            <tbody>                   <!---------- BODY ---------->
              <?php
                $consulta_comida = "SELECT id_usuario, alimento_id, alimento_c, cantidad_c, unidad_c, calorias_c, proteinas_c, carbohidratos_c, grasas_c 
                                        FROM comida WHERE id_usuario=".$id_usuario;
                $ejecuta_comida = odbc_exec($link2, $consulta_comida);
              ?>

              <?php
                while($row=odbc_fetch_array($ejecuta_comida)){
                  echo'
                  <tr>
                    <td hidden>'.$row['id_usuario'].'</td>
                    <td hidden>'.$row['alimento_id'].'</td>
                    <td>'.$row['alimento_c'].'</td>
                    <td>'.$row['cantidad_c'].'</td>
                    <td>'.$row['unidad_c'].'</td>
                    <td>'.$row['calorias_c'].'</td>
                    <td>'.$row['proteinas_c'].'</td>
                    <td>'.$row['carbohidratos_c'].'</td>
                    <td>'.$row['grasas_c'].'</td>
                    <td><a href="eliminar_de_comida.php?id='.$row['alimento_id'].'" class="btn btn-danger">Eliminar</a></td>
                  </tr>
                  ';
                }
              ?>
            </tbody>

            <tfoot>                   <!---------- FOOTER ---------->
              <?php
                $consulta_totales = "SELECT
                                      SUM(calorias_c) AS TotalCalorias,
                                      SUM(proteinas_c) AS TotalProteinas,
                                      SUM(carbohidratos_c) AS TotalCarbohidratos,
                                      SUM(grasas_c) AS TotalGrasas
                                    FROM comida
                                    WHERE id_usuario=".$id_usuario;
                $resultado = odbc_exec($link2, $consulta_totales);
                $totales = odbc_fetch_array($resultado);
              ?>
              <tr>
                  <th>Total</th>
                  <th></th>
                  <th></th>
                  <th><?php echo htmlspecialchars($totales['TotalCalorias']); ?></th>
                  <th><?php echo htmlspecialchars($totales['TotalProteinas']); ?></th>
                  <th><?php echo htmlspecialchars($totales['TotalCarbohidratos']); ?></th>
                  <th><?php echo htmlspecialchars($totales['TotalGrasas']); ?></th>
                  <th></th>
              </tr>
            </tfoot>
        </table>
        <a href="seleccion_comida.php">Seleccionar alimento</a>
    </div>

    <!--------------------------------------- TABLA CENA  --------------------------------------->           
    <div class="container">
        <table class="table table-bordered" id="myTable_cena">
            <thead>                   <!---------- HEADER ---------->
                <h1>Cena</h1>
                <tr>
                  <th scope="col" hidden>Usuario</th>
                  <th scope="col" hidden>Id</th>
                  <th scope="col">Alimento</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Unidad</th>
                  <th scope="col">calorias (Kcal)</th>
                  <th scope="col">Proteinas (g)</th>
                  <th scope="col">Carbohidratos (g)</th>
                  <th scope="col">Grasas (g)</th>
                  <th scope="col">Eliminar</th>
                </tr>
            </thead>

            <tbody>                   <!---------- BODY ---------->
              <?php
                $consulta_cena = "SELECT id_usuario, alimento_id, alimento_cna, cantidad_cna, unidad_cna, calorias_cna, proteinas_cna, carbohidratos_cna, grasas_cna 
                                    FROM cena WHERE id_usuario=".$id_usuario;
                $ejecuta_cena = odbc_exec($link2, $consulta_cena);
              ?>

              <?php
                while($row=odbc_fetch_array($ejecuta_cena)){
                  echo'
                  <tr>
                    <td hidden>'.$row['id_usuario'].'</td>
                    <td hidden>'.$row['alimento_id'].'</td>
                    <td>'.$row['alimento_cna'].'</td>
                    <td>'.$row['cantidad_cna'].'</td>
                    <td>'.$row['unidad_cna'].'</td>
                    <td>'.$row['calorias_cna'].'</td>
                    <td>'.$row['proteinas_cna'].'</td>
                    <td>'.$row['carbohidratos_cna'].'</td>
                    <td>'.$row['grasas_cna'].'</td>
                    <td><a href="eliminar_de_cena.php?id='.$row['alimento_id'].'" class="btn btn-danger">Eliminar</a></td>
                  </tr>
                  ';
                }
              ?>
            </tbody>

            <tfoot>                   <!---------- FOOTER ---------->
              <?php
                $consulta_totales = "SELECT
                                      SUM(calorias_cna) AS TotalCalorias,
                                      SUM(proteinas_cna) AS TotalProteinas,
                                      SUM(carbohidratos_cna) AS TotalCarbohidratos,
                                      SUM(grasas_cna) AS TotalGrasas
                                    FROM cena
                                    WHERE id_usuario=".$id_usuario;
                $resultado = odbc_exec($link2, $consulta_totales);
                $totales = odbc_fetch_array($resultado);
              ?>
              <tr>
                  <th>Total</th>
                  <th></th>
                  <th></th>
                  <th><?php echo htmlspecialchars($totales['TotalCalorias']); ?></th>
                  <th><?php echo htmlspecialchars($totales['TotalProteinas']); ?></th>
                  <th><?php echo htmlspecialchars($totales['TotalCarbohidratos']); ?></th>
                  <th><?php echo htmlspecialchars($totales['TotalGrasas']); ?></th>
                  <th></th>
              </tr>
            </tfoot>
        </table>
        <a href="seleccion_cena.php">Seleccionar alimento</a>
    </div>

    <!--------------------------------------- TABLA SNACK  --------------------------------------->            
    <div class="container">
        <table class="table table-bordered" id="myTable_snack">
            <thead>                     <!---------- HEADER ---------->
                <h1>Colación</h1>
                <tr>
                  <th scope="col" hidden>Usuario</th>
                  <th scope="col" hidden>Id</th>
                  <th scope="col">Alimento</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Unidad</th>
                  <th scope="col">calorias (Kcal)</th>
                  <th scope="col">Proteinas (g)</th>
                  <th scope="col">Carbohidratos (g)</th>
                  <th scope="col">Grasas (g)</th>
                  <th scope="col">Eliminar</th>
                </tr>
            </thead>

            <tbody>                   <!---------- BODY ---------->
              <?php
                $consulta_snack = "SELECT id_usuario, alimento_id, alimento_s, cantidad_s, unidad_s, calorias_s, proteinas_s, carbohidratos_s, grasas_s 
                                    FROM snack WHERE id_usuario=".$id_usuario;
                $ejecuta_snack = odbc_exec($link2, $consulta_snack);
              ?>

              <?php
                while($row=odbc_fetch_array($ejecuta_snack)){
                  echo'
                  <tr>
                    <td hidden>'.$row['id_usuario'].'</td>
                    <td hidden>'.$row['alimento_id'].'</td>
                    <td>'.$row['alimento_s'].'</td>
                    <td>'.$row['cantidad_s'].'</td>
                    <td>'.$row['unidad_s'].'</td>
                    <td>'.$row['calorias_s'].'</td>
                    <td>'.$row['proteinas_s'].'</td>
                    <td>'.$row['carbohidratos_s'].'</td>
                    <td>'.$row['grasas_s'].'</td>
                    <td><a href="eliminar_de_snack.php?id='.$row['alimento_id'].'" class="btn btn-danger">Eliminar</a></td>
                  </tr>
                  ';
                }
              ?>
            </tbody>

            <tfoot>                   <!---------- FOOTER ---------->
              <?php
                $consulta_totales = "SELECT
                                      SUM(calorias_s) AS TotalCalorias,
                                      SUM(proteinas_s) AS TotalProteinas,
                                      SUM(carbohidratos_s) AS TotalCarbohidratos,
                                      SUM(grasas_s) AS TotalGrasas
                                    FROM snack
                                    WHERE id_usuario=".$id_usuario;
                $resultado = odbc_exec($link2, $consulta_totales);
                $totales = odbc_fetch_array($resultado);
              ?>
              <tr>
                  <th>Total</th>
                  <th></th>
                  <th></th>
                  <th><?php echo htmlspecialchars($totales['TotalCalorias']); ?></th>
                  <th><?php echo htmlspecialchars($totales['TotalProteinas']); ?></th>
                  <th><?php echo htmlspecialchars($totales['TotalCarbohidratos']); ?></th>
                  <th><?php echo htmlspecialchars($totales['TotalGrasas']); ?></th>
                  <th></th>
              </tr>
            </tfoot>
            
        </table>
        <a href="seleccion_snack">Seleccionar alimento</a>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


    <script>
          $('#myTable_desayuno').DataTable({
            "responsive": true,
            "paging": false,
            "searching": false,
            "info": false,
            "columnDefs": [
                  {
                      "targets": [4, 5, 6, 7, 8,],  // Indices de las columnas a las que quieres aplicar el formato
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


          $('#myTable_comida').DataTable({
            "responsive": true,
            "paging": false,
            "searching": false,
            "info": false,
            "columnDefs": [
                  {
                      "targets": [4, 5, 6, 7, 8,],  // Indices de las columnas a las que quieres aplicar el formato
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

          $('#myTable_cena').DataTable({
            "responsive": true,
            "paging": false,
            "searching": false,
            "info": false,
            "columnDefs": [
                  {
                      "targets": [4, 5, 6, 7, 8,],  // Indices de las columnas a las que quieres aplicar el formato
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

          $('#myTable_snack').DataTable({
            "responsive": true,
            "paging": false,
            "searching": false,
            "info": false,
            "columnDefs": [
                  {
                      "targets": [4, 5, 6, 7, 8,],  // Indices de las columnas a las que quieres aplicar el formato
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