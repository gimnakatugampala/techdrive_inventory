<?php
require_once '../includes/db_config.php';

$code  = htmlspecialchars($_GET['code']);

print_r($code);

$sql = "SELECT * FROM tbpurchaseorderreturn WHERE porcode = '$code'";
$result = $conn->query( $sql );

// Get the Purchase Return Order ID
if ( $result->num_rows > 0 ) {
    $id = $result->fetch_assoc();
}

// Get the Supplier & Purchase Invoice
$sqlpurchases = "SELECT *,tbpurchaseorderreturninvoice.discount AS DIS FROM tbpurchaseorderreturn 
JOIN tbsupplier ON tbpurchaseorderreturn.supid = tbsupplier.id
JOIN tbpurchaseorderreturninvoice ON tbpurchaseorderreturn.id = tbpurchaseorderreturninvoice.porid WHERE tbpurchaseorderreturn.porcode = '$code'";

$resultpurchases = $conn->query( $sqlpurchases );

$purchasesordersreturns = array();
if ( $resultpurchases->num_rows > 0 ) {
    while ( $row = $resultpurchases->fetch_assoc() ) {
        $purchasesordersreturns[] = $row;
    }
}


// echo json_encode( $purchasesordersreturns );


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


// echo json_encode( $productlist );

?>
