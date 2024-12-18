<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
    <h1>Your Profile</h1>
    <p>ID: <?php echo $_SESSION["id"]; ?></p>
    <p>Name: <?php echo $_SESSION["name"]; ?></p>
    <p>User Type: <?php echo $_SESSION["user_type"]; ?></p>
    <a href="<?php echo ($_SESSION["user_type"] == 'Admin') ? 'admin_home.php' : 'user_home.php'; ?>">Go Home</a>
</body>
</html>