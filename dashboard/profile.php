<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>
<?php require_once '../pages/profiledata.php' ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Profile</h4>
<h6>User Profile</h6>
</div>
</div>

<div class="card">
<div  class="card-body">

<div class="row">
<div class="col-lg-6 col-sm-12">
<div class="form-group">
<label>First Name</label>
<input id="fname" value="<?php echo $user[0]['firstname']; ?>" type="text" >
</div>
</div>
<div class="col-lg-6 col-sm-12">
<div class="form-group">
<label>Last Name</label>
<input id="lname"  value="<?php echo $user[0]['lastname']; ?>" type="text">
</div>
</div>


<div class="col-lg-6 col-sm-12">
<div class="form-group">
<label>Password</label>
<div class="pass-group">
<input value="" id="passwordVal" type="password" class="pass-input">
<span class="fas toggle-password fa-eye-slash"></span>
</div>
</div>
</div>
<div class="col-lg-6 col-sm-12">
<div class="form-group">
<label>Confirm Password</label>
<div class="pass-group">
<input value="" id="conpasswordVal" type="password" class=" pass-input">
<span class="fas toggle-password fa-eye-slash"></span>
</div>
</div>
</div>
<div class="col-12">
<button id="updateProfile" class="btn btn-submit me-2">Update</button>
<a href="../dashboard/" class="btn btn-cancel">Cancel</a>
</div>
</div>
</div>
</div>

</div>
</div>
</div>


<?php require_once '../includes/footer.php' ?>