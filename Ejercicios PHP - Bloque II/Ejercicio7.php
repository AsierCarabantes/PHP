<!DOCTYPE html>
<html>
    <head>
        <title>Ejercicio 7</title>
    </head>
    <body>
        <h1>Formulario de registro</h1><br>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Nombre: <input type="text" name="name"><br>
            Correo electrónico: <input type="email" name="mail"><br>
            Contraseña: <input type="password" name="pass1"><br>
            Confirmar contraseña: <input type="password" name="pass2"><br><br>
            <input type="submit">
        </form>

        <?php
            $nombre = $correo = $contraseña = $confirmarContraseña = "";
            $nombreErr = $correoErr = $contraseñaErr = $confirmarContraseñaErr = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["name"])) {
                    $nombreErr = "Campo obligatorio";
                }

                if (empty($_POST["mail"])) {
                    $nombreErr = "Campo obligatorio";
                }

                if (empty($_POST["pass1"])) {
                    $nombreErr = "Campo obligatorio";
                }

                if (empty($_POST["pass2"])) {
                    $nombreErr = "Campo obligatorio";
                }
            }

            function test_input($data) {

            }
        ?>
        
    </body>
</html>