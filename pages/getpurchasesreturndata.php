<?php
require_once '../includes/db_config.php';

$code = $_POST['code'];

$sql = "SELECT * FROM tbpurchaseorderreturn WHERE porcode = '$code'";
$result = $conn->query( $sql );

$result = $conn->query( $sql );

// Get the Sales Order ID
if ( $result->num_rows > 0 ) {
    $id = $result->fetch_assoc();
}


// Get the Customer & Sales Invoice
$sqlpurchases = "SELECT *,tbpurchaseorderreturninvoice.discount AS DIS FROM tbpurchaseorderreturn 
JOIN tbsupplier ON tbpurchaseorderreturn.supid = tbsupplier.id
JOIN tbpurchaseorderreturninvoice ON tbpurchaseorderreturn.id = tbpurchaseorderreturninvoice.id WHERE tbpurchaseorderreturn.porcode = '$code'";

$resultpurchasereturns = $conn->query( $sqlpurchases );

$purchaseorderreturns = array();

if ( $resultpurchasereturns->num_rows > 0 ) {
    while ( $row = $resultpurchasereturns->fetch_assoc() ) {
        $purchaseorderreturns[] = $row;
    }
}

// Product Items List
$sqlproductlist = "SELECT *,tbpurchaseorderreturnitem.qty AS QTY FROM tbpurchaseorderreturnitem 
JOIN tbproduct ON tbpurchaseorderreturnitem.product_id = tbproduct.id
WHERE tbpurchaseorderreturnitem.porid = $id[id]";

$resultprolist = $conn->query( $sqlproductlist );

$productlist = array();

if ( $resultprolist->num_rows > 0 ) {
    while ( $row = $resultprolist->fetch_assoc() ) {
        $productlist[] = $row;
    }
}

echo json_encode( [
    "ID"=>$id,
    "PurchaseOrderRetrun"=>$purchaseorderreturns,
    "Productlists"=>$productlist
    ] );
?>
