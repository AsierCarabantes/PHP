<html>
<head>
    <title>Formulario de registro</title>
</head>
<body>
    <h1>Formulario de registro</h1>

    <form method="POST" action="registro.php">
        Nombre de usuario: <input type="text" name="nUsuario"><br>
        Correo electrónico: <input type="email" name="email"><br>
        Contraseña: <input type="password" name="pass"><br><br>
        <input type="submit" value="Registrar" name="registro">
    </form>
    <br><br>

    <h1>Inicio sesion</h1>

    <form method="POST" action="login.php">
        Correo electrónico: <input type="email" name="email"><br>
        Contraseña: <input type="password" name="pass"><br><br>
        <input type="submit" value="Iniciar sesion" name="iniciosesion">
    </form>
</body>
</html>