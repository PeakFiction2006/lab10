<?php
session_start();
require_once('settings.php');

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$conn = mysqli_connect($host, $username, $password, $database);

$username = $_SESSION['username'];
$query = "SELECT username, email FROM users WHERE username = '$username'";
$result = mysqli_quer y($conn, $query);
$user = mysqli_fetch_assoc($result);

echo "Username: " . htmlspecialchars($user['username']) . "<br>";
echo "Email: " . htmlspecialchars($user['email']);
?>

<form action="update_profile.php" method="POST">
    <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
    <button type="submit">Update Email</button>
</form>

<?php mysqli_close($conn); ?>

