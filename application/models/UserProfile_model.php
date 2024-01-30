<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserProfile_model extends CI_Model {
    
    public function updateProfile($userId) {
        date_default_timezone_set('Asia/Kolkata');
        // Set the trial duration to 5 minutes (300 seconds)
        $trialDuration = 300;
        $trialEndDate = date('Y-m-d H:i:s', strtotime('+' . $trialDuration . ' seconds'));
       
        $currentTime = date('Y-m-d H:i:s');
        echo $trialEndDate."<br>".$currentTime;
        $data = array(
            'current_template_id' => 3,
            'plan_selected' => 1,
            'free_trial' => 'Y',
            'trial_end_date' => $trialEndDate
        );

        $this->db->where('id', $userId); 
        $this->db->update('bz_user_profile', $data);

        // Check if the trial_end_date is less than or equal to the current time
        if (strtotime($trialEndDate) <= strtotime($currentTime)) {
            // If the trial has ended, update the profile data accordingly
            $expiredData = array(
                'current_template_id' => 0,
                'plan_selected' => 0,
                'free_trial' => 'N'
            );
            
            $this->db->where('id', $userId); 
            $this->db->update('bz_user_profile', $expiredData);
        }

        return $this->db->affected_rows() > 0;






    }
        public function getFreeTrialUserData(){
            $this->db->select('id,trial_end_date');
            $this->db->from('bz_user_profile');
            $this->db->where('free_trial','Y');
            // $this->db->where('id',$userId);
            $query = $this->db->get();
          
          if($query->num_rows() > 0) {
              return $query->result();
          } else {
              return false;
          }
        }
        public function hasFreeTrial($userId) {
            $this->db->from('bz_user_profile');
            $this->db->where('id', $userId);
            $this->db->where_in('free_trial', array('Y', 'N')); // Check for 'Y' or 'N'
            $query = $this->db->get();
    
            return $query->num_rows() > 0;
        }
    
    }
    






 