<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
    <ul>
    <li>
    <a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/dashboard/" || $_SERVER['REQUEST_URI'] == "/dashboard/") ? 'class="active"' : '';   ?>  href="../dashboard"><img src="../assets/img/icons/dashboard.svg" alt="img"><span> Dashboard</span> </a>
    </li>
    <li class="submenu">
    <a href="javascript:void(0);"><img src="../assets/img/icons/product.svg" alt="img"><span> Product</span> <span class="menu-arrow"></span></a>
    <ul>
    <li><a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/products/productlist.php" || $_SERVER['REQUEST_URI'] == "/products/productlist.php") ? 'class="active"' : '';   ?> href="../products/productlist.php">Product List</a></li>

    <li><a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/products/addproduct.php" || $_SERVER['REQUEST_URI'] == "/products/addproduct.php") ? 'class="active"' : '';   ?> href="../products/addproduct.php">Add Product</a></li>

    <li><a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/products/categorylist.php" || $_SERVER['REQUEST_URI'] == "/products/categorylist.php") ? 'class="active"' : '';   ?> href="../products/categorylist.php">Category List</a></li>

    <li><a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/products/addcategory.php" || $_SERVER['REQUEST_URI'] == "/products/addcategory.php") ? 'class="active"' : '';   ?> href="../products/addcategory.php">Add Category</a></li>

    <li><a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/products/subcategorylist.php" || $_SERVER['REQUEST_URI'] == "/products/subcategorylist.php") ? 'class="active"' : '';   ?> href="../products/subcategorylist.php">Sub Category List</a></li>

    <li><a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/products/subaddcategory.php" || $_SERVER['REQUEST_URI'] == "/products/subaddcategory.php") ? 'class="active"' : '';   ?> href="../products/subaddcategory.php">Add Sub Category</a></li>

    <li><a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/products/brandlist.php" || $_SERVER['REQUEST_URI'] == "/products/brandlist.php") ? 'class="active"' : '';   ?> href="../products/brandlist.php">Brand List</a></li>

    <li><a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/products/addbrand.php" || $_SERVER['REQUEST_URI'] == "/products/addbrand.php") ? 'class="active"' : '';   ?> href="../products/addbrand.php">Add Brand</a></li>
    </ul>
    </li>
    <li class="submenu">
    <a href="javascript:void(0);"><img src="../assets/img/icons/sales1.svg" alt="img"><span> Sales</span> <span class="menu-arrow"></span></a>
    <ul>
    <li><a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/sales/saleslist.php" || $_SERVER['REQUEST_URI'] == "/sales/saleslist.php") ? 'class="active"' : '';   ?> href="../sales/saleslist.php">Sales List</a></li>

    <li><a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/sales/completed-sales.php" || $_SERVER['REQUEST_URI'] == "/sales/completed-sales.php") ? 'class="active"' : '';   ?> href="../sales/completed-sales.php">Completed Sales</a></li>

    <li><a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/sales/pending-sales.php" || $_SERVER['REQUEST_URI'] == "/sales/pending-sales.php") ? 'class="active"' : '';   ?> href="../sales/pending-sales.php">Pending Sales</a></li>

    <li><a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/sales/canceled-sales.php" || $_SERVER['REQUEST_URI'] == "/sales/canceled-sales.php") ? 'class="active"' : '';   ?> href="../sales/canceled-sales.php">Canceled Sales</a></li>

    <li><a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/sales/add-sales.php" ||$_SERVER['REQUEST_URI'] == "/sales/add-sales.php") ? 'class="active"' : '';   ?> href="../sales/add-sales.php">Add Sales</a></li>
    </ul>
    </li>
    <li class="submenu">
    <a href="javascript:void(0);"><img src="../assets/img/icons/purchase1.svg" alt="img"><span> Purchase</span> <span class="menu-arrow"></span></a>
    <ul>
    <li><a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/purchase/purchaselist.php" || $_SERVER['REQUEST_URI'] == "/purchase/purchaselist.php") ? 'class="active"' : '';   ?> href="../purchase/purchaselist.php">Purchase List</a></li>

    <li><a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/purchase/addpurchase.php" || $_SERVER['REQUEST_URI'] == "/purchase/addpurchase.php") ? 'class="active"' : '';   ?> href="../purchase/addpurchase.php">Add Purchase</a></li>
    </ul>
    </li>

    <li class="submenu">
    <a href="javascript:void(0);"><img src="../assets/img/icons/quotation1.svg" alt="img"><span> Quotation</span> <span class="menu-arrow"></span></a>
    <ul>

    <li><a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/quotation/quotationList.php" || $_SERVER['REQUEST_URI'] == "/quotation/quotationList.php") ? 'class="active"' : '';   ?> href="../quotation/quotationList.php">Quotation List</a></li>

    <li><a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/quotation/addquotation.php" ||$_SERVER['REQUEST_URI'] == "/quotation/addquotation.php") ? 'class="active"' : '';   ?> href="../quotation/addquotation.php">Add Quotation</a></li>

    </ul>
    </li>
    <li class="submenu">
    <a href="javascript:void(0);"><img src="../assets/img/icons/return1.svg" alt="img"><span> Return</span> <span class="menu-arrow"></span></a>
    <ul>

    <li><a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/return/salesreturnlist.php" || $_SERVER['REQUEST_URI'] == "/return/salesreturnlist.php") ? 'class="active"' : '';   ?> href="../return/salesreturnlist.php">Sales Return List</a></li>

    <li><a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/return/createsalesreturn.php" || $_SERVER['REQUEST_URI'] == "/return/createsalesreturn.php") ? 'class="active"' : '';   ?> href="../return/createsalesreturn.php">Add Sales Return </a></li>

    <li><a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/return/purchasereturnlist.php" || $_SERVER['REQUEST_URI'] == "/return/purchasereturnlist.php") ? 'class="active"' : '';   ?> href="../return/purchasereturnlist.php">Purchase Return List</a></li>

    <li><a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/return/createpurchasereturn.php" || $_SERVER['REQUEST_URI'] == "/return/createpurchasereturn.php") ? 'class="active"' : '';   ?> href="../return/createpurchasereturn.php">Add Purchase Return </a></li>

    </ul>
    </li>
    <li class="submenu">
    <a href="javascript:void(0);"><img src="../assets/img/icons/users1.svg" alt="img"><span> People</span> <span class="menu-arrow"></span></a>
    <ul>

    <li><a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/people/customerlist.php" || $_SERVER['REQUEST_URI'] == "/people/customerlist.php") ? 'class="active"' : '';   ?> href="../people/customerlist.php">Customer List</a></li>

    <li><a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/people/addcustomer.php" || $_SERVER['REQUEST_URI'] == "/people/addcustomer.php") ? 'class="active"' : '';   ?> href="../people/addcustomer.php">Add Customer </a></li>

    <li><a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/people/supplierlist.php" || $_SERVER['REQUEST_URI'] == "/people/supplierlist.php") ? 'class="active"' : '';   ?> href="../people/supplierlist.php">Supplier List</a></li>

    <li><a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/people/addsupplier.php" || $_SERVER['REQUEST_URI'] == "/people/addsupplier.php") ? 'class="active"' : '';   ?> href="../people/addsupplier.php">Add Supplier </a></li>

    </ul>
    </li>
    <!-- <li class="submenu">
    <a href="javascript:void(0);"><img src="../assets/img/icons/settings.svg" alt="img"><span> Settings</span> <span class="menu-arrow"></span></a>
    <ul>
    <li><a <?php echo ($_SERVER['REQUEST_URI'] == "/inventory_tech_drive_lk/dashboard/generalsettings.php" || $_SERVER['REQUEST_URI'] == "/dashboard/generalsettings.php") ? 'class="active"' : '';   ?> href="../dashboard/generalsettings.php">General Settings</a></li>

    </ul>
    </li> -->
    </ul>
    </div>
    </div>
    </div>