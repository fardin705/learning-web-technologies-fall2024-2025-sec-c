<?php
if (!isset($_POST['register'])) {
    header('Location: ../view/register.php');
    exit();
}

require_once('../model/employeeModel.php');

$name = trim($_POST['name']);
$company = trim($_POST['company']);
$contact = trim($_POST['contact']);
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$confirmPassword = trim($_POST['confirmPassword']);


if (empty($name) || empty($company) || empty($contact) || empty($username) || empty($password)) {
    header('Location: ../view/register.php?err=Please fill in all required fields.');
    exit();
}

if ($password !== $confirmPassword) {
    header('Location: ../view/register.php?err=Passwords do not match.');
    exit();
}

if (strlen($password) < 8) {
    header('Location: ../view/register.php?err=Password must be at least 8 characters long.');
    exit();
}

if (isExistUser($username)) {
    header('Location: ../view/register.php?err=Username already exists. Please choose another.');
    exit();
}


$status = addEmployee($name, $company, $contact, $username, $password);

if ($status) {
    header('Location: ../view/dashbaord.php');
} else {
    header('Location: ../view/register.php?err=unknownError');
}
?>
