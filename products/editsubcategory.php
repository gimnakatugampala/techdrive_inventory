<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>

<?php
// Retrieve brand ID, brand name, and brand description from query parameters
$subcatname = isset( $_GET[ 'subcatname' ] ) ? $_GET[ 'subcatname' ] : '';
$subcatid = isset( $_GET[ 'subcatid' ] ) ? $_GET[ 'subcatid' ] : '';
?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Product Edit Sub Category</h4>
<h6>Create new product Category</h6>
</div>
</div>

<div class="card">
<div class="card-body">
<div class="row">
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Select Category Name</label>
<select class="form-select"  id="subcategorySelect">
<option value="0">Select a Sub Category</option>
</select>
</div>
</div>
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Sub Category Name</label>
<input type = 'text' id = 'subcatname' name = 'subcatname'
value = "<?php echo htmlspecialchars($_GET['subcatname']); ?>">
<input type = 'hidden' id = 'subcatid' name = 'subcatid'
value = "<?php echo htmlspecialchars($_GET['subcatid']); ?>">
</div>
</div>
<div class="col-lg-12">
<a class="btn btn-submit me-2" id="editSubCat">Submit</a>
</div>
<input type = 'hidden' id = 'id' name = 'id'
value = "<?php echo htmlspecialchars($_GET['id']); ?>">
</div>
</div>
</div>

</div>
</div>
</div>


<?php require_once '../includes/footer.php' ?>