<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
</head>
<body>
    <h1>Formulario de registro</h1>
    <form method="POST" action="registro.php">
        Nombre de usuario: <input type="text" name="nUsuario"><br>
        Correo electrónico: <input type="email" name="email"><br>
        Contraseña: <input type="password" name="pass"><br><br>
        <input type="submit" name="registro" value="Registro">
    </form>

    <h1>Inicio sesión</h1>
    <form method="POST" action="lista_personal.php">
        Correo electrónico: <input type="email" name="email"><br>
        Contraseña: <input type="password" name="pass"><br><br>
        <input type="submit" name="login" value="Iniciar sesión">
    </form>
</body>
</html>