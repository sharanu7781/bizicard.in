<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offers_CI extends CI_Controller {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set("Asia/Kolkata");
    }

    public function view_offers() {
        $data['offers_data'] = $this->Offers_Model->get_offers_data();
        $data['flag'] = "flag";
        $this->load->view("view_offers_section", $data);
    }
}
