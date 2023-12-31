<?php require_once '../includes/header.php'; ?>
<?php require_once '../includes/sidebar.php'; ?>
<?php require_once '../pages/subcatlist.php'; ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Product Sub Category list</h4>
<h6>View/Search product Category</h6>
</div>
<div class="page-btn">
<a href="../products/subaddcategory.php" class="btn btn-added"><img src="../assets/img/icons/plus.svg" class="me-2" alt="img"> Add Sub Category</a>
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
<label>Category</label>
<select class="select">
<option>Choose Category</option>
<option>Computers</option>
</select>
</div>
</div>
<div class="col-lg-2 col-sm-6 col-12">
<div class="form-group">
<label>Sub Category</label>
<select class="select">
<option>Choose Sub Category</option>
<option>Fruits</option>
</select>
</div>
</div>
<div class="col-lg-2 col-sm-6 col-12">
<div class="form-group">
<label>Category Code</label>
<select class="select">
<option>CT001</option>
<option>CT002</option>
</select>
</div>
</div>
<div class="col-lg-1 col-sm-6 col-12 ms-auto">
<div class="form-group">
<label>&nbsp;</label>
<a class="btn btn-filters ms-auto"><img src="../assets/img/icons/search-whites.svg" alt="img"></a>
</div>
</div>
</div>
</div>
</div>

<div class="table-responsive">
<table class="table datanew subcatlist">
<thead>
<tr>
<th>Category</th>
<th>Sub Category</th>
<th>Sub Category Code</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php foreach ($subcats as $row) : ?>
    <tr>
    <td><?php echo  $row["catname"]; ?></td>
    <td><?php echo  $row["subcatname"]; ?></td>
    <td><?php echo  $row["subcatcode"]; ?></td>
   

    <td>
    <a class='me-3 btnedit'data-subcat-id='<?php echo  $row["cid"]; ?>'><img src='../assets/img/icons/edit.svg' alt='img'></a>
      <a class='me-3 btn-delete' data-subcat-id='<?php echo  $row["cid"]; ?>'><img src='../assets/img/icons/delete.svg' alt='img'></a>
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


<?php require_once '../includes/footer.php'; ?>
