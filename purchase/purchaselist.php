<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>
<?php require_once '../pages/purchaselist.php' ?>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>PURCHASE LIST</h4>
                <h6>Manage your purchases</h6>
            </div>
            <div class="page-btn">
                <a href="../purchase/addpurchase.php" class="btn btn-added">
                    <img src="../assets/img/icons/plus.svg" alt="img">Add New Purchases
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-path">
                            <a class="btn btn-filter" id="filter_search">
                                <img src="../assets/img/icons/filter.svg" alt="img">
                                <span><img src="../assets/img/icons/closes.svg" alt="img"></span>
                            </a>
                        </div>
                        <div class="search-input">
                            <a class="btn btn-searchset"><img src="../assets/img/icons/search-white.svg" alt="img"></a>
                        </div>
                    </div>
                    <div class="wordset">
                        <ul>
                            <!-- <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                        src="../assets/img/icons/pdf.svg" alt="img"></a>
                            </li>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                        src="../assets/img/icons/excel.svg" alt="img"></a>
                            </li> -->
                            <li>
                                <a onclick="window.print()" data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                        src="../assets/img/icons/printer.svg" alt="img"></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card" id="filter_inputs">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="datetimepicker cal-icon" placeholder="Choose Date">
                                </div>
                            </div>
                            <div class="col-lg col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Reference">
                                </div>
                            </div>
                            <div class="col-lg col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Choose Supplier</option>
                                        <option>Supplier</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Choose Status</option>
                                        <option>Inprogress</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Choose Payment Status</option>
                                        <option>Payment Status</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-1 col-sm-6 col-12">
                                <div class="form-group">
                                    <a class="btn btn-filters ms-auto"><img src="../assets/img/icons/search-whites.svg"
                                            alt="img"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table datanew purchaselist">
                        <thead>
                            <tr>
                                <th>Order Code</th>
                                <th>Supplier Name</th>
                                <th>Placed Date</th>
                                <th>Status</th>
                                <th>Paid Status</th>
                                <th>Completed Date</th>
                                <th>Grand Total</th>
                                <th>Amount Paid</th>
                                <th>Discount</th>
                                <th>Due Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($plist as $row) : ?>
                        <tr>
                        <td><?php echo  $row["pocode"]; ?></td>
                        <td><?php echo  $row["supname"]; ?></td>
                        <td><?php echo  $row["created_date"]; ?></td>
                        <td><?php 
                        if($row["statusid"] == "1") {
                            echo "<span class='badges bg-lightgreen'>Completed</span>";
                        }else if($row["statusid"] == "2"){
                            echo "<span class='badges bg-primary'>Pending</span>";
                        }else if($row["statusid"] == "3"){
                            echo "<span class='badges bg-lightred'>Canceled</span>";
                        }else{
                            echo "<span class='badges bg-lightred'>Draft</span>";
                        }
                                ?>
                        </td>

                        <td><?php 

                        if($row["paid_status"] == "1") {
                            echo "<span class='badges bg-lightred'>Not Paid</span>";
                        }else if($row["paid_status"] == "2"){
                            echo "<span class='badges bg-lightyellow'>Advance</span>";
                        }else {
                            echo "<span class='badges bg-lightgreen'>Paid</span>";
                        }
                            ?></td>

                        <td><?php echo  $row["completeddate"]; ?></td>
                        <td><?php echo  $row["grandtotal"]; ?></td>
                        <td><?php echo  $row["paidamount"]; ?></td>
                        <td><?php echo  $row["discount"]; ?></td>
                        <td><?php echo  floatval($row["grandtotal"]) - floatval($row["paidamount"]); ?></td>
                        <td>
                            <a class="me-3" href="../purchase/purchase-order-details.php?code=<?php echo  $row["pocode"]; ?>">
                            <img src="../assets/img/icons/eye1.svg" alt="img">
                            </a>
                        
                            <?php 
                                if ($row["statusid"] == "2") {
                                    echo "<a href='../purchase/editpurchase.php?code={$row["pocode"]}' class='me-3 btnedit'><img src='../assets/img/icons/edit.svg' alt='img'></a>";
                                }
                            ?>


                            <!-- <a class='me-3 btn-delete' data-plist-id='${plist.id}'><img src='../assets/img/icons/delete.svg' alt='img'></a> -->
                            </td>
                        </tr>
                    <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
<?php require_once '../includes/footer.php' ?>