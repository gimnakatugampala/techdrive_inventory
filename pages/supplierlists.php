<?php
require_once '../includes/db_config.php';

$sql = 'SELECT * FROM tbsupplier where isdeleted = 0';
$result = $conn->query( $sql );

$cus = array();

if ( $result->num_rows > 0 ) {
    while ( $row = $result->fetch_assoc() ) {
        $cus[] = $row;
    }
}

// echo json_encode( $cus );
?>
