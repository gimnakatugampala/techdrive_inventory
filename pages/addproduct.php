<?php
require_once '../includes/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pname = $_POST['pname'];
    $selectcatid = $_POST['selectcatid'];
    $selectsubcatid = $_POST['selectsubcatid'];
    $selectbrandid = $_POST['selectbrandid'];
    $warrenty = $_POST['warrenty'];
    $mqty = $_POST['mqty'];
    $qty = $_POST['qty'];
    $selectavailablity = $_POST['selectavailablity'];
    $sprice = $_POST['sprice'];
    $bprice = $_POST['bprice'];

    $datetime = date("Y-m-d H:i:s");
    $min = 1;
    $max = 10000000000;

    $pcode = rand($min, $max);

    $sql = "INSERT INTO tbproduct (productname,quantity,warrenty, minquanity,avlid,sellingprice,buyingprice,pcode,isdeleted,adddate,catid,scatid,bid) VALUES ('$pname','$qty',$warrenty,'$mqty','$selectavailablity','$sprice','$bprice','$pcode',0,'$datetime','$selectcatid','$selectsubcatid','$selectbrandid')";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>