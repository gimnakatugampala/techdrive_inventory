$(document).ready(function () {
  // Function to populate the table with data
  function populateTable(data) {
    var tableBody = $("table.datanew.purchaselist #purchaselistbody");

    // console.log(data)

    data.forEach(function (plist) {
      var row = $("<tr>");
      row.append("<td>" + plist.pocode + "</td>");
      row.append("<td>" + plist.supname + "</td>");
      row.append("<td>" + plist.created_date + "</td>");
      // row.append("<td>" + plist.paidamount + "</td>");
      // row.append("<td>" + plist.supname + "</td>");
      // row.append("<td>" + plist.pocode + "</td>");
      // row.append("<td>" + plist.createdate + "</td>");
      // row.append("<td>" + plist.poid + "</td>");
      if (plist.statusid === "1") {
        row.append(
          "<td> <span class='badges bg-lightgreen'>Completed</span></td>"
        );
      } else if (plist.statusid === "2") {
        row.append(
          "<td><span class='badges bg-primary'>Pending</span></td>"
        );
      } else if (plist.statusid === "3") {
        row.append(
          "<td> <span class='badges bg-lightred'>Canceled</span></td>"
        );
      } else {
        row.append("<td> <span class='badges bg-lightred'>Draft</span></td>");
      }

      if (plist.paid_status  === "1") {
        row.append(
          "<td> <span class='badges bg-lightred'>Not Paid</span></td>"
        );
      } else if (plist.paid_status  === "2") {
        row.append(
          "<td><span class='badges bg-lightyellow'>Advance</span></td>"
        );
      } else {
        row.append("<td> <span class='badges bg-lightgreen'>Paid</span></td>");
      }
      
      

      row.append("<td>" + plist.completeddate + "</td>");
      row.append("<td>" + plist.grandtotal + "</td>");
      row.append("<td>" + plist.paidamount + "</td>");
      row.append("<td>" + plist.discount + "</td>");
      row.append(`<td>${parseFloat(plist.grandtotal) - (parseFloat(plist.paidamount))}</td>`);



      // row.append("<td>" + plist.id + "</td>");
      row.append(
        `<td>
         <a class="me-3" href="../purchase/purchase-order-details.php?code=${plist.pocode}">
        <img src="../assets/img/icons/eye1.svg" alt="img">
        </a>

        <a href="../purchase/editpurchase.php?code=${plist.pocode}" class='me-3 btnedit'data-plist-id='${plist.cid}'><img src='../assets/img/icons/edit.svg' alt='img'></a><a class='me-3 btn-delete' data-plist-id='${plist.id}'><img src='../assets/img/icons/delete.svg' alt='img'></a>
        </td>`
      );
      row.append("</tr>");
      tableBody.append(row);
    });
  }

  // Fetch data from the server
  $.getJSON("../pages/purchaselist.php", function (data) {
    populateTable(data);
  });

  $("table.purchaselist").on("click", ".btnedit", function () {
    // var poid = $(this).data("plist-id");
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

  $("table.purchaselist").on("click", ".btn-delete", function () {
    var pocode = $(this).closest("tr").find("td:nth-child(6)").text();

    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "../pages/deletepurchase.php",
          method: "POST",
          data: { pocode: pocode },
          success: function (response) {
            if (response === "success") {
              $(this).closest("tr").remove();
              window.location.reload();
            } else {
              alert("Failed to delete the Purchase Item.");
            }
          },
          error: function () {
            alert("Error occurred while deleting the Purchase Item.");
          },
        });
      }
    });
  });
});
