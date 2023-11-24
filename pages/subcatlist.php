<?php
require_once '../includes/db_config.php';

$sql = 'SELECT tbsubcategory.id,tbcategory.catname,tbsubcategory.subcatname ,tbsubcategory.subcatcode,tbsubcategory.cid FROM tbsubcategory INNER JOIN tbcategory ON tbsubcategory.cid = tbcategory.id where tbsubcategory.isdeleted = 0;';
$result = $conn->query( $sql );

$subcats = array();

if ( $result->num_rows > 0 ) {
    while ( $row = $result->fetch_assoc() ) {
        $subcats[] = $row;
    }
}

// echo json_encode( $subcats );
?>
