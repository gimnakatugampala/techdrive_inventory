<?php
require_once '../includes/db_config.php';

$sql = 'SELECT * from tbsalesorderreturn 
JOIN tbcustomer ON tbsalesorderreturn.cusid = tbcustomer.id
JOIN tbsalesreturninvoice ON tbsalesorderreturn.id = tbsalesreturninvoice.salesorid WHERE tbsalesorderreturn.sid != 4 ORDER BY tbsalesorderreturn.salesorderreturndate DESC';
$result = $conn->query( $sql );

$plist = array();

if ( $result->num_rows > 0 ) {
    while ( $row = $result->fetch_assoc() ) {
        $plist[] = $row;
    }
}

echo json_encode( $plist );
?>
