$(document).ready(function () {
  $("#cusAdd").click(function () {
    var cusname = $("#cusname").val();
    var cusemail = $("#cusemail").val();
    var cusphone = $("#cusphone").val();
    var cusaddress = $("#cusaddress").val();

    if (cusname === "") {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Please Enter Customer Name",
      });
    } else if (cusemail === "") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Enter your Email",
        });
      }  else if (cusphone === "") {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Please Enter Customer Phone No",
      });
    } else if (cusphone < 10) {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Invalid Phone no",
      });
    } else {
      $.ajax({
        type: "POST",
        url: "../pages/peoples/addcustomer.php",
        data: {
          cusname: cusname,
          cusemail: cusemail,
          cusphone: cusphone,
          cusaddress: cusaddress,
        },
        success: function (response) {
          if (response === "success") {
            Swal.fire({
              icon: "success",
              title: "Success",
              text: "Customer added successfully",
            });
            
            var cusname = document.getElementById("cusname");
            cusname.value = "";
            var cusemail = document.getElementById("cusemail");
            cusemail.value = "";
            var cusphone = document.getElementById("cusphone");
            cusphone.value = "";
            var cusaddress = document.getElementById("cusaddress");
            cusaddress.value = "";

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
