<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>

<?php
// Retrieve brand ID, brand name, and brand description from query parameters
$cusname = isset( $_GET[ 'cusname' ] ) ? $_GET[ 'cusname' ] : '';
$cusemail = isset( $_GET[ 'cusemail' ] ) ? $_GET[ 'cusemail' ] : '';
$cusphone = isset( $_GET[ 'cusphone' ] ) ? $_GET[ 'cusphone' ] : '';
$cusaddress = isset( $_GET[ 'cusaddress' ] ) ? $_GET[ 'cusaddress' ] : '';
?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Edit Customer Management</h4>
<h6>Edit Customer</h6>
</div>
</div>

<div class="card">
<div class="card-body">
<div class="row">
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Customer Name</label>
<input type="text" id="cusname" name="cusname"
value = "<?php echo htmlspecialchars($_GET['cusname']); ?>">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Email</label>
<input type="text" id="cusemail" name="cusemail"
value = "<?php echo htmlspecialchars($_GET['cusemail']); ?>">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Phone</label>
<input type="text" id="cusphone" name="cusphone"
value = "<?php echo htmlspecialchars($_GET['cusphone']); ?>">
</div>
</div>
<div class="col-lg-12 col-12">
<div class="form-group">
<label>Address</label>
<input type="text" id="cusaddress" name="cusaddress"
value = "<?php echo htmlspecialchars($_GET['cusaddress']); ?>">
</div>
</div>
<div class="col-lg-12">
<a class="btn btn-submit me-2" id="updateCustomer">Update</a>
</div>
<input type = 'hidden' id = 'cusid' name = 'cusid'
value = "<?php echo htmlspecialchars($_GET['cusid']); ?>">
</div>
</div>
</div>

</div>
</div>
</div>


<?php require_once '../includes/footer.php' ?>