<!DOCTYPE html>
<html>
<head>
  <title>PHP Form Action Demo</title>
</head>
<body>
  <h2>Result from the simple form :</h2>
  <p>Hello! <?php echo htmlspecialchars($_POST['name']); ?>.</p>
  <p>You are <?php echo (int)$_POST['age']; ?> years old!</p>
  <!-- 
    The function htmlspecialchar() prevents people from inject HTML tags or JavaScript
    by making sure that any special characters that are special in HTML are properly
    encoded.
  -->
</body>
</html>
