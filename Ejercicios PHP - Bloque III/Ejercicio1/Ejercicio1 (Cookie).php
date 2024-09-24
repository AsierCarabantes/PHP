<?php
    $cookie_nombre = "usuario";
    $cookie_valor = "Asier Carabantes";
    setcookie($cookie_nombre, $cookie_valor, time() + (86400 * 365), "/");
    
    if (isset($_COOKIE["visitas_" . $cookie_nombre])) {
        $visitas = $_COOKIE["visitas_" . $cookie_nombre] + 1;
    } else {
        $visitas = 1;
    }
    setcookie("visitas_" . $cookie_nombre, 0, time() + (86400 * 365), "/");

    if (isset($_POST["reiniciar"])) {
        setcookie("visitas_" . $cookie_nombre, 0, time() + (86400 * 365), "/");
        $visitas = 0;
    } else {
        setcookie("visitas_" . $cookie_nombre, $visitas, time() + (86400 * 365), "/");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
</head>
<body>
    <?php
        if(isset($_COOKIE[$cookie_nombre])) {
            echo "<p><b>Bienvenido </b>" . $cookie_valor . "</p>";
            echo "Cantidad de visitas: " . $visitas; 
        } else {
            echo "<p><b>Bienvenido por primera vez </b>" . $cookie_valor . "</p>";
            echo "Cantidad de visitas: " . $visitas; 
        }
    ?>
    <br><br>
    <form method="POST" action="">
        <button type="submit" name="reiniciar">Reiniciar visitas</button>
    </form>
</body>
</html>