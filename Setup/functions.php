<?php
/*   FUNCTIONS    */

function getRate($amount,$from,$to){
	$rate; //local value to be calculated and returned.

	$url = 'https://www.xe.com/currencyconverter/convert/?Amount='.$amount.'&From='.$from.'&To='.$to; //construct the URL from parameters
	$ch = curl_init(); //initalise
	curl_setopt($ch, CURLOPT_URL, $url ); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$data = curl_exec($ch); //return string
	curl_close($ch);
	$loc = strpos($data, "<span class='uccResultAmount'>"); //get value from string using HTML markup
	$rate = substr($data, $loc, 36); //assign value
	$returnrate = floatval(preg_replace("/[^-0-9\.]/","",$rate));;
	return $returnrate; //return
}

function validateTable($conn) {
	//$result = $conn->query("SHOW TABLES LIKE 'currency_values'"); OLD CHECK (returns table)
	$createifnotexists = "CREATE TABLE IF NOT EXISTS currency_values (
	  id INT(11) NOT NULL auto_increment,
	  currency_id INT(11) NOT NULL,
	  value FLOAT(11, 4) NOT NULL,
	  timestamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	  PRIMARY KEY (id)
	)";

	$exists = $conn->query($createifnotexists);
}
?>