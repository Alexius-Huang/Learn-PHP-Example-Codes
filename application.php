<!DOCTYPE html>
<html>
<head>
  <title>Application of PHP</title>
</head>
<body>
  <h3>Printing a variable</h3>
  <p>For example :</p>
  <?php
    echo $_SERVER['HTTP_USER_AGENT']."\n";
  ?>

  <h3>Conditional Statement</h3>
  <p>For example :</p>
  <?php
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== False ) {
      echo 'You are using Internet Explorer.<br />';
    } else {
      echo 'You are using other than Internet Explorer.<br />';
    }
    echo 'HINT: The strpos() is a built-in function which searches a string for another string.'."\n";
  ?>

  <h3>Conditional Statement - Mixing both HTML &amp PHP modes</h3>
  <?php
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== False) {
  ?>
    <h5>strpos() must have returned non-false (True)</h5>
    <p>You are using Internet Explorer</p>
  <?php
    } else {
  ?>
    <h5>strpos() must have returned false (False)</h5>
    <p>You are not using Internet Explorer</p>
  <?php
    }
  ?>
</body>
</html>
