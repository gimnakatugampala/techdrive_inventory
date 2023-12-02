$(document).ready(function () {
    var dropdown = document.getElementById("productcmb");
    var tableBody = $("#bodyPOR");
    // const paidAmountInput = document.getElementById("paidAmount");
    // const paid = document.getElementById("paid");
    const grandTotal = document.getElementById("grandTotal");
  
    // paidAmountInput.addEventListener("input", function () {
    //   const inputText = paidAmountInput.value;
    //   paid.textContent = inputText + ".00";
    //   var t = parseFloat(grandTotal.textContent) - parseFloat(paid.textContent);
    //   $("#topaid").text(t.toFixed(2));
    // });
  
    var items = [];
    var pro_qty = [];
  
    dropdown.addEventListener("change", function () {
      var productId = dropdown.value;
  
      if (productId === "0") {
        return;
      }
  
      $.ajax({
        type: "POST",
        url: "../pages/purchasegetdata.php",
        data: { productId: productId },
        dataType: "json",
        success: function (data) {
           // ---------------
          let found;
          if(pro_qty.length > 0){
            found = pro_qty.some(el => el.id === productId);
          }else{
            found = false;
          }

            if(found){

              Swal.fire({
                icon: "error",
                title: "Error",
                text: "Product Already Exist",
              });
              return

            }else{
              populateTable(data);
              pro_qty.push(data[0])
            }

          // ---------------

        },
        error: function () {},
      });
  
      function populateTable(data) {
        data.forEach(function (plist) {
          var row = $("<tr>");
          row.append("<td style='display:none;'>" + plist.id + "</td>");
          row.append("<td>" + plist.productname + "</td>");
          row.append(
            "<td><input type='number' class='form-control quantity'  value=" +
              plist.quantity +
              " name='qty'></td>"
          );
          row.append(
            "<td><input type='number' class='form-control price' value=" +
              plist.buyingprice +
              " name='pprice'></td>"
          );
          row.append(
            "<td><input type='number' class='form-control discount' value='0' name='discountp'></td>"
          );
          row.append("<td class='text-end total'></td>");
          row.append(
            "<td><a class='delete-set'><img src='../assets/img/icons/delete.svg' alt='svg'></a></td>"
          );
          tableBody.append(row);
  
          // Add the new item to the items array
          var item = {
            quantityInput: row.find(".quantity")[0],
            priceInput: row.find(".price")[0],
            discountInput: row.find(".discount")[0],
            totalCell: row.find(".total")[0],
          };
          items.push(item);
  
          item.quantityInput.addEventListener("input", calculateTotal);
          item.priceInput.addEventListener("input", calculateTotal);
          item.discountInput.addEventListener("input", calculateTotal);
  
          calculateTotal();
        });
      }
    });
  
    function calculateTotal() {
      var totalAmount = 0;
      var to = 0;
      var dis = 0;
      items.forEach(function (item) {
        var quantity = parseFloat(item.quantityInput.value);
        var price = parseFloat(item.priceInput.value);
        var discount = parseFloat(item.discountInput.value);
  
        var itemTotal = quantity * price - discount;
        item.totalCell.textContent = itemTotal.toFixed(2);
  
        totalAmount += itemTotal;
        dis += discount;
  
        // to = totalAmount - parseFloat(paid.textContent);
      });
      $("#grandTotal").text(totalAmount.toFixed(2));
      $("#dis").text(dis.toFixed(2));
  
      // $("#topaid").text(to.toFixed(2));
    }
  
    $("#addpurchasereturnbtn").click(function () {
      var data = [];
      const selectPro = dropdown.value;
      const selectSup = $("#selectSup").val();
      // const selectPS = $("#paidStatus").val();
      const progressstatus = $("#progressstatus").val();
      const desc = $("#PORDesc").val();
      // var paidAmount = parseFloat(paidAmountInput.value);
      var purchaseDate = $("#purchaseRDate").val();
  
      var grandTotal = parseFloat($("#grandTotal").text());
      var dis = parseFloat($("#dis").text());
      // var topaid = parseFloat($("#topaid").text());
      var isPaid = "0";
      var completeddate = "";
  
      $(".quantity").each(function () {
        var product = $(this).closest("tr").find("td:nth-child(1)").text();
        var quantity = $(this).closest("tr").find(".quantity").val();
        var price = $(this).closest("tr").find(".price").val();
        var discount = $(this).closest("tr").find(".discount").val();
  
        data.push({
          product: product,
          quantity: quantity,
          price: price,
          discount: discount,
        });
      });
  
      if (selectSup === "0") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Please Select Supplier Name",
        });
      } else if (purchaseDate === "") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Please Select Purchase Date",
        });
      } else if (selectPro === "0") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Please Select Product Name",
        });
      } else if (progressstatus === "0") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Please Select Status",
        });
      } else if (progressstatus === "3" ||  progressstatus == "4" ) {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Cannot Select Canceled Status or Draft Status",
        });
      }else if (desc == "" ) {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Description Cannot be Empty",
        });
      } else {


        if (progressstatus === "1") {
          isPaid = "1";
          completeddate = "1";
        }


     // ---------------- PRODUCT ITEM ADDED VALIDATION -----------------

      // ----- QTY ------

      // Check if the Quantity is Sufficient
      for(let i = 0; i < data.length; i++){
        if(parseInt(data[i].quantity) > parseInt(pro_qty[i].quantity)){
          Swal.fire({
            icon: "error",
            title: "Quantity Error",
            text: `${pro_qty[i].productname} has a Max QTY of ${pro_qty[i].quantity}`,
          });

          return
        }
      }

      // Check if the QTY is zero
      for(let i = 0; i < data.length; i++){
        if(parseInt(data[i].quantity) == 0){
          Swal.fire({
            icon: "error",
            title: "Quantity Error",
            text: `${pro_qty[i].productname} QTY Cannot be Zero`,
          });

          return
        }
      }

        // Check if the QTY is Negative
        for(let i = 0; i < data.length; i++){
          if(parseInt(data[i].quantity) < 0){
            Swal.fire({
              icon: "error",
              title: "Quantity Error",
              text: `${pro_qty[i].productname} QTY Cannot be Negative`,
            });
  
            return
          }
        }


        // ----- PRODUCT PRICE ------
          // Check if the Price is Sufficient
      for(let i = 0; i < data.length; i++){
        if(parseInt(data[i].price) > parseInt(pro_qty[i].buyingprice)){
          Swal.fire({
            icon: "error",
            title: "Price Error",
            text: `${pro_qty[i].productname} has a Max Price of Rs.${pro_qty[i].buyingprice}`,
          });

          return
        }
      }

        // Check if the Price is zero
        for(let i = 0; i < data.length; i++){
          if(parseInt(data[i].price) == 0){
            Swal.fire({
              icon: "error",
              title: "Price Error",
              text: `${pro_qty[i].productname} Price Cannot be Zero`,
            });
  
            return
          }
        }

          // Check if the Price is Negative
          for(let i = 0; i < data.length; i++){
          if(parseInt(data[i].price) < 0){
            Swal.fire({
              icon: "error",
              title: "Price Error",
              text: `${pro_qty[i].productname} Price Cannot be Negative`,
            });
  
            return
          }
        }

        // ----- DISCOUNT PRICE ------
  
          // Check if the Discount is Negative
          for(let i = 0; i < data.length; i++){
          if(parseInt(data[i].discount) < 0){
            Swal.fire({
              icon: "error",
              title: "Price Error",
              text: `${pro_qty[i].productname} Discount Price Cannot be Negative`,
            });

            return
          }
        }

        // Discount cannot be greater than the Price
        for(let i = 0; i < data.length; i++){
          if(parseInt(data[i].discount) > parseInt(data[i].quantity) * parseInt(data[i].price)){
            Swal.fire({
              icon: "error",
              title: "Price Error",
              text: `Discount Price Cannot be Greater than ${pro_qty[i].productname} Price`,
            });

            return
          }
        }

        // 

      // ---------------- PRODUCT ITEM ADDED VALIDATION -----------------

  
        $.ajax({
          type: "POST",
          url: "../pages/addpurchasereturn.php",
          data: {
            data: JSON.stringify(data),
            selectPro: selectPro,
            selectSup: selectSup,
            // code:Date.now(),
            // selectPS: selectPS,
            progressstatus: progressstatus,
            // paidAmount: paidAmount,
            purchaseDate: purchaseDate,
            isPaid: isPaid,
            grandTotal: grandTotal,
            // topaid: topaid,
            desc:desc,
            dis: dis,
            completeddate: completeddate,
            porcode:generateUUID(),
            poricode:generateUUID()

          },
          success: function (response) {
            console.log(response)
            if (response === "success") {
              Swal.fire({
                icon: "success",
                title: "Success",
                text: "Successfully added Purchase",
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
  
    function clearAB() {
      $("#productcmb").val("0");
      $("#selectSup").val("0");
      $("#paidStatus").val("0");
      $("#progressstatus").val("0");
      $(".quantity").val("");
      $(".price").val("");
      $(".discount").val("0");
      $("#PORDesc").val("");
      $("#purchaseRDate").val("");
      $("#bodyPOR").empty();
      $("#grandTotal").text("0.00");
      $("#paid").text("0.00");
      $("#dis").text("0.00");
      $("#totalsub").text("0.00");
    }
  
    // $(document).on("click", ".delete-set", function () {
    //   $(this).parent().parent().hide();
    //   calculateTotal();
  
    // });
  });
  