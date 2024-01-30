<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangeEmailController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        // Load the necessary model here if you have one.
        $this->load->model('UserModel'); // Replace 'UserModel' with your actual model name.
    }

    public function index() {
        $this->load->view('change_email_form'); // Create a view file for your form.
    }

    public function processChange() {
        $this->load->library('form_validation');
        
        // Set validation rules for email addresses
        $this->form_validation->set_rules('current_email', 'Current Email', 'required|valid_email|callback_check_current_email');
        $this->form_validation->set_rules('new_email', 'New Email', 'required|valid_email');
    
        if ($this->form_validation->run() == FALSE) {
            // Validation failed, redirect back to the form with validation errors
            $this->load->view('admin_change_email_id');
        } else {
            // Validation passed, proceed with updating the email
            $currentEmail = $this->input->post('current_email');
            $newEmail = $this->input->post('new_email');
            
            // Check if the current email exists in the database
            $emailExists = $this->UserModel->emailExists($currentEmail);
            
            if ($emailExists) {
                $this->UserModel->updateEmail($currentEmail, $newEmail);
                redirect('profile.php');
            } else {
                // Set a validation error for the current_email field
                $this->form_validation->set_message('check_current_email', 'Current email does not exist.');
                $this->load->view('change_email_form');
            }
        }
    }
    
    
    public function check_current_email($currentEmail) {
        $emailExists = $this->UserModel->emailExists($currentEmail);
        if ($emailExists) {
            return TRUE;  // Email exists, validation passes
        } else {
            $this->form_validation->set_message('check_current_email', 'Current email does not exist.');
            return FALSE; // Email does not exist, validation fails
        }
    }
    
    
}
