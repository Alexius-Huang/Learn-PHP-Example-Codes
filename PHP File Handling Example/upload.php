<!DOCTYPE html>
<html lang="en">
<head>
	<title>PHP Upload Image Demo</title>
</head>
<body>
	<?php
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

		// Check if file already exists
		if (file_exists($target_file)) {
		  echo "Sorry, file already exists.";
		  $uploadOk = 0;
		}

		// Limit file size
		if ($_FILES["fileUpload"]["size"] > 500000) {
			echo "Sorry, your file is too large!";
			$uploadOk = 0;
		}

		// Limit file type
		if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
			echo "Sorry, only JPG, PNG, JPEG & GIF files are allowed.";
			$uploadOk = 0;
		}

		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded!";
		} else {
			if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file)) {
				echo "The file ".basename($_FILES["fileUpload"]["name"])." has been uploaded!";
			} else {
				echo "Sorry, there was an error uploading your file!";
			}
		}
	?>
</body>
</html>