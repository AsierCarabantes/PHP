<?php 
    session_start();

    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "mydatabase";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $nUsuario = $email = $pass = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["registro"])) {
            $nUsuario = $_POST["nUsuario"];
            $email = $_POST["email"];
            $pass = $_POST["pass"];
        }
    }

    $sql = "INSERT INTO Usuarios (nombre, correo, password) 
            VALUES ('$nUsuario', '$email', '$pass')";
    
    $existe = "SELECT correo FROM Usuarios WHERE correo = '$email'";
    $result = $conn->query($existe);

    if ($result->num_rows > 0) {
        $_SESSION["error"] = "*El usuario introducido ya existe.";
        header("Location: formulario.php");
    } else {
        $sql = "INSERT INTO Usuarios (nombre, correo, password) VALUES ('$nUsuario', '$email', '$pass')";
        if ($conn->query($sql) === TRUE) {
            header("Location: formulario.php");
            $_SESSION["registroCorrecto"] = "Registro realizado correctamente!!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>