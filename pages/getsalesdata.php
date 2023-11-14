<?php
require_once '../includes/db_config.php';

$code = $_POST['code'];

$sql = "SELECT * FROM tbsalesorder WHERE socode = '$code'";
$result = $conn->query( $sql );

$result = $conn->query( $sql );

// Get the Sales Order ID
if ( $result->num_rows > 0 ) {
    $id = $result->fetch_assoc();
}


// Get the Customer & Sales Invoice
$sqlsales = "SELECT *,tbinvoice.discount AS DIS FROM tbsalesorder 
JOIN tbcustomer ON tbsalesorder.cusid = tbcustomer.id
JOIN tbinvoice ON tbsalesorder.id = tbinvoice.soid WHERE tbsalesorder.socode = '$code'";

$resultsales = $conn->query( $sqlsales );

$salesorders = array();
if ( $resultsales->num_rows > 0 ) {
    while ( $row = $resultsales->fetch_assoc() ) {
        $salesorders[] = $row;
    }
}

// Product Items List
$sqlproductlist = "SELECT *,tborderitem.quantity AS QTY FROM tborderitem 
JOIN tbproduct ON tborderitem.pid = tbproduct.id
WHERE tborderitem.salesorderid = $id[id]";

$resultprolist = $conn->query( $sqlproductlist );

$productlist = array();

if ( $resultprolist->num_rows > 0 ) {
    while ( $row = $resultprolist->fetch_assoc() ) {
        $productlist[] = $row;
    }
}

echo json_encode( [
    "ID"=>$id,
    "SalesOrder"=>$salesorders,
    "Productlists"=>$productlist
    ] );
?>
