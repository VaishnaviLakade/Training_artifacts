<?php
session_start();

$message = "";
$username = "";

// If cookie exists, prefill username
if (isset($_COOKIE["remember_user"])) {
    $username = $_COOKIE["remember_user"];
}

if (isset($_POST["login"])) {
    $username = trim($_POST["username"]);

    if ($username == "") {
        $message = "<span style='color:red;'>Username is required.</span>";
    } else {
        $_SESSION["username"] = htmlspecialchars($username);

        if (isset($_POST["remember"])) {
            setcookie("remember_user", $username, time() + 3600, "/");
        }

        $message = "<span style='color:green;'>Login successful.</span>";
    }
}

if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    setcookie("remember_user", "", time() - 3600, "/");
    $username = "";
    $message = "<span style='color:blue;'>Logged out successfully.</span>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login - Sessions and Cookies</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 20px;
        }
        .container {
            width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .result-box {
            margin-top: 20px;
            padding: 15px;
            background: #f9f9f9;
            border-left: 5px solid #007bff;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>User Login System</h2>

    <?php echo $message; ?>

    <form method="post" action="">
        <label>Username:</label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>">

        <label>
            <input type="checkbox" name="remember"> Remember Me
        </label>
        <br>

        <input type="submit" name="login" value="Login" class="btn">
        <input type="submit" name="logout" value="Logout" class="btn">
    </form>

    <div class="result-box">
        <?php
        if (isset($_SESSION["username"])) {
            echo "<p><strong>Session User:</strong> " . $_SESSION["username"] . "</p>";
        } else {
            echo "<p><strong>Session User:</strong> Not logged in</p>";
        }

        if (isset($_COOKIE["remember_user"])) {
            echo "<p><strong>Cookie User:</strong> " . htmlspecialchars($_COOKIE["remember_user"]) . "</p>";
        } else {
            echo "<p><strong>Cookie User:</strong> No cookie stored</p>";
        }
        ?>
    </div>
</div>

</body>
</html>