<?php
// ------------------------------
// Student Marks Analyzer
// Arrays + Functions in PHP
// ------------------------------

// Student data
$students = [
    [
        "name" => "Amit",
        "marks" => [78, 85, 90]
    ],
    [
        "name" => "Neha",
        "marks" => [88, 92, 84]
    ],
    [
        "name" => "Vaishnavi",
        "marks" => [95, 89, 93]
    ],
    [
        "name" => "Rohan",
        "marks" => [72, 80, 76]
    ]
];

// Function to calculate total
function getTotal($marks) {
    $sum = 0;
    foreach ($marks as $mark) {
        $sum += $mark;
    }
    return $sum;
}

// Function to calculate average
function getAverage($marks) {
    return getTotal($marks) / count($marks);
}

// Function to get grade
function getGrade($avg) {
    if ($avg >= 90) {
        return "A+";
    } elseif ($avg >= 80) {
        return "A";
    } elseif ($avg >= 70) {
        return "B";
    } elseif ($avg >= 60) {
        return "C";
    } else {
        return "Fail";
    }
}

// Function to find topper
function getTopper($students) {
    $topper = $students[0];
    $highestAvg = getAverage($students[0]["marks"]);

    foreach ($students as $student) {
        $avg = getAverage($student["marks"]);
        if ($avg > $highestAvg) {
            $highestAvg = $avg;
            $topper = $student;
        }
    }

    return [
        "name" => $topper["name"],
        "average" => $highestAvg
    ];
}

// Function to calculate class average
function getClassAverage($students) {
    $totalAvg = 0;
    foreach ($students as $student) {
        $totalAvg += getAverage($student["marks"]);
    }
    return $totalAvg / count($students);
}

$topper = getTopper($students);
$classAverage = getClassAverage($students);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Marks Analyzer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 20px;
        }
        .container {
            width: 900px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1, h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #999;
        }
        th, td {
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        .summary {
            margin-top: 25px;
            padding: 15px;
            background-color: #eef5ff;
            border-left: 5px solid #007bff;
        }
        .topper {
            color: green;
            font-weight: bold;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            color: #555;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Student Marks Analyzer</h1>
    <h2>Arrays and Functions Mini Project</h2>

    <table>
        <tr>
            <th>Sr. No</th>
            <th>Student Name</th>
            <th>Marks</th>
            <th>Total</th>
            <th>Average</th>
            <th>Grade</th>
        </tr>

        <?php
        $sr = 1;
        foreach ($students as $student) {
            $total = getTotal($student["marks"]);
            $average = getAverage($student["marks"]);
            $grade = getGrade($average);

            echo "<tr>";
            echo "<td>" . $sr . "</td>";
            echo "<td>" . $student["name"] . "</td>";
            echo "<td>" . implode(", ", $student["marks"]) . "</td>";
            echo "<td>" . $total . "</td>";
            echo "<td>" . number_format($average, 2) . "</td>";
            echo "<td>" . $grade . "</td>";
            echo "</tr>";

            $sr++;
        }
        ?>
    </table>

    <div class="summary">
        <p class="topper">Topper: <?php echo $topper["name"]; ?> (Average: <?php echo number_format($topper["average"], 2); ?>)</p>
        <p><strong>Class Average:</strong> <?php echo number_format($classAverage, 2); ?></p>
    </div>

    <div class="footer">
        <p>Student performance analyzed successfully using PHP arrays and functions.</p>
    </div>
</div>

</body>
</html>