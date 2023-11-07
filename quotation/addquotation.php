<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>


<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Quotation Add</h4>
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
<select class="form-select" id="selectCus">
<option value="0">Select Customer</option>
</select>
</div>
</div>
</div>
</div>

<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Quotation Date</label>
<div class="input-groupicon">
<input type="text" placeholder="Choose Date" id="quotationdate" class="datetimepicker">
<a class="addonset">
<img src="../assets/img/icons/calendars.svg" alt="img">
</a>
</div>
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
</tr>
</thead>
<tbody id="bodyQL">

<!-- <tr>
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
</tr> -->

<!-- <tr>
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
                            <h4>Grand Total</h4>
                            <h5 id="grandTotal">0.00</h5>
                        </li>
                        <li style="display:none;">
                            <h4>Paid Amount</h4>
                            <h5 id="paid">0.00</h5>
                        </li>
                        <li style="display:none;">
                            <h4>discount</h4>
                            <h5 id="dis">0.00</h5>
                        </li>
                        <li class="total">
                            <h4>To Be Paid</h4>
                            <h5 id="topaid">0.00</h5>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

<div class="row">

<div class="col-lg-12">
<a id="addQuotation" class="btn btn-submit me-2">Submit</a>
<a href="../quotation/quotationList.php" class="btn btn-cancel">Cancel</a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>


<?php require_once '../includes/footer.php' ?>