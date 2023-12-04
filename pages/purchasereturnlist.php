<?php
require_once '../includes/db_config.php';

$sql = 'SELECT * FROM tbpurchaseorderreturn 
JOIN  tbsupplier ON tbpurchaseorderreturn.supid = tbsupplier.id
JOIN tbpurchaseorderreturninvoice ON tbpurchaseorderreturn.id = tbpurchaseorderreturninvoice.porid WHERE tbpurchaseorderreturn.sid != 4 ORDER BY tbpurchaseorderreturn.generated_date DESC';
$result = $conn->query( $sql );

$porlist = array();

if ( $result->num_rows > 0 ) {
    while ( $row = $result->fetch_assoc() ) {
        $porlist[] = $row;
    }
}

// echo json_encode( $porlist );
?>
