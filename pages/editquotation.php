<?php
require_once '../includes/db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode($_POST['data'], true);
    $olditems = json_decode($_POST['oldorderitems'], true);
    $selectSup = $_POST['selectSup'];
    // $selectPS = $_POST['selectPS'];
    // $progressstatus = $_POST['progressstatus'];
    // $paidAmount = $_POST['paidAmount'];
    $purchaseDate = $_POST['purchaseDate'];
    $isPaid = $_POST['isPaid'];
    $grandTotal = $_POST['grandTotal'];
    // $topaid = $_POST['topaid'];
    $dis = $_POST['dis'];
    $completeddate = $_POST['completeddate'];
    $soid = $_POST['soid'];
    $piid = $_POST['piid'];
    $socode = $_POST['socode'];
    $qrcode = $_POST['qrcode'];

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

    $updatesalesOrderSQL = "UPDATE tbsalesorder SET 
    cusid = '$selectSup',
    salesorderdate = '$purchaseDate'
    WHERE
    id = '$soid'
    ";

    if ($conn->query($updatesalesOrderSQL) === true) {
        $updatesalesOrderSQL = $conn->insert_id; // Get the ID of the inserted row

        // DELETE ORDER ITEMS
        foreach ($olditems as $row) {
            $product = $row['pid'];
            $quantity = $row['quantity'];
            $price = $row['price'];
            $discount = $row['discount'];

            $delsql = "DELETE FROM tborderitem WHERE pid = '$product' AND
            salesorderid = '$soid'";
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

            $sql = "INSERT INTO tborderitem (pid,salesorderid,quantity,price,discount) VALUES ('$product', '$soid', '$quantity', '$price', '$discount')";
            if ($conn->query($sql) !== true) {
                echo 'Error: ' . $sql . '<br>' . $conn->error;
                exit();
            }
        }

        // if($progressstatus == "1"){

        // // Insert into tbpurchaseinvoice
        // $sql2 = "UPDATE tbinvoice SET 
        // grandtotal = '$grandTotal',
        // discount = '$dis',
        // isSuccess = '1',
        // -- paidamount = '$paidAmount',
        // completeddate = '$comdate'
        // WHERE id = '$piid'";
        // if ($conn->query($sql2) !== true) {
        //     echo 'Error: ' . $sql2 . '<br>' . $conn->error;
        //     exit();
        // }

        // }else{

        // Insert into tbpurchaseinvoice
        $sql2 = "UPDATE tbinvoice SET 
        grandtotal = '$grandTotal',
        discount = '$dis',
        isSuccess = '0'
        WHERE id = '$piid'";

        if ($conn->query($sql2) !== true) {
            echo 'Error: ' . $sql2 . '<br>' . $conn->error;
            exit();
        }

        // ----------------------- SEND THE EMAIL TO THE CUSTOMER - QR CODE, LINK, PDF -------------
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
        $host = $_SERVER['HTTP_HOST'];
        $Url = "{$protocol}://{$host}" . dirname($_SERVER['PHP_SELF'], 2);

        // CHECK IF THE STATUS TO SEND THE DIFFRENT EMAIL TEMPLATE

        // -- SEND A GET REQUEST TO THE PDF MAKER ( SOCODE, TYPE, ACTION )
        $getUrl = $Url . "/utils/pdf_maker.php?MST_ID=$socode&ACTION=EMAIL_STATUS&TYPE=QUO&QRCODE=$qrcode";

        // Initialize cURL session
        $ch = curl_init($getUrl);

        // Set cURL options
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute cURL session and get the response
        $response = curl_exec($ch);

        // Close cURL session
        curl_close($ch);

        // Output the response (you might want to process or manipulate it)
        if ($response == false) {
            // Handle cURL error
            echo 'cURL error: ' . curl_error($ch);
        } else {
            // Process the response
            echo $response;
        }
            
  


        // echo 'success';
    } else {
        echo 'Error: ' . $updatesalesOrderSQL . '<br>' . $conn->error;
    }
}
?>