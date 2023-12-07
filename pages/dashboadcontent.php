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
    $chart_data = array();
    

     // Total Sales Order Return Amount
     $sql1 = "SELECT SUM(grandtotal) AS total_sor FROM tbsalesreturninvoice WHERE isSuccess =1";
     $result = $conn->query($sql1);
 
     if ($result->num_rows > 0) {
         // Fetch the result as an associative array
         $row = $result->fetch_assoc();
         $total_sor =  $row["total_sor"];
     } else {
         $total_sor = $row["total_sor"];
     }

    // Total Purchase Order Return Amount
    $sql2 = "SELECT SUM(grandtotal) AS total_por FROM tbpurchaseorderreturninvoice WHERE isSuccess = 1";
    $result = $conn->query($sql2);

    if ($result->num_rows > 0) {
        // Fetch the result as an associative array
        $row = $result->fetch_assoc();
        $total_por =  $row["total_por"];
    } else {
        $total_por = $row["total_por"];
    }


    // Total Purchase Order Amount
    $sql3 = "SELECT SUM(grandtotal) AS total_po FROM tbpurchaseinvoice WHERE isSuccess = 1";
    $result = $conn->query($sql3);

    if ($result->num_rows > 0) {
        // Fetch the result as an associative array
        $row = $result->fetch_assoc();
        $total_po =  $row["total_po"];
    } else {
        $total_po = $row["total_po"];
    }
   

    // Total Sales Order Amount
    $sql4 = "SELECT SUM(grandtotal) AS total_so FROM tbinvoice WHERE isSuccess=1";
    $result = $conn->query($sql4);

    if ($result->num_rows > 0) {
        // Fetch the result as an associative array
        $row = $result->fetch_assoc();
        $total_so =  $row["total_so"];
    } else {
        $total_so = $row["total_so"];
    }


    // Customer Table
    $sql5 = "SELECT COUNT(*) as count_cus FROM tbcustomer WHERE isdeleted=0";
    $result = $conn->query($sql5);

    if ($result->num_rows > 0) {
        // Fetch the result as an associative array
        $row = $result->fetch_assoc();
        $count_customer =  $row["count_cus"];
    } else {
        $count_customer = $row["count_cus"];
    }


     // Supplier Table
     $sql6 = "SELECT COUNT(*) as count_sup FROM tbsupplier WHERE isdeleted=0";
     $result = $conn->query($sql6);
 
     if ($result->num_rows > 0) {
         // Fetch the result as an associative array
         $row = $result->fetch_assoc();
         $count_supplier =  $row["count_sup"];
     } else {
         $count_supplier = $row["count_sup"];
     }

      // Purchase Order Table
      $sql7 = "SELECT COUNT(*) as count_po FROM tbpurchaseorder";
      $result = $conn->query($sql7);
  
      if ($result->num_rows > 0) {
          // Fetch the result as an associative array
          $row = $result->fetch_assoc();
          $count_po =  $row["count_po"];
      } else {
          $count_po = $row["count_po"];
      }


      // Sales Order Table
      $sql8 = "SELECT COUNT(*) as count_so FROM tbsalesorder WHERE isquotation=0";
      $result = $conn->query($sql8);
  
      if ($result->num_rows > 0) {
          // Fetch the result as an associative array
          $row = $result->fetch_assoc();
          $count_so =  $row["count_so"];
      } else {
          $count_so = $row["count_so"];
      }

    //   Recently Product Only 4
      $sql9 = "SELECT * FROM tbproduct WHERE isdeleted=0 ORDER BY adddate DESC LIMIT 4 ";
      $products = $conn->query($sql9);
  

    //   Pending Sales
    $sql10 = "SELECT * FROM tbsalesorder INNER JOIN tbcustomer ON  tbsalesorder.cusid = tbcustomer.id WHERE isquotation=0 AND sid=2 ORDER BY created_date DESC LIMIT 4 ";
    $pendingorders = $conn->query($sql10);

    




?>