<?php
session_start();
if (!isset($_SESSION["id"])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_password = $_POST["current_password"];
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    if ($new_password != $confirm_password) {
        echo "Passwords do not match!";
    } else {
        $users = file("users.txt");
        $updated_users = "";

        foreach ($users as $user) {
            list($id, $password, $name, $user_type) = explode(",", trim($user));

            if ($id == $_SESSION["id"] && $password == $current_password) {
                $password = $new_password;
            }
            $updated_users .= "$id,$password,$name,$user_type\n";
        }
        file_put_contents("users.txt", $updated_users);
        echo "Password changed successfully!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
</head>
<body>
    <h1>Change Password</h1>
    <form method="post">
        <label for="current_password">Current Password:</label><br>
        <input type="password" id="current_password" name="current_password" required><br>
        <label for="new_password">New Password:</label><br>
        <input type="password" id="new_password" name="new_password" required><br>
        <label for="confirm_password">Confirm Password:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required><br><br>
        <button type="submit">Change</button>
    </form>
    <a href="<?php echo ($_SESSION["user_type"] == 'Admin') ? 'admin_home.php' : 'user_home.php'; ?>">Home</a>
</body>
</html>