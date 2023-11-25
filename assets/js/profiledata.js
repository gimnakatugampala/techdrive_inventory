document.addEventListener("DOMContentLoaded", function () {
    
    const first_name = document.getElementById("fname");
    const last_name = document.getElementById("lname");
    const passwordVal = document.getElementById("passwordVal");
    const conpassVal = document.getElementById("conpasswordVal");

    $("#updateProfile").click(function () {
        console.log(passwordVal.value)
        console.log(conpassVal.value)

   

        if(passwordVal.value != "" || conpassVal.value != ""){
            
            if(passwordVal.value != conpassVal.value){
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Passwords Do Not Match",
                  });

                  return


            }else{

                // SQL FOR CHANGIN PASS
                $.ajax({
                    type: "POST",
                    url: "../pages/profiledata.php",
                    data: {
                      onlypass:true,
                      firstname:first_name.value,
                      lastname:last_name.value,
                      conpass:conpassVal.value
                    },
                    success: function (response) {
                        console.log(response)
                      if (response === "success") {
                        Swal.fire({
                          icon: "success",
                          title: "Success",
                          text: "Password Updated successfully",
                        });
                        // var brandName = document.getElementById("brandName");
                        // brandName.value = "";
                        // var description = document.getElementById("description");
                        // description.value = "";
                      } else {
                        Swal.fire({
                          icon: "error",
                          title: "Error",
                          text: "An error occurred while saving the data.",
                        });
                      }
                    },
                  });

                  return
            }
        }

        
        if(first_name.value == ""){

          Swal.fire({
              icon: "error",
              title: "Error",
              text: "Please Fill First Name",
            });

            return

      }else if(last_name.value == ""){
          Swal.fire({
              icon: "error",
              title: "Error",
              text: "Please Fill Last Name",
            });

            return
      }else if(passwordVal.value == "" || conpassVal.value == ""){

          $.ajax({
              type: "POST",
              url: "../pages/profiledata.php",
              data: {
                onlynames:true,
                firstname:first_name.value,
                lastname:last_name.value,
              },
              success: function (response) {
                  console.log(response)
                if (response === "success") {
                  Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: "Profile Updated successfully",
                  });
                  // var brandName = document.getElementById("brandName");
                  // brandName.value = "";
                  // var description = document.getElementById("description");
                  // description.value = "";
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


      
    })


})