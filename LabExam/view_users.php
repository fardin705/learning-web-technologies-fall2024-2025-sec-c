<?php
session_start();
if (!isset($_SESSION["id"]) || $_SESSION["user_type"] != "Admin") {
    header("Location: login.php");
    exit;
}
$users = file("users.txt");
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Users</title>
</head>
<body>
    <h1>All Users</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>User Type</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <?php list($id, $password, $name, $user_type) = explode(",", trim($user)); ?>
            <tr>
                <td><?php echo $id; ?></td>
                <td><?php echo $name; ?></td>
                <td><?php echo $user_type; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="admin_home.php">Go Home</a>
</body>
</html>