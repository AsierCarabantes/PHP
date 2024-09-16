<!DOCTYPE html>
<html>
<body>

<?php
$potencia = 2;
$cantidad = 10;
if ($potencia < $cantidad) {
	for ($i=1;$i<=$cantidad;$i++) {
	 	$nPotencia = $i ** $potencia;
        echo $i . "-" . $nPotencia . '<br>';
	}
}
?> 

</body>
</html>
