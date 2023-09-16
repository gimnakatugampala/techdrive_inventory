<?php
require_once '../includes/db_config.php';

$sql = "SELECT id, catname FROM tbcategory where isdeleted = 0";
$result = $conn->query($sql);

// Prepare an array to store the category data
$categoryData = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categoryData[] = $row;
    }
}
echo json_encode($categoryData);

?>