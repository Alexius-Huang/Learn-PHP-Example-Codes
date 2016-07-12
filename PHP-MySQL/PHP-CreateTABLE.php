<?php require '../helpers/main.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Create Table Example</title>
</head>
<body>
	<h3>Create Table</h3>
	<p>By using the statement : <code>CREATE TABLE <i>table</i> ( <i>data</i> )</code></p>

	<p>Create a table "Guest" with five columns : "id", "firstName", "lastName", "email", "reg_date" :</p>

	<code><pre>
		<strong>CREATE TABLE</strong> Guest (
			id <strong>INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY</strong>,
			firstName <strong>VARCHAR(30) NOT NULL</strong>,
			lastName <strong>VARCHAR(30) NOT NULL</strong>,
			email <strong>VARCHAR(50)</strong>,
			reg_date <strong>TIMESTAMP</strong>
		)
	</pre></code>

	<p>For the information of the data types of MySQL, check out this <a href="http://www.w3schools.com/sql/sql_datatypes.asp">link.</a></p>

	<p>In order to access the database we created previously (myDB), specifiy the varaible <code>$serverName, $userName, $password</code> and one more, that is the <code>$DB</code>, which holds the value <code>"myDB"</code> and then pass these four parameters to create new object <code>mysqli()</code></p>

	<p>Check connection and access to <code>myDB : <?php require "PHP-Connect-myDB.php"; ?></code></p>

	<p>Now we can create table.</p>

	<?php 
		$sql_query = "
			CREATE TABLE Guest(
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				firstName VARCHAR(30) NOT NULL,
				lastName VARCHAR(30) NOT NULL,
				email VARCHAR(50),
				reg_date TIMESTAMP
		)";

		if ($connection->query($sql_query) === TRUE) {
			echo colored_text("blue", "Table Guest created successfully!");
		} else {
			echo colored_text("red", "Error creating table : ".$connection->error);
		}
	?>

	<p>Finally, close the database.</p>
	
</body>
</html>