<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>


<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Sales Return List</h4>
<h6>Manage your Returns</h6>
</div>
<div class="page-btn">
<a href="../return/createsalesreturn.php" class="btn btn-added"><img src="../assets/img/icons/plus.svg" alt="img" class="me-2">Add New Sales Return</a>
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
<a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="../assets/img/icons/printer.svg" alt="img"></a>
</li>
</ul>
</div>
</div>

<div class="card" id="filter_inputs">
<div class="card-body pb-0">
<div class="row">
<div class="col-lg-2 col-sm-6 col-12">
<div class="form-group">
<input type="text" class="datetimepicker cal-icon" placeholder="Choose Date">
</div>
</div>
<div class="col-lg-2 col-sm-6 col-12">
<div class="form-group">
<input type="text" placeholder="Enter Reference">
</div>
</div>
<div class="col-lg-2 col-sm-6 col-12">
<div class="form-group">
<select class="select">
<option>Choose Customer</option>
<option>Customer</option>
</select>
</div>
</div>
<div class="col-lg-2 col-sm-6 col-12">
<div class="form-group">
<select class="select">
<option>Choose Status</option>
<option>Inprogress</option>
</select>
</div>
</div>
<div class="col-lg-2 col-sm-6 col-12">
<div class="form-group">
<select class="select">
<option>Choose Payment Status</option>
<option>Payment Status</option>
</select>
</div>
</div>
<div class="col-lg-2 col-sm-6 col-12">
<div class="form-group">
<a class="btn btn-filters ms-auto"><img src="../assets/img/icons/search-whites.svg" alt="img"></a>
</div>
</div>
</div>
</div>
</div>

<div class="table-responsive">
<table class="table datanew salesreturnlist">
<thead>
<tr>
<th>Sales Code</th>
<th>Customer Name</th>
<th>Status</th>
<th>Placed Date</th>
<th>Grand Total ($)</th>
<th>Action</th>
</tr>
</thead>
<tbody id="salesreturnlistbody">

<!-- <tr>
<td>2030430</td>
<td>Gimna Katugampala</td>
<td><span class="badges bg-lightgreen">Received</span></td>
<td>19 Nov 2022</td>
<td>550</td>
<td>
<a class="me-3" href="../return/salesreturn-detail.php">
<img src="../assets/img/icons/eye1.svg" alt="img">
</a>
<a class="me-3" href="../return/editsalesreturn.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
</a>
</td>
</tr> -->


<!-- <tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>19 Nov 2022</td>
<td>Benjamin</td>
<td><span class="badges bg-lightred">Pending</span></td>
<td>550</td>
<td>120</td>
<td>550</td>
<td><span class="badges bg-lightred">Unpaid</span></td>
<td>
<a class="me-3" href="../return/salesreturn-detail.php">
<img src="../assets/img/icons/eye1.svg" alt="img">
</a>
<a class="me-3" href="../return/editsalesreturn.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>

<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>19 Nov 2022</td>
<td>James</td>
<td><span class="badges bg-lightred">Pending</span></td>
<td>210</td>
<td>120</td>
<td>210</td>
<td><span class="badges bg-lightred">Unpaid</span></td>
<td>
<a class="me-3" href="../return/salesreturn-detail.php">
<img src="../assets/img/icons/eye1.svg" alt="img">
</a>
<a class="me-3" href="../return/editsalesreturn.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>19 Nov 2022</td>
<td>Bruklin</td>
<td><span class="badges bg-lightgreen">Received</span></td>
<td>210</td>
<td>120</td>
<td>210</td>
<td><span class="badges bg-lightgreen">Paid</span></td>
<td>
<a class="me-3" href="../return/salesreturn-detail.php">
<img src="../assets/img/icons/eye1.svg" alt="img">
</a>
<a class="me-3" href="../return/editsalesreturn.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>19 Nov 2022</td>
<td>Beverly</td>
<td><span class="badges bg-lightred">Pending</span></td>
<td>210</td>
<td>120</td>
<td>210</td>
<td><span class="badges bg-lightred">UnPaid</span></td>
<td>
<a class="me-3" href="../return/salesreturn-detail.php">
<img src="../assets/img/icons/eye1.svg" alt="img">
</a>
<a class="me-3" href="../return/editsalesreturn.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>19 Nov 2022</td>
<td>Best Power Tools</td>
<td><span class="badges bg-lightgreen">Received</span></td>
<td>210</td>
<td>120</td>
<td>210</td>
<td><span class="badges bg-lightgreen">paid</span></td>
<td>
<a class="me-3" href="../return/salesreturn-detail.php">
<img src="../assets/img/icons/eye1.svg" alt="img">
</a>
<a class="me-3" href="../return/editsalesreturn.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td> 
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>19 Nov 2022</td>
<td>Apex Computers</td>
<td><span class="badges bg-lightyellow">Ordered</span></td>
<td>1000</td>
<td>500</td>
<td>1000</td>
<td><span class="badges bg-lightyellow">Partial</span></td>
<td>
<a class="me-3" href="../return/salesreturn-detail.php">
<img src="../assets/img/icons/eye1.svg" alt="img">
</a>
<a class="me-3" href="../return/editsalesreturn.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>19 Nov 2022</td>
<td>Thomas</td>
<td><span class="badges bg-lightgreen">Received</span></td>
<td>550</td>
<td>120</td>
<td>550</td>
<td><span class="badges bg-lightgreen">Paid</span></td>
<td>
<a class="me-3" href="../return/salesreturn-detail.php">
<img src="../assets/img/icons/eye1.svg" alt="img">
</a>
<a class="me-3" href="../return/editsalesreturn.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>19 Nov 2022</td>
<td>Benjamin</td>
<td><span class="badges bg-lightyellow">Pending</span></td>
<td>550</td>
<td>120</td>
<td>550</td>
<td><span class="badges bg-lightyellow">Partial</span></td>
<td>
<a class="me-3" href="../return/salesreturn-detail.php">
<img src="../assets/img/icons/eye1.svg" alt="img">
</a>
<a class="me-3" href="../return/editsalesreturn.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>19 Nov 2022</td>
<td>James</td>
<td><span class="badges bg-lightred">Pending</span></td>
<td>210</td>
<td>120</td>
<td>210</td>
<td><span class="badges bg-lightred">Unpaid</span></td>
<td>
<a class="me-3" href="../return/salesreturn-detail.php">
<img src="../assets/img/icons/eye1.svg" alt="img">
</a>
<a class="me-3" href="../return/editsalesreturn.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>19 Nov 2022</td>
<td>Bruklin</td>
<td><span class="badges bg-lightgreen">Received</span></td>
<td>210</td>
<td>120</td>
<td>210</td>
<td><span class="badges bg-lightgreen">Paid</span></td>
<td>
<a class="me-3" href="../return/salesreturn-detail.php">
<img src="../assets/img/icons/eye1.svg" alt="img">
</a>
<a class="me-3" href="../return/editsalesreturn.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>19 Nov 2022</td>
<td>Beverly</td>
<td><span class="badges bg-lightred">Pending</span></td>
<td>210</td>
<td>120</td>
<td>210</td>
<td><span class="badges bg-lightred">UnPaid</span></td>
<td>
<a class="me-3" href="../return/salesreturn-detail.php">
<img src="../assets/img/icons/eye1.svg" alt="img">
</a>
<a class="me-3" href="../return/editsalesreturn.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>19 Nov 2022</td>
<td>Best Power Tools</td>
<td><span class="badges bg-lightgreen">Received</span></td>
<td>210</td>
<td>120</td>
<td>210</td>
<td><span class="badges bg-lightgreen">paid</span></td>
<td>
<a class="me-3" href="../return/salesreturn-detail.php">
<img src="../assets/img/icons/eye1.svg" alt="img">
</a>
<a class="me-3" href="../return/editsalesreturn.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>19 Nov 2022</td>
<td>Apex Computers</td>
<td><span class="badges bg-lightyellow">Ordered</span></td>
<td>1000</td>
<td>500</td>
<td>1000</td>
<td><span class="badges bg-lightyellow">Partial</span></td>
<td>
<a class="me-3" href="../return/salesreturn-detail.php">
<img src="../assets/img/icons/eye1.svg" alt="img">
</a>
<a class="me-3" href="../return/editsalesreturn.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>
<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
</a>
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

<?php require_once '../includes/footer.php' ?>