<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ChangePlanController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('PlanModel');
    }

    public function index() {
        $this->load->view('bz_user_profile');
    }

    public function processChange() {
        //print_r($_POST);die;
        $email_id = $this->input->post('email_id'); // Assuming you use 'email_id' as the identifier
        $newPlan = $this->input->post('plan_selected');

        // Update the user's plan in the PlanModel
        $this->PlanModel->update_plan($email_id, $newPlan);

        // Redirect to the 'profile.php' page or another appropriate page
        redirect('profile.php');
    }

    public function getCurrentPlan() {
        $email_id = $this->input->post('email_id');
        $currentPlan = $this->PlanModel->getCurrentPlanByEmail($email_id);
        //print_r($currentPlan);die;
        echo json_encode($currentPlan);
    }
    
}


