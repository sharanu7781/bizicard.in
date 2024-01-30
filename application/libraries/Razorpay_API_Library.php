<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('razorpay_integration_files/config.php');
require('razorpay_integration_files/razorpay-php/Razorpay.php');
use Razorpay\Api\Api;


//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

class Razorpay_API_Library {
    public function make_payment($razorpay_values_array) {
        
        $api = new Api(RAZORPAY_KEYID, RAZORPAY_SECRETKEY);

        //
        // We create an razorpay order using orders api
        // Docs: https://docs.razorpay.com/docs/orders
        //
        $orderData = [
            'receipt'         => 3456,
            'amount'          => $razorpay_values_array['payment_price'] * 100, // 2000 rupees in paise
            'currency'        => 'INR',
            'payment_capture' => 1 // auto capture
        ];

        $razorpayOrder = $api->order->create($orderData);

        $razorpayOrderId = $razorpayOrder['id'];

        $_SESSION['razorpay_order_id'] = $razorpayOrderId;

        $displayAmount = $amount = $orderData['amount'];       

        $checkout = 'automatic_service_booking_payment';

        if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
        {
            $checkout = $_GET['checkout'];
        }

        $data = [
            "key"               => RAZORPAY_KEYID,
            "amount"            => $amount,
            "name"              => "Bizicard Payments",
            "description"       => $razorpay_values_array["payment_for"],
            "image"             => base_url()."public/assets/images/bizicard-logo.png",
            "prefill"           => [
            "name"              => $razorpay_values_array["payment_from_name"],
            "email"             => $razorpay_values_array["payment_from_emailid"],
            "contact"           => $razorpay_values_array["payment_from_mobilenumber"],
            ],
            "notes"             => array("custom_order_id" => $razorpay_values_array["bizicard_receipt_no"], "insert_id"=> $razorpay_values_array["insert_id"]),
            "theme"             => [
            "color"             => "#F37254"
            ],
            "order_id"          => $razorpayOrderId,
        ];

        $json = json_encode($data);
        
        require("razorpay_integration_files/checkout/{$checkout}.php");

    }

    public function post_razorpay_payment_data() {
        $CI_DB =& get_instance();
        $CI_DB->load->database();
        
        $success = true;

        $error = "Payment Failed";
        if (empty($_POST['razorpay_payment_id']) === false)
        {
            $api = new Api(RAZORPAY_KEYID, RAZORPAY_SECRETKEY);
            try
            {
                // Please note that the razorpay order ID must
                // come from a trusted source (session here, but
                // could be database or something else)
                $attributes = array(
                    'razorpay_order_id' => $_POST['razorpay_order_id'],
                    'razorpay_payment_id' => $_POST['razorpay_payment_id'],
                    'razorpay_signature' => $_POST['razorpay_signature']
                );

                $api->utility->verifyPaymentSignature($attributes);
            }
            catch(SignatureVerificationError $e)
            {
                $success = false;
                $error = 'Razorpay Error : ' . $e->getMessage();
            }
        }

        if ($success === true)
        {
            //$custom_order_id = $api->payment->fetch($_POST['razorpay_payment_id']);
            //$custom_order_id = $custom_order_id['notes']['custom_order_id'];
            $custom_order_id = $_POST["custom_order_id"];
           
            //Update appointment details from here if we get success from 
            if(isset($_POST['insert_id']) && !empty($_POST['insert_id'])) {
                $this->Zoom_API_Library = new Zoom_API_Library(); 

                //Insert a record for payment details
                $CI_DB->db->query("INSERT INTO bz_payment_details(payment_for,order_id,user_id,txn_id,amount,status,txn_date,entry_source,created_at) VALUES('".PAYMENT_FOR_SERVICE." Plan Purchase','".$_POST['razorpay_order_id']."','".$_POST['insert_id']."','".$_POST['razorpay_payment_id']."','".$_POST['payment_price']."','PAYMENT_SUCCESS','".date("Y-m-d H:i:s")."','web','".date("Y-m-d H:i:s")."')");       

                //Update payment details against custom order details
                $CI_DB->db->query("UPDATE bz_payment_custom_order_details SET razorpay_pay_id='".$_POST['razorpay_payment_id']."',razorpay_order_id='".$_POST['razorpay_order_id']."',status='Y' WHERE custom_order_id='".$custom_order_id."'"); 

                //Get site user information who has done service booking
                $SITE_USER_DETAILS = $CI_DB->db->query("SELECT TBL_APP.BIZICARD_USER_ID,TBL_APP.SITE_USER_NAME,TBL_APP.SITE_USER_MOB_NO,TBL_APP.SITE_USER_EMAIL_ID,TBL_USER.email_id AS CARD_USER_EMAIL,TBL_USER.display_name,TBL_APP.APPOINTMENT_START_TIME,TBL_APP.APPOINTMENT_DATE FROM `bz_appointment_details` AS TBL_APP JOIN bz_user_profile AS TBL_USER ON TBL_APP.BIZICARD_USER_ID=TBL_USER.id WHERE TBL_APP.ID=".$_POST['insert_id']);

                if($SITE_USER_DETAILS->num_rows() > 0) {
                    $SITE_USER_DETAILS = $SITE_USER_DETAILS->row(); 
                    //Generate Zoom meeting from this function
                    $zoom_data = $this->Zoom_API_Library->generate_zoom_meeting($SITE_USER_DETAILS);
                    $zoom_data = (json_decode($zoom_data));
                    
                    $start_url = $zoom_data[0]->start_url;
                    $join_url = $zoom_data[0]->join_url;
                    $zoom_meeting_id = $zoom_data[0]->id;
                    $returndata_array = array("start_url"=>$start_url, "join_url"=>$join_url);
                    
                    $CI_DB->db->query("UPDATE bz_appointment_details SET PAYMENT_STATUS='".PAYMENT_SUCCESS."', APPOINTMENT_STATUS='".APPOINTMENT_STATUS_BOOKED."', ZOOM_START_URL='".$start_url."', ZOOM_JOIN_URL='".$join_url."', ZOOM_MEETING_ID='".$zoom_meeting_id."', AMOUNT_PAID='".$_POST['payment_price']."', TRANSACTION_ID='".$_POST['razorpay_payment_id']."', UPDATED_AT='".date("Y-m-d H:i:s")."', UPDATED_BY='0' WHERE ID=".$_POST['insert_id']);

                    return $returndata_array;
                } else {
                    return false;
                }                
            } 

            
        }
        else
        {
            $html = "<p>Your payment failed, Please note transaction ID -".$_POST['razorpay_payment_id']."</p>
                    <p>{$error}</p>";
            
            return $html;
        }  
    }
}