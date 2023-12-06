<?php
require_once '../../includes/db_config.php';

$sql = "SELECT id, name FROM tbavailability ";
$result = $conn->query($sql);

$availability = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $availability[] = $row;
    }
}
echo json_encode($availability);

?>