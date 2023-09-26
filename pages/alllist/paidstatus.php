<?php
require_once '../../includes/db_config.php';

$sql = "SELECT * FROM tbpaidstatus";
$result = $conn->query($sql);

$catdata = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $catdata[] = $row;
    }
}
echo json_encode($catdata);

?>