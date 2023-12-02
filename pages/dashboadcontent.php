<?php
    require_once '../includes/db_config.php';

    // Variables
    $count_customer = array();
    $count_supplier = array();
    $count_po = array();
    $count_so = array();
    $total_so = array();
    $total_po = array();
    $total_por = array();
    $total_sor = array();
    

     // Total Sales Order Return Amount
     $sql = "SELECT tbsalesorderreturn.id, SUM(tbsalesreturninvoice.grandtotal) AS total_sor
     FROM tbsalesorderreturn
     INNER JOIN tbsalesreturninvoice ON tbsalesorderreturn.id = tbsalesreturninvoice.salesorid WHERE tbsalesorderreturn.sid = 1 AND tbsalesreturninvoice.isSuccess =1
     GROUP BY tbsalesorderreturn.id";
     $result = $conn->query($sql);
 
     if ($result->num_rows > 0) {
         // Fetch the result as an associative array
         $row = $result->fetch_assoc();
         $total_sor =  $row["total_sor"];
     } else {
         $total_sor = $row["total_sor"];
     }

    // Total Purchase Order Return Amount
    $sql = "SELECT tbpurchaseorderreturn.id, SUM(tbpurchaseorderreturninvoice.grandtotal) AS total_por
    FROM tbpurchaseorderreturn
    INNER JOIN tbpurchaseorderreturninvoice ON tbpurchaseorderreturn.id = tbpurchaseorderreturninvoice.porid
    WHERE tbpurchaseorderreturninvoice.isSuccess = 1 AND tbpurchaseorderreturn.sid = 1 GROUP BY tbpurchaseorderreturn.id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the result as an associative array
        $row = $result->fetch_assoc();
        $total_por =  $row["total_por"];
    } else {
        $total_por = $row["total_por"];
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
        $total_po =  $row["total_po"];
    } else {
        $total_po = $row["total_po"];
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
        $total_so =  $row["total_so"];
    } else {
        $total_so = $row["total_so"];
    }


    // Customer Table
    $sql = "SELECT COUNT(*) as count_cus FROM tbcustomer WHERE isdeleted=0";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the result as an associative array
        $row = $result->fetch_assoc();
        $count_customer =  $row["count_cus"];
    } else {
        $count_customer = $row["count_cus"];
    }


     // Supplier Table
     $sql = "SELECT COUNT(*) as count_sup FROM tbsupplier WHERE isdeleted=0";
     $result = $conn->query($sql);
 
     if ($result->num_rows > 0) {
         // Fetch the result as an associative array
         $row = $result->fetch_assoc();
         $count_supplier =  $row["count_sup"];
     } else {
         $count_supplier = $row["count_sup"];
     }

      // Purchase Order Table
      $sql = "SELECT COUNT(*) as count_po FROM tbpurchaseorder";
      $result = $conn->query($sql);
  
      if ($result->num_rows > 0) {
          // Fetch the result as an associative array
          $row = $result->fetch_assoc();
          $count_po =  $row["count_po"];
      } else {
          $count_po = $row["count_po"];
      }


      // Sales Order Table
      $sql = "SELECT COUNT(*) as count_so FROM tbsalesorder WHERE isquotation=0";
      $result = $conn->query($sql);
  
      if ($result->num_rows > 0) {
          // Fetch the result as an associative array
          $row = $result->fetch_assoc();
          $count_so =  $row["count_so"];
      } else {
          $count_so = $row["count_so"];
      }

    //   Recently Product Only 4
      $sql = "SELECT * FROM tbproduct WHERE isdeleted=0 ORDER BY adddate DESC LIMIT 4 ";
      $products = $conn->query($sql);
  

    //   Pending Sales
    $sql = "SELECT * FROM tbsalesorder INNER JOIN tbcustomer ON  tbsalesorder.cusid = tbcustomer.id WHERE isquotation=0 AND sid=2 ORDER BY created_date DESC LIMIT 4 ";
    $pendingorders = $conn->query($sql);




?>