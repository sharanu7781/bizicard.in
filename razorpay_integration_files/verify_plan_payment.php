<?php
error_reporting(0);
ob_start();
session_start();
date_default_timezone_set("Asia/Kolkata");
require('config.php');
require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

//Create database connection from here //localhost
// $hostname = "localhost";
// $username = "root";
// $dbname = "bizicards";
// $password = "Atr2021@123#";

//Production
$hostname = "localhost";
$username = "vocalfor_bizicard_prod";
$dbname = "vocalfor_bizicard_prod";
$password = "Atr2021@123#";

//Subdomain
// $hostname = "localhost";
// $username = "vocalfor_bizicard_subdomain";
// $dbname = "vocalfor_bizicard_subdomain";
// $password = "Atr2021@123#";

//echo "<pre>"; print_r($_POST);

$conn = mysqli_connect($hostname, $username, $password, $dbname) OR DIE ("Unable to
connect to database! Please try again later.");

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
    $api = new Api($keyId, $keySecret);
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
    //echo "<pre>";print_r($_POST);
    $custom_order_id = $api->payment->fetch($_POST['razorpay_payment_id']);
    $custom_order_id = $custom_order_id['notes']['custom_order_id'];
    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";

    //Insert a record for payment details
    //Check if user details with payment_id already exist or not in db
    $check_if_payment_details_exist = $conn->query("SELECT id FROM bz_payment_details WHERE user_id=".$_POST['user_id']." AND order_id='".$_POST['razorpay_order_id']."'");
    
    if($check_if_payment_details_exist->num_rows <= 0) {
        $conn->query("INSERT INTO bz_payment_details(payment_for,order_id,user_id,txn_id,amount,status,txn_date,entry_source,created_at) VALUES('".$_POST['plan_selected_name']." Plan Purchase','".$_POST['razorpay_order_id']."','".$_POST['user_id']."','".$_POST['razorpay_payment_id']."','".$_POST['template_payment_amount']."','PAYMENT_SUCCESS','".date("Y-m-d H:i:s")."','web','".date("Y-m-d H:i:s")."')");     
    }  

    //Update payment details against custom order details
    $conn->query("UPDATE bz_payment_custom_order_details SET razorpay_pay_id='".$_POST['razorpay_payment_id']."',razorpay_order_id='".$_POST['razorpay_order_id']."',status='Y' WHERE custom_order_id='".$custom_order_id."'");        

    //Get template details from selected plan
    $template_data = $conn->query("SELECT id FROM bz_template_master WHERE FIND_IN_SET('".$_POST['plan_selected']."', mapped_for_plan_id )");
    if($template_data->num_rows > 0) {
        $template_data = $template_data->fetch_row();

        //Update order payment flag from here as Y
        $conn->query("UPDATE bz_user_profile SET is_payment_done='Y',plan_selected=".$_POST['plan_selected'].",current_template_id=".$template_data[0].",is_registration_fully_done='Y' WHERE id=".$_POST['user_id']);
        
        $_SESSION['is_payment_done'] = "Y";
        $_SESSION['razorpay_payment_id'] = $_POST['razorpay_payment_id'];
        $_SESSION['template_choosen'] = $template_data[0];
        $_SESSION['plan_selected'] = $_POST['plan_selected'];
        
        header("Location: ".$_SESSION['base_url']."profile/".base64_encode($template_data[0]));//base64_encode($_SESSION['template_choosen']));
    } else {
        
    }
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

//echo $html;
