<?php
require_once '../includes/db_config.php';

$sql = 'SELECT * FROM tbcategory where isdeleted = 0';
$result = $conn->query( $sql );

$cats = array();

if ( $result->num_rows > 0 ) {

    
    while ( $row = $result->fetch_assoc() ) {
        $cats[] = $row;
    }
}

echo json_encode( $cats );
?>


