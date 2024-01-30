<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('razorpay_integration_files/config.php');
require('razorpay_integration_files/razorpay-php/Razorpay.php');
use Razorpay\Api\Api;


//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

class Zoom_API_Library {
    public function generate_zoom_meeting() {
        $request_url = 'https://doctorfromhome.in/Zoom_Library/generate_zoom_meeting.php';     
        $postarray = array("start_date" => date("Y-m-d H:i:s", strtotime($_SESSION['appstart'])));   
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_URL, $request_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postarray);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);

        $err = curl_error($ch);
        curl_close($ch);
        //echo "<pre>Response from zoom-"; print_r($response);
        $response = (json_decode($response));
        
        $start_url = $response[0]->start_url;
        $join_url = $response[0]->join_url;
        $zoom_meeting_id = $response[0]->id;
    }
}