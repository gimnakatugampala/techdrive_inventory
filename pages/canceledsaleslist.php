<?php
require_once '../includes/db_config.php';

$sql = 'SELECT * from tbsalesorder 
JOIN tbcustomer ON tbsalesorder.cusid = tbcustomer.id
JOIN tbinvoice ON tbsalesorder.id = tbinvoice.soid WHERE tbsalesorder.sid = 3 AND tbsalesorder.paidstatusid != 4 ORDER BY tbsalesorder.created_date DESC';
$result = $conn->query( $sql );

$cancellist = array();

if ( $result->num_rows > 0 ) {
    while ( $row = $result->fetch_assoc() ) {
        $cancellist[] = $row;
    }
}

// echo json_encode( $cancellist );
?>
