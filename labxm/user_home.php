<?php
session_start();
if (!isset($_SESSION["id"]) || $_SESSION["user_type"] != "User") {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Home</title>
</head>
<body>
    <h1>Welcome <?php echo $_SESSION["name"]; ?>!</h1>
    <ul>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="change_password.php">Change Password</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>