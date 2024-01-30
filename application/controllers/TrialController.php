<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TrialController extends CI_Controller {

    public function index() {
        $this->load->view('view_plans');
    }

    public function startFreeTrial() {
        $userId = $this->session->userdata("id");
        $this->load->model('UserProfile_model');
    
        // Check if the user has already taken a free trial
        $freeTrialData = $this->UserProfile_model->hasFreeTrial($userId);
    
        if ($freeTrialData) {
            // User already took a free trial, show a message
            echo '<script>alert("You have already taken a free trial session. Please select a plan and continue.");';
            echo 'window.location.href="'.base_url('profile_setup/show_plans').'";</script>';
            return;
        }

    $success = $this->UserProfile_model->updateProfile($userId);

    if ($success) {
        $this->session->set_userdata('free_trial', 'Y');

        $this->session->sess_destroy();            
        $this->session->set_flashdata('trial_message', 'Your 5-minute free trial has started. Please log in again.');
        
        // Add JavaScript code to show the popup message and redirect
        echo '<script>alert("Your 5-minute free trial has started. Please log in again.");';
        echo 'window.location.href="'.base_url('login').'";</script>';
    } else {
        echo "failed";
    }
}


   
    public function checkTrialStatus() {
        // $userId = $this->session->userdata("id");
        date_default_timezone_set('Asia/Kolkata');
        $currentTime = date('Y-m-d H:i:s');
        $this->load->model('UserProfile_model');

        // Retrieve the trial end date from the user profile
        $result = $this->UserProfile_model->getFreeTrialUserData();
        if($result){
        foreach($result as $row){
            $trialEndDate = $row->trial_end_date;
            if (strtotime($trialEndDate) <= strtotime($currentTime)) {
                // If the trial has ended, update the profile data accordingly
                $expiredData = array(
                    'current_template_id' => 0,
                    'plan_selected' => 0,
                    'free_trial' => 'N'
                );
                
                $this->db->where('id', $row->id); 
                $this->db->update('bz_user_profile', $expiredData);
            }
        } 
        }
        
    }
    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url()."login");
    }
}
