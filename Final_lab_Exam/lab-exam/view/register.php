<?php
$msg = '';
if (isset($_GET['err'])) {
    $msg = htmlspecialchars($_GET['err'], ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register Employee</title>
</head>

<body>
    <div align="center">
        <h2 align="center">Register Employee</h2>
    </div>
    <form action="../controller/registerController.php" method="POST">

        <?php if (strlen($msg) > 0) { ?>
            <p align="center">
                <font color="red"> <?= $msg ?></font>
            </p>
        <?php } ?>
        <div align="center">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="company">Company:</label>
            <input type="text" id="company" name="company" required><br><br>

            <label for="contact">contact:</label>
            <input type="text" id="contact" name="contact" required><br><br>

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required><br><br>

            <input type="submit" name="signup" value="Sign Up">
        </div>
    </form>
</body>

</html>