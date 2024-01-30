<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('razorpay_integration_files/config.php');
require('razorpay_integration_files/razorpay-php/Razorpay.php');
use Razorpay\Api\Api;

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

class Razorpay_Payment_CI extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
        
        if($this->session->userdata("email_id") == '')
		{
			$this->session->set_flashdata("message", "<span style='color:red'>Please login to continue to portal</span>");
			redirect("login");
		}

        $this->created_by = $this->session->userdata("id");
        $this->created_time = date("Y-m-d H:i:s");
        $this->api = new Api(RAZORPAY_KEYID, RAZORPAY_SECRETKEY);
    }

    public function view_payment() {
        $result['template_data'] = $this->Profile_Management_Model->get_template_setup_data(base64_encode($this->session->userdata("template_choosen")));
        $result['bizicard_receipt_no'] = $this->Profile_Management_Model->generate_receipt_id();

        $this->load->view("view_payment", $result);
    }

    // public function pay() {
        
    //     // Create the Razorpay Order

        

    //     $api = new Api(RAZORPAY_KEYID, RAZORPAY_SECRETKEY);

    //     //
    //     // We create an razorpay order using orders api
    //     // Docs: https://docs.razorpay.com/docs/orders
    //     //
    //     $orderData = [
    //         'receipt'         => 3456,
    //         'amount'          => 1 * 100,//$this->input->post("payable_amount"); // 2000 rupees in paise
    //         'currency'        => 'INR',
    //         'payment_capture' => 1 // auto capture
    //     ];

    //     $razorpayOrder = $api->order->create($orderData);

    //     $razorpayOrderId = $razorpayOrder['id'];

    //     $this->session->set_userdata("razorpay_order_id", $razorpayOrderId);

    //     $displayAmount = $amount = $orderData['amount'];

    //     // if ($displayCurrency !== 'INR')
    //     // {
    //     //     $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    //     //     $exchange = json_decode(file_get_contents($url), true);

    //     //     $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
    //     // }

    //     $checkout = 'automatic';

    //     $data = [
    //         "key"               => RAZORPAY_KEYID,
    //         "amount"            => $amount,
    //         "name"              => "Bizicard Payments",
    //         "description"       => "Payments to register digital card",
    //         "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
    //         "prefill"           => [
    //         "name"              => $this->session->userdata("display_name"),
    //         "email"             => $this->session->userdata("email_id"),
    //         "contact"           => $this->session->userdata("mobile_no"),
    //         ],
    //         "notes"             => [
    //         "address"           => "Hello World",
    //         "merchant_order_id" => "12312321",
    //         ],
    //         "theme"             => [
    //         "color"             => "#F37254"
    //         ],
    //         "order_id"          => $razorpayOrderId,
    //     ];

    //     // if ($displayCurrency !== 'INR')
    //     // {
    //     //     $data['display_currency']  = $displayCurrency;
    //     //     $data['display_amount']    = $displayAmount;
    //     // }

    //     $json = json_encode($data);

    //     require("razorpay_integration_files/checkout/{$checkout}.php");

    // }

    public function view_offers_payment() {
        $result['template_data'] = $this->Profile_Management_Model->get_template_setup_data(base64_encode($this->session->userdata("template_choosen")));
        $result['bizicard_receipt_no'] = $this->Profile_Management_Model->generate_receipt_id();
      
        $this->load->view("view_payment_offers", $result);
    }

    public function show_plan() {
        
        $result['bizicard_receipt_no'] = $this->Profile_Management_Model->generate_receipt_id();
        $result['plan_feture_data'] = $this->Profile_Management_Model->get_plan_feature_details();
        $this->load->view("view_plans", $result);
    }

    public function show_plan_payment_gateway_page() {
        echo "<pre>"; print_r($_POST);
        if(!empty($this->input->post("plans"))) {
            $plan_details = $this->Profile_Management_Model->validate_plan($this->input->post("plans"));
            if($plan_details != false){
                $result['bizicard_receipt_no'] = $this->Profile_Management_Model->generate_receipt_id();
                $result['plan_details'] = $plan_details;                
                //$this->load->view("ajax_make_plan_payment", $result);

                    //
                    // We create an razorpay order using orders api
                    // Docs: https://docs.razorpay.com/docs/orders
                    //
                    $orderData = [
                        'receipt'         => 3456,
                        'amount'          => 1 * 100, // 2000 rupees in paise
                        'currency'        => 'INR',
                        'payment_capture' => 1 // auto capture
                    ];

                    $razorpayOrder = $this->api->order->create($orderData);

                    $razorpayOrderId = $razorpayOrder['id'];

                    $_SESSION['razorpay_order_id'] = $razorpayOrderId;
                    $_SESSION['session_test'] = "Amruta here for testing";

                    $displayAmount = $amount = $orderData['amount'];

                    
                    $checkout = 'automatic';

                    if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
                    {
                        $checkout = $_GET['checkout'];
                    }

                    $data = [
                        "key"               => RAZORPAY_KEYID,
                        "amount"            => $amount,
                        "name"              => "Bizicard Payments",
                        "description"       => "Payments to register digital card",
                        "image"             => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
                        "prefill"           => [
                        "name"              => "Daft Punk",
                        "email"             => "customer@merchant.com",
                        "contact"           => "9999999999",
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

                   

                    $json = json_encode($data);

                   echo '<form action="verify.php" method="POST">
                    <script
                        src="https://checkout.razorpay.com/v1/checkout.js"
                        data-key="'.$data['key'].'"
                        data-amount="'.$data['amount'].'"
                        data-currency="INR"
                        data-name="'.$data['name'].'"
                        data-image="'.$data['image'].'"
                        data-description="'.$data['description'].'"
                        data-prefill.name="'.$data['prefill']['name'].'"
                        data-prefill.email="'.$data['prefill']['email'].'"
                        data-prefill.contact="'.$data['prefill']['contact'].'"
                        data-notes.shopping_order_id="3456"
                        data-order_id="'.$data['order_id'].'">
                    </script>
                    <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
                    <input type="hidden" name="shopping_order_id" value="3456">
                    </form>';
            }                
            else
                echo "ERROR_IN_PLAN_DETAILs";
        } else {
            echo "ERROR";
        }
    }

}
