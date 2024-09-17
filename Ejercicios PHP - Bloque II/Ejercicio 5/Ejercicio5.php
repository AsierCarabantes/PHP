<html>
    <body>
        <?php
            $usuario = $_POST["user"];
            $valoracion = $_POST["rating"];
            $comentario = $_POST["comment"];

            echo "Comentario enviado." . "<br><br>";
            echo "Resumen del comentario: " . "<br>" . 
                 "Usuario: " . $usuario . "<br>" . 
                 "Valoración: " . $valoracion . "<br>" . 
                 "Comentario: " . $comentario;
        ?>
    </body>
</html>