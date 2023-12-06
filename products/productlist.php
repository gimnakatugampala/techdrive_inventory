<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>
<?php require_once '../pages/productlist.php' ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Product List</h4>
<h6>Manage your products</h6>
</div>
<div class="page-btn">
<a href="../products/addproduct.php" class="btn btn-added"><img src="../assets/img/icons/plus.svg" alt="img" class="me-1">Add New Product</a>
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

<div class="card mb-0" id="filter_inputs">
<div class="card-body pb-0">
<div class="row">
<div class="col-lg-12 col-sm-12">
<div class="row">
<div class="col-lg col-sm-6 col-12">
<div class="form-group">
<select class="select">
<option>Choose Product</option>
<option>Macbook pro</option>
<option>Orange</option>
</select>
</div>
</div>
<div class="col-lg col-sm-6 col-12">
<div class="form-group">
<select class="select">
<option>Choose Category</option>
<option>Computers</option>
<option>Fruits</option>
</select>
</div>
</div>
<div class="col-lg col-sm-6 col-12">
<div class="form-group">
<select class="select">
<option>Choose Sub Category</option>
<option>Computer</option>
</select>
</div>
</div>
<div class="col-lg col-sm-6 col-12">
<div class="form-group">
<select class="select">
<option>Brand</option>
<option>N/D</option>
</select>
</div>
</div>
<div class="col-lg col-sm-6 col-12 ">
<div class="form-group">
<select class="select">
<option>Price</option>
<option>150.00</option>
</select>
</div>
</div>
<div class="col-lg-1 col-sm-6 col-12">
<div class="form-group">
<a class="btn btn-filters ms-auto"><img src="../assets/img/icons/search-whites.svg" alt="img"></a>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="table-responsive">
<table class="table datanew tbplist">
<thead>
<tr>
<th>Product Name</th>
<th>Warrenty</th>
<th>Category </th>
<th>Brand</th>
<th>Buying Price</th>
<th>Availability</th>
<th>Qty</th>
<th>Selling Price</th>
<th>Action</th>
</tr>
</thead>
<tbody>
    
<?php foreach ($plist as $row) : ?>
        <tr>
         <td><?php echo  $row["productname"]; ?></td>
         <td><?php echo  $row["warrenty"]; ?></td>
         <td><?php echo  $row["catname"]; ?></td>
         <td><?php echo  $row["brandname"]; ?></td>
         <td><?php echo  $row["buyingprice"]; ?></td>
         <td><?php echo  $row["avlid"] == 1 ? "<span class='badges bg-lightgreen'>InStock</span>" : "<span class='badges bg-lightred'>OutStock</span>" ; ?></td>

         <td><?php echo  $row["quantity"]; ?></td>
         <td><?php echo  $row["sellingprice"]; ?></td>
         <td>
            <a class='me-3 btnedit' data-warrenty='<?php echo  $row["warrenty"]; ?>' data-buyingprice='<?php echo  $row["buyingprice"]; ?>' data-sellingprice='<?php echo  $row["sellingprice"]; ?>' data-avlid='<?php echo  $row["avlid"]; ?>' data-minqty='<?php echo  $row["minquanity"]; ?>' data-bid='<?php echo  $row["bid"]; ?>' data-scatid='<?php echo  $row["scatid"]; ?>'  data-catid='<?php echo  $row["catid"]; ?>' data-productlist-id='<?php echo  $row["id"]; ?>'><img src='../assets/img/icons/edit.svg' alt='img'></a>
             <a class='me-3 btn-delete' data-productlist-id='<?php echo  $row["id"]; ?>'><img src='../assets/img/icons/delete.svg' alt='img'></a>
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