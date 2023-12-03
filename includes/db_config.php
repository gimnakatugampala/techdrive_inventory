<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_techdrive";


// // Server Cred
// $servername = "sql200.infinityfree.com";
// $username = "if0_35548233";
// $password = "btv1OaODZsK";
// $dbname = "if0_35548233_db_techdrive";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
