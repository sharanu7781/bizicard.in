<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Card_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function delete_user($email) {
        $this->db->where('email_id', $email);
        $this->db->delete('bz_user_profile');

        if ($this->db->affected_rows() > 0) {
            // If rows were affected, it means the user was deleted successfully
            return true;
        } else {
            // If no rows were affected, the user may not exist
            return false;
        }
    }
}
