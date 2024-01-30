<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Offers_Model extends CI_Model {
    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
    }

    public function get_offers_data() {
        $this->db->select("slider_image_path");
        $this->db->from("bz_slider_details");
        $this->db->where("is_deleted", "N");
        $this->db->where("is_active", "Y");
        $query = $this->db->get();

        if($query->num_rows() > 0) {
            $offers_data_array = array();
            foreach($query->result() as $row) { 
                if(!empty($row->slider_image_path)) 
                    $offers_data_array[] = $row->slider_image_path;             
            }
            
            return $offers_data_array;
        } else {
            return false;
        }
    }
}
?>