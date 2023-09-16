$(document).ready(function () {
  $("#brandFilterButton").click(function () {
    var brandName = $("#brandFilterInput").val();
    $.ajax({
      type: "POST",
      url: "../pages/filterbrand.php", // Create this PHP script
      data: { brandName: brandName },
      success: function (data) {
        $("#brandListBody").html(data);
      },
    });
  });
});
