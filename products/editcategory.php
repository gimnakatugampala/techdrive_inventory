<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>

<?php
// Retrieve brand ID, brand name, and brand description from query parameters
$catname = isset( $_GET[ 'catname' ] ) ? $_GET[ 'catname' ] : '';
?>

<div class = 'page-wrapper'>
<div class = 'content'>
<div class = 'page-header'>
<div class = 'page-title'>
<h4>Product Edit Category</h4>
<h6>Edit a product Category</h6>
</div>
</div>

<div class = 'card'>
<div class = 'card-body'>
<div class = 'row'>
<div class = 'col-lg-3 col-sm-6 col-12'>
<div class = 'form-group'>
<label>Category Name</label>
<input type = 'text' id = 'catname' name = 'catname'
value = "<?php echo htmlspecialchars($_GET['catname']); ?>">
</div>
</div>
<div class = 'col-lg-12'>
<a class = 'btn btn-submit me-2' id = 'btnUpdateCat'>Update</a>
<a class = 'btn btn-cancel' id = 'clearCatBtn'>Clear</a>
</div>
<input type = 'hidden' id = 'catid' name = 'catid'
value = "<?php echo htmlspecialchars($_GET['catid']); ?>">

</div>
</div>
</div>

</div>
</div>
</div>

<?php require_once '../includes/footer.php' ?>