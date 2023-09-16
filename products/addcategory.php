<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>

<div class="page-wrapper">
        <div class="content">
                <div class="page-header">
                        <div class="page-title">
                                <h4>Product Add Category</h4>
                                <h6>Create new product Category</h6>
                        </div>
                </div>

                <div class="card">
                        <div class="card-body">
                                <div class="row">
                                        <div class="col-lg-12 col-sm-12 col-12">
                                                <div class="form-group">
                                                        <label>Category Name</label>
                                                        <input type="text" id="catname" name="catname">
                                                </div>
                                        </div>
                                        <div class="col-lg-12">
                                                <div class="form-group">
                                                        <label>Description</label>
                                                        <textarea class="form-control" id="catdis"
                                                                name="catdis"></textarea>
                                                </div>
                                        </div>
                                        <div class="col-lg-12">
                                                <a href="javascript:void(0);" class="btn btn-submit me-2"
                                                        id="addCat">Submit</a>
                                                <a href="../products/categorylist.php" class="btn btn-cancel"
                                                        id="clearCat">Cancel</a>
                                        </div>
                                </div>
                        </div>
                </div>

        </div>
</div>
</div>

<?php require_once '../includes/footer.php' ?>