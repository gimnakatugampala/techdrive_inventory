$(document).ready(function () {
    // Function to populate the table with data
    function populateTable(data) {
      var tableBody = $("table.salesreturnlist #salesreturnlistbody");
  
      // console.log(data)
  
      data.forEach(function (saleli) {
        var row = $("<tr>");
        row.append("<td>" + saleli.sorcode + "</td>");
        // row.append("<td style='display:none;'>" + saleli.statusid + "</td>");
        // row.append("<td style='display:none;'>" + saleli.paidstatusid + "</td>");
        // row.append("<td style='display:none;'>" + saleli.paidamount + "</td>");
        row.append("<td>" + saleli.cusname+ "</td>");
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
  
    
  
        row.append("<td>" + saleli.salesorderreturndate + "</td>");
       
        row.append("<td>" + saleli.grandtotal + "</td>");
        row.append(`<td>
        <a class="me-3" href="../return/salesreturn-detail.php?code=${saleli.sorcode}">
        <img src="../assets/img/icons/eye1.svg" alt="img">
        </a>
        <a class="me-3" href="../return/editsalesreturn.php?code=${saleli.sorcode}">
        <img src="../assets/img/icons/edit.svg" alt="img">
        </a>
        <a class="me-3 confirm-text" href="javascript:void(0);">
        <img src="../assets/img/icons/delete.svg" alt="img">
        </a>
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
    $.getJSON("../pages/salesreturnlist.php", function (data) {
      populateTable(data);
    });
  
    $("table.salesreturnlist").on("click", ".btnedit", function () {
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
  
    $("table.salesreturnlist").on("click", ".btn-delete", function () {
      var pocode = $(this).closest("tr").find("td:nth-child(7)").text();
  
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
            url: "../pages/deletesale.php",
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
  