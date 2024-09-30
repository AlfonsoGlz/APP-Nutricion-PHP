<?php
    session_start();
    include("conexion.php");

    $usuario = $_POST['user_'];
    $contrasena = $_POST['passw_'];

    // Modifica la consulta para seleccionar también el id_usuario
    $verifica_query = "SELECT id_usuario, usuario FROM usuarios WHERE usuario='$usuario' AND contrasena='$contrasena'";
    $validar_login = odbc_exec($link2, $verifica_query);

    if($row = odbc_fetch_array($validar_login)){
        $_SESSION['usuario'] = $usuario; // Almacenar el nombre de usuario en la sesión
        $_SESSION['id_usuario'] = $row['id_usuario']; // Almacenar el id_usuario en la sesión
        header("location: ../inicio.php");
        exit();
    }else{
        echo '
            <script>
                alert("Usuario o contraseña no validos");
                window.location="../index.php";
            </script>
        ';
        exit();
    }
?>




