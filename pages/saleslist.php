<?php
require_once '../includes/db_config.php';

$sql = 'SELECT * from tbsalesorder 
JOIN tbcustomer ON tbsalesorder.cusid = tbcustomer.id
JOIN tbinvoice ON tbsalesorder.id = tbinvoice.soid WHERE tbsalesorder.sid != 4 AND tbsalesorder.paidstatusid != 4';
$result = $conn->query( $sql );

$plist = array();

if ( $result->num_rows > 0 ) {
    while ( $row = $result->fetch_assoc() ) {
        $plist[] = $row;
    }
}

echo json_encode( $plist );
?>
