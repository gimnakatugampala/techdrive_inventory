<?php
require_once '../includes/db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $productname = $_POST['productname'];
        $selectcatid = $_POST['selectcatid'];
        $selectsubcatid = $_POST['selectsubcatid'];
        $selectbrandid = $_POST['selectbrandid'];
        $warrenty = $_POST['warrenty'];
        $minquanity = $_POST['minquanity'];
        $quantity = $_POST['quantity'];
        $selectavailablity = $_POST['selectavailablity'];
        $sellingprice = $_POST['sellingprice'];
        $buyingprice = $_POST['buyingprice'];
        $pid = $_POST['pid'];

        $sql = "UPDATE tbproduct SET productname = '$productname', quantity = '$quantity', warrenty = '$warrenty',minquanity = '$minquanity', avlid = '$selectavailablity',sellingprice = '$sellingprice', buyingprice = '$buyingprice',catid = '$selectcatid', scatid = '$selectsubcatid',bid = '$selectbrandid'WHERE id = '$pid'";
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
