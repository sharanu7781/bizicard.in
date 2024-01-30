<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

class Home_CI extends CI_Controller {

    public function __construct() {
        parent::__construct();

        //Make object of Google API Client for call Google API
        $this->google_client = new Google_Client();

        //Set the OAuth 2.0 Client ID
        $this->google_client->setClientId('903951902469-43btukfagg02kqtvetib6vcl00lqi5fr.apps.googleusercontent.com');

        //Set the OAuth 2.0 Client Secret key
        $this->google_client->setClientSecret('redLTp1_MUUW9Ts6WALqTISf');

        //Set the OAuth 2.0 Redirect URI
        $this->google_client->setRedirectUri(base_url());

        //
        $this->google_client->addScope('email');

        $this->google_client->addScope('profile');
    }

	public function index() {
        if(isset($_GET["code"])) {
            //It will Attempt to exchange a code for an valid authentication token.
            $token = $this->google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

            //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
            if(!isset($token['error'])) {
                //Set the access token used for requests
                $this->google_client->setAccessToken($token['access_token']);

                //Store "access_token" value in $_SESSION variable for future use.
                $this->session->set_userdata('access_token', $token['access_token']);

                //Create Object of Google Service OAuth 2 class
                $google_service = new Google_Service_Oauth2($this->google_client);

                //Get user profile data from google
                $google_data = $google_service->userinfo->get();                
                
                if(!empty($google_data)) {                    
                    $this->session->set_userdata("email_id", $google_data["email"]);
                    $this->session->set_userdata("name", $google_data["name"]);

                    //Insert data in database for reference
                    $result = $this->Login_Model->save_user_details($google_data);
                    
                    /*if(is_string($result) && $result=="EXIST"){
                        $this->session->set_flashdata("message", "EXIST");
                    }
                    else */
                    
                    if($result == true) {
                        redirect("profile/".base64_encode($this->session->userdata("template_choosen")));
                    } else {
                        $this->session->set_flashdata("message", "<span style='color:red'>Something went wrong, please try again later</span");
                        $this->google_client->revokeToken();
                        redirect(base_url());
                    }
                }
            }
        } /*else if($this->session->userdata("email_id") != '') {
            //Check if user has already set his template
            if(!empty($this->session->userdata("template_choosen")))
                redirect("profile/".base64_encode($this->session->userdata("template_choosen")));
            else
                redirect("login");
        }*/
		//$result['plan_feture_data'] = $this->Register_Model->get_plan_feature_details();
        $result['country_data'] = $this->Profile_Management_Model->get_country_data();
        $this->load->view("index_bizicards", $result);
    }

    public function templates() {
        $this->load->view("templates");
    }

    public function send_contact_us_form_data() {
        $this->form_validation->set_rules('contact_names', 'Name', 'required',array("required"=>"<span style='color:red'>Please enter your name.<span>"));
        $this->form_validation->set_rules('contact_email', 'Email ID', 'required',array("required"=>"<span style='color:red'>Please enter your email ID.<span>"));
        $this->form_validation->set_rules('contact_phone', 'Mobile Number', 'required',array("required"=>"<span style='color:red'>Please enter your contact number<span>"));

        if ($this->form_validation->run() == FALSE) {
            $result['plan_feture_data'] = $this->Register_Model->get_plan_feature_details();
            $this->load->view("index_bizicards", $result);
        } else {
            $result = $this->Register_Model->save_user_data();
            if(is_string($result) && $result=="EXISTS") {
                $this->session->set_flashdata("message", "<span style='color:red'>Email OR Mobile number already exsists. Please enter another email ID.</span>");
                redirect("signup/register", "refresh");
            }
            else if ($result == true) {
                $this->session->set_flashdata("message", "success_registration");
            } else {
                $this->session->set_flashdata("message", "error");
            }
            redirect("login", "refresh");
        }
    }

    public function test() {
        //$result['plan_feture_data'] = $this->Register_Model->get_plan_feature_details();
        $result['country_data'] = $this->Profile_Management_Model->get_country_data();
        $this->load->view("index_bizicards_7Mar2022", $result);
    }  

    public function register_user() {
        $this->form_validation->set_rules('email_id', 'Email', 'required|is_unique[bz_user_profile.email_id]',array("is_unique"=>"<span style='color:red'>This Email Address is already registered with us. Please enter another meail ID<span>"));
        $this->form_validation->set_rules('display_name', 'User_name', 'required');
        /*$this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required|is_unique[bz_user_profile.mobile_number]',array("is_unique"=>"<span style='color:red'>This Mobile Number is already registered with us. Please enter another mobile number.<span>"));*/
        $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required');

        if ($this->form_validation->run() == FALSE) {
            $result['country_data'] = $this->Profile_Management_Model->get_country_data();
            $this->load->view("index_bizicards", $result);
        } else {
            $result = $this->Register_Model->save_user_data();
            
            if(is_string($result) && $result=="EXISTS") {
                $this->session->set_flashdata("message", "<span style='color:red'>Email OR Mobile number already exsists. Please enter another email ID.</span>");
                redirect(base_url(), "refresh");
            }
            else if ($result == true) {
                $this->session->set_flashdata("message", "success_registration");
            } else {
                $this->session->set_flashdata("message", "error");
            }
            redirect("login", "refresh");
        }
    }

    public function privacy_policy() {
        $this->load->view("view_privacy_policy");
    }
    public function terms_conditions() {
        $this->load->view("view_terms_conditions");
    }
    public function community_standards() {
        $this->load->view("view_community_standards");
    }


    
}
