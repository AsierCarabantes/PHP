<html>
<head>
    <title>Registro</title>
</head>
<body>
    <h1>Registro realizado correctamente!!</h1>

    <?php 
        $servername = "db";
        $username = "root";
        $password = "root";
        $dbname = "mydatabase";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die ("Connection failed: " . $conn->connect_error);
        }

        $nombreUsuario = $correo = $password = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["registro"])) {
                $nombreUsuario = $_POST["nUsuario"];
                $correo = $_POST["email"];
                $password = $_POST["pass"];
            }
        }

        $sql = "INSERT INTO Usuarios (nombre, correo, password)
                VALUES ('$nombreUsuario', '$correo', '$password')";
                       
    ?>
</body>
</html>