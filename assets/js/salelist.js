$(document).ready(function () {
  // Function to populate the table with data
  function populateTable(data) {
    var tableBody = $("table.saleslist #saleslistbody");

    // console.log(data)

    data.forEach(function (saleli) {
      var row = $("<tr>");
      row.append("<td>" + saleli.socode + "</td>");
      // row.append("<td style='display:none;'>" + saleli.statusid + "</td>");
      // row.append("<td style='display:none;'>" + saleli.paidstatusid + "</td>");
      // row.append("<td style='display:none;'>" + saleli.paidamount + "</td>");
      row.append("<td>" + saleli.cusname + "</td>");
      // row.append("<td>" + saleli.salesorderdate + "</td>");
      // row.append("<td>" + saleli.socode + "</td>");
      // row.append("<td style='display:none;'>" + saleli.soid + "</td>");
      if (saleli.sid === "1") {
        row.append(
          "<td> <span class='badges bg-lightgreen'>Completed</span></td>"
        );
      } else if (saleli.sid === "2") {
        row.append(
          "<td><span class='badges bg-primary'>Pending</span></td>"
        );
      } else if (saleli.sid === "3") {
        row.append(
          "<td> <span class='badges bg-lightred'>Canceled</span></td>"
        );
      } 

      // else {
      //   row.append("<td> <span class='badges bg-lightred'>Draft</span></td>");
      // }
      if (saleli.paidstatusid === "1") {
        row.append(
          "<td> <span class='badges bg-lightred'>Not Paid</span></td>"
        );
      } else if (saleli.paidstatusid === "2") {
        row.append(
          "<td><span class='badges bg-lightyellow'>Advance</span></td>"
        );
      } else {
        row.append("<td> <span class='badges bg-lightgreen'>Paid</span></td>");
      }


      row.append("<td>" + saleli.salesorderdate + "</td>");
     
      row.append("<td>" + saleli.grandtotal + "</td>");
      row.append("<td>" + saleli.paidamount + "</td>");
      row.append(`<td>${parseFloat(saleli.grandtotal) - parseFloat(saleli.paidamount)}</td>`);
      row.append(`<td class="text-center">
      <a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="true">
      <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
      </a>
      <ul class="dropdown-menu">
      <li>
      <a href="../sales/sales-details.php?code=${saleli.socode}" class="dropdown-item"><img src="../assets/img/icons/eye1.svg" class="me-2" alt="img">Sale Details</a>
      </li>
      <li>
      <a href="../sales/edit-sales.php?code=${saleli.socode}" class="dropdown-item"><img src="../assets/img/icons/edit.svg" class="me-2" alt="img">Edit Sale</a>
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
      </td>`)

   

      // row.append("<td style=display:none;>" + saleli.id + "</td>");
      // row.append(
      //   "<td><a class='me-3 btnedit'data-saleli-id='" +
      //     saleli.id +
      //     "'><img src='../assets/img/icons/edit.svg' alt='img'></a><a class='me-3 btn-delete' data-saleli-id='" +
      //     saleli.id +
      //     "'><img src='../assets/img/icons/delete.svg' alt='img'></a></td>"
      // );
      tableBody.append(row);
    });
  }

  // Fetch data from the server
  $.getJSON("../pages/saleslist.php", function (data) {
    populateTable(data);
  });

  $("table.saleslist").on("click", ".btnedit", function () {
    // var poid = $(this).data("saleli-id");
    var supid = $(this).closest("tr").find("td:nth-child(1)").text();
    var statusid = $(this).closest("tr").find("td:nth-child(2)").text();
    var paidstatusid = $(this).closest("tr").find("td:nth-child(3)").text();
    var paidamount = $(this).closest("tr").find("td:nth-child(4)").text();
    var pocode = $(this).closest("tr").find("td:nth-child(6)").text();
    var purchaseDate = $(this).closest("tr").find("td:nth-child(7)").text();
    var poid = $(this).closest("tr").find("td:nth-child(8)").text();

    window.location.href =
      "editpurchase.php?poid=" +
      encodeURIComponent(poid) +
      "&pocode=" +
      encodeURIComponent(pocode) +
      "&supid=" +
      encodeURIComponent(supid) +
      "&statusid=" +
      encodeURIComponent(statusid) +
      "&paidstatusid=" +
      encodeURIComponent(paidstatusid) +
      "&paidamount=" +
      encodeURIComponent(paidamount) +
      "&purchaseDate=" +
      encodeURIComponent(purchaseDate);
  });

  $("table.saleslist").on("click", ".cancel-sale", function () {
    var socode = $(this).closest("tr").find("td:nth-child(1)").text();

    console.log(socode)

    Swal.fire({
      title: "Are you sure?",
      text: "This Sales Order will be Canceled!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, Cancel it!",
    }).then((result) => {

      // console.log(pocode)

      if (result.isConfirmed) {
        $.ajax({
          url: "../pages/statuschange.php",
          method: "POST",
          data: { 
            CancelSO:true,
            socode: socode 
          },
          success: function (response) {

            console.log(response)

            if (response === "success") {

            Swal.fire({
              title: "Sales Order Canceled!",
              text: "This Order is Now Canceled.",
              icon: "success"
            });
            setTimeout(() => {
              window.location.reload();
            }, 2000);

            } else {
              Swal.fire({
                icon: "error",
                title: "Order Not Canceled",
                text: "Failed to delete the Purchase Item.",
              });

            }

          },
          error: function () {
            Swal.fire({
              icon: "error",
              title: "Order Not Canceled",
              text: "Failed to delete the Purchase Item.",
            });
          },
        });
      }

    });
  });

  $("table.saleslist").on("click", ".complete-sale", function () {
    var socode = $(this).closest("tr").find("td:nth-child(1)").text();

    console.log(socode)

    Swal.fire({
      title: "Are you sure?",
      text: "This Sales Order will be Completed!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, Complete it!",
    }).then((result) => {

      // console.log(pocode)

      if (result.isConfirmed) {
        $.ajax({
          url: "../pages/statuschange.php",
          method: "POST",
          data: { 
            CompletedSO:true,
            socode: socode 
          },
          success: function (response) {

            console.log(response)

            if (response === "success") {

            Swal.fire({
              title: "Sales Order Completed!",
              text: "This Order is Now Completed.",
              icon: "success"
            });
            setTimeout(() => {
              window.location.reload();
            }, 2000);

            } else {
              Swal.fire({
                icon: "error",
                title: "Order Not Completed!",
                text: "Failed to delete the Purchase Item.",
              });

            }

          },
          error: function () {
            Swal.fire({
              icon: "error",
              title: "Order Not Completed!",
              text: "Failed to delete the Purchase Item.",
            });
          },
        });
      }

    });
  });
  
});
