<?php
require_once '../includes/db_config.php';

$sql = 'SELECT * from tbsalesorder 
JOIN tbcustomer ON tbsalesorder.cusid = tbcustomer.id
JOIN tbinvoice ON tbsalesorder.id = tbinvoice.soid WHERE tbsalesorder.sid = 2 AND tbsalesorder.paidstatusid != 4 ORDER BY tbsalesorder.salesorderdate DESC';
$result = $conn->query( $sql );

$pendinglist = array();

if ( $result->num_rows > 0 ) {
    while ( $row = $result->fetch_assoc() ) {
        $pendinglist[] = $row;
    }
}

echo json_encode( $pendinglist );
?>
