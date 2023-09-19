<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Create Sales Return</h4>
<h6>Add/Update Sales Return</h6>
</div>
</div>
<div class="card">
<div class="card-body">


<div class="row">

<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Customer</label>
<div class="row">
<div class="col-lg-12 col-sm-10 col-10">
<select class="select">
<option>Choose</option>
<option>Customer Name</option>
</select>
</div>
</div>
</div>
</div>

<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Sale Date</label>
<div class="input-groupicon">
<input type="text" placeholder="Choose Date" class="datetimepicker">
<a class="addonset">
<img src="../assets/img/icons/calendars.svg" alt="img">
</a>
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
<select id="add-sales-return-items-select" class="form-select"  aria-label="Default select example">
  <option selected>Open this select menu</option>
  <option value="1">Mac Book Pro</option>
  <option value="2">Iphone 15</option>
  <option value="3">Watch</option>
</select>
</div>
</div>


</div>



<div class="row">
<div class="table-responsive mb-3">
<table class="table">
<thead>
<tr>
<th>#</th>
<th>Product Name</th>
<th>Price</th>
<th>QTY</th>
<th>Discount</th>
<th>Subtotal</th>
<th></th>
</tr>
</thead>

<tbody id="table-add-sales-return">

<tr>
<td>1</td>
<td class="productimgname">
<a class="product-img">
<img src="../assets/img/product/noimage.png" alt="product">
</a>
<a href="javascript:void(0);">Apple Earpods</a>
</td>
<td>1500.00</td>
<td><input type="number" class="form-control" value="1"></td>
<td><input type="text" class="form-control" value="0.00"></td>
<td>1500.00</td>
<td>
<a href="javascript:void(0);" class="delete-set"><img src="../assets/img/icons/delete.svg" alt="svg"></a>
</td>
</tr>

<tr>

<td>2</td>
<td class="productimgname">
<a class="product-img">
<img src="../assets/img/product/noimage.png" alt="product">
</a>
<a href="javascript:void(0);">iPhone 11</a>
</td>
<td>1500.00</td>
<td><input type="number" class="form-control" value="1"></td>
<td><input type="text" class="form-control" value="0.00"></td>
<td>1500.00</td>
<td>
<a href="javascript:void(0);" class="delete-set"><img src="../assets/img/icons/delete.svg" alt="svg"></a>
</td>
</tr>


<tr>
<td>2</td>
<td class="productimgname">
<a class="product-img">
<img src="../assets/img/product/noimage.png" alt="product">
</a>
<a href="javascript:void(0);">Macbook pro</a>
</td>
<td>1500.00</td>
<td><input type="number" class="form-control" value="1"></td>
<td><input type="text" class="form-control" value="0.00"></td>
<td>1500.00</td>
<td>
<a href="javascript:void(0);" class="delete-set"><img src="../assets/img/icons/delete.svg" alt="svg"></a>
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
<a href="../return/salesreturnlist.php" class="btn btn-cancel">Cancel</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<?php require_once '../includes/footer.php' ?>