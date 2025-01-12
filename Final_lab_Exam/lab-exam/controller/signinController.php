<?php
require_once('../model/employeeModel.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        header('Location: ../view/signin.php?err=Please fill in all required fields.');
        exit();
    }

    $user = loginUser($username, $password);

    if ($user) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: ../view/dashboard.php');
        exit();
    } else {
        header('Location: ../view/signin.php?err=Invalid username or password.');
        exit();
    }
} else {
    header('Location: ../view/signin.php');
    exit();
}
