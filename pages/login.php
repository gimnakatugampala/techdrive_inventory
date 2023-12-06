<?php
session_start();
require_once '../includes/db_config.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM tbuser WHERE username = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User is authenticated
        $row = $result->fetch_assoc();

        // SESSIONS
        $_SESSION["id"] = $row["id"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["usercode"] = $row["usercode"];
        $dateNow =date("Y-m-d H:i:s");

        
        // SAVE THE SESSION
        $sql = "INSERT INTO tbsession (logindate, uid) VALUES ('$dateNow', '$row[id]')";
        if ($conn->query($sql) === TRUE) {
            echo "success";
        }
        
    } else {
        // Authentication failed
        echo "error";
    }
}
?>
