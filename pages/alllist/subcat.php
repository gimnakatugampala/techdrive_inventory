<?php
require_once '../../includes/db_config.php';

$sql = "SELECT id, subcatname FROM tbsubcategory where isdeleted = 0";
$result = $conn->query($sql);

$subcategorydata = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $subcategorydata[] = $row;
    }
}
echo json_encode($subcategorydata);

?>