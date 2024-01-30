<?php
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
// $password = "";

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
    $custom_order_id = $api->payment->fetch($_POST['razorpay_payment_id']);
    $custom_order_id = $custom_order_id['notes']['custom_order_id'];

    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";

    //Insert a record for payment details
    $conn->query("INSERT INTO bz_payment_details(payment_for,order_id,user_id,txn_id,amount,status,txn_date,entry_source,created_at) VALUES('PAYMENT_FOR_OFFER','".$_POST['razorpay_order_id']."','".$_SESSION['id']."','".$_POST['razorpay_payment_id']."','".$_SESSION['template_payment_amount']."','PAYMENT_SUCCESS','".date("Y-m-d H:i:s")."','web','".date("Y-m-d H:i:s")."')");

    //Update order payment flag from here as Y
    $conn->query("UPDATE bz_user_profile SET is_offers_payment_done='Y' WHERE id=".$_SESSION['id']);

    $conn->query("UPDATE bz_payment_custom_order_details SET razorpay_pay_id='".$_POST['razorpay_payment_id']."',razorpay_order_id='".$_POST['razorpay_order_id']."',status='Y' WHERE custom_order_id='".$custom_order_id."'");

    header("Location: ".$_SESSION['base_url']."profile_management/add_offers");
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;
