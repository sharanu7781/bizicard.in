<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PasswordResetModel extends CI_Model {

    public function reset_password($email_id, $new_password) {
        // Check if the email exists in your user table
        $user = $this->db->get_where('bz_user_profile', ['email_id' => $email_id])->row();

        if ($user) {
            // Hash the new password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Update the user's password
            $this->db->where('email_id', $email_id);
            $this->db->update('bz_user_profile', ['password' => $hashed_password]);

            return true; // Password reset was successful
        } else {
            return false; // User not found; password reset failed
        }
    }
}
