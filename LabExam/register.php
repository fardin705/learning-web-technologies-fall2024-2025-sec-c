<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $name = $_POST["name"];
    $user_type = $_POST["user_type"];

    if ($password != $confirm_password) {
        echo "Passwords do not match!";
    } else {
        $user_data = "$id,$password,$name,$user_type\n";
        file_put_contents("users.txt", $user_data, FILE_APPEND);
        echo "Registration successful! <a href='login.php'>Login here</a>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <h1>Registration</h1>
    <form method="post">
        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id" required><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>
        <label for="confirm_password">Confirm Password:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required><br>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="user_type">User Type:</label><br>
        <input type="radio" id="user" name="user_type" value="User" required>User
        <input type="radio" id="admin" name="user_type" value="Admin" required>Admin<br><br>
        <button type="submit">Sign Up</button>
    </form>
    <a href="login.php">Sign In</a>
</body>
</html>