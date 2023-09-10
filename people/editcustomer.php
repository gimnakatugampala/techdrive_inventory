<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Edit Customer Management</h4>
<h6>Edit/Update Customer</h6>
</div>
</div>

<div class="card">
<div class="card-body">
<div class="row">
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Customer Name</label>
<input type="text" value="Thomas">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Email</label>
<input type="text" value="Thomas@example.com">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Phone</label>
<input type="text" value="+12163547758 ">
</div>
</div>
<!-- <div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Choose Country</label>
<select class="select">
<option>United States</option>
<option>India</option>
</select>
</div>
</div> -->
<!-- <div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>City</label>
<select class="select">
<option>Newyork</option>
<option>City</option>
</select>
</div>
</div> -->
<div class="col-lg-12 col-12">
<div class="form-group">
<label>Address</label>
<input type="text" value="132, My Street, Kingston, New York ">
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<label>Description</label>
<textarea class="form-control">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text </textarea>
</div>
</div>
<div class="col-lg-12">
<a class="btn btn-submit me-2">Update</a>
<a class="btn btn-cancel">Cancel</a>
</div>
</div>
</div>
</div>

</div>
</div>
</div>


<?php require_once '../includes/footer.php' ?>