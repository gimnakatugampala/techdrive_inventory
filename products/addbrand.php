<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Brand Add</h4>
                <h6>Create new Brand</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form id="addBrandForm">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Brand Name</label>
                                <input type="text" id="brandName" name="brandName">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" id="description" name="description"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <a class="btn btn-submit me-2" id="addBrandBtn">Submit</a>
                            <a class="btn btn-cancel" id="clearBrandBtn">Clear</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<?php require_once '../includes/footer.php' ?>