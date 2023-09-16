$(document).ready(function () {
    // Function to populate the table with data
    function populateTable(data) {
      var tableBody = $("table.subcatlist #sclist");
  
      data.forEach(function (subcat) {
        var row = $("<tr>");
        row.append("<td>" + subcat.catname + "</td>");
        row.append("<td>" + subcat.subcatname + "</td>");
        row.append("<td>" + subcat.subcatcode + "</td>");
        row.append("<td style=display:none;>" + subcat.id + "</td>");
        row.append(
          "<td><a class='me-3 btnedit'data-subcat-id='" +
          subcat.cid +
            "'><img src='../assets/img/icons/edit.svg' alt='img'></a><a class='me-3 btn-delete' data-subcat-id='" +
            subcat.id +
            "'><img src='../assets/img/icons/delete.svg' alt='img'></a></td>"
        );
  
        tableBody.append(row);
      });
    }
  
    // Fetch data from the server
    $.getJSON("../pages/subcatlist.php", function (data) {
      populateTable(data);
    });
  
    $("table.subcatlist").on("click", ".btnedit", function () {
      var subcatid = $(this).data("subcat-id");
      var subcatname = $(this).closest("tr").find("td:nth-child(2)").text();
      var id = $(this).closest("tr").find("td:nth-child(4)").text();
  
      window.location.href =
        "editsubcategory.php?subcatid=" +
        encodeURIComponent(subcatid) +
        "&subcatname=" +
        encodeURIComponent(subcatname)+
        "&id=" +
        encodeURIComponent(id);
    });
  
    $("table.subcatlist").on("click", ".btn-delete", function () {
      var subcatid = $(this).data("subcat-id");
  
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
            url: "../pages/deletesubcat.php",
            method: "POST",
            data: { subcatid: subcatid },
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
  