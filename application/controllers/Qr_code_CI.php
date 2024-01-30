<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qr_code_CI extends CI_Controller {

    public function testqrcode() {
        echo "inside here";
        $product_name = $this->session->userdata("display_name");
        $product_code = "";
        $product_desc = "";
        $manufacturing_date = "";
        $print_url = $this->session->userdata("digital_card_url");
        $inv_batch_id = $this->session->userdata("id");
        $jobcardno = "";
        $this->Qr_generation($product_name, $product_code, $product_desc, $jobcardno, $manufacturing_date, $print_url, $inv_batch_id);
    }
    
    public function Qr_generation($product_name, $product_code, $product_desc, $jobcardno, $manufacturing_date, $print_url, $inv_batch_id) {
        $jobcardno_new = $jobcardno;
        // Include the link in the QR code data
        $params['data'] = $product_name . " - " . $product_code . " - " . $product_desc . " - " . $jobcardno_new . " - " . $inv_batch_id . " - " . $manufacturing_date . " - " . $print_url;
    
        $params['level'] = 'H';
        $params['size'] = 50;
    
        $params['savename'] = FCPATH . 'qrcode_images/' . $product_code . '_' . $jobcardno_new . '_' . $inv_batch_id . '.png';
    
        $this->ciqrcode->generate($params);
    
        $qr_url = 'qrcode_images/' . $product_code . '_' . $jobcardno_new . '_' . $inv_batch_id . '.png';
    
        return $qr_url;
    }
}
