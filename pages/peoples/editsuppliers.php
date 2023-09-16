<?php
require_once '../../includes/db_config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $supname = $_POST['supname'];
        $supemail = $_POST['supemail'];
        $supphone = $_POST['supphone'];
        $supaddress = $_POST['supaddress'];
        $supid = $_POST['supid'];


        $sql = "UPDATE tbsupplier SET supname = '$supname', supemail = '$supemail',supphone = '$supphone', supaddress = '$supaddress' WHERE id = '$supid'";
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