<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>


<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Edit Create Sales Return</h4>
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
          <select class="form-select" id="selectCus">
              <option value="0">Select Customer</option>
          </select>
      </div>
  </div>
</div>
</div>

<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Sale Date</label>
<div class="input-groupicon">
    <input type="text" placeholder="DD-MM-YYYY" class="datetimepicker" id="purchaseDate"
        name="purchaseDate">
    <div class="addonset">
        <img src="../assets/img/icons/calendars.svg" alt="img">
    </div>
</div>
</div>
</div>





<div class="col-lg-12 col-sm-6 col-12">
  <div class="form-group">
      <label for="status">Status</label>
      <select id="progressstatus" class="form-select">
          <option value="0">Choose Status</option>
      </select>
  </div>
</div>

<div class="col-lg-12">
<div class="form-group">
<label>Description</label>
<textarea id="description-sales-return" class="form-control"></textarea>
</div>
</div>

<div class="col-lg-12 col-sm-6 col-12">
    <div class="form-group">
        <label for="productcmb">Product Name</label>
        <select id="productcmb" class="form-select">
            <option value="0">Select Product</option>
        </select>
    </div>
</div>


</div>


<div class="row">
      <div class="table-responsive">
          <table class="table tbproductlist">
              <thead>
                  <tr>
                      <th>Product Name</th>
                      <th>QTY</th>
                      <th>Purchase Price(Rs)</th>
                      <th>Discount(Rs)</th>
                      <th class="text-end">Total Cost (Rs)</th>
                      <!-- <th>Action</th> -->
                  </tr>
              </thead>
              <tbody id="bodyESORL">
                  <!-- Rows will be added dynamically -->
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
<a class="btn btn-submit me-2">Update</a>
<a href="../return/salesreturnlist.php" class="btn btn-cancel">Cancel</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<?php require_once '../includes/footer.php' ?>