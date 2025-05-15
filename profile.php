<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
    <meta charset="utf-8">
    <meta name="description" content="Rohirrim Booking Form" >
    <meta name="keywords"    content="MiddleEarth, Tours, Rohan" >
    <meta name="author"      content="Grima Wormtongue" />
</head>

<body>

<?php
// Checks user logged in by seeing if username key exists in array
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.html");
  exit();
}

require_once("settings.php");
$conn = mysqli_connect($host, $username, $password, $database);

// Retrieve the logged-in username from the session
$loggedInUser = $_SESSION['username'];

// Construct query to retrieve user details from the database
$query = "SELECT username, email FROM user WHERE username = '$loggedInUser'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Fetch the result as an associative array
    $userData = mysqli_fetch_assoc($result);
    $username = $userData['username'];
    $email = $userData['email'];

    // Display the retrieved values
    echo "Username: " . $username . "<br>";
    echo "Email: " . $email . "<br>";
} else {
    echo "User not found.";
}

mysqli_close($conn);
?>

</body>
</html>
