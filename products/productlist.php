<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>

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
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="../assets/img/icons/pdf.svg" alt="img"></a>
</li>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="../assets/img/icons/excel.svg" alt="img"></a>
</li>
<li>
<a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="../assets/img/icons/printer.svg" alt="img"></a>
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
<table class="table  datanew">
<thead>
<tr>
<th>
<label class="checkboxs">
<input type="checkbox" id="select-all">
<span class="checkmarks"></span>
</label>
</th>
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
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td class="productimgname">
<a href="javascript:void(0);" class="product-img">
<img src="../assets/img/product/product1.jpg" alt="product">
</a>
<a href="javascript:void(0);">Macbook pro</a>
</td>
<td>3y</td>
<td>Computers</td>
<td>N/D</td>
<td>1500.00</td>
<td><span class="badges bg-lightgreen">InStock</span></td>
<td>100.00</td>
<td>90.00</td>
<td>
<a class="me-3" href="product-details.php">
<img src="../assets/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="editproduct.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>
<a class="confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
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
<img src="../assets/img/product/product2.jpg" alt="product">
</a>
<a href="javascript:void(0);">Orange</a>
</td>
<td>2y</td>
<td>Fruits</td>
<td>N/D</td>
<td>10.00</td>
<td><span class="badges bg-lightred">OutStock</span></td>
<td>100.00</td>
<td>90.00</td>
<td>
<a class="me-3" href="../products/product-details.php">
<img src="../assets/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="../products/editproduct.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>
<a class="confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
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
<img src="../assets/img/product/product3.jpg" alt="product">
</a>
<a href="javascript:void(0);">Pineapple</a>
</td>
<td>N/A</td>
<td>Fruits</td>
<td>N/D</td>
<td>10.00</td>
<td><span class="badges bg-lightred">OutStock</span></td>
<td>100.00</td>
<td>90.00</td>
<td>
<a class="me-3" href="../products/product-details.php">
<img src="../assets/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="../products/editproduct.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>
<a class="confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
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
<img src="../assets/img/product/product4.jpg" alt="product">
</a>
<a href="javascript:void(0);">Strawberry</a>
</td>
<td>N/A</td>
<td>Fruits</td>
<td>N/D</td>
<td>10.00</td>
<td><span class="badges bg-lightred">OutStock</span></td>
<td>100.00</td>
<td>90.00</td>
<td>
<a class="me-3" href="../products/product-details.php">
<img src="../assets/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="../products/editproduct.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>
<a class="confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
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
<td>1y</td>
<td>Accessories</td>
<td>N/D</td>
<td>10.00</td>
<td><span class="badges bg-lightred">OutStock</span></td>
<td>150.00</td>
<td>90.00</td>
<td>
<a class="me-3" href="../products/product-details.php">
<img src="../assets/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="../products/editproduct.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>
<a class="confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
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
<td>2y</td>
<td>Shoes</td>
<td>N/D</td>
<td>10.00</td>
<td><span class="badges bg-lightred">OutStock</span></td>
<td>100.00</td>
<td>90.00</td>
<td>
<a class="me-3" href="../products/product-details.php">
<img src="../assets/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="../products/editproduct.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>
<a class="confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
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
<td>5y</td>
<td>Shoes</td>
<td>N/D</td>
<td>10.00</td>
<td><span class="badges bg-lightred">OutStock</span></td>
<td>100.00</td>
 <td>90.00</td>
<td>
<a class="me-3" href="../products/product-details.php">
<img src="../assets/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="../products/editproduct.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>
<a class="confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
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
<td>9y</td>
<td>Fruits</td>
<td>N/D</td>
<td>10.00</td>
<td><span class="badges bg-lightred">OutStock</span></td>
<td>100.00</td>
<td>90.00</td>
<td>
<a class="me-3" href="../products/product-details.php">
<img src="../assets/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="../products/editproduct.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>
<a class="confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
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
<td>2y</td>
<td>Earphones</td>
<td>N/D</td>
<td>10.00</td>
<td><span class="badges bg-lightred">OutStock</span></td>
<td>100.00</td>
<td>90.00</td>
<td>
<a class="me-3" href="../products/product-details.php">
<img src="../assets/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="../products/editproduct.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>
<a class="confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
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
<img src="../assets/img/product/product11.jpg" alt="product">
</a>
<a href="javascript:void(0);">Banana</a>
</td>
<td>5y</td>
<td>Health Care	</td>
<td>N/D</td>
<td>10.00</td>
<td>kg</td>
<td>100.00</td>
<td>90.00</td>
<td>
<a class="me-3" href="../products/product-details.php">
<img src="../assets/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="../products/editproduct.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>
<a class="confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
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
<img src="../assets/img/product/product17.jpg" alt="product">
</a>
<a href="javascript:void(0);">Limon</a>
</td>
<td>2.5y</td>
<td>Health Care	</td>
<td>N/D</td>
<td>10.00</td>
<td>kg</td>
<td>100.00</td>
<td>90.00</td>
<td>
<a class="me-3" href="../products/product-details.php">
<img src="../assets/img/icons/eye.svg" alt="img">
</a>
<a class="me-3" href="../products/editproduct.php">
<img src="../assets/img/icons/edit.svg" alt="img">
</a>
<a class="confirm-text" href="javascript:void(0);">
<img src="../assets/img/icons/delete.svg" alt="img">
</a>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>

</div>
</div>
</div>


<?php require_once '../includes/footer.php' ?>