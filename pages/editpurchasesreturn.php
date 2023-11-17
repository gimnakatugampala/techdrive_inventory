<?php
require_once '../includes/db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode($_POST['data'], true);
    $olditems = json_decode($_POST['oldorderitems'], true);
    $selectSup = $_POST['selectSup'];
    // $selectPS = $_POST['selectPS'];
    $progressstatus = $_POST['progressstatus'];
    $Description = $_POST['Description'];
    $purchaseDate = $_POST['purchaseDate'];
    $isPaid = $_POST['isPaid'];
    $grandTotal = $_POST['grandTotal'];
    // $topaid = $_POST['topaid'];
    $dis = $_POST['dis'];
    $completeddate = $_POST['completeddate'];
    $soid = $_POST['poid'];
    $piid = $_POST['piid'];

    $comdate = '';
    if ($completeddate == '1') {
        $comdate = date('Y-m-d H:i:s');
    } else {
        $comdate = '';
    }

    $salesorderdate = date('Y-m-d H:i:s');
    $createddate = date('Y-m-d H:i:s');

    // $min = 1;
    // $max = 10000000000;
    // $socode = rand($min, $max);

    // $min = 1;
    // $max = 10000000000;
    // $picode = rand($min, $max);

    // $insertPurchaseOrderSQL = "INSERT INTO tbsalesorder (socode, cusid , sid ,paidstatusid,salesorderdate,isquotation) VALUES ('$socode', '$selectSup', '$progressstatus', '$selectPS', '$salesorderdate',0)";

    $updatesalesOrderSQL = "UPDATE tbpurchaseorderreturn SET 
    supid = '$selectSup',
    sid = '$progressstatus',
    description = '$Description',
    created_date = '$purchaseDate'
    WHERE
    id = '$soid'
    ";

    if ($conn->query($updatesalesOrderSQL) === true) {
        $updatesalesOrderSQL = $conn->insert_id; // Get the ID of the inserted row

        // DELETE ORDER ITEMS
        foreach ($olditems as $row) {
            $product = $row['product_id'];
            $quantity = $row['qty'];
            $price = $row['price'];
            $discount = $row['discount'];

            $delsql = "DELETE FROM tbpurchaseorderreturnitem WHERE product_id = '$product' AND
            porid = '$soid'";
            if ($conn->query($delsql) !== true) {
                echo 'Error: ' . $delsql . '<br>' . $conn->error;
                exit();
            }
        }

        foreach ($data as $row) {
            $product = $row['product'];
            $quantity = $row['quantity'];
            $price = $row['price'];
            $discount = $row['discount'];

            $sql = "INSERT INTO tbpurchaseorderreturnitem (product_id,porid,qty,price,discount) VALUES ('$product', '$soid', '$quantity', '$price', '$discount')";
            if ($conn->query($sql) !== true) {
                echo 'Error: ' . $sql . '<br>' . $conn->error;
                exit();
            }
        }

        if($progressstatus == "1"){

        // Insert into tbpurchaseinvoice
        $sql2 = "UPDATE tbpurchaseorderreturninvoice SET 
        grandtotal = '$grandTotal',
        discount = '$dis',
        isSuccess = '1',
        completeddate = '$comdate'
        WHERE id = '$piid'";
        if ($conn->query($sql2) !== true) {
            echo 'Error: ' . $sql2 . '<br>' . $conn->error;
            exit();
        }

        }else{
            

        // Insert into tbpurchaseinvoice
        $sql2 = "UPDATE tbpurchaseorderreturninvoice SET 
        grandtotal = '$grandTotal',
        discount = '$dis',
        isSuccess = '0'
        WHERE id = '$piid'";

        if ($conn->query($sql2) !== true) {
            echo 'Error: ' . $sql2 . '<br>' . $conn->error;
            exit();
        }
            
        }


        echo 'success';
    } else {
        echo 'Error: ' . $updatesalesOrderSQL . '<br>' . $conn->error;
    }
}
?>