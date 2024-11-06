<?php 
    session_start();

    if (isset($_POST["cerrarSesion"])) {    //Cerrar sesión
        session_unset();
        session_destroy();
        header("Location: formulario.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista personal de películas</title>
</head>
<style>
    table {
        border: 1px solid black;
    }
    .error {
        color: red;
    }
</style>
<body>

    <h1>Registro de películas</h1>
    <span class="error">
        <?php 
            if (isset($_SESSION["errorInsert"])) { //Mostrar cuando se crea la variable. Luego se elimina.
                echo $_SESSION["errorInsert"]; 
                unset($_SESSION["errorInsert"]); //Eliminar el mensaje de error de la sesión.
            }
        ?>
    </span><br>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Título: <input type="text" name="titulo"><br>
        ISAN: <input type="text" name="isan"><br>
        Año: <input type="number" name="ano"><br>
        <label for="puntuacion">Puntuación:</label>
        <select name="puntuacion" id="puntuacion">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br><br>
        <input type="submit" name="registrarPelicula" value="Añadir película"><br>
        <input type="submit" name="cerrarSesion" value="Cerrar sesión">
        <h1>Lista de películas</h1>
    </form>

    <?php 
        $servername = "db";
        $username = "root";
        $password = "root";
        $dbname = "mydatabase";

        // Conectar al servidor
        $conn = new mysqli($servername, $username, $password);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Crear base de datos si no existe
        $sqlCreateDatabase = "CREATE DATABASE IF NOT EXISTS $dbname";
        if ($conn->query($sqlCreateDatabase) === TRUE) {
            echo "Base de datos '$dbname' creada.<br>";
        } else {
            echo "Error al crear la base de datos: " . $conn->error;
        }

        // Seleccionar la base de datos
        $conn->select_db($dbname);

        // Crear la tabla Peliculas si no existe
        $sqlCreateTable = "CREATE TABLE IF NOT EXISTS Peliculas (
            titulo VARCHAR(50) NOT NULL PRIMARY KEY,
            ISAN VARCHAR(24),
            ano YEAR,
            puntuacion INT CHECK (puntuacion BETWEEN 0 AND 5),
            correo VARCHAR(50),
            FOREIGN KEY (correo) REFERENCES Usuarios(correo)
        )";
        
        if ($conn->query($sqlCreateTable) === TRUE) {
            echo "Tabla 'Peliculas' creada.<br>";
        } else {
            echo "Error al crear la tabla: " . $conn->error;
        }

        echo "<table border='1'>";
        echo "<tr><th>Título</th><th>ISAN</th><th>Año</th><th>Puntuacion</th></tr>";

        // Recopilar información
        $titulo = $isan = $ano = $puntuacion = "";
        $correo = $_SESSION["correo"];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {    // Recoger datos para insertar película
            if (isset($_POST["registrarPelicula"])) {
                $titulo = $_POST["titulo"];
                $isan = $_POST["isan"];
                $ano = $_POST["ano"];
                $puntuacion = $_POST["puntuacion"];
            }
        }

        // Comprobar los campos del formulario
        $error = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {    
            // INSERT        
            $sqlSelect1 = "SELECT ISAN FROM Peliculas WHERE correo = '$correo' AND ISAN = '$isan'";
            $resultSelect1 = $conn->query($sqlSelect1);
            if ($resultSelect1->num_rows == 0 && strlen($isan) == 8) {
                if ((!empty($titulo)) && (!empty($ano)) && (!empty($puntuacion))) {
                    $sqlInsert = "INSERT INTO Peliculas (titulo, ISAN, ano, puntuacion, correo)     
                      VALUES ('$titulo', '$isan', '$ano', '$puntuacion', '$correo')";
                    $conn->query($sqlInsert);
                    /*$titulo = $isan = $ano = $puntuacion = "";*/
                } 
            } else {
                $error = "Los campos son obligatorios";
                $_SESSION["errorInsert"] = "Los campos son obligatorios";
            }

            if ($resultSelect1->num_rows > 0) {
                // UPDATE
                if ((!empty($titulo)) && (!empty($ano)) && (!empty($puntuacion))) {
                    $sqlUpdate = "UPDATE Peliculas SET titulo = '$titulo', ano = '$ano', puntuacion = '$puntuacion' WHERE ISAN = '$isan'";
                    $conn->query($sqlUpdate);
                } else {
                    $error = "Los campos son obligatorios";
                }
            }

            if ($resultSelect1->num_rows > 0) {
                // DELETE
                if (empty($titulo)) {
                    $sqlDelete = "DELETE FROM Peliculas WHERE ISAN = '$isan'";
                    $conn->query($sqlDelete);
                }
            }  
        }

        // Insertar en la tabla
        $sqlSelect2 = "SELECT titulo, ISAN, ano, puntuacion FROM Peliculas WHERE correo = '$correo'";
        $result = $conn->query($sqlSelect2);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { // Recoger los datos que devuelve la consulta para insertarlos en la tabla
                echo "<tr>";
                    echo "<td>" . $row["titulo"] . "</td>";
                    echo "<td>" . $row["ISAN"] . "</td>";
                    echo "<td>" . $row["ano"] . "</td>";
                    echo "<td>" . $row["puntuacion"] . "</td>";
                echo "</tr>";
            }
        } 
    
        echo "</table>";
    ?>
</body>
</html>
