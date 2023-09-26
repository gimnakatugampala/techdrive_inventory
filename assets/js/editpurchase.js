document.addEventListener("DOMContentLoaded", function () {
  var dropdown = document.getElementById("productcmb");
  const selectSup = document.getElementById("editselectSup");
  const supid = $("#supid").val();

  const selectPS = document.getElementById("editpaidStatus");
  const statusid = $("#statusid").val();

  const selectStatus = document.getElementById("editprogressstatus");
  const paidstatusid = $("#paidstatusid").val();

  const purchaseOrderId = $("#poid").val();

  const tableBody = $("#editbodyPL");
  const paidAmountInput = document.getElementById("paidAmount");
  const paid = document.getElementById("paid");
  const grandTotal = document.getElementById("grandTotal");

  var items = [];

  function loadselectSup() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "../pages/alllist/sup.php", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        const categories = JSON.parse(xhr.responseText);
        populateselectSup(categories);
      }
    };
    xhr.send();
  }

  function loadselectPS() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "../pages/alllist/paidstatus.php", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        const categories = JSON.parse(xhr.responseText);
        populateselectPS(categories);
      }
    };
    xhr.send();
  }

  function loadselectStatus() {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "../pages/alllist/status.php", true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        const categories = JSON.parse(xhr.responseText);
        populateselectStatus(categories);
      }
    };
    xhr.send();
  }

  function populateselectSup(categories) {
    categories.forEach(function (category) {
      const option = document.createElement("option");
      option.value = category.id;
      option.textContent = category.supname;
      if (category.id === supid) {
        option.selected = true;
      }
      selectSup.appendChild(option);
    });
  }

  function populateselectPS(categories) {
    categories.forEach(function (category) {
      const option = document.createElement("option");
      option.value = category.id;
      option.textContent = category.statusname;
      if (category.id === statusid) {
        option.selected = true;
      }
      selectPS.appendChild(option);
    });
  }

  function populateselectStatus(categories) {
    categories.forEach(function (category) {
      const option = document.createElement("option");
      option.value = category.id;
      option.textContent = category.statusname;
      if (category.id === paidstatusid) {
        option.selected = true;
      }
      selectStatus.appendChild(option);
    });
  }

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
        // row.append(
        //   "<td><a class='delete-set'><img src='../assets/img/icons/delete.svg' alt='svg'></a></td>"
        // );
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

  function load() {
    $.ajax({
      type: "POST",
      url: "../pages/get_purchase_order_data.php",
      data: { purchaseOrderId: purchaseOrderId },
      dataType: "json",
      success: function (data) {
        populateTable(data);
      },
      error: function () {
        // Handle error
        alert("Failed to retrieve data.");
      },
    });

    function populateTable(data) {
      tableBody.empty(); // Clear existing rows

      data.forEach(function (plist) {
        const row = $("<tr>");
        row.append("<td style='display:none;'>" + plist.poid + "</td>");
        row.append("<td>" + plist.productname + "</td>");
        row.append(
          "<td><input type='number' class='form-control quantity' value=" +
            plist.qty +
            " name='qty'></td>"
        );
        row.append(
          "<td><input type='number' class='form-control price' value=" +
            plist.price +
            " name='pprice'></td>"
        );
        row.append(
          "<td><input type='number' class='form-control discount' value=" +
            plist.discount +
            " name='discountp'></td>"
        );
        row.append("<td class='text-end total'></td>");
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
  };

  loadselectSup();
  loadselectPS();
  loadselectStatus();
  load();
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

function clearAB() {
  $("#productcmb").val("0");
  $("#selectSup").val("0");
  $("#paidStatus").val("0");
  $("#progressstatus").val("0");
  $(".quantity").val("");
  $(".price").val("");
  $(".discount").val("0");
  $("#paidAmount").val("");
  $("#purchaseDate").val("");
  $("#bodyPL").empty();
  $("#grandTotal").text("0.00");
  $("#paid").text("0.00");
  $("#dis").text("0.00");
  $("#topaid").text("0.00");
}
