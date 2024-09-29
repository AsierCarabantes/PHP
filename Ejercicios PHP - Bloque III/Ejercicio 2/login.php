<?php 
    session_start();
    $usuario_valido = "admin";
    $password_valida = "1234";
    $_SESSION["error"] = "";

    if (isset($_POST["inicioSesion"])) {
        $usuario = $_POST["usuario"];
        $password = $_POST["pass"];

        if ($usuario == $usuario_valido && $password == $password_valida) {
            $_SESSION["usuario"] = $usuario; // Guardar el usuario en la sesión
            header("Location: pagina_bienvenida.php"); // Redirigir al usuario a página x
            unset($_SESSION["error"]);
        } else {
            $_SESSION["error"] = "El usuario o contraseña no son válidos.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
</head>
<style>
    .error {
        color: red;
    }
</style>
<body>
    <form method="POST" action="">
        Nombre de usuario: <input type="text" name="usuario"><br>
        Contraseña: <input type="password" name="pass"><br><br>
        <input type="submit" name="inicioSesion"><br><br>
        <span class="error"> <?php echo $_SESSION["error"]; ?> </span>
    </form>
</body>
</html>