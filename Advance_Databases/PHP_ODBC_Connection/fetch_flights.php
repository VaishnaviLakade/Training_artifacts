<?php
$conn = odbc_connect("flight_dsn", "root", "root");

if (!$conn) {
    die("Connection failed");
}

$sql = "SELECT * FROM flight";
$result = odbc_exec($conn, $sql);

if (!$result) {
    die("Query failed");
}

echo "<h2>Flight Records</h2>";
echo "<table border='1' cellpadding='8'>";
echo "<tr>
        <th>ID</th>
        <th>Flight Name</th>
        <th>Source</th>
        <th>Destination</th>
        <th>Price</th>
        <th>Seats</th>
      </tr>";

while ($row = odbc_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["f_name"] . "</td>";
    echo "<td>" . $row["src"] . "</td>";
    echo "<td>" . $row["dest"] . "</td>";
    echo "<td>" . $row["price"] . "</td>";
    echo "<td>" . $row["seats"] . "</td>";
    echo "</tr>";
}

echo "</table>";

odbc_close($conn);
?>