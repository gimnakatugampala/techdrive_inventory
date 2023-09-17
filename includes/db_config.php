<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_techdrive";


// // Server Cred
// $servername = "sql108.infinityfree.com";
// $username = "if0_34939366";
// $password = "iH1nRWLZ8sr";
// $dbname = "if0_34939366_db_techdrive";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
