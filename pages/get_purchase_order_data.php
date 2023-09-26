<?php
require_once '../includes/db_config.php';

if (isset($_POST['purchaseOrderId'])) {
    $purchaseOrderId = $_POST['purchaseOrderId'];

    // Retrieve data from tbpurchaseorderitem and tbpurchaseinvoice tables
    $sql = "SELECT tbpurchaseorderitem.poid, tbproduct.productname, tbpurchaseorderitem.qty,tbpurchaseorderitem.price,tbpurchaseorderitem.discount FROM tbpurchaseorderitem INNER JOIN tbpurchaseinvoice ON tbpurchaseorderitem.poid = tbpurchaseinvoice.poid INNER JOIN tbproduct ON tbpurchaseorderitem.product_id = tbproduct.id WHERE tbpurchaseorderitem.poid = $purchaseOrderId";

    $result = $conn->query($sql);

    if ($result) {
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'Failed to retrieve data.']);
    }
} else {
    echo json_encode(['error' => 'Purchase Order ID not provided.']);
}
?>