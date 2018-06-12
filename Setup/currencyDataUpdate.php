<?php
$servername = "localhost";
$username = "currency_php";
$password = "MoneyMatters01";
$dbname = "currency";


	//Get data from webstie using getRate function
$convertions = array(1 => getRate(1,'AUD','GBP'), 2 => getRate(1,'AUD','USD'));


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Check if currency tables exist and create if not
validateTable($conn);


foreach ($convertions as $key => $value) {
	$sql = "INSERT INTO currency_values (currency_id, value) VALUES ($key, $value)";
		//echo "<h1>Executing... Key: $key Value: $value</h1>";
		//echo "<p> Query -- \"".$sql."\"</p>";
	if ($conn->query($sql) === TRUE) {
	    echo "<p>Added record for currency_id = $key with a value of $value</p>";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
}

$conn->close();





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