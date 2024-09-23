<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>
<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Nombre: <input type="text" name="nombre"><br>
        Apellido: <input type="text" name="apellido"><br>
        Email: <input type="email" name="email"><br>
        Número de telefono: <input type="number" name="telefono"><br>
        <input type="submit"><br><br>
    </form>

    <?php
        class Contacto {
            private $nombre;
            private $apellido;
            private $email;
            private $telefono;

            function __construct($nombre, $apellido, $email, $telefono) {
                $this->nombre = $nombre;
                $this->apellido = $apellido;
                $this->email = $email;
                $this->telefono = $telefono;
            }

            function get_nombre() {
                return $this->nombre;
            }
            function get_apellido() {
                return $this->apellido;
            }
            function get_email() {
                return $this->email;
            }
            function get_telefono() {
                return $this->telefono;
            }

            function imprimir() {
                echo "Contacto agregado." . "<br><br>";
                echo "Información del contacto:" . "<br>" . 
                 "Nombre: " . $this->get_nombre() . "<br>" .
                 "Apellido: " . $this->get_apellido() . "<br>" .
                 "Email: " . $this->get_email() . "<br>" . 
                 "Telefono: " . $this->get_telefono();
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $email = $_POST["email"];
            $telefono = $_POST["telefono"];

            $contacto = new Contacto($nombre, $apellido, $email, $telefono);

            $contacto->imprimir();
        }
    ?>
</body>
</html>