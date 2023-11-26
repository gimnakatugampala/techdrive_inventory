<?php 

require_once '../includes/db_config.php';

// Cancel Sales Order
if(isset($_POST["CancelSO"])){

    $socode = $_POST['pocode'];

    $sql = "UPDATE tbsalesorder SET sid = 3 WHERE socode = '$socode'";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}


// Complete Sales Order





?>