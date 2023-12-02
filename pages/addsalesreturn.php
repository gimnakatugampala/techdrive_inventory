<?php
require_once '../includes/db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode($_POST['data'], true);
    $selectPro = $_POST['selectPro'];
    $selectSup = $_POST['selectSup'];
    // $selectPS = $_POST['selectPS'];
    $progressstatus = $_POST['progressstatus'];
    $description = $_POST['description'];
    $purchaseDate = $_POST['purchaseDate'];
    $isPaid = $_POST['isPaid'];
    $grandTotal = $_POST['grandTotal'];
    // $topaid = $_POST['topaid'];
    $dis = $_POST['dis'];
    $completeddate = $_POST['completeddate'];
    $socode = $_POST['srcode'];
    $picode = $_POST['sricode'];

    $comdate = '';
    if ($completeddate == '1') {
        $comdate = date('Y-m-d H:i:s');
    } else {
        $comdate = '';
    }

    if($progressstatus == "3"){
        $comdate = date('Y-m-d H:i:s');
    }

    $salesorderdate = date('Y-m-d H:i:s');
    $createddate = date('Y-m-d H:i:s');



    $insertPurchaseOrderSQL = "INSERT INTO tbsalesorderreturn (sorcode, cusid , sid ,salesorderreturndate,description) VALUES ('$socode', '$selectSup', '$progressstatus', '$salesorderdate','$description')";

    if ($conn->query($insertPurchaseOrderSQL) === true) {
        $insertedPurchaseOrderID = $conn->insert_id; // Get the ID of the inserted row
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
                    $new_quantity = $current_quantity + $quantity;
    
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

            $sql = "INSERT INTO tbsalesorderreturnitem (pid,sales_order_return_id,quantity,price,discount) VALUES ('$product', '$insertedPurchaseOrderID', '$quantity', '$price', '$discount')";
            if ($conn->query($sql) !== true) {
                echo 'Error: ' . $sql . '<br>' . $conn->error;
                exit();
            }
        }

        if($progressstatus == "1"){

        // Insert into tbpurchaseinvoice
        $sql2 = "INSERT INTO tbsalesreturninvoice (grandtotal,discount,isSuccess,completeddate,salesorid,invoicecode) 
        VALUES ('$grandTotal','$dis','1','$comdate','$insertedPurchaseOrderID','$picode')";
        if ($conn->query($sql2) !== true) {
            echo 'Error: ' . $sql2 . '<br>' . $conn->error;
            exit();
        }

        }else{

        // Insert into tbpurchaseinvoice
        $sql2 = "INSERT INTO tbsalesreturninvoice (grandtotal,discount,isSuccess,completeddate,salesorid,invoicecode) 
        VALUES ('$grandTotal','$dis','0','$comdate','$insertedPurchaseOrderID','$picode')";
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
        $getUrl = $Url . "/utils/pdf_maker.php?MST_ID=$socode&ACTION=EMAIL_STATUS&TYPE=SOR_COMPLETED";

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
            $getUrl = $Url . "/utils/pdf_maker.php?MST_ID=$socode&ACTION=EMAIL_STATUS&TYPE=SOR_INPROGRESS";

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
        $getUrl = $Url . "/utils/pdf_maker.php?MST_ID=$socode&ACTION=EMAIL_STATUS&TYPE=SOR_CANCELED";

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

    

        // echo 'success';
    } else {
        echo 'Error: ' . $insertPurchaseOrderSQL . '<br>' . $conn->error;
    }
}
?>