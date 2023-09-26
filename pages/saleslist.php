<?php
require_once '../includes/db_config.php';

$sql = 'SELECT tbcustomer.id,tbcustomer.cusname,tbsalesorder.socode,tbinvoice.paidamount,tbsalesorder.salesorderdate,tbsalesorder.sid,tbinvoice.grandtotal,tbinvoice.topaid,tbinvoice.discount,tbsalesorder.paidstatusid FROM tbsalesorder INNER JOIN tbcustomer ON tbsalesorder.cusid = tbcustomer.id INNER JOIN tbinvoice ON tbsalesorder.id = tbinvoice.soid where tbsalesorder.isdeleted = 0';
$result = $conn->query( $sql );

$plist = array();

if ( $result->num_rows > 0 ) {
    while ( $row = $result->fetch_assoc() ) {
        $plist[] = $row;
    }
}

echo json_encode( $plist );
?>
