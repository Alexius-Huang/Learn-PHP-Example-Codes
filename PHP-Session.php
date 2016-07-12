<!DOCTYPE html>
<html>
<head>
	<title>PHP Session Example</title>
</head>
<body>
	<h3>PHP Session</h3>
	<p>When you work with an application, you open it, do some changes, and then you close it. This is much like a Session. The computer knows who you are. It knows when you start the application and when you end. But on the internet there is one problem: the web server does not know who you are or what you do, because the HTTP address doesn't maintain state.</p>
	
	<p>Session variables solve this problem by storing user information to be used across multiple pages (e.g. username, favorite color, etc). By default, session variables last until the user closes the browser.</p>

	<p>So; Session variables hold information about one single user, and are available to all pages in one application.</p>

	<h3>Start PHP Session - session_start()</h3>
	<p>Session start with the function <code>session_start()</code>, and session variables are set with the PHP global variable : <code>$_SESSION</code></p>
	<p>This page we will start the session and create session variables :</p>

	<?php 
		// Start PHP session
		session_start();

		// Set session variables
		$_SESSION["favcolor"] = "green";
		$_SESSION["favanimal"] = "cat";
		echo "Session variables are set.";
	?>

</body>
</html>