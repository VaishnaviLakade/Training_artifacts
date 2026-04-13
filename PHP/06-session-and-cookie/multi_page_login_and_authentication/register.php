<?php
require_once "db.php";

$name = $email = "";
$nameErr = $emailErr = $passwordErr = $confirmErr = $successMsg = "";

function cleanInput($data) {
    return htmlspecialchars(trim($data));
}

if (isset($_POST["register"])) {
    $name = cleanInput($_POST["name"]);
    $email = cleanInput($_POST["email"]);
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    if ($name == "") {
        $nameErr = "Name is required";
    }

    if ($email == "") {
        $emailErr = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }

    if ($password == "") {
        $passwordErr = "Password is required";
    } elseif (strlen($password) < 6) {
        $passwordErr = "Password must be at least 6 characters";
    }

    if ($confirmPassword == "") {
        $confirmErr = "Confirm password is required";
    } elseif ($password !== $confirmPassword) {
        $confirmErr = "Passwords do not match";
    }

    if ($nameErr == "" && $emailErr == "" && $passwordErr == "" && $confirmErr == "") {
        $checkSql = "SELECT id FROM users WHERE email = ?";
        $stmt = $conn->prepare($checkSql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $emailErr = "Email already registered";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $insertSql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($insertSql);
            $stmt->bind_param("sss", $name, $email, $hashedPassword);

            if ($stmt->execute()) {
                $successMsg = "Registration successful. You can now login.";
                $name = "";
                $email = "";
            } else {
                $successMsg = "Something went wrong.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Register</h2>

    <?php if ($successMsg != "") { ?>
        <p class="success"><?php echo $successMsg; ?></p>
    <?php } ?>

    <form method="post" action="">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $name; ?>">
        <div class="error"><?php echo $nameErr; ?></div>

        <label>Email</label>
        <input type="text" name="email" value="<?php echo $email; ?>">
        <div class="error"><?php echo $emailErr; ?></div>

        <label>Password</label>
        <input type="password" name="password">
        <div class="error"><?php echo $passwordErr; ?></div>

        <label>Confirm Password</label>
        <input type="password" name="confirm_password">
        <div class="error"><?php echo $confirmErr; ?></div>

        <input type="submit" name="register" value="Register" class="btn">
    </form>

    <p>Already have an account? <a href="login.php">Login here</a></p>
</div>
</body>
</html>