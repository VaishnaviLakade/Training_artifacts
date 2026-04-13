<?php
$nameMsg = $emailMsg = $phoneMsg = $passwordMsg = "";
$name = $email = $phone = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $password = trim($_POST["password"]);

    if (preg_match("/^[a-zA-Z ]{3,50}$/", $name)) {
        $nameMsg = "Valid name";
    } else {
        $nameMsg = "Invalid name. Only letters and spaces, 3 to 50 characters.";
    }

    if (preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
        $emailMsg = "Valid email";
    } else {
        $emailMsg = "Invalid email format";
    }

    if (preg_match("/^[0-9]{10}$/", $phone)) {
        $phoneMsg = "Valid phone number";
    } else {
        $phoneMsg = "Invalid phone number. Must be exactly 10 digits.";
    }

    if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
        $passwordMsg = "Strong password";
    } else {
        $passwordMsg = "Password must have uppercase, lowercase, digit, special character, and minimum 8 characters.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Regex Validator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="box">
        <h2>Regex Input Validator</h2>
        <form method="POST">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">

            <label>Email:</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">

            <label>Phone:</label>
            <input type="text" name="phone" value="<?php echo htmlspecialchars($phone); ?>">

            <label>Password:</label>
            <input type="password" name="password" value="<?php echo htmlspecialchars($password); ?>">

            <button type="submit">Validate</button>
        </form>

        <div class="result">
            <p><strong>Name:</strong> <?php echo $nameMsg; ?></p>
            <p><strong>Email:</strong> <?php echo $emailMsg; ?></p>
            <p><strong>Phone:</strong> <?php echo $phoneMsg; ?></p>
            <p><strong>Password:</strong> <?php echo $passwordMsg; ?></p>
        </div>
    </div>
</body>
</html>