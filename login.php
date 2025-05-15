<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="description" content="Rohirrim Booking Form" >
    <meta name="keywords"    content="MiddleEarth, Tours, Rohan" >
    <meta name="author"      content="Grima Wormtongue" />
</head>

<body>
    <form action="login.php" method="post">
  Name: <input type="text" name="username"><br>
  Password: <input type="password" name="password"><br>
  <input type="submit" value="Submit">
</form>

<?php
session_start();
require_once("settings.php");

$conn = mysqli_connect($host, $username, $password, $database);

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Get user input
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Simple query to check credentials
    $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
      $_SESSION['username'] = $user['username'];
      header("Location: profile.php");
      exit();
    } else {
      echo "❌ Incorrect username or password.";
    }
}
?>

</body>
</html>

 