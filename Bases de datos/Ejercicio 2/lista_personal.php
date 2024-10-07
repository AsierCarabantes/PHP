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
</style>
<body>

    <h1>Registro de películas</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Título: <input type="text" name="titulo"><br>
        ISAN: <input type="text" name="isan"><br>
        Año: <input type="number" name="ano"><br>
        <label for="puntuacion">Puntuación:</label>
        <select name="puntuacion" id="puntuacion">
            <option value="cero">0</option>;
            <option value="uno">1</option>;
            <option value="dos">2</option>;
            <option value="tres">3</option>;
            <option value="cuatro">4</option>;
            <option value="cinco">5</option>;
        </select><br><br>
        <input type="submit" name="registrarPelicula" value="Añadir película">
        <h1>Lista de películas</h1>
    </form>

    <?php 
        $servername = "db";
        $username = "root";
        $password = "root";
        $dbname = "mydatabase";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        /*
        $tabla = "CREATE TABLE Peliculas (
                  titulo VARCHAR(50) NOT NULL,
                  ISAN VARCHAR(24) PRIMARY KEY,
                  ano YEAR,
                  puntuacion INT CHECK (Puntuacion BETWEEN 0 AND 5),
                  correo VARCHAR(50),
                  FOREIGN KEY (correo) REFERENCES Usuarios(correo)
                  )";
        $conn->query($tabla);
        */

        echo "<table border='1'>";
        echo "<tr><th>Título</th><th>ISAN</th><th>Año</th><th>Puntuacion</th></tr>";


        //Recopilar información
        $correo = "";
        $titulo = $isan = $ano = $puntuacion = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["login"])) {
                $correo = $_POST["email"];
            }

            if (isset($_POST["registrarPelicula"])) {
                $titulo = $_POST["titulo"];
                $isan = $_POST["isan"];
                $ano = $_POST["ano"];
                $puntuacion = $_POST["puntuacion"];
            }
        }

        //Comprobar los campos del formulario
        $error = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {            
            $sqlSelect1 = "SELECT ISAN FROM Peliculas WHERE correo = '$correo'";
            $resultSelect1 = $conn->query($sqlSelect1);
            if ($resultSelect1->num_rows == 0 && strlen($isan) == 8) {
                if ((!empty($titulo)) && (!empty($ano)) && (!empty($puntuacion))) {
                    $sqlInsert = "INSERT INTO Peliculas (titulo, ISAN, ano, puntuacion, correo) 
                      VALUES ('$titulo', '$isan', '$ano', '$puntuacion', '$correo')";

                    $conn->query($sqlInsert);
                }
            }

            if ($resultSelect1->num_rows > 0) {
                if ((!empty($titulo)) && (!empty($ano)) && (!empty($puntuacion))) {
                    $sqlUpdate = "UPDATE Peliculas SET nombre = '$nombre' AND ";
                }
            }
        }
        
        
        /*
        $sqlInsert = "INSERT INTO Peliculas (titulo, ISAN, ano, puntuacion, correo) 
                      VALUES ('$titulo', '$isan', '$ano', '$puntuacion', '$correo')";

                $conn->query($sqlInsert);

                $sqlSelect3 = "SELECT titulo, ISAN, ano, puntuacion FROM Peliculas WHERE correo = '$correo'";
                $result = $conn->query($sqlSelect);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                            echo "<td>" . $row["titulo"] . "</td>";
                            echo "<td>" . $row["ISAN"] . "</td>";
                            echo "<td>" . $row["ano"] . "</td>";
                            echo "<td>" . $row["puntuacion"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td>-</td><td>-</td><td>-</td><td>-</td></tr>";
                }
        */
        echo "</table>";
    ?>
</body>
</html>