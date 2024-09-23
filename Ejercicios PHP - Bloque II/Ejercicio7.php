<!DOCTYPE html>
<html>
    <head>
        <style>
            .error {color: red}
        </style>
        <title>Ejercicio 7</title>
    </head>
    <body>
        <?php
            $nombre = $correo = $password = $confirmPassword = "";
            $nombreErr = $correoErr = $passwordErr = $confirmPasswordErr = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["name"])) {
                    $nombreErr = "Campo obligatorio";
                } else {
                    $nombre = test_input($_POST["name"]);
                    if (!preg_match("/^[A-Za-z\s]+$/", $nombre)) {
                        $nombreErr = "Sólo letras mayúsculas, minúsculas y espacios";
                    } 
                }

                if (empty($_POST["mail"])) {
                    $correoErr = "Campo obligatorio";
                } else {
                    $correo = test_input($_POST["mail"]);
                    if (!preg_match("/^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/", $correo)) {
                        $correoErr = "Formato no válido";
                    }
                }

                if (empty($_POST["pass1"])) {
                    $passwordErr = "Campo obligatorio";
                } else {
                    $password = test_input($_POST["pass1"]);
                    if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{6,}$/", $password)) {
                        $passwordErr = "La contraseña debe tener al menos 6 caracteres, incluir una letra mayúscula, una minúscula, un número y un símbolo.";
                    }
                }

                if (empty($_POST["pass2"])) {
                    $confirmPasswordErr = "Campo obligatorio";
                } else {
                    $confirmPassword = test_input($_POST["pass2"]);
                    if ($confirmPassword != $password) {
                        $confirmPasswordErr = "La contraseña no coincide";
                    }
                }
            }

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
        ?>    

            <h1>Formulario de registro</h1><br>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                Nombre: <input type="text" name="name">
                <span class="error">* <?php echo $nombreErr;?></span><br>
                Correo electrónico: <input type="email" name="mail">
                <span class="error">* <?php echo $correoErr;?></span><br>
                Contraseña: <input type="password" name="pass1">
                <span class="error">* <?php echo $passwordErr;?></span><br>
                Confirmar contraseña: <input type="password" name="pass2">
                <span class="error">* <?php echo $confirmPasswordErr;?></span><br><br>
            <input type="submit">
        </form> 
    </body>
</html>