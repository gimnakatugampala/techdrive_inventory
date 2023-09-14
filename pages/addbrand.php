<?php
require_once '../includes/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brandName = $_POST['brandName'];
    $description = $_POST['description'];

    $datetime = date("Y-m-d H:i:s");
    $min = 1; // Minimum value
    $max = 1000000; // Maximum value

    $brandcode = rand($min, $max);

    // Perform the brand insertion query
    $sql = "INSERT INTO tbbrand (brandname, brandadddate, branddesciption, barndcode) VALUES ('$brandName', '$datetime', '$description', '$brandcode')";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>