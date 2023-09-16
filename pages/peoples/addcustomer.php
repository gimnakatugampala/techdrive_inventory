<?php
require_once '../../includes/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cusname = $_POST['cusname'];
    $cusemail = $_POST['cusemail'];
    $cusphone = $_POST['cusphone'];
    $cusaddress = $_POST['cusaddress'];

    $datetime = date("Y-m-d H:i:s");
    $min = 1;
    $max = 1000000;

    $cuscode = rand($min, $max);

    $sql = "INSERT INTO tbcustomer (cusname, cusemail, cusaddress, cusphone,cusadddate,isdeleted,cuscode) VALUES ('$cusname', '$cusemail', '$cusaddress','$cusphone','$datetime','0','$cuscode')";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>