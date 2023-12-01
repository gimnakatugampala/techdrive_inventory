<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>
<?php require_once '../pages/completedsales.php' ?>


<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Completed Sales List</h4>
<h6>Manage your completed sales</h6>
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
<!-- <li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="../assets/img/icons/pdf.svg" alt="img"></a>
</li>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="../assets/img/icons/excel.svg" alt="img"></a>
</li> -->
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

<table class="table  datanew comepletedsaleslist">
<thead>
<tr>
<th>Sales Code</th>
<th>Customer Name</th>
<th>Status</th>
<th>Paid Status</th>
<th>Placed Date</th>
<th>Completed Date</th>
<th>Grand Total</th>
<th>Amount Paid</th>
<th>Due Amount</th>
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>

<?php foreach ($completedlist as $row) : ?>
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
        <td><?php echo  $row["completeddate"]; ?></td>
        <td><?php echo  $row["grandtotal"]; ?></td>
        <td><?php echo  $row["paidamount"]; ?></td>
        <td><?php echo  floatval($row["grandtotal"]) - floatval($row["paidamount"]); ?></td>
        <td class="text-center">
        <a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
        </a>
        <ul class="dropdown-menu">
        <li>
        <a href="../sales/sales-details.php?code=<?php echo  $row["socode"]; ?>" class="dropdown-item"><img src="../assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
        </li>
        <a href="../utils/pdf_maker.php?MST_ID=<?php echo $row["socode"];?>&ACTION=DOWNLOAD&TYPE=SO"  class="dropdown-item"><img src="../assets/img/icons/download.svg" class="me-2" alt="img">Download Invoice</a>
        </li>
        </ul>
        </td>
        </tr>
    <?php endforeach; ?>
</tbody>




<?php require_once '../includes/footer.php' ?>