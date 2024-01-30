<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'vendor/autoload.php';

    class PasswordResetController extends CI_Controller {

        // function __construct() {
        //      parent::__construct();
        //      $this->load->model('PasswordResetModel');
        // }

    public function index() {
        // Display the password reset form
        $this->load->view('password_reset_form');
        // $this->load->model('PasswordResetModel');
    }

    public function reset_password() {
        // Validation rules for the form
        $this->form_validation->set_rules('email_id', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() === FALSE) {
            // Form validation failed; redisplay the form with errors
            $this->load->view('password_reset_form');
        } else {
            // Form validation passed; process the password reset
            $email = $this->input->post('email_id');
            $new_password = $this->input->post('password');

            $result = $this->PasswordResetModel->reset_password($email, $new_password);

            if ($result) {
                // Password reset was successful
                $this->session->set_flashdata("message", "Password has been reset successfully.");
                redirect(base_url() . 'login');
            } else {
                // Password reset failed
                $this->session->set_flashdata("message", "Failed to reset password.");
                redirect(base_url() . 'password_reset');
            }
        }
    }
}
