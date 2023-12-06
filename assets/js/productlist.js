$(document).ready(function () {
  // Function to populate the table with data
  function populateTable(data) {
    var tableBody = $("table.tbplist #plist");

    data.forEach(function (productlist) {
      var row = $("<tr>");
      row.append("<td>" + productlist.productname + "</td>");
      row.append(
        "<td style='display:none;'>" + productlist.minquanity + "</td>"
      );
      row.append("<td>" + productlist.warrenty + "</td>");
      row.append("<td>" + productlist.catname + "</td>");
      row.append(
        "<td style='display:none;'>" + productlist.subcatname + "</td>"
      );
      row.append("<td>" + productlist.brandname + "</td>");
      row.append("<td>" + productlist.buyingprice + "</td>");
      row.append("<td style='display:none;'>" + productlist.avlid + "</td>");
      if (productlist.avlid == 1) {
        row.append(
          "<td><span class='badges bg-lightgreen'>InStock</span></td>"
        );
      } else {
        row.append("<td><span class='badges bg-lightred'>OutStock</span></td>");
      }
      row.append("<td>" + productlist.quantity + "</td>");
      row.append("<td>" + productlist.sellingprice + "</td>");
      row.append("<td style='display:none;'>" + productlist.catid + "</td>");
      row.append("<td style='display:none;'>" + productlist.scatid + "</td>");
      row.append("<td style='display:none;'>" + productlist.bid + "</td>");
      row.append(
        `<td>
       
        <a class='me-3 btnedit'data-productlist-id='${productlist.id}'><img src='../assets/img/icons/edit.svg' alt='img'></a>

        <a class='me-3 btn-delete' data-productlist-id='${productlist.id}'><img src='../assets/img/icons/delete.svg' alt='img'></a></td>`
      );

      tableBody.append(row);
    });
  }

  // Fetch data from the server
  $.getJSON("../pages/productlist.php", function (data) {
    populateTable(data);
  });

  $("table.tbplist").on("click", ".btnedit", function () {
    var pid = $(this).data("productlist-id");
    var catid = $(this).data("catid");
    var scatid = $(this).data("scatid");
    var bid = $(this).data("bid");
    var minquanity = $(this).data("minqty");
    var quantity = $(this).closest("tr").find("td:nth-child(7)").text();
    var avlid = $(this).data("avlid");
    var productname = $(this).closest("tr").find("td:nth-child(1)").text();
    var warrenty = $(this).data("warrenty");
    var catname = $(this).closest("tr").find("td:nth-child(4)").text();
    var subcatname = $(this).closest("tr").find("td:nth-child(5)").text();
    var brandname = $(this).closest("tr").find("td:nth-child(6)").text();
    
    
    var buyingprice = $(this).data("buyingprice");
    var sellingprice = $(this).data("sellingprice");
    
    
    console.log(avlid)

  

    window.location.href =
      "editproduct.php?pid=" +
      encodeURIComponent(pid) +
      "&productname=" +
      encodeURIComponent(productname) +
      "&minquanity=" +
      encodeURIComponent(minquanity) +
      "&warrenty=" +
      encodeURIComponent(warrenty) +
      "&catname=" +
      encodeURIComponent(catname) +
      "&subcatname=" +
      encodeURIComponent(subcatname) +
      "&brandname=" +
      encodeURIComponent(brandname) +
      "&buyingprice=" +
      encodeURIComponent(buyingprice) +
      "&avlid=" +
      encodeURIComponent(avlid) +
      "&quantity=" +
      encodeURIComponent(quantity) +
      "&sellingprice=" +
      encodeURIComponent(sellingprice) +
      "&catid=" +
      encodeURIComponent(catid) +
      "&scatid=" +
      encodeURIComponent(scatid) +
      "&bid=" +
      encodeURIComponent(bid);
  });

  $("table.tbplist").on("click", ".btn-delete", function () {
    var pid = $(this).data("productlist-id");

    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!",
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "../pages/deleteproduct.php",
          method: "POST",
          data: { pid: pid },
          success: function (response) {
            if (response === "success") {
              $(this).closest("tr").remove();
              window.location.reload();
            } else {
              alert("Failed to delete the Category.");
            }
          },
          error: function () {
            alert("Error occurred while deleting the Category.");
          },
        });
      }
    });
  });
});
