<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>PHP MySQL</title>
</head>
<body>
	<h3>PHP - MySQL</h3>
	<p>In several examples, we use the PHP built-in MySQLi.</p>

	<h3>Connection to MySQL</h3>
	<p>The example in the following is the query to connect to MySQL, if the connection success, it will return the success message, else it return failed message :</p>

	<p><?php 
		function colored_text($color, $string){
			return "<span style='color: ".$color."'>".$string."</span>";
		}

		$serverName = "localhost";
		$userName = "root";
		$password = "PASSWORD";

		$connection = new mysqli($serverName, $userName, $password);

		if ($connection->connect_error){
			die("Connection failed : ".$connection->connect_error);
		} else {
			echo colored_text("red","Connected Success!");
		}
	?></p>

	<p>To close the connection, simply : <code>$connection->close();</code></p>
		
	<?php 
		$connection->close();
	 ?>
</body>
</html>