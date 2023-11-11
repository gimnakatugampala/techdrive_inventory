document.addEventListener("DOMContentLoaded", function () {
  const categorySelect = document.getElementById("selectCat");
  var subcatid = $("#subcatid").val();

  // Function to load categories using AJAX
  function loadCategories() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "../pages/loadcatlist.php", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        const categories = JSON.parse(xhr.responseText);
        populateCategorySelect(categories);
      }
    };
    xhr.send();
  }

  // Function to populate the select tab
  function populateCategorySelect(categories) {
    categories.forEach(function (category) {
      const option = document.createElement("option");
      option.value = category.id;
      option.textContent = category.catname;
      if (category.id === subcatid) {
        option.selected = true;
      }

     if(null) {
      categorySelect.appendChild(option);
     }

    });
  }
  loadCategories();

  $("#editSubCat").click(function () {
    var subcatname = $("#subcatname").val();
    const selectElement = document.getElementById("selectCat");
    var scid = selectElement.value;
    var id = $("#id").val();

    if (scid === "0") {
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
        url: "../pages/editsubcat.php",
        type: "POST",
        data: {
          subcatname: subcatname,
          scid: scid,
          id: id,
        },
        success: function (response) {
          if (response === "success") {
            Swal.fire({
              icon: "success",
              title: "Success",
              text: "Category Updated successfully",
            });
            var S = document.getElementById("subcatname");
            S.value = "";
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
    }
  });
});
