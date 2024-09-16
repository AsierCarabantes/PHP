<html>
    <body>
        <?php
            $numero = $_GET["num"];
            $random = random_int(1,5);

            if ($numero == $random) {
                echo "Has acertado!!";
            } else {
                echo "Lo siento. El número era " . $random;
            }
        ?>
    </body>
</html>