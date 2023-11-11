$(document).ready(function () {
  $("#supAdd").click(function () {
    var supname = $("#supname").val();
    var supemail = $("#supemail").val();
    var supphone = $("#supphone").val();
    var supaddress = $("#supaddress").val();

    if (supname === "") {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Please Enter Supplier Name",
      });
    } else if (supemail === "") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Enter Supplier Email",
        });
      }  else if (supphone === "") {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Please Enter Supplier Phone No",
      });
    } else if (supphone < 10) {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Invalid Phone no",
      });
    } else {
      $.ajax({
        type: "POST",
        url: "../pages/peoples/addsuppliers.php",
        data: {
          supname: supname,
          supemail: supemail,
          supphone: supphone,
          supaddress: supaddress,
          code:generateUUID()
        },
        success: function (response) {
          if (response === "success") {
            Swal.fire({
              icon: "success",
              title: "Success",
              text: "Supplier added successfully",
            });
            
            var supname = document.getElementById("supname");
            supname.value = "";
            var supemail = document.getElementById("supemail");
            supemail.value = "";
            var supphone = document.getElementById("supphone");
            supphone.value = "";
            var supaddress = document.getElementById("supaddress");
            supaddress.value = "";

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
