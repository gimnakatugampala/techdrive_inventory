<?php
require_once '../includes/db_config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["brandId"])) {
        $brandId = $_POST["brandId"];

        // Prepare and execute the delete query
        $sql = "DELETE FROM tbbrand WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $brandId);

        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "failure";
        }

        $stmt->close();
    }
}
?>