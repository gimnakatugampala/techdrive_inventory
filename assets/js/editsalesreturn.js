$(document).ready(function () {
    console.log("13")
    var dropdown = document.getElementById("productcmb");
    const tableBody = $("#bodyESORL");
  
       // Get the Current Grand Total
       let grandt;
  
       // Get The Load Data
       let loadData;
  
      var items = [];
  
     // Get The Code From URL
     const urlParams = new URLSearchParams(window.location.search);
     const myParam = urlParams.get('code');
  
     document.addEventListener('DOMContentLoaded', getDataSalesReturns());
  
    // const paidAmountInput = document.getElementById("paidAmountEditVal");
    // const paid = document.getElementById("paid");
    // const grandTotal = document.getElementById("grandTotal");
    
    // paidAmountInput.addEventListener("input", function () {
    //   const inputText = paidAmountInput.value;
    //   paid.textContent = inputText + ".00";
    //   const t = parseFloat(grandTotal.textContent) - parseFloat(paid.textContent);
    //   $("#topaid").text(t.toFixed(2));
    // });
  
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

            const found = loadData.Productlists.some(el => el.pid == productId);

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
          const item = {
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
  
        // document.getElementById("grandTotal").style.display = "none"
        // document.getElementById("editpo-grandTotal").style.display = "block"
        // document.getElementById("editpo-grandTotal").textContent = `${totalAmount}.00` 
  
  
        dis += discount;
        // to = totalAmount - parseFloat(paid.textContent);
      });
      // After Input On Input
      $("#grandTotal").text(totalAmount.toFixed(2));
      
      $("#dis").text(dis.toFixed(2));
  
    //   $("#topaid").text(to.toFixed(2));
    }
    
    function clearAB() {
    //   $("#productcmb").val("0");
    //   $("#selectSup").val("0");
    //   $("#progressstatus").val("0");
    //   $(".quantity").val("");
    //   $(".price").val("");
    //   $(".discount").val("0");
    //   $("#paidAmount").val("");
    //   $("#purchaseDate").val("");
    //   $("#bodyEPORL").empty();
    //   $("#grandTotal").text("0.00");
    // //   $("#paid").text("0.00");
    //   $("#dis").text("0.00");
    //   $("#topaid").text("0.00");
    }
  
    $("#updateSalesOrderReturnBtn").click(function () {
  
      var data = [];
      const selectPro = dropdown.value;
      const selectSup = $("#selectCus").val();
      const progressstatus = $("#progressstatus").val();
      const Description = $("#description-sales-return").val();
    //   var paidAmount = parseFloat(paidAmountInput.value);
      var purchaseDate = $("#editsalesDate").val();
  
      var grandTotal = parseFloat($("#editpo-grandTotal").text());
      var oldgrandTotal = parseFloat($("#grandTotal").text());
      var dis = parseFloat($("#dis").text());
    //   var topaid = parseFloat($("#topaid").text());
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
      console.log("status "+progressstatus)
      console.log("purchase date"+purchaseDate)

      if(grandTotal == 0){
        console.log("old grand total "+oldgrandTotal)
      }else{
        console.log("grand total "+grandTotal)
      }
      console.log("discount "+dis)

  
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
      } else if (data.length == 0) {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Please Select Product Name",
        });
      }  else if (progressstatus === "0") {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Please Select Status",
        });
      }  else if (progressstatus === "3" ||  progressstatus == "4" ) {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Cannot Select Canceled Status or Draft Status",
        });
      } else {
        if (progressstatus === "1") {
          isPaid = "1";
          completeddate = "1";
        }
  
        console.log(loadData.Productlists)
        console.log(data)
        console.log(dis)
  
        if(grandTotal == 0){
          console.log("old grand total "+oldgrandTotal)
        }else{
          console.log("grand total "+grandTotal)
        }
  
        $.ajax({
          type: "POST",
          url: "../pages/editsalesreturn.php",
          data: {
            data: JSON.stringify(data),
            oldorderitems:JSON.stringify(loadData.Productlists),
            selectSup: selectSup,
            Description:Description,
            // selectPS: selectPS,
            progressstatus: progressstatus,
            // paidAmount: paidAmount,
            purchaseDate: purchaseDate,
            isPaid: isPaid,
            grandTotal: grandTotal == 0 ? oldgrandTotal : grandTotal,
            // topaid: topaid,
            dis: dis,
            completeddate: completeddate,
            poid:loadData.ID.id,            
            piid:loadData.SalesOrderReturns[0].id,
          },
          success: function (response) {
            console.log(response)
            if (response === "success") {
              Swal.fire({
                icon: "success",
                title: "Success",
                text: "Successfully Purchase Return Updated",
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
    
    
    function getDataSalesReturns(){
      $.ajax({
        type: "POST",
        url: "../pages/getsalesreturndata.php",
        data: { code: myParam },
        dataType: "json",
        success: function (data) {
  
          console.log(data);
  
          loadData = data;
  
          let CusSelectElement = document.getElementById("selectCus");
          let SalesDateElement = document.getElementById("editsalesDate");
          let DescElement = document.getElementById("description-sales-return");
          let statusElement = document.getElementById("progressstatus");
  
          var GrandTotalElement = document.getElementById("grandTotal");
          var DiscountElement = document.getElementById("dis");

  
          
  
          // Cus
          for (var i = 0; i < CusSelectElement.options.length; i++) {
            if (CusSelectElement.options[i].value === data.SalesOrderReturns[0].cusid) {
                CusSelectElement.options[i].selected = true;
                break;
            }
          }
  
            // Sales date
            SalesDateElement.value = data.SalesOrderReturns[0].salesorderreturndate.split(' ')[0]
  
       

          // Description
          DescElement.value = data.ID.description
  
  
          // Status
          for (var i = 0; i < statusElement.options.length; i++) {
            if (statusElement.options[i].value === data.SalesOrderReturns[0].sid) {
              statusElement.options[i].selected = true;
                break;
          }
        }
  
  
        // Grand Total
        GrandTotalElement.textContent = `${data.SalesOrderReturns[0].grandtotal}.00`
  
        grandt = data.SalesOrderReturns[0].grandtotal
        
  
        // Discount
        DiscountElement.textContent = `${data.SalesOrderReturns[0].discount}.00`
  
            
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
  
  