$(document).ready(function () {
  // Function to populate the table with data
  function populateTable(data) {
    var tableBody = $("table.brandlist #blist");

    data.forEach(function (brand) {
      var row = $("<tr>");
      row.append("<td>" + brand.brandname + "</td>");
      row.append("<td>" + brand.branddesciption + "</td>");
      row.append(
        "<td><a class='me-3 btnedit'data-brand-id='" +
          brand.id +
          "'><img src='../assets/img/icons/edit.svg' alt='img'></a><a class='me-3 btn-delete' data-brand-id='" +
          brand.id +
          "'><img src='../assets/img/icons/delete.svg' alt='img'></a></td>"
      );

      tableBody.append(row);
    });
  }

  // Fetch data from the server
  $.getJSON("../pages/brandlist.php", function (data) {
    populateTable(data);
  });


  $("table.brandlist").on("click", ".btnedit", function () {
    var brandId = $(this).data("brand-id");
    var brandName = $(this).closest("tr").find("td:nth-child(2)").text();
    var brandDescription = $(this).closest("tr").find("td:nth-child(3)").text();

    // Redirect to the "Brand Edit" page with query parameters
    window.location.href =
      "editbrand.php?brandId=" +
      encodeURIComponent(brandId) +
      "&brandName=" +
      encodeURIComponent(brandName) +
      "&brandDescription=" +
      encodeURIComponent(brandDescription);
  });


  $("table.brandlist").on("click", ".btn-delete", function () {
    var brandId = $(this).data("brand-id");

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
          url: "../pages/deletebrand.php",
          method: "POST",
          data: { brandId: brandId },
          success: function (response) {
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
