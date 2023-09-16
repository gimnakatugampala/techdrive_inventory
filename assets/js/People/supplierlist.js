$(document).ready(function () {
  // Function to populate the table with data
  function populateTable(data) {
    var tableBody = $("table.supplierlist #supplierlistbody");

    data.forEach(function (supplier) {
      var row = $("<tr>");
      row.append("<td>" + supplier.supname + "</td>");
      row.append("<td>" + supplier.supcode + "</td>");
      row.append("<td>" + supplier.supphone + "</td>");
      row.append("<td>" + supplier.supemail + "</td>");
      row.append(
        "<td><a class='me-3 btnedit'data-supplier-id='" +
          supplier.id +
          "'><img src='../assets/img/icons/edit.svg' alt='img'></a><a class='me-3 btn-delete' data-supplier-id='" +
          supplier.id +
          "'><img src='../assets/img/icons/delete.svg' alt='img'></a></td>"
      );

      tableBody.append(row);
    });
  }

  // Fetch data from the server
  $.getJSON("../pages/peoples/supplierlists.php", function (data) {
    populateTable(data);
  });

  $("table.supplierlist").on("click", ".btnedit", function () {
    var supid = $(this).data("supplier-id");
    var supname = $(this).closest("tr").find("td:nth-child(1)").text();
    var supemail = $(this).closest("tr").find("td:nth-child(2)").text();
    var supphone = $(this).closest("tr").find("td:nth-child(3)").text();
    var supaddress = $(this).closest("tr").find("td:nth-child(4)").text();

    window.location.href =
      "editsupplier.php?supid=" +
      encodeURIComponent(supid) +
      "&supname=" +
      encodeURIComponent(supname) +
      "&supemail=" +
      encodeURIComponent(supemail) +
      "&supphone=" +
      encodeURIComponent(supphone) +
      "&supaddress=" +
      encodeURIComponent(supaddress);
  });

  $("table.supplierlist").on("click", ".btn-delete", function () {
    var supid = $(this).data("supplier-id");

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
          url: "../pages/peoples/supplierdelete.php",
          method: "POST",
          data: { supid: supid },
          success: function (response) {
            if (response === "success") {
              $(this).closest("tr").remove();
              window.location.reload();
            } else {
              alert("Failed to delete the Supplier.");
            }
          },
          error: function () {
            alert("Error occurred while deleting the Supplier.");
          },
        });
      }
    });
  });
});
