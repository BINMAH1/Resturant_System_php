var orderItems = [];

function addItem() {
  var menuItem = $("#menuItems").val();
  orderItems.push(menuItem);
  updateOrderDetails();
}

function clearItems() {
  orderItems = [];
  updateOrderDetails();
}

function updateOrderDetails() {
  $("#orderDetails").val(orderItems.join(", "));
}

$(document).ready(function() {
  $("#orderForm").submit(function(event) {
    event.preventDefault();
    var customerName = $("#customerName").val();
    var orderDetails = $("#orderDetails").val();

    // Send order details to the server using AJAX
    $.ajax({
      url: "process_order.php",
      type: "POST",
      data: {
        customerName: customerName,
        orderDetails: orderDetails
      },
      success: function(response) {
        $("#orderStatus").text(response);
      },
      error: function(xhr, status, error) {
        console.log(xhr.responseText);
      }
    });
  });
});