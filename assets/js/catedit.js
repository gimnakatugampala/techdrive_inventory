$(document).ready(function () {
    $("#btnUpdateCat").click(function () {
      var catname = $("#catname").val();
      var catid = $("#catid").val();
  
      $.ajax({
        url: "../pages/catedit.php",
        type: "POST",
        data: {
            catname: catname,
            catid: catid,
        },
        success: function (response) {
          if (response === "success") {
            Swal.fire({
              icon: "success",
              title: "Success",
              text: "Category Updated successfully",
            });
            clear();
          } else {
            Swal.fire({
              icon: "error",
              title: "Error",
              text: "An error occurred while updating the data.",
            });
          }
        },
        error: function (xhr, status, error) {
          console.error("Error: " + error);
        },
      });
    });
  });
  
  $(document).ready(function () {
    $("#clearCatBtn").click(function () {
      clear();
    });
  });
  
  function clear() {
    var brandName = document.getElementById("catname");
    brandName.value = "";
  }
  