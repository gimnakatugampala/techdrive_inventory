<?php 

require_once '../includes/db_config.php';

// Cancel Sales Order
if(isset($_POST["CancelSO"])){
  
    $socode = $_POST['socode'];
    $com_date = date('Y-m-d H:i:s');

    $sql = "SELECT * FROM `tbsalesorder` WHERE socode='$socode'";
    $result = $conn->query( $sql );
    $id;
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            // print_r($row);
        }
  
    // Sales Order ID
    // echo $id;

  

    // UPDATE SALES ORDER
    $so_sql = "UPDATE tbsalesorder SET sid=3,paidstatusid=1 WHERE id='$id'";

    if ($conn->query($so_sql) === TRUE) {


    // ---------------------  UPDATE INVOICE -------------
    $inv_sql = "UPDATE tbinvoice SET completeddate='$com_date' WHERE soid='$id'";

    if ($conn->query($inv_sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $inv_sql . "<br>" . $conn->error;
    }
    // ---------------------  UPDATE INVOICE -------------

    } else {
        echo "Error: " . $so_sql . "<br>" . $conn->error;
    }


}


// Complete Sales Order
if(isset($_POST["CompletedSO"])){

    
    $socode = $_POST['socode'];
    $com_date = date('Y-m-d H:i:s');

    $sql = "SELECT * FROM `tbsalesorder` WHERE socode='$socode'";
    $result = $conn->query( $sql );
    $id;
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            // print_r($row);
        }
  
    // Sales Order ID
    // echo $id;

  

    // UPDATE SALES ORDER
    $so_sql = "UPDATE tbsalesorder SET sid=1,paidstatusid=3 WHERE id='$id'";

    if ($conn->query($so_sql) === TRUE) {


    // ---------------------  UPDATE INVOICE -------------
    $inv_sql = "UPDATE tbinvoice SET completeddate='$com_date', isSuccess=1 WHERE soid='$id'";

    if ($conn->query($inv_sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $inv_sql . "<br>" . $conn->error;
    }
    // ---------------------  UPDATE INVOICE -------------

    } else {
        echo "Error: " . $so_sql . "<br>" . $conn->error;
    }

}

// Convert Quotation to Sales Order
if(isset($_POST["ConvertQO"])){

    $socode = $_POST['socode'];

    $sql = "UPDATE tbsalesorder SET sid=2,paidstatusid=1,isquotation=0 WHERE socode='$socode'";

    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}




?>