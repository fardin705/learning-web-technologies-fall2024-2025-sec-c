<?php
require_once('../model/employeeModel.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    if ($_SERVER['PHP_SELF'] === '/controller/deleteEmployee.php') {
        if (deleteEmployee($id)) {
            header('Location: ../view/employeeDetails.php?msg=Employee deleted successfully');
        } else {
            header('Location: ../view/employeeDetails.php?err=Failed to delete employee');
        }
    }
}
?>
