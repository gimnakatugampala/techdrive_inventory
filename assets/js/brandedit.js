$(document).ready(function () {
  $("#btnUpdate").click(function () {
    var brandName = $("#brandName").val();
    var brandDescription = $("#brandDescription").val();
    var brandId = $("#brandId").val();

    var data = {
      brandName: brandName,
      brandDescription: brandDescription,
      brandId: brandId,
    };

    $.ajax({
      url: "update.php",
      type: "POST",
      data: data,
      success: function (response) {
        if (response === "success") {
          Swal.fire({
            icon: "success",
            title: "Success",
            text: "Brand Updated successfully",
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

  $("#btnClear").click(function () {
    $("#brandName").val("");
    $("#brandDescription").val("");
  });
});
