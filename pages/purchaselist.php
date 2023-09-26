<?php
require_once '../includes/db_config.php';

$sql = 'SELECT tbsupplier.id,tbsupplier.supname,tbpurchaseorder.pocode,tbpurchaseinvoice.paidamount,tbpurchaseorder.createdate,tbpurchaseorder.statusid,tbpurchaseinvoice.grandtotal,tbpurchaseinvoice.tobepaid,tbpurchaseinvoice.discount,tbpurchaseorder.paidstatusid FROM tbpurchaseorder INNER JOIN tbsupplier ON tbpurchaseorder.supid = tbsupplier.id INNER JOIN tbpurchaseinvoice ON tbpurchaseorder.id = tbpurchaseinvoice.poid where tbpurchaseorder.isdeleted = 0';
$result = $conn->query( $sql );

$plist = array();

if ( $result->num_rows > 0 ) {
    while ( $row = $result->fetch_assoc() ) {
        $plist[] = $row;
    }
}

echo json_encode( $plist );
?>
