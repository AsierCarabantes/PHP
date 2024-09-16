<!DOCTYPE html>
<html>
<body>

<?php
$numero = 13;

echo $numero . ", ";
while ($numero != 1) {
	if ($numero%2 == 0) {
		$numero = $numero / 2;
        echo $numero . ', ';
	} else {
    	$numero = ($numero * 3) + 1;
        echo $numero . ', ';
    }    
}
?> 

</body>
</html>
