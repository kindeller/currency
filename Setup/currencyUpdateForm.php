<!DOCTYPE html>
<html>
<head>
	<title>Currency Updater</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

var updates = 0;
$(document).ready(function(){
	setInterval(function(){updateData()}, 10000); //86400000 = 24 hours // 43200000 = 12 Hours // 3600000 = 1 hour 
});

function updateData() {
	$.ajax({type: "POST", url: "currencyDataUpdate.php", data: {}, success: function(){
		updates++;
		$("#text").html("Updated Database Successfully. Current iterations : " + updates);
	}});

};

</script>

</head>
<body>
<div id=text><p>Updating Database...</p></div>
</body>
</html>


