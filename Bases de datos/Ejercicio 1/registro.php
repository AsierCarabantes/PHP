<html>
<head>
    <title>Registro</title>
</head>
<body>
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
</body>
</html>