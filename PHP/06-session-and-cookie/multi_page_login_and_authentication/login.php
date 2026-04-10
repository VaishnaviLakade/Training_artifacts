<?php
require_once "db.php";

$email = "";
$emailErr = $passwordErr = $loginErr = "";

if (isset($_COOKIE["remember_email"])) {
    $email = htmlspecialchars($_COOKIE["remember_email"]);
}

function cleanInput($data) {
    return htmlspecialchars(trim($data));
}

if (isset($_POST["login"])) {
    $email = cleanInput($_POST["email"]);
    $password = $_POST["password"];

    if ($email == "") {
        $emailErr = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }

    if ($password == "") {
        $passwordErr = "Password is required";
    }

    if ($emailErr == "" && $passwordErr == "") {
        $sql = "SELECT id, name, email, password FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user["password"])) {
                session_regenerate_id(true);

                $_SESSION["user_id"] = $user["id"];
                $_SESSION["user_name"] = $user["name"];
                $_SESSION["user_email"] = $user["email"];

                if (isset($_POST["remember"])) {
                    setcookie("remember_email", $user["email"], time() + 3600, "/");
                } else {
                    setcookie("remember_email", "", time() - 3600, "/");
                }

                header("Location: dashboard.php");
                exit();
            } else {
                $loginErr = "Invalid email or password";
            }
        } else {
            $loginErr = "Invalid email or password";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Login</h2>

    <?php if ($loginErr != "") { ?>
        <p class="error center"><?php echo $loginErr; ?></p>
    <?php } ?>

    <form method="post" action="">
        <label>Email</label>
        <input type="text" name="email" value="<?php echo $email; ?>">
        <div class="error"><?php echo $emailErr; ?></div>

        <label>Password</label>
        <input type="password" name="password">
        <div class="error"><?php echo $passwordErr; ?></div>

        <label class="remember-box">
            <input type="checkbox" name="remember"> Remember Me
        </label>

        <input type="submit" name="login" value="Login" class="btn">
    </form>

    <p>New user? <a href="register.php">Create account</a></p>
</div>
</body>
</html>