<?php
require_once('db.php');

function addEmployee($name, $company, $contact, $username, $password)
{
    $con = dbConnection();
    $sql = "INSERT INTO employee (name, company, contact, username, password) 
            VALUES ('{$name}', '{$company}', '{$contact}', '{$username}', '{$password}')";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

function isExistUser($username)
{
    $con = dbConnection();
    $sql = "SELECT * FROM employee WHERE username='{$username}'";
    $result = mysqli_query($con, $sql);

    return mysqli_num_rows($result) > 0;
}

function loginUser($username, $password)
{
    $con = dbConnection();

    $query = "SELECT * FROM employee WHERE username = ? LIMIT 1";
    $stmt = $con->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if ($user['password'] === $password) {
            return $user;
        }
    }

    return false;
}

function getAllEmployees()
{
    $conn = dbConnection();

    $query = "SELECT * FROM employee";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $employees = [];
        while ($row = $result->fetch_assoc()) {
            $employees[] = $row;
        }
        return $employees;
    }
    return [];
}

function deleteEmployee($id)
{
    $conn = dbConnection();

    $query = "DELETE FROM employee WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}
?>