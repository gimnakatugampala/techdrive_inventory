<?php
require_once '../includes/db_config.php';
    $total_chart = array();

    class Data {
        public $label;
        public $amount;
    
        public function __construct($label, $amount) {
            $this->label = $label;
            $this->amount = $amount;
        }
    }

    // Total Sales Order Amount
    $sql = "SELECT tbsalesorder.id, SUM(tbinvoice.grandtotal) AS total_so
    FROM tbsalesorder
    INNER JOIN tbinvoice ON tbsalesorder.id = tbinvoice.soid WHERE tbsalesorder.sid = 1 AND tbsalesorder.isquotation =0
    GROUP BY tbsalesorder.id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the result as an associative array
        $row = $result->fetch_assoc();
        $data1 = new Data("Total Sales", $row["total_so"]);
        $total_chart[0] = $data1;
    }


      // Total Purchase Order Amount
      $sql = "SELECT tbpurchaseorder.id, SUM(tbpurchaseinvoice.grandtotal) AS total_po
      FROM tbpurchaseorder
      INNER JOIN tbpurchaseinvoice ON tbpurchaseorder.id = tbpurchaseinvoice.poid WHERE tbpurchaseorder.statusid = 1 AND tbpurchaseinvoice.isSuccess = 1
      GROUP BY tbpurchaseorder.id";
      $result = $conn->query($sql);
  
      if ($result->num_rows > 0) {
          // Fetch the result as an associative array
          $row = $result->fetch_assoc();
          $data2 = new Data("Total Purchases", $row["total_po"]);
          $total_chart[1] = $data2;
      }

    echo json_encode($total_chart);


?>