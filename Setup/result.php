<!DOCTYPE html>
<html>
<head>
	<title>Result</title>
	<?php
		function getRate($amount,$from,$to){
			$rate; //local value to be calculated and returned.

			$url = 'https://www.xe.com/currencyconverter/convert/?Amount=' .$amount.'&From='.$from.'&To='.$to; //construct the URL from parameters
			$ch = curl_init(); //initalise
			curl_setopt($ch, CURLOPT_URL, $url ); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			$data = curl_exec($ch); //return string
			curl_close($ch);

			$loc = strpos($data, "<span class='uccResultAmount'>"); //get value from string using HTML markup

			$rate = substr($data, $loc, 36); //assign value

			return $rate; //return
		}
	?>
</head>
<body>
<h1>Rate: <?php echo getRate($_POST["amount"],$_POST["currencyFrom"],$_POST["currencyTo"]).$_POST["currencyTo"]; ?></h1>
</body>
</html>