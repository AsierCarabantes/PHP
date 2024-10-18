<?php 
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "mydatabase";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $correo = $pass = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["login"])) {
            $correo = $_POST["email"];
            $pass = $_POST["pass"];
        }
    }

    $sql = "SELECT correo, password FROM Usuarios WHERE correo = '$correo' AND password = '$pass'";

    $result = $conn->query($sql);

    if ($result->num_rows == 0) {
        echo "Usuario o contraseña incorrectos";
    } else {
        header("Location: lista_personal.php");
        //Pregunta sobre redirigir el header
    }
?>