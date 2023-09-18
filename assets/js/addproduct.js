$(document).ready(function () {
  $("#addproduct").click(function () {
    const selectcat = document.getElementById("selectCat");
    const selectsubcat = document.getElementById("selectSubCat");
    const selectbrand = document.getElementById("selectBrand");
    const cmbavailablity = document.getElementById("cmbavailablity");

    const selectcatid = selectcat.value;
    const selectsubcatid = selectsubcat.value;
    const selectbrandid = selectbrand.value;
    const selectavailablity = cmbavailablity.value;

    var pname = $("#pname").val();
    var warrenty = $("#warrenty").val();
    var mqty = $("#mqty").val();
    var qty = $("#qty").val();
    var sprice = $("#sprice").val();
    var bprice = $("#bprice").val();

    if (pname === "") {
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
    } else if (mqty === "") {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Please Enter Minimum Quantity",
      });
    } else if (qty === "") {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Please Enter Quantity",
      });
    } else if (sprice === "") {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Please Enter Selling Price",
      });
    } else if (bprice === "") {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Please Enter Buying Price",
      });
    } else {
      $.ajax({
        type: "POST",
        url: "../pages/addproduct.php",
        data: {
          pname: pname,
          selectcatid: selectcatid,
          selectsubcatid: selectsubcatid,
          selectbrandid: selectbrandid,
          warrenty: warrenty,
          mqty: mqty,
          qty: qty,
          selectavailablity: selectavailablity,
          sprice: sprice,
          bprice: bprice,
        },
        success: function (response) {
          if (response === "success") {
            Swal.fire({
              icon: "success",
              title: "Success",
              text: "Product added successfully",
            });
            var selectCat = document.getElementById("selectCat");
            selectCat.selectedIndex = 0;
            var selectSubCat = document.getElementById("selectSubCat");
            selectSubCat.selectedIndex = 0;
            var selectBrand = document.getElementById("selectBrand");
            selectBrand.selectedIndex = 0;
            var cmbavailablity = document.getElementById("cmbavailablity");
            cmbavailablity.selectedIndex = 0;
            var pname = document.getElementById("pname");
            pname.value = "";
            var warrenty = document.getElementById("warrenty");
            warrenty.value = "";
            var mqty = document.getElementById("mqty");
            mqty.value = "";
            var bprice = document.getElementById("bprice");
            bprice.value = "";
            var qty = document.getElementById("qty");
            qty.value = "";
            var sprice = document.getElementById("sprice");
            sprice.value = "";
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
