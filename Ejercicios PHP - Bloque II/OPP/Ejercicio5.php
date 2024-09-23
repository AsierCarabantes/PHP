<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
</head>
<body>
    <form method="POST" action="Ejercicio5.php">
        Nombre de usuario: <input type="text" name="nombre"><br><br>
        Valoracion: <input type="number" name="valoracion" min="1" max="5"><br><br>
        Comentario: <textarea name="comment" placeholder="Coméntanos"></textarea><br><br>
        <input type="submit"><br>
    </form>

    <?php
        class Valoracion {
            private $usuario;
            private $valoracion;
            private $comentario;

            function __construct($usuario, $valoracion, $comentario) {
                $this->usuario = $usuario;
                $this->valoracion = $valoracion;
                $this->comentario = $comentario;
            }

            function get_usuario() {
                return $this->usuario;
            }
            function get_valoracion() {
                return $this->valoracion;
            }
            function get_comentario() {
                return $this->comentario;
            }

            function imprimir() {
                echo "Comentario enviado." . "<br><br>";
                echo "Resumen del comentario: " . "<br>" . 
                     "Usuario: " . $this->usuario . "<br>" . 
                     "Valoración: " . $this->valoracion . "<br>" . 
                     "Comentario: " . $this->comentario;
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $usuario = $_POST["nombre"];
            $valoracion = $_POST["valoracion"];
            $comentario = $_POST["comment"];

            $valoracion = new Valoracion($usuario, $valoracion, $comentario);
            $valoracion->imprimir();
        }
    ?>
</body>
</html>