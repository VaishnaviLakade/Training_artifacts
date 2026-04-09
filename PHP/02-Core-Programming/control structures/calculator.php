<?php
$res = "";
$err = "";

function calc($a, $b, $op) {
    switch ($op) {
        case "+":
            return $a + $b;
        case "-":
            return $a - $b;
        case "*":
            return $a * $b;
        case "/":
            if ($b == 0) {
                return "Division by zero not allowed";
            }
            return $a / $b;
        case "%":
            if ($b == 0) {
                return "Modulo by zero not allowed";
            }
            return $a % $b;
        case "^":
            return pow($a, $b);
        default:
            return "Invalid operator";
    }
}

$a = "";
$b = "";
$op = "+";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = $_POST["a"] ?? "";
    $b = $_POST["b"] ?? "";
    $op = $_POST["op"] ?? "+";

    if ($a === "" || $b === "") {
        $err = "Please enter both numbers.";
    } elseif (!is_numeric($a) || !is_numeric($b)) {
        $err = "Please enter valid numeric values.";
    } else {
        $a = (float)$a;
        $b = (float)$b;
        $res = calc($a, $b, $op);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            background: #f4f6f8;
        }

        .box {
            width: 380px;
            margin: 60px auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.15);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-top: 12px;
            margin-bottom: 6px;
            color: #444;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #bbb;
            border-radius: 8px;
            outline: none;
        }

        input:focus, select:focus {
            border-color: #007bff;
        }

        button {
            width: 100%;
            margin-top: 18px;
            padding: 10px;
            border: none;
            border-radius: 8px;
            background: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        .result {
            margin-top: 18px;
            padding: 12px;
            border-radius: 8px;
            background: #e8f5e9;
            color: #2e7d32;
            font-weight: bold;
        }

        .error {
            margin-top: 18px;
            padding: 12px;
            border-radius: 8px;
            background: #ffebee;
            color: #c62828;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="box">
        <h2>PHP Calculator</h2>

        <form method="POST">
            <label>Enter First Number</label>
            <input type="text" name="a" value="<?php echo htmlspecialchars((string)$a); ?>">

            <label>Choose Operator</label>
            <select name="op">
                <option value="+" <?php if ($op == "+") echo "selected"; ?>>Addition (+)</option>
                <option value="-" <?php if ($op == "-") echo "selected"; ?>>Subtraction (-)</option>
                <option value="*" <?php if ($op == "*") echo "selected"; ?>>Multiplication (*)</option>
                <option value="/" <?php if ($op == "/") echo "selected"; ?>>Division (/)</option>
                <option value="%" <?php if ($op == "%") echo "selected"; ?>>Modulo (%)</option>
                <option value="^" <?php if ($op == "^") echo "selected"; ?>>Power (^)</option>
            </select>

            <label>Enter Second Number</label>
            <input type="text" name="b" value="<?php echo htmlspecialchars((string)$b); ?>">

            <button type="submit">Calculate</button>
        </form>

        <?php if ($err != "") { ?>
            <div class="error"><?php echo $err; ?></div>
        <?php } ?>

        <?php if ($res !== "" && $err == "") { ?>
            <div class="result">
                Result: <?php echo htmlspecialchars((string)$res); ?>
            </div>
        <?php } ?>
    </div>

</body>
</html>