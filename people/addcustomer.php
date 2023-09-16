<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Customer Management</h4>
<h6>Add Customer</h6>
</div>
</div>

<div class="card">
<div class="card-body">
<div class="row">
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Customer Name</label>
<input type="text" id="cusname" Name="cusname">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Email</label>
<input type="text" id="cusemail" Name="cusemail">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Phone</label>
<input type="number" id="cusphone" Name="cusphone" maxlength="10">
</div>
</div>
<div class="col-lg-12 col-12">
<div class="form-group">
<label>Address</label>
<input type="text" id="cusaddress" Name="cusadress">
</div>
</div>
<div class="col-lg-12">
<a class="btn btn-submit me-2" id="cusAdd">Submit</a>
</div>
</div>
</div>
</div>

</div>
</div>
</div>


<?php require_once '../includes/footer.php' ?>