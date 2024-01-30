<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Suspend_card_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Card_model');
    }

    public function suspend_user() {
      //  print_r($_POST);die;
        if ($this->input->post('email')) {
            $email = $this->input->post('email');
            $result = $this->Card_model->delete_user($email);

            if ($result) {
                // User deleted successfully
                // You can show a success message or redirect
                redirect('Suspend_card_Controller');
            } else {
                // User deletion failed
                // You can show an error message or redirect to an error page
            }
        } else {
            // Handle form validation errors
        }
    }
}
