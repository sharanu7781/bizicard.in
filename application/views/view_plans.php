<?php $this->load->view('layouts/root/header.php'); ?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<style>
table.GeneratedTable {
    padding: 5px;
    width: 100%;
    background-color: #ffffff;
    border-collapse: collapse;
    border-width: 1px;
    border-color: #1b1b18;
    border-style: solid;
    color: #000000;
}

table.GeneratedTable td,
table.GeneratedTable th {
    border-width: 1px;
    border-color: c;
    border-style: solid;
    padding: 3px;
}

table.GeneratedTable thead {
    background-color: #ffcc00;
}

td {
    text-align: left;
    vertical-align: middle;
}

#td_silver {
    background-color: #f0ceeb;
}

#td_gold {
    background-color: #fae1ba;
}

#td_platinum {
    background-color: #ebfaba;
}

.rupee_symbol {
    font-family: sans-serif !important;
}
</style>

<div class="account-pages pt-sm-2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-10 col-xl-10">
                <div class="card overflow-hidden">
                    <div class="card-body pt-0">
                        <h3 class="text-center mt-4">
                            <a href="javascript:void(0)" class="logo logo-admin"><img
                                    src="<?php echo base_url();?>public/assets/images/bizicard-logo.png" height="60"
                                    alt="logo"></a>
                        </h3>
                        <div class="row">
                            <div class=" col-lg-4"></div>
                            <div class=" col-lg-4">
                                <h4 class="text-center">Bizicard Plans and Pricing Details</h4>
                            </div>
                            <div class=" col-lg-4"></div>
                        </div>
                        <div class="row">
                            <div class=" col-lg-4">
                                <a href="<?php echo base_url();?>logout" class="btn btn-primary btn-warning">Logout</a>
                            </div>
                            <div class=" col-lg-4"></div>
                            <div class=" col-lg-4">

                            </div>
                        </div>


                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <span style="font-weight: bold;">7 Days Free Trial</span>

                                            <?php
                                                    // Check if the user is currently on a free trial
                                                    if ($this->session->userdata('free_trial') === 'Y') {
                                                        echo '<a href="#" class="btn btn-success" disabled>Start Free Trial</a>';
                                                    } else {
                                                        echo '<a href="' . site_url('trialcontroller/startfreetrial') . '" class="btn btn-success">Start Free Trial</a>';
                                                    }
                                                ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="logoutMessage" style="display:none;">
                            <?php
                                // Check for the flashdata message
                                if ($this->session->flashdata('trial_message')) {
                                    echo '<p>' . $this->session->flashdata('trial_message') . '</p>';
                                }
                                ?>
                            <a href="<?php echo site_url('logout'); ?>" class="btn btn-primary">Logout</a>
                        </div>





                        <div class="row">
                            <div class="col-lg-12 col-md-12 text-center mt-3">
                                <p><strong>Or</strong></p>
                            </div>
                        </div>






                        <div id="accordion">
                            <?php 
                                                $cnt = 1;
                                                foreach($plan_feture_data as $plan_row) { ?>
                            <div class="card mb-1 shadow-none">
                                <div class="card-header p-3" id="headingOne">
                                    <h6 class="m-0 font-size-14">
                                        <a href="#collapse_<?php echo $cnt;?>" class="text-dark" data-toggle="collapse"
                                            aria-expanded="false" aria-controls="collapse_<?php echo $cnt;?>">
                                            <?php echo $plan_row->plan_name;?> - <span
                                                class="rupee_symbol">&#x20B9;</span><?php echo $plan_row->plan_price;?>
                                            per year
                                        </a>
                                        <input type="hidden" id="original_amount_<?php echo $cnt;?>" value="<?php echo $plan_row->plan_price;?>"/>
                                    </h6>
                                </div>

                                <div id="collapse_<?php echo $cnt;?>" class="collapse" aria-labelledby="headingOne"
                                    data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="couponCode_<?php echo $cnt;?>">Coupon Code</label>
                                                    <input type="text" class="form-control"
                                                        id="couponCode_<?php echo $cnt;?>"
                                                        placeholder="Enter your coupon code">
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="margin-top: 27px;">
                                                <button class="btn btn-primary applyCouponBtn"
                                                    data-plan="<?php echo $cnt;?>">Apply Coupon</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <table class="table table-striped table-bordered dt-responsive nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>FEATURES</th>
                                                        <th><?php
                                                                                // Create the Razorpay Order
                                                                                //
                                                                                // We create an razorpay order using orders api
                                                                                // Docs: https://docs.razorpay.com/docs/orders
                                                                                //
                                                                                $orderData = [
                                                                                    //'receipt'         => $bizicard_receipt_no,
                                                                                    'amount'          => ($plan_row->plan_price* 100), // 2000 rupees in paise
                                                                                    'currency'        => 'INR',
                                                                                    "notes"  => array("custom_order_id" => $bizicard_receipt_no)
                                                                                    //'payment_capture' => 1 // auto capture
                                                                                ];

                                                                                $razorpayOrder = $this->api->order->create($orderData);

                                                                                $razorpayOrderId = $razorpayOrder['id'];

                                                                                $amount = number_format((float)($orderData['amount'] / 100), 2, '.', '');

                                                                                $checkout = 'automatic';

                                                                                $data = [
                                                                                    "key"               => RAZORPAY_KEYID,
                                                                                    "amount"            => $amount,
                                                                                    "name"              => "Bizicard Payments",
                                                                                    "description"       => "Plan Purchase Payment",
                                                                                    "image"             => "https://bizicard.in/public/assets/images/bizicard-logo.png",
                                                                                    "prefill"           => [
                                                                                    "name"              => $this->session->userdata("display_name"),
                                                                                    "email"             => $this->session->userdata("email_id"),
                                                                                    "contact"           => $this->session->userdata("mobile_no"),
                                                                                    ],
                                                                                    "notes"  => array("custom_order_id" => $bizicard_receipt_no),
                                                                                    "theme"             => [
                                                                                    "color"             => "#F37254"
                                                                                    ],
                                                                                    "order_id"          => $razorpayOrderId,
                                                                                ];
                                                                                $this->session->set_userdata("template_payment_amount", $amount);
                                                                                ?>
                                                            <form
                                                                action="<?php echo base_url();?>razorpay_integration_files/verify_plan_payment.php"
                                                                method="POST">
                                                                <script
                                                                    src="https://checkout.razorpay.com/v1/checkout.js"
                                                                    data-key="<?php echo $data['key'];?>"
                                                                    data-amount="<?php echo $data['amount'];?>"
                                                                    data-currency="INR"
                                                                    data-name="<?php echo $data['name'];?>"
                                                                    data-image="<?php echo $data['image'];?>"
                                                                    data-description="<?php echo $data['description'];?>"
                                                                    data-prefill.name="<?php echo $data['prefill']['name'];?>"
                                                                    data-prefill.email="<?php echo $data['prefill']['email'];?>"
                                                                    data-prefill.contact="<?php echo $data['prefill']['contact'];?>"
                                                                    data-notes.shopping_order_id="<?php echo $razorpayOrderId;?>"
                                                                    data-order_id="<?php echo $data['order_id'];?>"
                                                                    data-display_amount="<?php echo $data['amount'];?>"
                                                                    data-display_currency="INR">
                                                                </script>
                                                                <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
                                                                <input type="hidden" name="shopping_order_id"
                                                                    value="<?php echo $razorpayOrderId;?>">
                                                                <input type="hidden" name="plan_selected"
                                                                    id="plan_selected"
                                                                    value="<?php echo $plan_row->id;?>" />
                                                                <input type="hidden" name="plan_selected_name"
                                                                    value="<?php echo $plan_row->plan_name;?>" />
                                                                <input type="text" name="template_payment_amount" id="template_payment_amount_<?php echo $cnt;?>"
                                                                    value="<?php echo $amount;?>" />
                                                                <input type="hidden" name="user_id"
                                                                    value="<?php echo $this->session->userdata("id");?>" />
                                                                <script
                                                                    src="<?php echo base_url();?>public/assets/libs/jquery/jquery.min.js">
                                                                </script>
                                                                <script>
                                                                $(".razorpay-payment-button").addClass(
                                                                    "btn btn-primary waves-effect waves-light"
                                                                );
                                                                $(".razorpay-payment-button").val(
                                                                    "Pay");
                                                                </script>
                                                            </form>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($plan_row->plan_feature_mapping as $feature_row) { ?>
                                                    <tr>
                                                        <td><?php echo $feature_row->feature_name;?>
                                                        </td>
                                                        <td><?php echo $feature_row->know_more;?></td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                                    $cnt++;
                                                } ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() {
    $("#startTrialBtn").click(function() {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('trialcontroller/startFreetrial'); ?>",
            dataType: "json",
            success: function(response) {
                console.log(response);

                $("#logoutMessage").show();

                if (response.status === "success") {
                    console.log("success");
                    // Redirect after 3 seconds
                    setTimeout(function() {
                        window.location.href = "<?php echo site_url('login'); ?>";
                    }, 3000);
                } else {
                    console.log("failed");
                    alert("Failed to start free trial. Please try again.");
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                console.log("error", xhr, textStatus, errorThrown);
                alert("Failed to start free trial. Please try again.");
            }
        });
    });
});
</script>
<script>
$(document).ready(function() {
    $(".applyCouponBtn").click(function() {
        var planIndex = $(this).data("plan");
        var couponCode = $("#couponCode_" + planIndex).val();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('Coupon_CI/applyCoupon'); ?>",
            data: {
                couponCode: couponCode
            },
            dataType: "json",
            success: function(response) {
                console.log(response);

                if (response.status === "success") {
                    alert("Coupon applied successfully!");
                    var amount = $("#original_amount_" + planIndex).val();
                    var disocuntedAmount = amount / 100 * response.discount_percentage;
                    amount = amount - disocuntedAmount;
                    $("#template_payment_amount_"+ planIndex).val(amount);
                    // You may want to update the UI to reflect the discounted amount
                } else {
                    alert("Failed to apply coupon. Please check your coupon code.");
                }
            },
            error: function(xhr, textStatus, errorThrown) {
                console.log("error", xhr, textStatus, errorThrown);
                alert("Failed to apply coupon. Please try again.");
            }
        });
    });
});
</script>
<?php $this->load->view('layouts/root/footer.php'); ?>