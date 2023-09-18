document.addEventListener("DOMContentLoaded", function () {
  const selectcat = document.getElementById("Cat");
  const selectsubcat = document.getElementById("SubCat");
  const selectbrand = document.getElementById("Brand");
  const cmbavailablity = document.getElementById("Availablity");

  var catid = $("#catid").val();
  var scatid = $("#scatid").val();
  var avlid = $("#avlid").val();
  var bid = $("#bid").val();

  function loadselectcat() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "../pages/alllist/cat.php", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        const categories = JSON.parse(xhr.responseText);
        populateselectcat(categories);
      }
    };
    xhr.send();
  }

  function loadselectsubcat() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "../pages/alllist/subcat.php", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        const categories = JSON.parse(xhr.responseText);
        populateselectsubcat(categories);
      }
    };
    xhr.send();
  }
  function loadselectbrand() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "../pages/alllist/brand.php", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        const categories = JSON.parse(xhr.responseText);
        populateselectbrand(categories);
      }
    };
    xhr.send();
  }

  function populateselectcat(categories) {
    categories.forEach(function (category) {
      const option = document.createElement("option");
      option.value = category.id;
      option.textContent = category.catname;
      if (category.id === catid) {
        option.selected = true;
      }
      selectcat.appendChild(option);
    });
  }

  function populateselectsubcat(categories) {
    categories.forEach(function (category) {
      const option = document.createElement("option");
      option.value = category.id;
      option.textContent = category.subcatname;
      if (category.id === scatid) {
        option.selected = true;
      }
      selectsubcat.appendChild(option);
    });
  }

  function populateselectbrand(categories) {
    categories.forEach(function (category) {
      const option = document.createElement("option");
      option.value = category.id;
      option.textContent = category.brandname;
      if (category.id === bid) {
        option.selected = true;
      }
      selectbrand.appendChild(option);
    });
  }

  if (avlid === 1) {
    cmbavailablity.value = "1";
  } else {
    cmbavailablity.value = "2";
  }

  loadselectcat();
  loadselectsubcat();
  loadselectbrand();

  $("#btneditproduct").click(function () {
    const selectcat = document.getElementById("Cat");
    const selectsubcat = document.getElementById("SubCat");
    const selectbrand = document.getElementById("Brand");
    const cmbavailablity = document.getElementById("Availablity");

    const selectcatid = selectcat.value;
    const selectsubcatid = selectsubcat.value;
    const selectbrandid = selectbrand.value;
    const selectavailablity = cmbavailablity.value;

    var productname = $("#productname").val();
    var warrenty = $("#warrenty").val();
    var minquanity = $("#minquanity").val();
    var quantity = $("#quantity").val();
    var sellingprice = $("#sellingprice").val();
    var buyingprice = $("#buyingprice").val();
    var pid = $("#pid").val();

    if (productname === "") {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Please Enter Product Name",
      });
    } else if (selectcatid === "0") {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Please Select Category",
      });
    } else if (selectsubcatid === "0") {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Please Select Sub Category",
      });
    } else if (selectbrandid === "0") {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Please Select Brand",
      });
    } else if (warrenty === "") {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Please Enter Warrenty",
      });
    } else if (minquanity === "") {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Please Enter Minimum Quantity",
      });
    } else if (quantity === "") {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Please Enter Quantity",
      });
    } else if (sellingprice === "") {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Please Enter Selling Price",
      });
    } else if (buyingprice === "") {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Please Enter Buying Price",
      });
    } else {
      $.ajax({
        type: "POST",
        url: "../pages/editproduct.php",
        data: {
          productname: productname,
          selectcatid: selectcatid,
          selectsubcatid: selectsubcatid,
          selectbrandid: selectbrandid,
          warrenty: warrenty,
          minquanity: minquanity,
          quantity: quantity,
          selectavailablity: selectavailablity,
          sellingprice: sellingprice,
          buyingprice: buyingprice,
          pid: pid,
        },
        success: function (response) {
          if (response === "success") {
            Swal.fire({
              icon: "success",
              title: "Success",
              text: "Product Updated successfully",
            });
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
