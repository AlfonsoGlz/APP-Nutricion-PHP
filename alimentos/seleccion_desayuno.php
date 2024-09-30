<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="../recursos/css/estilos_nav.css">
    <title>Seleccionar alimento</title>
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
                        <a class="nav-link active" aria-current="page" href="#">Información de salud</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Calcula tus requerimientos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Arma tu propia dieta</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Perfil</a>
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
        <table class="table table-bordered" id="myTable_general">
            <thead>
                <tr>
                  <th scope="col">Añadir y Porciones</th>
                  <th scope="col" hidden>Id</th>
                  <th scope="col">Alimento</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Unidad</th>
                  <th scope="col">calorias (Kcal)</th>
                  <th scope="col">Proteinas (g)</th>
                  <th scope="col">Carbohidratos (g)</th>
                  <th scope="col">Grasas (g)</th>
                </tr>
            </thead>

            <tbody>
            <?php
                include("../php/conexion.php");
                $consulta_carnes = "SELECT n.alimento_id, a.nombre_alimento, a.cantidad, a.unidad, n.calorias, n.proteinas, n.carbohidratos, n.grasas
                                        FROM alimentos a
                                        JOIN 
                                            nutrientes n ON a.alimento_id = n.alimento_id
                                        JOIN
                                            categorias c ON a.tipo_alimento_id = c.tipo_alimento_id";
                $ejecuta_consulta = odbc_exec($link2, $consulta_carnes);
            ?>

            <?php
                while($row=odbc_fetch_array($ejecuta_consulta)){
                    echo '
                    <tr>
                        <td align="center">
                            <form action="insertar_en_desayuno.php" method="get">
                                <button type="submit" style="display: inline-block; ">Añadir</button>
                                <input type="hidden" name="alimento_id" value="'.$row['alimento_id'].'">
                                <input type="hidden" name="nombre_alimento" value="'.htmlspecialchars($row['nombre_alimento']).'">
                                <input type="hidden" name="cantidad" value="'.$row['cantidad'].'">
                                <input type="hidden" name="unidad" value="'.htmlspecialchars($row['unidad']).'">
                                <input type="number" name="porciones" min="1" value="1" style="width: 50px; display: inline-block;">
                            </form>
                        </td>
                        <td hidden>'.$row['alimento_id'].'</td>
                        <td>'.$row['nombre_alimento'].'</td>
                        <td>'.$row['cantidad'].'</td>
                        <td>'.$row['unidad'].'</td>
                        <td>'.$row['calorias'].'</td>
                        <td>'.$row['proteinas'].'</td>
                        <td>'.$row['carbohidratos'].'</td>
                        <td>'.$row['grasas'].'</td>
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
          $('#myTable_general').DataTable({
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