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
<!-- class="datetimepicker"  -->
<input type="date" placeholder="Choose Date" id="SalesReturnDate" class="form-control" >
<!-- <a class="addonset">
<img src="../assets/img/icons/calendars.svg" alt="img">
</a> -->
</div>
</div>
</div>


<!-- <div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">

<label>Paid Status</label>
<select class="select">
<option>Choose Paid Status</option>
<option>Not Paid</option>
<option>Advance</option>
<option>Paid</option>
</select>

</div>
</div> -->



<!-- <div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Paid Amount</label>
<input type="text">
</div>
</div> -->

<div class="col-lg-12 col-sm-12 col-12">
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
<textarea id="sales-return-desc" class="form-control"></textarea>
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
<div class="table-responsive mb-3">
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

<tbody id="bodySRL">

<!-- <tr>
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
</tr> -->


</tbody>
</table>
</div>
</div>


        <div class="row">
                    <div class="col-lg-12 float-md-right">
                        <div class="total-order">
                            <ul>
                            <li>
                                    <h4>Total</h4>
                                    <h5 id="totalsub">0.00</h5>
                                </li>
                               
                                <li>
                                    <h4>Total Discount</h4>
                                    <h5 id="dis">0.00</h5>
                                </li>
                                <li>
                                    <h4>Grand Total</h4>
                                    <h5 id="grandTotal">0.00</h5>
                                </li>
                                <!-- <li class="total">
                                    <h4>To Be Paid</h4>
                                    <h5 id="topaid">0.00</h5>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>

<div class="row">
<div class="col-lg-12">
<a id="addSaleReturn" class="btn btn-submit me-2">Submit</a>
<a href="../return/salesreturnlist.php" class="btn btn-cancel">Cancel</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<script src="../assets/js/jquery-3.6.0.min.js"></script>
<script src="../assets/js/addsalesreturn.js"></script>

<?php require_once '../includes/footer.php' ?>