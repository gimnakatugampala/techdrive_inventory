<?php
require_once '../../includes/db_config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $supid = $_POST["supid"];

        $sql = "UPDATE tbsupplier SET isdeleted = 1 WHERE id = '$supid'";
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