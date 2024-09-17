<html>
    <body>
        <?php
            $nombre = $_POST["user"];
            $correo = $_POST["mail"];
            $contraseña = $_POST["pass1"];
            $repetirContraseña = $_POST["pass2"];

            if ($contraseña == $repetirContraseña) {
                echo "Nombre de usuario: " . $nombre . "<br>" . 
                     "Correo electrónico: " . $correo . "<br>" . 
                     "Las contraseñas coinciden.";
            } else {
                echo "Nombre de usuario: " . $nombre . "<br>" . 
                     "Correo electrónico: " . $correo . "<br>" .
                     "Las contraseñas no coinciden.";
            }  
        ?>
    </body>
</html>