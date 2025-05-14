<?php
session_start();
require_once('settings.php');

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$conn = mysqli_connect($host, $username, $password, $database);

$username = $_SESSION['username'];
$new_email = trim($_POST['email']);

$query = "UPDATE users SET email = '$new_email' WHERE username = '$username'";
mysqli_query($conn, $query);

mysqli_close($conn);

header('Location: profile.php');
exit();
