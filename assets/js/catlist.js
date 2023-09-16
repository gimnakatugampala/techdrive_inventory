$(document).ready(function () {
  // Function to populate the table with data
  function populateTable(data) {
    var tableBody = $("table.categorylist #clist");

    data.forEach(function (cat) {
      var row = $("<tr>");
      row.append("<td>" + cat.catname + "</td>");
      row.append("<td>" + cat.catcode + "</td>");
      row.append("<td>" + cat.catadddate + "</td>");
      row.append(
        "<td><a class='me-3 btnedit'data-cat-id='" +
          cat.id +
          "'><img src='../assets/img/icons/edit.svg' alt='img'></a><a class='me-3 btn-delete' data-cat-id='" +
          cat.id +
          "'><img src='../assets/img/icons/delete.svg' alt='img'></a></td>"
      );

      tableBody.append(row);
    });
  }

  // Fetch data from the server
  $.getJSON("../pages/catlist.php", function (data) {
    populateTable(data);
  });

  $("table.categorylist").on("click", ".btnedit", function () {
    var catid = $(this).data("cat-id");
    var catname = $(this).closest("tr").find("td:nth-child(1)").text();

    window.location.href =
      "editcategory.php?catid=" +
      encodeURIComponent(catid) +
      "&catname=" +
      encodeURIComponent(catname);
  });

  $("table.categorylist").on("click", ".btn-delete", function () {
    var catid = $(this).data("cat-id");

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
          url: "../pages/deletecat.php", // PHP script to handle deletion
          method: "POST",
          data: { catid: catid },
          success: function (response) {
            // Handle success, e.g., remove the row from the table
            if (response === "success") {
              $(this).closest("tr").remove();
              window.location.reload();
            } else {
              alert("Failed to delete the Category.");
            }
          },
          error: function () {
            alert("Error occurred while deleting the Category.");
          },
        });
      }
    });
  });
});
