<?php 
    session_start( );

    if (isset($_POST["reiniciar"])) {
        session_unset();                    //Siempre al principio
        session_destroy();
        header("Location: " . $_SERVER['PHP_SELF']); //Redirigir al usuario a la misma página
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 (Session)</title>
</head>
<body>
    <?php 
        if (!isset($_SESSION["nombre"])) {
            $_SESSION["nombre"] = "Asier Carabantes";
            $_SESSION["visitas"] = 1;
            echo "<p><b>Bienvenido por primera vez </b>" . $_SESSION["nombre"] . "</p>";
            echo "<b>Cantidad de visitas: </b>" . $_SESSION["visitas"];
        } else {
            $_SESSION["visitas"] = $_SESSION["visitas"] + 1;
            echo "<p><b>Bienvenido de nuevo </b>" . $_SESSION["nombre"] . "</p>";
            echo "<b>Cantidad de visitas: </b>" . $_SESSION["visitas"];
        }
    ?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>">
        <input type="submit" name="reiniciar">
    </form>
</body>
</html>