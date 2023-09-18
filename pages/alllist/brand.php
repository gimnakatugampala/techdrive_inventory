<?php
require_once '../../includes/db_config.php';

$sql = "SELECT id, brandname FROM tbbrand where isdeleted = 0";
$result = $conn->query($sql);

$branddata = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $branddata[] = $row;
    }
}
echo json_encode($branddata);

?>