<?php

class PlanModel extends CI_Model {
    public function update_plan($email_id, $new_plan) {
        // Check if the user exists in your user table
        $user = $this->db->get_where('bz_user_profile', ['email_id' => $email_id])->row();

        if ($user) {
            // Update the user's plan in the 'plan_selected' column
            $this->db->where('email_id', $email_id);
            $this->db->update('bz_user_profile', ['plan_selected' => $new_plan]);

            return true; // Plan update was successful
        } else {
            return false; // User not found; plan update failed
        }
    }


    public function getCurrentPlanByEmail($email) {
        $this->db->select('pm.plan_name as plan_name');
        $this->db->join('bz_plan_master pm', 'u.plan_selected = pm.id ');
        $this->db->where('email_id', $email);
        $query = $this->db->get('bz_user_profile u');
        //print_r($this->db->last_query());die;
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->plan_name;
        } else {
            return 'Plan Not Found';
        }
    }

 
}



