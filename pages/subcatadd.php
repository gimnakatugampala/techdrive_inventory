<?php
require_once '../includes/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subcatname = $_POST['subcatname'];
    $cid = $_POST['cid'];

    $datetime = date("Y-m-d H:i:s");
    $min = 1; // Minimum value
    $max = 10000000000; // Maximum value

    $subcatcode = rand($min, $max);

    // Perform the brand insertion query
    $sql = "INSERT INTO tbsubcategory (subcatname, subcatadddate,isdeleted, subcatcode,cid) VALUES ('$subcatname', '$datetime',0, '$subcatcode','$cid')";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>