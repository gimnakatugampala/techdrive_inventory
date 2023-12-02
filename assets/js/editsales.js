$(document).ready(function () {
    var dropdown = document.getElementById("productcmb");
    var tableBody = $("#bodyESL");

    // Get The Code From URL
    const urlParams = new URLSearchParams(window.location.search);
    const myParam = urlParams.get('code');

    document.addEventListener('DOMContentLoaded', getDataSales());

    // Get the Current Grand Total
    let grandt;

    // Get The Load Data
    let loadData;

    // console.log(myParam)
  
    const paidAmountInput = document.getElementById("paidamountVal");
    const paid = document.getElementById("paid");
    const grandTotal = document.getElementById("grandTotal");

  

    paidAmountInput.addEventListener("input", function () {
      const inputText = paidAmountInput.value;
      paid.textContent = inputText + ".00";
      var t = parseFloat(grandTotal.textContent) - parseFloat(paid.textContent);
      $("#topaid").text(t.toFixed(2));
    });
  
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

          const found = loadData.Productlists.some(el => el.pid === productId);

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
              plist.sellingprice +
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
      items.forEach(function (item) {
    
        var quantity = parseFloat(item.quantityInput.value);
        var price = parseFloat(item.priceInput.value);
        var discount = parseFloat(item.discountInput.value);
  
        var itemTotal = quantity * price - discount;
        item.totalCell.textContent = itemTotal.toFixed(2);
        
        totalAmount += itemTotal;
        console.log(totalAmount)
        // console.log(totalAmount + parseFloat(grandt))

        document.getElementById("grandTotal").style.display = "none"
        document.getElementById("editsales-grandTotal").style.display = "block"
        document.getElementById("editsales-grandTotal").textContent = totalAmount 

        dis += discount;
  
        to = totalAmount - parseFloat(paid.textContent);
      });

      // After Input On Input
      $("#grandTotal").text(totalAmount.toFixed(2));
      $("#dis").text(dis.toFixed(2));
      $("#topaid").text(to.toFixed(2));
    }
  
    $("#UpdateSales").click(function () {
      var data = [];
      const selectPro = dropdown.value;
      const selectSup = $("#selectCus").val();
      const selectPS = $("#paidStatus").val();
      const progressstatus = $("#progressstatus").val();
      var paidAmount = parseFloat(paidAmountInput.value);
      var purchaseDate = $("#salesdate").val();
  
      var grandTotal = parseFloat($("#editsales-grandTotal").text());
      var oldgrandTotal = parseFloat($("#grandTotal").text());
      var dis = parseFloat($("#dis").text());
      var topaid = parseFloat($("#topaid").text());
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

      console.log("arr"+data)
      console.log("product"+selectPro)
      console.log("customer "+selectSup)
      console.log("paid status "+selectPS)
      console.log("status "+progressstatus)
      console.log("status "+paidAmount)
      console.log("purchase date"+purchaseDate)
      if(grandTotal == 0){
        console.log("old grand total "+oldgrandTotal)
      }else{
        console.log("grand total "+grandTotal)
      }
      console.log("discount "+dis)
      console.log("to pay"+topaid)
  
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
      } else if (data.length == 0) {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Please Select Product Name",
        });
      } else if (selectPS === "0") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Please Select Paid Status",
        });
      } else if (isNaN(paidAmount) || paidAmount < 0) {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Please Enter a Valid Paid Amount",
        });
      } else if (progressstatus === "0") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Please Select Status",
        });
      } else if (selectPS == "4") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Cannot Select Quotation Paid Status",
        });
        
      }else if (progressstatus == "4") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Cannot Select Draft-Quotation Status",
        });
      }else if (selectPS == "1" && progressstatus == "1") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Not Paid Status and Completed Status Cannot be selected Together",
        });
  
      }else if (selectPS == "1" && progressstatus == "4") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Not Paid Status and Draft Status Cannot be selected Together",
        });
        
      }else if (selectPS == "2" && progressstatus == "1") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Advance Status and Completed Status Cannot be selected Together",
        });
        
      }else if (selectPS == "2" && progressstatus == "3") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Advance Status and Canceled Status Cannot be selected Together",
        });
        
      }else if (selectPS == "3" && progressstatus == "2") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Paid Status and Inprogress Status Cannot be selected Together",
        });
        
      }else if (selectPS == "3" && progressstatus == "3") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Paid Status and Canceled Status Cannot be selected Together",
        });
        
      }else if (selectPS == "3" && progressstatus == "4") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Paid Status and Draft Status Cannot be selected Together",
        });
        
      } else {


        if (selectPS === "3" && progressstatus === "1") {
          isPaid = "1";
          completeddate = "1";
        }

        const combinedArray = [...loadData.Productlists, ...pro_qty];

        // console.log(loadData.Productlists)
        console.log(data)
        console.log(combinedArray)



        // ---------------- PRODUCT ITEM ADDED VALIDATION -----------------


        // Check if the Quantity is Sufficient
      for(let i = 0; i < data.length; i++){
        if(parseInt(data[i].quantity) > parseInt(combinedArray[i].quantity)){
          Swal.fire({
            icon: "error",
            title: "Quantity Error",
            text: `${combinedArray[i].productname} has a Max QTY of ${combinedArray[i].quantity}`,
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
              text: `${combinedArray[i].productname} QTY Cannot be Zero`,
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
              text: `${combinedArray[i].productname} QTY Cannot be Negative`,
            });
  
            return
          }
        }

        // ----- PRODUCT PRICE ------
      // Check if the Price is Sufficient
      for(let i = 0; i < data.length; i++){
        if(parseInt(data[i].price) > parseInt(combinedArray[i].sellingprice)){
          Swal.fire({
            icon: "error",
            title: "Price Error",
            text: `${combinedArray[i].productname} has a Max Price of Rs.${combinedArray[i].sellingprice}`,
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
              text: `${combinedArray[i].productname} Price Cannot be Zero`,
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
            text: `${combinedArray[i].productname} Price Cannot be Negative`,
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
                text: `${combinedArray[i].productname} Discount Price Cannot be Negative`,
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
              text: `Discount Price Cannot be Greater than ${combinedArray[i].productname} Price`,
            });

            return
          }
        }



      // ---------------- PRODUCT ITEM ADDED VALIDATION -----------------

        if(grandTotal == 0){
          console.log("old grand total "+oldgrandTotal)
        }else{
          console.log("grand total "+grandTotal)
        }
  
        $.ajax({
          type: "POST",
          url: "../pages/editsales.php",
          data: {
            data: JSON.stringify(data),
            oldorderitems:JSON.stringify(loadData.Productlists),
            selectSup: selectSup,
            selectPS: selectPS,
            progressstatus: progressstatus,
            paidAmount: paidAmount,
            purchaseDate: purchaseDate,
            isPaid: isPaid,
            grandTotal: grandTotal == 0 ? oldgrandTotal : grandTotal,
            topaid: topaid,
            dis: dis,
            completeddate: completeddate,
            soid:loadData.ID.id,            
            piid:loadData.SalesOrder[0].id,
            socode:loadData.ID.socode,
            qrcode:loadData.ID.qr_img
          },
          success: function (response) {
            console.log(response)
            if (response === "success") {
              Swal.fire({
                icon: "success",
                title: "Success",
                text: "Successfully Updated Sale",
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
      $("#paidStatus").val("0");
      $("#progressstatus").val("0");
      $(".quantity").val("");
      $(".price").val("");
      $(".discount").val("0");
      $("#paidAmount").val("");
      $("#salesdate").val("");
      $("#bodyESL").empty();
      $("#grandTotal").text("0.00");
      $("#paid").text("0.00");
      $("#dis").text("0.00");
      $("#topaid").text("0.00");
    }

    function getDataSales(){
      $.ajax({
        type: "POST",
        url: "../pages/getsalesdata.php",
        data: { code: myParam },
        dataType: "json",
        success: function (data) {
          // console.log(data);

          loadData = data;

          let cusSelectElement = document.getElementById("selectCus");
          let salesDateElement = document.getElementById("salesdate");
          let paidStatusElement = document.getElementById("paidStatus");
          let paidAmountElement = document.getElementById("paidamountVal");
          let statusElement = document.getElementById("progressstatus");

          var GrandTotalElement = document.getElementById("grandTotal");
          var PaidAElement = document.getElementById("paid");
          var DiscountElement = document.getElementById("dis");
          var ToBePaidElement = document.getElementById("topaid");

          

          // Customer
          for (var i = 0; i < cusSelectElement.options.length; i++) {
            if (cusSelectElement.options[i].value === data.SalesOrder[0].cusid) {
              cusSelectElement.options[i].selected = true;
                break;
            }
          }

            // Sales date
            salesDateElement.value = data.SalesOrder[0].salesorderdate.split(' ')[0]

            // Paid Status
            for (var i = 0; i < paidStatusElement.options.length; i++) {
              if (paidStatusElement.options[i].value === data.SalesOrder[0].paidstatusid) {
                paidStatusElement.options[i].selected = true;
                  break;
            }
          }


          // Paid Amount
          paidAmountElement.value = data.SalesOrder[0].paidamount


          // Status
          for (var i = 0; i < statusElement.options.length; i++) {
            if (statusElement.options[i].value === data.SalesOrder[0].sid) {
              statusElement.options[i].selected = true;
                break;
          }
        }


        // Grand Total
        GrandTotalElement.textContent = `${data.SalesOrder[0].grandtotal}.00`

        // grandt = data.SalesOrder[0].grandtotal

        // Paid Amount
        PaidAElement.textContent = `${data.SalesOrder[0].paidamount}.00`

        // Discount
        DiscountElement.textContent = `${data.SalesOrder[0].discount}.00`

        // To be Paid
        ToBePaidElement.textContent = `${parseFloat(data.SalesOrder[0].grandtotal) - (parseFloat(data.SalesOrder[0].paidamount))}.00`
            
        // Get The Product Order Item List
        data.Productlists.forEach(function (plist) {
          var row = $("<tr>");
          row.append("<td style='display:none;'>" + plist.id + "</td>");
          row.append("<td>" + plist.productname + "</td>");
          row.append(
            "<td><input type='number' class='form-control quantity'  value=" +
              plist.QTY +
              " name='qty'></td>"
          );
          row.append(
            "<td><input type='number' class='form-control price' value=" +
              plist.price +
              " name='pprice'></td>"
          );
          row.append(
            "<td><input type='number' class='form-control discount' value="+
            plist.discount +" name='discountp'></td>"
          );
          row.append(`<td class='text-end total'>${parseFloat(plist.price) * parseFloat(plist.QTY) - parseFloat(plist.discount)}</td>`);
          row.append(
            "<td><a class='deleteSaleProduct'><img src='../assets/img/icons/delete.svg' alt='svg'></a></td>"
          );
          tableBody.append(row);

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
  
        });

        },
        error: function () {},
      });

    }

    

  
  
  });
  