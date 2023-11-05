<?php require_once '../includes/header.php' ?>
<?php require_once '../includes/sidebar.php' ?>

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Sales List</h4>
                <h6>Manage your sales</h6>
            </div>
            <div class="page-btn">
                <a href="../sales/add-sales.php" class="btn btn-added"><img src="../assets/img/icons/plus.svg" alt="img"
                        class="me-1">Add Sales</a>
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
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                        src="../assets/img/icons/pdf.svg" alt="img"></a>
                            </li>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                        src="../assets/img/icons/excel.svg" alt="img"></a>
                            </li>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                        src="../assets/img/icons/printer.svg" alt="img"></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card" id="filter_inputs">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Reference No">
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Completed</option>
                                        <option>Paid</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <a class="btn btn-filters ms-auto"><img src="../assets/img/icons/search-whites.svg"
                                            alt="img"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <div class="table-responsive">
<table class="table  datanew">
<thead>
<tr>
<th>
<label class="checkboxs">
<input type="checkbox" id="select-all">
<span class="checkmarks"></span>
</label>
</th>
<th>Customer Name</th>
<th>Date</th>
<th>Sales Code</th>
<th>Status</th>
<th>Payment</th>
<th>Grand Total</th>
<th>Amount Paid</th>
<th>Due</th>
<th class="text-center">Action</th>
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
<td>walk-in-customer</td>
<td>19 Nov 2022</td>
<td>SL0101</td>
<td><span class="badges bg-lightgreen">Completed</span></td>
<td><span class="badges bg-lightgreen">Paid</span></td>
<td>0.00</td>
<td>0.00</td>
<td class="text-red">100.00</td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<li>
<a href="../sales/sales-details.php" class="dropdown-item"><img src="../assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
</li>
<li>
<a href="../sales/edit-sales.php" class="dropdown-item"><img src="../assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
</li>

<li>
<a href="javascript:void(0);" class="dropdown-item"><img src="../assets/img/icons/download.svg" class="me-2" alt="img">Download Invoice</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2" alt="img">Cancel Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><i class="far fa-check-circle fa-lg mx-1"></i> Complete Sale</a>
</li>
</ul>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>walk-in-customer</td>
<td>19 Nov 2022</td>
<td>SL0102</td>
<td><span class="badges bg-lightgreen">Completed</span></td>
<td><span class="badges bg-lightgreen">Paid</span></td>
<td>0.00</td>
<td>0.00</td>
<td class="text-red">100.00</td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<li>
<a href="../sales/sales-details.php" class="dropdown-item"><img src="../assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
</li>
<li>
<a href="../sales/edit-sales.php" class="dropdown-item"><img src="../assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
</li>

<li>
<a href="javascript:void(0);" class="dropdown-item"><img src="../assets/img/icons/download.svg" class="me-2" alt="img">Download Invoice</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2" alt="img">Cancel Sale</a>
 </li>
 <li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><i class="far fa-check-circle fa-lg mx-1"></i> Complete Sale</a>
</li>
</ul>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>walk-in-customer</td>
<td>19 Nov 2022</td>
<td>SL0103</td>
<td><span class="badges bg-lightgreen">Completed</span></td>
<td><span class="badges bg-lightgreen">Paid</span></td>
<td>0.00</td>
<td class="text-green">100.00</td>
<td>0.00</td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<li>
<a href="../sales/sales-details.php" class="dropdown-item"><img src="../assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
</li>
<li>
<a href="../sales/edit-sales.php" class="dropdown-item"><img src="../assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
</li>

<li>
<a href="javascript:void(0);" class="dropdown-item"><img src="../assets/img/icons/download.svg" class="me-2" alt="img">Download Invoice</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2" alt="img">Cancel Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><i class="far fa-check-circle fa-lg mx-1"></i> Complete Sale</a>
</li>
</ul>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>Fred C. Rasmussen</td>
<td>19 Nov 2022</td>
<td>SL0104</td>
<td><span class="badges bg-lightred">Pending</span></td>
<td><span class="badges bg-lightred">Due</span></td>
<td>0.00</td>
<td class="text-green">100.00</td>
<td>0.00</td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<li>
<a href="../sales/sales-details.php" class="dropdown-item"><img src="../assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
</li>
<li>
<a href="../sales/edit-sales.php" class="dropdown-item"><img src="../assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
</li>

<li>
<a href="javascript:void(0);" class="dropdown-item"><img src="../assets/img/icons/download.svg" class="me-2" alt="img">Download Invoice</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2" alt="img">Cancel Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><i class="far fa-check-circle fa-lg mx-1"></i> Complete Sale</a>
</li>
</ul>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>Thomas M. Martin</td>
<td>19 Nov 2022</td>
<td>SL0105</td>
<td><span class="badges bg-lightred">Pending</span></td>
<td><span class="badges bg-lightred">Due</span></td><td>0.00</td>
<td>0.00</td>
<td class="text-green">100.00</td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<li>
<a href="../sales/sales-details.php" class="dropdown-item"><img src="../assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
</li>
<li>
<a href="../sales/edit-sales.php" class="dropdown-item"><img src="../assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
</li>

<li>
<a href="javascript:void(0);" class="dropdown-item"><img src="../assets/img/icons/download.svg" class="me-2" alt="img">Download Invoice</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2" alt="img">Cancel Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><i class="far fa-check-circle fa-lg mx-1"></i> Complete Sale</a>
</li>
</ul>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>Thomas M. Martin</td>
<td>19 Nov 2022</td>
<td>SL0106</td>
<td><span class="badges bg-lightgreen">Completed</span></td>
<td><span class="badges bg-lightgreen">Paid</span></td>
<td>0.00</td>
<td>0.00</td>
<td class="text-red">100.00</td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<li>
<a href="../sales/sales-details.php" class="dropdown-item"><img src="../assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
</li>
<li>
<a href="../sales/edit-sales.php" class="dropdown-item"><img src="../assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
</li>

<li>
<a href="javascript:void(0);" class="dropdown-item"><img src="../assets/img/icons/download.svg" class="me-2" alt="img">Download Invoice</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2" alt="img">Cancel Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><i class="far fa-check-circle fa-lg mx-1"></i> Complete Sale</a>
</li>
</ul>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>walk-in-customer</td>
<td>19 Nov 2022</td>
<td>SL0107</td>
<td><span class="badges bg-lightgreen">Completed</span></td>
<td><span class="badges bg-lightgreen">Paid</span></td>
<td>0.00</td>
<td>0.00</td>
<td class="text-red">100.00</td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<li>
<a href="../sales/sales-details.php" class="dropdown-item"><img src="../assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
</li>
<li>
<a href="../sales/edit-sales.php" class="dropdown-item"><img src="../assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
</li>

<li>
<a href="javascript:void(0);" class="dropdown-item"><img src="../assets/img/icons/download.svg" class="me-2" alt="img">Download Invoice</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2" alt="img">Cancel Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><i class="far fa-check-circle fa-lg mx-1"></i> Complete Sale</a>
</li>
</ul>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>walk-in-customer</td>
<td>19 Nov 2022</td>
<td>SL0108</td>
<td><span class="badges bg-lightred">Pending</span></td>
<td><span class="badges bg-lightred">Due</span></td>
<td>0.00</td>
<td class="text-green">100.00</td>
<td>0.00</td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<li>
<a href="../sales/sales-details.php" class="dropdown-item"><img src="../assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
</li>
<li>
<a href="../sales/edit-sales.php" class="dropdown-item"><img src="../assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
</li>

<li>
<a href="javascript:void(0);" class="dropdown-item"><img src="../assets/img/icons/download.svg" class="me-2" alt="img">Download Invoice</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2" alt="img">Cancel Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><i class="far fa-check-circle fa-lg mx-1"></i> Complete Sale</a>
</li>
</ul>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>walk-in-customer</td>
<td>19 Nov 2022</td>
<td>SL0109</td>
<td><span class="badges bg-lightred">Pending</span></td>
<td><span class="badges bg-lightred">Due</span></td>
<td>0.00</td>
<td class="text-green">100.00</td>
<td>0.00</td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<li>
<a href="../sales/sales-details.php" class="dropdown-item"><img src="../assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
</li>
<li>
<a href="../sales/edit-sales.php" class="dropdown-item"><img src="../assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
</li>

<li>
<a href="javascript:void(0);" class="dropdown-item"><img src="../assets/img/icons/download.svg" class="me-2" alt="img">Download Invoice</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2" alt="img">Cancel Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><i class="far fa-check-circle fa-lg mx-1"></i> Complete Sale</a>
</li>
</ul>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>walk-in-customer</td>
<td>19 Nov 2022</td>
<td>SL0110</td>
<td><span class="badges bg-lightred">Pending</span></td>
<td><span class="badges bg-lightred">Due</span></td>
<td>0.00</td>
<td class="text-green">100.00</td>
<td>0.00</td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<li>
<a href="../sales/sales-details.php" class="dropdown-item"><img src="../assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
</li>
<li>
<a href="../sales/edit-sales.php" class="dropdown-item"><img src="../assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
</li>

<li>
<a href="javascript:void(0);" class="dropdown-item"><img src="../assets/img/icons/download.svg" class="me-2" alt="img">Download Invoice</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2" alt="img">Cancel Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><i class="far fa-check-circle fa-lg mx-1"></i> Complete Sale</a>
</li>
</ul>
</td>
</tr>
<tr>
<td>
<label class="checkboxs">
<input type="checkbox">
<span class="checkmarks"></span>
</label>
</td>
<td>walk-in-customer</td>
<td>19 Nov 2022</td>
<td>SL0111</td>
<td><span class="badges bg-lightred">Pending</span></td>
<td><span class="badges bg-lightred">Due</span></td>
<td>0.00</td>
<td>0.00</td>
<td>0.00</td>
<td class="text-center">
<a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
<i class="fa fa-ellipsis-v" aria-hidden="true"></i>
</a>
<ul class="dropdown-menu">
<li>
<a href="../sales/sales-details.php" class="dropdown-item"><img src="../assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Detail</a>
</li>
<li>
<a href="../sales/edit-sales.php" class="dropdown-item"><img src="../assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
</li>

<li>
<a href="javascript:void(0);" class="dropdown-item"><img src="../assets/img/icons/download.svg" class="me-2" alt="img">Download Invoice</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><img src="../assets/img/icons/delete1.svg" class="me-2" alt="img">Cancel Sale</a>
</li>
<li>
<a href="javascript:void(0);" class="dropdown-item confirm-text"><i class="far fa-check-circle fa-lg mx-1"></i> Complete Sale</a>
</li>
</ul>
</td>
</tr>
</tbody>
</table>
</div> -->

                <div class="table-responsive">
                    <table class="table saleslist">
                        <thead>
                            <tr>
                                <th>Sales Code</th>
                                <th>Customer Name</th>
                                <th>Status</th>
                                <th>Paid Status</th>
                                <th>Placed Date</th>
                                <th>Grand Total</th>
                                <th>Amount Paid</th>
                                <th>Due Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="saleslistbody"></tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
</div>





<?php require_once '../includes/footer.php' ?>