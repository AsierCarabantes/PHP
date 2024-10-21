<?php
    session_start();

    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "mydatabase";

    $conn = new mysqli($servername, $username, $password, $dbname); //Realizar la conexión

    $correo = $pass = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["login"])) {
            $correo = $_POST["email"];
            $pass = $_POST["pass"];
        }
    
        $sql = "SELECT correo, password FROM Usuarios WHERE correo = '$correo' AND password = '$pass'"; //Comprobar inicio sesión

        $result = $conn->query($sql);

        if ($result->num_rows == 0) {
            $_SESSION["errorLogin"] = "*Correo o contraseña incorrectos";
            header("Location: formulario.php");
            exit;
        } else {
            $_SESSION["correo"] = $correo;
            header("Location: lista_personal.php");
            exit;
        }
    }
?>