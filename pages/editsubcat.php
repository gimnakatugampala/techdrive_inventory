<?php
require_once '../includes/db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $subcatname = $_POST['subcatname'];
        $scid = $_POST['scid'];
        $id = $_POST['id'];

        $sql = "UPDATE tbsubcategory SET subcatname = '$subcatname',cid = '$scid' WHERE id = '$id'";
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
