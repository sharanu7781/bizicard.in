<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';


class Login_CI extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");

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
                    
                    //Insert data in database for reference
                    $result = $this->Login_Model->save_user_details($google_data);
                   
                    /*if(is_string($result) && $result=="EXIST"){
                        $this->session->set_flashdata("message", "EXIST");
                    }
                    else */
                    
                    if($result == true) {
                        // $this->session->set_userdata("email_id", $google_data["email"]);
                        // $this->session->set_userdata("name", $google_data["name"]);
                        //redirect("templates_selection");
                        redirect("profile/".base64_encode($this->session->userdata("template_choosen")));
                    } else {
                        $this->session->set_flashdata("message", "error_login");
                        $this->google_client->revokeToken();
                        redirect(base_url());
                    }
                }
            }
        } else if($this->session->userdata("id") != '') {
            //Check if user has already set his template
            if(!empty($this->session->userdata("template_choosen")))
                redirect("profile/".base64_encode($this->session->userdata("template_choosen")));
            else{
                $get_user_details = $this->Profile_Management_Model->get_userdata($this->session->userdata("email_id"));
                
                if(!empty($get_user_details) && $get_user_details[0]->plan_selected != "") 
                    redirect("show_plans");
                else
                    redirect("show_digital_card");
            }
                
        } else {
            if(!empty($_GET["code"])) 
                $this->session->set_flashdata("message", "error_login");
                            
            $this->google_client->revokeToken();
            $this->session->sess_destroy();    
            $this->load->view('view_login');
        }
    }

    public function validate_login() {
        $result = $this->Login_Model->validate_login();
       
        if($result != false) {
            //Check if user already purchased a plan or not, if not then redirect to plans information page
            $get_user_details = $this->Profile_Management_Model->get_userdata($this->session->userdata("email_id"));
           // print_r($get_user_details);die;
            if(!empty($get_user_details) && $get_user_details[0]->plan_selected == "0") {
                redirect("profile_setup/show_plans");
            } else if($this->session->userdata("email_id") == "admin@bizicard.in") {
                redirect("change_plan");
            }
            else if(!empty($this->session->userdata("template_choosen")))
                redirect("profile/".base64_encode($this->session->userdata("template_choosen")));
            // else
            //     redirect("templates_selection");
        } else {
            $this->session->set_flashdata("message", "error_login");
            redirect(base_url()."login");
        }
    }

    public function logout() {
        
        $this->google_client->revokeToken();
        $this->session->sess_destroy();
        
        redirect(base_url()."login");
    }

    public function forget_password() {
        $this->load->view('view_forget_password');
    }

    public function submit_forget_password_request() {
        $result = $this->Login_Model->submit_forget_password_request();
        if($result == true) {
            $this->session->set_flashdata("message", "success");
            redirect(base_url()."login");
        } else {
            $this->session->set_flashdata("message", "error_password");
            redirect(base_url()."login");
        }
    }
    
    public function check_forget_password_email_exists() {
        echo $result = $this->Login_Model->check_forget_password_email_exists();
    }

    public function reset_password($encrypted_token_email) {
        $data['user_data'] = $this->Login_Model->reset_password($encrypted_token_email);
        $data['encrypted_token_email'] = $encrypted_token_email;
        $this->load->view("view_reset_password", $data);
    }
    public function save_reset_password() {
        $this->form_validation->set_rules('password', 'Password', 'required',array('required' => '<span style="color:red">Please enter password</span>')); 
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required',array('required' => '<span style="color:red">Please enter confirm password</span>'));

        if ($this->form_validation->run() == FALSE) {
            $data['user_data'] = $this->Login_Model->reset_password($this->input->post("encrypted_token_email"));
            $data['encrypted_token_email'] = $this->input->post("encrypted_token_email");
            $this->load->view("view_reset_password", $data);
        } else {
            $result = $this->Login_Model->save_reset_password();
            if($result == true) {
                $this->session->set_flashdata("message", "set_passwords");
                redirect(base_url()."login");
            } else {
                $this->session->set_flashdata("message", "error_in_process");
                redirect(base_url()."login");
            }
        }
    }

    // public function save_password() {
    //     $this->form_validation->set_rules('email_id', 'Email', 'required|valid_email', array('required' => '<span style="color:red">Please enter email</span>', 'valid_email' => '<span style="color:red">Please enter a valid email address</span>'));
    //     $this->form_validation->set_rules('password', 'Password', 'required', array('required' => '<span style="color:red">Please enter password</span>'));
    //     $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required', array('required' => '<span style="color:red">Please enter confirm password</span'));
    
    //     if ($this->form_validation->run() == FALSE) {
    //         // Handle validation errors
    //         // You may need to load a view that displays the errors to the user.
    //     } else {
    //         // Handle the password reset without sending an email
    //         $result = $this->Login_Model->save_password();
    //         if ($result == true) {
    //             $this->session->set_flashdata("message", "set_passwords");
    //             redirect(base_url() . "profile");
    //         } else {
    //             $this->session->set_flashdata("message", "error_in_process");
    //             redirect(base_url() . "profile_management/view_admin_change_password");
    //         }
    //     }
    // }
    


    
}
