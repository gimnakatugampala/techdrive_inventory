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
      items.forEach(function (item) {

        
        // console.log(parseInt(document.getElementById("paid").innerText))
        // console.log(parseInt(document.getElementById("dis").innerText))
        // console.log(parseInt(document.getElementById("topaid").innerText))
    
        var quantity = parseFloat(item.quantityInput.value);
        var price = parseFloat(item.priceInput.value);
        var discount = parseFloat(item.discountInput.value);
  
        var itemTotal = quantity * price - discount;
        item.totalCell.textContent = itemTotal.toFixed(2);

        // console.log(parseFloat(GrandTotalElement.innerText))
        // console.log(PaidAElement.innerText)
        // console.log(DiscountElement.innerText)
        // console.log(ToBePaidElement.innerText)
        console.log(grandt)
        console.log(items)
        
        totalAmount += itemTotal;
        console.log(totalAmount)
        console.log(totalAmount + parseFloat(grandt))

        document.getElementById("grandTotal").style.display = "none"
        document.getElementById("editsales-grandTotal").style.display = "block"
        document.getElementById("editsales-grandTotal").textContent = totalAmount + parseFloat(grandt)

        console.log("----")
        dis += discount;
  
        to = totalAmount - parseFloat(paid.textContent);
      });
      // After Input On Input
      $("#grandTotal").text(totalAmount.toFixed(2));
      
      $("#dis").text(dis.toFixed(2));
  
      $("#topaid").text(to.toFixed(2));
    }
  
    $("#updateSale").click(function () {
      var data = [];
      const selectPro = dropdown.value;
      const selectSup = $("#selectCus").val();
      const selectPS = $("#paidStatus").val();
      const progressstatus = $("#progressstatus").val();
      var paidAmount = parseFloat(paidAmountInput.value);
      var purchaseDate = $("#purchaseDate").val();
  
      var grandTotal = parseFloat($("#grandTotal").text());
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
      } else if (progressstatus === "1" && selectPS == "1" || progressstatus === "1" && selectPS == "2" || progressstatus === "1" && selectPS == "4") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "If Status Completed Paid Status Should be Paid",
        });
      } else if (progressstatus === "3" ||  progressstatus == "4" ) {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Cannot Select Canceled Status or Draft Status",
        });
      } else {
        if (selectPS === "3" && progressstatus === "1") {
          isPaid = "1";
          completeddate = "1";
        }
  
        $.ajax({
          type: "POST",
          url: "../pages/addsale.php",
          data: {
            data: JSON.stringify(data),
            selectPro: selectPro,
            selectSup: selectSup,
            selectPS: selectPS,
            progressstatus: progressstatus,
            paidAmount: paidAmount,
            purchaseDate: purchaseDate,
            isPaid: isPaid,
            grandTotal: grandTotal,
            topaid: topaid,
            dis: dis,
            completeddate: completeddate,
            socode:generateUUID(),
            picode:generateUUID()
          },
          success: function (response) {
            // console.log(response)
            if (response === "success") {
              Swal.fire({
                icon: "success",
                title: "Success",
                text: "Successfully added Sale",
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
      $("#purchaseDate").val("");
      $("#bodySL").empty();
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
          console.log(data);

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

        grandt = data.SalesOrder[0].grandtotal

        // Paid Amount
        PaidAElement.textContent = `${data.SalesOrder[0].paidamount}.00`

        // Discount
        DiscountElement.textContent = `${data.SalesOrder[0].discount}.00`

        // To be Paid
        ToBePaidElement.textContent = `${parseFloat(data.SalesOrder[0].grandtotal) - (parseFloat(data.SalesOrder[0].paidamount) + parseFloat(data.SalesOrder[0].discount))}.00`
            
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
  