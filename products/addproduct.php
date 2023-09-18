<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>


<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Product Add</h4>
                <h6>Create new product</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" id="pname" name="pname">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-select" id="selectCat">
                                <option value="0">Choose Category</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Sub Category</label>
                            <select class="form-select" id="selectSubCat">
                                <option value="0">Choose Sub Category</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group" >
                            <label>Brand</label>
                            <select class="form-select" id="selectBrand">
                                <option value="0">Choose Brand</option>
                            </select>
                        </div>
                    </div>

                  
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Warrenty</label>
                            <input type="number" id="warrenty" name="warrenty">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Minimum Qty</label>
                            <input type="number" id="mqty" name="mqty">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="number" id="qty" name="qty">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Availablity</label>
                            <select class="form-select" id="cmbavailablity">
                                <option value="1">In Stock</option>
                                <option value="2">Out of Stock</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Selling Price</label>
                            <input type="number" id="sprice" name="sprice">
                        </div>
                    </div>

                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Buying Price</label>
                            <input type="number" id="bprice" name="bprice">
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <a class="btn btn-submit me-2" id="addproduct">Submit</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<?php require_once '../includes/footer.php' ?>