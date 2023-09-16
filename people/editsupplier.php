<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>

<?php
// Retrieve brand ID, brand name, and brand description from query parameters
$supname = isset( $_GET[ 'supname' ] ) ? $_GET[ 'supname' ] : '';
$supemail = isset( $_GET[ 'supemail' ] ) ? $_GET[ 'supemail' ] : '';
$supphone = isset( $_GET[ 'supphone' ] ) ? $_GET[ 'supphone' ] : '';
$supaddress = isset( $_GET[ 'supaddress' ] ) ? $_GET[ 'supaddress' ] : '';
?>


<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Supplier Management</h4>
<h6>Edit/Update Customer</h6>
</div>
</div>

<div class="card">
<div class="card-body">
<div class="row">
<div class="col-lg-6 col-sm-6 col-12">
<div class="form-group">
<label>Supplier Name</label>
<input type="text" id="supname" name="supname"
value = "<?php echo htmlspecialchars($_GET['supname']); ?>">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Email</label>
<input type="text" id="supemail" name="supemail"
value = "<?php echo htmlspecialchars($_GET['supemail']); ?>">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Phone</label>
<input type="number" id="supphone" name="supphone"
value = "<?php echo htmlspecialchars($_GET['supphone']); ?>">
</div>
</div>

<div class="col-lg-12 col-12">
<div class="form-group">
<label>Address</label>
<input type="text" id="supaddress" name="supaddress"
value = "<?php echo htmlspecialchars($_GET['supaddress']); ?>">
</div>
</div>

<div class="col-lg-12">
<a class="btn btn-submit me-2" id="updateSup">Update</a>
</div>
<input type = 'hidden' id = 'supid' name = 'supid'
value = "<?php echo htmlspecialchars($_GET['supid']); ?>">
</div>
</div>
</div>

</div>
</div>
</div>


<?php require_once '../includes/footer.php' ?>