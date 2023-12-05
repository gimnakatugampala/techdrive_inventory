
  <?php require_once '../includes/header.php'; ?>
  <?php require_once '../includes/sidebar.php'; ?>

  <div class="page-wrapper">
    <div class="content">
      <div class="page-header">
        <div class="page-title">
          <h5>Update Purchase</h5>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <div class="row">
            <!-- Supplier Name Dropdown -->
            <div class="col-lg-6 col-sm-6 col-12">
              <div class="form-group">
                <label for="selectSup">Supplier Name</label>
                <div class="row">
                  <div class="col-lg-12 col-sm-10 col-10">
                    <select class="form-select" id="selectSup">
                      <option value="0">Select Supplier</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <!-- Purchase Date Input -->
            <div class="col-lg-6 col-sm-6 col-12">
              <div class="form-group">
                <label for="purchaseDate">Purchase Date</label>
                <div class="input-groupicon">
                  <input type="date" placeholder="DD-MM-YYYY" class="form-control" id="editpurchaseDate">
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

            <!-- Paid Amount Input -->
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label for="paidAmount">Paid Amount</label>
                <input type="number" id="paidAmountEditVal" >
              </div>
            </div>

            <!-- Status Dropdown -->
            <div class="col-lg-4 col-sm-6 col-12">
              <div class="form-group">
                <label for="progressstatus">Status</label>
                <select id="progressstatus" class="form-select">
                  <option value="0">Choose Status</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <!-- Table for Product List -->
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
              <tbody id="bodyEPL">
                <!-- Rows will be added dynamically -->
              </tbody>
            </table>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12 float-md-right">
            <div class="total-order">
              <ul>
                <li>
                  <h4>Grand Total</h4>
                  <h5 id="grandTotal">0.00</h5>
                  <h5 style="display: none;" id="editpo-grandTotal">0.00</h5>
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

        <!-- Submit and Cancel Buttons -->
        <div class="row p-3">
        <div id="SubmitBtnContainer" class="col-lg-2">
          <a class="btn btn-submit me-2" id="editpurchaseBtn">Update</a>
        </div>

        <div style="display: none;" class="col-lg-2" id="btn-loading">
          <a class="btn btn-submit btn-sm me-1" >
              <div class="spinner-border spinner-border-sm" role="status">
              <span class="visually-hidden">Loading...</span>
              </div>
              </a>
       </div>

         <div class="col-lg-2">
        <a href="../purchase/purchaselist.php" class="btn btn-cancel">Cancel</a>
       </div>

       </div>

      </div>
    </div>
  </div>

  <script src="../assets/js/jquery-3.6.0.min.js"></script>
  <script src="../assets/js/editpurchase.js"></script>

  <?php require_once '../includes/footer.php'; ?>