<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_techdrive";


// Server Cred
// $servername = "localhost";
// $username = "autoserv_root";
// $password = "PBh*n[{iR9Gs";
// $dbname = "autoserv_inventory";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
