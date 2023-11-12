<?php
require_once '../includes/db_config.php';

$sql = 'SELECT * FROM tbpurchaseorder 
JOIN  tbsupplier ON tbpurchaseorder.supid = tbsupplier.id
JOIN tbpurchaseinvoice ON tbpurchaseorder.id = tbpurchaseinvoice.poid WHERE tbpurchaseorder.paid_status != 4 AND tbpurchaseorder.statusid != 4 ORDER BY tbpurchaseorder.created_date DESC';
$result = $conn->query( $sql );

$plist = array();

if ( $result->num_rows > 0 ) {
    while ( $row = $result->fetch_assoc() ) {
        $plist[] = $row;
    }
}

echo json_encode( $plist );
?>
