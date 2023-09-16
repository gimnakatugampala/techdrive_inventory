<?php
require_once '../includes/db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $subcatid = $_POST['subcatid'];

        $sql = "UPDATE tbsubcategory
        INNER JOIN tbcategory ON tbsubcategory.cid = tbcategory.id
        SET tbsubcategory.isdeleted = 1
        WHERE tbsubcategory.id = '$subcatid'";
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
