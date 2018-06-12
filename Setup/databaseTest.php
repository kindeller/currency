<?php
$servername = "localhost";
$username = "currency_php";
$password = "MoneyMatters01";
$dbname = "currency";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO currency_values (currency_id, value)
	VALUES (1, 1.0)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>