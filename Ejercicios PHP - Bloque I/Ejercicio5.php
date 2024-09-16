<!DOCTYPE html>
<html>
<body>

<?php
$edad = 9;
$altura = 110;
$acompañado = true;

if ($acompañado) {
	if ($edad > 6) {
    	echo "pasa jay";
    } else echo "no pasas, lo siento jay";	
}
if (!$acompañado) {
	if ($edad > 10 || $altura > 120) {
    	echo "pasa jay";
    } else echo "no pasas, lo siento jay";
}    
?> 

</body>
</html>

