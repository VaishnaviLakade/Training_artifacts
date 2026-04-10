<?php
$students = [
    ["id" => 1, "name" => "Vaishnavi", "course" => "IT", "city" => "Pune"],
    ["id" => 2, "name" => "Aditi", "course" => "CSE", "city" => "Mumbai"],
    ["id" => 3, "name" => "Riya", "course" => "ENTC", "city" => "Nashik"]
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Info App</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Student Information System</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Course</th>
                <th>City</th>
            </tr>

            <?php foreach ($students as $s) { ?>
                <tr>
                    <td><?php echo $s["id"]; ?></td>
                    <td><?php echo $s["name"]; ?></td>
                    <td><?php echo $s["course"]; ?></td>
                    <td><?php echo $s["city"]; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>