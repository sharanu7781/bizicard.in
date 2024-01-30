<?php
foreach($template_data as $template_row) {}

// Create the Razorpay Order

        



//
// We create an razorpay order using orders api
// Docs: https://docs.razorpay.com/docs/orders
//
$orderData = [
    //'receipt'         => $bizicard_receipt_no,
    'amount'          => ($template_row->template_charges * 100), // 2000 rupees in paise
    'currency'        => 'INR',
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $this->api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$this->session->set_userdata("razorpay_order_id", $razorpayOrderId);

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
    "description"       => "Premium Template Purchase Payment",
    "image"             => "https://bizicard.in/public/assets/images/bizicard-logo.png",
    "prefill"           => [
    "name"              => $this->session->userdata("display_name"),
    "email"             => $this->session->userdata("email_id"),
    "contact"           => $this->session->userdata("mobile_no"),
    ],
    "notes"             => [
    "address"           => "Hello World",
    "merchant_order_id" => "12312321",
    ],
    "theme"             => [
    "color"             => "#F37254"
    ],
    "order_id"          => $razorpayOrderId,
];
$this->session->set_userdata("template_payment_amount", $amount);
?>
<!-- Header -->
<?php $this->load->view("layouts/header"); ?> 
<!-- DataTables -->

<link href="<?php echo base_url();?>public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>public/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<!-- Responsive datatable examples -->
<link href="<?php echo base_url();?>public/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
 
<?php $this->load->view("layouts/headerStyle"); ?>


<!-- hederStyle -->
<?php $this->load->view("layouts/headerStyle"); ?>


    <!-- Begin page -->
    <div id="layout-wrapper">

      
        <!-- Topbar -->
        <?php $this->load->view("layouts/topbar"); ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-8">
                            <div class="page-title-box">
                                <h4>Make a Payment</h4>
                            </div>
                        </div>
                        <div class="col-sm-2">
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-8">                                    
                                    <div class="card">
                                        <div class="card-body">
                                            <!--  The entire list of Checkout fields is available at
                                            https://docs.razorpay.com/docs/checkout-form#checkout-fields -->

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-1"></div>
                                                        <div class="col-lg-10">                                    
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    <form action="<?php echo base_url();?>razorpay_integration_files/verify.php" method="POST">
                                                                        <div class="row">
                                                                            <div class="col-lg-12">      
                                                                                <div class="form-group">
                                                                                    <label style="color:#d86363;">
                                                                                         <h5>Thank you for choosing the premium template. We are offering it to you it at an attractive one-time price of INR <?php echo $amount;?>. You will be asked to pay it in the next screen.</h5>
                                                                                    </label>
                                                                                </div>
                                                                            </div>                
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-6">      
                                                                                <div class="form-group">
                                                                                    <label class="">Customer Name - <?php echo $this->session->userdata("display_name")?></label>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="">Email ID - <?php echo $this->session->userdata("email_id");?></label>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="">Mobile No. - <?php echo $this->session->userdata("mobile_no");?></label>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label class="">Total Payable Amount - <i class="fas fa-rupee-sign"></i>&nbsp;<?php echo $amount;?></label>
                                                                                </div>                                                            
                                                                            </div>
                                                                            <div class="col-lg-6"> 
                                                                            </div>
                                                                        </div>
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
                                                                       
                                                                        &nbsp;&nbsp;&nbsp;<a class="btn btn-primary btn-sm waves-effect waves-light" href="<?php echo base_url()."show_digital_card/".base64_encode("payment_cancelled");?>">Go Back</a>
                                                                    </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-1"></div>
                                                    </div>
                                                </div>                   
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2"></div>
                            </div>
                        </div>
                        <!-- end col -->                        
                    </div>
                    <!-- end row -->
                    
                    
                </div>
                <!-- end main content-->

            </div>  