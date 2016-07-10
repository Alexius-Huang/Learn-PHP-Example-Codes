<!DOCTYPE html>
<html>
<head>
	<title>PHP Date &amp Time Demo</title>
</head>
<body>
	<h2>PHP Date &amp Time Demo</h2>
	
	<h3><strong>Set the Right Timezone</strong></h3>
	<p>Before using PHP date or time function, make sure to set the right timezone by using the function date_default_timezone_set()</p>
	<?php date_default_timezone_set("Asia/Taipei"); ?>

	<p>The date() function is used to dormat a date / time</p>
	
	<h3>To get a simple date :</h3>
	<ul>
		<li>d - Represent day of the month (01 ~ 31)</li>
		<li>m - Represent month (01 ~ 12)</li>
		<li>Y - Represent year (yyyy)</li>
		<li>l - Represent day of the week</li>
	</ul>
	<p>Several ways of formatting :</p>
	<p>
		<?php 
			echo "Today is ".date("Y/m/d")."<br>";
			echo "Today is ".date("Y.m.d")."<br>";
			echo "Today is ".date("Y-m-d")."<br>";
			echo "Today is ".date("l")."<br>";
			echo "&copy; 2014-".date("Y")."<br>";
		?>
	</p>

	<h3>To get a simple time :</h3>
	<ul>
		<li>h - 12-hour format of with leading zero (01 ~ 12)</li>
		<li>i - Minutes with leading zero (00 ~ 59)</li>
		<li>s - second with leading zero (00 ~ 59)</li>
		<li>a - Ante meridiem and post meridiem (am, pm)</li>
	</ul>
	<p>For example : <?php echo "The time is ".date("h:i:sa"); ?></p>

	<h3>Create a Date - mktime()</h3>
	<p>The mktime() function returns Unix timestamp for a date.</p>
	<p>Syntax : mktime(<i>hour, minute, second, month, day, year</i>)</p>
	<p>
		<?php
			$timestamp = mktime(5, 30, 20, 6, 14, 1996);
			echo "Created date is ".date("Y-m-d h:i:sa", $timestamp)
		?>
	</p>
	<p>As the example showed, you can pass two parameter into the date() function, the second one is the timestamp and is optional. If didn;t specified the timestamp, it will use the current date or time.</p>

	<h3>Create Date from String - strtotime() </h3>
	<p>The function strtotime() is used to convert string to a time :</p>
	<p>
		<?php
			$string_1 = strtotime("5:14pm June 14 1996");
			echo "Created date is ".date("Y-m-d h:i:sa", $string_1)."<br>";

			$string_2 = strtotime("tomorrow");
			echo 'Pass in the string "tomorrow" created the date '.date("Y-m-d h:i:sa", $string_2)."<br>";

			$string_3 = strtotime("next Tuesday");
			echo 'Pass in the string "next Tuesday" created the date '.date("Y-m-d h:i:sa", $string_3)."<br>";

			$string_4 = strtotime("+5 months");
			echo 'Pass in the string "+5 Months" created the date '.date("Y-m-d h:i:sa", $string_4)."<br>";
		?>
	</p>

	<h3>Other Application</h3>
	<p>The example outputs the date for the next 10 Monday :</p>
	<p>
		<?php
			$start = strtotime("Monday");
			$end = strtotime("+10 weeks", $start);
			$week_count = 1;

			while($start < $end) {
				echo "Week ".$week_count." : ".date("Y-m-d h:i:sa", $start)."<br>";
				$week_count++;
				$start = strtotime("+1 week", $start);
			}
		?>
	</p>

</body>
</html>
