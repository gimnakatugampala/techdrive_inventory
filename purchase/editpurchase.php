<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Purchase Edit</h4>
<h6>Edit/Update Purchase</h6>
</div>
</div>
<div class="card">
<div class="card-body">
<div class="row">

<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Supplier Name</label>
<div class="row">
<div class="col-lg-12 col-sm-10 col-10">
<select class="form-select">
<option>Apex Computers</option>
<option>Computers</option>
</select>
</div>

</div>
</div>
</div>

<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Purchase Date </label>
<div class="input-groupicon">
<input type="text" placeholder="DD-MM-YYYY" class="datetimepicker">
<div class="addonset">
<img src="../assets/img/icons/calendars.svg" alt="img">
</div>
</div>
</div>
</div>


<div class="col-lg-12 col-sm-6 col-12">
<div class="form-group">
<label>Product Name</label>
<select id="edit-purchase-order-select" class="form-select"  aria-label="Default select example">
  <option selected>Open this select menu</option>
  <option value="1">Mac Book Pro</option>
  <option value="2">Iphone 15</option>
  <option value="3">Watch</option>
</select>
</div>
</div>

</div>
<div class="row">
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th>Product Name</th>
<th>Purchase Price($)</th>
<th>QTY</th>
<th>Discount($)	</th>
<th class="text-end">Total Cost ($)	</th>
<th></th>
</tr>
</thead>

<tbody id="table-edit-purchase-order-list">
<tr>
<td class="productimgname">
<a class="product-img">
<img src="../assets/img/product/product7.jpg" alt="product">
</a>
<a href="javascript:void(0);">Apple Earpods</a>
</td>
<td>2000.00</td>
<td>10.00</td>
<td>500.00</td>

<td class="text-end">2000.00</td>
<td>
<a class="delete-set"><img src="../assets/img/icons/delete.svg" alt="svg"></a>
</td>
</tr>

<tr>
<td class="productimgname">
<a class="product-img">
<img src="../assets/img/product/product6.jpg" alt="product">
</a>
<a href="javascript:void(0);">Macbook Pro</a>
</td>
<td>6000.00</td>
<td>15.00</td>
<td>100.00</td>

<td class="text-end">1000.00</td>
<td>
<a class="delete-set"><img src="../assets/img/icons/delete.svg" alt="svg"></a>
</td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="row">
<div class="col-lg-12 float-md-right">
<div class="total-order">
<ul>
<li>
<h4>Grand Total</h4>
<h5>Rs. 0.00</h5>
</li>
<li>
<h4>Discount</h4>
<h5>Rs. 0.00</h5>
</li>
<li>
<h4>Paid Amount</h4>
<h5>Rs. 0.00</h5>
</li>
<li class="total">
<h4>To Be Paid</h4>
<h5>Rs. 0.00</h5>
</li>
</ul>
</div>
</div>
</div>
<div class="row">

<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">

<label>Paid Status</label>
<select class="select">
<option>Choose Paid Status</option>
<option>Not Paid</option>
<option>Advance</option>
<option>Paid</option>
</select>

</div>
</div>

<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Paid Amount</label>
<input type="text">
</div>
</div>



<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Status</label>
<select class="select">
<option>Choose Status</option>
<option>Completed</option>
<option>Inprogress</option>
</select>
</div>
</div>


<div class="col-lg-12">
<a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a>
<a href="../purchase/purchaselist.php" class="btn btn-cancel">Cancel</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<?php require_once '../includes/footer.php' ?>