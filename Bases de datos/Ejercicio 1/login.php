<?php 
    session_start();

    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "mydatabase";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die ("Connection failed: " . $conn->connect_error);
    }

    $email = $pass = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["iniciosesion"])) {
            $email = $_POST["email"];
            $pass = $_POST["pass"];
        }
    }  
    
    $sql = "SELECT nombre FROM Usuarios WHERE correo = '$email' AND password = '$pass'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $_SESSION["nombre"] = $row["nombre"];
    header("Location: index.php");
    
?>