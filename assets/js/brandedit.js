$(document).ready(function () {
  $("#btnUpdate").click(function () {
    var brandName = $("#brandName").val();
    var brandDescription = $("#brandDescription").val();
    var brandId = $("#brandId").val();

    $.ajax({
      url: "../pages/editbrand.php",
      type: "POST",
      data: {
        brandName: brandName,
        brandDescription: brandDescription,
        brandId: brandId,
      },
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
});

$(document).ready(function () {
  $("#clearBrandBtn").click(function () {
    clear();
  });
});

function clear() {
  var brandName = document.getElementById("brandName");
  brandName.value = "";
  var description = document.getElementById("brandDescription");
  description.value = "";
}
