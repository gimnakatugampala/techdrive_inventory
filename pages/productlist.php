<?php
require_once '../includes/db_config.php';

$sql = 'SELECT tbproduct.id,tbproduct.productname,tbproduct.minquanity,tbproduct.warrenty,tbcategory.catname,tbsubcategory.subcatname,tbbrand.brandname,tbproduct.buyingprice,tbproduct.avlid,tbproduct.quantity,tbproduct.sellingprice,tbproduct.catid,tbproduct.scatid,tbproduct.bid FROM tbproduct INNER JOIN tbcategory ON tbproduct.catid = tbcategory.id INNER JOIN tbsubcategory ON tbproduct.scatid = tbsubcategory.id INNER JOIN tbbrand ON tbproduct.bid = tbbrand.id where tbproduct.isdeleted = 0 ORDER BY adddate DESC';
$result = $conn->query( $sql );

$plist = array();

if ( $result->num_rows > 0 ) {
    while ( $row = $result->fetch_assoc() ) {
        $plist[] = $row;
    }
}

// echo json_encode( $plist );
?>
