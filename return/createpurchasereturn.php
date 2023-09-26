<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Create Purchase Return</h4>
<h6>Add/Update Purchase Return</h6>
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
<option disabled selected>Select Supplier</option>
<option>Supplier</option>
</select>
</div>
</div>
</div>
</div>

<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Purchase Return Date</label>
<div class="input-groupicon">
<input type="text" placeholder="DD-MM-YYYY" class="datetimepicker">
<div class="addonset">
<img src="../assets/img/icons/calendars.svg" alt="img">
</div>
</div>
</div>
</div>

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
<div class="form-group">
<label>Description</label>
<textarea class="form-control"></textarea>
</div>
</div>



<div class="col-lg-12 col-sm-6 col-12">
<div class="form-group">
<label>Product Name</label>
<select id="add-purchase-return-items-select" class="form-select"  aria-label="Default select example">
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
<th>QTY</th>
<th>Purchase Price($)	</th>
<th>Discount($)	</th>

<th class="text-end">Total Cost ($)	</th>
<th></th>
</tr>
</thead>

<tbody id="table-add-purchase-order-return">

<tr>
<td class="productimgname">
<a class="product-img">
<img src="../assets/img/product/noimage.png" alt="product">
</a>
<a href="javascript:void(0);">Apple Earpods</a>
</td>
<td><input type="text" class="form-control" value="10.00"></td>
<td><input type="text" class="form-control" value="2000.00"></td>
<td><input type="text" class="form-control" value="0.00"></td>
<td class="text-end">2000.00</td>
<td>
<a class="delete-set"><img src="../assets/img/icons/delete.svg" alt="svg"></a>
</td>
</tr>

<tr>
<td class="productimgname">
<a class="product-img">
<img src="../assets/img/product/noimage.png" alt="product">
</a>
<a href="javascript:void(0);">Macbook Pro</a>
</td>
<td><input type="text" class="form-control" value="15.00"></td>
<td><input type="text" class="form-control" value="6000.00"></td>
<td><input type="text" class="form-control" value="0.00"></td>
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



<div class="col-lg-12">
<a href="javascript:void(0);" class="btn btn-submit me-2">Submit</a>
<a href="../return/purchasereturnlist.php" class="btn btn-cancel">Cancel</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php require_once '../includes/footer.php' ?>