<?php
require_once '../includes/db_config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $brandName = $_POST["brandName"];
        $brandDescription = $_POST["brandDescription"];
        $brandId = $_POST["brandId"];

        $sql = "UPDATE brands SET brandName = ?, brandDescription = ? WHERE brandId = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$brandName, $brandDescription, $brandId]);

        if ($stmt->rowCount() > 0) {
            echo "success";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request method.";
}
?>