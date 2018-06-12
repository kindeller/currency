<!DOCTYPE html>
<html>
<head>
	<title>Task 3 - Class activity 1</title>

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h1>Task 3 - Class activity 1</h1>


<table>
	<caption>Table showing the multiplication tables.</caption>
<?php

$t;

for ($i=1; $i < 12; $i++) { 
echo "<tr>";
for ($j=1; $j < 12; $j++) {
	echo multiply($i, $j);
}
echo "</tr>";
}


function multiply($val1, $val2){
$result = $val1 * $val2;
if ($val1 == $val2) {
	return "<td> $result </td>";
}
return "<td> $result </td>";
}

?>
</table>



<table>
	<caption>Table showing a while loop for displaying </caption>
<?php

$i = 1;
while ($i <= 12) {
	echo "<tr>";
	$j = 1;
	while ($j <= 12) {
		echo "<td> $i X $j = " .$i*$j ."</td>";
		$j++;
	}
	echo "</tr>";
	$i++;
}

?>

</table>




</body>
</html>