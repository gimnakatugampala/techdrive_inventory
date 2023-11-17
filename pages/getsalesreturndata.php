<?php
require_once '../includes/db_config.php';

$code = $_POST['code'];

$sql = "SELECT * FROM tbsalesorderreturn WHERE sorcode = '$code'";
$result = $conn->query( $sql );

// Get the Sales Order ID
if ( $result->num_rows > 0 ) {
    $id = $result->fetch_assoc();
}


// Get the Customer & Sales Invoice
$sqlsales = "SELECT *,tbsalesreturninvoice.discount AS DIS FROM tbsalesorderreturn 
JOIN tbcustomer ON tbsalesorderreturn.cusid = tbcustomer.id
JOIN tbsalesreturninvoice ON tbsalesorderreturn.id = tbsalesreturninvoice.salesorid WHERE tbsalesorderreturn.sorcode = '$code'";

$resultsales = $conn->query( $sqlsales );

$salesorders = array();
if ( $resultsales->num_rows > 0 ) {
    while ( $row = $resultsales->fetch_assoc() ) {
        $salesorders[] = $row;
    }
}

// Product Items List
$sqlproductlist = "SELECT *,tbsalesorderreturnitem.quantity AS QTY FROM tbsalesorderreturnitem 
JOIN tbproduct ON tbsalesorderreturnitem.pid = tbproduct.id
WHERE tbsalesorderreturnitem.sales_order_return_id = $id[id]";

$resultprolist = $conn->query( $sqlproductlist );

$productlist = array();

if ( $resultprolist->num_rows > 0 ) {
    while ( $row = $resultprolist->fetch_assoc() ) {
        $productlist[] = $row;
    }
}

echo json_encode( [
    "ID"=>$id,
    "SalesOrderReturns"=>$salesorders,
    "Productlists"=>$productlist
    ] );
?>
