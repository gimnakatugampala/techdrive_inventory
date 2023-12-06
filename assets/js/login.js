$(document).ready(function () {
  $("#loginBtn").click(function () {
    var email = $("#email").val();
    var password = $("#password").val();

    if (email === "") {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Please Enter your Username",
      });
    } else if (password === "") {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: "Please Enter your Password",
      });
    } else {
      $.ajax({
        type: "POST",
        url: "../pages/login.php",
        data: {
          email: email,
          password: password,
        },
        success: function (response) {
          if (response === "success") {

            window.location.href = "../dashboard";


          } else {
            Swal.fire({
                icon: "error",
                title: "Login failed",
                text: "Please check your credentials.",
              });
          }
        },
      });
    }
  });
});
