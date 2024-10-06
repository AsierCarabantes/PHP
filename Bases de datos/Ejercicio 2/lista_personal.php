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
    <h1>Lista de películas</h1>
    <table>
        <th>Título</th>
        <th>ISAN</th>
        <th>Año</th>
        <th>Puntuación</th>
    </table>
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
    </form>
    <?php 
        
    ?>
</body>
</html>