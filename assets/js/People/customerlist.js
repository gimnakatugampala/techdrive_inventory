$(document).ready(function () {
  // Function to populate the table with data
  function populateTable(data) {
    var tableBody = $("table.customerlist #customerlistbody");

    data.forEach(function (customer) {
      var row = $("<tr>");
      row.append("<td>" + customer.cusname + "</td>");
      row.append("<td>" + customer.cuscode + "</td>");
      row.append("<td>" + customer.cusphone + "</td>");
      row.append("<td>" + customer.cusemail + "</td>");
      row.append(
        "<td><a class='me-3 btnedit'data-customer-id='" +
          customer.id +
          "'><img src='../assets/img/icons/edit.svg' alt='img'></a><a class='me-3 btn-delete' data-customer-id='" +
          customer.id +
          "'><img src='../assets/img/icons/delete.svg' alt='img'></a></td>"
      );

      tableBody.append(row);
    });
  }

  // Fetch data from the server
  $.getJSON("../pages/peoples/custoemrlists.php", function (data) {
    populateTable(data);
  });

  $("table.customerlist").on("click", ".btnedit", function () {
    var cusid = $(this).data("customer-id");
    var cusname = $(this).closest("tr").find("td:nth-child(1)").text();
    var cusemail = $(this).closest("tr").find("td:nth-child(2)").text();
    var cusphone = $(this).closest("tr").find("td:nth-child(3)").text();
    var cusaddress = $(this).closest("tr").find("td:nth-child(4)").text();

    window.location.href =
      "editcustomer.php?cusid=" +
      encodeURIComponent(cusid) +
      "&cusname=" +
      encodeURIComponent(cusname)+
      "&cusemail=" +
      encodeURIComponent(cusemail)+
      "&cusphone=" +
      encodeURIComponent(cusphone)+
      "&cusaddress=" +
      encodeURIComponent(cusaddress);
  });

  $("table.customerlist").on("click", ".btn-delete", function () {
    var cusid = $(this).data("customer-id");

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
          url: "../pages/peoples/customerdelete.php", // PHP script to handle deletion
          method: "POST",
          data: { cusid: cusid },
          success: function (response) {
            // Handle success, e.g., remove the row from the table
            if (response === "success") {
              $(this).closest("tr").remove();
              window.location.reload();
            } else {
              alert("Failed to delete the customer.");
            }
          },
          error: function () {
            alert("Error occurred while deleting the customer.");
          },
        });
      }
    });
  });
});
