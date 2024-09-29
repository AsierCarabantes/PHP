<?php 
    $cookie_name = "usuario";
    $cookie_value = "Asier Carabantes";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 365), "/");

    if (isset($_COOKIE["tema"])) {
        $tema = $_COOKIE["tema"];
    } else {
        $tema = "Claro";
    }

    if (isset($_COOKIE["idioma"])) {
        $idioma = $_COOKIE["idioma"];
    } else {
        $idioma = "Español";
    }
?>
<html>
<head>
    <title>Ejercicio 3</title>
</head>
<style>

    
    form {
        border: 1px solid black;
        padding: 5px;
        width: 25%;
    }
</style>
<body>
    <?php 
        if (isset($_COOKIE["usuario"])) {
            echo "<h1>Bienvenido " . $_COOKIE["usuario"] . "</h1>";
        } else echo "Cookie desactivada";
    ?>
    <form method="POST" action="guardar.php">
        <h2>Configuración</h2>
        <h3>Tema</h3>
        <input type="radio" id="claro" name="tema" value="Claro"> 
        <label for="claro">Claro</label><br>
        <input type="radio" id="oscuro" name="tema" value="Oscuro">
        <label for="oscuro">Oscuro</label><br>
        <h3>Idioma</h3>
        <input type="radio" id="español" name="idioma" value="Español">
        <label for="español">Español</label><br>
        <input type="radio" id="ingles" name="idioma" value="Ingles">
        <label for="ingles">Ingles</label><br><br>
        <input type="submit" value="Guardar cambios">
    </form>
</body>    
</html>