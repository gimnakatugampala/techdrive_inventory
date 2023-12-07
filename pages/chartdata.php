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
    $sql = "SELECT SUM(grandtotal) AS total_so FROM tbinvoice WHERE isSuccess=1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the result as an associative array
        $row = $result->fetch_assoc();
        $data1 = new Data("Total Sales", $row["total_so"]);
        $total_chart[0] = $data1;
    }


      // Total Purchase Order Amount
      $sql = "SELECT SUM(grandtotal) AS total_po FROM tbpurchaseinvoice WHERE isSuccess = 1";
      $result = $conn->query($sql);
  
      if ($result->num_rows > 0) {
          // Fetch the result as an associative array
          $row = $result->fetch_assoc();
          $data2 = new Data("Total Purchases", $row["total_po"]);
          $total_chart[1] = $data2;
      }

    echo json_encode($total_chart);


?>