<?php
require_once '../includes/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $catname = $_POST['catname'];
    $catdis = $_POST['catdis'];

    $datetime = date("Y-m-d H:i:s");
    $min = 1;
    $max = 1000000;

    $catcode = rand($min, $max);

    $sql = "INSERT INTO tbcategory (catname, catadddate, catdescription, isdeleted,catcode) VALUES ('$catname', '$datetime', '$catdis','0','$catcode')";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>