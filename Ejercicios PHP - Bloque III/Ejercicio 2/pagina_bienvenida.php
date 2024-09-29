<?php 
session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>
<body>
    <?php 
        echo "<p><b>Bienvenido </b>" . $_SESSION["usuario"] . "</p>";
    ?>
</body>
</html>
