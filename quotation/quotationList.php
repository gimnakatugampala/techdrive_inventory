<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>
<?php require_once '../pages/quotationlist.php' ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Quotation List</h4>
<h6>Manage your Quotations</h6>
</div>
<div class="page-btn">
<a href="../quotation/addquotation.php" class="btn btn-added">
<img src="../assets/img/icons/plus.svg" alt="img" class="me-2"> Add Quotation
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
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="../assets/img/icons/pdf.svg" alt="img"></a>
</li>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="../assets/img/icons/excel.svg" alt="img"></a>
</li>
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
<input type="text" class="datetimepicker cal-icon" placeholder="Choose Date">
</div>
</div>
<div class="col-lg-2 col-sm-6 col-12">
<div class="form-group">
<input type="text" placeholder="Enter Reference ">
</div>
</div>
<div class="col-lg-2 col-sm-6 col-12">
<div class="form-group">
<select class="select">
<option>Choose Customer</option>
<option>Customer1</option>
</select>
</div>
</div>
<div class="col-lg-2 col-sm-6 col-12">
<div class="form-group">
<select class="select">
<option>Choose Status</option>
<option>Inprogress</option>
<option>Complete</option>
</select>
</div>
</div>
<div class="col-lg-1 col-sm-6 col-12 ms-auto">
<div class="form-group">
<a class="btn btn-filters ms-auto"><img src="../assets/img/icons/search-whites.svg" alt="img"></a>
</div>
</div>
</div>
</div>
</div>

<div class="table-responsive">
<table class="table datanew quotationlist">
<thead>
<tr>
<th>Quotation Code</th>
<th>Customer Name</th>
<th>Placed Date</th>
<th>Status</th>
<th>Grand Total ( Rs.)</th>
<th>Action</th>
</tr>
</thead>
<tbody >

<?php foreach ($plist as $row) : ?>
    <tr>
    <td><?php echo  $row["socode"]; ?></td>
    <td><?php echo  $row["cusname"]; ?></td>
    <td><?php echo  $row["salesorderdate"]; ?></td>
    <td><?php 
    if($row["sid"] == "1") {
        echo "<span class='badges bg-lightgreen'>Completed</span>";
    }else if($row["sid"] == "2"){
        echo "<span class='badges bg-primary'>Pending</span>";
    }else if($row["sid"] == "3"){
        echo "<span class='badges bg-lightred'>Canceled</span>";
    }else if($row["sid"] == "4"){
        echo "<span class='badges bg-primary'>Draft</span>";
    }
            ?>
    </td>



    
    <td><?php echo  $row["grandtotal"]; ?></td>
    <td>
    
    <a class="me-3" href="../quotation/quotation-detail.php?code=<?php echo  $row["socode"]; ?>">
        <img src="../assets/img/icons/eye1.svg" alt="img">
    </a>
    
    <a class="me-3 confirm-text" href="javascript:void(0);">
        <i class="fas fa-exchange-alt fa-lg"></i>
    </a>
    
    <a class="me-3" href="../quotation/editquotation.php?code=<?php echo  $row["socode"]; ?>">
    <img src="../assets/img/icons/edit.svg" alt="img">
    </a>
    
    <a class="me-3 confirm-text" href="javascript:void(0);">
    <img src="../assets/img/icons/delete.svg"  alt="img">
    </a>
    
    
    </td>
    </tr>
<?php endforeach; ?>

<!-- 
<tr>
<td class="productimgname">
<a href="javascript:void(0);">Macbook pro</a>
</td>
<td>PT001</td>
<td>walk-in-customer</td>
<td><span class="badges bg-lightgreen">Sent</span></td>
<td>550</td>
<td>
    
<a class="me-3" href="../quotation/quotation-detail.php">
    <img src="../assets/img/icons/eye1.svg" alt="img">
</a>

<a class="me-3 confirm-text" href="javascript:void(0);">
    <i class="fas fa-exchange-alt fa-lg"></i>
</a>

<a class="me-3" href="../quotation/editquotation.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>

<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg"  alt="img">
</a>


</td>
</tr> -->

<!-- <tr>
<td class="productimgname">
<a href="javascript:void(0);">Orange</a>
</td>
<td>PT002</td>
<td>walk-in-customer</td>
<td><span class="badges bg-lightyellow">Ordered</span></td>
<td>410</td>
<td>

<a class="me-3" href="../quotation/quotation-detail.php">
    <img src="../assets/img/icons/eye1.svg" alt="img">
</a>

<a class="me-3 confirm-text" href="javascript:void(0);">
    <i class="fas fa-exchange-alt fa-lg"></i>
</a>

<a class="me-3" href="../quotation/editquotation.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>

<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg"  alt="img">
</a>


</td>
</tr> -->

<!-- <tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td class="productimgname">
<a href="javascript:void(0);" class="product-img">
<img src="../assets/img/product/product4.jpg" alt="product">
</a>
<a href="javascript:void(0);">Stawberry</a>
</td>
<td>PT003</td>
<td>walk-in-customer</td>
<td><span class="badges bg-lightred">Pending</span></td>
<td>210</td>
<td>


<a class="me-3" href="../quotation/quotation-detail.php">
    <img src="../assets/img/icons/eye1.svg" alt="img">
</a>

<a class="me-3 confirm-text" href="javascript:void(0);">
    <i class="fas fa-exchange-alt fa-lg"></i>
</a>

<a class="me-3" href="../quotation/editquotation.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>

<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg"  alt="img">
</a>

</td>
</tr>
<tr>
<td>
<label class="checkboxs">
 <input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td class="productimgname">
<a href="javascript:void(0);" class="product-img">
<img src="../assets/img/product/product5.jpg" alt="product">
</a>
<a href="javascript:void(0);">Avocat</a>
</td>
<td>PT004</td>
<td>John Smith</td>
<td><span class="badges bg-lightgreen">Sent</span></td>
<td>500</td>
<td>

<a class="me-3" href="../quotation/quotation-detail.php">
    <img src="../assets/img/icons/eye1.svg" alt="img">
</a>

<a class="me-3 confirm-text" href="javascript:void(0);">
    <i class="fas fa-exchange-alt fa-lg"></i>
</a>

<a class="me-3" href="../quotation/editquotation.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>

<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg"  alt="img">
</a>


</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td class="productimgname">
<a href="javascript:void(0);" class="product-img">
<img src="../assets/img/product/product6.jpg" alt="product">
</a>
<a href="javascript:void(0);">Macbook Pro</a>
</td>
<td>PT005</td>
<td>Beverly</td>
<td><span class="badges bg-lightred">Pending</span></td>
<td>1050</td>
<td>


<a class="me-3" href="../quotation/quotation-detail.php">
    <img src="../assets/img/icons/eye1.svg" alt="img">
</a>

<a class="me-3 confirm-text" href="javascript:void(0);">
    <i class="fas fa-exchange-alt fa-lg"></i>
</a>

<a class="me-3" href="../quotation/editquotation.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>

<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg"  alt="img">
</a>


</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td class="productimgname">
<a href="javascript:void(0);" class="product-img">
<img src="../assets/img/product/product7.jpg" alt="product">
</a>
<a href="javascript:void(0);">Apple Earpods</a>
</td>
<td>PT006</td>
<td>B. Huber</td>
<td><span class="badges bg-lightgreen">Sent</span></td>
<td>2530</td>
<td>
<a class="me-3" href="../quotation/quotation-detail.php">
    <img src="../assets/img/icons/eye1.svg" alt="img">
</a>

<a class="me-3 confirm-text" href="javascript:void(0);">
    <i class="fas fa-exchange-alt fa-lg"></i>
</a>

<a class="me-3" href="../quotation/editquotation.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>

<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg"  alt="img">
</a>


</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td class="productimgname">
<a href="javascript:void(0);" class="product-img">
<img src="../assets/img/product/product8.jpg" alt="product">
</a>
<a href="javascript:void(0);">iPhone 11	</a>
</td>
<td>PT007</td>
<td>Thomas</td>
<td><span class="badges bg-lightgreen">Sent</span></td>
<td>550</td>
<td>

<a class="me-3" href="../quotation/quotation-detail.php">
    <img src="../assets/img/icons/eye1.svg" alt="img">
</a>

<a class="me-3 confirm-text" href="javascript:void(0);">
    <i class="fas fa-exchange-alt fa-lg"></i>
</a>

<a class="me-3" href="../quotation/editquotation.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>

<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg"  alt="img">
</a>


</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td class="productimgname">
<a href="javascript:void(0);" class="product-img">
<img src="../assets/img/product/product9.jpg" alt="product">
</a>
<a href="javascript:void(0);">samsung	</a>
</td>
<td>PT008</td>
<td>Benjamin</td>
<td><span class="badges bg-lightgreen">Ordered</span></td>
<td>550</td>
<td>

<a class="me-3" href="../quotation/quotation-detail.php">
    <img src="../assets/img/icons/eye1.svg" alt="img">
</a>

<a class="me-3 confirm-text" href="javascript:void(0);">
    <i class="fas fa-exchange-alt fa-lg"></i>
</a>

<a class="me-3" href="../quotation/editquotation.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>

<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg"  alt="img">
</a>


</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td class="productimgname">
<a href="javascript:void(0);" class="product-img">
<img src="../assets/img/product/product10.jpg" alt="product">
</a>
<a href="javascript:void(0);">Unpaired gray</a>
</td>
<td>PT0010</td>
<td>James</td>
<td><span class="badges bg-lightred">Pending</span></td>
<td>210</td>
<td>

<a class="me-3" href="../quotation/quotation-detail.php">
    <img src="../assets/img/icons/eye1.svg" alt="img">
</a>

<a class="me-3 confirm-text" href="javascript:void(0);">
    <i class="fas fa-exchange-alt fa-lg"></i>
</a>

<a class="me-3" href="../quotation/editquotation.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>

<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg"  alt="img">
</a>

</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td class="productimgname">
<a href="javascript:void(0);" class="product-img">
<img src="../assets/img/product/product7.jpg" alt="product">
</a>
<a href="javascript:void(0);">Apple Earpods</a>
</td>
<td>PT006</td>
<td>B. Huber</td>
<td><span class="badges bg-lightgreen">Sent</span></td>
<td>2530</td>
<td>

<a class="me-3" href="../quotation/quotation-detail.php">
    <img src="../assets/img/icons/eye1.svg" alt="img">
</a>

<a class="me-3 confirm-text" href="javascript:void(0);">
    <i class="fas fa-exchange-alt fa-lg"></i>
</a>

<a class="me-3" href="../quotation/editquotation.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>

<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg"  alt="img">
</a>


</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td class="productimgname">
<a href="javascript:void(0);" class="product-img">
<img src="../assets/img/product/product8.jpg" alt="product">
</a>
<a href="javascript:void(0);">iPhone 11	</a>
</td>
<td>PT007</td>
<td>Thomas</td>
<td><span class="badges bg-lightgreen">Sent</span></td>
<td>550</td>
<td>


<a class="me-3" href="../quotation/quotation-detail.php">
    <img src="../assets/img/icons/eye1.svg" alt="img">
</a>

<a class="me-3 confirm-text" href="javascript:void(0);">
    <i class="fas fa-exchange-alt fa-lg"></i>
</a>

<a class="me-3" href="../quotation/editquotation.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>

<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg"  alt="img">
</a>


</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td class="productimgname">
<a href="javascript:void(0);" class="product-img">
<img src="../assets/img/product/product9.jpg" alt="product">
</a>
<a href="javascript:void(0);">samsung	</a>
</td>
 <td>PT008</td>
<td>Benjamin</td>
<td><span class="badges bg-lightgreen">Ordered</span></td>
<td>550</td>
<td>


<a class="me-3" href="../quotation/quotation-detail.php">
    <img src="../assets/img/icons/eye1.svg" alt="img">
</a>

<a class="me-3 confirm-text" href="javascript:void(0);">
    <i class="fas fa-exchange-alt fa-lg"></i>
</a>

<a class="me-3" href="../quotation/editquotation.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>

<a class="me-3 confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg"  alt="img">
</a>


</td>
</tr> -->
</tbody>
</table>
</div>
</div>
</div>

</div>
</div>
</div>


<?php require_once '../includes/footer.php' ?>