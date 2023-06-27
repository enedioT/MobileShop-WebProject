$(document).ready(function() {
    var totalAmount = "<?php echo $_POST['total_amount']; ?>";
    $("#total_amount").val(totalAmount);
  });