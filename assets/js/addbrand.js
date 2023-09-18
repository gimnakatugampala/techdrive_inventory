$(document).ready(function () {
  $("#addBrandBtn").click(function () {
    var brandName = $("#brandName").val();
    var description = $("#description").val();

    if (brandName === "") {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Please Enter Brand Name",
      });
    } else if (description === "") {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Please Enter Brand Description",
      });
    } else {
      $.ajax({
        type: "POST",
        url: "../pages/addbrand.php",
        data: {
          brandName: brandName,
          description: description,
        },
        success: function (response) {
          if (response === "success") {
            Swal.fire({
              icon: "success",
              title: "Success",
              text: "Brand added successfully",
            });
            var brandName = document.getElementById("brandName");
            brandName.value = "";
            var description = document.getElementById("description");
            description.value = "";
          } else {
            Swal.fire({
              icon: "error",
              title: "Error",
              text: "An error occurred while saving the data.",
            });
          }
        },
      });
    }
  });
});

$(document).ready(function () {
  $("#clearBrandBtn").click(function () {
    clearAB();
  });
});

function clearAB() {
  var brandName = document.getElementById("brandName");
  brandName.value = "";
  var description = document.getElementById("description");
  description.value = "";
}
