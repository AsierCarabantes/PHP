<html>
    <body>
        <?php
            $nombre = $_POST["name"];
            $apellido = $_POST["surname"];
            $correo = $_POST["mail"];
            $telefono = $_POST["tel"];

            echo "Contacto agregado." . "<br><br>";
            echo "Información del contacto:" . "<br>" . 
                 "Nombre: " . $nombre . "<br>" .
                 "Apellido: " . $apellido . "<br>" .
                 "Email: " . $correo . "<br>" . 
                 "Telefono " . $telefono;
        ?>
    </body>
</html>