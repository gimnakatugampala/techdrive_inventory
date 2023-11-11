<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>

<?php
$brandName = isset( $_GET[ 'brandName' ] ) ? $_GET[ 'brandName' ] : '';
$brandDescription = isset( $_GET[ 'brandDescription' ] ) ? $_GET[ 'brandDescription' ] : '';
?>

<div class = 'page-wrapper'>
<div class = 'content'>
<div class = 'page-header'>
<div class = 'page-title'>
<h4>Brand Edit</h4>
<h6>Update your Brand</h6>
</div>
</div>

<div class = 'card'>
<div class = 'card-body'>
<div class = 'row'>
<div class = 'col-lg-3 col-sm-6 col-12'>
<div class = 'form-group'>
<label>Brand Name</label>
<input type = 'text' id = 'brandName' name = 'brandName'
value = "<?php echo htmlspecialchars($_GET['brandName']); ?>">
</div>
</div>
<div class = 'col-lg-12'>
<div class = 'form-group'>
<label>Description</label>
<textarea  id = 'brandDescription' name = 'brandDescription'

class = 'form-control'><?php echo htmlspecialchars($_GET[ 'brandDescription' ]);?></textarea>
</div>
</div>
<div class = 'col-lg-12'>
<a class = 'btn btn-submit me-2' id = 'btnUpdate'>Update</a>
<a class = 'btn btn-cancel' id = 'clearBrandBtn'>Clear</a>
</div>
<input type = 'hidden' id = 'brandId' name = 'brandId'
value = "<?php echo htmlspecialchars($_GET['brandId']); ?>">

</div>
</div>
</div>

</div>
</div>
</div>

<?php require_once '../includes/footer.php' ?>