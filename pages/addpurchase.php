<?php
require_once '../includes/db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode($_POST['data'], true);
    $selectPro = $_POST['selectPro'];
    $selectSup = $_POST['selectSup'];
    $selectPS = $_POST['selectPS'];
    $progressstatus = $_POST['progressstatus'];
    $paidAmount = $_POST['paidAmount'];
    $purchaseDate = $_POST['purchaseDate'];
    $isPaid = $_POST['isPaid'];
    $grandTotal = $_POST['grandTotal'];
    $topaid = $_POST['topaid'];
    $dis = $_POST['dis'];
    $completeddate = $_POST['completeddate'];

    $comdate = '';
    if ($completeddate == '1') {
        $comdate = date('Y-m-d H:i:s');
    } else {
        $comdate = '';
    }

    $invoiceissueddate = date('Y-m-d H:i:s');
    $createddate = date('Y-m-d H:i:s');

    $min = 1;
    $max = 10000000000;
    $pocode = rand($min, $max);

    $min = 1;
    $max = 10000000000;
    $picode = rand($min, $max);

    $insertPurchaseOrderSQL = "INSERT INTO tbpurchaseorder (pocode, invoiceissued, supid, statusid,paidstatusid,isdeleted,createdate) VALUES ('$pocode', '$invoiceissueddate', '$selectSup', '$progressstatus', '$selectPS',0,'$createddate')";

    if ($conn->query($insertPurchaseOrderSQL) === true) {
        $insertedPurchaseOrderID = $conn->insert_id; // Get the ID of the inserted row
        foreach ($data as $row) {
            $product = $row['product'];
            $quantity = $row['quantity'];
            $price = $row['price'];
            $discount = $row['discount'];

            $sql = "INSERT INTO tbpurchaseorderitem (product_id, poid, qty, price, discount) VALUES ('$product', '$insertedPurchaseOrderID', '$quantity', '$price', '$discount')";
            if ($conn->query($sql) !== true) {
                echo 'Error: ' . $sql . '<br>' . $conn->error;
                exit();
            }
        }

        // Insert into tbpurchaseinvoice
        $sql2 = "INSERT INTO tbpurchaseinvoice (paidamount,grandtotal,tobepaid, isPaid, createdate, discount, poid, picode, completeddate) VALUES ('$paidAmount','$grandTotal','$topaid', '$isPaid', '$purchaseDate', '$dis', '$insertedPurchaseOrderID', '$picode', '$comdate')";
        if ($conn->query($sql2) !== true) {
            echo 'Error: ' . $sql2 . '<br>' . $conn->error;
            exit();
        }

        echo 'success';
    } else {
        echo 'Error: ' . $insertPurchaseOrderSQL . '<br>' . $conn->error;
    }
}
?>