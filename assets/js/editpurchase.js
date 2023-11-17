$(document).ready(function () {
  var dropdown = document.getElementById("productcmb");
  const tableBody = $("#bodyEPL");

     // Get the Current Grand Total
     let grandt;

     // Get The Load Data
     let loadData;

    var items = [];

   // Get The Code From URL
   const urlParams = new URLSearchParams(window.location.search);
   const myParam = urlParams.get('code');

   document.addEventListener('DOMContentLoaded', getDataPurchases());

  const paidAmountInput = document.getElementById("paidAmountEditVal");
  const paid = document.getElementById("paid");
  const grandTotal = document.getElementById("grandTotal");
  
  paidAmountInput.addEventListener("input", function () {
    const inputText = paidAmountInput.value;
    paid.textContent = inputText + ".00";
    const t = parseFloat(grandTotal.textContent) - parseFloat(paid.textContent);
    $("#topaid").text(t.toFixed(2));
  });

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
    let totalAmount = 0;
    let to = 0;
    let dis = 0;

  
    items.forEach(function (item) {
      const quantity = parseFloat(item.quantityInput.value);
      const price = parseFloat(item.priceInput.value);
      const discount = parseFloat(item.discountInput.value);
  
      const itemTotal = quantity * price - discount;
      item.totalCell.textContent = itemTotal.toFixed(2);
  
      totalAmount += itemTotal;
      dis += discount;
  
      to = totalAmount - parseFloat(paid.textContent);
    });
    $("#grandTotal").text(totalAmount.toFixed(2));
    $("#dis").text(dis.toFixed(2));
  
    $("#topaid").text(to.toFixed(2));
  }
  
  // function clearAB() {
  //   $("#productcmb").val("0");
  //   $("#selectSup").val("0");
  //   $("#paidStatus").val("0");
  //   $("#progressstatus").val("0");
  //   $(".quantity").val("");
  //   $(".price").val("");
  //   $(".discount").val("0");
  //   $("#paidAmount").val("");
  //   $("#purchaseDate").val("");
  //   $("#bodyPL").empty();
  //   $("#grandTotal").text("0.00");
  //   $("#paid").text("0.00");
  //   $("#dis").text("0.00");
  //   $("#topaid").text("0.00");
  // }
  
  
  function getDataPurchases(){
    $.ajax({
      type: "POST",
      url: "../pages/getpurchasesdata.php",
      data: { code: myParam },
      dataType: "json",
      success: function (data) {

        console.log(data);

        loadData = data;

        let supSelectElement = document.getElementById("selectSup");
        let purchaseDateElement = document.getElementById("editpurchaseDate");
        let paidStatusElement = document.getElementById("paidStatus");
        let paidAmountElement = document.getElementById("paidAmountEditVal");
        let statusElement = document.getElementById("progressstatus");

        var GrandTotalElement = document.getElementById("grandTotal");
        var PaidAElement = document.getElementById("paid");
        var DiscountElement = document.getElementById("dis");
        var ToBePaidElement = document.getElementById("topaid");

        

        // Suppplier
        for (var i = 0; i < supSelectElement.options.length; i++) {
          if (supSelectElement.options[i].value === data.PurchaseOrder[0].supid) {
              supSelectElement.options[i].selected = true;
              break;
          }
        }

          // Sales date
          purchaseDateElement.value = data.PurchaseOrder[0].created_date.split(' ')[0]

          // Paid Status
          for (var i = 0; i < paidStatusElement.options.length; i++) {
            if (paidStatusElement.options[i].value === data.PurchaseOrder[0].paid_status) {
              paidStatusElement.options[i].selected = true;
                break;
          }
        }


        // Paid Amount
        paidAmountElement.value = data.PurchaseOrder[0].paidamount


        // Status
        for (var i = 0; i < statusElement.options.length; i++) {
          if (statusElement.options[i].value === data.PurchaseOrder[0].statusid) {
            statusElement.options[i].selected = true;
              break;
        }
      }


      // Grand Total
      GrandTotalElement.textContent = `${data.PurchaseOrder[0].grandtotal}.00`

      grandt = data.PurchaseOrder[0].grandtotal

      // Paid Amount
      PaidAElement.textContent = `${data.PurchaseOrder[0].paidamount}.00`

      // Discount
      DiscountElement.textContent = `${data.PurchaseOrder[0].discount}.00`

      // To be Paid
      ToBePaidElement.textContent = `${parseFloat(data.PurchaseOrder[0].grandtotal) - (parseFloat(data.PurchaseOrder[0].paidamount) + parseFloat(data.PurchaseOrder[0].discount))}.00`
          
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

