<?php require_once '../includes/header.php'; ?>
<?php require_once '../includes/sidebar.php'; ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Product Add Sub Category</h4>
<h6>Create new product Category</h6>
</div>
</div>

<div class="card">
<div class="card-body">
<div class="row">
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Select Category Name</label>
<select class="form-select"  id="categorySelect">
<option value="0">Select a category</option>
</select>
</div>
</div>
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Sub Category Name</label>
<input type="text" id="subcatname" name="subcatname">
</div>
</div>
<div class="col-lg-12">
<a class="btn btn-submit me-2" id="addSubCat">Submit</a>
<a class="btn btn-cancel" id="clearSubCat">Cancel</a>
</div>
</div>
</div>
</div>

</div>
</div>
</div>


<?php require_once '../includes/footer.php'; ?>
