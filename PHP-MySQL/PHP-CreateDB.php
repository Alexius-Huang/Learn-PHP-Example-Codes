<?php require "../helpers/main.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Database Manipulation</title>
</head>
<body>
	<h3>Connect to MySQL</h3>
	<p>Check connection : <?php require "PHP-Connect-MySQL.php"; ?></p>

	<h3>Create Database</h3>
	<p>Perform the SQL statement : <code>CREATE DATABASE <i>db</i></code></p>

	<?php 
		$sql_query = "CREATE DATABASE myDB";
		if ($connection->query($sql_query) === TRUE) {
			echo colored_text("blue", "Database created successfully!");
		} else {
			echo colored_text("red", "Error creating database : ".$connection->error);
		}
	?>

	<p>Then close the connection to the database : <code>$connection->close();</code></p>

	<?php 
		$connection->close();
	?>

</body>
</html>