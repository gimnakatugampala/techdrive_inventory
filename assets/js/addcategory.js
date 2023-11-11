$(document).ready(function () {

  $("#addCat").click(function () {
    var catname = $("#catname").val();
    var catdis = $("#catdis").val();

    if (catname === "") {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Please Enter Category Name",
      });
    } else if (catdis === "") {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Please Enter Category Description",
      });
    } else {
      $.ajax({
        type: "POST",
        url: "../pages/addcategory.php",
        data: {
          catname: catname,
          catdis: catdis,
          code:generateUUID()
        },
        success: function (response) {
          if (response === "success") {
            Swal.fire({
              icon: "success",
              title: "Success",
              text: "Category added successfully",
            });
            clearAB();
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
  $("#clearCat").click(function () {
    clearAB();
  });
});

function clearAB() {
  var catname = document.getElementById("catname");
  catname.value = "";
  var catdis = document.getElementById("catdis");
  catdis.value = "";
}
