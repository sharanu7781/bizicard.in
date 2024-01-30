<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partner_Management_Model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->Functions_Library = new Functions_Library();
    }

    public function save_partner_details()
    {
        $data = array(
            "partner_name" => $this->input->post('name'),
            "short_code" => $this->input->post('short_code')
            );

        $this->db->insert('bz_partner_details', $data);
    }

    public function get_partner_details()
    {
        $this->db->select("partner_name,short_code");
        $this->db->from("bz_partner_details");

        $query = $this->db->get();
        
        if ($query->num_rows() > 0)
            return $query->result();
        else
            return false;
    }
}