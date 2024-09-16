<!DOCTYPE html>
<html>
<body>

<?php
$importe = 3333;
if ($importe < 10000) {
	echo "Comision: " . ((($importe*5) / 100) + $importe);
} elseif ($importe >= 10000 && $importe < 20000) {
	echo "Comision: " . ((($importe*8) / 100) + $importe); 
} elseif ($importe >= 20000 && $importe < 40000) {
	echo "Comision: " . ((($importe*10) / 100) + $importe); 
} else echo "Comision: " . ((($importe*13) / 100) + $importe);  
?> 
</body>
</html>
