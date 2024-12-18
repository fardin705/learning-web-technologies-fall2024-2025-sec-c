<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $password = $_POST["password"];
    $users = file("users.txt");

    foreach ($users as $user) {
        list($stored_id, $stored_password, $name, $user_type) = explode(",", trim($user));

        if ($stored_id == $id && $stored_password == $password) {
            $_SESSION["id"] = $stored_id;
            $_SESSION["name"] = $name;
            $_SESSION["user_type"] = $user_type;

            if ($user_type == "Admin") {
                header("Location: admin_home.php");
            } else {
                header("Location: user_home.php");
            }
            exit;
        }
    }
    echo "Invalid ID or password!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="post">
        <label for="id">User ID:</label><br>
        <input type="text" id="id" name="id" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
    <a href="register.php">Register</a>
</body>
</html>