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
    $socode = $_POST['socode'];
    $picode = $_POST['picode'];

    $comdate = '';
    if ($completeddate == '1') {
        $comdate = date('Y-m-d H:i:s');
    } else {
        $comdate = '';
    }

    $salesorderdate = date('Y-m-d H:i:s');
    $createddate = date('Y-m-d H:i:s');


    $insertPurchaseOrderSQL = "INSERT INTO tbsalesorder (socode, cusid , sid ,paidstatusid,salesorderdate,isquotation) VALUES ('$socode', '$selectSup', '$progressstatus', '$selectPS', '$salesorderdate',0)";

    if ($conn->query($insertPurchaseOrderSQL) === true) {
        $insertedPurchaseOrderID = $conn->insert_id; // Get the ID of the inserted row
        foreach ($data as $row) {
            $product = $row['product'];
            $quantity = $row['quantity'];
            $price = $row['price'];
            $discount = $row['discount'];

            // Update the New Product Quantity
            $query = "SELECT quantity FROM tbproduct WHERE id = $product";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                $current_quantity = $result->fetch_assoc()['quantity'];
                $new_quantity = $current_quantity - $quantity;

                // Update the database with the new quantity
                $update_query = "UPDATE tbproduct SET quantity = $new_quantity WHERE id = $product";

                if ($conn->query($update_query) === TRUE) {
                    echo "Sale recorded successfully!";
                } else {
                    echo "Error updating quantity: " . $conn->error;
                }
            }

            // Update the New Product Quantity

            $sql = "INSERT INTO tborderitem (pid,salesorderid,quantity,price,discount) VALUES ('$product', '$insertedPurchaseOrderID', '$quantity', '$price', '$discount')";
            if ($conn->query($sql) !== true) {
                echo 'Error: ' . $sql . '<br>' . $conn->error;
                exit();
            }
        }

        if($progressstatus == "1" && $selectPS == "3"){

        // Insert into tbpurchaseinvoice
        $sql2 = "INSERT INTO tbinvoice (grandtotal,discount,isSuccess,completeddate,soid,paidamount,invoicecode) 
        VALUES ('$grandTotal','$dis','1','$comdate','$insertedPurchaseOrderID','$paidAmount','$picode')";
        if ($conn->query($sql2) !== true) {
            echo 'Error: ' . $sql2 . '<br>' . $conn->error;
            exit();
        }

        }else{

        // Insert into tbpurchaseinvoice
        $sql2 = "INSERT INTO tbinvoice (grandtotal,discount,isSuccess,completeddate,soid,paidamount,invoicecode) 
        VALUES ('$grandTotal','$dis','0','$comdate','$insertedPurchaseOrderID','$paidAmount','$picode')";
        if ($conn->query($sql2) !== true) {
            echo 'Error: ' . $sql2 . '<br>' . $conn->error;
            exit();
        }
            
        }

        // // Insert into tbpurchaseinvoice
        // $sql2 = "INSERT INTO tbinvoice (grandtotal,discount,isSuccess,completeddate,soid,paidamount,invoicecode) 
        // VALUES ('$grandTotal','$dis','$isPaid','$comdate','$insertedPurchaseOrderID','$paidAmount','$picode')";
        // if ($conn->query($sql2) !== true) {
        //     echo 'Error: ' . $sql2 . '<br>' . $conn->error;
        //     exit();
        // }

        echo 'success';
    } else {
        echo 'Error: ' . $insertPurchaseOrderSQL . '<br>' . $conn->error;
    }
}
?>