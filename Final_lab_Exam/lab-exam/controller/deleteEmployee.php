<?php
require_once('../model/employeeModel.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the employee
    $deleted = deleteEmployee($id);

    if ($deleted) {
        header('Location: ../view/dashboard.php?msg=Employee deleted successfully.');
    } else {
        header('Location: ../view/dashboard.php?msg=Error deleting employee.');
    }
    exit();
} else {
    header('Location: ../view/employeeList.php');
    exit();
}
