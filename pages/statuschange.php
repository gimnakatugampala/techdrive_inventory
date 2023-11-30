<?php 

require_once '../includes/db_config.php';

// Cancel Sales Order
if(isset($_POST["CancelSO"])){

    $socode = $_POST['pocode'];
    $com_date = date('Y-m-d H:i:s');

    // 

    $sql = "UPDATE tbsalesorder SET sid = 3 WHERE socode = '$socode'";
    if ($conn->query($sql) === TRUE) {
        // echo "success";
        $sql = "UPDATE tbinvoice SET sid = 3 WHERE socode = '$socode'";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}


// Complete Sales Order
if(isset($_POST["CompletedSO"])){

    $socode = $_POST['pocode'];

    $sql = "UPDATE tbsalesorder SET sid = 1 WHERE socode = '$socode'";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}




?>