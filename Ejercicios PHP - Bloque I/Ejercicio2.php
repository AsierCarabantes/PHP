<!DOCTYPE html>
<html>
<body>

<?php
$x = 4;
$y = 3;
$z = 2;
if ($x > $y && $x > $z) {
	echo $x;
} elseif ($y > $x && $y > $z) {
	echo $y;
} else echo $z;
?> 

</body>
</html>
