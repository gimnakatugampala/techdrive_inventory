<?php
require_once '../includes/db_config.php';

$sql = 'SELECT * FROM tbbrand where isdeleted = 0';
$result = $conn->query( $sql );

$brands = array();

if ( $result->num_rows > 0 ) {
    while ( $row = $result->fetch_assoc() ) {
        $brands[] = $row;
    }
}

// echo json_encode( $brands );
?>
