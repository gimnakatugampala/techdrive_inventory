<?php require_once '../pages/getordertrackingdata.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<meta name="description" content="POS - Bootstrap Admin Template">
<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
<meta name="author" content="Enware Labs, Inventory">
<meta name="robots" content="noindex, nofollow">
<title>Order Tracker</title>

<link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">

<link rel="stylesheet" href="../assets/css/bootstrap.min.css">

<link rel="stylesheet" href="../assets/css/bootstrap-datetimepicker.min.css">

<link rel="stylesheet" href="../assets/css/animate.css">

<link rel="stylesheet" href="../assets/plugins/owlcarousel/owl.carousel.min.css">
<link rel="stylesheet" href="../assets/plugins/owlcarousel/owl.theme.default.min.css">

<link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">

<link rel="stylesheet" href="../assets/css/dataTables.bootstrap4.min.css">

<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div id="global-loader">
<div class="whirly-loader"> </div>
</div>

<div class="page-wrapper ms-0">
<div class="content">



<div class="row">
    <div class="col-md-6 mx-auto mb-2 text-center">
       <h4><b>TECHDRIVE TECHNOLOGIES</b></h4>
       <h4>WEBSITE : WWW.TECHDRIVE.LK</h4>
       <h4>CONTACT : +94 764961707</h4>

    </div>
</div>

<hr>

<div class="row">
<div class="col-lg-8 col-sm-12 tabs_wrapper mt-3">
<div class="page-header ">
<div class="page-title">

<h4>SALES ORDER CODE : <?php echo $salesorders[0]["socode"];?></h4>
<h6>PLACED DATE : <?php echo $salesorders[0]["salesorderdate"];?></h6>
</div>

</div>

<div class="row">
<div class="card col-md-12 p-3">
<div class="card-body pt-0">
<div class="totalitem">
<h4>Total items : <?php echo sizeof($productlist); ?></h4>
<!-- <a href="javascript:void(0);">Clear all</a> -->
</div>

<div class="product-table">
<?php foreach ($productlist as $item): ?>
<ul class="product-lists">
<li>
<div class="productimg">
<div class="productimgs">
<img src="../assets/img/product/noimage.png" alt="img">
</div>
<div class="productcontet">
<h4><?php echo $item["productname"];?>
<a href="javascript:void(0);" class="ms-2" data-bs-toggle="modal" data-bs-target="#edit"><img src="../assets/img/icons/edit-5.svg" alt="img"></a>
</h4>
<div class="productlinkset">
<h5>QTY : <?php echo $item["quantity"];?></h5>
</div>

</div>
</div>
</li>
<li>
    <h4>Rs. <b><?php echo (floatval($item["QTY"]) * floatval($item["price"])) - floatval($item["discount"]) ;?></b></h4>
    <span style="text-align: right;"><strike>Rs. <?php echo floatval($item["QTY"]) * floatval($item["price"]);?></strike> (DISCOUNT : <?php echo "RS." .$item["discount"]; ?>) </span>
</li>
</ul>
<?php endforeach;?>
</div>
</div>
</div>
</div>
</div>

<div class="col-lg-4 col-sm-12">

<?php if ($salesorders[0]["sid"] == "1"): ?>

<div style="width:50%;margin:0 auto 25px auto;" class="text-white bg-success text-center p-2 rounded">
<h6>COMPLETED <i class="fas fa-check-circle"></i></h6>
<span>Collect Your Order</span>
</div>

<?php elseif ($salesorders[0]["sid"] == "2"): ?>

<div style="width:50%;margin:0 auto 35px auto;" class="text-white bg-primary text-center p-2 rounded">
<h6>INPROGRESS <i class="fas fa-spinner"></i></h6>
<span>Hang On</span>
</div>

<?php elseif ($salesorders[0]["sid"] == "3"): ?>

<div style="width:50%;margin:0 auto 35px auto;" class="text-white bg-danger text-center p-2 rounded">
<h6>CANCELED <i class="fas fa-window-close"></i></h6>
<span>Sorry About That</span>
</div>

<?php elseif ($salesorders[0]["sid"] == "4"): ?>

<div style="width:50%;margin:0 auto 35px auto;" class="text-white bg-info text-center p-2 rounded">
<h6>QUOTATION <i class="fas fa-quote-left"></i></h6>
<span>Not A Sale</span>
</div>
<?php endif; ?>



<div class="card">
<div class="card-body pt-0 pb-2">
<div class="setvalue">
<ul>
<li>
<h5>Grand Total</h5>
<h6>Rs. <?php echo $salesorders[0]["grandtotal"]; ?></h6>
</li>
<li>
<h5>Paid Amount</h5>
<h6>Rs. <?php echo $salesorders[0]["paidamount"]; ?></h6>
</li>

<hr>
<li class="total-value">
<h5>To Be Paid</h5>
<h6>Rs. <?php echo floatval($salesorders[0]["grandtotal"]) - floatval($salesorders[0]["paidamount"]) ; ?></h6>
</li>

</ul>
</div>



</div>
</div>
</div>
</div>
</div>
</div>
</div>




<?php require_once '../includes/footer.php' ?>
