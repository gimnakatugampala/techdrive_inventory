<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>
<?php require_once '../pages/pendingsales.php' ?>




<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Pending Sales</h4>
<h6>Manage your pending sales</h6>
</div>

</div>

<div class="card">
<div class="card-body">
<div class="table-top">
<div class="search-set">
<div class="search-path">
<a class="btn btn-filter" id="filter_search">
<img src="../assets/img/icons/filter.svg" alt="img">
<span><img src="../assets/img/icons/closes.svg" alt="img"></span>
</a>
</div>
<div class="search-input">
<a class="btn btn-searchset"><img src="../assets/img/icons/search-white.svg" alt="img"></a>
</div>
</div>
<div class="wordset">
<ul>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="../assets/img/icons/pdf.svg" alt="img"></a>
</li>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="../assets/img/icons/excel.svg" alt="img"></a>
</li>
<li>
<a onclick="window.print()" data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="../assets/img/icons/printer.svg" alt="img"></a>
</li>
</ul>
</div>
</div>

<div class="card" id="filter_inputs">
<div class="card-body pb-0">
<div class="row">
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<input type="text" placeholder="Enter Name">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<input type="text" placeholder="Enter Reference No">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<select class="select">
<option>Completed</option>
<option>Paid</option>
</select>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<a class="btn btn-filters ms-auto"><img src="../assets/img/icons/search-whites.svg" alt="img"></a>
</div>
</div>
</div>
</div>
</div>

<div class="table-responsive">

<!-- <table class="table  datanew">
<thead>
<tr>
<th>
<label class="checkboxs">
<input type="checkbox" id="select-all">
<span class="checkmarks"></span>
</label>
</th>
<th>Customer Name</th>
<th>Date</th>
<th>Sales Code</th>
<th>Status</th>
<th>Payment</th>
<th>Total</th>
<th>Paid</th>
<th>Due</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>walk-in-customer</td>
<td>19 Nov 2022</td>
<td>SL0101</td>
<td><span class="badges bg-lightgreen">Completed</span></td>
<td><span class="badges bg-lightgreen">Paid</span></td>
<td>0.00</td>
<td>0.00</td>
<td class="text-red">100.00</td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<li>
<a href="../sales/sales-details.php" class="dropdown-item"><img src="../assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
</li>
<li>
<a href="../sales/edit-sales.php" class="dropdown-item"><img src="../assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item"><img src="../assets/img/icons/download.svg" class="me-2" alt="img">Download Invoice</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2" alt="img">Cancel Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><i class="far fa-check-circle fa-lg mx-1"></i> Complete Sale</a>
</li>
</ul>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>walk-in-customer</td>
<td>19 Nov 2022</td>
<td>SL0102</td>
<td><span class="badges bg-lightgreen">Completed</span></td>
<td><span class="badges bg-lightgreen">Paid</span></td>
<td>0.00</td>
<td>0.00</td>
<td class="text-red">100.00</td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">

<li>
<a href="../sales/sales-details.php" class="dropdown-item"><img src="../assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
</li>

<li>
<a href="../sales/edit-sales.php" class="dropdown-item"><img src="../assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
</li>

<li>
<a href="javascript:void(0);" class="dropdown-item"><img src="../assets/img/icons/download.svg" class="me-2" alt="img">Download Invoice</a>
</li>
<li>

<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2" alt="img">Cancel Sale</a>
 </li>

 <li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><i class="far fa-check-circle fa-lg mx-1"></i> Complete Sale</a>
</li>
</ul>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>walk-in-customer</td>
<td>19 Nov 2022</td>
<td>SL0103</td>
<td><span class="badges bg-lightgreen">Completed</span></td>
<td><span class="badges bg-lightgreen">Paid</span></td>
<td>0.00</td>
<td class="text-green">100.00</td>
<td>0.00</td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<li>
<a href="../sales/sales-details.php" class="dropdown-item"><img src="../assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
</li>
<li>
<a href="../sales/edit-sales.php" class="dropdown-item"><img src="../assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item"><img src="../assets/img/icons/download.svg" class="me-2" alt="img">Download Invoice</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2" alt="img">Cancel Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><i class="far fa-check-circle fa-lg mx-1"></i> Complete Sale</a>
</li>
</ul>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>Fred C. Rasmussen</td>
<td>19 Nov 2022</td>
<td>SL0104</td>
<td><span class="badges bg-lightred">Pending</span></td>
<td><span class="badges bg-lightred">Due</span></td>
<td>0.00</td>
<td class="text-green">100.00</td>
<td>0.00</td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<li>
<a href="../sales/sales-details.php" class="dropdown-item"><img src="../assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
</li>
<li>
<a href="../sales/edit-sales.php" class="dropdown-item"><img src="../assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item"><img src="../assets/img/icons/download.svg" class="me-2" alt="img">Download Invoice</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2" alt="img">Cancel Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><i class="far fa-check-circle fa-lg mx-1"></i> Complete Sale</a>
</li>
</ul>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>Thomas M. Martin</td>
<td>19 Nov 2022</td>
<td>SL0105</td>
<td><span class="badges bg-lightred">Pending</span></td>
<td><span class="badges bg-lightred">Due</span></td><td>0.00</td>
<td>0.00</td>
<td class="text-green">100.00</td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<li>
<a href="../sales/sales-details.php" class="dropdown-item"><img src="../assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
</li>
<li>
<a href="../sales/edit-sales.php" class="dropdown-item"><img src="../assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item"><img src="../assets/img/icons/download.svg" class="me-2" alt="img">Download Invoice</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2" alt="img">Cancel Sale</a>
</li>
</ul>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>Thomas M. Martin</td>
<td>19 Nov 2022</td>
<td>SL0106</td>
<td><span class="badges bg-lightgreen">Completed</span></td>
<td><span class="badges bg-lightgreen">Paid</span></td>
<td>0.00</td>
<td>0.00</td>
<td class="text-red">100.00</td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<li>
<a href="../sales/sales-details.php" class="dropdown-item"><img src="../assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
</li>
<li>
<a href="../sales/edit-sales.php" class="dropdown-item"><img src="../assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item"><img src="../assets/img/icons/download.svg" class="me-2" alt="img">Download Invoice</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2" alt="img">Cancel Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><i class="far fa-check-circle fa-lg mx-1"></i> Complete Sale</a>
</li>
</ul>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>walk-in-customer</td>
<td>19 Nov 2022</td>
<td>SL0107</td>
<td><span class="badges bg-lightgreen">Completed</span></td>
<td><span class="badges bg-lightgreen">Paid</span></td>
<td>0.00</td>
<td>0.00</td>
<td class="text-red">100.00</td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<li>
<a href="../sales/sales-details.php" class="dropdown-item"><img src="../assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
</li>
<li>
<a href="../sales/edit-sales.php" class="dropdown-item"><img src="../assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item"><img src="../assets/img/icons/download.svg" class="me-2" alt="img">Download Invoice</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2" alt="img">Cancel Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><i class="far fa-check-circle fa-lg mx-1"></i> Complete Sale</a>
</li>
</ul>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>walk-in-customer</td>
<td>19 Nov 2022</td>
<td>SL0108</td>
<td><span class="badges bg-lightred">Pending</span></td>
<td><span class="badges bg-lightred">Due</span></td>
<td>0.00</td>
<td class="text-green">100.00</td>
<td>0.00</td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<li>
<a href="../sales/sales-details.php" class="dropdown-item"><img src="../assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
</li>
<li>
<a href="../sales/edit-sales.php" class="dropdown-item"><img src="../assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item"><img src="../assets/img/icons/download.svg" class="me-2" alt="img">Download Invoice</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2" alt="img">Cancel Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><i class="far fa-check-circle fa-lg mx-1"></i> Complete Sale</a>
</li>
</ul>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>walk-in-customer</td>
<td>19 Nov 2022</td>
<td>SL0109</td>
<td><span class="badges bg-lightred">Pending</span></td>
<td><span class="badges bg-lightred">Due</span></td>
<td>0.00</td>
<td class="text-green">100.00</td>
<td>0.00</td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<li>
<a href="../sales/sales-details.php" class="dropdown-item"><img src="../assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
</li>
<li>
<a href="../sales/edit-sales.php" class="dropdown-item"><img src="../assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item"><img src="../assets/img/icons/download.svg" class="me-2" alt="img">Download Invoice</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2" alt="img">Cancel Sale</a>
</li>
</ul>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>walk-in-customer</td>
<td>19 Nov 2022</td>
<td>SL0110</td>
<td><span class="badges bg-lightred">Pending</span></td>
<td><span class="badges bg-lightred">Due</span></td>
<td>0.00</td>
<td class="text-green">100.00</td>
<td>0.00</td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<li>
<a href="../sales/sales-details.php" class="dropdown-item"><img src="../assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
</li>
<li>
<a href="../sales/edit-sales.php" class="dropdown-item"><img src="../assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item"><img src="../assets/img/icons/download.svg" class="me-2" alt="img">Download Invoice</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2" alt="img">Cancel Sale</a>
</li>
</ul>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>walk-in-customer</td>
<td>19 Nov 2022</td>
<td>SL0111</td>
<td><span class="badges bg-lightred">Pending</span></td>
<td><span class="badges bg-lightred">Due</span></td>
<td>0.00</td>
<td>0.00</td>
<td>0.00</td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<li>
<a href="../sales/sales-details.php" class="dropdown-item"><img src="../assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
</li>
<li>
<a href="../sales/edit-sales.php" class="dropdown-item"><img src="../assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item"><img src="../assets/img/icons/download.svg" class="me-2" alt="img">Download Invoice</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2" alt="img">Cancel Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><i class="far fa-check-circle fa-lg mx-1"></i> Complete Sale</a>
</li>
</ul>
</td>
</tr>
</tbody>
</table> -->



<!-- NEW -->
<table class="table datanew pendingsaleslist">
<thead>
<tr>
<th>Sales Code</th>
<th>Customer Name</th>
<th>Status</th>
<th>Paid Status</th>
<th>Placed Date</th>
<th>Grand Total</th>
<th>Amount Paid</th>
<th>Due</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>


<?php foreach ($pendinglist as $row) : ?>
    <tr>
    <td><?php echo  $row["socode"]; ?></td>
    <td><?php echo  $row["cusname"]; ?></td>
    <td><?php 
    if($row["sid"] == "1") {
        echo "<span class='badges bg-lightgreen'>Completed</span>";
    }else if($row["sid"] == "2"){
        echo "<span class='badges bg-primary'>Pending</span>";
    }else if($row["sid"] == "3"){
        echo "<span class='badges bg-lightred'>Canceled</span>";
    }
            ?>
    </td>

    <td><?php 

    if($row["paidstatusid"] == "1") {
        echo "<span class='badges bg-lightred'>Not Paid</span>";
    }else if($row["paidstatusid"] == "2"){
        echo "<span class='badges bg-lightyellow'>Advance</span>";
    }else {
        echo "<span class='badges bg-lightgreen'>Paid</span>";
    }
        ?></td>

    <td><?php echo  $row["salesorderdate"]; ?></td>
    <td><?php echo  $row["grandtotal"]; ?></td>
    <td><?php echo  $row["paidamount"]; ?></td>
    <td><?php echo  floatval($row["grandtotal"]) - floatval($row["paidamount"]); ?></td>
    <td class="text-center">
        <a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
        </a>
        <ul class="dropdown-menu">
        <li>
        <a href="../sales/sales-details.php?code=<?php echo  $row["socode"]; ?>" class="dropdown-item"><img src="../assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Details</a>
        </li>
        <li>
        <a href="../sales/edit-sales.php?code=<?php echo  $row["socode"]; ?>" class="dropdown-item"><img src="../assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
        </li>
        
        <li>
        <a href="../utils/pdf_maker.php?MST_ID=<?php echo $row["socode"];?>&ACTION=DOWNLOAD&TYPE=SO" class="dropdown-item"><img src="../assets/img/icons/download.svg" class="me-2" alt="img">Download Invoice</a>
        </li>
        <li>
        <a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2" alt="img">Cancel Sale</a>
        </li>
        <li>
        <a href="javascript:void(0);" class="dropdown-item confirm-text"><i class="far fa-check-circle fa-lg mx-1"></i> Complete Sale</a>
        </li>
        </ul>
    </td>
    </tr>
<?php endforeach; ?>


<!-- <tr>
<td>SL0111</td>
<td>Gimna Katugampala</td>
<td><span class="badges bg-lightred">Pending</span></td>
<td><span class="badges bg-lightred">Due</span></td>
<td>19 Nov 2022</td>
<td>0.00</td>
<td>0.00</td>
<td>0.00</td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<li>
<a href="../sales/sales-details.php" class="dropdown-item"><img src="../assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
</li>
<li>
<a href="../sales/edit-sales.php" class="dropdown-item"><img src="../assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item"><img src="../assets/img/icons/download.svg" class="me-2" alt="img">Download Invoice</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2" alt="img">Cancel Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><i class="far fa-check-circle fa-lg mx-1"></i> Complete Sale</a>
</li>
</ul>
</td>
</tr> -->
</tbody>
</table>



</div>
</div>
</div>

</div>
</div>
</div>


<!-- <div class="modal fade" id="showpayment" tabindex="-1" aria-labelledby="showpayment" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Show Payments</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<div class="modal-body">
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th>Date</th>
<th>Reference</th>
<th>Amount	</th>
<th>Paid By	</th>
<th>Paid By	</th>
</tr>
</thead>
<tbody>
<tr class="bor-b1">
<td>2022-03-07	</td>
<td>INV/SL0101</td>
<td>$ 0.00	</td>
<td>Cash</td>
<td>
<a class="me-2" href="javascript:void(0);">
<img src="../assets/img/icons/printer.svg" alt="img">
</a>
<a class="me-2" href="javascript:void(0);" data-bs-target="#editpayment" data-bs-toggle="modal" data-bs-dismiss="modal">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>
<a class="me-2 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
</tbody>
</table>


</div>
</div>
</div>
</div>
</div> -->


<!-- <div class="modal fade" id="createpayment" tabindex="-1" aria-labelledby="createpayment" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Create Payment</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Customer</label>
<div class="input-groupicon">
<input type="text" value="2022-03-07" class="datetimepicker">
<div class="addonset">
<img src="../assets/img/icons/calendars.svg" alt="img">
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Reference</label>
<input type="text" value="INV/SL0101">
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Received Amount</label>
<input type="text" value="0.00">
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Paying Amount</label>
<input type="text" value="0.00">
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Payment type</label>
<select class="select">
<option>Cash</option>
<option>Online</option>
<option>Inprogress</option>
</select>
</div>
</div>
<div class="col-lg-12">
<div class="form-group mb-0">
<label>Note</label>
<textarea class="form-control"></textarea>
</div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-submit">Submit</button>
<button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
</div>
</div>
</div>
</div> -->


<!-- <div class="modal fade" id="editpayment" tabindex="-1" aria-labelledby="editpayment" aria-hidden="true">
<div class="modal-dialog modal-lg modal-dialog-centered">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Edit Payment</h5>
<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<div class="modal-body">
<div class="row">
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Customer</label>
<div class="input-groupicon">
<input type="text" value="2022-03-07" class="datetimepicker">
<div class="addonset">
<img src="../assets/img/icons/datepicker.svg" alt="img">
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Reference</label>
<input type="text" value="INV/SL0101">
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Received Amount</label>
<input type="text" value="0.00">
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Paying Amount</label>
<input type="text" value="0.00">
</div>
</div>
<div class="col-lg-6 col-sm-12 col-12">
<div class="form-group">
<label>Payment type</label>
<select class="select">
<option>Cash</option>
<option>Online</option>
<option>Inprogress</option>
</select>
</div>
</div>
<div class="col-lg-12">
<div class="form-group mb-0">
<label>Note</label>
<textarea class="form-control"></textarea>
</div>
</div>
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-submit">Submit</button>
<button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
</div>
</div>
</div>
</div> -->


<?php require_once '../includes/footer.php' ?>