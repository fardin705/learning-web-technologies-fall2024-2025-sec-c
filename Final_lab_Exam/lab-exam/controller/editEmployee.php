<?php
require_once('../model/employeeModel.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = trim($_POST['name']);
    $company = trim($_POST['company']);
    $contact = trim($_POST['contact']);
    $username = trim($_POST['username']);
    
    if (empty($name) || empty($company) || empty($contact) || empty($username)) {
        header('Location: ../view/editEmployee.php?id=' . $id . '&err=Please fill in all fields.');
        exit();
    }

    $updated = updateEmployee($id, $name, $company, $contact, $username);

    if ($updated) {
        header('Location: ../view/dashboard.php?msg=Employee updated successfully.');
    } else {
        header('Location: ../view/editEmployee.php?id=' . $id . '&msg=Error updating employee.');
    }
    exit();
} else {
    header('Location: ../view/employeeList.php');
    exit();
}
