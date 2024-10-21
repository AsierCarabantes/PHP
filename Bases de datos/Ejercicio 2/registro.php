<?php 
    session_start();

    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "mydatabase";

    $conn = new mysqli($servername, $username, $password, $dbname); //Realizar conexión

    $nUsuario = $email = $pass = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["registro"])) { 
        if (isset($_POST["registro"])) {
            $nUsuario = $_POST["nUsuario"];         //Recoger los datos de registro introducidos
            $email = $_POST["email"];
            $pass = $_POST["pass"];
        }
        
        $sql = "INSERT INTO Usuarios (nombre, correo, password) 
                VALUES ('$nUsuario', '$email', '$pass')"; //Insertar el registro
        
        $existe = "SELECT correo FROM Usuarios WHERE correo = '$email'"; //Comprobar si existe
        $result = $conn->query($existe);

        if ($result->num_rows > 0) { //Si devueve una sola fila, existe y da error, sino inserta. 
            $_SESSION["error"] = "*El usuario introducido ya existe.";
            header("Location: formulario.php");
            exit;
        } else {
            $sql = "INSERT INTO Usuarios (nombre, correo, password) VALUES ('$nUsuario', '$email', '$pass')";
            if ($conn->query($sql) === TRUE) {
                $_SESSION["registroCorrecto"] = "Registro realizado correctamente!!";
                header("Location: formulario.php");
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
?>