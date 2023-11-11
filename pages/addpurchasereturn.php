<?php
require_once '../includes/db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode($_POST['data'], true);
    $selectPro = $_POST['selectPro'];
    $selectSup = $_POST['selectSup'];
    $desc = $_POST['desc'];
    // $pocode = $_POST['code'];
    // $selectPS = $_POST['selectPS'];
    $progressstatus = $_POST['progressstatus'];
    // $paidAmount = $_POST['paidAmount'];
    $purchaseDate = $_POST['purchaseDate'];
    $isPaid = $_POST['isPaid'];
    $grandTotal = $_POST['grandTotal'];
    // $topaid = $_POST['topaid'];
    $dis = $_POST['dis'];
    $completeddate = $_POST['completeddate'];
    $pocode = $_POST['porcode'];
    $picode = $_POST['poricode'];

    $comdate = '';
    if ($completeddate == '1') {
        $comdate = date('Y-m-d H:i:s');
    } else {
        $comdate = '';
    }

    $invoiceissueddate = date('Y-m-d H:i:s');
    $createddate = date('Y-m-d H:i:s');

    // $min = 1;
    // $max = 10000000000;
    // $pocode = rand($min, $max);

    // $min = 1;
    // $max = 10000000000;
    // $picode = rand($min, $max);

    $insertPurchaseOrderSQL = "INSERT INTO tbpurchaseorderreturn (porcode, supid, sid ,created_date,description) VALUES 
    ('$pocode', '$selectSup', '$progressstatus','$createddate','$desc')";

    if ($conn->query($insertPurchaseOrderSQL) === true) {
        $insertedPurchaseOrderID = $conn->insert_id; // Get the ID of the inserted row
        foreach ($data as $row) {
            $product = $row['product'];
            $quantity = $row['quantity'];
            $price = $row['price'];
            $discount = $row['discount'];

            $sql = "INSERT INTO tbpurchaseorderreturnitem (product_id, porid, qty, price, discount) VALUES 
            ('$product', '$insertedPurchaseOrderID', '$quantity', '$price', '$discount')";
            if ($conn->query($sql) !== true) {
                echo 'Error: ' . $sql . '<br>' . $conn->error;
                exit();
            }
        }

        // Insert into tbpurchaseinvoice
        $sql2 = "INSERT INTO  tbpurchaseorderreturninvoice (grandtotal, isSuccess, discount, porid, poricode, completeddate) VALUES 
        ('$grandTotal', '$isPaid', '$dis', '$insertedPurchaseOrderID', '$picode', '$comdate')";
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
