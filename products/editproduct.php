<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>

<?php
$productname = isset( $_GET[ 'productname' ] ) ? $_GET[ 'productname' ] : '';
$warrenty = isset( $_GET[ 'warrenty' ] ) ? $_GET[ 'warrenty' ] : '';
$buyingprice = isset( $_GET[ 'buyingprice' ] ) ? $_GET[ 'buyingprice' ] : '';
$quantity = isset( $_GET[ 'quantity' ] ) ? $_GET[ 'quantity' ] : '';
$sellingprice = isset( $_GET[ 'sellingprice' ] ) ? $_GET[ 'sellingprice' ] : '';
$minquanity = isset( $_GET[ 'minquanity' ] ) ? $_GET[ 'minquanity' ] : '';
?>



<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Product Edit</h4>
<h6>Update your product</h6>
</div>
</div>

<div class="card">
<div class="card-body">
<div class="row">
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Product Name</label>
<input type="text" id="productname" name="productname" 
value = "<?php echo htmlspecialchars($_GET['productname']); ?>">
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Category</label>
<select class="form-select" id="Cat">
<option value="0">Choose Category</option>
</select>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Sub Category</label>
<select class="form-select" id="SubCat">
<option value="0">Choose Sub Category</option>
</select>
</div>
</div>
<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Brand</label>
<select class="form-select" id="Brand">
<option value="0">Choose Brand</option>
</select>
</div>
</div>

<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Warrenty</label>
<input type="text" id="warrenty" name="warrenty"
value = "<?php echo htmlspecialchars($_GET['warrenty']); ?>">
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Minimum Qty</label>
<input type="text" id="minquanity" name="minquanity"
value = "<?php echo htmlspecialchars($_GET['minquanity']); ?>">
</div>
</div>
<div class="col-lg-4 col-sm-6 col-12">
<div class="form-group">
<label>Quantity</label>
<input type="text" id="quantity" name="quantity"
value = "<?php echo htmlspecialchars($_GET['quantity']); ?>">
</div>
</div>

<div class="col-lg-3 col-sm-6 col-12">
<div class="form-group">
<label>Availablity</label>
<select class="form-select" id="Availablity">
<option value="1">In Stock</option>
<option value="2">Out of Stock</option>
</select>
</div>
</div>

<div class="col-lg-4 col-sm-6 col-12">
    <div class="form-group">
        <label>Selling Price</label>
        <input type="text" id="sellingprice" name="sellingprice"
value = "<?php echo htmlspecialchars($_GET['sellingprice']); ?>">
    </div>
</div>

<div class="col-lg-4 col-sm-6 col-12">
    <div class="form-group">
        <label>Buying Price</label>
        <input type="text" id="buyingprice" name="buyingprice"
value = "<?php echo htmlspecialchars($_GET['buyingprice']); ?>">
    </div>
</div>


<div class="col-lg-12">
<a class="btn btn-submit me-2" id="btneditproduct">Update</a>
<input type = 'hidden' id = 'pid' name = 'pid'
value = "<?php echo htmlspecialchars($_GET['pid']); ?>">

<input type = 'hidden' id = 'catid' name = 'catid'
value = "<?php echo htmlspecialchars($_GET['catid']); ?>">

<input type = 'hidden' id = 'scatid' name = 'scatid'
value = "<?php echo htmlspecialchars($_GET['scatid']); ?>">

<input type = 'hidden' id = 'avlid' name = 'avlid'
value = "<?php echo htmlspecialchars($_GET['avlid']); ?>">

<input type = 'hidden' id = 'bid' name = 'bid'
value = "<?php echo htmlspecialchars($_GET['bid']); ?>">


</div>
</div>
</div>
</div>

</div>
</div>
</div>


<?php require_once '../includes/footer.php' ?>