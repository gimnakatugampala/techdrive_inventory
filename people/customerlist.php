﻿<?php require_once '../includes/header.php'; ?>
<?php require_once '../includes/sidebar.php'; ?>
<?php require_once '../pages/custoemrlists.php'; ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Customer List</h4>
<h6>Manage your Customers</h6>
</div>
<div class="page-btn">
<a href="../people/addcustomer.php" class="btn btn-added"><img src="../assets/img/icons/plus.svg" alt="img">Add Customer</a>
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
<a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="../assets/img/icons/pdf.svg" alt="img"></a>
</li>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="../assets/img/icons/excel.svg" alt="img"></a>
</li> -->
<li>
<a onclick="window.print()" data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="../assets/img/icons/printer.svg" alt="img"></a>
</li>
</ul>
</div>
</div>

<div class="card" id="filter_inputs">
<div class="card-body pb-0">
<div class="row">
<div class="col-lg-2 col-sm-6 col-12">
<div class="form-group">
<input type="text" placeholder="Enter Customer Code">
</div>
</div>
<div class="col-lg-2 col-sm-6 col-12">
<div class="form-group">
<input type="text" placeholder="Enter Customer Name">
</div>
</div>
<div class="col-lg-2 col-sm-6 col-12">
<div class="form-group">
<input type="text" placeholder="Enter Phone Number">
</div>
</div>
<div class="col-lg-2 col-sm-6 col-12">
<div class="form-group">
<input type="text" placeholder="Enter Email">
</div>
</div>
<div class="col-lg-1 col-sm-6 col-12  ms-auto">
<div class="form-group">
<a class="btn btn-filters ms-auto"><img src="../assets/img/icons/search-whites.svg" alt="img"></a>
</div>
</div>
</div>
</div>
</div>



<div class="table-responsive">
            <table class="table datanew customerlist">
                <thead>
                    <tr>
                    <th>Customer Name</th>
                    <th>Customer code</th>
                    <th>Phone</th>
                    <th>email</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach ($cus as $row) : ?>
                    <tr>
                    <td><?php echo  $row["cusname"]; ?></td>
                    <td><?php echo  $row["cuscode"]; ?></td>
                    <td><?php echo  $row["cusphone"]; ?></td>
                    <td><?php echo  $row["cusemail"]; ?></td>

                    <td>
                        <a class='me-3 btnedit' data-email="<?php echo  $row["cusemail"]; ?>" data-address="<?php echo  $row["cusaddress"]; ?>" data-email="" data-customer-id='<?php echo  $row["id"]; ?>'><img src='../assets/img/icons/edit.svg' alt='img'></a>
                        <a class='me-3 btn-delete' data-customer-id='<?php echo  $row["id"]; ?>'><img src='../assets/img/icons/delete.svg' alt='img'></a>
                    </td>
                <?php endforeach; ?>

                </tbody>
            </table>
            </div>
</div>
</div>

</div>
</div>

<?php require_once '../includes/footer.php'; ?>
