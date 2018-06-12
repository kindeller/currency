<!DOCTYPE html>
<html>
<head>
	<title>Currency Checker Test</title>


<?php

$currencies = array("Great British Pounds"=>"GBP","Australian Dollars"=>"AUD","United States Dollar"=>"USD");

?>
</head>
<body>
	<form action="result.php" method="post">
		<p>
			<label for="amount">Amount:</label><input type="number" name="amount" placeholder="to be converted">
		</p>
	<p> 
   <label for="currencyFrom">From:<select name="currencyFrom" selected="<?php echo $currencies["Great British Pounds"] ?>"> 
   <?php foreach($currencies as $key => $value){ ?>
                    <option value="<?php echo $value; ?>"><?php echo $key.' ('.$value.')'; ?></option> 
    <?php } ?>
    </select></label></p>
    <p><label for="currencyTo">To: <select name="currencyTo" selected="<?php echo $currencies["Australian Dollars"] ?>"> 
   <?php foreach($currencies as $key => $value){ ?>
                    <option value="<?php echo $value; ?>"><?php echo $key.' ('.$value.')'; ?></option> 
    <?php } ?>
    </select></label></p>
    <button type="submit">Submit</button>
	</form>
</body>
</html>

