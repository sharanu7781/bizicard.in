<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Register_CI extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Register_Model');
    }

    public function view_register()
    {
        $this->session->set_flashdata("message", "");
        $data['country_data'] = $this->Profile_Management_Model->get_country_data();
        
        $this->load->view("view_register",$data);
    }
    public function register_user()
    {
        $this->form_validation->set_rules('email_id', 'Email', 'required|is_unique[bz_user_profile.email_id]',array("is_unique"=>"<span style='color:red'>This Email Address is already registered with us. Please enter another meail ID<span>"));
        $this->form_validation->set_rules('display_name', 'User_name', 'required');
        /*$this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required|is_unique[bz_user_profile.mobile_number]',array("is_unique"=>"<span style='color:red'>This Mobile Number is already registered with us. Please enter another mobile number.<span>"));*/
        $this->form_validation->set_rules('mobile_number', 'Mobile Number', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['country_data'] = $this->Profile_Management_Model->get_country_data();
            $this->load->view('view_register',$data);
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

    public function check_signup_email_exists() {
        $result = $this->Register_Model->check_signup_email_exists();
        echo $result;
    }
}
