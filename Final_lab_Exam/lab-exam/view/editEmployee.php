<?php
require_once('../model/employeeModel.php');
$id = $_GET['id'];
$employee = getEmployeeById($id);
?>

<form action="../controller/editEmployee.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $employee['id']; ?>" />
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo $employee['name']; ?>" />
    <label for="company">Company:</label>
    <input type="text" name="company" value="<?php echo $employee['company']; ?>" />
    <label for="contact">Contact:</label>
    <input type="text" name="contact" value="<?php echo $employee['contact']; ?>" />
    <label for="username">Username:</label>
    <input type="text" name="username" value="<?php echo $employee['username']; ?>" />
    <button type="submit">Update Employee</button>
</form>
