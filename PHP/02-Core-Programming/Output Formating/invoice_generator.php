<?php
date_default_timezone_set("Asia/Kolkata");

// Shop Details
$shopName = "Tech World Store";
$shopAddress = "Pune, Maharashtra";
$shopPhone = "+91 9876543210";

// Customer Details
$customerName = "Vaishnavi Lakade";
$invoiceNo = "INV" . rand(1000, 9999);
$invoiceDate = date("d-m-Y H:i:s");

// Items: name, quantity, price
$items = [
    ["name" => "Laptop Bag", "qty" => 2, "price" => 1200.50],
    ["name" => "Wireless Mouse", "qty" => 1, "price" => 799.99],
    ["name" => "Keyboard", "qty" => 1, "price" => 1499.75],
    ["name" => "USB Cable", "qty" => 3, "price" => 199.25]
];

$subtotal = 0;

// Calculate subtotal
foreach ($items as $item) {
    $subtotal += $item["qty"] * $item["price"];
}

// Discount and tax
$discountPercent = 10;
$discountAmount = ($subtotal * $discountPercent) / 100;

$taxableAmount = $subtotal - $discountAmount;
$gstPercent = 18;
$gstAmount = ($taxableAmount * $gstPercent) / 100;

$finalTotal = $taxableAmount + $gstAmount;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Advanced Invoice Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 20px;
        }
        .invoice-box {
            max-width: 900px;
            background: white;
            margin: auto;
            padding: 30px;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1, h2, h3 {
            margin: 0;
        }
        .top-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
        }
        .details p {
            margin: 4px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            border: 1px solid #999;
            padding: 10px;
            text-align: center;
        }
        table th {
            background-color: #007bff;
            color: white;
        }
        .totals {
            width: 40%;
            margin-left: auto;
            margin-top: 20px;
        }
        .totals td {
            padding: 8px;
            border: 1px solid #999;
        }
        .final {
            font-weight: bold;
            background-color: #dff0d8;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #555;
        }
    </style>
</head>
<body>

<div class="invoice-box">
    <?php
        echo "<h1>$shopName</h1>";
        echo "<p>$shopAddress</p>";
        echo "<p>Phone: $shopPhone</p>";
    ?>

    <hr>

    <div class="top-section">
        <div class="details">
            <h3>Bill To:</h3>
            <?php
                echo "<p><strong>$customerName</strong></p>";
            ?>
        </div>

        <div class="details">
            <?php
                echo "<p><strong>Invoice No:</strong> $invoiceNo</p>";
                echo "<p><strong>Date:</strong> $invoiceDate</p>";
            ?>
        </div>
    </div>

    <h2>Invoice Details</h2>

    <table>
        <tr>
            <th>Sr. No</th>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Price (₹)</th>
            <th>Total (₹)</th>
        </tr>

        <?php
        $sr = 1;
        foreach ($items as $item) {
            $itemTotal = $item["qty"] * $item["price"];
            echo "<tr>";
            echo "<td>$sr</td>";
            echo "<td>" . $item["name"] . "</td>";
            echo "<td>" . $item["qty"] . "</td>";
            echo "<td>" . number_format($item["price"], 2) . "</td>";
            echo "<td>" . number_format($itemTotal, 2) . "</td>";
            echo "</tr>";
            $sr++;
        }
        ?>
    </table>

    <table class="totals">
        <tr>
            <td><strong>Subtotal</strong></td>
            <td>
                <?php printf("₹%.2f", $subtotal); ?>
            </td>
        </tr>
        <tr>
            <td><strong>Discount (<?php echo $discountPercent; ?>%)</strong></td>
            <td>
                <?php printf("- ₹%.2f", $discountAmount); ?>
            </td>
        </tr>
        <tr>
            <td><strong>GST (<?php echo $gstPercent; ?>%)</strong></td>
            <td>
                <?php printf("₹%.2f", $gstAmount); ?>
            </td>
        </tr>
        <tr class="final">
            <td><strong>Final Total</strong></td>
            <td>
                <?php print("₹" . number_format($finalTotal, 2)); ?>
            </td>
        </tr>
    </table>

    <div class="footer">
        <?php
            echo "<p>Thank you for shopping with us!</p>";
            echo "<p>This is a computer-generated invoice.</p>";
        ?>
    </div>
</div>

</body>
</html>