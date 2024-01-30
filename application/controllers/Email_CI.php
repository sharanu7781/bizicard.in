<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Email_CI extends CI_Controller { 
 
      function __construct() { 
         parent::__construct(); 
         $this->load->library('session'); 
         $this->load->helper('form'); 
         $this->Functions_Library = new Functions_Library();
      } 
		
      public function index() { 
        echo "Inside index";
      } 
  
      public function send_mail() { 
        echo "Inside index";
        $this->load->library('email');   
        $config = array();
        // $config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_host'] = 'smtp.bizicard.in';
        $config['smtp_port'] = '587';
        // $config['smtp_user'] = 'mitechinfotest@gmail.com';
        $config['smtp_user'] = 'info@bizicard.in';
        // $config['_smtp_auth'] = TRUE;
        // $config['smtp_pass'] = 'gutx mmra xblr wkhz';
        // $config['smtp_crypto'] = 'tls';
        $config['protocol'] = 'smtp';
        // $config['mailtype'] = 'html';
        // $config['send_multipart'] = FALSE;
        // $config['charset'] = 'utf-8';
        // $config['wordwrap'] = TRUE;
        $this->email->initialize($config); // intializing email library, whitch is defiend in system
        $this->email->set_newline("\r\n"); 
    
        //  $from_email = "mitechinfotest@gmail.com"; 
         $from_email = "info@bizicard.in"; 
         $to_email = "mitecsharanu@gmail.com"; 
   
         //Load email library 
        //  $this->load->library('email'); 
   
         $this->email->from($from_email); 
         $this->email->to($to_email);
         $this->email->subject('Email Test'); 
         $this->email->message('Testing the email class.'); 
   
         //Send mail 
         if($this->email->send()) {
         echo "inside iff";
        //  $this->session->set_flashdata("email_sent","Email sent successfully."); 
         }
         else {
         echo "inside else";
         $errors = $this->email->print_debugger();
         print_r($errors);
        //  $this->session->set_flashdata("email_sent","Error in sending Email."); 
         }
        //  $this->load->view('email_form'); 
      } 
    public function send_mail_test() {
        // echo "inside send_mail_test";
        $to_email = "mitecsharanu@gmail.com"; 
        $subject = "Email Test"; 
        $message = "Testing the email class."; 
        $this->Functions_Library->sendmail($to_email, $subject, $message);

    }
    public function password_hash() {
        $password = "Avnish@123";
        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
        echo "encrypted_password ===".$encrypted_password; 
    } 
    
} 
