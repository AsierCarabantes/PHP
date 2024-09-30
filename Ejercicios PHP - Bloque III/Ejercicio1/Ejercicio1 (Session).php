<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1 (Session)</title>
</head>
<body>

<?php
    $_SESSION["usuario1"] = "jaime";
    $_SESSION["visitas"] = 1;

    if (!isset($_SESSION["usuario1"])) {
        echo "<p><b>Bienvenido </b>" . $_SESSION["usuario1"] . "</p>";
        echo "Cantidad de visitas: " . $_SESSION["visitas"]; 
    } else {
        echo "<p><b>Bienvenido de nuevo </b>" . $_SESSION["usuario1"] . "</p>";
        echo "Cantidad de visitas: " . $_SESSION["visitas"]; 
    }
?>
    
</body>
</html>