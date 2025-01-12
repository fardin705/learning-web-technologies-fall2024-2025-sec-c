<!DOCTYPE html>
<html>

<head>
    <title>Employee Details</title>
</head>

<body>

    <h2 style="text-align: center;">Employee Details</h2>

    <div align="center"> <input type="text" id="searchBar" placeholder="Search by name or contact"
            onkeyup="filterTable()">
    </div>
    <br>
    <div align="center"><a href="register.php">Add new employee</a></div>
    <br>
    <br>
    <table id="employeeTable" style="border: 1px solid black; margin: 0 auto; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="border: 1px solid black;">ID</th>
                <th style="border: 1px solid black;">Name</th>
                <th style="border: 1px solid black;">Company</th>
                <th style="border: 1px solid black;">Contact</th>
                <th style="border: 1px solid black;">Username</th>
                <th style="border: 1px solid black;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require_once('../model/employeeModel.php');
            $employees = getAllEmployees();

            if (!empty($employees)) {
                foreach ($employees as $employee) {
                    echo "<tr>
                    <td style='border: 1px solid black;'>{$employee['id']}</td>
                    <td style='border: 1px solid black;'>{$employee['name']}</td>
                    <td style='border: 1px solid black;'>{$employee['company']}</td>
                    <td style='border: 1px solid black;'>{$employee['contact']}</td>
                    <td style='border: 1px solid black;'>{$employee['username']}</td>
                    <td class='action-buttons' style='border: 1px solid black;'>
                        <a href='../controller/editEmployee.php?id={$employee['id']}'>Edit</a>
                        <a href='../controller/deleteEmployee.php?id={$employee['id']}' onclick='return confirm(\"Are you sure you want to delete this employee?\")'>Delete</a>
                    </td>
                </tr>";
                }
            } else {
                echo "<tr><td colspan='6' style='border: 1px solid black;'>No employees found.</td></tr>";
            }
            ?>
        </tbody>
    </table>


    <script>
        function filterTable() {
            const searchInput = document.getElementById('searchBar').value.toLowerCase();
            const table = document.getElementById('employeeTable');
            const rows = table.getElementsByTagName('tr');

            for (let i = 1; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                let matches = false;

                for (let j = 0; j < cells.length - 1; j++) {
                    if (cells[j].innerText.toLowerCase().includes(searchInput)) {
                        matches = true;
                        break;
                    }
                }

                rows[i].style.display = matches ? '' : 'none';
            }
        }
    </script>

</body>

</html>