<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Quotation Edit</h4>
<h6>Add/Update Quotation</h6>
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
<select class="form-select">
<option>Choose</option>
<option>Customer Name</option>
</select>
</div>
</div>
</div>
</div>

<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Quotation Date</label>
<div class="input-groupicon">
<input type="text" placeholder="Choose Date" class="datetimepicker">
<a class="addonset">
<img src="../assets/img/icons/calendars.svg" alt="img">
</a>
</div>
</div>
</div>

<div class="col-lg-12 col-sm-6 col-12">
<div class="form-group">
<label>Product Name</label>
<select id="edit-quotation-items-select" class="form-select"  aria-label="Default select example">
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
<th>Product</th>
<th>Price(Rs.)	</th>
<th>Qty</th>
<th>Discount( Rs. )	</th>
<th class="text-end">Subtotal (Rs.)</th>
<th></th>
</tr>
</thead>
<tbody id="table-edit-quotation-list">
<tr>
<td class="productimgname">
<a class="product-img">
<img src="../assets/img/product/product7.jpg" alt="product">
</a>
<a href="javascript:void(0);">Apple Earpods</a>
</td>
<td><input type="text" class="form-control" value="0.00"></td>
<td><input type="number" class="form-control" value="0.00"></td>
<td><input type="text" class="form-control" value="0.00"></td>
<td class="text-end">500</td>
<td>
<a href="javascript:void(0);" class="delete-set"><img src="../assets/img/icons/delete.svg" alt="svg"></a>
</td>
</tr>
<tr>
<td class="productimgname">
<a class="product-img">
<img src="../assets/img/product/product6.jpg" alt="product">
</a>
<a href="javascript:void(0);">Macbook Pro</a>
</td>
<td><input type="text" class="form-control" value="0.00"></td>
<td><input type="number" class="form-control" value="0.00"></td>
<td><input type="text" class="form-control" value="0.00"></td>
<td class="text-end">1000.00</td>
<td>
<a href="javascript:void(0);" class="delete-set"><img src="../assets/img/icons/delete.svg" alt="svg"></a>
</td>
</tr>
</tbody>
</table>
</div>
</div>


<div class="row">
<div class="col-lg-6 ">
<div class="total-order w-100 max-widthauto m-auto mb-4">

</div>
</div>
<div class="col-lg-6 ">
<div class="total-order w-100 max-widthauto m-auto mb-4">
<ul>
<li>
<h4>Discount</h4>
<h5>Rs. 0.00</h5>
</li>

<li>
<h4>Sub Total</h4>
<h5>Rs. 0.00</h5>
</li>

<li class="total">
<h4>Grand Total</h4>
<h5>Rs. 0.00</h5>
</li>

</ul>
</div>
</div>
</div>


<div class="row">




<div class="col-lg-12">
<a href="javascript:void(0);" class="btn btn-submit me-2">Update</a>
<a href="../quotation/quotationList.php" class="btn btn-cancel">Cancel</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<?php require_once '../includes/footer.php' ?>