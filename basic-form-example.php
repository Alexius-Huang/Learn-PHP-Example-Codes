<!DOCTYPE html>
<html>
<head>
  <title>PHP Form Validation Example</title>
  <style>
    .error { color: red; }
  </style>
</head>
<body>
  <h2>PHP Form Validation Example</h2>

  <?php
    // Define variables and set to empty values
    $name = $email = $gender = $comment = $website = "";
    $nameErr = $emailErr = $genderErr = $websiteErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
      if(empty($_POST["name"])) {
        $nameErr = "Name is required!";
      } else {
        $name = test_input($_POST["name"]);
        // Validate name
        if(!preg_match("/^[a-zA-Z ]*$/", $name)) {
        	$nameErr = "Only letters and white space allowed!";
        }
        // The preg_match() methods searches string for pattern,
        // return True if pattern matched
      }
      
      if(empty($_POST["email"])) {
        $emailErr = "Email is required!";
      } else {
      	$email = test_input($_POST["email"]);
      	// Validate email
      	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      		$emailErr = "Invalid email format!";
      	}
      }

      if(empty($_POST["website"])) {
        $website = "";
      } else {
        $website = test_input($_POST["website"]);
      	// Validate URL
      	if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      		$websiteErr = "Invalid URL format!";
      	}
      }

      if(empty($_POST["comment"])) {
        $comment = "";
      } else {
	      $comment = test_input($_POST["comment"]);
      }

      if(empty($_POST["gender"])) {
	      $genderErr = "Gender is required!";
      } else {
        $gender = test_input($_POST["gender"]);
      }
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
  ?>

  <p class="error">* required field</p>
  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    Name : <input type="text" name="name" value="<?php echo $name; ?>" required /><span class="error">* <?php echo $nameErr ?></span><br><br>
    Email : <input type="email" name="email" value="<?php echo $email; ?>" required /><span class="error">* <?php echo $emailErr ?></span><br><br>
    Website : <input type="url" name="website" value="<?php echo $website; ?>" /><span class="error"><?php echo $websiteErr ?></span><br><br>
    Comment : <textarea name="comment" rows="5" cols="40"><?php echo $comment; ?></textarea><br><br>
    Gender : <input type="radio" name="gender" value="female" <?php if(isset($gender) && $gender == "female" ){ echo "checked"; } ?> required />Female
    				 <input type="radio" name="gender" value="male" <?php if(isset($gender) && $gender == "male"){ echo "checked"; } ?> />Male
    				 <span class="error">* <?php echo $genderErr ?></span>
    <input type="submit" value="Submit">
  </form>

  <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
    <h3>Your Input Result</h3>
    <p>Name : <?php echo $name; ?></p>
    <p>Email : <?php echo $email; ?></p>
    <?php if (!empty($_POST["website"])) { ?>
      <p>Website : <?php echo $website; ?></p>
    <?php } ?>
    <?php if (!empty($_POST["comment"])) { ?>
      <p>Comment : <?php echo $comment; ?></p>
    <?php } ?>
    <p>Gender : <?php echo $gender; ?></p>
  <?php } ?>
</body>
</html>
