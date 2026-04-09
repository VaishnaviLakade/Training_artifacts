<?php
date_default_timezone_set("Asia/Kolkata");

$fileName = "feedback.txt";

$name = "";
$department = "";
$feedback = "";

$nameErr = "";
$departmentErr = "";
$feedbackErr = "";

$successMessage = "";

// Function to clean input
function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["submit"])) {
    // Name validation
    if (empty($_POST["name"])) {
        $nameErr = "Employee name is required";
    } else {
        $name = cleanInput($_POST["name"]);
    }

    // Department validation
    if (empty($_POST["department"])) {
        $departmentErr = "Department is required";
    } else {
        $department = cleanInput($_POST["department"]);
    }

    // Feedback validation
    if (empty($_POST["feedback"])) {
        $feedbackErr = "Feedback is required";
    } else {
        $feedback = cleanInput($_POST["feedback"]);
        if (strlen($feedback) < 10) {
            $feedbackErr = "Feedback must be at least 10 characters";
        }
    }

    // Save only if no errors
    if ($nameErr == "" && $departmentErr == "" && $feedbackErr == "") {
        $entry = "Date: " . date("d-m-Y") . "\n";
        $entry .= "Time: " . date("H:i:s") . "\n";
        $entry .= "Employee Name: " . $name . "\n";
        $entry .= "Department: " . $department . "\n";
        $entry .= "Feedback: " . $feedback . "\n";
        $entry .= "----------------------------------------\n";

        file_put_contents($fileName, $entry, FILE_APPEND);

        $successMessage = "Feedback saved successfully.";

        // Clear fields after saving
        $name = "";
        $department = "";
        $feedback = "";
    }
}

// Read all feedback
$allFeedback = "";
if (file_exists($fileName)) {
    $allFeedback = nl2br(file_get_contents($fileName));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Feedback Saver</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 20px;
        }

        .container {
            width: 750px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2, h3 {
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"], textarea, select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            height: 120px;
            resize: vertical;
        }

        .btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        .success {
            color: green;
            font-weight: bold;
            text-align: center;
            margin-bottom: 15px;
        }

        .records {
            margin-top: 25px;
            padding: 15px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
            white-space: pre-wrap;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Employee Feedback Saver</h2>

    <?php
    if ($successMessage != "") {
        echo "<p class='success'>$successMessage</p>";
    }
    ?>

    <form method="post" action="">
        <div class="form-group">
            <label>Employee Name</label>
            <input type="text" name="name" value="<?php echo $name; ?>">
            <div class="error"><?php echo $nameErr; ?></div>
        </div>

        <div class="form-group">
            <label>Department</label>
            <select name="department">
                <option value="">-- Select Department --</option>
                <option value="HR" <?php if ($department == "HR") echo "selected"; ?>>HR</option>
                <option value="IT" <?php if ($department == "IT") echo "selected"; ?>>IT</option>
                <option value="Sales" <?php if ($department == "Sales") echo "selected"; ?>>Sales</option>
                <option value="Support" <?php if ($department == "Support") echo "selected"; ?>>Support</option>
            </select>
            <div class="error"><?php echo $departmentErr; ?></div>
        </div>

        <div class="form-group">
            <label>Feedback</label>
            <textarea name="feedback"><?php echo $feedback; ?></textarea>
            <div class="error"><?php echo $feedbackErr; ?></div>
        </div>

        <input type="submit" name="submit" value="Save Feedback" class="btn">
    </form>

    <div class="records">
        <h3>Saved Feedback Records</h3>
        <?php
        if ($allFeedback != "") {
            echo $allFeedback;
        } else {
            echo "No feedback records found.";
        }
        ?>
    </div>
</div>

</body>
</html>