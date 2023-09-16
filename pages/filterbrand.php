<?php
require_once '../includes/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brandName = $_POST['brandName'];

    // SQL query to filter brand data based on the entered brand name
    $sql = "SELECT * FROM tbbrand WHERE brandname LIKE '%$brandName%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['brandname'] . "</td>";
            echo "<td>" . $row['branddesciption'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No brands found</td></tr>";
    }
}

?>