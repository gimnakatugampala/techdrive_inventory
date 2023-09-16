<?php
require_once '../../includes/db_config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $cusname = $_POST['cusname'];
        $cusemail = $_POST['cusemail'];
        $cusphone = $_POST['cusphone'];
        $cusaddress = $_POST['cusaddress'];
        $cusid = $_POST['cusid'];


        $sql = "UPDATE tbcustomer SET cusname = '$cusname', cusemail = '$cusemail',cusphone = '$cusphone', cusaddress = '$cusaddress' WHERE id = '$cusid'";
        if ($conn->query($sql) === TRUE) {
            echo "success";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request method.";
}
?>