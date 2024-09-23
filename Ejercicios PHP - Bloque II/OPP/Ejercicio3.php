<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
</head>
<body>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Nombre de Usuario: <input type="text" name="nombre"><br>
            Email: <input type="mail" name="email"><br>
            Contraseña: <input type="password" name="contra"><br>
            Repetir contraseña: <input type="password" name="repetirContra"><br>
            <input type="submit"><br>
    </form>

    <?php
        class Usuario {
            private $nombre;
            private $email;
            private $password;
            private $repetirPassword;

            function __construct($nombre, $email, $password, $repetirPassword) {
                $this->nombre = $nombre;
                $this->email = $email;
                $this->password = $password;
                $this->repetirPassword = $repetirPassword;
            }

            function get_nombre () {
                return $this->nombre;
            }
            function get_email () {
                return $this->email;
            }
            function get_password () {
                return $this->password;
            }
            function get_repetirPassword () {
                return $this->repetirPassword;
            }

            function validatePassword() {
                if ($this->get_password() == $this->get_repetirPassword()) {
                    echo "Las contraseñas coinciden";
                } else echo "Las contraseñas no coinciden";
            }
        }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombre = $_POST["nombre"];
                $correo = $_POST["email"];
                $contraseña = $_POST["contra"];
                $repetirContraseña = $_POST["repetirContra"];

                $Usuario = new Usuario($nombre, $correo, $contraseña, $repetirContraseña);
                $Usuario->validatePassword();
            }
    ?>
</body>
</html>