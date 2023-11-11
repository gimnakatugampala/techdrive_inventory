$(document).ready(function () {
  $("#addSubCat").click(function () {
    const selectElement = document.getElementById("selectCat");
    const cid = selectElement.value;
    var subcatname = $("#subcatname").val();

    if (cid === '0') {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Please Select Category",
      });
    } else if (subcatname === "") {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Please Enter Sub Category Name",
      });
    } else {
      $.ajax({
        type: "POST",
        url: "../pages/subcatadd.php",
        data: {
          subcatname: subcatname,
          cid: cid,
          code:generateUUID()
        },
        success: function (response) {
          if (response === "success") {
            Swal.fire({
              icon: "success",
              title: "Success",
              text: "Sub Category added successfully",
            });
            clearASC();
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
  $("#clearSubCat").click(function () {
    clearASC();
  });
});

function clearASC() {
  var selectElement = document.getElementById("selectCat");
  selectElement.selectedIndex = 0;
  var description = document.getElementById("subcatname");
  description.value = "";
}
