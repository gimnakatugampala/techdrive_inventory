<?php
require_once '../includes/db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $pocode = $_POST['pocode'];

        $sql = "UPDATE tbpurchaseorder SET isdeleted = 1 WHERE pocode = '$pocode'";
        if ($conn->query($sql) === true) {
            echo 'success';
        } else {
            echo 'Error: ' . $sql . '<br>' . $conn->error;
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo 'Invalid request method.';
}
?>
