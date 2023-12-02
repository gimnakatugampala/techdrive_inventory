<?php
require_once '../includes/db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode($_POST['data'], true);
    $selectPro = $_POST['selectPro'];
    $selectSup = $_POST['selectSup'];
    $selectPS = $_POST['selectPS'];
    $progressstatus = $_POST['progressstatus'];
    $paidAmount = $_POST['paidAmount'];
    $purchaseDate = date($_POST['quotationdate']);
    $isPaid = $_POST['isPaid'];
    $grandTotal = $_POST['grandTotal'];
    $topaid = $_POST['topaid'];
    $dis = $_POST['dis'];
    $completeddate = $_POST['completeddate'];
    $socode = $_POST['qocode'];
    $picode = $_POST['qicode'];

    $comdate = '';
    if ($completeddate == '1') {
        $comdate = date('Y-m-d H:i:s');
    } else {
        $comdate = '';
    }

    $salesorderdate = date('Y-m-d H:i:s');
    $createddate = date('Y-m-d H:i:s');

    // QR CODE GENERATION PART
    require_once '../utils/qrcode_generator.php';

    $insertPurchaseOrderSQL = "INSERT INTO tbsalesorder (qr_img, socode, cusid , sid ,paidstatusid,salesorderdate,isquotation) VALUES 
    ('$qrcode','$socode', '$selectSup', '$progressstatus', '$selectPS', '$purchaseDate',1)";

    if ($conn->query($insertPurchaseOrderSQL) === true) {
        $insertedPurchaseOrderID = $conn->insert_id; // Get the ID of the inserted row
        foreach ($data as $row) {
            $product = $row['product'];
            $quantity = $row['quantity'];
            $price = $row['price'];
            $discount = $row['discount'];

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
        echo 'Error: ' . $insertPurchaseOrderSQL . '<br>' . $conn->error;
    }
}
?>