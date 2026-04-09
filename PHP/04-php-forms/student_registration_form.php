  <?php
// Function to clean user input
function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Variables
$name = $email = $age = $gender = $course = $message = "";
$hobbies = [];

$nameErr = $emailErr = $ageErr = $genderErr = $courseErr = $hobbyErr = $messageErr = "";

$successMessage = "";

if (isset($_POST["submit"])) {
    // Name Validation
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = cleanInput($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
            $nameErr = "Only letters and spaces are allowed";
        }
    }

    // Email Validation
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = cleanInput($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Enter a valid email address";
        }
    }

    // Age Validation
    if (empty($_POST["age"])) {
        $ageErr = "Age is required";
    } else {
        $age = cleanInput($_POST["age"]);
        if (!is_numeric($age) || $age < 16 || $age > 100) {
            $ageErr = "Age must be a number between 16 and 100";
        }
    }

    // Gender Validation
    if (empty($_POST["gender"])) {
        $genderErr = "Please select gender";
    } else {
        $gender = cleanInput($_POST["gender"]);
    }

    // Course Validation
    if (empty($_POST["course"])) {
        $courseErr = "Please select course";
    } else {
        $course = cleanInput($_POST["course"]);
    }

    // Hobby Validation
    if (empty($_POST["hobby"])) {
        $hobbyErr = "Select at least one hobby";
    } else {
        foreach ($_POST["hobby"] as $hobby) {
            $hobbies[] = cleanInput($hobby);
        }
    }

    // Message Validation
    if (empty($_POST["message"])) {
        $messageErr = "Message is required";
    } else {
        $message = cleanInput($_POST["message"]);
        if (strlen($message) < 10) {
            $messageErr = "Message must be at least 10 characters";
        }
    }

    // Final check
    if (
        $nameErr == "" &&
        $emailErr == "" &&
        $ageErr == "" &&
        $genderErr == "" &&
        $courseErr == "" &&
        $hobbyErr == "" &&
        $messageErr == ""
    ) {
        $successMessage = "Form submitted successfully!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
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

        h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        .radio-group,
        .checkbox-group {
            margin-top: 8px;
        }

        .radio-group input,
        .checkbox-group input {
            margin-right: 5px;
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
            margin-bottom: 20px;
        }

        .result-box {
            margin-top: 25px;
            padding: 20px;
            background-color: #eef8ee;
            border-left: 5px solid green;
            border-radius: 5px;
        }

        .result-box p {
            margin: 8px 0;
        }

        .required {
            color: red;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Student Registration Form</h2>

    <?php
    if ($successMessage != "") {
        echo "<p class='success'>$successMessage</p>";
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label>Name <span class="required">*</span></label>
            <input type="text" name="name" value="<?php echo $name; ?>">
            <div class="error"><?php echo $nameErr; ?></div>
        </div>

        <div class="form-group">
            <label>Email <span class="required">*</span></label>
            <input type="text" name="email" value="<?php echo $email; ?>">
            <div class="error"><?php echo $emailErr; ?></div>
        </div>

        <div class="form-group">
            <label>Age <span class="required">*</span></label>
            <input type="number" name="age" value="<?php echo $age; ?>">
            <div class="error"><?php echo $ageErr; ?></div>
        </div>

        <div class="form-group">
            <label>Gender <span class="required">*</span></label>
            <div class="radio-group">
                <input type="radio" name="gender" value="Male" <?php if ($gender == "Male") echo "checked"; ?>> Male
                <input type="radio" name="gender" value="Female" <?php if ($gender == "Female") echo "checked"; ?>> Female
                <input type="radio" name="gender" value="Other" <?php if ($gender == "Other") echo "checked"; ?>> Other
            </div>
            <div class="error"><?php echo $genderErr; ?></div>
        </div>

        <div class="form-group">
            <label>Course <span class="required">*</span></label>
            <select name="course">
                <option value="">-- Select Course --</option>
                <option value="BTech" <?php if ($course == "BTech") echo "selected"; ?>>BTech</option>
                <option value="MCA" <?php if ($course == "MCA") echo "selected"; ?>>MCA</option>
                <option value="BCA" <?php if ($course == "BCA") echo "selected"; ?>>BCA</option>
                <option value="Diploma" <?php if ($course == "Diploma") echo "selected"; ?>>Diploma</option>
            </select>
            <div class="error"><?php echo $courseErr; ?></div>
        </div>

        <div class="form-group">
            <label>Hobbies <span class="required">*</span></label>
            <div class="checkbox-group">
                <input type="checkbox" name="hobby[]" value="Reading"
                    <?php if (in_array("Reading", $hobbies)) echo "checked"; ?>> Reading

                <input type="checkbox" name="hobby[]" value="Coding"
                    <?php if (in_array("Coding", $hobbies)) echo "checked"; ?>> Coding

                <input type="checkbox" name="hobby[]" value="Sports"
                    <?php if (in_array("Sports", $hobbies)) echo "checked"; ?>> Sports

                <input type="checkbox" name="hobby[]" value="Music"
                    <?php if (in_array("Music", $hobbies)) echo "checked"; ?>> Music
            </div>
            <div class="error"><?php echo $hobbyErr; ?></div>
        </div>

        <div class="form-group">
            <label>Message <span class="required">*</span></label>
            <textarea name="message"><?php echo $message; ?></textarea>
            <div class="error"><?php echo $messageErr; ?></div>
        </div>

        <input type="submit" name="submit" value="Register" class="btn">
    </form>

    <?php if ($successMessage != "") { ?>
        <div class="result-box">
            <h3>Submitted Details</h3>
            <p><strong>Name:</strong> <?php echo $name; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Age:</strong> <?php echo $age; ?></p>
            <p><strong>Gender:</strong> <?php echo $gender; ?></p>
            <p><strong>Course:</strong> <?php echo $course; ?></p>
            <p><strong>Hobbies:</strong> <?php echo implode(", ", $hobbies); ?></p>
            <p><strong>Message:</strong> <?php echo $message; ?></p>
        </div>
    <?php } ?>
</div>

</body>
</html>