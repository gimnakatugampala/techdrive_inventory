
<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>
<?php require_once '../pages/salesreturndetails.php' ?>

<div class="page-wrapper">
<div class="content">
<div class="page-header">
<div class="page-title">
<h4>Sales Return Details</h4>
<h6>View sales return details</h6>
</div>
</div>
<div class="card">
<div class="card-body">
<div class="card-sales-split">
<div>
    <h3>Sales Return Invoice</h3>
    <h2>Tech Drive Solutions</h2>
    <span>• Bambalapitiya   • 0764961707   • techdrive@gmail.com</span>
</div>

<ul>
    <?php if ($salesordersreturn[0]["sid"] == "2"): ?>
    <li>
    <a href="../return/editsalesreturn.php?code=<?php echo $salesordersreturn[0]["sorcode"];?>"><img src="../assets/img/icons/edit.svg" alt="img"></a>
    </li>
    <?php endif; ?>

    <li>
    <a href="../utils/pdf_maker.php?MST_ID=<?php echo $salesordersreturn[0]["sorcode"];?>&ACTION=DOWNLOAD&TYPE=SOR"><img src="../assets/img/icons/pdf.svg" alt="img"></a>
    </li>
    <li>
    <a href="../utils/pdf_maker.php?MST_ID=<?php echo $salesordersreturn[0]["sorcode"];?>&ACTION=EMAIL&TYPE=SOR"><i class="fas fa-envelope" style="font-size: 22px;"></i></a>
    </li>
    <li>
    <a onclick="window.print()"><img src="../assets/img/icons/printer.svg" alt="img"></a>
    </li>
</ul>


</div>


<div class="invoice-box table-height" style="max-width: 1600px;width:100%;overflow: auto;margin:15px auto;padding: 0;font-size: 14px;line-height: 24px;color: #555;">

<table cellpadding="0" cellspacing="0" style="width: 100%;line-height: inherit;text-align: left;">
<tbody>
<tr class="top">
<td colspan="6" style="padding: 5px;vertical-align: top;">
<table style="width: 100%;line-height: inherit;text-align: left;">


<tbody>
<tr>
<td style="padding:5px;vertical-align:top;text-align:left;padding-bottom:20px">
<font style="vertical-align: inherit;margin-bottom:25px;"><font style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">Customer Info</font></font><br>
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> <?php echo $salesordersreturn[0]["cusname"];?></font></font><br>
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> <a href="mailto:<?php echo $salesordersreturn[0]["cusemail"];?>" class="__cf_email__" ><?php echo $salesordersreturn[0]["cusemail"];?></a></font></font><br>
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> <?php echo '+94'.$salesordersreturn[0]["cusphone"];?></font></font><br>
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> <?php echo $salesordersreturn[0]["cusaddress"];?></font></font><br>
</td>

<td style="padding:5px;vertical-align:top;text-align:left;padding-bottom:20px">
<font style="vertical-align: inherit;margin-bottom:25px;"><font style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">Invoice Info</font></font><br>
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> Reference </font></font><br>

 <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> Status</font></font><br>
 <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> Placed Date</font></font><br>

 <?php if ($salesordersreturn[0]["sid"] == "1"): ?>
 <font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> Completed Date</font></font><br>
 <?php endif; ?>
</td>


<td style="padding:5px;vertical-align:top;text-align:right;padding-bottom:20px">
<font style="vertical-align: inherit;margin-bottom:25px;"><font style="vertical-align: inherit;font-size:14px;color:#7367F0;font-weight:600;line-height: 35px; ">&nbsp;</font></font><br>

<font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"><?php echo $salesordersreturn[0]["sorcode"];?> </font></font><br>


<font style="vertical-align: inherit;">
<?php if ($salesordersreturn[0]["sid"] == "1"): ?>
<font class="text-success"> Completed</font></font><br>
<?php elseif ($salesordersreturn[0]["sid"] == "2"): ?>
<font class="text-primary"> Inprogress</font></font><br>
<?php elseif ($salesordersreturn[0]["sid"] == "3"): ?>
<font class="text-danger"> Canceled</font></font><br>
<?php elseif ($salesordersreturn[0]["sid"] == "4"): ?>
<font class="text-info"> Quotation</font></font><br>
<?php endif; ?>

<font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> <?php echo $salesordersreturn[0]["salesorderreturndate"];?> </font></font><br>

<?php if ($salesordersreturn[0]["sid"] == "1"): ?>
<font style="vertical-align: inherit;"><font style="vertical-align: inherit;font-size: 14px;color:#000;font-weight: 400;"> <?php echo $salesordersreturn[0]["completeddate"];?></font></font><br>
<?php endif; ?>

</td>


</tr>

</tbody>
</table>



<p><b>Description : </b><?php echo $salesordersreturn[0]["description"];?></p>
  

</td>

</tr>


<tr class="heading " style="background: #F3F2F7;">
<td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
Product Name
</td>

<td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
QTY
</td>

<td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
Price
</td>


<td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
Dicount
</td>

<td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
Subtotal
</td>
</tr>

<?php foreach ($productlist as $item): ?>

<tr class="details" style="border-bottom:1px solid #E9ECEF ;">
<td style="padding: 10px;vertical-align: top; display: flex;align-items: center;">
<img src="../assets/img/product/noimage.png" alt="img" class="me-2" style="width:40px;height:40px;">
<?php echo $item["productname"]; ?>
</td>

<td style="padding: 10px;vertical-align: top; ">
<?php echo $item["QTY"]; ?>
</td>

<td style="padding: 10px;vertical-align: top; ">
<?php echo $item["price"]; ?>
</td>

<td style="padding: 10px;vertical-align: top; ">
<?php echo $item["discount"]; ?>
</td>
<td style="padding: 10px;vertical-align: top; ">
<?php echo floatval($item["QTY"]) * floatval($item["price"]) - floatval($item["discount"]); ?>
</td>
</tr>

<?php endforeach;?>

<!-- <tr class="details" style="border-bottom:1px solid #E9ECEF ;">
<td style="padding: 10px;vertical-align: top; display: flex;align-items: center;">
<img src="../assets/img/product/noimage.png" alt="img" class="me-2" style="width:40px;height:40px;">
Apple Earpods
</td>
<td style="padding: 10px;vertical-align: top; ">
2000.00
</td>
<td style="padding: 10px;vertical-align: top; ">
1.00
</td>

<td style="padding: 10px;vertical-align: top; ">
00.00
</td>
<td style="padding: 10px;vertical-align: top; ">
1500.00
</td>
</tr>

<tr class="details" style="border-bottom:1px solid #E9ECEF ;">
<td style="padding: 10px;vertical-align: top; display: flex;align-items: center;">
<img src="../assets/img/product/noimage.png" alt="img" class="me-2" style="width:40px;height:40px;">
samsung
</td>
<td style="padding: 10px;vertical-align: top; ">
8000.00
</td>

<td style="padding: 10px;vertical-align: top; ">
1.00
</td>

<td style="padding: 10px;vertical-align: top; ">
00.00
</td>
<td style="padding: 10px;vertical-align: top; ">
1500.00
</td>
</tr> -->

</tbody></table>
</div>
<div class="row">

<div class="row">
<div class="col-lg-6 ">
<div class="total-order w-100 max-widthauto m-auto mb-4">
</div>
</div>
<div class="col-lg-6 ">
<div class="total-order w-100 max-widthauto m-auto mb-4">
<ul>


<li>
<h4>Total Discount</h4>
<h5>Rs. <?php echo $salesordersreturn[0]["DIS"]; ?></h5>
</li>

<li>
<h4>Grand Total</h4>
<h5>Rs. <?php echo $salesordersreturn[0]["grandtotal"]; ?></h5>
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
</div>




<?php require_once '../includes/footer.php' ?>