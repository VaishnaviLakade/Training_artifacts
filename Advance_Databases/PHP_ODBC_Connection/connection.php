<?php
$conn = odbc_connect("flight_dsn", "root", "root");

if ($conn) {
    echo "Connection successful";
} else {
    echo "Connection failed";
}
?>