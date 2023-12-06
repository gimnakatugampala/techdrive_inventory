<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>
<?php require_once '../pages/dashboadcontent.php' ?>

<!-- Content -->
<div class="page-wrapper">
<div class="content">
<div class="row">

<div class="col-lg-3 col-sm-6 col-12">
<div class="dash-widget">
<div class="dash-widgetimg">
<span><img src="../assets/img/icons/dash1.svg" alt="img"></span>
</div>
<div class="dash-widgetcontent">
<h5>Rs.<span class="counters" data-count="<?php echo $total_por;?>">Rs.<?php echo $total_por;?></span></h5>
<h6>Total PO Return</h6>
</div>
</div>
</div>

<div class="col-lg-3 col-sm-6 col-12">
<div class="dash-widget dash1">
<div class="dash-widgetimg">
<span><img src="../assets/img/icons/dash2.svg" alt="img"></span>
</div>
<div class="dash-widgetcontent">
<h5>Rs.<span class="counters" data-count="<?php echo $total_sor;?>">Rs.<?php echo $total_sor;?></span></h5>
<h6>Total SO Return</h6>
</div>
</div>
</div>


<div class="col-lg-3 col-sm-6 col-12">
<div class="dash-widget dash2">
<div class="dash-widgetimg">
<span><img src="../assets/img/icons/dash3.svg" alt="img"></span>
</div>
<div class="dash-widgetcontent">
<h5>Rs.<span class="counters" data-count="<?php echo $total_po;?>">Rs.<?php echo $total_po;?></span></h5>
<h6>Total PO Amount</h6>
</div>
</div>
</div>


<div class="col-lg-3 col-sm-6 col-12">
<div class="dash-widget dash3">
<div class="dash-widgetimg">
<span><img src="../assets/img/icons/dash4.svg" alt="img"></span>
</div>
<div class="dash-widgetcontent">
<h5>Rs.<span class="counters" data-count="<?php echo $total_so ;?>">Rs.<?php echo $total_so;?>.00</span></h5>
<h6>Total Sale Amount</h6>
</div>
</div>
</div>


<a  href="../people/customerlist.php" class="col-lg-3 col-sm-6 col-12 d-flex">
<div class="dash-count">
<div class="dash-counts">
<h4><?php echo $count_customer;?></h4>
<h5>Customers</h5>
</div>
<div class="dash-imgs">
<i data-feather="user"></i>
</div>
</div>
</a>


<a href="../people/supplierlist.php" class="col-lg-3 col-sm-6 col-12 d-flex">
<div class="dash-count das1">
<div class="dash-counts">
<h4><?php echo $count_supplier;?></h4>
<h5>Suppliers</h5>
</div>
<div class="dash-imgs">
<i data-feather="user-check"></i>
</div>
</div>
</a>


<a href="../purchase/purchaselist.php" class="col-lg-3 col-sm-6 col-12 d-flex">
<div class="dash-count das2">
<div class="dash-counts">
<h4><?php echo $count_po;?></h4>
<h5>Purchase Invoice</h5>
</div>
<div class="dash-imgs">
<i data-feather="file-text"></i>
</div>
</div>
</a>


<a href="../sales/saleslist.php" class="col-lg-3 col-sm-6 col-12 d-flex">
<div class="dash-count das3">
<div class="dash-counts">
<h4><?php echo $count_so;?></h4>
<h5>Sales Invoice</h5>
</div>
<div class="dash-imgs">
<i data-feather="file"></i>
</div>
</div>
</a>


</div>

<div class="row">
<div class="col-lg-7 col-sm-12 col-12 d-flex">
<div class="card flex-fill">

<div class="card-body">
<div id="chartContainer" ></div>
</div>
</div>
</div>

<div class="col-lg-5 col-sm-12 col-12 d-flex">
<div class="card flex-fill">
<div class="card-header pb-0 d-flex justify-content-between align-items-center">
<h4 class="card-title mb-0">Recently Added Products</h4>
<div class="dropdown">
<a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" class="dropset">
<i class="fa fa-ellipsis-v"></i>
</a>
<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<li>
<a href="../products/productlist.php" class="dropdown-item">Product List</a>
</li>
<li>
<a href="../products/addproduct.php" class="dropdown-item">Product Add</a>
</li>
</ul>
</div>
</div>
<div class="card-body">
<div class="table-responsive dataview">
<table class="table datatable ">
<thead>
<tr>
<th>Sno</th>
<th>Products</th>
<th>Price</th>
</tr>
</thead>
<tbody>

<?php

if ($products->num_rows > 0) {
    while ($row = $products->fetch_assoc()) {
     echo '<tr>
      <td>'.$row['id'].'</td>
      <td class="productimgname">
      <a href="#" class="product-img">
      <img src="../assets/img/product/noimage.png" alt="product">
      </a>
      <a href="productlist.html">'.$row['productname'].'</a>
      </td>
      <td>Rs. '.$row['sellingprice'].'</td>
      </tr>';
    }
} else {
    echo "No products found";
}


?>


<!-- 
<tr>
<td>2</td>
<td class="productimgname">
<a href="productlist.html" class="product-img">
<img src="../assets/img/product/product23.jpg" alt="product">
</a>
<a href="productlist.html">iPhone 11</a>
</td>
<td>$668.51</td>
</tr>
<tr>
<td>3</td>
<td class="productimgname">
<a href="productlist.html" class="product-img">
<img src="../assets/img/product/product24.jpg" alt="product">
</a>
<a href="productlist.html">samsung</a>
</td>
<td>$522.29</td>
</tr>
<tr>
<td>4</td>
<td class="productimgname">
<a href="productlist.html" class="product-img">
<img src="../assets/img/product/product6.jpg" alt="product">
</a>
<a href="productlist.html">Macbook Pro</a>
</td>
<td>$291.01</td>
</tr> -->

</tbody>
</table>
</div>
</div>
</div>
</div>

</div>


<div class="card mb-0">
<div class="card-body">
<h4 class="card-title">Pending Sales</h4>
<div class="table-responsive dataview">
<table class="table datatable ">
<thead>
<tr>
<th>Sales Code</th>
<th>Customer Name</th>
<th>Date</th>
<th>Email</th>
<th>Phone</th>
</tr>
</thead>
<tbody>

<?php

if ($pendingorders->num_rows > 0) {
    while ($row = $pendingorders->fetch_assoc()) {
     echo '<tr>
     <td>'.$row['socode'].'</td>
     <td><a href="javascript:void(0);">'.$row['cusname'].'</a></td>
     <td>'.$row['created_date'].'</td>
     <td>'.$row['cusemail'].'</td>
     <td>'.$row['cusphone'].'</td>
     </tr>';
    }
} else {
    echo "No Orders found";
}


?>




</tbody>
</table>
</div>
</div>
</div>


</div>
</div>
</div>

<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>  
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script src="../assets/js/dashboardchart.js"></script>



<?php require_once '../includes/footer.php' ?>