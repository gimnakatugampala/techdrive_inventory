$(document).ready(function () {
    var dropdown = document.getElementById("productcmb");
    var tableBody = $("#bodySRL");
  
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
          populateTable(data);
        },
        error: function () {},
      });
  
      // Get All the Sales List
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
            "<td><a class='deleteSaleProduct'><img src='../assets/img/icons/delete.svg' alt='svg'></a></td>"
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
      var total=0;
      items.forEach(function (item) {
        var quantity = parseFloat(item.quantityInput.value);
        var price = parseFloat(item.priceInput.value);
        var discount = parseFloat(item.discountInput.value);
  
        var itemTotal = quantity * price - discount;
        item.totalCell.textContent = itemTotal.toFixed(2);
  
        totalAmount += itemTotal;
        dis += discount;

        total = totalAmount + dis;
  
        // to = totalAmount - parseFloat(paid.textContent);
      });
      $("#grandTotal").text(totalAmount.toFixed(2));
      $("#dis").text(dis.toFixed(2));
      $("#totalsub").text(total.toFixed(2));
  
      // $("#topaid").text(to.toFixed(2));
    }
  
    $("#addSaleReturn").click(function () {
      var data = [];
      const selectPro = dropdown.value;
      const selectSup = $("#selectCus").val();
      // const selectPS = $("#paidStatus").val();
      const progressstatus = $("#progressstatus").val();
      const description = $("#sales-return-desc").val();
      // var paidAmount = parseFloat(paidAmountInput.value);
      
      var purchaseDate = $("#SalesReturnDate").val();
  
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
          text: "Please Select Customer Name",
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
      }else if (description == "" ) {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Description Cannot empty",
        });
      } else {


        if (progressstatus === "1") {
          isPaid = "1";
          completeddate = "1";
        }


       
  
        $.ajax({
          type: "POST",
          url: "../pages/addsalesreturn.php",
          data: {
            data: JSON.stringify(data),
            selectPro: selectPro,
            selectSup: selectSup,
            // selectPS: selectPS,
            progressstatus: progressstatus,
            description: description,
            purchaseDate: new Date ((new Date(purchaseDate).getFullYear()),(new Date(purchaseDate).getMonth()), (new Date(purchaseDate).getDate()), 12, 30, 0).toISOString(),
            isPaid: isPaid,
            grandTotal: grandTotal,
            // topaid: topaid,
            dis: dis,
            completeddate: completeddate,
            srcode:generateUUID(),
            sricode:generateUUID()
          },
          success: function (response) {
            console.log(response)
            if (response === "success") {
              Swal.fire({
                icon: "success",
                title: "Success",
                text: "Successfully added Sale Return",
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
      $("#selectCus").val("0");
      // $("#paidStatus").val("0");
      $("#progressstatus").val("0");
      $(".quantity").val("");
      $(".price").val("");
      $(".discount").val("0");
      // $("#paidAmount").val("");
      $("#SalesReturnDate").val("");
      $("#sales-return-desc").val("");
      $("#bodySL").empty();
      $("#grandTotal").text("0.00");
      // $("#paid").text("0.00");
      $("#dis").text("0.00");
      // $("#topaid").text("0.00");
    }
  
  
  });
  