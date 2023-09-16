<?php
require_once '../../includes/db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $supname = $_POST['supname'];
    $supemail = $_POST['supemail'];
    $supphone = $_POST['supphone'];
    $supaddress = $_POST['supaddress'];

    $min = 1;
    $max = 1000000;

    $supcode = rand($min, $max);

    $sql = "INSERT INTO tbsupplier (supname,  supaddress,supemail, supphone,isdeleted,supcode) VALUES ('$supname', '$supaddress', '$supemail','$supphone','0','$supcode')";
    if ($conn->query($sql) === true) {
        echo 'success';
    } else {
        echo 'Error: ' . $sql . '<br>' . $conn->error;
    }
}
?>
