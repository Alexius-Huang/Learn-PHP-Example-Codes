<!DOCTYPE html>
<html>
<head>
	<title>PHP Cookie Example</title>
</head>
<body>
	<h3>What is a <strong>Cookie</strong>?</h3>
	<p>Cookie usually can identify a user. A cookie us a small file that the server embeds on the user's computer. Each time the same computer requests a page with a browser, it will send the cookie, too.</p>

	<h3>Create Cookie - setcookie()</h3>
	<p>With the function setcookie(), you can create PHP cookie, only the first parameter <i>name</i> is required, others are optional :</p>
	<p><code>setcookie(<i>name, value, expire, path, domain, secure, httponly</i>)</code></p>

	<h3>PHP Create / Retrieve Cookie</h3>
	<p>We now create a cookie named "user" with the value "Maxwell Alexius". It will expire about 1 minute (60) (or you can set like 30 days - 86400 sec/day * 30 days ). We will let the cookie available in the entire website by specifing the <i>path</i> "/".</p>

	<?php
		$cookie_name = "user"; 
		$cookie_value = "Maxwell Alexius";
		setcookie($cookie_name, $cookie_value, time() + 60, "/");
	?>

	<p>To retrieve the value of the cookie "user", we can use the global variable <code>$_COOKIE</code>. We can also use the function <code>isset()</code> to test whether the cookie is set :</p>

	<?php 
		if (!isset($_COOKIE[$cookie_name])) {
			echo "Cookie named '".$cookie_name."' is not set!<br>";
		} else {
			echo "Cookie named '".$cookie_name."' is set!<br>";
			echo "Cookie value : ".$_COOKIE[$cookie_name];
		}
	?>
</body>
</html>