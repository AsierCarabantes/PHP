<!DOCTYPE html>
<html>
<body>

<?php
$total_compra = 20;
$tipo_compra = "mascotas";
$gastos_envio = 0;
$precio_final = 0;

if ($total_compra < 19) {
	if ($tipo_compra == "mascotas") {
    	echo "No se puede enviar";
    }    
    if ($tipo_compra == "ropa") {
    	echo "Los gastos de envío son 9 euros" . '<br>';
        $gastos_envio = 9;
    }
} elseif ($total_compra >= 19 && $total_compra <= 40) {
	echo "Los gastos de envío son 9 euros" . '<br>';
    	$gastos_envio = 9;
} else {
	echo "Los gastos de envío son gratuitos";
    	$gastos_envio = 0;
}


if ($total_compra > 19 && $tipo_compra == "mascotas") {
	$precio_final = (($total_compra + $gastos_envio));
    echo "Total compra: " . ($precio_final*0.1 + $precio_final);
}
if ($tipo_compra == "ropa") {
	$precio_final = (($total_compra + $gastos_envio));
    echo "Total compra: " . ($precio_final*0.21 + $precio_final);
}
?> 
</body>
</html>
