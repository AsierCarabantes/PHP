<?php 
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
    
    $existe = "SELECT correo FROM Usuarios WHERE correo = '$correo'";
    $result = $conn->query($existe);

    if ($result->num_rows > 0) {
        echo "Ya existe un usuario con ese correo";
    } else {
        $sql = "INSERT INTO Usuarios (nombre, correo, password) VALUES ('$nombreUsuario', '$correo', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "<h1>Registro realizado correctamente!!</h1>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

?>