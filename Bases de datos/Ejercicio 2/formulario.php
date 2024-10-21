<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Formulario de registro</h1>
    <form method="POST" action="registro.php">
        <span class="error">
            <?php 
                if (isset($_SESSION["error"])) { //Mostrar cuando se crea la variable. Luego se elimina.
                    echo $_SESSION["error"]; 
                    unset($_SESSION["error"]); //Eliminar el mensaje de error de la sesión.
                }
            ?>
        </span><br>
        Nombre de usuario: <input type="text" name="nUsuario"><br>
        Correo electrónico: <input type="email" name="email"><br>
        Contraseña: <input type="password" name="pass"><br><br>
        <input type="submit" name="registro" value="Registro">
        <span>
            <?php 
                if (isset($_SESSION["registroCorrecto"])) { //Mostrar cuando se crea la variable. Luego se elimina.
                    echo $_SESSION["registroCorrecto"]; 
                    unset($_SESSION["registroCorrecto"]); //Eliminar el mensaje de error de la sesión.
                }
            ?>
        </span><br>
    </form>

    <h1>Inicio sesión</h1>
    <span class="error">
        <?php
            if (isset($_SESSION["errorLogin"])) { //Mostrar cuando se crea la variable. Luego se elimina.
                echo $_SESSION["errorLogin"];
                unset ($_SESSION["errorLogin"]); //Eliminar el mensaje de error de la sesión.
            }
            ?>
    </span><br>
    <form method="POST" action="login.php"> 
        Correo electrónico: <input type="email" name="email"><br>
        Contraseña: <input type="password" name="pass"><br><br>
        <input type="submit" name="login" value="Iniciar sesión">
    </form>
</body>
</html>