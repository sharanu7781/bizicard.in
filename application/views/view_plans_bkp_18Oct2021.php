<?php

// Create the Razorpay Order
//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    //'receipt'         => $bizicard_receipt_no,
    'amount'          => (500 * 100), // 2000 rupees in paise
    'currency'        => 'INR',
    "notes"  => array("custom_order_id" => $bizicard_receipt_no)
    //'payment_capture' => 1 // auto capture
];

$razorpayOrder = $this->api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$amount = number_format((float)($orderData['amount'] / 100), 2, '.', '');

// if ($displayCurrency !== 'INR')
// {
//     $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
//     $exchange = json_decode(file_get_contents($url), true);

//     $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
// }

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
    // "notes"             => [
    // "address"           => "Hello World",
    // "merchant_order_id" => "12312321",
    // ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];
$this->session->set_userdata("template_payment_amount", $amount);
?>
<?php $this->load->view('layouts/root/header.php'); ?>
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
        text-align: center;
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
    </style>
    <div class="account-pages pt-sm-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">
                            <h3 class="text-center mt-4">
                                <a href="javascript:void(0)" class="logo logo-admin"><img src="<?php echo base_url();?>public/assets/images/bizicard-logo.png" height="60" alt="logo"></a>
                            </h3>
                            <div class="p-3">
                                <form action="<?php echo base_url();?>razorpay_integration_files/verify_plan_payment.php" method="POST">
                                <h4 class="text-muted font-size-18 mb-1 text-center">Bizicard Plans and Pricing Details</h4>
                                <a href="<?php echo base_url();?>logout" class="btn btn-primary btn-warning">Logout</a>
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
                                    data-display_currency="INR" >
                                </script>
                                <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
                                <input type="hidden" name="shopping_order_id" value="<?php echo $razorpayOrderId;?>">
                                <script src="<?php echo base_url();?>public/assets/libs/jquery/jquery.min.js"></script>
                                <script>$(".razorpay-payment-button").addClass("btn btn-primary btn-lg waves-effect waves-light float-right");$(".razorpay-payment-button").val("Select Plan and make payment");</script>
                                <table class="table table-striped table-bordered dt-responsive nowrap" style="border: 1px solid black">
                                    <thead>
                                        <tr>
                                            <th style="width: 20%">FEATURES</th>
                                            <th style="width: 20%">Know More</th>
                                            <th><input type="radio" name="plans" value="Bronze" checked/>RS.500 per year</th>
                                            <th>COMING SOON</th>
                                            <th>COMING SOON</th>
                                            <th>COMING SOON</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>-</td>
                                            <td>-</td>
                                            <td style="background-color: #dcf9fd"><b>Bronze</b></td>
                                            <td id="td_silver"><b>Silver</b></td>
                                            <td id="td_gold"><b>Gold</b></td>
                                            <td id="td_platinum"><b>Platinum</b></td>
                                        </tr>
                                        <tr>
                                            <td>Setup charges</td>
                                            <td>One time charges that includes webinar training</td>
                                            <td style="background-color: #dcf9fd">No</td>
                                            <td id="td_silver">No</td>
                                            <td id="td_gold">No</td>
                                            <td id="td_platinum">No</td>
                                        </tr>
                                        <tr>
                                            <td>Photo</td>
                                            <td>500x500 photo to appear on WhatsApp link</td>
                                            <td style="background-color: #dcf9fd">Yes</td>
                                            <td id="td_silver">Yes</td>
                                            <td id="td_gold">Yes</td>
                                            <td id="td_platinum">Yes</td>
                                        </tr>
                                        <tr>
                                            <td>Logo</td>
                                            <td>300x100 logo image on top of Photo</td>
                                            <td style="background-color: #dcf9fd">Yes</td>
                                            <td id="td_silver">Yes</td>
                                            <td id="td_gold">Yes</td>
                                            <td id="td_platinum">Yes</td>
                                        </tr>
                                        <tr>
                                            <td>Name, Designation, Company</td>
                                            <td>-</td>
                                            <td style="background-color: #dcf9fd">Yes</td>
                                            <td id="td_silver">Yes</td>
                                            <td id="td_gold">Yes</td>
                                            <td id="td_platinum">Yes</td>
                                        </tr>
                                        <tr>
                                            <td>Bio (100 words)</td>
                                            <td>
                                            Write the most <br />intersting aspects about your commercial
                                            profile
                                            </td>
                                            <td style="background-color: #dcf9fd">Yes</td>
                                            <td id="td_silver">Yes</td>
                                            <td id="td_gold">Yes</td>
                                            <td id="td_platinum">Yes</td>
                                        </tr>
                                        <tr>
                                            <td>Social Media Links</td>
                                            <td>Facebook, Instagram, Twitter, LinkedIn</td>
                                            <td style="background-color: #dcf9fd">Yes</td>
                                            <td id="td_silver">Yes</td>
                                            <td id="td_gold">Yes</td>
                                            <td id="td_platinum">Yes</td>
                                        </tr>
                                        <tr>
                                            <td>Chat</td>
                                            <td>WhatsApp, Telegrams</td>
                                            <td style="background-color: #dcf9fd">Yes</td>
                                            <td id="td_silver">Yes</td>
                                            <td id="td_gold">Yes</td>
                                            <td id="td_platinum">Yes</td>
                                        </tr>
                                        <tr>
                                            <td>Videos</td>
                                            <td>-</td>
                                            <td style="background-color: #dcf9fd">-</td>
                                            <td id="td_silver">Yes</td>
                                            <td id="td_gold">Yes</td>
                                            <td id="td_platinum">Yes</td>
                                        </tr>
                                        <tr>
                                            <td>Audio</td>
                                            <td>Podcasts (Apple, Google, Spotify, Gaana, Anchor)</td>
                                            <td style="background-color: #dcf9fd">-</td>
                                            <td id="td_silver">Yes</td>
                                            <td id="td_gold">Yes</td>
                                            <td id="td_platinum">Yes</td>
                                        </tr>
                                        <tr>
                                            <td>Offers</td>
                                            <td>-</td>
                                            <td style="background-color: #dcf9fd">-</td>
                                            <td id="td_silver">Yes</td>
                                            <td id="td_gold">Yes</td>
                                            <td id="td_platinum">Yes</td>
                                        </tr>
                                        <tr>
                                            <td>Pages</td>
                                            <td>About, Accolades, Testimonials</td>
                                            <td style="background-color: #dcf9fd">-</td>
                                            <td id="td_silver">Yes</td>
                                            <td id="td_gold">Yes</td>
                                            <td id="td_platinum">Yes</td>
                                        </tr>
                                        <tr>
                                            <td>Products</td>
                                            <td>V4L integration</td>
                                            <td style="background-color: #dcf9fd">-</td>
                                            <td id="td_silver">-</td>
                                            <td id="td_gold">-</td>
                                            <td id="td_platinum">Yes</td>
                                        </tr>
                                        <tr>
                                            <td>Book Appointment</td>
                                            <td>-</td>
                                            <td style="background-color: #dcf9fd">-</td>
                                            <td id="td_silver">-</td>
                                            <td id="td_gold">-</td>
                                            <td id="td_platinum">Yes</td>
                                        </tr>
                                        <tr>
                                            <td>Events</td>
                                            <td>-</td>
                                            <td style="background-color: #dcf9fd">-</td>
                                            <td id="td_silver">-</td>
                                            <td id="td_gold">-</td>
                                            <td id="td_platinum">Yes</td>
                                        </tr>
                                        <tr>
                                            <td>Referrals</td>
                                            <td>
                                            Referrals provides links on your cards that can be monetised
                                            by biziacrd user
                                            </td>
                                            <td style="background-color: #dcf9fd">No</td>
                                            <td id="td_silver" id="td_silver">Yes</td>
                                            <td id="td_gold">Yes</td>
                                            <td id="td_platinum">Yes</td>
                                        </tr>
                                        <tr>
                                            <td>Name Site</td>
                                            <td>
                                            BizIcards are<br />
                                            hosted on anyname.anyextension. Domain Charges are extra
                                            </td>
                                            <td style="background-color: #dcf9fd">-</td>
                                            <td id="td_silver">-</td>
                                            <td id="td_gold">-</td>
                                            <td id="td_platinum">Yes</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('layouts/root/footer.php'); ?>