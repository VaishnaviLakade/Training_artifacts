<?php
date_default_timezone_set("Asia/Kolkata");

$fileName = "notes.txt";
$message = "";

if (isset($_POST["submit"])) {
    $note = trim($_POST["note"]);

    if ($note == "") {
        $message = "<span style='color:red;'>Note cannot be empty.</span>";
    } else {
        $note = htmlspecialchars($note);
        $entry = "Date: " . date("d-m-Y") . " | Time: " . date("H:i:s") . "\n";
        $entry .= "Note: " . $note . "\n";
        $entry .= "--------------------------\n";

        file_put_contents($fileName, $entry, FILE_APPEND);
        $message = "<span style='color:green;'>Note saved successfully.</span>";
    }
}

$allNotes = "";
if (file_exists($fileName)) {
    $allNotes = nl2br(file_get_contents($fileName));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daily Notes Saver</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 20px;
        }
        .container {
            width: 700px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
        }
        textarea {
            width: 100%;
            height: 120px;
            padding: 10px;
            margin-top: 10px;
            resize: vertical;
        }
        .btn {
            margin-top: 10px;
            padding: 10px 18px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .notes-box {
            margin-top: 25px;
            background: #f9f9f9;
            padding: 15px;
            border: 1px solid #ccc;
            white-space: pre-wrap;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Daily Notes Saver</h2>

    <?php echo $message; ?>

    <form method="post" action="">
        <label>Enter your note:</label><br>
        <textarea name="note"></textarea><br>
        <input type="submit" name="submit" value="Save Note" class="btn">
    </form>

    <div class="notes-box">
        <h3>Saved Notes</h3>
        <?php echo $allNotes != "" ? $allNotes : "No notes saved yet."; ?>
    </div>
</div>

</body>
</html>