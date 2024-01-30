<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    
    public function emailExists($email) {
        $this->db->where('email_id', $email);
        $query = $this->db->get('bz_user_profile'); // Replace 'bz_user_profile' with your actual table name.
        
        return $query->num_rows() > 0;
    }
    

    public function updateEmail($currentEmail, $newEmail) {
      
        // Add your database query to update the email here.
        $data = array('email_id' => $newEmail);
        $this->db->where('email_id', $currentEmail);
        $this->db->update('bz_user_profile', ['email_id' => $newEmail]); // Replace 'users' with your actual table name.
    }
}
