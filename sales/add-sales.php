<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Add</title>
    <!-- Add your CSS and JavaScript includes here -->
</head>

<body>
    <?php require_once '../includes/header.php'; ?>
    <?php require_once '../includes/sidebar.php'; ?>

    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Add Sale</h4>
                    <h6>Add your new sale</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- Supplier Name Dropdown -->
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="selectSup">Customer Name</label>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-10 col-10">
                                        <select class="form-select" id="selectCus">
                                            <option value="0">Select Customer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Purchase Date Input -->
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="purchaseDate">Sale Date</label>
                                <div class="input-groupicon">
                                    <input type="text" placeholder="DD-MM-YYYY" class="datetimepicker" id="purchaseDate"
                                        name="purchaseDate">
                                    <div class="addonset">
                                        <img src="../assets/img/icons/calendars.svg" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Name Dropdown -->
                    <div class="col-lg-12 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="productcmb">Product Name</label>
                            <select id="productcmb" class="form-select">
                                <option value="0">Select Product</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Paid Status Dropdown -->
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="paidStatus">Paid Status</label>
                                <select id="paidStatus" class="form-select">
                                    <option value="0">Choose Paid Status</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="paidAmount">Paid Amount</label>
                                <input type="number" id="paidAmount" name="paidAmount">
                            </div>
                        </div>

                        <!-- Status Dropdown -->
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select id="progressstatus" class="form-select">
                                    <option>Choose Status</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="table-responsive">
                        <table class="table tbproductlist">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>QTY</th>
                                    <th>Purchase Price(Rs)</th>
                                    <th>Discount(Rs)</th>
                                    <th class="text-end">Total Cost (Rs)</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody id="bodySL">
                                <!-- Rows will be added dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Total Order Section -->
                <div class="row">
                    <div class="col-lg-12 float-md-right">
                        <div class="total-order">
                            <ul>
                                <li>
                                    <h4>Grand Total</h4>
                                    <h5 id="grandTotal">0.00</h5>
                                </li>
                                <li>
                                    <h4>Paid Amount</h4>
                                    <h5 id="paid">0.00</h5>
                                </li>
                                <li style="display:none;">
                                    <h4>discount</h4>
                                    <h5 id="dis">0.00</h5>
                                </li>
                                <li class="total">
                                    <h4>To Be Paid</h4>
                                    <h5 id="topaid">0.00</h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="SubmitBtnContainer"  class="col-lg-2 m-3">
                    <a class="btn btn-submit me-2 text-center" id="addSale">Submit</a>
                </div>

                <div style="display: none;"  class="col-md-2 m-3" id="btn-loading">
                <a class="btn btn-submit btn-sm me-2" >
                    <div class="spinner-border spinner-border-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/addsale.js"></script>
    <?php require_once '../includes/footer.php'; ?>

    <!-- Include your JavaScript file here -->
</body>

</html>