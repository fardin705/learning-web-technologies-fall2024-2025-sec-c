<!DOCTYPE html>
<html>

<head>
    <title>Sign-In</title>
</head>

<body>

    <div align="center">
        <form action="../controller/signinController.php" method="POST" <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" name="signin" value="Sign In">
        </form>
    </div>
</body>

</html>