<?php
    include("conexion.php");

    $nombre = $_POST['nombre_'];
    $correo = $_POST['correo_'];
    $usuario = $_POST['usuario_'];
    $contrasena = $_POST['pass_'];
    //$contrasena = hash('sha512', $contrasena);
    $contrasena = md5($_POST['pass_']);

    $reg_user = "INSERT INTO usuarios(nombre_completo,correo,usuario,contrasena) 
                    VALUES('$nombre','$correo','$usuario','$contrasena')";
    
    // Verificar si algún campo está vacío
    if (empty($nombre) || empty($correo) || empty($usuario) || empty($contrasena)) {
        echo '
            <script>
                alert("Por favor, no deje campos vacíos");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }

    ///verificar que no se repita el correo
    $verifica_query = "SELECT *FROM usuarios WHERE correo='$correo' ";
    $verifica_correo = odbc_exec($link2, $verifica_query);

    if(odbc_fetch_array($verifica_correo) > 0){
        echo '
            <script>
                alert("Este correo ya se encuentra registrado, intente con otro");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }

    ///verificar que no se repita el usuario
    $verifica_query = "SELECT *FROM usuarios WHERE usuario='$usuario' ";
    $verifica_usuario = odbc_exec($link2, $verifica_query);
    
    if(odbc_fetch_array($verifica_usuario) > 0){
        echo '
            <script>
                alert("Este usuario ya se encuentra registrado, intente con otro");
                window.location = "../index.php";
            </script>
        ';
        exit();
    }


    $ejecutar = odbc_exec($link2, $reg_user);

    if($ejecutar){
        echo '
            <script>
                alert("Usuario registrado");
                window.location = "../index.php";
            </script>
        ';
    }else{
        echo '
            <script>
                alert("Usuario no registrado, intentalo de nuevo");
                window.location = "../index.php";
            </script>
        ';
    }

?>