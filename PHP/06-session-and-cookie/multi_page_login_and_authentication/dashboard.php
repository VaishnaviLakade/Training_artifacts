<?php
require_once "auth_check.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Dashboard</h2>

    <div class="card">
        <p><strong>Welcome:</strong> <?php echo htmlspecialchars($_SESSION["user_name"]); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION["user_email"]); ?></p>
        <p><strong>Status:</strong> Logged in successfully using session</p>
    </div>

    <a href="logout.php" class="btn logout-btn">Logout</a>
</div>
</body>
</html>