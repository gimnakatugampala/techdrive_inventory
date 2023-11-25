<?php
require_once '../includes/db_config.php';

// session_start();

// $ID = $_SESSION["id"];
// exit(0);

$sql = 'SELECT * from tbuser WHERE id=1';
$result = $conn->query( $sql );

$user = array();

if ( $result->num_rows > 0 ) {
    while ( $row = $result->fetch_assoc() ) {
        $user[] = $row;
    }
}

$ID  =$user[0]["id"];

// Name Update
if(isset($_POST["onlynames"])){
    $fname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    $sql = "UPDATE tbuser SET firstname = '$fname', lastname = '$lastname' WHERE id = '$ID'";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Password Update
if(isset($_POST["onlypass"])){
    $fname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $conpass = $_POST['conpass'];

    $sql = "UPDATE tbuser SET firstname = '$fname', lastname = '$lastname' , password = '$conpass' WHERE id = '$ID'";
    if ($conn->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


// echo json_encode( $user );

?>
