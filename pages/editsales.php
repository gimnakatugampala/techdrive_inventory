<?php
require_once '../includes/db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode($_POST['data'], true);
    $olditems = json_decode($_POST['oldorderitems'], true);
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

     // Cancel Order Date
     if($progressstatus == "3"){
        $comdate = date('Y-m-d H:i:s');
    }

    $salesorderdate = date('Y-m-d H:i:s');
    $createddate = date('Y-m-d H:i:s');

    // $insertPurchaseOrderSQL = "INSERT INTO tbsalesorder (socode, cusid , sid ,paidstatusid,salesorderdate,isquotation) VALUES ('$socode', '$selectSup', '$progressstatus', '$selectPS', '$salesorderdate',0)";

    $updatesalesOrderSQL = "UPDATE tbsalesorder SET 
    cusid = '$selectSup',
    sid = '$progressstatus',
    paidstatusid = '$selectPS',
    salesorderdate = '$salesorderdate',
    isquotation = 0
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


            if($progressstatus == "1"){

                // Update the New Product Quantity
                $query = "SELECT quantity FROM tbproduct WHERE id = $product";
                $result = $conn->query($query);
    
                if ($result->num_rows > 0) {
                    $current_quantity = $result->fetch_assoc()['quantity'];
                    $new_quantity = $current_quantity - $quantity;
    
                    // Update the database with the new quantity
                    $update_query = "UPDATE tbproduct SET quantity = $new_quantity WHERE id = $product";
    
                    if ($conn->query($update_query) === TRUE) {
                        // echo "sucess";
                    } else {
                        echo "Error updating quantity: " . $conn->error;
                    }
                }
    
                // Update the New Product Quantity
    
                }

            $sql = "INSERT INTO tborderitem (pid,salesorderid,quantity,price,discount) VALUES ('$product', '$soid', '$quantity', '$price', '$discount')";
            if ($conn->query($sql) !== true) {
                echo 'Error: ' . $sql . '<br>' . $conn->error;
                exit();
            }
        }

        if($progressstatus == "1" && $selectPS == "3"){

        // Insert into tbpurchaseinvoice
        $sql2 = "UPDATE tbinvoice SET 
        grandtotal = '$grandTotal',
        discount = '$dis',
        isSuccess = '1',
        paidamount = '$paidAmount',
        completeddate = '$comdate'
        WHERE id = '$piid'";
        if ($conn->query($sql2) !== true) {
            echo 'Error: ' . $sql2 . '<br>' . $conn->error;
            exit();
        }

        }else if($progressstatus == "3"){

        // Insert into tbpurchaseinvoice
        $sql2 = "UPDATE tbinvoice SET 
        grandtotal = '$grandTotal',
        discount = '$dis',
        isSuccess = '0',
        paidamount = '$paidAmount',
        completeddate = '$comdate'
        WHERE id = '$piid'";
        if ($conn->query($sql2) !== true) {
            echo 'Error: ' . $sql2 . '<br>' . $conn->error;
            exit();
        }

        }else{
        

        // Insert into tbpurchaseinvoice
        $sql2 = "UPDATE tbinvoice SET 
        grandtotal = '$grandTotal',
        discount = '$dis',
        isSuccess = '0',
        paidamount = '$paidAmount'
        WHERE id = '$piid'";

        if ($conn->query($sql2) !== true) {
            echo 'Error: ' . $sql2 . '<br>' . $conn->error;
            exit();
        }
            
        }

           // ----------------------- SEND THE EMAIL TO THE CUSTOMER - QR CODE, LINK, PDF -------------
           $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
           $host = $_SERVER['HTTP_HOST'];
           $Url = "{$protocol}://{$host}" . dirname($_SERVER['PHP_SELF'], 2);
   
           // CHECK IF THE STATUS TO SEND THE DIFFRENT EMAIL TEMPLATE
           if($progressstatus == "1"){
   
           // -- SEND A GET REQUEST TO THE PDF MAKER ( SOCODE, TYPE, ACTION )
           $getUrl = $Url . "/utils/pdf_maker.php?MST_ID=$socode&ACTION=EMAIL_STATUS&TYPE=SO_COMPLETED&QRCODE=$qrcode";
   
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
   
   
           }else if($progressstatus == "2"){
   
               // -- SEND A GET REQUEST TO THE PDF MAKER ( SOCODE, TYPE, ACTION )
               $getUrl = $Url . "/utils/pdf_maker.php?MST_ID=$socode&ACTION=EMAIL_STATUS&TYPE=SO_INPROGRESS&QRCODE=$qrcode";
   
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
   
           }else if($progressstatus == "3"){
               
           // -- SEND A GET REQUEST TO THE PDF MAKER ( SOCODE, TYPE, ACTION )
           $getUrl = $Url . "/utils/pdf_maker.php?MST_ID=$socode&ACTION=EMAIL_STATUS&TYPE=SO_CANCELED&QRCODE=$qrcode";
   
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
   
           }
   // ----------------------- SEND THE EMAIL TO THE CUSTOMER - QR CODE, LINK, PDF -------------


        // echo 'success';
    } else {
        echo 'Error: ' . $updatesalesOrderSQL . '<br>' . $conn->error;
    }
}
?>