<?php
require_once '../includes/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Perform a SQL query to check if the email and password exist in the database
    $sql = "SELECT * FROM tbuser WHERE username = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User is authenticated
        echo "success";
    } else {
        // Authentication failed
        echo "error";
    }
}
?>
