<?php
require_once '../includes/db_config.php';

$code = $_POST['code'];

$sql = "SELECT * FROM tbpurchaseorder WHERE pocode = '$code'";
$result = $conn->query( $sql );

$result = $conn->query( $sql );

// Get the Sales Order ID
if ( $result->num_rows > 0 ) {
    $id = $result->fetch_assoc();
}


// Get the Customer & Sales Invoice
$sqlpurchases = "SELECT *,tbpurchaseinvoice.discount AS DIS FROM tbpurchaseorder 
JOIN tbsupplier ON tbpurchaseorder.supid = tbsupplier.id
JOIN tbpurchaseinvoice ON tbpurchaseorder.id = tbpurchaseinvoice.poid WHERE tbpurchaseorder.pocode = '$code'";

$resultpurchases = $conn->query( $sqlpurchases );

$purchaseorders = array();

if ( $resultpurchases->num_rows > 0 ) {
    while ( $row = $resultpurchases->fetch_assoc() ) {
        $purchaseorders[] = $row;
    }
}

// Product Items List
$sqlproductlist = "SELECT *,tbpurchaseorderitem.qty AS QTY FROM tbpurchaseorderitem 
JOIN tbproduct ON tbpurchaseorderitem.product_id = tbproduct.id
WHERE tbpurchaseorderitem.poid = $id[id]";

$resultprolist = $conn->query( $sqlproductlist );

$productlist = array();

if ( $resultprolist->num_rows > 0 ) {
    while ( $row = $resultprolist->fetch_assoc() ) {
        $productlist[] = $row;
    }
}

echo json_encode( [
    "ID"=>$id,
    "PurchaseOrder"=>$purchaseorders,
    "Productlists"=>$productlist
    ] );
?>
