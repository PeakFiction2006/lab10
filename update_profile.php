<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Email</title>
    <meta charset="utf-8">
    <meta name="description" content="Rohirrim Booking Form">
    <meta name="keywords" content="MiddleEarth, Tours, Rohan">
    <meta name="author" content="Grima Wormtongue">
</head>

<body>
    <form action="update_profile.php" method="post">
        Email: <input type="text" name="newemail"><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    session_start();
    require_once("settings.php");

    // Check if user is logged in
    if (!isset($_SESSION['username'])) {
        echo "You must be logged in to update your email.";
        exit();
    }

    // Get the logged-in username
    $username = $_SESSION['username'];

    // Check if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize the input to prevent SQL injection
        $newemail = mysqli_real_escape_string($conn, trim($_POST['newemail']));

        // Update email for the logged-in user
        $sql = "UPDATE user SET email='$newemail' WHERE username='$username'";

        if (mysqli_query($conn, $sql)) {
            echo "Email updated successfully.";
        } else {
            echo "Error updating email: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
    ?>
</body>
</html>
