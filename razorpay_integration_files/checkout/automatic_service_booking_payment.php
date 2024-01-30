<!--  The entire list of Checkout fields is available at
 https://docs.razorpay.com/docs/checkout-form#checkout-fields -->

<form action="<?php echo $razorpay_values_array["submit_url"];?>" method="POST">
<input type="hidden" name="insert_id" value="<?php echo $razorpay_values_array["insert_id"];?>" />
<input type="hidden" name="custom_order_id" value="<?php echo $razorpay_values_array["bizicard_receipt_no"];?>" />
<input type="hidden" name="plan_selected_name" value="<?php echo $razorpay_values_array["plan_selected_name"];?>" />
<input type="hidden" name="payment_price" value="<?php echo $razorpay_values_array["payment_price"];?>" />
<input type="hidden" name="go_back_url" value="<?php echo $razorpay_values_array["go_back_url"];?>" />
<input type="hidden" name="SELECTED_SERVICE_TEXT" value="<?php echo $razorpay_values_array["SELECTED_SERVICE_TEXT"];?>" />
<input type="hidden" name="SERVICE_TIMING" value="<?php echo $razorpay_values_array["SERVICE_TIMING"];?>" />
<input type="hidden" name="SERVICE_DATE" value="<?php echo $razorpay_values_array["SERVICE_DATE"];?>" />
<input type="hidden" name="SERVICE_SLOT" value="<?php echo $razorpay_values_array["SERVICE_SLOT"];?>" />
<input type="hidden" name="USER_ID" value="<?php echo $razorpay_values_array["USER_ID"];?>" />
<input type="hidden" name="payment_from_name" value="<?php echo $razorpay_values_array["payment_from_name"];?>" />
<input type="hidden" name="payment_from_emailid" value="<?php echo $razorpay_values_array["payment_from_emailid"];?>" />
<input type="hidden" name="payment_from_mobilenumber" value="<?php echo $razorpay_values_array["payment_from_mobilenumber"];?>" />



  <script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $data['key']?>"
    data-amount="<?php echo $data['amount']?>"
    data-currency="INR"
    data-name="<?php echo $data['name']?>"
    data-image="<?php echo $data['image']?>"
    data-description="<?php echo $data['description']?>"
    data-prefill.name="<?php echo $data['prefill']['name']?>"
    data-prefill.email="<?php echo $data['prefill']['email']?>"
    data-prefill.contact="<?php echo $data['prefill']['contact']?>"
   
    data-order_id="<?php echo $data['order_id']?>"
    <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
    <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
  >
  </script>
  <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
  
  <script src="<?php echo base_url();?>public/assets/libs/jquery/jquery.min.js"></script>
  <script>$(".razorpay-payment-button").addClass("btn btn-primary waves-effect waves-light");$(".razorpay-payment-button").val("Make Payment");</script>
  <a href="<?php echo $razorpay_values_array["go_back_url"];?>" class="btn btn-primary btn-warning">Go Back</a>
  
</form>

