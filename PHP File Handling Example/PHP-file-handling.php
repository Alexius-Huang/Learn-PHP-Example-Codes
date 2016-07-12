<!DOCTYPE html>
<html>
<head>
	<title>Document</title>
</head>
<body>
	<h2>PHP File Handling</h2>
	<p>File manipulation in PHP can create, red, upload and edit files.</p>

	<h3>PHP Read File - readfile()</h3>
	<p>In the sample file, we have a file named 'text.txt', use the function readfile() (Remember the file is placed in the same directory):</p>
	<p><?php  echo readfile("text.txt") ?></p>
	<p>The readfile() function returns the text in the file and the nunber of bytes read on success.</p>

	<h3>PHP Open / Read / Close File - fopen() / fread() / fclose()</h3>
	<p>The fopen() function opens a file and gives more options to handle the file, here is the list of the options :</p>

	<ul>
		<li>"r" - <strong>READ ONLY</strong>, pointer start at the beginning</li>
		<li>"w" - <strong>WRITE ONLY</strong>, <strong>ERASES THE CONTENT</strong> of the file or <strong>CREATE A NEW FILE</strong> if it doesn't exist. File pointer starts at the beginning</li>
		<li>"a" - <strong>WRITE ONLY</strong> and <i>file pointer start at the end of the file</i> or <strong>CREATE A NEW FILE</strong> if it doesn't exist. </li>
		<li>"x" - <strong>CREATE A NEW FILE FOR WRITE ONLY</strong>, returns False and an error if file already exists.</li>
		<li>"r+" / "w+" / "a+" / "x+" - With additional "plus" sign, it will be both <strong>READ / WRITE</strong></li>
	</ul>

	<p>Example opening the file, read the file and then close the file :</p>
	<p>
		<?php
			$file = fopen("text.txt", "r") or die("Unable to open the file!"); 
			// READ ONLY MODE, however, if the file didn't exist, it will return the error message.
			echo fread($file, filesize("text.txt"));
			fclose($file);
		?>
	</p>
	<p>The filesize() function returns the size of the file.</p>
	<p>The fread() function takes two parameters, first parameter is the file which is opened with the fopen() function, second parameter is the maximum number of bytes to read the file.</p>
	<p>Whenever opening the file, make sure to use the fclose() function to close the file.</p>

	<h3>Reading Single Line - fgets()</h3>
	<p>The fgets() function gets single line of the file :</p>
	<p>
		<?php
			$file = fopen("text.txt", "r") or die("Unable to open the file!");
			for( $line = 1; $line <= 10; $line++ ) {
				echo "Line $line: ".fgets($file)."<br>";
			}
			fclose($file);
		?>
	</p>
	<p>Hint : After a call of the function fgets(), the file pointer automatically moves to the next line.</p>

	<h3>Check End-of-File - feof()</h3>
	<p>The function feof() checks if the "end of file" has been reached. It is useful for looping through unknown file data with unknown length.</p>
	<p>
		<?php
			$file = fopen("text.txt", "r") or die("Unable to open a file!");
			$line = 1;
			while(!feof($file)){
				echo "Line $line: ".fgets($file)."<br>";
				$line++;
			}
			fclose($file);
		?>
	</p>

	<h3>Read Single Character - fgetc()</h3>
	<p>The function fgetc() is basically the character version of the fgets() function, namely, it read single character from a file.</p>
	<p>
		<?php
			$file = fopen("text.txt", "r");
			while(!feof($file)) {
				echo fgetc($file);
			}
			fclose($file);
		?>
	</p>
	<p>Hint : After a call of the function fgetc(), the file pointer automatically moves to the next character.</p>

	<h3>Creating Files by Using fopen()</h3>
	<p>If you use the fopen() function on the file which doen't exist, it will automatically create it, given that the file mode is specified <strong>writing "w"</strong> or <strong>appending "a"</strong></p>
	<p>Example creates the file called "test.txt" :</p>
	<p>
		<?php
			// $file = fopen("test.txt", "w") or die("Unable to open the file!");
		?>
		php statement : $file = fopen("test.txt", "w") or die("Unable to open the file!");
	</p>
	
	<h3>Writing Files - fwrite()</h3>
	<p>The fwrite() accept two parameters, the first parameter specifies the file to write, the second one is the string to be written.</p>
	<p>
		<?php
			// $txt = "PHP is fun!\n";
			// fwrite($file, $txt);
			// $txt = "PHP is amazing!\n";
			// fwrite($file, $txt);
			// $txt = "PHP is awesome!\n";
			// fwrite($file, $txt);
			// fclose($file);
			// echo readfile("test.txt");
		?>
	</p>
	<p>Hint : If you come up with the permission denied failure, check you PHP file that have permission to write information into the hard drive.</p>

	<h3>PHP File Uploading</h3>
	<p>Before processing to the file uploading section, we need to configure the file called '<i>php.ini</i>'. To find the file location, please use the function <strong>phpinfo()</strong> to call out the information and you will find the location of 'php.ini' file.</p>

	<?php echo phpinfo(); ?>

	<p>In your 'php.ini' file, search the file_uploads directive and set it on :</p>
	<p><strong>file_uploads = On</strong></p>

	<p>Create an HTML form allow user to choose the image file they want to upload :</p>

	<form action="upload.php" method="post" enctype="multipart/form-data">
		Select image to upload :
		<input type="file" name="fileUpload" id="fileUpload" />
		<input type="submit" value="Upload Image" name="submit" />
	</form>

	<p>Because it may manipulate the data in the back-end, we use the POST method. The form also needs the folllowing attribute: enctype="multipart/form-data". It specifies which content-type to use when submittinh the form.</p>

	<p>Next, we create the PHP script in the "upload.php" file, the PHP script in the upload.php :</p>
	
	<code><pre>
		$target_dir = "uploads/";
		$target_file = $target_dir.basename($_FILES["fileUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if (isset($_POST["submit"])){
			$check = getimagesize($_FILES["fileUpload"]["tmp_name"]);
			if ($check !== false) {
				echo "File is an image - ".$check["mime"].".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}	
		}
	</pre></code>
	
	<p>The variable <code>$target_dir</code> specifies the directory where the file is going to be placed, which means you might want to create a directory called "uploads" where "upload.php" resides.</p>
	<p>The variable <code>$target_file</code> specifies the path of the file to be uploaded.</p>
	<p>The variable <code>$imageFileType</code> holds the file extension.</p>

	<p>Then we add some restrictions, first, check whether the file exists :</p>

	<code><pre>
		if (file_exists($target_file)) {
			echo "Sorry, the file already exists!";
			$uploadOk = 0;
		}
	</pre></code>

	<p>Next, we can limit the file size :</p>

	<code><pre>
		if ($FILES["fileUpload"]["size"] > 500000) {
			echo "Sorry, your file is too large!";
			$uploadOk = 0;
		}
	</pre></code>

	<p>Lastly, we can limit the file type :</p>

	<code><pre>
		if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			echo "Sorry, only JPG, PNG, JPEG & GIF files are allowed.";
			$uploadOk = 0;
		}
	</pre></code>

	<p>And then we proceed to uploading file, if the variable <code>$uploadOk</code> is set to 1, then try to upload file, else then the file is not uploaded.</p>

	<code><pre>
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded!";
		} else {
			if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
				echo "The file ".basename($_FILES["fileUpload"]["name"])." has been uploaded!";
			} else {
				echo "Sorry, there was an error uploading your file!";
			}
		}
	</pre></code>
</body>
</html>
